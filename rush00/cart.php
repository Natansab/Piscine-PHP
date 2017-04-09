<?php
session_start();
	echo "current cart: <br />";
	var_dump($_SESSION['cart']);

// Update Cart
echo intval($_POST['id']);
if ($_POST['less'] == '-')
	$_SESSION['cart'][intval($_POST['id'])] -= 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shope Homepage</title>
	<link rel="stylesheet" type="text/css" href="./index.css"/>
</head>
<body>
	<div id='wrapper'>
		<?php include('menu.php') ?>
		<div id='prducts_section'>
			<h1>All products</h1>
			<?php
			if (isset($_SESSION['cart'])) {
			$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}			foreach($_SESSION['cart'] as $id => $qty)
			{
			$sql = "SELECT * FROM Products WHERE id = $id";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			?>
			<div class='product'>
			<img class='img_product' src=<?php echo $row["img_path"] ?> /><br />
			Product Name: <?php echo $row["name"] ?> <br />
			Quantity: <?php echo $qty ?> <br />
			Product ID: <?php echo $id ?> <br />
			<form action='cart.php' method='post'>
				<input type='hidden' name='id' value=<?php echo $id ?>>
				<button name="less" value="-">-</button>
				<button name="more" value="+">+</button>
				<button name="remove" value="remove">Remove</button>
			</form>
			</form>
			<br />
			</div>
		<?php }} mysqli_close($conn); }?>
		</div>
	</div>
</body>
</html>
