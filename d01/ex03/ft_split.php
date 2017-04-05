<?php
function ft_split($string)
{
	$my_array = array_filter(explode(" ", $string));
	if (count($my_array) > 0)
	{
		sort($my_array);
		return $my_array;
	}
}
?>
