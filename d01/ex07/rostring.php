#!/usr/bin/php
<?php
if ($argc == 1)
	return ;
$array = preg_split("/[\s]+/", $argv[1], 0, PREG_SPLIT_NO_EMPTY);
for($i = 1; $i < count($array); $i++)
	echo "$array[$i] ";
echo "$array[0]\n";
?>
