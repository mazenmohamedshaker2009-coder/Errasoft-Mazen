<?php

declare(strict_types=1);

$pageTitle = 'Shop Homepage - EraaSoft PMS';
$pageDescription = 'EraaSoft PMS Shop Homepage';

require_once dirname(__FILE__, 3) . "/config/config.php";

require BASE_PATH . 'core/function/product.php';

$id = $_GET['id'] ?? '';

$data = indexDetails($id);

$product = $data['product'];
$relatedProducts = $data['related_products'];

if (empty($product)) {
    require BASE_PATH . 'views/errors/404.php';
    exit;
}

require BASE_PATH . 'includes/nav.php';

require BASE_PATH . 'includes/head.php';

?>

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Product Details</h1>
            <p class="lead fw-normal text-white-50 mb-0">Discover the perfect item for your collection</p>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <img
                        class="card-img-top mb-5 mb-md-0"
                        src="<?= htmlspecialchars($product['image_file']) ?>"
                        alt="<?= htmlspecialchars($product['product_name']) ?>"
                    />
                </div>
            </div>

            <div class="col-md-6">

                <div class="small mb-1">
                    SKU: <?= htmlspecialchars($product['id']) ?>
                </div>

                <h1 class="display-5 fw-bolder">
                    <?= htmlspecialchars($product['product_name']) ?>
                </h1>

                <div class="fs-5 mb-3">
                    <span>
                        $<?= htmlspecialchars($product['price']) ?>
                    </span>
                </div>

                <p class="lead">
                    <?= nl2br(htmlspecialchars($product['description'])) ?>
                </p>

                <div class="d-flex mb-3">
                    <div class="me-3">
                        <span class="fw-bold">Category:</span>
                        <?= htmlspecialchars($product['category_id']) ?>
                    </div>

                    <div>
                        <span class="fw-bold">Availability:</span>

                        <?php if ((int)$product['stock_quantity'] > 0): ?>
                            In Stock
                        <?php else: ?>
                            Out of Stock
                        <?php endif; ?>

                    </div>
                </div>

                <form method="GET" action="<?= BASE_URL . 'handler/cart/add.php' ?>">
                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                    
                    <div class="d-flex mb-4">
                        <input
                            class="form-control text-center me-3"
                            name="quantity"
                            type="number"
                            value="1"
                            min="1"
                            max="<?= htmlspecialchars($product['stock_quantity']) ?>"
                            style="max-width: 5rem"
                        />

                        <button class="btn btn-outline-dark flex-shrink-0" type="submit" name="add_to_cart">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </form>

                <div class="d-flex gap-2">
                    <button class="btn btn-dark" type="button">Buy Now</button>
                </div>

            </div>

        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">

                        <h3 class="fw-bolder mb-3">Product Description</h3>

                        <p>
                            <?= nl2br(htmlspecialchars($product['description'])) ?>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <h2 class="fw-bolder mb-4">Related products</h2>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php if (!empty($relatedProducts)): ?>

                <?php foreach ($relatedProducts as $relatedProduct): ?>

                    <div class="col mb-5">

                        <div class="card h-100">

                            <img
                                class="card-img-top"
                                src="<?= htmlspecialchars($relatedProduct['image_file']) ?>"
                                alt="<?= htmlspecialchars($relatedProduct['product_name']) ?>"
                            />

                            <div class="card-body p-4">

                                <div class="text-center">

                                    <h5 class="fw-bolder">
                                        <?= htmlspecialchars($relatedProduct['product_name']) ?>
                                    </h5>

                                    $<?= htmlspecialchars($relatedProduct['price']) ?>

                                </div>

                            </div>

                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                                <div class="text-center">

                                    <a
                                        class="btn btn-outline-dark mt-auto"
                                        href="product.php?id=<?= urlencode($relatedProduct['id']) ?>"
                                    >
                                        View item
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="col-12 text-center">

                    <h4>
                        No Related Products Found
                    </h4>

                </div>

            <?php endif; ?>

        </div>

    </div>
</section>

<?php

include BASE_PATH . 'includes/footer.php';

include BASE_PATH . 'includes/footer-scripts.php';

?>
