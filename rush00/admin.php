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
	<title>Website Admin</title>
	<link rel="stylesheet" type="text/css" href="./index.css"/>
</head>
<body>
	<?php include('menu.php') ?>
	<div id='wrapper'>
		<h1>Admin Page</h1>
		<div id='prducts_section'>
			<h2>Products</h2>
			<h3>Manage Existing Products</h3>
			<?php
			$row = 1;
			if (file_exists('./tables/products_table.csv') &&
					($handle = fopen('./tables/products_table.csv', 'r')) !== FALSE) {
				$flag = true;
		    	while (($data = fgetcsv($handle)) !== FALSE)
				{
					if ($flag || !$data[6]) {
						$flag = false;
						continue;}
					?>
					<form action ="admin.php" method="POST">
					<strong>Product #<?php echo $data[0] ?><input type ='hidden' name='ID' value='<? echo $data[0]?>' required/></strong><br />
					Category:		<input type ='text' name='Category' value='<? echo $data[1]?>' required /><br />
					Price:			<input type ='text' name='Price' value='<? echo $data[2]?>' required /><br />
					Name:			<input type ='text' name='Name' value='<? echo $data[3]?>' required /><br />
					Description:	<input type ='text' name='Description' value='<? echo $data[4]?>' required /><br />
					Image:			<input type ='text' name='Image' value='<? echo $data[5]?>'/><br required />
					<input type="submit" name="submit" value="Modify"/>
					<input type="submit" name="submit" value="Delete"/>
					<br />
					<br />
					</form>
					<?php
				}
				fclose($handle);}
			?>
			<h3>Add Product</h3>
			<form action ="admin.php" method="POST">
			<strong>New Product:</strong><br />
			Category:		<input type ='text' name='Category' value='' required /><br />
			Price:			<input type ='text' name='Price' value='' required /><br />
			Name:			<input type ='text' name='Name' value='' required /><br />
			Description:	<input type ='text' name='Description' value='' required /><br />
			Image:			<input type ='text' name='Image' value=''/><br required />
			<input type="submit" name="submit" value="Add"/>
			<br />
			<br />
			</form>

		</div>
	</div>
	<a href="./index.php">Back to homepage</a>
</body>
</html>
