<?php


$host = 'mysql'; // replace with your database host
$dbname = 'promo_sets'; // replace with your desired database name
$username = 'root'; // replace with your database username
$password = 'root'; // replace with your database password
$charset = 'utf8';



// Connect to MySQL using PDO
$pdo = new PDO("mysql:host=$host;", $username, $password);

// Set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create the database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($pdo->exec($sql)) {
    echo "Database created successfully\n";
}
unset($pdo);


$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $username, $password, $opt);

$sql = "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL
    );";

if ($pdo->exec($sql)) {
    echo "Table product created successfully\n";
}

$sql = "CREATE TABLE IF NOT EXISTS `sets` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        total_price DECIMAL(10, 2)
    );";

if ($pdo->exec($sql)) {
    echo "Table set created successfully\n";
}

$sql = "CREATE TABLE IF NOT EXISTS sets_items (
        set_id INT NOT NULL,
        product_id INT,
        child_id INT,
        UNIQUE KEY unique_set_product (set_id, product_id),
        UNIQUE KEY unique_set_parent (set_id, parent_id)
    );";

if ($pdo->exec($sql)) {
    echo "Table set_item created successfully\n";
}
