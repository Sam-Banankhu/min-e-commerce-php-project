<!-- template.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Pandas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <!-- Other CSS and meta tags -->
</head>
<body>
    <header>
        <?php include 'layouts/header.php'; ?>
    </header>

    <div id="content">
        <?php include $content; ?>
    </div>

    <?php include 'layouts/footer.php'; ?>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <!-- Other JS scripts -->
</body>
</html>
