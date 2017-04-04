<?php
function ft_is_sort($array1)
{
$array2 = $array1;
sort($array1);
foreach($array1 as $key=>$elem)
	if ($array2[$key] != $elem)
		return (0);
return (1);
}
?>
