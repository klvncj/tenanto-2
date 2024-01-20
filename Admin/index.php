<?php
require_once('../config/connect.php');
allow_access($_SESSION['id'], "../Admin/login.php");
if (isset($_SESSION['id'])) {
    $account_id = $_SESSION['id'];
    $response = get_user($account_id);
    if ($response) {
        extract($response);
    }
} else {
    echo "<script>alert('User not found')</script>";
    header("Location: ../login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard |
        <?= $firstname ?>
    </title>
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
    <style>
        .search-results {
            list-style-type: none;
            padding: 0;
        }

        .search-results li {
            cursor: pointer;
            margin: 5px;
            color: blue;
            text-decoration: underline;
        }

        #searchResults {
            position: absolute;
            z-index: 1000;
            background-color: white;
            /* Adjust the z-index value as needed */
        }
    </style>
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
                                <h4 class="page-title">Welcome back ,
                                    <?= $firstname ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div>
                <!-- container -->
                <div class="row">

                    <div class="col-sm-6 col-xxl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="text-muted fw-normal mt-0 text-truncate" title="New Leads">Listings
                                        </h5>
                                        <h3 class="my-1 py-1">
                                            <?php $num = list_num($account_id);
                                            echo $num;

                                            ?>
                                        </h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <div id="new-leads-chart" data-colors="#87bf8a"></div>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->

                    <div class="col-sm-6 col-xxl-3">
                        <div class="card text-bg-primary border-primary">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="text-white text-opacity-75 fw-normal mt-0 text-truncate"
                                            title="Booked Revenue">Booked Listings</h5>
                                        <h3 class="my-1 py-1">
                                        <?php $num = booked_list_num($account_id);
                                            echo $num;
                                            ?>
                                        </h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <div id="booked-revenue-chart" data-colors="#d89e70"></div>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>



                <div class="table-responsive-sm">
                    <table class="table table-striped table-centered mb-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Deacription</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Price</th>
                                <th>Frequency</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $listings = show_my_listings($account_id);
                            if ($listings) {
                                foreach ($listings as $list) {
                                    extract($list); ?>
                                    <tr>
                                        <td class="table-user">
                                            <img src="../uploads/<?php 
														if($photo1 == ''){
															echo '../images/featured-img/img-01.jpg';
														}else{
															echo '../uploads/'.$photo1;
														}
														?>" alt="table-user"
                                                class="me-2 rounded-circle" />
                                            <?= $name ?>
                                        </td>
                                        <td>
                                            <?= substr($details, 0, 17) ?>...
                                        </td>
                                        <td>
                                            <?= $category ?>
                                        </td>
                                        <td>
                                            <?= $location ?>
                                        </td>
                                        <td>
                                            <?= formatNumber($price) ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($frequency !== 'One Time') {
                                                echo "Per " . $frequency;
                                            } else {
                                                echo $frequency;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?= $status ?>
                                        </td>
                                        <td>
                                            <?= date('jS F , Y', strtotime($created_at)); ?>
                                        </td>
                                        <td>
                                            <a href="single-listing.php?id=<?=$listing_id?>" class="text-reset fs-16 px-1"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"> <i
                                                    class="ri-settings-3-line"></i></a>
                                            <a href="delete.php?id=<?=$listing_id?>" class="text-reset fs-16 px-1"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"> <i
                                                    class="ri-delete-bin-2-line"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                echo "No Listings Yet";
                            } ?>
                        </tbody>
                    </table>
                </div>


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
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
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
                            <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light"
                                value="light">
                            <label class="form-check-label" for="layout-color-light">Light</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark"
                                value="dark">
                            <label class="form-check-label" for="layout-color-dark">Dark</label>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                    id="leftbar-color-light" value="light">
                                <label class="form-check-label" for="leftbar-color-light">Light</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                    id="leftbar-color-dark" value="dark">
                                <label class="form-check-label" for="leftbar-color-dark">Dark</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                    id="leftbar-color-brand" value="brand">
                                <label class="form-check-label" for="leftbar-color-brand">Brand</label>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-size">
                        <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                    id="leftbar-size-default" value="default">
                                <label class="form-check-label" for="leftbar-size-default">Default</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                    id="leftbar-size-compact" value="compact">
                                <label class="form-check-label" for="leftbar-size-compact">Compact</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                    id="leftbar-size-small" value="condensed">
                                <label class="form-check-label" for="leftbar-size-small">Condensed</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                    id="leftbar-size-full" value="full">
                                <label class="form-check-label" for="leftbar-size-full">Full Layout</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                    id="leftbar-size-fullscreen" value="fullscreen">
                                <label class="form-check-label" for="leftbar-size-fullscreen">Fullscreen Layout</label>
                            </div>
                        </div>
                    </div>

                    <div id="layout-position">
                        <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                        <div class="btn-group checkbox" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                                value="fixed">
                            <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                            <input type="radio" class="btn-check" name="data-layout-position"
                                id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-soft-primary w-sm ms-0"
                                for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>

                    <div id="sidebar-user">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <label class="fs-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" name="sidebar-user"
                                    id="sidebaruser-check">
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
    <script>
        function highlightText() {
            var searchText = document.getElementById('searchBar').value.trim().toLowerCase();
            var table = document.getElementById('dataTable');
            var rows = table.getElementsByTagName('tr');

            removeHighlights();
            clearSearchResults();

            if (searchText !== '') {
                var results = [];
                for (var i = 0; i < rows.length; i++) {
                    var cells = rows[i].getElementsByTagName('td');
                    var rowContent = '';
                    for (var j = 0; j < cells.length; j++) {
                        rowContent += cells[j].textContent.trim().toLowerCase() + ' ';
                    }
                    if (rowContent.includes(searchText)) {
                        rows[i].classList.add('highlight');
                        results.push({
                            element: rows[i],
                            text: rowContent
                        });
                    }
                }

                displaySearchResults(results);
            }
        }

        function removeHighlights() {
            var highlightedRows = document.querySelectorAll('.highlight');
            highlightedRows.forEach(function (row) {
                row.classList.remove('highlight');
            });
        }

        function clearSearchResults() {
            var searchResults = document.getElementById('searchResults');
            searchResults.innerHTML = '';
        }

        function displaySearchResults(results) {
            var searchResults = document.getElementById('searchResults');
            results.forEach(function (result, index) {
                var li = document.createElement('li');
                li.textContent = result.element.querySelector('td:first-child').textContent.trim();
                li.className = 'list-group-item'
                li.style.cursor = 'pointer';
                li.style.textDecoration = 'none';
                li.onclick = function () {
                    result.element.scrollIntoView({ behavior: 'smooth' });
                };
                searchResults.appendChild(li);
            });
        }
    </script>
    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>