<?php
function gp($n='',$default=''){
	return (isset($_GET[$n])) ? $_GET[$n] : $default;
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
//
/* need to change this

<script data-config="//config.playwire.com/21772/videos/v2/4828121/zeus.json" data-height="100%" data-width="100%" src="//cdn.playwire.com/bolt/js/zeus/embed.js" type="text/javascript"></script>
OR
<script data-config="//config.playwire.com/21772/videos/v2/4827786/zeus.json" data-height="100%" data-width="100%" src="//cdn.playwire.com/bolt/js/zeus/embed.js" type="text/javascript"></script>

in that config file is a settings for advertising.required = true
if i can flip that then all is solved
- idea 1 - change the config to a local url which has the same config but with the setting flipped
* problem - switching videos doesn't seem to work :(
- idea 2 - add something to the page source and just turn it off


and this 
var acp_ajax_obj = {"url":"http:\/\/www.fullmatchesandshows.com\/wp-admin\/admin-ajax.php"};

acp_currpage:3
acp_pid:29389
acp_shortcode:acp_shortcode
action:pp_with_ajax

just need to proxy the call!
http:\/\/www.fullmatchesandshows.com\/wp-admin\/admin-ajax.php
to 
fullmatches-paging-proxy.php

*/
$rooturl = 'http://www.fullmatchesandshows.com';
$url = gp('url',$rooturl);
$html = get_data($url);
// no textareas!
$html = str_replace('textarea', 'textareanone', $html);

if ($url != $rooturl){
	//print '<textarea>'; print $html; print '</textarea>';
	// replace the config
	//$html = str_replace('//config.playwire.com/21772/videos/v2/4828121/zeus.json', '/fullmatches-config.json', $html);
	//print $html;
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
		//$html = str_replace($configurl, 'http://localhost/fullmatches-config.json.php?url='.'http:'.$configurl, $html);

		// fix for the paging
		$pagingreplace = "http:\/\/www.fullmatchesandshows.com\/wp-admin\/admin-ajax.php";
		$pagingurl = 'http:\/\/localhost\/fullmatches-paging-proxy.php';
		$html = str_replace($pagingreplace, $pagingurl, $html);

		print $html;
		die();
	}

	die();

}

?>
<html>
<head>
<style>
iframe { width: 100%; height:100%; }
input[type=text] { width: 50%; }
</style>
<script>
function el(id){
	return document.getElementById(id);
}
function useiframeurl(){
	var theframe = el('theframe'),
		theform = el('theform'),
		theurl = el('url')
		console.log('these',theframe,theform,theurl);
	theurl.value = theframe.src;
//		theform.submit();


}
</script>
</head>
<body>

<p>That's better!</p>

<form id="theform" action="#">
	<input type="text" name="url" id="url" placeholder="url" value="<?php print $url; ?>" />
	<input type="submit" />
</form>
<!-- this doesnt work
<p><a href="#" onclick="useiframeurl(); return false;">use the url below</a></p>
-->

<iframe id="theframe" src="<?php print $url; ?>"></iframe>


<textarea>
<?php print $html; ?>
</textarea>
</body>




