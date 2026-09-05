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

        <h1 class="display-1 fw-bold text-warning">405</h1>

        <h2 class="fw-bold mb-3">Method Not Allowed</h2>

        <p class="text-secondary mb-4">
            The request method used is not allowed for this page.
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
