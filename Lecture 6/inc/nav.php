<nav class="navbar navbar-expand-lg border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">My App</a>

        <div class="ms-auto">

            <?php if (isset($_SESSION['logedIn'])) { ?>

                <a href="handler/logout.php" class="btn btn-outline-primary me-2">Logout</a>

            <?php } else { ?>

                <a href="view/auth/login.php" class="btn btn-outline-primary me-2">
                    Login
                </a>

                <a href="view/auth/register.php" class="btn btn-primary">
                    Register
                </a>

            <?php } ?>

        </div>
    </div>
</nav>
