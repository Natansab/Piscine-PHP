<?php
session_start();
$login = $_SESSION['loggued_on_user'];
?>

<!DOCTYPE html>
<html>
	<body>
		<h1>Log In</h1>
		<form action ="login.php" method="POST">
			<label for="login">Username: </label><input type="text" name="login" id="login" value =""/>
			<br />
			<label for="passwd">Password: </lavel><input type="password" name="passwd" id="passwd" value=""/>
			<br />
			<input type="submit" name="submit" value="OK"/>
		</form>
		<br  />
		<br  />
		<a href="./create.html">Créer un compte</a><br />
		<a href="./modif.html">Modifier mon mot de passe</a>
	</body>
</html>
