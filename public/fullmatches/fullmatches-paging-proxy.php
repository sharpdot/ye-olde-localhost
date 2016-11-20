<?php
function gp($n='',$default=''){
	return (isset($_REQUEST[$n])) ? $_REQUEST[$n] : $default;
}
function pr($obj){
	print '<pre>';print_r($obj); die();
}
/* gets the data from a URL */
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
function get_post($form_url,$data_to_post) {
	// Initialize cURL
	$curl = curl_init();
	// Set the options
	curl_setopt($curl,CURLOPT_URL, $form_url);
	// This sets the number of fields to post
	curl_setopt($curl,CURLOPT_POST, sizeof($data_to_post));
	// This is the fields to post in the form of an array.
	curl_setopt($curl,CURLOPT_POSTFIELDS, $data_to_post);

	//$timeout = 10;
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

	//execute the post
	$result = curl_exec($curl);
	//close the connection
	curl_close($curl);
	return $result;
}
/* form data
acp_currpage:3
acp_pid:29389
acp_shortcode:acp_shortcode
action:pp_with_ajax
Name
*/
// proxy to HERE
$target = 'http://www.fullmatchesandshows.com/wp-admin/admin-ajax.php';
$html = get_post($target, $_POST);
//pr($result);
//print $result;


// replace the pattern...
$pattern = '/(\/\/config\.playwire\.com.*zeus\.json)/i';
preg_match($pattern, $html, $matches);
//print 'matches?';
//pr($matches);
if (count($matches)==0){
	die('sorry no match');
} else {
	//$configurl = str_replace('//', '/', $matches[1]);
	$configurl = 'http:'.$matches[1];
	// ugh ok save the external data as a flat json file locally and point to that
	$json = get_data($configurl);
	$json = str_replace('"required":true', '"required":false', $json);
	$json = str_replace('cuepoints', 'nocuepoints', $json);	// also - no cuepoints...
	// save locally somewhere 
	$dir = 'fullmatches-configs';
	$configfile = $dir.'/'.time().'.json';
	$ok = file_put_contents($configfile, $json);
	if ($ok === false){
		die('cannot write the json!');
	}
	$html = str_replace($matches[1], '/'.$configfile, $html);
	print $html;
	die();
}



