<?php

## Check if the folder ./tables exists. If not creates it
if (!file_exists('./tables'))
	mkdir('./tables', 0777, true);

## Initial Products Table
$p_tab = array (
	array('ID', 'Category', 'Price', 'Name', 'Description', 'Img_path', 'Active'),
	array(1, 'cat1', 15, 'Product1', 'Description1', 'img1', 1),
	array(2, 'cat1', 10, 'Product2', 'Description2', 'img2', 0),
	array(3, 'cat2', 15, 'Product3', 'Description3', 'img3', 1),
	array(4, 'cat1', 15, 'Product4', 'Description4', 'img4', 1),
);

if (file_exists("./tables/products_table.csv"))
	unlink('./tables/products_table.csv');
$fp = fopen('./tables/products_table.csv', 'w');
foreach($p_tab as $fields)
	fputcsv($fp, $fields);
fclose($fp);

## Initial Users Table
$u_tab = array (
	array('Login', 'Passwd', 'Name', 'Address', 'Orders', 'Admin'),
	array('User1', 'HashedPasswd', 'Name1', 'Address1', '10-11', 1),
	array('User2', 'HashedPasswd', 'Name2', 'Address2', '12', 0),
);

if (file_exists('./tables/users_table.csv'))
	unlink('./tables/users_table.csv');
$fp = fopen('./tables/users_table.csv', 'w');
foreach($u_tab as $fields)
	fputcsv($fp, $fields);
fclose($fp);

## Initial Orders Table
$o_tab = array (
	array('ID', 'User', 'Products', 'Total_price', 'Date_of_order', 'Status'),
	array('10', 'User1', '2-1-1-4', 55, '-', 'Validated'),
	array('11', 'User1', '2', 10, '-', 'Pending'),
	array('12', 'User2', '2-3-1-4', 60, '-', 'Pending'),
);

if (file_exists('./tables/oders_table.csv'))
	unlink('./tables/orders_table.csv');
$fp = fopen('./tables/orders_table.csv', 'w');
foreach($o_tab as $fields)
	fputcsv($fp, $fields);
fclose($fp);
?>
