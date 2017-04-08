<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shope Homepage</title>
	<link rel="stylesheet" type="text/css" href="./index.css"/>
</head>
<body>
	<ul>
		<li><a class="active" href="./index.php">Home</a></li>
		<li><a href="./admin.php">Admin</a></li>
		<li><a href="./cart.php">Cart</a></li>
		<li><a href="./user/">Log In</a></li>
	</ul>
	<div id='wrapper'>
		<h1>Homepage</h1>
		<div id='prducts_section'>
			<h1>All products</h1>
			<?php
			$row = 1;
			if (file_exists('./tables/products_table.csv') &&
					($handle = fopen('./tables/products_table.csv', 'r')) !== FALSE) {
				$flag = true;
		    	while (($data = fgetcsv($handle)) !== FALSE)
				{
					if ($flag) {
						$flag = false;
						continue;}
						?>
					<div class='product'>

					<img class='img_product' src=<?php echo $data[5] ?> /><br />
					Product Name: <?php echo $data[3] ?> <br />
					Product Price: <?php echo $data[2] ?>$<br />
					Category: <?php echo $data[1] ?>
					<br />
					</div>
					<?php
				}
				fclose($handle);}
			?>
		</div>
	</div>
</body>
</html>
