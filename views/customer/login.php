<!-- login.php -->
<?php
    $pageTitle = 'Login';
    // include '../template.php';
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
<style>
    /* Additional CSS styles */
    .login-form {
        max-width: 400px;
        margin: 0 auto;
    }

    .login-form .form-group {
        margin-bottom: 15px;
    }

    .login-form .btn-login {
        width: 100%;
    }
    
    .login-form .form-links {
        margin-top: 15px;
        display: flex;
        justify-content: space-between;
    }
</style>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <form action="/login" method="POST" class="login-form">
                        <!-- Login form content -->
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-login">Login</button>
                    </form>
                    <div class="form-links">
                        <div>
                            <p>Don't have an account? <a href="register.php">Register</a></p>
                        </div>
                        <div>
                            <p>Forgot your password? <a href="/forgot_password">Recover password</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include any additional scripts if needed -->
