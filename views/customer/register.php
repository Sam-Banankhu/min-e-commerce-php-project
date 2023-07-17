<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <style>
        /* Additional CSS styles */
        .register-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .register-form .form-group {
            margin-bottom: 15px;
        }

        .register-form .btn-register {
            width: 100%;
        }
    </style>
    <title>Register</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Register</h5>
                        <form action="../../controllers/CustomerController.php" method="POST" class="register-form">
                            <!-- Registration form content -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                           
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="form-group">
                                <label for="residential_area">Residential Area</label>
                                <input type="text" class="form-control" id="residential_area" name="residential_area" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-register">Register</button>
                        </form>
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include any additional scripts if needed -->

</body>

</html>
