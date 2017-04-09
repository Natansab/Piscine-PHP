<?php
function total_cart($cart_arr) {
if (!$cart_arr)
	return 0;
$conn = mysqli_connect($servername, $username, $password, "SHOP_DATABASE");
foreach($cart_arr as $id => $qty) {
	$result = mysqli_query($conn, "SELECT price FROM Products WHERE id = $id LIMIT 1");
	$value = mysqli_fetch_object($result);
	$total += intval($qty * $value->price);
}
return ($total);
}
