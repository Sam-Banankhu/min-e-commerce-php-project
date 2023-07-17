<!-- views/product/show.php -->

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <style>
        /* Additional CSS styles */
        .product-details {
            max-width: 500px;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .product-details img {
            max-width: 100%;
            height: auto;
        }

        .product-details .product-name {
            font-weight: bold;
        }

        .product-details .product-price {
            color: #007bff;
            font-size: 18px;
        }
    </style>
    <title>Product Details</title>
</head>

<body>
    <?php include '../layouts/header.php'; ?>

    <div class="container mt-4">
        <?php
        // Include necessary files
        require_once '../../controllers/ProductController.php';

        // Check if a product ID is provided in the URL
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];

            // Fetch the product details from the database using the ProductController
            $product = ProductController::getProductById($product_id);

            // Display the product details
            if ($product) {
                echo '<div class="product-details">';
                echo '<img src="' . $product->getImageUrl() . '" alt="' . $product->getName() . '">';
                echo '<div class="product-name">' . $product->getName() . '</div>';
                echo '<div class="product-price">$' . number_format($product->getPrice(), 2) . '</div>';
                echo '<div class="product-description">' . $product->getDescription() . '</div>';
                // Add to cart button (handle authentication as in index.php)
                echo '</div>';
            } else {
                echo '<div class="alert alert-danger">Product not found.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Invalid product ID.</div>';
        }
        ?>
    </div>

    <?php include '../layouts/footer.php'; ?>

    <!-- Include any additional scripts if needed -->

</body>

</html>
