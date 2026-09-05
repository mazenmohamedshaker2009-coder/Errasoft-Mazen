<?php

declare(strict_types=1);

$pageTitle = 'Shop Homepage - EraaSoft PMS';
$pageDescription = 'EraaSoft PMS Shop Homepage';

require_once dirname(__FILE__) . "/config/config.php";

require BASE_PATH . 'core/function/product.php';

$products = index();

require BASE_PATH . 'includes/nav.php';

require BASE_PATH . 'includes/head.php';

require BASE_PATH . 'includes/header.php';

?>

<section class="py-5">

<div class="container px-4 px-lg-5 mt-5">

    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        <?php if (!empty($products)) : ?>

            <?php foreach ($products as $product) : ?>

                <div class="col mb-5">

                    <div class="card h-100">

                        <img
                            class="card-img-top"
                            src="<?= htmlspecialchars($product['image_file']) ?>"
                            alt="<?= $product['product_name'] ?>"
                        >

                        <div class="card-body p-4">

                            <div class="text-center">

                                <h5 class="fw-bolder">
                                    <?= $product['product_name'] ?>
                                </h5>

                                $<?= $product['price'] ?>

                            </div>

                        </div>

                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                            <div class="text-center">

            <?php if (!isset($_SESSION['logedin']) || !$_SESSION['logedin']): ?>
                               
                              <a
                                    class="btn btn-outline-dark mt-auto"
                                    href="<?=BASE_URL.'views/auth/login.php'?>?id=<?= $product['id'] ?>"
                                >
                                Login First
                                </a>

                            <?php else: ?>
                            <a
                                    class="btn btn-outline-dark mt-auto"
                                    href="<?=BASE_URL.'views/product/product.php'?>?id=<?= $product['id'] ?>"

                                >
                                  Detials
                            </a>
                                <a
                                    class="btn btn-outline-dark mt-auto"
                                    href="<?=BASE_URL.'handler/cart/add.php'?>?id=<?= $product['id'] ?>"
                                >
                                Add to Cart

                            </a>
                            <?php endif; ?>
                            </div>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else : ?>

            <div class="col-12 text-center">

                <h4>
                    No Products Found
                </h4>

            </div>

        <?php endif; ?>

    </div>

</div>

</section>
<?php

include BASE_PATH . 'includes/footer.php';

include BASE_PATH . 'includes/footer-scripts.php';
