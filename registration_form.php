<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-card {
            max-width: 450px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 10px;
        }
        .register-card .form-control {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="card shadow register-card">
        <div class="card-body">
            <img src="assets/images/logo.png" alt="Site Logo" class="mx-auto d-block" style="width: 100px; height: auto;">

            <h4 class="card-title text-center mb-4">
                <i class="fa-solid fa-user-plus me-2"></i> <br>User Registration
            </h4>

            <form action="users/register_user.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" required>
                </div>

                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter full name" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" minlength="3" required>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-user-check me-1"></i> Register
                    </button>
                </div>

                <p class="text-center mb-0">
                    Already have an account? <a href="login_form.php">Login</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
