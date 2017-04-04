<?php
function ft_split($string)
{
	$my_array = preg_split("/[\s]+/", $string, 0, PREG_SPLIT_NO_EMPTY);
	return $my_array;
}
?>
