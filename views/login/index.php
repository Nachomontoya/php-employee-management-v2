<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASE_URL ?>node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?= BASE_URL ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/login.css">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>assets/images/favicon-16x16.png">
    <link rel="manifest" href="<?= BASE_URL ?>assets/images/site.webmanifest">
    <link rel="mask-icon" href="<?= BASE_URL ?>assets/images/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>PHP Employee Management V1</title>
</head>

<body>
    <div class="d-flex login-container align-items-center justify-content-center">
        <div class="login-form p-5 rounded-5 d-flex flex-column justify-content-between max-width-450 bg-light">
            <div class="h-25 text-center">
                <h2>Welcome</h2>
                <p>Login to start</p>
            </div>
            <form class="d-flex flex-column align-items-center" id="formLogin" action="<?= BASE_URL ?>login/signIn" method="post">
                <div class="mb-3 w-100">
                    <input type="email" class="form-control rounded-4 py-2 border-0" placeholder="Your Email *" value="" name="email" required />
                </div>
                <div class="mb-3 w-100">
                    <input type="password" class="form-control rounded-4 py-2 border-0" placeholder="Your Password *" name="password" value="" required />
                </div>
                <div class="my-3 w-100 text-center">
                    <input type="submit" class="btn btnSubmit rounded-4 py-2 border-0" value="Sign In" />
                </div>
            </form>
            <div class="text-danger text-center">
                <?php
                echo $this->message;
                ?>
            </div>
        </div>
    </div>
</body>
<!-- <script src="./assets/js/index.js"></script> -->

</html>