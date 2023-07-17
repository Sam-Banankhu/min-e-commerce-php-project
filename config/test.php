<?php
require_once('database.php'); // Include the database connection

// Insert customer details
function insertCustomer($name, $email, $password, $address, $city, $residential_area) {
    global $conn; // Access the global database connection

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Customers (name, email, password, address, city, residential_area) 
            VALUES (?, ?, ?, ?, ?, ?)";

    try {
        $statement = $conn->prepare($sql);
        $statement->bind_param("ssssss", $name, $email, $hashedPassword, $address, $city, $residential_area);
        $statement->execute();
        $customer_id = $conn->insert_id; // Get the auto-generated customer ID
        echo "Customer inserted with ID: " . $customer_id . "<br>";
    } catch (Exception $e) {
        // Log or display the error message
        echo "Error: " . $e->getMessage() . "<br>";
    }
}

// Test inserting customer data
$name = "John Doe";
$email = "john@example.com";
$password = "password123";
$address = "123 Main St";
$city = "New York";
$residential_area = "Downtown";

insertCustomer($name, $email, $password, $address, $city, $residential_area);

$name = "Jane Smith";
$email = "jane@example.com";
$password = "hello123";
$address = "456 Elm St";
$city = "Los Angeles";
$residential_area = "Suburb";

insertCustomer($name, $email, $password, $address, $city, $residential_area);

// You can add more test cases as needed

?>
