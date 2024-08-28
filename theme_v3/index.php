<?php
include 'session.php';

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/cion/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 16:13:23 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cion admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cion admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Dashboard</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&amp;family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;0,6..12,900;0,6..12,1000;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500;1,6..12,600;1,6..12,700;1,6..12,800;1,6..12,900;1,6..12,1000&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/datatable/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/prism.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/vector-map.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <!-- include dashboard.css-->
    <link rel="stylesheet" type="text/css" href="dashboard/css/dashboard.css">
    <!-- include dashboard.css-->
</head>
<style>
.dashboard_default .transaction-card table tr td button {
    width: 75px !important;
}

.dataTables_filter {

    display: none;
}
</style>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- tap on top starts-->
    <!-- <div class="tap-top"><i data-feather="chevrons-up"></i></div> -->
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <?php include('webcontents/header.php') ?>
        <!-- Page Header Ends-->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include('webcontents/sidebar.php') ?>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <div class="container-fluid"></div>
                <!-- Container-fluid starts-->
                <div class="container-fluid dashboard_default">
                    <div class="row widget-grid">
                        <div class="col-12">
                            <div class="page-title mt-2">
                                <div class="row">
                                    <div class="col-lg-7 col-12 ps-0">
                                        <h3>Dashboard</h3>
                                    </div>
                                    <div class="col-lg-5 col-12 " style="text-align: end;">
                                        <div class="" style="">
                                            <div class="form-group  mt-2">
                                                <label for="startDate" class="m-2">Start Date</label>
                                                <input id="startdate" type="date" class="p-2 ml-2"
                                                    style="border: 1px solid black !important;">
                                                &nbsp;
                                                <label for="endDate" class="m-2">End Date</label>
                                                <input id="enddate" type="date" class="p-2 ml-2"
                                                    style="border: 1px solid black !important;">

                                                <button class="btn btn-primary m-2" id="submit">Submit</button>
                                            </div>
                                        </div>

                                        <!-- <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php">
                                                <svg class="stroke-icon">
                                                    <use href="https://admin.pixelstrap.com/cion/assets/svg/icon-sprite.svg#stroke-home"></use>
                                                </svg></a></li>
                                            <li class="breadcrumb-item">Dashboard</li>
                                            <li class="breadcrumb-item active">Default</li>
                                            </ol> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-sm-12 box-col-4">
                            <div class="card total-earning">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-7 box-col-7">
                                            <div class="d-flex">
                                                <div class="badge bg-light-warning badge-rounded font-primary me-2">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h3>Total Registers</h3>
                                                </div>
                                            </div>
                                            <h5 id="pending_count">0</h5>
                                            <!-- <p class="d-flex"><span class="bg-light-secondary me-2"> -->
                                            <!-- <svg>
                                                        <use
                                                            href="https://admin.pixelstrap.com/cion/assets/svg/icon-sprite.svg#arrow-down">
                                                        </use>
                                                    </svg></span><span class="font-secondary me-2">-
                                                    36.28%</span><span>Since last month</span> -->
                                            <!-- </p> -->
                                        </div>
                                        <div class="col-sm-5 box-col-5 incom-chart">

                                            <lord-icon src="https://cdn.lordicon.com/nchegqgo.json" trigger="hover"
                                                colors="primary:#545454,secondary:#35bfbf"
                                                style="width:100px;height:100px">
                                            </lord-icon>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-sm-12 box-col-4">
                            <div class="card total-earning">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-7 box-col-7">
                                            <div class="d-flex">
                                                <div class="badge bg-light-success badge-rounded font-primary me-2">

                                                </div>
                                                <div class="flex-grow-1">
                                                    <h3>Total Interviewed</h3>
                                                </div>
                                            </div>
                                            <h5 id="interviewed_count">0</h5>

                                        </div>
                                        <div class="col-sm-5 box-col-5 incom-chart">

                                            <lord-icon src="https://cdn.lordicon.com/tjcmlqde.json" trigger="hover"
                                                colors="primary:#545454,secondary:#35bfbf"
                                                style="width:100px;height:100px">
                                            </lord-icon>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-sm-12 box-col-4">
                            <div class="card total-earning">
                                <div class="card-body selectlistall"  data-value="Selected">
                                    <div class="row">
                                        <div class="col-sm-7 box-col-7">
                                            <div class="d-flex">
                                                <div class="badge bg-light-info badge-rounded font-primary me-2">
                                                    <!-- <svg>
                                                        <use
                                                            href="https://admin.pixelstrap.com/cion/assets/svg/icon-sprite.svg#user">
                                                        </use>
                                                    </svg> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h3>Total Selected</h3>
                                                </div>
                                            </div>
                                            <h5 id="selected_count">0</h5>

                                        </div>
                                        <div class="col-sm-5 box-col-5 incom-chart">
                                            <lord-icon src="https://cdn.lordicon.com/awmkozsb.json" trigger="hover"
                                                style="width:100px;height:100px">
                                            </lord-icon>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-sm-12 box-col-4">
                            <div class="card total-earning">
                                <div class="card-body selectlistall" data-value="Rejected">
                                    <div class="row">
                                        <div class="col-sm-7 box-col-7">
                                            <div class="d-flex">
                                                <div class="badge bg-light-danger badge-rounded font-primary me-2">
                                                    <!-- <svg>
                                                        <use
                                                            href="https://admin.pixelstrap.com/cion/assets/svg/icon-sprite.svg#user">
                                                        </use>
                                                    </svg> -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h3>Total Rejected</h3>
                                                </div>
                                            </div>
                                            <h5 id="rejected_count">0</h5>
                                        </div>
                                        <div class="col-sm-5 box-col-5 incom-chart">
                                            <lord-icon src="https://cdn.lordicon.com/dykoqszm.json" trigger="hover"
                                                colors="primary:#545454,secondary:#35bfbf"
                                                style="width:100px;height:100px">
                                            </lord-icon>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-sm-12 box-col-4">
                            <div class="card total-earning">
                                <div class="card-body selectlistall" data-value="Hold">
                                    <div class="row">
                                        <div class="col-sm-7 box-col-7">
                                            <div class="d-flex">
                                                <div class="badge bg-light-secondary badge-rounded font-primary me-2">
                                                    <svg>
                                                        <use
                                                            href="https://admin.pixelstrap.com/cion/assets/svg/icon-sprite.svg#user">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h3>Total Hold</h3>
                                                </div>
                                            </div>
                                            <h5 id="hold_count">0</h5>
                                        </div>
                                        <div class="col-sm-5 box-col-5 incom-chart">
                                            <lord-icon src="https://cdn.lordicon.com/urmrbzpi.json" trigger="hover"
                                                style="width:100px;height:100px">
                                            </lord-icon>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-sm-12 box-col-4">
                            <div class="card total-earning">
                                <div class="card-body selectlistall" data-value="On Training">
                                    <div class="row">
                                        <div class="col-sm-7 box-col-7">
                                            <div class="d-flex">
                                                <div class="badge bg-light-success badge-rounded font-primary me-2">
                                                    <svg>
                                                        <use
                                                            href="https://admin.pixelstrap.com/cion/assets/svg/icon-sprite.svg#user">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h3>Total Training</h3>
                                                </div>
                                            </div>
                                            <h5 id="Training_count">0</h5>

                                        </div>
                                        <div class="col-sm-5 box-col-5 incom-chart">
                                            <lord-icon src="https://cdn.lordicon.com/oxbjzlrk.json" trigger="hover"
                                                colors="primary:#545454,secondary:#35bfbf"
                                                style="width:100px;height:100px">
                                            </lord-icon>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card invoice-card">
                                <div class="card-header pb-0">
                                    <h3>Process Type</h3>
                                </div>
                                <div class="card-body transaction-card">
                                    <div class="table-responsive theme-scrollbar table">
                                        <table class="display" id="recent-order" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Product Name</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 box-col-3">
                            <div class="card">
                                <div class="card-header card-no-border pb-0">
                                    <div class="header-top">
                                        <h3 class="m-4">Reference Type</h3>

                                    </div>
                                </div>
                                <div class="card-body pt-0 product-card" style="height: 450px !important;">
                                    <div class="table-responsive theme-scrollbar" style="overflow-x:unset !important;">
                                        <table class="table display" style="width:100%">

                                            <tr clas="center">
                                                <td>
                                                    <h4 class="m-0">HR Reference</h4>
                                                </td>
                                                <td>
                                                    <h4 class="m-0 badge bg-warning rounded-pill p-2" id="hr_count">0
                                                    </h4>
                                                </td>

                                            </tr>
                                            <tr clas="center">
                                                <td>
                                                    <h4 class="m-0">Campus Placements</h4>
                                                </td>
                                                <td>
                                                    <h4 class="m-0 badge bg-danger text-white rounded-pill p-2"
                                                        id="campus_count">0</h4>
                                                </td>

                                            </tr>
                                            <tr clas="center">
                                                <td>
                                                    <h4 class="m-0">Consultancy</h4>
                                                </td>
                                                <td>
                                                    <h4 class="m-0 badge bg-primary text-white rounded-pill p-2"
                                                        id="consultant_count">0</h4>
                                                </td>

                                            </tr>
                                            <tr clas="center">
                                                <td>
                                                    <h4 class="m-0">Employee Referral</h4>
                                                </td>
                                                <td>
                                                    <h4 class="m-0 badge bg-warning text-white rounded-pill p-2"
                                                        id="referral_count">0</h4>
                                                </td>

                                            </tr>
                                            <tr clas="center">
                                                <td>
                                                    <h4 class="m-0">Portals</h4>
                                                </td>
                                                <td>
                                                    <h4 class="m-0 badge bg-danger text-white rounded-pill p-2"
                                                        id="portal_count">0</h4>
                                                </td>

                                            </tr>
                                            <tr clas="center">
                                                <td>
                                                    <h4 class="m-0">Direct Walk Ins</h4>
                                                </td>
                                                <td>
                                                    <h4 class="m-0 badge bg-primary text-white rounded-pill p-2"
                                                        id="walkins_count">0</h4>
                                                </td>

                                            </tr>
                                            <tr clas="center">
                                                <td>
                                                    <h4 class="m-0">Others</h4>
                                                </td>
                                                <td>
                                                    <h4 class="m-0 badge bg-warning text-white rounded-pill p-2"
                                                        id="referother_count">0</h4>
                                                </td>

                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 box-col-3">
                            <div class="card">
                                <div class="card-header card-no-border pb-0">
                                    <div class="header-top">
                                        <h3 class="m-4">Joining Status</h3>
                                        <!-- <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li>
                                                    <div><i class="icon-settings"></i></div>
                                                </li>
                                                <li><i class="view-html fa fa-code"></i></li>
                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                <li><i class="icofont icofont-error close-card"></i></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card-body pt-0 product-card" style="height: 445px !important;">
                                    <div class="table-responsive theme-scrollbar" style="overflow-x:unset !important;">
                                        <table class="table display" style="width:100%">


                                            <tr clas="center">
                                                <td>
                                                    <h4 class="m-0">Training</h4>
                                                </td>
                                                <td>
                                                    <h4 class="m-0 badge bg-primary text-white rounded-pill p-2"
                                                        id="Trainingcount">0</h4>
                                                </td>

                                            </tr>

                                            <tr clas="center">
                                                <td>
                                                    <h4 class="m-0">Pending Status</h4>
                                                </td>
                                                <td>
                                                    <h4 class="m-0 badge bg-danger text-white rounded-pill p-2"
                                                        id="Pending_Status_count">0</h4>
                                                </td>

                                            </tr>
                                            <tr clas="center">
                                                <td>
                                                    <h4 class="m-0">Not Joined</h4>
                                                </td>
                                                <td>
                                                    <h4 class="m-0 badge bg-danger text-white rounded-pill p-2"
                                                        id="Not_Joined_count">0</h4>
                                                </td>

                                            </tr>


                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xxl-3 col-xl-4 col-md-6 box-col-4">
                            <div class="card use-country">
                                <div class="card-header pb-0">
                                    <h3 class="m-0">Hr Reference Count</h3>
                                </div>
                                <div class="card-body mt-0 state">
                                    <ul class="d-flex">
                                        <li class="light-card balance-card bg-light-primary"><img
                                                src="https://static.vecteezy.com/system/resources/previews/000/687/302/original/human-resource-or-hr-management-infographic-elements-vector.jpg"
                                                alt="" style="width:50px;height:50px">
                                            <div class="Countries"><span class="rounded-pill badge-primary"></span>
                                                <h5>Uniter States</h5>
                                                <h6 class="mt-1 mb-0">60%</h6>
                                            </div>
                                        </li>
                                        <li class="light-card balance-card bg-light-secondary"><img
                                                src="../assets/images/dashboard/05.jpg" alt="">
                                            <div class="Countries"><span class="rounded-pill badge-secondary"></span>
                                                <h5>Germany</h5>
                                                <h6 class="mt-1 mb-0">51%</h6>
                                            </div>
                                        </li>
                                        <li class="light-card balance-card bg-light-dark"><img
                                                src="../assets/images/dashboard/06.jpg" alt="">
                                            <div class="Countries"><span class="rounded-pill badge-dark"></span>
                                                <h5>New Zealand</h5>
                                                <h6 class="mt-1 mb-0">52%</h6>
                                            </div>
                                        </li>
                                        <li class="light-card balance-card bg-light-warning"><img
                                                src="../assets/images/dashboard/07.jpg" alt="">
                                            <div class="Countries"><span class="rounded-pill badge-warning"></span>
                                                <h5>Australia</h5>
                                                <h6 class="mt-1 mb-0">62%</h6>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="code-box-copy">
                                        <button class="code-box-copy__btn btn-clipboard"
                                            data-clipboard-target="#use-country"><i
                                                class="icofont icofont-copy-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- Container-fluid Ends-->


            </div>
            <?php include('webcontents/footer.php') ?>
        </div>
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <script src="../assets/js/jquery.min.js"></script>
        <!-- Bootstrap js-->
        <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <script src="../assets/js/scrollbar/simplebar.js"></script>
        <script src="../assets/js/scrollbar/custom.js"></script>
        <!-- Sidebar jquery-->
        <script src="../assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <script src="../assets/js/sidebar-menu.js"></script>
        <script src="../assets/js/slick/slick.min.js"></script>
        <script src="../assets/js/slick/slick.js"></script>
        <script src="../assets/js/header-slick.js"></script>
        <script src="../assets/js/chart/apex-chart/apex-chart.js"></script>
        <script src="../assets/js/chart/apex-chart/stock-prices.js"></script>
        <script src="../assets/js/prism/prism.min.js"></script>
        <script src="../assets/js/clipboard/clipboard.min.js"></script>
        <script src="../assets/js/custom-card/custom-card.js"></script>
        <!-- <script src="../assets/js/notify/bootstrap-notify.min.js"></script> -->
        <script src="../assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
        <script src="../assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
        <script src="../assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
        <script src="../assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
        <script src="../assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
        <script src="../assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
        <script src="../assets/js/dashboard/default.js"></script>
        <script src="../assets/js/notify/index.js"></script>
        <script src="../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/js/datatable/datatables/datatable.custom.js"></script>
        <script src="../assets/js/datatable/datatables/dataTables.select.min.js"></script>
        <script src="../assets/js/typeahead/handlebars.js"></script>
        <script src="../assets/js/typeahead/typeahead.bundle.js"></script>
        <script src="../assets/js/typeahead/typeahead.custom.js"></script>
        <script src="../assets/js/typeahead-search/handlebars.js"></script>
        <script src="../assets/js/typeahead-search/typeahead-custom.js"></script>
        <script src="../assets/js/animation/wow/wow.min.js"></script>
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="../assets/js/script.js"></script>
        <!-- <script src="../assets/js/theme-customizer/customizer.js"></script> -->

        <!-- include index.js-->
        <script src="dashboard/js/dashboard.js"></script>
        <!-- include index.js-->
        <script>
        new WOW().init();
        </script>
</body>

<!-- Mirrored from admin.pixelstrap.com/cion/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 16:13:32 GMT -->

</html>