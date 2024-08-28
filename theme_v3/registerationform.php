<!DOCTYPE html>
<html lang="en">


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
    <title>Registerstion Form</title>
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
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

    <style>
    /* #message {
        color: red !important   ;
     
        font-size: 16px;
        font-weight: bold;
        padding: 5px;

        border-radius: 5px;
      
        margin-top: 10px;

        text-align: center;
     

    } */

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 15px !important;
    }

    /* Change the color of the selected option */
    .select2-selection__rendered {
        color: #333;
        background-color: #fff;
        padding: 6px;
        font-size: 14px;
    }

    /* Customize the dropdown arrow */
    .select2-selection__arrow b {
        border-color: #35bfbf transparent transparent transparent;
    }

    /* Customize the hover effect for the options in the dropdown */
    .select2-results__option--highlighted[aria-selected] {
        background-color: #35bfbf;
        color: #fff;
    }

    /* Additional styling for the dropdown options */
    .select2-results__option {
        color: #333;
        padding: 8px;
        font-size: 14px;
    }

    /* Customize the border and focus effect */
    .select2-container--default .select2-selection--single {
        border: 1px solid #35bfbf;
        border-radius: 4px;
    }

    .select2-container--default .select2-selection--single:focus {
        border-color: #35bfbf;
        outline: none;
        box-shadow: 0 0 3px rgba(53, 191, 191, 0.5);
    }


    .form-control {
        line-height: 2.0 !important;
    }

    .page-wrapper .page-body-wrapper .page-title {
        padding: 10px 10px !important;
        margin: 10px 10px !important;
    }

    .page-wrapper .page-body-wrapper {
        background-color: #F8F8F8;
        margin-top: 0px;
    }

    .g-3,
    .gy-3 {
        --bs-gutter-y: 0rem !important;
    }

    /* Toaster styles */
    .toaster {
        visibility: hidden;
        min-width: 250px;
        background-color: red;
        /* Red background for the toaster */
        color: #fff;
        text-align: center;
        border-radius: 4px;
        /* Slightly rounded corners */
        padding: 16px;
        position: fixed;
        z-index: 1;
        right: 30px;
        /* Position it at the top-right corner */
        top: 30px;
        /* Position it a bit down from the top */
        font-size: 17px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Optional: adds a subtle shadow */
    }

    .toaster.show {
        visibility: visible;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @keyframes fadein {
        from {
            top: 0;
            /* Start from top edge */
            opacity: 0;
        }

        to {
            top: 30px;
            /* End at the desired position */
            opacity: 1;
        }
    }

    @keyframes fadeout {
        from {
            top: 30px;
            /* Start from the final position */
            opacity: 1;
        }

        to {
            top: 0;
            /* Move to the top edge */
            opacity: 0;
        }
    }

    .container,
    .container-fluid,
    .container-sm,
    .container-md,
    .container-lg,
    .container-xl,
    .container-xxl {
        --bs-gutter-x: 9.5rem !important;
    }

    .form-section {
        /* margin-top: 10px !important; */
        margin-bottom: 10px !important;
    }
    </style>

</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <div class="page-wrapper" id="pageWrapper">
        <div class="page-body-wrapper">

            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-12 ps-0 text-center">
                            <h2>Registeration Form</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                            <div id="toaster" class="toaster"></div>
                            <div class="card-body" id="registerationform">
                                <div class="horizontal-wizard-wrapper vertical-variations">
                                    <div class="row g-3">
                                        <div class="col-12 main-horizontal-header">
                                            <div class="nav nav-pills horizontal-options" id="business-n-wizard-tab"
                                                role="tablist" aria-orientation="vertical"><a class="nav-link active"
                                                    id="business-n-info-tab" data-bs-toggle="pill" href="#process_type"
                                                    role="tab" aria-controls="business-n-info" aria-selected="true">
                                                    <div class="horizontal-wizard">
                                                        <div class="stroke-icon-wizard"><span>1</span></div>
                                                        <div class="horizontal-wizard-content">
                                                            <h3>Process Type</h3>
                                                        </div>
                                                    </div>
                                                </a><a class="nav-link" id="business-bank-wizard-tab"
                                                    data-bs-toggle="pill" href="#business-bank-wizard" role="tab"
                                                    aria-controls="business-bank-wizard" aria-selected="false">
                                                    <div class="horizontal-wizard">
                                                        <div class="stroke-icon-wizard"><span>2</span></div>
                                                        <div class="horizontal-wizard-content">
                                                            <h3>Personal Information</h3>
                                                        </div>
                                                    </div>
                                                </a><a class="nav-link" id="business-inquiry-wizard-tab"
                                                    data-bs-toggle="pill" href="#business-inquiry-wizard" role="tab"
                                                    aria-controls="business-inquiry-wizard" aria-selected="false">
                                                    <div class="horizontal-wizard">
                                                        <div class="stroke-icon-wizard"><span>3</span></div>
                                                        <div class="horizontal-wizard-content">
                                                            <h3>Educational</h3>
                                                        </div>
                                                    </div>
                                                </a><a class="nav-link" id="business-pay-wizard-tab"
                                                    data-bs-toggle="pill" href="#business-pay-wizard" role="tab"
                                                    aria-controls="business-pay-wizard" aria-selected="false">
                                                    <div class="horizontal-wizard">
                                                        <div class="stroke-icon-wizard"><span>4</span></div>
                                                        <div class="horizontal-wizard-content">
                                                            <h3>Reference</h3>
                                                        </div>
                                                    </div>
                                                </a><a class="nav-link" id="business-successful-wizard-tab"
                                                    data-bs-toggle="pill" href="#business-successful-wizard" role="tab"
                                                    aria-controls="business-successful-wizard" aria-selected="false">
                                                    <div class="horizontal-wizard">
                                                        <div class="stroke-icon-wizard"><span>5</span></div>
                                                        <div class="horizontal-wizard-content">
                                                            <h3>Experience</h3>
                                                        </div>

                                                    </div>
                                                </a></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="tab-content dark-field" id="business-n-wizard-tabContent">
                                                <div class="tab-pane fade show active" id="process_type" role="tabpanel"
                                                    aria-labelledby="business-n-info-tab">
                                                    <div class="row g-3 needs-validation" novalidate=""
                                                        id="process_type_two">
                                                        <div class="col-12 text-end">
                                                            <button class="btn btn-primary"
                                                                id="continue-process-type">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="business-bank-wizard" role="tabpanel"
                                                    aria-labelledby="business-bank-wizard-tab">
                                                    <div class="row g-3 needs-validation" novalidate=""
                                                        id="personal_information">
                                                        <div class="col-12 text-end">
                                                            <button class="btn btn-primary"
                                                                id="previous-business-bank">Previous</button>
                                                            <button class="btn btn-primary"
                                                                id="continue-business-bank">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="business-inquiry-wizard" role="tabpanel"
                                                    aria-labelledby="business-inquiry-wizard-tab">
                                                    <div class="row g-3 needs-validation" novalidate=""
                                                        id="educational">
                                                        <div class="col-12 text-end">
                                                            <button class="btn btn-primary"
                                                                id="previous-business-inquiry">Previous</button>
                                                            <button class="btn btn-primary"
                                                                id="continue-business-inquiry">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="business-pay-wizard" role="tabpanel"
                                                    aria-labelledby="business-pay-wizard-tab">
                                                    <div class="row g-3 needs-validation" novalidate="" id="reference">
                                                        <div class="col-12 text-end">
                                                            <button class="btn btn-primary"
                                                                id="previous-business-pay">Previous</button>
                                                            <button class="btn btn-primary"
                                                                id="continue-business-pay">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="business-successful-wizard"
                                                    role="tabpanel" aria-labelledby="business-successful-wizard-tab">
                                                    <div class="row g-3 needs-validation" novalidate="" id="experience">
                                                        <div class="col-12 text-end">
                                                            <button class="btn btn-primary"
                                                                id="previous-business-successful">Previous</button>
                                                            <button class="btn btn-primary" type="submit"
                                                                id="submitregisterdata">Submit</button>
                                                        </div>
                                                        <!-- <div class="col-lg-2"></div>
                                                        <div class="col-lg-8">
                                                            <p id="message">Your fresher clicked the submit button !</p>
                                                        </div>
                                                        <div class="col-lg-2"></div> -->
</body>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Container-fluid Ends-->


</div>
</div>

<!-- latest jquery-->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="../assets/js/tooltip-init.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../assets/js/script.js"></script>

<!-- <script src="filter/js/filter.js"></script> -->
<script src="form/js/form.js" defer></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Continue buttons
    document.getElementById('continue-process-type').addEventListener('click', function() {
        showTab('business-bank-wizard', 'business-bank-wizard-tab');
    });

    document.getElementById('continue-business-bank').addEventListener('click', function() {
        showTab('business-inquiry-wizard', 'business-inquiry-wizard-tab');
    });

    document.getElementById('continue-business-inquiry').addEventListener('click', function() {
        showTab('business-pay-wizard', 'business-pay-wizard-tab');
    });

    document.getElementById('continue-business-pay').addEventListener('click', function() {
        showTab('business-successful-wizard', 'business-successful-wizard-tab');
    });

    // Previous buttons
    document.getElementById('previous-business-bank').addEventListener('click', function() {
        showTab('process_type', 'business-n-info-tab');
    });

    document.getElementById('previous-business-inquiry').addEventListener('click', function() {
        showTab('business-bank-wizard', 'business-bank-wizard-tab');
    });

    document.getElementById('previous-business-pay').addEventListener('click', function() {
        showTab('business-inquiry-wizard', 'business-inquiry-wizard-tab');
    });

    document.getElementById('previous-business-successful').addEventListener('click', function() {
        showTab('business-pay-wizard', 'business-pay-wizard-tab');
    });

    function showTab(tabId, tabLinkId) {
        // Hide all tabs
        document.querySelectorAll('.tab-pane').forEach(function(tab) {
            tab.classList.remove('show', 'active');
        });

        // Deactivate all nav links
        document.querySelectorAll('.nav-link').forEach(function(link) {
            link.classList.remove('active');
            link.setAttribute('aria-selected', 'false');
        });

        // Show the selected tab
        document.getElementById(tabId).classList.add('show', 'active');

        // Activate the corresponding nav link
        document.getElementById(tabLinkId).classList.add('active');
        document.getElementById(tabLinkId).setAttribute('aria-selected', 'true');
    }
});
</script>




</body>

</html>