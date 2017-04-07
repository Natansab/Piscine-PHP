<?php
session_start();
if ($_GET["submit"] == "OK") {
$_SESSION["login"] = $_GET["login"];
$_SESSION["passwd"] = $_GET["passwd"];}
?>
<html>
	<body>
		<form action ="./index.php" method="GET">
			<label for="login">Identifiant: </label><input type="text" name="login" id="login" value ="<?php echo $_SESSION["login"]?>"/>
			<br />
			<label for="passwd">Mot de passe: </lavel><input type="password" name="passwd" id="passwd" value="<?php echo $_SESSION["passwd"]?>"/>
			<br />
			<input type="submit" name="submit" value="OK"/>
		</form>
	</body>
</html>
