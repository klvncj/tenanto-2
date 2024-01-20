<?php 
require_once('../config/connect.php');
allow_access($_SESSION['id'], "./Admin/login.php");
if(isset($_SESSION['id'])){
  $account_id = $_SESSION['id'];
  $response = get_user($account_id);
    if ($response) {
      extract($response);
    }
  } else {
    echo "<script>alert('User not found')</script>";
    header("Location: ../login.php");
}

if (isset($_POST['create'])) {
    $response = createListings($_POST);
    if ($response === true) {
        echo "<div class=\"alert alert-success alert-dismissible text-bg-success border-0  position-absolute fade show\" style=\"z-index: 2000;\" role=\"alert\">
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            <strong>Success</strong> Listing has been created 
        </div>";
    } elseif (is_array($response)) {
        foreach ($response as $error) {
            echo "<div class=\"alert alert-danger alert-dismissible text-bg-danger border-0  position-absolute fade show\" style=\"z-index: 2000;\" role=\"alert\">
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            <strong>Error - </strong> '$error'
        </div>";
        }
    } else {
        echo "<div class=\"alert alert-danger alert-dismissible text-bg-danger border-0  position-absolute fade show\" style=\"z-index: 2000;\" role=\"alert\">
            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            <strong>Error - </strong> There was an issue while creating listing
        </div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Starter Page | Powerx - Bootstrap 5 Admin & Dashboard Template</title>
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

    <body>
        <!-- Begin page -->
        <div class="wrapper">

            
            <!-- ========== Topbar Start ========== -->
            <?php
            require_once('topbar.php');
            ?>
            <!-- ========== Topbar End ========== -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php
            require_once('leftsidebar.php');
            ?>
            <!-- ========== Left Sidebar End ========== -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
        
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Powerx</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Create Listing</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                    </div> 
                    <!-- container -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Name Your Listing</label>
                            <input type="text" id="simpleinput" name="name" class="form-control">
                        </div>
                       <input type="hidden" name="lister" value="<?=$account_id?>">
                        <div class="mb-3">
                            <label for="floatingSelect" class="form-label">Categories</label>
                            <select class="form-select" id="floatingSelect" name="category" aria-label="Floating label select example">
                                <option selected disabled>Select a Category</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Land">Land</option>
                                <option value="Lodge">Lodge</option>
                                <option value="Houses">Houses</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Set your Location</label>
                            <input type="text" id="simpleinput" name="location" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="example-fileinput" class="form-label">Add Photos (Required Number [5])</label>
                            <input type="file" id="example-fileinput" name="image1" required  accept="image/*" class="form-control mb-3">
                            <input type="file" id="example-fileinput" name="image2" required  accept="image/*" class="form-control mb-3">
                            <input type="file" id="example-fileinput" name="image3" required  accept="image/*" class="form-control mb-3">
                            <input type="file" id="example-fileinput" name="image4" required  accept="image/*" class="form-control mb-3">
                            <input type="file" id="example-fileinput" name="image5" required  accept="image/*" class="form-control mb-3">
                        </div>
                        

                        <div class="mb-3">
                            <label for="example-number" class="form-label">Enter An Amount</label>
                            <input class="form-control" id="example-number"  type="number" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="floatingSelect" class="form-label">Frequency</label>
                            <select class="form-select" id="floatingSelect" name="frequency" aria-label="Floating label select example">
                                <option selected disabled>Choose a frequency of payment</option>
                                <option value="Day">Per Day</option>
                                <option value="Week">Per Week</option>
                                <option value="Month">Per Month</option>
                                <option value="Year">Per Year</option>
                                <option value="One Time">One Time</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="example-textarea" class="form-label">Description</label>
                            <textarea class="form-control" id="example-textarea" name="details" rows="5"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="create" class="btn btn-lg btn-success">Create Listing</button>
                        </div>

                    </form>
                </div> <!-- content -->

                <!-- Footer Start -->
                <?php 
           require_once('footer.php')
           ?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Theme Settings -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                <h5 class="text-white m-0">Theme Settings</h5>
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body p-0">
                <div data-simplebar class="h-100">
                    <div class="card border-0 mb-0 p-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                        </div>

                        <h5 class="my-3 fs-16 fw-bold">Color Scheme</h5>

                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light" value="light">
                                <label class="form-check-label" for="layout-color-light">Light</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark" value="dark">
                                <label class="form-check-label" for="layout-color-dark">Dark</label>
                            </div>
                        </div>

                        <div>
                            <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                            <div class="d-flex flex-column gap-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-light" value="light">
                                    <label class="form-check-label" for="leftbar-color-light">Light</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label" for="leftbar-color-dark">Dark</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-brand" value="brand">
                                    <label class="form-check-label" for="leftbar-color-brand">Brand</label>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-size">
                            <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                            <div class="d-flex flex-column gap-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-default" value="default">
                                    <label class="form-check-label" for="leftbar-size-default">Default</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-compact" value="compact">
                                    <label class="form-check-label" for="leftbar-size-compact">Compact</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label" for="leftbar-size-small">Condensed</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-full" value="full">
                                    <label class="form-check-label" for="leftbar-size-full">Full Layout</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-fullscreen" value="fullscreen">
                                    <label class="form-check-label" for="leftbar-size-fullscreen">Fullscreen Layout</label>
                                </div>
                            </div>
                        </div>

                        <div id="layout-position">
                            <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                            <div class="btn-group checkbox" role="group">
                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                                <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                                <label class="btn btn-soft-primary w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                            </div>
                        </div>

                        <div id="sidebar-user">
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <label class="fs-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" name="sidebar-user" id="sidebaruser-check">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="offcanvas-footer border-top p-3 text-center">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                    </div>
                    <div class="col-6">
                        <a href="#" role="button" class="btn btn-primary w-100">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>  

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>
</html>
