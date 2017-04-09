<?php
session_start();
$login = $_SESSION['loggued_on_user'];

$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

## Handle delete product
if ($_POST['submit'] == 'Delete') {
	$id = intval($_POST['ID']);
	$sql = "UPDATE Products SET is_active = 0 WHERE id = '$id'";
	if (mysqli_query($conn, $sql)) {
		echo "1Record updated successfully";
	} else {
		echo "2Error updating record: " . mysqli_error($conn);
	}
}

## Handle modify product
if ($_POST['submit'] == 'Modify') {
	$id = intval($_POST['ID']);

	$category = mysqli_real_escape_string($conn, $_POST['Category']);
	$price = intval($_POST['Price']);
	$name = mysqli_real_escape_string($conn, $_POST['Name']);
	$description = mysqli_real_escape_string($conn, $_POST['Description']);
	$img_path = mysqli_real_escape_string($conn, $_POST['Image']);
	$sql = "UPDATE Products
	SET name = '$name', price = '$price', description = '$description', img_path = '$img_path'
	WHERE id = '$id'";
	if (mysqli_query($conn, $sql)) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}
}

## Handle add product
if ($_POST['submit'] == 'Add') {

	$category = mysqli_real_escape_string($conn, $_POST['Category']);
	$price = intval($_POST['Price']);
	$name = mysqli_real_escape_string($conn, $_POST['Name']);
	$description = mysqli_real_escape_string($conn, $_POST['Description']);
	$img_path = mysqli_real_escape_string($conn, $_POST['Image']);
	$sql = "INSERT INTO Products (price, name, description, img_path, is_active)
	VALUES ('$price', '$name', '$description', '$img_path', 1)";
	if (mysqli_query($conn, $sql)) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Website Admin</title>
	<link rel="stylesheet" type="text/css" href="./index.css"/>
	<link rel="stylesheet" type="text/css" href="./admin.css"/>
</head>
<body>
	<?php include('menu.php') ?>
	<div id='wrapper'>
		<div id='prducts_section'>
		<h1>Admin Page</h1>
			<h2>Products</h2>
			<h3>Manage Existing Products</h3>
			<div class="manage_product_box">
				<?php
				$sql = "SELECT * FROM Products WHERE is_active = 1";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						?>
						<form action="admin.php" class="manage_product_item" method="POST">
							<strong>Product #<?php echo $row["id"] ?><input type ='hidden' name='ID' value='<? echo $row["id"]?>' required/></strong><br />
							Category:		<input type ='text' name='Category' value='<? echo $row["name"]?>' required /><br />
							Price:			<input type ='text' name='Price' value='<? echo $row["price"]?>' required /><br />
							Name:			<input type ='text' name='Name' value='<? echo $row["name"]?>' required /><br />
							Description:	<input type ='text' name='Description' value='<? echo $row["description"]?>' required /><br />
							Image:			<input type ='text' name='Image' value='<? echo $row["img_path"]?>'/><br required />
							<input type="submit" name="submit" value="Modify"/>
							<input type="submit" name="submit" value="Delete"/>
							<br />
							<br />
						</form>
						<?php
					}}
					?>
				</div>
				<div class="add_product_box">
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
		</div>
		<a href="./index.php">Back to homepage</a>
	</body>
	</html>
