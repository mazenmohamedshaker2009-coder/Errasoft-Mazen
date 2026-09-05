<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



function validateStore($data, $files)
{
    $error = [];

    $product_name = $data['product_name'] ?? '';
    $category_id = $data['category_id'] ?? '';
    $price = $data['price'] ?? '';
    $stock_quantity = $data['stock_quantity'] ?? '';
    $image_file = $files['image_file'] ?? '';
    $description = $data['description'] ?? '';



    $content = file_get_contents(DATA_PATH . 'products.json');

    $products = json_decode($content, true);



    if (empty($product_name)) {

        $error['product_name'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "The product name input is required."
        ];

    } elseif (strlen($product_name) < 3) {

        $error['product_name'] = [
            "type" => "danger",
            "title" => "Invalid Product Name",
            "message" => "Product name must be at least 3 characters."
        ];

    } else {

        foreach ($products as $product) {

            if ($product['product_name'] === $product_name) {

                $error['product_name'] = [
                    "type" => "danger",
                    "title" => "Product Name Already Exists",
                    "message" => "This product name is already registered."
                ];

                break;
            }
        }
    }


    // Category

    if (empty($category_id)) {

        $error['category_id'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Please select a category."
        ];
    }


    // Price

    if (empty($price)) {

        $error['price'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Price input is required."
        ];

    } elseif (!is_numeric($price)) {

        $error['price'] = [
            "type" => "danger",
            "title" => "Invalid Price",
            "message" => "Price must contain numbers only."
        ];

    } elseif ($price < 100) {

        $error['price'] = [
            "type" => "danger",
            "title" => "Invalid Price",
            "message" => "Price must be at least 100."
        ];

    } elseif ($price > 100000000) {

        $error['price'] = [
            "type" => "danger",
            "title" => "Invalid Price",
            "message" => "Price cannot be more than 100 million."
        ];
    }


    // Stock Quantity

    if (empty($stock_quantity)) {

        $error['stock_quantity'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Stock quantity input is required."
        ];

    } elseif (!ctype_digit($stock_quantity)) {

        $error['stock_quantity'] = [
            "type" => "danger",
            "title" => "Invalid Stock Quantity",
            "message" => "Stock quantity must contain numbers only."
        ];

    } elseif ($stock_quantity > 100000) {

        $error['stock_quantity'] = [
            "type" => "danger",
            "title" => "Invalid Stock Quantity",
            "message" => "Stock quantity cannot be more than 100000."
        ];
    }


    // Image File

    if (empty($image_file)) {

        $error['image_file'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Product image is required."
        ];

    } else {

        $allowed_types = ['image/jpeg', 'image/png', 'image/webp'];

        if (!in_array($image_file['type'], $allowed_types)) {

            $error['image_file'] = [
                "type" => "danger",
                "title" => "Invalid Image",
                "message" => "Image must be a JPG, JPEG, PNG or WEBP file."
            ];

        } elseif ($image_file['size'] > 8388608) {

            $error['image_file'] = [
                "type" => "danger",
                "title" => "Image Too Large",
                "message" => "Image size cannot be more than 8 MB."
            ];
        }
    }


    // Description

    if (empty($description)) {

        $error['description'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Description input is required."
        ];

    } elseif (str_word_count($description) > 400) {

        $error['description'] = [
            "type" => "danger",
            "title" => "Invalid Description",
            "message" => "Description cannot contain more than 400 words."
        ];
    }


    return $error;
}

function validateUpdate($data, $files, $id)
{
    $error = [];

    $product_name = $data['product_name'] ?? '';
    $category_id = $data['category_id'] ?? '';
    $price = $data['price'] ?? '';
    $stock_quantity = $data['stock_quantity'] ?? '';
    $image_file = $files['image_file'] ?? null;
    $description = $data['description'] ?? '';


    // Products Data

    $content = file_get_contents(DATA_PATH . 'products.json');

    $products = json_decode($content, true);


    // Product Name

    if (empty($product_name)) {

        $error['product_name'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "The product name input is required."
        ];

    } elseif (strlen($product_name) < 3) {

        $error['product_name'] = [
            "type" => "danger",
            "title" => "Invalid Product Name",
            "message" => "Product name must be at least 3 characters."
        ];

    } else {

        foreach ($products as $product) {

            if ($product['id'] !== $id && $product['product_name'] === $product_name) {

                $error['product_name'] = [
                    "type" => "danger",
                    "title" => "Product Name Already Exists",
                    "message" => "This product name is already registered."
                ];

                break;
            }
        }
    }


    // Category

    if (empty($category_id)) {

        $error['category_id'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Please select a category."
        ];
    }


    // Price

    if (empty($price)) {

        $error['price'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Price input is required."
        ];

    } elseif (!is_numeric($price)) {

        $error['price'] = [
            "type" => "danger",
            "title" => "Invalid Price",
            "message" => "Price must contain numbers only."
        ];

    } elseif ($price < 100) {

        $error['price'] = [
            "type" => "danger",
            "title" => "Invalid Price",
            "message" => "Price must be at least 100."
        ];

    } elseif ($price > 100000000) {

        $error['price'] = [
            "type" => "danger",
            "title" => "Invalid Price",
            "message" => "Price cannot be more than 100 million."
        ];
    }


    // Stock Quantity

    if (empty($stock_quantity)) {

        $error['stock_quantity'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Stock quantity input is required."
        ];

    } elseif (!ctype_digit($stock_quantity)) {

        $error['stock_quantity'] = [
            "type" => "danger",
            "title" => "Invalid Stock Quantity",
            "message" => "Stock quantity must contain numbers only."
        ];

    } elseif ($stock_quantity > 100000) {

        $error['stock_quantity'] = [
            "type" => "danger",
            "title" => "Invalid Stock Quantity",
            "message" => "Stock quantity cannot be more than 100000."
        ];
    }


    // Image File

    if ($image_file !== null && $image_file['error'] !== UPLOAD_ERR_NO_FILE) {

        $allowed_types = ['image/jpeg', 'image/png', 'image/webp'];

        if (!in_array($image_file['type'], $allowed_types)) {

            $error['image_file'] = [
                "type" => "danger",
                "title" => "Invalid Image",
                "message" => "Image must be a JPG, JPEG, PNG or WEBP file."
            ];

        } elseif ($image_file['size'] > 8388608) {

            $error['image_file'] = [
                "type" => "danger",
                "title" => "Image Too Large",
                "message" => "Image size cannot be more than 8 MB."
            ];
        }
    }


    // Description

    if (empty($description)) {

        $error['description'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Description input is required."
        ];

    } elseif (str_word_count($description) > 400) {

        $error['description'] = [
            "type" => "danger",
            "title" => "Invalid Description",
            "message" => "Description cannot contain more than 400 words."
        ];
    }


    return $error;
}
