<?php
if ($_POST["submit"] != "Create Account" || $_POST["login"] == "" || $_POST["passwd"] == "") {
	echo "ERROR\n";
	echo "<br  /><a href=\"./login_index.php\">Retour</a>";
	return ;
}
$info_arr = array(
	"login"		=> $_POST['login'],
	"passwd"	=> hash("whirlpool", $_POST['passwd']),
);
if (!file_exists("./private"))
	mkdir("./private", 0777, true);
if (file_exists("./private/passwd")) {
	$main_arr = unserialize(file_get_contents("./private/passwd"));
	foreach($main_arr as $elem)
		if ($elem["login"] === $info_arr["login"])
		{
			echo "Username not available\n";
			echo "<br  /><a href=\"./login_index.php\">Retour</a>";
			return ;
		}
}

$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
$login = mysqli_real_escape_string($conn, $info_arr['login']);
$password = mysqli_real_escape_string($conn, $info_arr['passwd']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$shipp_add = mysqli_real_escape_string($conn, $_POST['shipp_add']);
$admin = ($_POST['admin'] == "42") ? 1 : 0;
$sql = "INSERT INTO Customers (login, password, name, address, admin, status)
VALUES ('".$login."', '".$password."', '".$name."', '".$shipp_add."', '".$admin."', 1);";

$main_arr[] = $info_arr;
file_put_contents("./private/passwd", serialize($main_arr));

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully<br />";
	echo "Log In <a href=\"./login_index.php\">here</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
// header('Location: ./login_index.php');
?>
