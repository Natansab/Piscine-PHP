<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "SHOP_DATABASE";

// Gerer la suppression des bases de donnes.

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
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<br  />";

// Set Products Table
$sql = "CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
price INT(6) NOT NULL,
name VARCHAR(30) NOT NULL,
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
// Inserts elements
$sql = "INSERT INTO Products (price, name, description, img_path, is_active)
VALUES (15,'Truman - Blue','The Truman handle is designed (other than you.)','./img/truman_blue.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active)
VALUES (15,'Truman - Green','The Truman handle (other than you.)','./img/truman_green.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active)
VALUES (15,'Truman - Orange','The Truman handle (other than you.)','./img/truman_orange.jpg',1);";
$sql .= "INSERT INTO Products (price, name, description, img_path, is_active)
VALUES (15,'Winston - Silver','The Truman handle (other than you.)','./img/winston_silver.jpg',1);";

if (mysqli_multi_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_multi_error($conn);
}

mysqli_close($conn);
?>
