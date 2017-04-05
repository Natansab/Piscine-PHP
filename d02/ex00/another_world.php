#!/usr/bin/php
<?php
if ($argc <= 1)
	return ;
$str = $argv[1];
while (strstr($str, "  "))
	$str = preg_replace("/(  )|\s/"," ", $str);
$str = trim($str);
echo "$str\n";
?>
