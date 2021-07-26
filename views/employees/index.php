<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= BASE_URL ?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>node_modules/jsgrid/dist/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>assets/images/favicon-16x16.png">
    <link rel="manifest" href="<?= BASE_URL ?>assets/images/site.webmanifest">
    <link rel="mask-icon" href="<?= BASE_URL ?>assets/images/safari-pinned-tab.svg" color="#5bbad5">
    <script type="text/javascript" src="<?= BASE_URL ?>node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Dashboard</title>
</head>

<body class="d-flex flex-column h-100">

    <?php
    include_once VIEWS . "/header.php";
    ?>

    <div class="container-fluid">
        <main class="col-lg-10 p-2 mx-auto gy-2">
            <div>
                <h2>Employees</h2>
            </div>
            <div id="jsGrid"></div>
        </main>
    </div>

    <?php
    include_once  VIEWS . "/footer.php";
    ?>
</body>


<script>
    let baseUrl = '<?= BASE_URL ?>';
</script>
<script type="text/javascript" src="<?= BASE_URL ?>node_modules/jsgrid/dist/jsgrid.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>assets/js/jsgrid.js"></script>

</html>