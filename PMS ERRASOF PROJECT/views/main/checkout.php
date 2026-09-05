<?php

declare(strict_types=1);

$pageTitle = 'Shop Homepage - EraaSoft PMS';
$pageDescription = 'EraaSoft PMS Shop Homepage';

require_once dirname(__FILE__, 3) . "/config/config.php";

require BASE_PATH . 'includes/nav.php';

require BASE_PATH . 'includes/head.php';

require BASE_PATH . 'includes/header.php';

$cart = $_SESSION['cart'] ?? [
    'products' => [],
    'products_count' => 0,
    'total' => 0
];

?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">

            <div class="col-4">

                <div class="border p-2">

                    <div class="products">

                        <ul class="list-unstyled">

                            <?php if (empty($cart['products'])): ?>

                                <li class="border p-2 my-1 text-center">
                                    Cart is empty
                                </li>

                            <?php else: ?>

                                <?php foreach ($cart['products'] as $product): ?>

                                    <li class="border p-2 my-1">

                                        <?= htmlspecialchars($product['product_name']) ?>

                                        <span class="text-success mx-2 mr-auto bold">
                                            <?= $product['quantity'] ?>
                                            x
                                            <?= htmlspecialchars((string) $product['price']) ?>$
                                        </span>

                                    </li>

                                <?php endforeach; ?>

                            <?php endif; ?>

                        </ul>

                    </div>

                    <h3>
                        Total :
                        <?= htmlspecialchars((string) $cart['total']) ?> $
                    </h3>

                </div>

            </div>

            <div class="col-8">

                <form
                    action="<?= BASE_URL . 'handler/cart/checkout.php' ?>"
                    method="POST"
                    class="form border my-2 p-3"
                >

                    <div class="mb-3">

                        <!-- Name -->
                        <div class="mb-3">

                            <label for="name">
                                Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                            >

                            <?php if (!empty($_SESSION['error']['name'])): ?>

                                <div class="text-danger mt-1">
                                    <?= htmlspecialchars($_SESSION['error']['name']['message']) ?>
                                </div>

                            <?php endif; ?>

                        </div>


                        <!-- Email -->
                        <div class="mb-3">

                            <label for="email">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                            >

                            <?php if (!empty($_SESSION['error']['email'])): ?>

                                <div class="text-danger mt-1">
                                    <?= htmlspecialchars($_SESSION['error']['email']['message']) ?>
                                </div>

                            <?php endif; ?>

                        </div>


                        <!-- Address -->
                        <div class="mb-3">

                            <label for="address">
                                Address
                            </label>

                            <input
                                type="text"
                                name="address"
                                id="address"
                                class="form-control"
                                value="<?= htmlspecialchars($_POST['address'] ?? '') ?>"
                            >

                            <?php if (!empty($_SESSION['error']['address'])): ?>

                                <div class="text-danger mt-1">
                                    <?= htmlspecialchars($_SESSION['error']['address']['message']) ?>
                                </div>

                            <?php endif; ?>

                        </div>


                        <!-- Phone -->
                        <div class="mb-3">

                            <label for="phone">
                                Phone
                            </label>

                            <input
                                type="number"
                                name="phone"
                                id="phone"
                                class="form-control"
                                value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"
                            >

                            <?php if (!empty($_SESSION['error']['phone'])): ?>

                                <div class="text-danger mt-1">
                                    <?= htmlspecialchars($_SESSION['error']['phone']['message']) ?>
                                </div>

                            <?php endif; ?>

                        </div>


                        <!-- Notes -->
                        <div class="mb-3">

                            <label for="notes">
                                Notes
                            </label>

                            <input
                                type="text"
                                name="notes"
                                id="notes"
                                class="form-control"
                                value="<?= htmlspecialchars($_POST['notes'] ?? '') ?>"
                            >

                            <?php if (!empty($_SESSION['error']['notes'])): ?>

                                <div class="text-danger mt-1">
                                    <?= htmlspecialchars($_SESSION['error']['notes']['message']) ?>
                                </div>

                            <?php endif; ?>

                        </div>


                        <!-- Submit -->
                        <div class="mb-3">

                            <input
                                type="submit"
                                value="Send"
                                class="btn btn-success"
                            >

                        </div>

                    </div>

                </form>

            </div>

        </div>
    </div>
</section>

<?php

/*
|--------------------------------------------------------------------------
| Clear Errors
|--------------------------------------------------------------------------
*/

unset($_SESSION['error']);


/*
|--------------------------------------------------------------------------
| Footer
|--------------------------------------------------------------------------
*/

include BASE_PATH . 'includes/footer.php';


/*
|--------------------------------------------------------------------------
| Footer Scripts
|--------------------------------------------------------------------------
*/

include BASE_PATH . 'includes/footer-scripts.php';

?>
