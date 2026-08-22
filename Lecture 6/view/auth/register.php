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

    <title>Register</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="card shadow-sm p-4" style="width: 100%; max-width: 450px;">

        <h2 class="text-center mb-4">Register</h2>

        <?php

        if ($lastError) {
            echo '<p class="text-danger text-center fw-semibold mb-3">';
            echo $lastError;
            echo '</p>';
        }

        ?>

        <form action="../../handler/register.php" method="POST">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>

                <input
                    type="text"
                    class="form-control"
                    id="user_name"
                    name="user_name"
                    placeholder="Enter your name"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>

                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
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
                Register
            </button>

        </form>

        <p class="text-center mt-3 mb-0">
            Already have an account?
            <a href="./login.php">Login</a>
        </p>

    </div>

</div>

</body>
</html>
