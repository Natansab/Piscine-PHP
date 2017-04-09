<?php
session_start();
$login = $_SESSION['loggued_on_user'];

$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

require_once("./admin_products.php");
require_once("./admin_customers.php");
require_once("./admin_cats.php");
require_once("./ft_tools.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Website Admin</title>
	<link rel="stylesheet" type="text/css" href="./index.css"/>
	<link rel="stylesheet" type="text/css" href="./admin.css"/>
</head>
<body>

	<div id='wrapper'>
	<?php include('menu.php') ?>

		<h1>Admin Page</h1>
				<?php
				if ($login == "" || !isset($_SESSION['loggued_on_user']) || !ft_is_admin($login)) {
					echo "<h2>Access Is Not Allowed</h2>";
				} else {?>
<div>
			<div>
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
							Category:		<input type ='text' name='Category' value='<? echo get_cats_id($row['id'])?>' required /><br />
							Price:			<input type ='number' name='Price' value='<? echo $row["price"]?>' required /><br />
							Name:			<input type ='text' name='Name' value='<? echo $row["name"]?>' required /><br />
							Description:	<input type ='text' name='Description' value='<? echo $row["description"]?>' required /><br />
							Image:			<input type ='text' name='Image' value='<? echo $row["img_path"]?>'/><br required />
							<input type="submit" name="product_mdfy" value="Modify"/>
							<input type="submit" name="product_delete" value="Delete"/>
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
						Price:			<input type ='number' name='Price' value='' required /><br />
						Name:			<input type ='text' name='Name' value='' required /><br />
						Description:	<input type ='text' name='Description' value='' required /><br />
						Image:			<input type ='text' name='Image' value=''/><br required />
						<input type="submit" name="product_add" value="Add"/>
						<br />
						<br />
					</form>
				</div>
			</div>
			<div>
				<h2>Users</h2>
				<?php
				$sql = "SELECT * FROM Customers WHERE status = 1";
				$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) { ?>
							<table>
								<tr>
									<th>Customer Login</td>
									<th>Name</td>
									<th>Shipping Address</td>
									<th>Admin</td>
									<th>Manage</td>
								</tr>
							<?php
						while ($row = mysqli_fetch_assoc($result)) {?>
								<tr>
									<form action="admin.php" method="POST">
									<td><input name="login" type="hidden" value="<?php echo $row['login']?>"/><?php echo $row['login']?></td>
									<td><input name="name" value="<?php echo $row['name']?>" ></td>
									<td><input name="shipp_add" value="<?php echo $row['address']?>"></td>
									<td><select name="admin">
										<? if ($row['admin'] == 1) {?>
										<option name="admin" value="1">Yes</option>
										<option name="admin" value="0">No</option>
										<?php }
										else {?>
										<option name="admin" value="0">No</option>
										<option name="admin" value="1">Yes</option>
										<?php } ?>
										</select>
									</td>
									<td>
										<input type="submit" name="customer_mdfy" value="Modify"/>
										<input type="submit" name="customer_delete" value="Delete"/>
									</td>
									</form>
								</tr>
	 					<?php ;};
							echo "</table>";
						}; ?>
			</div>
						<div>
							<h2>Categories</h2>
							<?php
							$sql = "SELECT * FROM Categories";
							$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) { ?>
										<table>
											<tr>
												<th>ID</td>
												<th>Name</td>
												<th>Manage</td>
											</tr>

										<?php
									while ($row = mysqli_fetch_assoc($result)) {?>
											<form action="admin.php" method="POST">
											<tr>
												<td><input name="id" type="hidden" value="<?php echo $row['id']?>"/>ID: "<?php echo $row['id']?>"</td>
												<td><input name="name" value="<?php echo $row['name']?>" ></td>
												<td>
													<input type="submit" name="cat_mdfy" value="Modify"/>
													<input type="submit" name="cat_delete" value="Delete"/>
												</td>
											</tr>
											</form>
				 					<?php ;}; ?>
											<form action="admin.php" method="POST">
											<tr>
												<td><input type="hidden" value="NEXT ID">SOON:</td>
												<td><input name="name" value="New Category" ></td>
												<td>
													<input type="submit" name="cat_add" value="Add"/>
												</td>
											</form>
											</tr>

										</table>
									<?php	mysqli_close($conn);
								};} ?>
						</div>
			<br />
		</div>
	</div>
	</body>
	</html>
