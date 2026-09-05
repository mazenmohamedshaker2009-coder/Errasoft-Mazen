<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$pageTitle = 'Shop Homepage - EraaSoft PMS';
$pageDescription = 'EraaSoft PMS Shop Homepage';

require_once dirname(__FILE__, 3) . "/config/config.php";

require BASE_PATH . 'includes/head.php';

?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h2 class="text-center mb-4">Register</h2>

                    <form action="<?=BASE_URL . 'handler/auth/register.php' ?>" method="POST">

                        <div class="mb-3">
                            <label for="user_name" class="form-label">
                                Username
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="user_name"
                                name="user_name"
                                placeholder="Enter your username"
                            >

                            <?php if (!empty($_SESSION['error']['user_name'])): ?>

                                <div class="text-danger mt-1">
                                    <?= htmlspecialchars($_SESSION['error']['user_name']['message']) ?>
                                </div>

                            <?php endif; ?>
                        </div>


                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter your email"
                            >

                            <?php if (!empty($_SESSION['error']['email'])): ?>

                                <div class="text-danger mt-1">
                                    <?= htmlspecialchars($_SESSION['error']['email']['message']) ?>
                                </div>

                            <?php endif; ?>
                        </div>


                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                            >

                            <?php if (!empty($_SESSION['error']['password'])): ?>

                                <div class="text-danger mt-1">
                                    <?= htmlspecialchars($_SESSION['error']['password']['message']) ?>
                                </div>

                            <?php endif; ?>
                        </div>


                        <div class="mb-4">
                            <label for="password_confirme" class="form-label">
                                Confirm Password
                            </label>

                            <input
                                type="password"
                                class="form-control"
                                id="password_confirme"
                                name="password_confirme"
                                placeholder="Confirm your password"
                            >

                            <?php if (!empty($_SESSION['error']['password_confirme'])): ?>

                                <div class="text-danger mt-1">
                                    <?= htmlspecialchars($_SESSION['error']['password_confirme']['message']) ?>
                                </div>

                            <?php endif; ?>
                        </div>


                        <button type="submit" class="btn btn-primary w-100">
                            Register
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php unset($_SESSION['error']); ?>
