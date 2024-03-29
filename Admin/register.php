<?php
require_once('../config/connect.php');

if (isset($_POST['sign-up'])) {
    $response = signup($_POST);
    if ($response === true) {
        echo "<script>alert('Sign Up successful')</script>";
        header("Location: login.php");
    } elseif (is_array($response)) {
        foreach ($response as $error) {
            echo "<div class=\"alert alert-danger alert-dismissible text-bg-danger border-0 fade show\" role=\"alert\">
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            <strong>Error - </strong> '$error'
        </div>";
        }
    } else {
        echo "<div class=\"alert alert-danger alert-dismissible text-bg-danger border-0 fade show\" role=\"alert\">
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            <strong>Error - </strong> There was an issue while signing up
        </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-lg-5">
                    <div>
                        <div class="card bg-transparent mb-0">
                            <!-- Logo-->
                            <div class="auth-brand">

                            </div>

                            <div class="card-body p-4">

                                <div class="w-75">
                                    <h4 class="text-dark-50 mt-0 fw-bold"> Sign Up</h4>
                                    <p class="text-muted mb-4">Don't have an account? Create your account, it takes less
                                        than a minute </p>
                                </div>

                                <form method="post" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Enter your names</label>
                                        <div>
                                            <input class="form-control mb-3" type="text" id="fullname"
                                                placeholder="Enter your First name" name="firstname" required>
                                            <input class="form-control" type="text" id="fullname"
                                                placeholder="Enter your Last name" name="lastname" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" name="email" required
                                            placeholder="Enter your email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="phonenumber" class="form-label">Phone Number</label>
                                        <input class="form-control" type="tel" id="phonenumber" name="phonenumber"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Add Profile Picture</label>
                                        <input type="file" id="example-fileinput" name="image" required
                                            accept="image/*" class="form-control mb-3">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signup"
                                                required>
                                            <label class="form-check-label" for="checkbox-signup">I accept <a href="#"
                                                    class="text-muted">Terms and Conditions</a></label>
                                        </div>
                                    </div>

                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary w-100" type="submit" name="sign-up"> Sign Up
                                        </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted bg-body">Already have account? <a href="login.php"
                                    class="text-muted ms-1 link-offset-3 text-decoration-underline"><b>Log In</b></a>
                            </p>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="bg-body">
            <script>document.write(new Date().getFullYear())</script> © Powerx - Coderthemes.com
        </span>
    </footer>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>