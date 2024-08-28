<?php 
include 'session.php';
$fromDate = date('Y-m-d');
$end_date = date('Y-m-d');
$status_type = "";
if(isset($_GET['fromdate']))
{
    $fromDate = $_GET['fromdate'];
    $end_date = $_GET['end_date'];
    $status_type = $_GET['status_type'];
}

?>

<input type="text" value="<?php echo $status_type;?>" name="" id="receved_status_type" hidden>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/cion/template/datatable-ext-autofill.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 16:14:49 GMT -->

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
    <title>Interviewer Tracker</title>
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
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/vendors/datatables.css">  -->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/vendors/datatable-extension.css">  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">

</head>
<style>
.dataTables_wrapper table.dataTable thead th,
.dataTables_wrapper table.dataTable thead td {
    text-wrap: nowrap !important;
}

.hidden {
    display: none;
}

table.dataTable input,
table.dataTable select {
    /* border: 1px solid #efefef; */
    height: 20px !important;
}

input[type=checkbox] {
    position: relative;
    border: 1px solid #000000 !important;
    border-radius: 3px;
    background: none;
    cursor: pointer;
    line-height: 0;
    margin: 0 0.6em 0.6em 0;
    outline: 0;
    padding: 0 !important;
    vertical-align: text-top;
    /* height: 20px; */
    width: 20px;
    -webkit-appearance: none;
    opacity: .5;
}

input[type=checkbox]:hover {
    opacity: 1;
}

input[type=checkbox]:checked {
    background-color: #000;
    opacity: 1;
}

input[type=checkbox]:before {
    content: '';
    position: absolute;
    right: 50%;
    top: 50%;
    width: 4px;
    height: 10px;
    border: solid #FFF;
    border-width: 0 2px 2px 0;
    margin: -1px -1px 0 -1px;
    transform: rotate(45deg) translate(-50%, -50%);
    z-index: 2;
}

.btn-second {
    background-color: #293dc9 !important;
    border-color: #ffffff !important;
    color: white !important;
}

.bg-secondary {
    background-color: #797474 !important;
}

.bg-orange {
    background-color: #59c556 !important;
}

.btn-success {
    background-color: #0c977b !important;
}

.bg-success {
    background-color: #198754 !important;
    color: #fff;
}

.bg-primary {
    background-color: #0d6efd !important;
}

/*bdge color */
.table-container {
    width: 100%;
    max-height: 400px;
    /* Adjust the max height as needed */
    overflow-y: auto;
    border: 1px solid #ccc;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead th {
    position: sticky;
    top: 0;
    background: #f9f9f9;
    z-index: 1;
}

th,
td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

/*datatable header css */
.dt-button-collection {
    display: none;
    position: absolute;
    background-color: white;
    z-index: 100;
}

.dt-button-collection .dt-button {
    display: block;
    padding: 8px 16px;
    white-space: nowrap;
}


/* Dropdown menu */
.dropdown-menu {
    display: block;
    top: 35px;
    left: 0px;
    z-index: 'revert-layer' !important;
    background-color: white !important;
}

.dt-buttons {
    float: right;
}

.dt-ext .dataTables_wrapper .dataTables_paginate .paginate_button {
    /* padding: 0; */
    border: none;
    border: 2px solid white !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    color: white !important;
    border: none;
    padding: 5px 10px !important;
    margin: 0 2px;
    border-radius: 4px;
    border: 1x solid white;
}

.dataTables_wrapper .dataTables_paginate {
    float: right;
    margin-top: -10px;
    background-color: #35bfbf;
    padding: 10px;
    border-radius: 5px;
}



.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: #5a6268;
}
</style>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- Loader ends-->
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
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-6 ps-0">
                                <h3>Interviewer Tracker Datatables</h3>
                            </div>
                            <div class="col-sm-6 pe-0">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->

                <div class="container-fluid extra_data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header pb-5 card-no-border">
                                    <div class="row">

                                        <div class="col-2 flatpicker-calender">
                                            <label for="fromdate" class="form-label">From Date</label>
                                            <input type="date" value="<?php echo $fromDate;?>"
                                                class="form-control fromdate" id="fromdate">
                                        </div>
                                        <div class="col-2">
                                            <label for="todate" class="form-label">To Date</label>
                                            <input type="date" value="<?php echo $end_date;?>"
                                                class="form-control todate" id="todate">
                                        </div>

                                        <div class="col-3">
                                            <label for="officelocation" class="form-label">Office Location</label>
                                            <select class="form-control" id="officelocation"></select>
                                        </div>
                                        <div class="col-2">
                                            <label for="referencemode" class="form-label">Status</label>
                                            <select class="form-control status" id="status"></select>
                                        </div>
                                        <div class="col-3">
                                            <label for="shift" class="form-label">shift</label>
                                            <select id="shift" class="form-control">
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mt-4 advanceoption hidden ">
                                        <div class="col-3">
                                            <label for="referencemode" class="form-label">Reference Mode</label>
                                            <select class="form-control" id="referencemode"></select>
                                        </div>
                                        <div class="col-3">
                                            <label for="processtype" class="form-label">Process Type</label>
                                            <select class="form-control processtype" id="processtype"></select>
                                        </div>
                                        <div class="col-3">
                                            <label for="Team" class="form-label">Team</label>
                                            <select class="form-control teamsname" id="teamsname"></select>

                                        </div>
                                        <div class="col-3">
                                            <label for="processrole" class="form-label">Process Role</label>

                                            <select class="form-control processrole" id="processrole"></select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 p-2 text-center">
                                            <button class="btn btn-primary mt-4 advanceoptionbutton">Advance
                                                Option</button>
                                            <button type="submit" class="btn btn-primary mt-4"
                                                id="interview_data_submit">Submit</button>
                                            <button type="submit" class="btn btn-second  mt-4 Updated TeamUpdated">Team
                                                Updated</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header pb-0 card-no-border">
                                </div>
                                <div class="card-body">
                                    <div class="table table-responsive">
                                        <table class="display" id="multilevel-btn" style="width: 100% !important;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><input id="checkAll" name="wp-comment-cookies-consent"
                                                            type="checkbox" value="yes"></th>
                                                    <th>UIC ID</th>
                                                    <th>NAME</th>
                                                    <th>PRIMARY</th>
                                                    <th>REFERENCE TYPE</th>
                                                    <th>PROCESS TYPE</th>
                                                    <th>ROLE</th>
                                                    <th>STATUS</th>
                                                    <th>LOCATION</th>
                                                    <th>SHIFT</th>
                                                    <th>ACTION </th>
                                                    <th>SECONDARY</th>
                                                    <th>REFERENCE NAME</th>
                                                    <th>INTERVIEW DATE</th>
                                                    <th>JOINING DATE</th>
                                                    <th>TRAINING DATE</th>
                                                    <th>OFFER STATUS</th>
                                                    <th>DOCUMENT STATUS</th>
                                                    <th>TEAM</th>
                                                    <th>CAll STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody class="interviewtracker_table"
                                                style="overflow:auto;max-height: 350px;">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Container-fluid Ends-->

            </div>

            <div id="evaludatemodal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Candidate Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="Assign-details">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group p-2">
                                            <label for="row_id">ID</label>
                                            <input type="text" id="row_id" class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="uic_code">UIC CODE</label>
                                            <input type="text" id="uic_code" class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="candidate_name">FIRST NAME</label>
                                            <input type="text" id="candidate_name" class="form-control form-display"
                                                readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="last_name">LAST NAME</label>
                                            <input type="text" id="last_name" class="form-control form-display"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-2">
                                            <label for="primary_contact_number">PRIMARY CONTACT NUMBER</label>
                                            <input type="text" id="primary_contact_number"
                                                class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="secondary_contact_number">SECONDARY CONTACT NUMBER</label>
                                            <input type="text" id="secondary_contact_number"
                                                class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="more_reference_details_1">REFERENCE NAME</label>
                                            <input type="text" id="more_reference_details_1"
                                                class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="processs">PROCESS</label>
                                            <input type="text" id="processs" class="form-control form-display" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-2">
                                            <label for="reference_mode">MODE OF REFERENCE</label>
                                            <input type="text" id="reference_mode" class="form-control form-display"
                                                readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="placess">OFFICE LOCATION</label>
                                            <input type="text" id="placess" class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="interview_date">INTERVIEW DATE</label>
                                            <input type="text" id="interview_date" class="form-control form-display"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Elevaluation Detail</h5>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">
                            <div id="Assign-details">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group p-2">
                                            <label for="result">CANDITATE RESULT</label>
                                            <span style="color:red">*</span>
                                            <select id="result1" class="form-control">
                                                <option value="">Select Result</option>
                                                <option value="Selected">Selected</option>
                                                <option value="Rejected">Rejected</option>
                                                <option value="Hold">Hold</option>
                                            </select>
                                        </div>

                                        <div class="form-group p-2 hidedata">
                                            <label for="processtype">PROCCESS TYPE</label>
                                            <span style="color:red">*</span>
                                            <select class="form-control processtype" id="processtypetwo"></select>
                                        </div>
                                        <div class="form-group p-2 hidedata">
                                            <label for="shift">SHIFT PROCESS</label>
                                            <span style="color:red">*</span>
                                            <select id="evalution_shift" class="form-control">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-2 showdata" style="display:none;">
                                            <label class="required" id="" value="">REASON TO REJECT AND HOLD CANDIDATE
                                            </label>
                                            <select id="reason" class="form-control">
                                                <option value="" selected disabled>--Select Reason--</option>
                                                <option value="Language Constrain"> Language Constrain</option>
                                                <option value="Distance"> Distance</option>
                                                <option value="Attitude"> Attitude</option>
                                                <option value="Communication"> Communication</option>
                                                <option value="Abscond"> Abscond</option>
                                                <option value="Performance"> Performance</option>
                                                <option value="Age Criteria"> Age criteria</option>
                                                <option value="Need Time To Discuss"> Need Time To Discuss</option>
                                                <option value="Poor Listening Skill"> Poor Listening Skill</option>
                                                <option value="Ex Employee">Ex Employee</option>
                                                <option value="Health Issue"> Health Issue</option>
                                                <option value="Looking for part time job"> Looking for part time job
                                                </option>
                                                <option value="Pursuing"> Pursuing</option>
                                                <option value="Not Interested"> Not Interested</option>
                                                <option value="Over Qualified"> Over Qualified</option>
                                                <option value="Salary Expectation"> Salary Expectation</option>
                                                <option value="Shift Timing"> Shift Timing</option>
                                                <option value="Stability"> Stability</option>
                                                <option value="Terms & Conditions"> Terms & Conditions</option>
                                                <option value="Need cab"> Need cab</option>
                                                <option value="Looking for day shift">Looking for day shift</option>
                                                <option value="Having more than 3 arrears"> Having more than 3 arrears
                                                </option>
                                                <option value="Others (Comment)"> Others (Comment)</option>
                                            </select>

                                        </div>
                                        <div class="form-group p-2 hidedata">
                                            <label for="officelocation">OFFICE LOCATION</label>
                                            <span style="color:red">*</span>
                                            <select class="form-control officelocation"
                                                id="evaluationofficelocation"></select>

                                        </div>
                                        <div class="form-group p-2 hidedata">
                                            <label for="processtype">PROCCESS ROLE</label>
                                            <span style="color:red">*</span>
                                            <select class="form-control " id="processrole_evelaution"></select>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-2 hidedata">
                                            <label for="canditate_score">CANDITATE SCORE</label>
                                            <span style="color:red">*</span>
                                            <select id="canditate_score" class="form-control">

                                            </select>
                                        </div>

                                        <div class="form-group p-2 hidedata">
                                            <label for="joining_date">JOINING DATE</label>
                                            <span style="color:red">*</span>
                                            <input type="date" id="joining_date" class="form-control form-display">
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary saveelevautiondata">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="joiningmodal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Candidate Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="Assign-details">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group p-2">
                                            <label for="row_id">ID</label>
                                            <input type="text" id="row_id1" class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="uic_code">UIC CODE</label>
                                            <input type="text" id="uic_code1" class="form-control form-display"
                                                readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="candidate_name">FIRST NAME</label>
                                            <input type="text" id="candidate_name1" class="form-control form-display"
                                                readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="last_name">LAST NAME</label>
                                            <input type="text" id="last_name1" class="form-control form-display"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-2">
                                            <label for="primary_contact_number1">PRIMARY CONTACT NUMBER</label>
                                            <input type="text" id="primary_contact_number1"
                                                class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="secondary_contact_number1">SECONDARY CONTACT NUMBER</label>
                                            <input type="text" id="secondary_contact_number1"
                                                class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="more_reference_details_11">REFERENCE NAME</label>
                                            <input type="text" id="more_reference_details_11"
                                                class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="processs">PROCESS</label>
                                            <input type="text" id="processs1" class="form-control form-display"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-2">
                                            <label for="reference_mode">MODE OF REFERENCE</label>
                                            <input type="text" id="reference_mode1" class="form-control form-display"
                                                readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="placess">OFFICE LOCATION</label>
                                            <input type="text" id="placess1" class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="interview_date">INTERVIEW DATE</label>
                                            <input type="text" id="interview_date1" class="form-control form-display"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Joining Detail</h5>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">
                            <div id="Assign-details">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group p-2 hidedata">
                                            <label for="result">CONTACT MODES</label>
                                            <span style="color:red">*</span>
                                            <select id="contactmodes" class="form-control">
                                                <option value="">SELECT CONTACT MODES</option>
                                                <option value="Call">Call</option>
                                                <option value="Message">Message</option>
                                                <option value="Mail">Mail</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>

                                        <div class="form-group p-2 showdata">
                                            <label for="result">OFFER STATUS</label>
                                            <span style="color:red">*</span>

                                            <select id="offerstatus" class="form-control">
                                                <option value="">OFFER STATUS</option>
                                                <option value="Offer Released">Offer Released</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group p-2  hidedata">
                                            <label for="officelocation">DESCRIPTION</label>
                                            <span style="color:red">*</span>
                                            <input type="text" id="description" class="form-control form-display">
                                        </div>
                                        <div class="form-group p-2 showdata">
                                            <label for="result">DOCUMENT STATUS</label>
                                            <span style="color:red">*</span>

                                            <select id="documentstatus" class="form-control">
                                                <option value="">DOCUMENT STATUS</option>
                                                <option value="Submitted">Submitted</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-2  hidedata">
                                            <label for="joining_status">JOINING STATUS</label>
                                            <span style="color:red">*</span>
                                            <select id="joining_status" class="form-control">
                                                <option value="">JOINING STATUS</option>
                                                <option value="On Training">On Training</option>
                                                <option value="Not Joined">Not Joined</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary saveelevautiondata1">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="statusupdatemodel" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Candidate Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="Assign-details">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group p-2">
                                            <label for="row_id">ID</label>
                                            <input type="text" id="row_id2" class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="uic_code">UIC CODE</label>
                                            <input type="text" id="uic_code2" class="form-control form-display"
                                                readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="candidate_name">FIRST NAME</label>
                                            <input type="text" id="candidate_name2" class="form-control form-display"
                                                readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="last_name">LAST NAME</label>
                                            <input type="text" id="last_name2" class="form-control form-display"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-2">
                                            <label for="primary_contact_number2">PRIMARY CONTACT NUMBER</label>
                                            <input type="text" id="primary_contact_number2"
                                                class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="secondary_contact_number1">SECONDARY CONTACT NUMBER</label>
                                            <input type="text" id="secondary_contact_number2"
                                                class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="more_reference_details_11">REFERENCE NAME</label>
                                            <input type="text" id="more_reference_details_12"
                                                class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="processs">PROCESS</label>
                                            <input type="text" id="processs2" class="form-control form-display"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-2">
                                            <label for="reference_mode">MODE OF REFERENCE</label>
                                            <input type="text" id="reference_mode2" class="form-control form-display"
                                                readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="placess">OFFICE LOCATION</label>
                                            <input type="text" id="placess2" class="form-control form-display" readonly>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="interview_date">INTERVIEW DATE</label>
                                            <input type="text" id="interview_date2" class="form-control form-display"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Training Detail</h5>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">
                            <div id="Assign-details">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group p-2 ">
                                            <label for="result">CONTACT MODES</label>
                                            <span style="color:red">*</span>
                                            <input type="text" id="contactmodes2" class="form-control form-display"
                                                readonly>

                                        </div>

                                        <div class="form-group p-2 showdata">
                                            <label for="result">OFFER STATUS</label>
                                            <span style="color:red">*</span>

                                            <select id="offerstatus2" class="form-control">
                                                <option value="">OFFER STATUS</option>
                                                <option value="Offer Released">Offer Released</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group p-2  ">
                                            <label for="officelocation">DESCRIPTION</label>
                                            <span style="color:red">*</span>
                                            <input type="text" id="description2" class="form-control form-display"
                                                readonly>
                                        </div>
                                        <div class="form-group p-2 showdata">
                                            <label for="result">DOCUMENT STATUS</label>
                                            <span style="color:red">*</span>

                                            <select id="documentstatus2" class="form-control">
                                                <option value="">DOCUMENT STATUS</option>
                                                <option value="Submitted">Submitted</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group p-2 ">
                                            <label for="joining_status2">JOINING STATUS</label>
                                            <span style="color:red">*</span>
                                            <input type="text" id="joining_status2" class="form-control form-display"
                                                readonly>

                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary saveelevautiondata2">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- footer start-->
            <?php include('webcontents/footer.php') ?>


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


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/dataTables.buttons.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/jszip.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/buttons.colVis.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/pdfmake.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/vfs_fonts.js"></script>
    <script src="../assets/js/datatable/datatable-extension/dataTables.autoFill.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/dataTables.select.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/buttons.html5.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/buttons.print.min.js"></script>
    <!--     <script src="../assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/dataTables.responsive.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/dataTables.keyTable.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/dataTables.colReorder.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js"></script>
    <script src="../assets/js/datatable/datatable-extension/dataTables.scroller.min.js"></script> -->
    <!-- <script src="../assets/js/datatable/datatable-extension/custom.js"></script>  -->
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="../assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="filter/js/filter.js"></script>
    <script src="interviewtrcaker/js/interviewtracker.js" defer></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#interview_data_submit').trigger('click');
            },  1000); 
        });
    </script>
    

</body>


</html>