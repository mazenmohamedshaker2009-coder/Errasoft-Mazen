<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$productsJson = DATA_PATH . "products.json";
$ordersJson = DATA_PATH . "orders.json";

function checkout($data)
{
    global $productsJson, $ordersJson;

    $content = file_get_contents($productsJson);

    $products = json_decode($content, true);

    $cart = $_SESSION['cart'] ?? [
        'products' => []
    ];

    $error = [];

    foreach ($cart['products'] as $cartProduct) {

        $productId = $cartProduct['id'];
        $cartQuantity = $cartProduct['quantity'];

        foreach ($products as $product) {

            if ($product['id'] === $productId) {

                if ($product['stock_quantity'] < $cartQuantity) {

                    $error['stock'] = [
                        "type" => "danger",
                        "title" => "Insufficient Stock",
                        "message" => "The requested quantity of {$product['product_name']} is not available."
                    ];

                    break 2;
                }

                break;
            }
        }
    }


    if (!empty($error)) {

        $_SESSION['error'] = $error;

        return false;
    }


    foreach ($cart['products'] as $cartProduct) {

        $productId = $cartProduct['id'];
        $cartQuantity = $cartProduct['quantity'];

        foreach ($products as $key => $product) {

            if ($product['id'] === $productId) {

                $products[$key]['stock_quantity']
                    -= $cartQuantity;

                break;
            }
        }
    }


    $orderProducts = [];

    foreach ($cart['products'] as $cartProduct) {

        $orderProducts[] = [
            'id' => $cartProduct['id'],
            'product_name' => $cartProduct['product_name'],
            'price' => $cartProduct['price'],
            'quantity' => $cartProduct['quantity'],
            'total_price' => $cartProduct['total_price']
        ];
    }


    $order = [
        'id' => uniqid(),
        'customer' => [
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'notes' => $data['notes']
        ],
        'products' => $orderProducts,
        'total' => $cart['total']
    ];


    $orders = [];

    if (file_exists($ordersJson)) {

        $ordersContent = file_get_contents($ordersJson);

        $orders = json_decode($ordersContent, true);

        if (!is_array($orders)) {
            $orders = [];
        }
    }

    $orders[] = $order;


    file_put_contents(
        $productsJson,
        json_encode($products, JSON_PRETTY_PRINT)
    );

    file_put_contents(
        $ordersJson,
        json_encode($orders, JSON_PRETTY_PRINT)
    );


    $_SESSION['cart'] = [
        'products' => [],
        'products_count' => 0,
        'total' => 0
    ];


    return true;
}
