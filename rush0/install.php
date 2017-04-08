<?php
$p_tab = array (
	array(1, 'cat1', 15, 'Product1', 'Description1', 'img1'),
	array(2, 'cat1', 10, 'Product2', 'Description2', 'img2'),
	array(3, 'cat2', 15, 'Product3', 'Description3', 'img3'),
	array(4, 'cat1', 15, 'Product4', 'Description4', 'img4'),
);
if (!file_exists('./products'))
	mkdir('./products', 0777, true);
if (file_exists("./products/products_table"))
	unlink('./products/products_table');
$fp = fopen('./products/products_table', 'w');
foreach($p_tab as $fields)
	fputcsv($fp, $fields);
fclose($fp);
?>
