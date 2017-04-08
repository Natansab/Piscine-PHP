<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shope Homepage</title>
</head>
<body>
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
					echo "Product Name: $data[3] <br />";
					echo "Product Price: $data[2]$<br />";
					echo "<br />";
				}
				fclose($handle);}
			?>
		</div>
	</div>
</body>
</html>
