<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-card {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 10px;
        }
        .login-card .form-control {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="card shadow login-card">
        <div class="card-body ">
            <img src="assets/images/logo.png" alt="Site Logo" class="mx-auto d-block" style="width: 100px; height: auto;">

            <h4 class="card-title text-center mb-4"><br>User Login</h4>

            <form action="users/login_user.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-right-to-bracket me-1"></i> Login
                    </button>
                </div>

                <p class="text-center mb-0">Don't have an account yet? <a href="registration_form.php">Register</a></p>
            </form>
        </div>
    </div>

</body>
</html>
