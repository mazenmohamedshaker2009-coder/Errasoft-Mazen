/*!
* EraaSoft PMS - Shop Homepage v5.0.6 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2023 EraaSoft PMS
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
//
//

document.querySelectorAll('.quantity-input').forEach(input => {

    input.addEventListener('input', function () {

        const row = this.closest('.cart-product');

        if (!row) {
            return;
        }

        const priceElement = row.querySelector('.product-price');

        const price = parseFloat(
            priceElement?.textContent.replace('$', '').trim()
        );

        const quantity = parseInt(this.value);

        /*
        |--------------------------------------------------------------------------
        | لو الـ JS مش قادر يقرأ الأرقام
        |--------------------------------------------------------------------------
        | نسيب القيم اللي جاية من PHP زي ما هي
        */

        if (
            !Number.isFinite(price) ||
            !Number.isFinite(quantity) ||
            quantity < 1
        ) {
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Product Total
        |--------------------------------------------------------------------------
        */

        const productTotal = price * quantity;

        const productTotalElement = row.querySelector('.product-total');

        if (productTotalElement) {
            productTotalElement.textContent =
                productTotal.toFixed(2) + ' $';
        }

        /*
        |--------------------------------------------------------------------------
        | Cart Total
        |--------------------------------------------------------------------------
        */

        let cartTotal = 0;

        document.querySelectorAll('.cart-product').forEach(productRow => {

            const totalElement =
                productRow.querySelector('.product-total');

            if (!totalElement) {
                return;
            }

            const total = parseFloat(
                totalElement.textContent.replace('$', '').trim()
            );

            if (Number.isFinite(total)) {
                cartTotal += total;
            }

        });

        const cartTotalElement =
            document.querySelector('.cart-total');

        if (
            cartTotalElement &&
            Number.isFinite(cartTotal)
        ) {
            cartTotalElement.textContent =
                cartTotal.toFixed(2) + ' $';
        }

    });

});



