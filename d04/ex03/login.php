<?php
include "./auth.php";
session_start();
$login =  $_GET["login"];
$passwd = $_GET["passwd"];
if (auth($login, $passwd)) {
	echo "OK\n";
	$_SESSION["loggued_on_user"] = $login;}
else {
	echo "ERROR\n";
	$_SESSION["loggued_on_user"] = "";}
print_r($_SESSION);
?>
