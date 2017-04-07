<?php
if ($_POST["submit"] != "OK" || $_POST["login"] == "" || $_POST["passwd"] == "") {
	echo "ERROR\n";
	echo "<br  /><a href=\"./index.html\">Retour</a>";
	return ;
}
$info_arr = array(
	"login"		=> $_POST['login'],
	"passwd"	=> hash("whirlpool", $_POST['passwd']),
);
if (!file_exists("../private"))
	mkdir("../private", 0777, true);
if (file_exists("../private/passwd")) {
	$main_arr = unserialize(file_get_contents("../private/passwd"));
	foreach($main_arr as $elem)
		if ($elem["login"] === $info_arr["login"])
		{
			echo "ERROR\n";
			echo "<br  /><a href=\"./index.html\">Retour</a>";
			return ;
		}
}
$main_arr[] = $info_arr;
file_put_contents("../private/passwd", serialize($main_arr));
header('Location: http://e2r5p5.42.fr:8080/Piscine-PHP/d04/ex04/index.html');
?>
