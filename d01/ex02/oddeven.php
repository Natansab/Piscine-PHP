#!/usr/bin/php
<?php
echo "Entrez un nombre : ";
$stdin = fopen('php://stdin', 'r');
while ($data = fgets($stdin))
{
	$data = rtrim($data, "\n");
	if (!ctype_digit($data) && !(($data[0] == '-' || $data[0] == '+')
			&& ctype_digit(substr($data, 1))))
		echo "'$data' n'est pas un chiffre";
	else if ($data[0] == '-')
		echo "Une pile ne peut etre negative !~#?😞";
	else if ($data[strlen($data) - 1] % 2)
		echo "Le chiffre $data est Impair";
	else
		echo "Le chiffre $data est Pair";
	echo "\n";
	echo "Entrez un nombre : ";
}
?>
