<?php

$servername = "localhost"; // MySQL server name
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "db_idor"; // Database name

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); // Creating a PDO connection
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage()); // Handling connection errors
}
