<?php
if (file_exists("./private/passwd")) {

if ($_POST["submit"] != "OK" || $_POST["login"] == "" ||
			$_POST["oldpw"] == "" || $_POST["newpw"] == "") {
	echo "ERROR\n";
	echo "<br  /><a href=\"./login_index.php\">Retour</a>";
	return ;
}
$info_arr = array(
	"login"	=> $_POST['login'],
	"odlpw"	=> hash("whirlpool", $_POST['oldpw']),
	"newpw"	=> hash("whirlpool", $_POST['newpw']),
);
$main_arr = unserialize(file_get_contents("./private/passwd"));
foreach($main_arr as &$elem)
	if ($elem["login"] === $info_arr["login"] &&
					$elem["passwd"] === $info_arr["odlpw"])
	{
		$elem["passwd"] = $info_arr["newpw"];
		file_put_contents("./private/passwd", serialize($main_arr));
		header('Location: ./login_index.php');
		return ;
	}
echo "ERROR\n";
}
?>
