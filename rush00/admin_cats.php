<?php
## Handle modify Category
if ($_POST['cat_mdfy'] == 'Modify') {

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$sql = "UPDATE Categories SET name = '$name' WHERE id = $id";
	if (mysqli_query($conn, $sql)) {
		echo "";
	} else {
		echo "erreur" . mysqli_error($conn);
	}
}

## Handle delete Category
if ($_POST['cat_delete'] == 'Delete') {
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$sql = "DELETE FROM Categories WHERE id = $id";
	mysqli_query($conn, $sql);
	$sql = "DELETE FROM category_product WHERE cat_id = $id";
	mysqli_query($conn, $sql);
}

## Handle add Cat
if ($_POST['cat_add'] == 'Add') {

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$sql = "INSERT INTO Categories (name) VALUES ('$name')";
	if (mysqli_query($conn, $sql)) {
		echo "";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}
}
?>
