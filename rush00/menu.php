<?php
session_start();
$nb_items = 0;
if (isset($_SESSION['cart']))
	$nb_items = array_sum($_SESSION['cart']);
?>
<ul>
	<li><a href="./index.php">Shop</a></li>
	<li><a href="./admin.php">Admin</a></li>
	<li><a href="./cart.php">Cart (<?php echo $nb_items ?>)</a></li>
<?php if (($login = $_SESSION["loggued_on_user"])) {
	echo '<li><a href="./logout.php">Log Out</a></li>';
	echo '<li class="welcome"> Hello '. $login . '😎👋</a></li>';
}
else
	echo '<li><a href="./login_index.php">Log In</a></li>';
?>
</ul>
