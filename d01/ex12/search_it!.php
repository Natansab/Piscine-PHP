#!/usr/bin/php
<?php
if ($argc <= 2)
	return ;
for ($i = 2; $i <= $argc; $i++)
	if (!strncmp($argv[1], $argv[$i], strlen($argv[1])))
		$success = $i;
if (!$success)
	return ;
$i = strlen($argv[1]);
if ($argv[$success][$i] != ':' || strlen($argv[$success]) <= strlen($argv[1] + 1))
	return ;
$output = substr($argv[$success], strlen($argv[1]) + 1);
echo "$output\n";
?>
