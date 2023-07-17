<?php
session_start();
require_once('utils/authentication.php');
require_once('models/product.php');

// Check if the user is logged in, otherwise redirect to the login page
if (!isUserLoggedIn()) {
    header("Location: views/customer/login.php");
    exit();
}

$products = Product::getAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Product Catalog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Welcome, <?php echo $_SESSION['user']['name']; ?></h1>
        <h2>Product Catalog</h2>
        <?php if (count($products) > 0) { ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($products as $product) { ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product->getName(); ?></h5>
                                <p class="card-text"><?php echo $product->getDescription(); ?></p>
                                <p class="card-text">Price: $<?php echo number_format($product->getPrice(), 2); ?></p>
                                <a href="controllers/CartController.php?action=add&product_id=<?php echo $product->getProductId(); ?>" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p>No products available.</p>
        <?php } ?>
    </div>
</body>

</html>
