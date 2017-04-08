<?php
include "./auth.php";
session_start();
$login =  $_POST["login"];
$passwd = $_POST["passwd"];
if (auth($login, $passwd)) {
?>
<iframe src="chat.php" id='chat' name='chat' width='100%' height='550px'></iframe>
<iframe src="speak.php" width='100%' height='50px'></iframe>
<?php
	$_SESSION["loggued_on_user"] = $login;}
else {
	echo "ERROR\n";
	$_SESSION["loggued_on_user"] = "";}
?>
