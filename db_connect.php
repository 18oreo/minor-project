<?php
// db_connect.php

$host = 'localhost';       // XAMPP default
$db   = 'food_donation_portal';   // Replace with your actual DB name
$user = 'root';            // XAMPP default user
$pass = '';                // XAMPP default has no password
$charset = 'utf8mb4';

// Set DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Options for PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Error mode: Exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Disable emulated prepares
];

try {
    // Create PDO instance$conn = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
   $conn = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection fails, display error
    echo "Database connection failed: " . $e->getMessage();
    exit;
}
?>
