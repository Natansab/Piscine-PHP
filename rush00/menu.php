<ul>
	<li><a href="./index.php">Home</a></li>
	<li><a href="./admin.php">Admin</a></li>
	<li><a href="./cart.php">Cart</a></li>
<?php if ($login) {
	echo '<li><a href="./logout.php">Log Out</a></li>';
	echo '<li class="welcome"> Bonjour '. $login . '</a></li>';
}
else
	echo '<li><a href="./login_index.php">Log In</a></li>';
?>
</ul>
