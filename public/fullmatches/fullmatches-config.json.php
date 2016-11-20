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
$url = gp('url','http://www.fullmatchesandshows.com');
$json = get_data($url);
//pr($json);
$json = str_replace('"required":true', '"required":false', $json);
// also - no cuepoints...
$json = str_replace('cuepoints', 'nocuepoints', $json);

print $json;
die();
