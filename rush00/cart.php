<?php
session_start();
include 'ft_tools.php';
// echo "current cart: <br />";
// $login = (isset($_SESSION["loggued_on_user"]) && $_SESSION["loggued_on_user"] != "") ? $_SESSION["loggued_on_user"] : "";
// var_dump($_SESSION['cart']);
// echo "user:" . $login;
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

// Buying process
if ($_POST['submit'] == 'buy' && isset($_SESSION["loggued_on_user"]) &&
		!$_SESSION["loggued_on_user"] == "" && isset($_SESSION['cart'])) {
	$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
	$sql = "INSERT INTO Orders (login, nb_of_products, total, date)
	VALUES ('".$_SESSION["loggued_on_user"]."','".array_sum($_SESSION['cart'])."', '".total_cart($_SESSION['cart'])."' , '".date("d-m-Y")."');";
	if (mysqli_query($conn, $sql) == false) {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
	$_SESSION['cart'] = NULL;
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
			<div id="current_cart">
				<h2>Current Cart</h2>
				<?php
					if (!$_SESSION['cart'] || !array_sum($_SESSION['cart']))
					echo "Your cart is empty 👉 <a href=\"./index.php\">GO TO SHOP 🎉</a>";
					else {
						$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
						if (!$conn)
						die("Connection failed: " . mysqli_connect_error());
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
								<?php }} mysqli_close($conn); ?>
								<div class="cart_total">
									<hr />
									<h3>Total : $<?php echo total_cart($_SESSION['cart']) ?></h3>
									<form action='cart.php' method='post'>
										<button name="submit" value="buy">Buy</button>
									</form>
									<?php
									if ($_POST['submit'] == 'buy')
										if (!isset($_SESSION["loggued_on_user"]) || $_SESSION["loggued_on_user"] == "")
											echo "You must but loggued in to complete purchase 👉 <a href=\"login_index.php\">Log In</a>";
									?>
									<hr />
								</div>
							</div>
							<?php }?>


				<div id="archieved_carts">
				<h2>Past Orders</h2>
				<?php
				$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
				if (!$conn) {die("Connection failed: " . mysqli_connect_error());};
				$result = mysqli_query($conn, "SELECT * FROM Orders WHERE login = '$login'");
				if (mysqli_num_rows($result) > 0) {?>
						<table>
							<tr>
								<th>Order #</td>
								<th>Date Of Order</td>
								<th># Products</td>
								<th>Total Paid</td>
							</tr>
						<?php
					while ($row = mysqli_fetch_assoc($result)) {?>
							<tr>
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['date'] ?></td>
								<td><?php echo $row['nb_of_products'] ?></td>
								<td>$<?php echo $row['total'] ?></td>
							</tr>
 					<?php ;};
						echo "</table>";
					}; ?>
							</div>
						</div>
					</body>
					</html>
