#!/usr/bin/php
<?php
if ($argc != 2)
	return;
$my_array = array_filter(explode(" ", $argv[1]));
if (count($my_array) > 0)
	echo implode(" ", $my_array)."\n";
?>
