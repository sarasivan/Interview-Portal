   
<?php
session_start();
include 'session.php';

$username= $_SESSION['employee_name'];
$emp_id =$_SESSION['employee_id'];

$role = $_SESSION['role'];


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
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/todo.css">
    <!-- include dashboard.css-->

<link rel="stylesheet" href="sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>


.task-label {
    word-wrap: break-word; 
    word-break: break-all; 
    white-space: normal;       
    text-overflow: ellipsis;    
    max-width: 50%;       
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
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6 ps-0">
                  <h3>To-Do</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid email-wrap bookmark-wrap todo-wrap">
            <div class="row">
              <div class="col-xxl-3 col-xl-4 box-col-4e">
                <div class="email-sidebar md-sidebar"><a class="btn btn-primary email-aside-toggle md-sidebar-toggle">To Do filter</a>
                  <div class="email-left-aside md-sidebar-aside">
                    <div class="card"> 
                      <div class="card-body"> 
                        <div class="email-app-sidebar left-bookmark custom-scrollbar">
                          <ul class="nav main-menu">
                            <li class="nav-item">
                              <button class="btn-primary badge-light d-block btn-mail w-100"><i class="me-2" data-feather="check-circle"> </i>To Do List</button>
                            </li>
                            <li class="nav-item"> <a href="javascript:void(0)"><span class="iconbg badge-light-primary"><i data-feather="file-plus"></i></span><span class="title ms-2">All Task</span><span class="badge rounded-pill badge-info total-count">0</span></a></li>
                            <li class="nav-item"><a href="javascript:void(0)"><span class="iconbg badge-light-success"><i data-feather="check-circle"></i></span><span class="title ms-2">Completed</span><span class="badge rounded-pill badge-success completed-count">0</span></a></li>
                            <li class="nav-item"><a href="javascript:void(0)"><span class="iconbg badge-light-danger"><i data-feather="cast"></i></span><span class="title ms-2">Pending</span><span class="badge rounded-pill badge-danger pending-count">0</span></a></li>
                            <li class="nav-item"><a href="javascript:void(0)"><span class="iconbg badge-light-info"><i data-feather="activity"></i></span><span class="title ms-2">In Process</span><span class="badge rounded-pill badge-primary in-process-count">0</span></a></li>
                            <li class="nav-item"><a href="javascript:void(0)"><span class="iconbg badge-light-danger"><i data-feather="trash"></i></span><span class="title ms-2 trash-count">Trash</span><span class="badge rounded-pill badge-warning trash-count">0</span></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-9 col-xl-8 box-col-8">
                <div class="card">
                                    <div class="row p-5 ml-4">
                                        <div class="col-3">
                                            <label for="fromdate" class="form-label">From Date</label>
                                            <input type="date" class="form-control fromdate" id="fromdate">
                                        </div>
                                        <div class="col-3">
                                            <label for="todate" class="form-label">To Date</label>
                                            <input type="date" class="form-control todate" id="todate">
                                        </div>
                                        <div class="col-3">
                                            <label for="task-status" class="form-label">Task Status</label>
                                            <select id="task-status" class="form-control task-status">
                                                <option value="">Select Result</option>
                                                <option value="COMPLETED">COMPLETED</option>
                                                <option value="PENDING">PENDING</option>
                                                <option value="IN PROCESS">IN PROCESS</option>
                                            </select>
                                        </div>
                                         <div class="col-3">
                                         <button type="submit" class="btn btn-info mt-4 taskdata_submit"
                                                id="taskdata_submit">Submit</button>
                                            </div>

                                    </div>
                  <div class="card-header b-bottom"> 
                    <div class="todo-list-header"> 
                      <div class="new-task-wrapper input-group">
         
                         <input type="text" value=<?php echo $username ?> class="username" hidden/>
                          <input type="text" value=<?php echo $emp_id ?> class="empid" hidden/>
                           <input type="text" value=<?php echo $role ?> class="role" hidden/>
                        <input class="form-control m-0 new-task" id="new-task" placeholder="Enter new task here. . ."><span class="btn btn-primary add-new-task-btn add-task" id="add-task">Add Task</span>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="todo">
                      <div class="todo-list-wrapper theme-scrollbar">
                        <div class="todo-list-container">
                          <div class="todo-list-body">
                            <ul id="todo-list">
 
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="notification-popup hide">
                        
                      </div>
                    </div>
                    <!-- HTML Template for tasks-->
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
          <!-- Container-fluid ends                    -->
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
    <script src="../assets/js/notify/index.js"></script>
    <script src="../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="../assets/js/datatable/datatables/dataTables.select.min.js"></script>
    <script src="../assets/js/animation/wow/wow.min.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <!-- <script src="../assets/js/theme-customizer/customizer.js"></script> -->

    <!-- include index.js-->

       <script src="todo/js/todo.js"></script>
    <!-- include index.js-->
    <script>
    new WOW().init();
    </script>
</body>

<!-- Mirrored from admin.pixelstrap.com/cion/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 16:13:32 GMT -->

</html>