<?php 
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>User Details</title>
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
 <!-- <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">  -->
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
     <link rel="stylesheet" href="sweetalert2.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<style>
.page-wrapper.compact-small .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .sidebar-list {
    padding: 20px 0px 0px 0px !important;
    margin-left: -30px !important;
    background-color: #1f2f3e;
}
.dt-buttons {

    float: right;


}

.dataTables_wrapper .dataTables_paginate {
    float: right;
    margin-top: -10px;
    background-color: #35bfbf;
    padding: 10px;
    border-radius: 5px;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    color: white !important;
    /*      background-color: #6c757d;*/
    border: none;
    padding: 5px 10px;
    margin: 0 2px;
    border-radius: 4px;
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
                                <h3>User Details</h3>
                            </div>
                            <div class="col-sm-6 pe-0">
                               <button class="btn btn-primary" style="margin-left: 700px;color:white" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRighttwo" aria-controls="offcanvasRight"><i data-feather="plus-circle"> </i>Create</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid extra_data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header pb-0 card-no-border">


                                         
                                    <div class="card-body">
                                        <div class="table">
                                            <table class="display responsive table-striped" id="multilevel-btn-four">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Id</th>
                                                        <th>Employee Id</th>
                                                        <th>Employee Username</th>
                                                        <th>Employee Email</th>
                                                        <th>Employee Password</th>
                                                        <th>Employee Role</th>
                                                        <th>Employee Division</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="user_details_table">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">Edit Data</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                       <div class="row">

                         <div class="col-12">
                            <label for="employeeid" class="form-label employeeid" >Employee Id</label>
                            <input type="text" class="form-control employeeid" id="employeeid" readonly>
                            <input type="text" class="form-control rowid" id="rowid" hidden>
                           </div>
                           <div class="col-12">
                            <label for="employeename" class="form-label employeename" >Employee Name</label>
                            <input type="text" class="form-control employeename" id="employeename">
                           </div>
                           <div class="col-12 mt-2">
                            <label for="employeeemail" class="form-label employeeemail" >Employee Email</label>
                            <input type="text" class="form-control employeeemail" id="employeeemail">
                           </div>
                           <div class="col-12 mt-2">
                            <label for="employeepassowrd" class="form-label employeepassowrd" >Employee Passowrd</label>
                            <input type="text" class="form-control employeepassowrd" id="employeepassowrd">
                           </div>
                           <div class="col-12 mt-2">
                            <label for="employeerole" class="form-label employeerole" >Employee Role</label>
                            <input type="text" class="form-control employeerole" id="employeerole">
                           </div>
                           <div class="col-12 mt-2">
                            <label for="employeedivsion" class="form-label employeedivsion" >Employee Division</label>
                            <input type="text" class="form-control employeedivsion" id="employeedivsion">
                           </div>
                           <div class="col-12 mt-2">
                            <label for="employeestatus" class="form-label employeestatus" >Employee Status</label>
                            <select class="form-control employeestatus" id="employeestatus">
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="INACTIVE">INACTIVE</option>
                            </select>
                           </div>
                        <div class="col-12 mt-3">
                          <button class="btn btn-primary updatebutton m-2 p-2" id="updatebutton">Update</button>
                           </div>
                       </div>
                      </div>
                    </div>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRighttwo" aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">Create New</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                       <div class="row">

                         <div class="col-12">
                            <label for="newemployeeid" class="form-label newemployeeid" >Employee Id</label>
                            <input type="text" class="form-control newemployeeid" id="newemployeeid">
                           </div>
                           <div class="col-12">
                            <label for="newemployeename" class="form-label newemployeename" >Employee Name</label>
                            <input type="text" class="form-control newemployeename" id="newemployeename">
                           </div>
                           <div class="col-12 mt-2">
                            <label for="newemployeeemail" class="form-label newemployeeemail" >Employee Email</label>
                            <input type="text" class="form-control newemployeeemail" id="newemployeeemail">
                           </div>
                           <div class="col-12 mt-2">
                            <label for="newemployeepassowrd" class="form-label newemployeepassowrd" >Employee Passowrd</label>
                            <input type="text" class="form-control newemployeepassowrd" id="newemployeepassowrd">
                           </div>
                           <div class="col-12 mt-2">
                            <label for="newemployeerole" class="form-label newemployeerole" >Employee Role</label>
                            <select class="form-control newemployeerole" id="newemployeerole">
                                <option value="">Select one role</option>
                                <option value="Senior Hr Executive">Senior Hr Executive</option>
                                <option value="Hr Executive">Hr Executive</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Assistant Manager Hr">Assistant Manager Hr</option>
                                <option value="Hr Manager">Hr Manager</option>
                            </select>
                           </div>
                           <div class="col-12 mt-2">
                            <label for="newemployeedivsion" class="form-label newemployeedivsion" >Employee Division</label>
                            <select class="form-control newemployeedivsion" id="newemployeedivsion">
                                <option value="HUMAN RESOURCE">HUMAN RESOURCE</option>
                            </select>
                           </div>
                           <div class="col-12 mt-2">
                            <label for="newemployeestatus" class="form-label newemployeestatus" >Employee Status</label>
                            <select class="form-control newemployeestatus" id="newemployeestatus">
                                <option value="ACTIVE">ACTIVE</option>
                            </select>
                           </div>
                        <div class="col-12 mt-3">
                          <button class="btn btn-success m-2 p-2" id="createnewbutton">Create</button>
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

                <?php include('webcontents/footer.php') ?>
           
        </div>
        </div>



        <!-- latest jquery-->
        <script src="../assets/js/jquery.min.js"></script>
        <!-- Bootstrap js-->
        <!-- <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script> -->
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
           <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
        <script src="../assets/js/tooltip-init.js"></script>
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../assets/js/script.js"></script>

        <script src="filter/js/filter.js"></script>
        <script src="settings/js/usertable.js"></script>

</body>



</html>