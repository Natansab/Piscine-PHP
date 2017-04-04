#!/usr/bin/php
<?php
echo "Entrez un nombre : ";
$stdin = fopen('php://stdin', 'r');
while ($data = fgets($stdin))
{
	$data = rtrim($data, "\n");
	if (!ctype_digit($data) || strlen($data) > 18)
		echo "'$data' n'est pas un chiffre";
	else if ($data % 2)
		echo "Le chiffre $data est Impair";
	else
		echo "Le chiffre $data est Pair";
	echo "\n";
	echo "Entrez un nombre : ";
}
?>
