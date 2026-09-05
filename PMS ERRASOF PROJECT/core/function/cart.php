<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$productsJson = DATA_PATH . "products.json";
$productsUpload = UPLOAD_PATH . "product";

function refresh()
{
    $total = 0;
    $productsCount = 0;

    if (isset($_SESSION['cart']['products']) && is_array($_SESSION['cart']['products'])) {
        foreach ($_SESSION['cart']['products'] as &$product) {
            $product['total_price'] = $product['price'] * $product['quantity'];
            $total += $product['total_price'];
            $productsCount += $product['quantity'];
        }
        unset($product);
    }

    $_SESSION['cart']['total'] = $total;
    $_SESSION['cart']['products_count'] = $productsCount;
}

function add($id = null, $quantity = null)
{
    global $productsJson;

    if (!file_exists($productsJson)) {
        return false;
    }

    $content = file_get_contents($productsJson);
    $products = json_decode($content, true);

    if (!is_array($products)) {
        return false;
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [
            'products' => [],
            'products_count' => 0,
            'total' => 0
        ];
    }

    if (is_array($id)) {
        foreach ($id as $productId => $productQuantity) {
            $productQuantity = (int) $productQuantity;

            if ($productQuantity < 1) {
                continue;
            }

            $foundInJson = null;
            foreach ($products as $p) {
                if ($p['id'] == $productId) {
                    $foundInJson = $p;
                    break;
                }
            }

            if (!$foundInJson) {
                continue;
            }

            $foundInCart = false;
            foreach ($_SESSION['cart']['products'] as &$cartProduct) {
                if ($cartProduct['id'] == $productId) {
                    $cartProduct['quantity'] = $productQuantity;
                    $foundInCart = true;
                    break;
                }
            }
            unset($cartProduct);

            if (!$foundInCart) {
                $_SESSION['cart']['products'][] = [
                    'id' => $foundInJson['id'],
                    'product_name' => $foundInJson['product_name'],
                    'price' => $foundInJson['price'],
                    'quantity' => $productQuantity
                ];
            }
        }

        refresh();
        return true;
    }

    if ($id === null) {
        return false;
    }

    $targetProduct = null;
    foreach ($products as $p) {
        if ($p['id'] == $id) {
            $targetProduct = $p;
            break;
        }
    }

    if (!$targetProduct) {
        return false;
    }

    $isOnlyIdSent = ($quantity === null || $quantity === '' || (isset($_GET['quantity']) && $_GET['quantity'] === ''));

    $found = false;
    foreach ($_SESSION['cart']['products'] as &$cartProduct) {
        if ($cartProduct['id'] == $id) {
            $found = true;

            if ($isOnlyIdSent) {
                $cartProduct['quantity'] += 1;
            } else {
                $cartProduct['quantity'] = (int) $quantity;
            }

            break;
        }
    }
    unset($cartProduct);

    if (!$found) {
        $initialQuantity = $isOnlyIdSent ? 1 : (int) $quantity;
        
        $_SESSION['cart']['products'][] = [
            'id' => $targetProduct['id'],
            'product_name' => $targetProduct['product_name'],
            'price' => $targetProduct['price'],
            'quantity' => $initialQuantity
        ];
    }

    refresh();
    return true;
}

function destroy($id)
{
    if (!isset($_SESSION['cart']['products']) || !is_array($_SESSION['cart']['products'])) {
        return false;
    }

    foreach ($_SESSION['cart']['products'] as $key => $product) {

        if ($product['id'] == $id) {

            unset($_SESSION['cart']['products'][$key]);

            break;
        }
    }

    refresh();

    return true;
}
