<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../models/customer.php'); // Make sure the file name is correctly capitalized

class CustomerController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $residential_area = $_POST['residential_area'];

            // Validation (you can add more validation as needed)
            if (empty($name) || empty($email) || empty($password) || empty($confirm_password) || empty($address) || empty($city) || empty($residential_area)) {
                // If any required field is empty, show an error message
                $error_message = "All fields are required.";
                include('../views/customer/register.php');
                return;
            }

            if ($password !== $confirm_password) {
                // If passwords do not match, show an error message
                $error_message = "Passwords do not match.";
                include('../views/customer/register.php');
                return;
            }

            // Check if the email is already registered
            $existing_customer = Customer::getByEmail($email);
            if ($existing_customer) {
                // If the email is already in use, show an error message
                $error_message = "Email already registered. Please login or use a different email.";
                include('../views/customer/register.php');
                return;
            }

            // Create a new customer record
            $customer = new Customer($name, $email, $password, $address, $city, $residential_area);
            $customer->register();

            // After successful registration, redirect to the login page
            header("Location: login.php");
            exit();
        }

        // Load the register view if the request method is GET
        include('../views/customer/register.php');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validation (you can add more validation as needed)
            if (empty($email) || empty($password)) {
                // If any required field is empty, show an error message
                $error_message = "Email and password are required.";
                include('../views/customer/login.php');
                return;
            }

            // Get customer by email
            $customer = Customer::getByEmail($email);

            if (!$customer || !$customer->login($password)) {
                // If email or password is incorrect, show an error message
                $error_message = "Invalid email or password.";
                include('../views/customer/login.php');
                return;
            }

            // After successful login, redirect to the customer dashboard
            header("Location: dashboard.php");
            exit();
        }

        // Load the login view if the request method is GET
        include('../views/customer/login.php');
    }

    // Other methods for customer-related functionalities (e.g., update profile, view orders, etc.)
    // ...
}
