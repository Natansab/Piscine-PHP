<?php
include "./auth.php";
session_start();
$login =  $_POST["login"];
$passwd = $_POST["passwd"];
if (auth($login, $passwd)) {
	$_SESSION["loggued_on_user"] = $login;
	header('Location: ./index.php');
	}
else {
	echo "ERROR\n";
	$_SESSION["loggued_on_user"] = "";}
?>
