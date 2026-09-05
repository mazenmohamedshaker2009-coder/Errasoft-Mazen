<?php

declare(strict_types=1);

$pageTitle = 'Products - EraaSoft PMS';
$pageDescription = 'EraaSoft PMS Products';

require_once dirname(__FILE__, 3) . "/config/config.php";

require BASE_PATH . 'core/function/product.php';

$products = index();

require BASE_PATH . 'includes/nav.php';

require BASE_PATH . 'includes/head.php';

require BASE_PATH . 'includes/header.php';

?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">

                <div>
                    <h2>Products</h2>
                </div>

                <div>
                    <a href="<?=BASE_URL.'views/product/product-create.php'?>" class="btn btn-primary">
                        Create Product
                    </a>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock Quantity</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php if (!empty($products)): ?>

                                <?php foreach ($products as $key => $product): ?>

                                    <tr>

                                        <th scope="row">
                                            <?= $key + 1 ?>
                                        </th>

                                        <td>

                                            <?php if (!empty($product['image_file'])): ?>

                                                <img
                                                    src="<?= $product['image_file'] ?>"
                                                    alt="<?= $product['product_name'] ?>"
                                                    width="70"
                                                    height="70"
                                                    class="img-fluid rounded"
                                                >

                                            <?php endif; ?>

                                        </td>

                                        <td>
                                            <?= $product['product_name'] ?>
                                        </td>

                                        <td>
                                            <?= $product['category_id'] ?>
                                        </td>

                                        <td>
                                            <?= $product['price'] ?>
                                        </td>

                                        <td>
                                            <?= $product['stock_quantity'] ?>
                                        </td>

                                        <td>
                                            <?= $product['description'] ?>
                                        </td>

                                        <td>

                                            <a
                                                href="<?=BASE_URL.'views/product/product-edit.php'?>?id=<?= $product['id'] ?>"
                                                class="btn btn-warning btn-sm mb-1"
                                            >
                                                Edit
                                            </a>

                                            <a
                                                href="<?=BASE_URL.'handler/product/destroy.php'?>?id=<?= $product['id'] ?>"
                                                class="btn btn-danger btn-sm mb-1"
                                            >
                                                Delete
                                            </a>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>

                                    <td colspan="8" class="text-center">
                                        No Products Found
                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>
        </div>

    </div>
</section>

<?php

include BASE_PATH . 'includes/footer.php';

include BASE_PATH . 'includes/footer-scripts.php';
?>
