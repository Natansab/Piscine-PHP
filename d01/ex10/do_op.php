#!/usr/bin/php
<?php
if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	return ;
}
$my_array = array(trim($argv[1]),trim($argv[2]),trim($argv[3]));
if (($my_array[1] == "%" || $my_array[1] == "/") && $my_array[2] == 0)
	{
	echo "Incorrect Parameters\n";
	return ;
	}
if ($my_array[1] == "%")
	$result = $my_array[0] % $my_array[2];
else if ($my_array[1] == "+")
	$result = $my_array[0] + $my_array[2];
else if ($my_array[1] == "*")
	$result = $my_array[0] * $my_array[2];
else if ($my_array[1] == "-")
	$result = $my_array[0] - $my_array[2];
else if ($my_array[1] == "/")
	$result = $my_array[0] / $my_array[2];
else
	return ;
echo $result."\n";
?>
