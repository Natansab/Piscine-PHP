<?php
function auth($login, $passwd) {
if (!file_exists("./private/passwd"))
	return (FALSE);
$passwd = hash("whirlpool", $passwd);
$main_arr = unserialize(file_get_contents("./private/passwd"));
foreach($main_arr as $elem)
	if ($elem["login"] == $login && $elem["passwd"] == $passwd)
		return (TRUE);
return (FALSE);
}
?>
