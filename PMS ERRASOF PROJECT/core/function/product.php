<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$productsJson = DATA_PATH . "products.json";
$productsUpload = UPLOAD_PATH . "product";

function index()
{
    global $productsJson;

    $content = file_get_contents($productsJson);

    $products = json_decode($content, true);

    return $products;
}


function indexDetails($id)
{
    global $productsJson;

    $content = file_get_contents($productsJson);

    $products = json_decode($content, true);

    $product = [];
    $relatedProducts = [];

    foreach ($products as $item) {

        if ($item['id'] === $id) {
            $product = $item;
        }
    }

    if (!empty($product)) {

        foreach ($products as $item) {

            if (
                $item['category_id'] === $product['category_id'] &&
                $item['id'] !== $product['id']
            ) {
                $relatedProducts[] = $item;
            }
        }
    }

    return [
        'product' => $product,
        'related_products' => $relatedProducts
    ];
}

function store($data, $files)
{
    global $productsJson, $productsUpload;

    $content = file_get_contents($productsJson);

    $products = json_decode($content, true);

    $image = $files['image_file'];

    $image_name = time() . '_' . basename($image['name']);

    $image_path = $productsUpload . '/' . $image_name;

    if (!move_uploaded_file($image['tmp_name'], $image_path)) {
        return false;
    }

    $products[] = [
        'id' => uniqid(),
        'product_name' => $data['product_name'],
        'category_id' => $data['category_id'],
        'price' => $data['price'],
        'stock_quantity' => $data['stock_quantity'],
        'image_file' =>  BASE_URL . 'uploads' . '/' . 'product' . '/' . $image_name,
        'description' => $data['description']
    ];

    file_put_contents(
        $productsJson,
        json_encode($products, JSON_PRETTY_PRINT)
    );

    return true;
}

function edit($id)
{
    global $productsJson;

    $content = file_get_contents($productsJson);

    $products = json_decode($content, true);

    foreach ($products as $product) {
        if ($product['id'] === $id) {
            return $product;
        }
    }

    return [];
}

function update($data, $files, $id)
{
    global $productsJson, $productsUpload;

    $content = file_get_contents($productsJson);

    $products = json_decode($content, true);

    foreach ($products as $key => $product) {

        if ($product['id'] === $id) {

            $image = $product['image_file'];

            if (isset($files['image_file']) && $files['image_file']['error'] === UPLOAD_ERR_OK) {

                $image_file = $files['image_file'];

                $image_name = time() . '_' . basename($image_file['name']);

                $image_path = $productsUpload . '/' . $image_name;

                if (!move_uploaded_file($image_file['tmp_name'], $image_path)) {
                    return false;
                }

                $old_image = str_replace(BASE_URL, '', $product['image_file']);

                $old_image_path = BASE_PATH . $old_image;

                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }

                $image = BASE_URL . 'uploads' . '/' . 'product' . '/' . $image_name;
            }

            $newProduct = [
                'id' => $product['id'],
                'product_name' => $data['product_name'],
                'category_id' => $data['category_id'],
                'price' => $data['price'],
                'stock_quantity' => $data['stock_quantity'],
                'image_file' => $image,
                'description' => $data['description']
            ];

            unset($products[$key]);

            $products[] = $newProduct;

            file_put_contents(
                $productsJson,
                json_encode(array_values($products), JSON_PRETTY_PRINT)
            );

            return true;
        }
    }

    return false;
}

function destroy($id)
{
    global $productsJson;

    $content = file_get_contents($productsJson);

    $products = json_decode($content, true);

    foreach ($products as $key => $product) {

        if ($product['id'] === $id) {

            $old_image = str_replace(BASE_URL, '', $product['image_file']);

            $old_image_path = BASE_PATH . $old_image;

            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }

            unset($products[$key]);

            file_put_contents(
                $productsJson,
                json_encode(array_values($products), JSON_PRETTY_PRINT)
            );

            return true;
        }
    }

    return false;
}
