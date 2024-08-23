<?php
// Database connection settings
$host = 'localhost'; // Change this if your database server is on a different host
$db = 'db_emp';      // Database name
$user = 'root';      // Database username
$pass = '';          // Database password (empty for local development)

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
