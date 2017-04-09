<?php
## Handle modify Customer
if ($_POST['customer_mdfy'] == 'Modify') {

	$user_login = mysqli_real_escape_string($conn, $_POST['login']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$address = mysqli_real_escape_string($conn, $_POST['shipp_add']);
	$admin = $_POST['admin'];
	$sql = "UPDATE Customers
	SET name = '$name', address = '$address', admin = '$admin'
	WHERE login = '$user_login'";
	if (mysqli_query($conn, $sql)) {
		echo "";
	} else {
		echo "erreur" . mysqli_error($conn);
	}
}

## Handle delete customer
if ($_POST['customer_delete'] == 'Delete') {
	$user_login = mysqli_real_escape_string($conn, $_POST['login']);
	$sql = "UPDATE Customers SET status = 0 WHERE login = '$user_login'";
	if (mysqli_query($conn, $sql)) {
		echo "";
	} else {
		echo "erreur" . mysqli_error($conn);
	}

	if (file_exists("./private/passwd")) {
	$login = mysqli_real_escape_string($conn, $_POST['login']);
	$i = 0;
	$main_arr = unserialize(file_get_contents("./private/passwd"));
	foreach($main_arr as $k => $v) {
		if ($v["login"] === $login)
		{
			unset($main_arr[$k]);
			file_put_contents("./private/passwd", serialize($main_arr));
		}
		$i++;
	}
}
}
?>
