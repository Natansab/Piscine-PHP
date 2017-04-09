<?php
function total_cart($cart_arr) {
if (!$cart_arr)
	return 0;
$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
foreach($cart_arr as $id => $qty) {
	$result = mysqli_query($conn, "SELECT price FROM Products WHERE id = $id LIMIT 1");
	$value = mysqli_fetch_array($result);
	$total += intval($qty * $value['price']);
}
mysqli_close($conn);
return ($total);
}

function ft_is_admin($login) {
if ($login == "")
	return 0;
$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
$result = mysqli_query($conn, "SELECT admin FROM Customers WHERE login = '$login' LIMIT 1");
$value = mysqli_fetch_array($result);
mysqli_close($conn);
return ($value['admin']);
}

function get_cats($product_id)
{
	$string = "";
	$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
	$result = mysqli_query($conn, "SELECT DISTINCT name FROM categories LEFT JOIN
				category_product ON category_product.cat_id = categories.id
					WHERE category_product.prod_id = $product_id");
	if ($row = mysqli_fetch_assoc($result))
		$string = $row['name'];
	while ($row = mysqli_fetch_assoc($result)) {
		$string = $string . ", " . $row['name'];
	}
	return($string);
}

function get_cats_id($product_id)
{
	$string = "";
	$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
	$result = mysqli_query($conn, "SELECT DISTINCT cat_id FROM category_product WHERE prod_id = $product_id");
	if ($row = mysqli_fetch_assoc($result))
		$string = $row['cat_id'];
	while ($row = mysqli_fetch_assoc($result))
		$string = $string . " , " . $row['cat_id'];
	return($string);
}

function put_products_cat($categories, $id)
{
	$string = "";
	$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");

	$sql = "DELETE FROM category_product WHERE prod_id = $id";
	mysqli_query($conn, $sql);

	$array = explode(",", $categories);
	if ($array)
		foreach($array as $elem)
		{
			$sql = "INSERT INTO category_product (prod_id, cat_id) VALUES ($id, $elem);";
			mysqli_query($conn, $sql);
		}
}
?>
