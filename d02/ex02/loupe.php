#!/usr/bin/php
<?php
if ($argc == 1 || (@fopen($argv[1], "r") === FALSE))
	return ;
$file = file_get_contents($argv[1]);
echo $file;
return $file;
?>
