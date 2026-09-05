<?php

declare(strict_types=1);

$pageTitle = 'Shop Homepage - EraaSoft PMS';
$pageDescription = 'EraaSoft PMS Shop Homepage';

require_once dirname(__FILE__, 3) . "/config/config.php";

require BASE_PATH . 'includes/nav.php';

require BASE_PATH . 'includes/head.php';

require BASE_PATH . 'includes/header.php';

?>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <div class="col-8 mx-auto">
                    <form action="" class="form border my-2 p-3">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Message</label>
                                <textarea name="" id="" class="form-control" rows="7"></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Send" id="" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
