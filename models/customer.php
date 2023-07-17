<?php

class Customer {
    private $customer_id;
    private $name;
    private $email;
    private $password;
    private $address;
    private $city;
    private $residential_area;

    public function __construct($name = '', $email = '', $password = '', $address = '', $city = '', $residential_area = '') {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
        $this->city = $city;
        $this->residential_area = $residential_area;
    }

    // Getters and Setters for private properties (you can use magic methods if needed)
    // ...

    public function getCustomerId()
    {
        return $this->customer_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getResidentialArea()
    {
        return $this->residential_area;
    }

    public function setResidentialArea($residential_area)
    {
        $this->residential_area = $residential_area;
    }

    // Save the customer to the database
    public function register()
    {
        require_once('../config/database.php');

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Customers (name, email, password, address, city, residential_area) 
                VALUES (?, ?, ?, ?, ?, ?)";

        try {
            $statement = $conn->prepare($sql);
            $statement->bind_param("ssssss", $this->name, $this->email, $hashedPassword, $this->address, $this->city, $this->residential_area);
            $statement->execute();

            $this->customer_id = $conn->insert_id; // Set the customer_id of the newly registered customer
        } catch (Exception $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return false; // Return false to indicate the registration failed
        }
    }

    public function login($password)
    {
        require_once('../config/database.php');
        $sql = "SELECT customer_id, password FROM Customers WHERE email = ?";

        try {
            $statement = $conn->prepare($sql);
            $statement->bind_param("s", $this->email);
            $statement->execute();
            $statement->bind_result($customer_id, $hashedPassword);

            if ($statement->fetch() && password_verify($password, $hashedPassword)) {
                $this->customer_id = $customer_id;
                return true; // Return true if the credentials are valid
            } else {
                return false; // Return false if the credentials are invalid
            }
        } catch (Exception $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return false; // Return false to indicate the login failed
        }
    }

    public function updateProfile()
    {
        require_once('../config/database.php');
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "UPDATE Customers 
                SET name = ?, email = ?, password = ?, address = ?, 
                    city = ?, residential_area = ?
                WHERE customer_id = ?";

        try {
            $statement = $conn->prepare($sql);
            $statement->bind_param("ssssssi", $this->name, $this->email, $hashedPassword, $this->address, $this->city, $this->residential_area, $this->customer_id);
            $statement->execute();
        } catch (Exception $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return false; // Return false to indicate the update failed
        }
    }

    public static function getById($customer_id)
    {
        require_once('../config/database.php');
        $sql = "SELECT * FROM Customers WHERE customer_id = ?";

        try {
            $statement = $conn->prepare($sql);
            $statement->bind_param("i", $customer_id);
            $statement->execute();
            $result = $statement->get_result();

            if ($result->num_rows === 1) {
                $customerData = $result->fetch_assoc();
                $customer = new Customer();
                $customer->customer_id = $customerData['customer_id'];
                $customer->name = $customerData['name'];
                $customer->email = $customerData['email'];
                $customer->password = $customerData['password'];
                $customer->address = $customerData['address'];
                $customer->city = $customerData['city'];
                $customer->residential_area = $customerData['residential_area'];

                return $customer;
            } else {
                return null;
            }
        } catch (Exception $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return null; // Return null to indicate the retrieval failed
        }
    }

    public static function getByEmail($email)
    {
        require_once('../config/database.php');
        $sql = "SELECT * FROM Customers WHERE email = ?";

        try {
            $statement = $conn->prepare($sql);
            $statement->bind_param("s", $email);
            $statement->execute();
            $result = $statement->get_result();

            if ($result->num_rows === 1) {
                $customerData = $result->fetch_assoc();
                $customer = new Customer();
                $customer->customer_id = $customerData['customer_id'];
                $customer->name = $customerData['name'];
                $customer->email = $customerData['email'];
                $customer->password = $customerData['password'];
                $customer->address = $customerData['address'];
                $customer->city = $customerData['city'];
                $customer->residential_area = $customerData['residential_area'];

                return $customer;
            } else {
                return null;
            }
        } catch (Exception $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return null; // Return null to indicate the retrieval failed
        }
    }

    // Other methods for customer-related functionalities (e.g., view orders, etc.)
    // ...
}
