<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$pageTitle = 'Shop Homepage - EraaSoft PMS';
$pageDescription = 'EraaSoft PMS Shop Homepage';

require_once dirname(__FILE__, 3) . "/config/config.php";

require BASE_PATH . 'core/function/product.php';

$data = edit($_GET['id']);

require BASE_PATH . 'includes/nav.php';

require BASE_PATH . 'includes/head.php';

?>

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Update Product</h1>
            <p class="lead fw-normal text-white-50 mb-0">Update your product information</p>
        </div>
    </div>
</header>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <form action="<?=BASE_URL.'handler/product/update.php'?>" method="POST" class="border rounded p-4 shadow-sm bg-white" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">

                <div class="mb-3">
                    <label for="product_name" class="form-label fw-bold">
                        Product Name
                    </label>

                    <input
                        type="text"
                        id="product_name"
                        name="product_name"
                        class="form-control border border-success"
                        placeholder="Enter product name"
                        value="<?= htmlspecialchars($data['product_name']) ?>"
                    >

                    <?php if (!empty($_SESSION['error']['product_name'])): ?>

                        <div class="text-danger mt-1">
                            <?= htmlspecialchars($_SESSION['error']['product_name']['message']) ?>
                        </div>

                    <?php endif; ?>
                </div>


                <div class="mb-3">
                    <label for="product_category" class="form-label fw-bold">
                        Category
                    </label>

                    <select
                        id="product_category"
                        name="category_id"
                        class="form-select border border-success"
                    >
                        <option value="">Select category</option>
                        <option value="1" <?= $data['category_id'] == '1' ? 'selected' : '' ?>>Sports Cars</option>
                        <option value="2" <?= $data['category_id'] == '2' ? 'selected' : '' ?>>SUVs</option>
                        <option value="3" <?= $data['category_id'] == '3' ? 'selected' : '' ?>>Sedans</option>
                        <option value="4" <?= $data['category_id'] == '4' ? 'selected' : '' ?>>Electric Cars</option>
                        <option value="5" <?= $data['category_id'] == '5' ? 'selected' : '' ?>>Luxury Cars</option>
                    </select>

                    <?php if (!empty($_SESSION['error']['category_id'])): ?>

                        <div class="text-danger mt-1">
                            <?= htmlspecialchars($_SESSION['error']['category_id']['message']) ?>
                        </div>

                    <?php endif; ?>
                </div>


                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label fw-bold">
                            Price
                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            class="form-control border border-success"
                            step="0.01"
                            placeholder="0.00"
                            value="<?= htmlspecialchars($data['price']) ?>"
                        >

                        <?php if (!empty($_SESSION['error']['price'])): ?>

                            <div class="text-danger mt-1">
                                <?= htmlspecialchars($_SESSION['error']['price']['message']) ?>
                            </div>

                        <?php endif; ?>
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="stock" class="form-label fw-bold">
                            Stock Quantity
                        </label>

                        <input
                            type="number"
                            id="stock"
                            name="stock_quantity"
                            class="form-control border border-success"
                            value="<?= htmlspecialchars($data['stock_quantity']) ?>"
                        >

                        <?php if (!empty($_SESSION['error']['stock_quantity'])): ?>

                            <div class="text-danger mt-1">
                                <?= htmlspecialchars($_SESSION['error']['stock_quantity']['message']) ?>
                            </div>

                        <?php endif; ?>
                    </div>

                </div>


                <div class="mb-3">
                    <label for="image_file" class="form-label fw-bold">
                        Image
                    </label>

                    <input
                        type="file"
                        id="image_file"
                        name="image_file"
                        class="form-control border border-success"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <?php if (!empty($_SESSION['error']['image_file'])): ?>

                        <div class="text-danger mt-1">
                            <?= htmlspecialchars($_SESSION['error']['image_file']['message']) ?>
                        </div>

                    <?php endif; ?>
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        class="form-control border border-success"
                        placeholder="Write a short product description..."
                    ><?= htmlspecialchars($data['description']) ?></textarea>

                    <?php if (!empty($_SESSION['error']['description'])): ?>

                        <div class="text-danger mt-1">
                            <?= htmlspecialchars($_SESSION['error']['description']['message']) ?>
                        </div>

                    <?php endif; ?>
                </div>


                <div class="mb-4">
                    <label class="form-label fw-bold d-block">
                        Status
                    </label>

                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="status"
                            id="active"
                            value="active"
                            <?= $data['status'] === 'active' ? 'checked' : '' ?>
                        >
                        <label class="form-check-label" for="active">
                            Active
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="status"
                            id="inactive"
                            value="inactive"
                            <?= $data['status'] === 'inactive' ? 'checked' : '' ?>
                        >
                        <label class="form-check-label" for="inactive">
                            Inactive
                        </label>
                    </div>
                </div>


                <div class="d-flex gap-2">
           <button
    type="submit"
    class="btn btn-primary px-4"
>
    Update Product
</button>            
                </div>

            </form>
        </div>
    </div>
</div>

<?php

include BASE_PATH . 'includes/footer.php';

include BASE_PATH . 'includes/footer-scripts.php';

unset($_SESSION['error']);
