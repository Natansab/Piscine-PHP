<?php
session_start();
$login = $_SESSION['loggued_on_user'];
if (!isset ($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
	echo "YO\n";
}
if ($_POST["addtocart"] == "Add To Cart")
{
	$_SESSION['cart'][$_POST["product_id"]] += 1;
	echo "current cart: <br />";
	var_dump($_SESSION['cart']);
}
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
			$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "SELECT * FROM Products";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)) {
			?>
			<div class='product'>
			<img class='img_product' src=<?php echo $row["img_path"] ?> /><br />
			Product Name: <?php echo $row["name"] ?> <br />
			Product Price: <?php echo $row["price"];?>$<br />
			<form action="index.php" method="post">
				<input type="hidden" name="product_id" value="<?php echo $row["id"] ?>">Add To Cart</input>
				<button name="addtocart" value="Add To Cart">Add To Cart</button>
			</form>
			<br />
			</div>
		<?php }} mysqli_close($conn);?>
		</div>
	</div>
</body>
</html>
