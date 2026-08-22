<?php
http_response_code(404);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>404 - Not Found</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            min-height: 100vh;
            background: #f8f9fa;
        }

        .error-code {
            font-size: 8rem;
            font-weight: 800;
            line-height: 1;
        }

        .error-card {
            max-width: 600px;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">

    <main class="text-center px-4 error-card">

        <div class="error-code text-primary">
            404
        </div>

        <h1 class="fw-bold mt-3">
            Page Not Found
        </h1>

        <p class="text-secondary fs-5 mt-3">
            The page you're looking for doesn't exist or may have been moved.
        </p>

        <a href="index.php" class="btn btn-dark px-4 py-2 mt-3">
            ← Back to Home
        </a>

    </main>

</body>
</html>
