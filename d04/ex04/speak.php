<?php
session_start();
$username = $_SESSION['loggued_on_user'];
?>
<html>
<head>
	<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
<form action="./speak.php" method="POST">
			<input type="text" name="msg" value="" width="1000px"/>
			<input type="submit" name="submit" value="OK"/>
</form>
</body>
</html>
<?php
$msg_arr = array(
	"login"	=> $username,
	"time"	=> time(),
	"msg"	=> $_POST['msg'],
);
if (!file_exists("../private"))
	mkdir("../private", 0777, true);
if (file_exists("../private/chat")) {
	$main_arr = unserialize(file_get_contents("../private/chat"));
$main_arr[] = $msg_arr;
file_put_contents("../private/chat", serialize($main_arr));}
?>
