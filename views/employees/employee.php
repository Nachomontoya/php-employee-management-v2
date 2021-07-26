<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/main.css">
    <script type="text/javascript" src="<?= BASE_URL ?>/node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>/node_modules/jsgrid/dist/jsgrid.min.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>/assets/images/favicon-16x16.png">
    <link rel="manifest" href="<?= BASE_URL ?>/assets/images/site.webmanifest">
    <link rel="mask-icon" href="<?= BASE_URL ?>/assets/images/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Employee page</title>
</head>

<body class="d-flex flex-column h-100">
    <?php
    include_once VIEWS . "/header.php";
    ?>

    <div class="container-fluid">

        <main class="col-lg-8 col-md-10 p-2 mx-auto gy-2">
            <div class="pb-2">
                <h2 id="employeeTitle">Employee</h2>
            </div>
            <div class="col">
                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="name" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" value="">
                        </div>
                        <div class="col-md-8">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                            <small class="text-muted">We'll never share this email with anyone else.</small>
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender">
                                <option value="">Choose...</option>
                                <option value="woman">Woman</option>
                                <option value="man">Man</option>
                                <option value="other">Other</option>
                                <option value="no answer">No answer</option>
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" value="" required>
                            <div class="invalid-feedback">
                                Please enter the employee's city.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="streetAddress" class="form-label">Street Address</label>
                            <input type="text" class="form-control" id="streetAddress" value="" required>
                            <div class="invalid-feedback">
                                Please enter the street number.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" value="" required>
                            <div class="invalid-feedback">
                                Please enter the state.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" value="" required>
                            <div class="invalid-feedback">
                                Please enter the employee's age.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="postalCode" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="postalCode" value="" required>
                            <div class="invalid-feedback">
                                Please enter the employee's postal code.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="phoneNumber" value="" required>
                            <div class="invalid-feedback">
                                Please enter the phone number.
                            </div>
                        </div>
                    </div>

                    <div class="text-center pt-4">
                        <button type="submit" class="btn btn-primary" id="submitBtn">Update Employee</button>
                        <a href="<?= BASE_URL ?>" class="btn btn-secondary">Return</a>

                    </div>

                </form>
                <div id="responseMsg"></div>
            </div>
    </div>
    <div class="modal fade" id="errorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content bg-danger">
                <div class="modal-header border-0">
                    <h3 class="modal-title text-light mx-auto" id="errorModalLabel">Error!</h3>
                </div>
                <div class="modal-body text-center text-light h5">
                    This id is not related to any user
                </div>
                <div class="modal-footer border-0">
                    <a href="<?= BASE_URL ?>" class="btn btn-light mx-auto">Go back to dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="successfulAddModal" tabindex="-1" aria-labelledby="successfulAddModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h3 class="modal-title mx-auto" id="successfulAddModalLabel">Success!</h3>
                </div>
                <div class="modal-body text-center h5">
                    The employee has been added to the database
                </div>
                <div class="modal-footer border-0">
                    <a href="./dashboard.php" class="btn btn-primary mx-auto">Go back to dashboard</a>
                </div>
            </div>
        </div>
    </div>
    </main>
    </div>

    <?php
    include_once  VIEWS . "/footer.php";
    ?>

    <script>
        let userId = <?= $this->id ?>;
        let baseUrl = '<?= BASE_URL ?>';
    </script>
    <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/employee.js"></script>

</body>

</html>