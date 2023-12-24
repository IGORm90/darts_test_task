<?php

//require_once __DIR__ . '/views/main.php';

//phpinfo();


$host = 'mysql'; // replace with your database host
$dbname = 'promo_sets'; // replace with your desired database name
$username = 'root'; // replace with your database username
$password = 'root'; // replace with your database password

// try {
//     // Connect to MySQL using PDO
//     $pdo = new PDO("mysql:host=$host;", $username, $password);

//     // Set the PDO error mode to exception
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     var_dump($pdo);
//     // Create the database
//     $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
//     $pdo->exec($sql);

//     echo "Database created successfully\n";
// } catch (PDOException $e) {
//     echo "Error creating database: " . $e->getMessage() . "\n";
// }

$host = 'mysql'; // replace with your database host
$dbname = 'promo_sets'; // replace with your desired database name
$username = 'root'; // replace with your database username
$password = 'root'; // replace with your database password
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $username, $password, $opt);

echo '<pre>';
var_dump($pdo);
echo '<pre>';
