#!/usr/bin/php
<?php
function do_op ($nb1, $op, $nb2)
{
if (($op == "/" || $op == "%") && !$nb2)
	exit_syntax();
else if ($op == "%")
	$result = $nb1 % $nb2;
else if ($op == "+")
	$result = $nb1 + $nb2;
else if ($op == "*")
	$result = $nb1 * $nb2;
else if ($op == "-")
	$result = $nb1 - $nb2;
else if ($op == "/" && $nb2)
	$result = $nb1 / $nb2;
return $result;
}
?>
<?php
function exit_syntax()
{
	echo "Syntax Error\n";
	exit ;
}
?>
<?php
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	return ;
}
$i = 0;
$argv[1] = trim($argv[1]);
if ($argv[1][$i] == "-" || $argv[1][$i] == "+")
	$i++;
if (!ctype_digit($argv[1][$i]))
	exit_syntax();
while (ctype_digit($argv[1][$i]))
	$i++;
$nb1 = substr($argv[1], 0, $i);
while($argv[1][$i] == " ")
	$i++;
if (!strstr("+-%/*", $argv[1][$i]))
	exit_syntax();
$op = $argv[1][$i];
$i++;
while($argv[1][$i] == " ")
	$i++;
$j = $i;
if ($argv[1][$i] == "-" || $argv[1][$i] == "+")
	$i++;
if (!ctype_digit($argv[1][$i]))
	exit_syntax();
while (ctype_digit($argv[1][$i]))
	$i++;
$nb2 = substr($argv[1], $j, $i - $j);
if ($i != strlen($argv[1]))
	exit_syntax();
echo do_op($nb1, $op, $nb2)."\n";
?>
