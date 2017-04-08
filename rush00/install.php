<?php

## Check if the folder ./tables exists. If not creates it
if (!file_exists('./tables'))
	mkdir('./tables', 0777, true);

## Initial Products Table
$p_tab = array (
	array('ID', 'Category', 'Price', 'Name', 'Description', 'Img_path', 'Active'),
	array(1, 'Truman', 15, 'Truman - Blue', 'The Truman handle is designed with a rubberized matte exterior, texturized grip pattern, and weighted core for maximum grip and control. It may be the best-looking thing in your bathroom (other than you.)', './img/truman_blue.jpg', 1),
	array(2, 'Truman', 15, 'Truman - Green', 'The Truman handle is designed with a rubberized matte exterior, texturized grip pattern, and weighted core for maximum grip and control. It may be the best-looking thing in your bathroom (other than you.)', './img/truman_green.jpg', 1),
	array(3, 'Truman', 15, 'Truman - Orange', 'The Truman handle is designed with a rubberized matte exterior, texturized grip pattern, and weighted core for maximum grip and control. It may be the best-looking thing in your bathroom (other than you.)', './img/truman_orange.jpg', 1),
	array(4, 'Winston', 15, 'Winston - Silver', 'The ergonomic body is made of die-cast zinc and polished chrome for a handsome finish and a rubberized grip for optimal control. For a more personalized experience, get it engraved.', './img/winston_silver.jpg', 1),
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
