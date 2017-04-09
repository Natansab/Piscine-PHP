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
	echo "Wrong Login/Password<br />";
	echo "<a href=\"./login_index.php\">Back to login</a>";
	$_SESSION["loggued_on_user"] = "";}
?>
