<?php

// Include the Product model to interact with the database
require_once '../models/product.php';

class ProductController {
    // Method to get a product by its ID
    public static function getProductById($product_id) {
        // Here, you should implement the logic to fetch the product from the database using its ID
        // For this example, we assume that the Product model provides a method to fetch products by ID
        return Product::getById($product_id);
    }

    // Method to get all products (for catalog or landing page)
    public static function getAllProducts() {
        // Here, you should implement the logic to fetch all products from the database
        // For this example, we assume that the Product model provides a method to fetch all products
        return Product::getAll();
    }

    // Add more methods as needed for product-related functionalities (e.g., adding to cart, searching, etc.)
    // ...
}
