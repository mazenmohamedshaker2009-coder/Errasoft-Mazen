
```php
<?php

session_start();

$lastError = $_SESSION['last_error'] ?? null;

unset($_SESSION['last_error']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="card shadow-sm p-4" style="width: 100%; max-width: 420px;">

        <h2 class="text-center mb-4">Login</h2>

        <?php

        if ($lastError) {
            echo '<p class="text-danger text-center fw-semibold mb-3">';
            echo $lastError;
            echo '</p>';
        }

        ?>

        <form action="../../handler/login.php" method="POST">

            <div class="mb-3">
                <label for="email" class="form-label">Name</label>

                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="user_name"
                    placeholder="Enter your name"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>

                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>

        </form>

        <p class="text-center mt-3 mb-0">
            Don't have an account?
            <a href="./register.php">Register</a>
        </p>

    </div>

</div>

</body>
</html>
```

