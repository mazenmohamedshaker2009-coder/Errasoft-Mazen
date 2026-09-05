<!-- Bootstrap Core JS -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
></script>

<!-- Core Theme JS -->
<script>

    console.log('===== CART JS START =====');

    let status = 'unchanged';

    const originalQuantities = {};

    console.log('[INIT] Initial status:', status);

    document.querySelectorAll('.cart-product').forEach(row => {

        const input = row.querySelector('.quantity-input');

        if (!input) {

            console.warn(
                '[INIT] No quantity input found in row:',
                row
            );

            return;
        }

        const productId = row.dataset.productId;

        const quantity = parseInt(input.value);

        originalQuantities[productId] = quantity;

        console.log(
            '[INIT] Product:',
            productId,
            '| Original quantity:',
            quantity
        );

    });

    console.log(
        '[INIT] Original quantities:',
        originalQuantities
    );


    document.querySelectorAll('.quantity-input').forEach(input => {

        input.addEventListener('input', function () {

            console.log('\n===== QUANTITY CHANGE =====');

            const row = this.closest('.cart-product');

            if (!row) {

                console.error(
                    '[INPUT] Cart product row not found.'
                );

                return;
            }

            const productId = row.dataset.productId;

            const quantity = parseInt(this.value);

            console.log(
                '[INPUT] Product ID:',
                productId
            );

            console.log(
                '[INPUT] New quantity:',
                quantity
            );


            if (
                !Number.isFinite(quantity) ||
                quantity < 1
            ) {

                console.warn(
                    '[INPUT] Invalid quantity:',
                    quantity
                );

                return;
            }

            let changed = false;

            document.querySelectorAll('.cart-product').forEach(productRow => {

                const productInput =
                    productRow.querySelector('.quantity-input');

                if (!productInput) {

                    console.warn(
                        '[CHECK] Quantity input missing:',
                        productRow
                    );

                    return;
                }

                const id = productRow.dataset.productId;

                const currentQuantity =
                    parseInt(productInput.value);

                const originalQuantity =
                    originalQuantities[id];

                console.log(
                    '[CHECK]',
                    id,
                    '| Original:',
                    originalQuantity,
                    '| Current:',
                    currentQuantity
                );


                if (
                    Number.isFinite(currentQuantity) &&
                    currentQuantity !== originalQuantity
                ) {

                    changed = true;

                    console.log(
                        '[CHECK] CHANGE DETECTED:',
                        id
                    );

                }

            });


            if (changed) {

                status = null;

            } else {

                status = 'unchanged';

            }

            console.log(
                '[STATUS] Current status:',
                status
            );


            const products = {};

            document.querySelectorAll('.cart-product').forEach(productRow => {

                const productInput =
                    productRow.querySelector('.quantity-input');

                if (!productInput) {

                    return;
                }

                const id = productRow.dataset.productId;

                const currentQuantity =
                    parseInt(productInput.value);

                if (
                    Number.isFinite(currentQuantity) &&
                    currentQuantity >= 1
                ) {

                    products[id] = currentQuantity;

                } else {

                    console.warn(
                        '[PRODUCTS] Invalid quantity skipped:',
                        id,
                        currentQuantity
                    );

                }

            });


            console.log(
                '[PRODUCTS] Products object:',
                products
            );

            console.log(
                '[PRODUCTS] Products JSON:',
                JSON.stringify(products)
            );


            const url =
                '<?= BASE_URL . 'handler/cart/add.php' ?>' +
                '?id=' + encodeURIComponent(productId) +
                ((isNaN(quantity) || quantity === '' || quantity === null) ? '' : ('&quantity=' + encodeURIComponent(quantity)));


            console.log(
                '[AJAX] Sending request to:',
                url
            );


            fetch(url, {

                method: 'GET'

            })

            .then(response => {

                console.log(
                    '[AJAX] HTTP status:',
                    response.status
                );

                console.log(
                    '[AJAX] HTTP ok:',
                    response.ok
                );

                return response.text();

            })

            .then(responseText => {

                console.log(
                    '[AJAX] Server response:',
                    responseText
                );

                console.log(
                    '[AJAX] Server response length:',
                    responseText.length
                );

            })

            .catch(error => {

                console.error(
                    '[AJAX] Request failed:',
                    error
                );

            });


            const priceElement =
                row.querySelector('.product-price');

            if (!priceElement) {

                console.error(
                    '[TOTAL] Price element not found for:',
                    productId
                );

                return;
            }


            const price = parseFloat(
                priceElement.textContent
                    .replace('$', '')
                    .trim()
            );


            console.log(
                '[TOTAL] Product:',
                productId,
                '| Price:',
                price,
                '| Quantity:',
                quantity
            );


            if (!Number.isFinite(price)) {

                console.error(
                    '[TOTAL] Invalid price:',
                    priceElement.textContent
                );

                return;
            }


            const productTotal =
                price * quantity;


            console.log(
                '[TOTAL] Product total:',
                productTotal
            );


            const productTotalElement =
                row.querySelector('.product-total');


            if (productTotalElement) {

                productTotalElement.textContent =
                    productTotal.toFixed(2) + ' $';

            } else {

                console.warn(
                    '[TOTAL] Product total element not found:',
                    productId
                );

            }


            let cartTotal = 0;

            document
                .querySelectorAll('.cart-product')
                .forEach(productRow => {

                    const totalElement =
                        productRow.querySelector('.product-total');

                    if (!totalElement) {

                        console.warn(
                            '[CART TOTAL] Product total element missing:',
                            productRow
                        );

                        return;
                    }


                    const total = parseFloat(
                        totalElement.textContent
                            .replace('$', '')
                            .trim()
                    );


                    if (Number.isFinite(total)) {

                        cartTotal += total;

                    } else {

                        console.warn(
                            '[CART TOTAL] Invalid product total:',
                            totalElement.textContent
                        );

                    }

                });


            console.log(
                '[CART TOTAL] New cart total:',
                cartTotal
            );


            const cartTotalElement =
                document.querySelector('.cart-total');


            if (
                cartTotalElement &&
                Number.isFinite(cartTotal)
            ) {

                cartTotalElement.textContent =
                    cartTotal.toFixed(2) + ' $';

            } else {

                console.warn(
                    '[CART TOTAL] Cart total element not found.'
                );

            }


            let productsCount = 0;

            document
                .querySelectorAll('.quantity-input')
                .forEach(input => {

                    const quantity =
                        parseInt(input.value);


                    if (
                        Number.isFinite(quantity) &&
                        quantity >= 1
                    ) {

                        productsCount += quantity;

                    } else {

                        console.warn(
                            '[COUNT] Invalid quantity:',
                            quantity
                        );

                    }

                });


            console.log(
                '[COUNT] Products count:',
                productsCount
            );


            const cartProductsCountElement =
                document.querySelector(
                    '#cart-products-count'
                );


            if (cartProductsCountElement) {

                cartProductsCountElement.textContent =
                    productsCount;

            } else {

                console.warn(
                    '[COUNT] #cart-products-count not found.'
                );

            }


            console.log(
                '[FINAL] Status:',
                status
            );

            console.log(
                '[FINAL] Products:',
                products
            );

            console.log(
                '[FINAL] Cart total:',
                cartTotal
            );

            console.log(
                '[FINAL] Products count:',
                productsCount
            );

            console.log(
                '===== END QUANTITY CHANGE =====\n'
            );

        });

    });


    console.log(
        '[INIT] Quantity inputs found:',
        document.querySelectorAll('.quantity-input').length
    );

    console.log(
        '===== CART JS READY ====='
    );

</script></body>

</html>
