#!/usr/bin/php
<?php
$url_path = $argv[1];
$dir = basename($argv[1]);
mkdir("{$dir}", 0777, true);
$c = curl_init($url_path);
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
$str = curl_exec($c);
curl_close($c);
preg_match_all ("/<[iI][mM][gG].*?[Ss][Rr][Cc].*?=\"(.*?)\"/", $str, $matches);
$url_arr = $matches[1];
foreach($url_arr as &$elem) {
	if ($elem[0] == "/")
		$elem = $url_path . $elem;
}
foreach($url_arr as $elem)
{
	$img_name = basename($elem);
	$loc = $dir."/".$img_name;
	$fp = fopen($loc, 'wb');
	$ch = curl_init($elem);
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);
}
?>
