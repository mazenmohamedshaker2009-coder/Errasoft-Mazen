<?php $path = ''; $homePath = '../../'; ?>
<?php
session_start();
?>

<?php include __DIR__ . '/../../inc/head.php'; ?>

<?php include __DIR__ . '/../../inc/header.php'; ?>
<?php include __DIR__ . '/../../inc/nave.php'; ?>

            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Get in touch</h1>
                            <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->


<form id="contactForm" action="../../handler/storeUser.php" method="POST">

    <!-- Name -->
    <div class="form-floating mb-3">
        <input
            class="form-control"
            id="name"
            type="text"
            name="user_name"
            placeholder="Enter your name..."
        >

        <label for="name">Full name</label>

        <?php
        if (isset($_SESSION['error']) && $_SESSION['error_field'] === 'user_name') {
        ?>
            <div class="text-danger small mt-1">
                <?= $_SESSION['error'] ?>
            </div>
        <?php
        }
        ?>
    </div>


    <!-- Email -->
    <div class="form-floating mb-3">
        <input
            class="form-control"
            id="email"
            type="email"
            name="email"
            placeholder="name@example.com"
        >

        <label for="email">Email address</label>
    </div>


    <!-- Phone -->
    <div class="form-floating mb-3">
        <input
            class="form-control"
            id="phone"
            type="tel"
            name="phone"
            placeholder="(123) 456-7890"
        >

        <label for="phone">Phone number</label>
    </div>


    <!-- Message -->
    <div class="form-floating mb-3">
        <textarea
            class="form-control"
            id="message"
            name="message"
            placeholder="Enter your message here..."
            style="height: 10rem"
        ></textarea>

        <label for="message">Message</label>

        <?php
        if (isset($_SESSION['error'])) {
        ?>
            <div class="text-danger small mt-1">
                <?= $_SESSION['error'] ?>
            </div>
        <?php
        }
        ?>
    </div>


    <!-- Submit -->
    <div class="d-grid">
        <button
            class="btn btn-primary btn-lg"
            type="submit"
        >
            Submit
        </button>
    </div>

</form>

                         </div>
                        </div>
                    </div>
                </div>
            </section>

<?php unset($_SESSION['error']); ?>
<?php include __DIR__ . '/../../inc/footer.php'; ?>
<?php include __DIR__ . '/../../inc/footer-script.php'; ?>
