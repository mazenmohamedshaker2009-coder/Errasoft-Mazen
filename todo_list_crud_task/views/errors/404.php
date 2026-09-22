<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>404 — Page Not Found</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;

            background: #0d0d0d;
            color: #f5f5f5;
            font-family: system-ui, -apple-system, BlinkMacSystemFont,
                         "Segoe UI", sans-serif;
        }

        main {
            width: 100%;
            max-width: 520px;
            text-align: center;
        }

        .code {
            font-size: clamp(80px, 18vw, 140px);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.07em;
            color: #ffffff;
        }

        h1 {
            margin-top: 20px;
            font-size: 24px;
            font-weight: 600;
        }

        p {
            margin-top: 10px;
            color: #888;
            font-size: 15px;
            line-height: 1.6;
        }

        a {
            display: inline-block;
            margin-top: 28px;
            padding: 10px 18px;

            color: #0d0d0d;
            background: #ffffff;
            border-radius: 8px;

            font-size: 14px;
            font-weight: 600;
            text-decoration: none;

            transition: opacity 0.2s ease;
        }

        a:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <main>
        <div class="code">404</div>

        <h1>Page not found</h1>

        <p>
            The page you're looking for doesn't exist or may have been moved.
        </p>

        <a href="/">Back to home</a>
    </main>
</body>
</html>
