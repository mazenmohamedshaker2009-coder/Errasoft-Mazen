<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container px-4 px-lg-5">

        <!-- Brand -->
        <a
            class="navbar-brand"
            href="<?=BASE_URL.'index.php'?>"
        >
            EraaSoft PMS
        </a>

        <!-- Mobile Toggle -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div
            class="collapse navbar-collapse"
            id="navbarSupportedContent"
        >

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                <li class="nav-item">
                    <a
                        class="nav-link active"
                        aria-current="page"
                        href="<?=BASE_URL.'index.php'?>"
                    >
                        Home
                    </a>
                </li>


                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="<?=BASE_URL.'views/main/about.php'?>"
                    >
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="<?=BASE_URL.'views/main/contact.php'?>"

                    >
                        Contact
                    </a>
                </li>

            <?php if (!isset($_SESSION['logedin']) || !$_SESSION['logedin']): ?>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="<?=BASE_URL.'views/auth/login.php'?>"
                    >
                       Login 
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="<?=BASE_URL.'views/auth/register.php'?>"
                    >
                       Register
                    </a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="<?=BASE_URL.'views/product/product-table.php'?>"
                    >
                    Products
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="<?=BASE_URL.'handler/auth/logout.php'?>"
                    >
                       Logout 
                    </a>
                </li>
                <?php endif; ?>
            </ul>

            <!-- Cart -->
            <form
                class="d-flex"
                action="<?=BASE_URL.'views/main/cart.php'?>"
                method="get"
            >

                <button
                    class="btn btn-outline-dark"
                    type="submit"
                >

                    <i class="bi-cart-fill me-1"></i>

                    Cart

                    <span class="badge bg-dark text-white ms-1 rounded-pill" id="cart-products-count">
                       <?= $_SESSION['cart']['products_count'] ?? 0 ?>
                    </span>         

                </button>

            </form>

        </div>

    </div>

</nav>
