<?php

require_once('./ft_tools.php');

## Handle delete product
if ($_POST['product_delete'] == 'Delete') {
	$id = $_POST['ID'];
	$sql = "UPDATE Products SET is_active = 0 WHERE id = '$id'";
	if (mysqli_query($conn, $sql)) {
		echo "";
	} else {
		echo "" . mysqli_error($conn);
	}
}

## Handle modify product
if ($_POST['product_mdfy'] == 'Modify') {
	$id = mysqli_real_escape_string($conn, $_POST['ID']);
	$category = mysqli_real_escape_string($conn, $_POST['Category']);
	put_products_cat($category, $id);
	$price = $_POST['Price'];
	$name = mysqli_real_escape_string($conn, $_POST['Name']);
	$description = mysqli_real_escape_string($conn, $_POST['Description']);
	$img_path = mysqli_real_escape_string($conn, $_POST['Image']);
	$sql = "UPDATE Products
	SET name = '$name', price = '$price', description = '$description', img_path = '$img_path'
	WHERE id = '$id'";
	if (mysqli_query($conn, $sql)) {
		echo "";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}
}


## Handle add product
if ($_POST['product_add'] == 'Add') {

	$category = mysqli_real_escape_string($conn, $_POST['Category']);
	$price = $_POST['Price'];
	$name = mysqli_real_escape_string($conn, $_POST['Name']);
	$description = mysqli_real_escape_string($conn, $_POST['Description']);
	$img_path = mysqli_real_escape_string($conn, $_POST['Image']);
	$sql = "INSERT INTO Products (price, name, description, img_path, is_active)
	VALUES ('$price', '$name', '$description', '$img_path', 1)";
	if (mysqli_query($conn, $sql)) {
		echo "";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}
}

?>
