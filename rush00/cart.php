<?php
session_start();
$login = $_SESSION['loggued_on_user'];

include './ft_tools.php';

## Handle delete product
if ($_POST['submit'] == 'Delete') {
	$id = $_POST['ID'];
	$new_p_line = array($id, $_POST['Category'], $_POST['Price'], $_POST['Name'], $_POST['Description'], $_POST['Image'], 0);
	change_value_csv('./tables/products_table', $id, $new_p_line);
}

## Handle modify product
if ($_POST['submit'] == 'Modify') {
	$id = $_POST['ID'];
	$new_p_line = array($_POST['ID'], $_POST['Category'], $_POST['Price'], $_POST['Name'], $_POST['Description'], $_POST['Image'], 1);
	change_value_csv('./tables/products_table', $id, $new_p_line);
}

## Handle add product
if ($_POST['submit'] == 'Add') {
	$fp = fopen('./tables/products_table.csv', 'r');
	$flag = true;
	while (($data = fgetcsv($fp)) !== FALSE) {
		if ($flag) {
			$flag = false;
			continue ;}
		$id_array[] = $data[0];}
	fclose($fp);
	$new_id = max($id_array) + 1;
	$new_p_line = array($new_id, $_POST['Category'], $_POST['Price'], $_POST['Name'], $_POST['Description'], $_POST['Image'], 1);
	$fp = fopen('./tables/products_table.csv', 'a');
	fputcsv($fp, $new_p_line);
	fclose($fp);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="./index.css"/>
</head>
<body>
	<?php include('menu.php') ?>
	<div id='wrapper'>
		<div id='prducts_section'>
			<h2>Current Cart</h2>
			<?php
			$row = 1;
			if (file_exists('./tables/carts_table.csv') &&
					($handle = fopen('./tables/carts_table.csv', 'r')) !== FALSE) {
				$flag = true;
		    	while (($data = fgetcsv($handle)) !== FALSE)
				{
					if ($flag) {
						$flag = false;
						continue;}
					if ($login = $data[1])
					{
						$cart_id = $data[0];
						break;
					}
				}
				fclose($handle);}
			?>
	</div>
</body>
</html>
