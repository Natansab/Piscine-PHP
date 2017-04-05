#!/usr/bin/php
<?php
function match (array $matches) {

	$matches[0] = preg_replace_callback("/>(.*?)</", function($matches) {
		$matches[1] = strtoupper($matches[1]);
		$matches[0] = ">".$matches[1]."<";
		return ($matches[0]);}, $matches[0]);

	$matches[0] = preg_replace_callback("/title=\"(.*?)\"/", function($matches) {
		$matches[1] = strtoupper($matches[1]);
		$matches[0] = "title=\"".$matches[1]."\"";
		return ($matches[0]);}, $matches[0]);

	return ($matches[0]);
}
?>
<?php
if ($argc == 1 || (@fopen($argv[1], "r") === FALSE))
	return ;
$file = file_get_contents($argv[1]);
$file = preg_replace_callback("/<a(.*?)>(.*?)<\/a>/", "match" , $file);
echo $file;
?>
