<?php
session_start();
include 'ft_tools.php';
// echo "current cart: <br />";
// var_dump($_SESSION['cart']);

// Update Cart
if ($_POST['less'] == '-')
{
	if ($_SESSION['cart'][intval($_POST['id'])] > 1)
	$_SESSION['cart'][intval($_POST['id'])] -= 1;
	else
	($_SESSION['cart'][intval($_POST['id'])] = 0);
}
if ($_POST['more'] == '+')
$_SESSION['cart'][intval($_POST['id'])] += 1;
if ($_POST['remove'] == 'remove')
$_SESSION['cart'][intval($_POST['id'])] = 0;
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
		<?php if (isset($_SESSION['cart'])) {?>
			<div id="current_cart">
				<h2>Current Cart</h2>
				<?php
				if (isset($_SESSION['cart'])) {
					$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					foreach($_SESSION['cart'] as $id => $qty) {
						$sql = "SELECT * FROM Products WHERE id = $id";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0 && $qty > 0) {
							$row = mysqli_fetch_assoc($result);
							?>
							<div class='product'>
								<img class='img_product' src=<?php echo $row["img_path"] ?> /><br />
								Product Name: <?php echo $row["name"] ?> <br />
								Quantity: <?php echo $qty ?> <br />
								Price: $<?php echo $row["price"] ?> <br />
								<form action='cart.php' method='post'>
									<input type='hidden' name='id' value=<?php echo $id ?>>
									<button name="less" value="-">-</button>
									<button name="more" value="+">+</button>
									<button name="remove" value="remove">Remove</button>
								</form>
								<br />
							</div>
							<?php }} mysqli_close($conn); }?>
							<div class="cart_total">
								<hr />
								<h3>Total : $<?php echo total_cart($_SESSION['cart']) ?></h3>
								<form>
									<button name="submit" value="buy">Buy</button>
								</form>
								<hr />
							</div>
						</div>
						<?php }?>
						<div id="archieved_carts">
							<h2>Past Orders</h2>
						</div>
					</div>
				</body>
				</html>
