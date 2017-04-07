<?php
if (file_exists("../private/chat")) {
	$main_arr = unserialize(file_get_contents("../private/chat"));
	foreach($main_arr as $elem)
		echo "<strong>". $elem['login'] . "</strong> (" . date("d-G:i:s",$elem['time']) . "):
					" . $elem['msg'] . "<br />";}
?>
