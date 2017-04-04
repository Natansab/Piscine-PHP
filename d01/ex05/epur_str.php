#!/usr/bin/php
<?php
if ($argc != 2)
	return;
while (strstr($argv[1], "  "))
	$argv[1] = str_replace("  ", " ", $argv[1]);
$argv[1] = ltrim($argv[1]);
$argv[1] = rtrim($argv[1]);
echo "$argv[1]\n";
?>
