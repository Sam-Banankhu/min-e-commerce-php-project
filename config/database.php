<?php

// database.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_db";

// Create a new MySQLi object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If you want to see a confirmation message, you can uncomment the line below
echo "Connected successfully";

// Return the connection object
return $conn;
