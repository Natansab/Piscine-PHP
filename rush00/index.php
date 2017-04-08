<?php
session_start();
$login = $_SESSION['loggued_on_user'];
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
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
			// Check connection
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
			Product Price: <?php echo $row["price"] ?>$<br />
			<br />
			</div>
		<?php }} ?>
		</div>
	</div>
</body>
</html>
