<?php

declare(strict_types=1);

$pageTitle = 'Shop Homepage - EraaSoft PMS';
$pageDescription = 'EraaSoft PMS Shop Homepage';

require_once dirname(__FILE__, 3) . "/config/config.php";

require BASE_PATH . 'includes/nav.php';

require BASE_PATH . 'includes/head.php';

require BASE_PATH . 'includes/header.php';

?>


<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="text-center">

        <h1 class="display-1 fw-bold text-primary">404</h1>

        <h2 class="fw-bold mb-3">Page Not Found</h2>

        <p class="text-secondary mb-4">
            Sorry, the page you're looking for doesn't exist.
        </p>

        <a href="<?= BASE_URL ?>" class="btn btn-primary px-4">
            Go Home
        </a>

    </div>
</div>

<?php

/*
|--------------------------------------------------------------------------
| Footer
|--------------------------------------------------------------------------
*/

include BASE_PATH . 'includes/footer.php';


/*
|--------------------------------------------------------------------------
| Footer Scripts
|--------------------------------------------------------------------------
*/

include BASE_PATH . 'includes/footer-scripts.php';
