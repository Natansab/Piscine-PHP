#!/usr/bin/php
<?php
function wrong_format()
{
	echo "Wrong Format\n";
	exit;
}
?>
<?php
ini_set('date.timezone', 'Europe/Paris');
setlocale(LC_TIME, "fr_FR");
$arr_month = array
	("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
	"Août", "Septembre", "Octobre", "Novembre", "Décembre");
$arr_day = array
	("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
if ($argc != 2)
	return ;

// STRING FORMAT: Mardi 12 novembre 2013 12:02:21
if (preg_match_all("/^[A-Z]?[a-z]* [0-9]{1,2} [A-Z]?[a-zéô]* [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$/", $argv[1]) !== 1)
	wrong_format() ;
$arr_date = explode(" ", $argv[1]);
$day = $arr_date[1];
if ($day <= 0 || $day >= 31)
	wrong_format() ;

if (array_search(ucfirst($arr_date[2]), $arr_month) !== FALSE)
	$month = array_search(ucfirst($arr_date[2]), $arr_month) + 1;
else
	wrong_format() ;
$year = $arr_date[3];
$hour = substr($arr_date[4], 0, 2);
$minute = substr($arr_date[4], 3, 2);
$second = substr($arr_date[4], 6, 2);
if (array_search(ucfirst($arr_date[0]), $arr_day) !== FALSE)
	$wday = array_search(ucfirst($arr_date[0]), $arr_day);
else
	wrong_format() ;
if ($hour > 23 || $minute >= 60 || $seconde >= 60)
	wrong_format() ;
$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
if (date("w", $timestamp) != $wday)
	wrong_format() ;
echo $timestamp;
?>
