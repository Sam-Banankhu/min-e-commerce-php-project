<?php

class Product {
    private $product_id;
    private $name;
    private $description;
    private $price;
    private $image_url;

    public function __construct($name = '', $description = '', $price = '') {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    // Getters and Setters for private properties (you can use magic methods if needed)
    // ...
  // Getter for product image URL
  public function getImageUrl()
  {
      return $this->image_url;
  }

  // Setter for product image URL
  public function setImageUrl($image_url)
  {
      $this->image_url = $image_url;
  }
    public function getProductId() {
        return $this->product_id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    // Save the product to the database
    public function save() {
        require_once('../config/database.php');

        $sql = "INSERT INTO Products (name, description, price) 
                VALUES (?, ?, ?)";

        try {
            $statement = $conn->prepare($sql);
            $statement->bind_param("ssd", $this->name, $this->description, $this->price);
            $statement->execute();

            $this->product_id = $conn->insert_id; // Set the product_id of the newly saved product
        } catch (Exception $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return false; // Return false to indicate the save failed
        }
    }

    // Get a product by its ID
    public static function getById($product_id) {
        require_once('../config/database.php');

        $sql = "SELECT * FROM Products WHERE product_id = ?";

        try {
            $statement = $conn->prepare($sql);
            $statement->bind_param("i", $product_id);
            $statement->execute();
            $result = $statement->get_result();

            if ($result->num_rows === 1) {
                $productData = $result->fetch_assoc();

                $product = new Product();
                $product->product_id = $productData['product_id'];
                $product->name = $productData['name'];
                $product->description = $productData['description'];
                $product->price = $productData['price'];

                return $product;
            } else {
                return null;
            }
        } catch (Exception $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return null; // Return null to indicate the retrieval failed
        }
    }

    // Get all products
    public static function getAll() {
        require_once('../config/database.php');

        $sql = "SELECT * FROM Products";

        try {
            $result = $conn->query($sql);

            $products = array();
            while ($productData = $result->fetch_assoc()) {
                $product = new Product();
                $product->product_id = $productData['product_id'];
                $product->name = $productData['name'];
                $product->description = $productData['description'];
                $product->price = $productData['price'];

                $products[] = $product;
            }

            return $products;
        } catch (Exception $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return array(); // Return an empty array to indicate the retrieval failed
        }
    }

    // Add more static methods as needed for product-related functionalities (e.g., search, etc.)
    // ...
}
