#!/usr/bin/php
<?php
if ($argc == 1)
	return ;
function ft_split($string)
{
	$my_array = preg_split("/[\s]+/", $string, 0, PREG_SPLIT_NO_EMPTY);
	return $my_array;
}
$array =  ft_split($argv[1]);
for ($i = 2; $i < $argc; $i++)
	$array = array_merge($array, ft_split($argv[$i]));
sort($array);
foreach($array as $elem)
	echo "$elem\n";
?>
