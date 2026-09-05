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

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (empty($cart['products'])): ?>

                            <tr>
                                <td colspan="6" class="text-center">
                                    Cart is empty
                                </td>
                            </tr>

                        <?php else: ?>

                            <?php foreach ($cart['products'] as $index => $product): ?>

                        <tr class="cart-product"
                        data-product-id="<?= htmlspecialchars($product['id']) ?>"
                        >

                                    <th scope="row">
                                        <?= $index + 1 ?>
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($product['product_name']) ?>
                                    </td>

                                    <td class="product-price">
                                        <?= htmlspecialchars((string) $product['price']) ?> $
                                    </td>

                                    <td>
                                        <input
                                            type="number"
                                            class="form-control quantity-input"
                                            value="<?= $product['quantity'] ?>"
                                            min="1"
                                        >
                                    </td>

                                    <td class="product-total">
                                        <?= htmlspecialchars((string) $product['total_price']) ?> $
                                    </td>

                                    <td>
                                        <a href="<?=BASE_URL.'handler/cart/destroy.php'?>?id=<?= $product['id'] ?>"  class="btn btn-danger">
                                            Delete
                                        </a>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                            <tr class="cart-summary">

                                <td colspan="2">
                                    Total Price
                                </td>

                                <td colspan="3">
                                    <h3 class="cart-total">
                                        <?= htmlspecialchars((string) $cart['total']) ?> $
                                    </h3>
                                </td>

                                <td>
                                    <a href="checkout.php" class="btn btn-primary">
                                        Checkout
                                    </a>
                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>
        </div>
    </div>
</section>

<?php

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
