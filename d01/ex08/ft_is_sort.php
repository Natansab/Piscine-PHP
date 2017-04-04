<?php
function ft_is_sort($array1)
{
$error = 0;
$array2 = $array1;
sort($array2);
foreach($array2 as $key=>$elem)
	if ($array1[$key] != $elem)
		$error = 1;
if (!$error)
	return 1;
$array2 = $array1;
rsort($array2);
foreach($array2 as $key=>$elem)
	if ($array1[$key] != $elem)
		return 0;
return 1;
}
// diff_array_assoc(***)
?>
