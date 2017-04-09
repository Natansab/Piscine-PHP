<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "SHOP_DATABASE";


// require_once('./ft_tools.php');

$conn = mysqli_connect($servername, $username, $password);

echo "<br  />";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
echo "<br  />";

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
echo "<br  />";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
echo "<br  />";

// Set Products Table
$sql = "CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
price INT(6) NOT NULL,
name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
img_path CHAR(255) NOT NULL,
is_active INT(1)
)";

echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Table Products created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
echo "<br  />";

// Set Customers Table
$sql = "CREATE TABLE IF NOT EXISTS Customers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
login VARCHAR(250) NOT NULL,
password VARCHAR(250) NOT NULL,
name VARCHAR(250) NOT NULL,
address VARCHAR(250) NOT NULL,
admin INT(1),
status INT(1)
)";

echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Table Customers created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
echo "<br  />";

// Set Orders Table
$sql = "CREATE TABLE IF NOT EXISTS Orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
login VARCHAR(250) NOT NULL,
nb_of_products INT(100) NOT NULL,
total INT(250) NOT NULL,
date VARCHAR(250) NOT NULL
)";

echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Table Orders created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
echo "<br  />";

// Set Categories Table
$sql = "CREATE TABLE IF NOT EXISTS Categories (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
name VARCHAR(250) NOT NULL
)";

echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Table Orders created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
echo "<br  />";

// Set Category_prod Table
$sql = "CREATE TABLE IF NOT EXISTS category_product (
prod_id INT(6) UNSIGNED NOT NULL,
cat_id INT(6) UNSIGNED NOT NULL
)";

echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Table Category_prof created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
echo "<br  />";

// Inserts elements
$sql =  "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (15,'Truman - Blue','The Truman handle is designed (other than you.)','./img/truman_blue.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (15,'Truman - Green','The Truman handle (other than you.)','./img/truman_green.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (15,'Truman - Orange','The Truman handle (other than you.)','./img/truman_orange.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (15,'Winston - Silver','The Truman handle (other than you.)','./img/winston_silver.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (5,'Harrys Blades','The Truman handle (other than you.)','./img/blades.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (5,'Blades & Shave Gel','The Truman handle (other than you.)','./img/blades_shave.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (5,'Blades, Shave Gel ','The Truman handle (other than you.)','./img/blades_shave_post_shave.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (10,'Lip Balm','The Truman handle (other than you.)','./img/blades_shave_post_shave.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (15,'Razor Stand','The Truman handle (other than you.)','./img/razor_stand.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (2,'Travel Kit','The Truman handle (other than you.)','./img/travel_kit.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (5,'Facial','The Truman handle (other than you.)','./img/facial.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (13,'Shampoo','The Truman handle (other than you.)','./img/shampoo.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active) VALUES (20,'shave_gel','The Truman handle (other than you.)','./img/shave_gel.jpg',1);";
$sql .= "INSERT INTO Categories (name) VALUES ('Starter Sets');";
$sql .= "INSERT INTO Categories (name) VALUES ('Blades Refill Packs');";
$sql .= "INSERT INTO Categories (name) VALUES ('Mixte');";
$sql .= "INSERT INTO Categories (name) VALUES ('Bio');";
$sql .="INSERT INTO category_product VALUES (1,1);";
$sql .="INSERT INTO category_product VALUES (1,4);";
$sql .="INSERT INTO category_product VALUES (2,1);";
$sql .="INSERT INTO category_product VALUES (3,1);";
$sql .="INSERT INTO category_product VALUES (3,2);";
$sql .="INSERT INTO category_product VALUES (4,1);";
$sql .="INSERT INTO category_product VALUES (4,2);";
$sql .="INSERT INTO category_product VALUES (5,1);";
$sql .="INSERT INTO category_product VALUES (5,3);";
$sql .="INSERT INTO category_product VALUES (6,1);";
$sql .="INSERT INTO category_product VALUES (7,1);";
$sql .="INSERT INTO category_product VALUES (8,1);";
$sql .="INSERT INTO category_product VALUES (9,1);";
$sql .="INSERT INTO category_product VALUES (9,3);";
$sql .="INSERT INTO category_product VALUES (10,1);";
$sql .="INSERT INTO category_product VALUES (11,1);";
$sql .="INSERT INTO category_product VALUES (11,2);";
$sql .="INSERT INTO category_product VALUES (12,1);";
$sql .="INSERT INTO category_product VALUES (12,2);";
$sql .="INSERT INTO category_product VALUES (13,1);";

if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
