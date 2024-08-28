<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from admin.pixelstrap.com/cion/template/table-components.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 16:14:48 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cion admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cion admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Cion - Premium Admin Template</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&amp;family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;0,6..12,900;0,6..12,1000;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500;1,6..12,600;1,6..12,700;1,6..12,800;1,6..12,900;1,6..12,1000&amp;display=swap" rel="stylesheet">
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
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
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
                  <h3>Table Components</h3>
                </div>
                <div class="col-sm-6 pe-0">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="https://admin.pixelstrap.com/cion/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Bootstrap Tables</li>
                    <li class="breadcrumb-item active">Table Components</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts                    -->
          <div class="container-fluid">
            <!-- Table Row Starts-->
            <div class="row">
             
                <!-- CHECKBOXES Row Starts-->
                <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h3>Checkbox</h3>
                  </div>
                  <div>
                    <div class="card-block row">
                      <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive theme-scrollbar">
                          <table class="table table-bordered checkbox-td-width">
                            <tbody>
                              <tr>
                                <td>Basic Checkbox</td>
                                <td class="w-50">
                                  <input id="checkbox1" type="checkbox">
                                  <label for="checkbox1">Default</label>
                                </td>
                                <td><span>Basic Checkbox</span></td>
                              </tr>
                              <tr>
                                <td>Default Checkbox Squar</td>
                                <td>
                                  <div class="checkbox m-squar">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="checkbox3">Default</label>
                                  </div>
                                </td>
                                <td><span>Wrap with use <code>.m-squar</code> checkbox.</span></td>
                              </tr>
                              <tr>
                                <td>Basic Skin Check</td>
                                <td>
                                  <div class="checkbox checkbox-dark">
                                    <input id="checkbox-state-dark" type="checkbox">
                                    <label for="checkbox-state-dark">Brand state</label>
                                  </div>
                                </td>
                                <td><span>Wrap with use<code>checkbox-dark</code>for this style of checkbox.</span></td>
                              </tr>
                              <tr>
                                <td>Flat Skin Check</td>
                                <td>
                                  <div class="checkbox checkbox-solid-primary">
                                    <input id="solid6" type="checkbox" checked="">
                                    <label for="solid6">checked</label>
                                  </div>
                                </td>
                                <td><span>Wrap with use<code>checkbox-solid-*</code>,<code>primary, secondary, success, info, warning, danger</code>for this style of checkbox.</span></td>
                              </tr>
                              <tr>
                                <td>Disable Check</td>
                                <td>
                                  <div class="checkbox checkbox-solid-primary">
                                    <input id="solid2" type="checkbox" disabled="">
                                    <label for="solid2">Disabled</label>
                                  </div>
                                </td>
                                <td><span>Wrap with use<code>disabled</code>,<code>primary, secondary, success, info, warning, danger</code>for this style of checkbox disable.</span></td>
                              </tr>
                              <tr>
                                <td>Inline  Checkbox</td>
                                <td>
                                  <div class="form-group m-b-0 m-checkbox-inline">
                                    <div class="checkbox checkbox-primary">
                                      <input id="inline-1" type="checkbox">
                                      <label for="inline-1">Option 1</label>
                                    </div>
                                    <div class="checkbox checkbox-secondary">
                                      <input id="inline-2" type="checkbox">
                                      <label for="inline-2">Option 1</label>
                                    </div>
                                    <div class="checkbox checkbox-success">
                                      <input id="inline-3" type="checkbox">
                                      <label for="inline-3">Option 1</label>
                                    </div>
                                  </div>
                                </td>
                                <td><span>Wrap with use<code>disabled</code>,<code>primary, secondary, success, info, warning, danger</code>for this style of checkbox disable.</span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- CHECKBOXES Row Ends-->
          </div>
        </div>
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
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/theme-customizer/customizer.js"></script>
  </body>

<!-- Mirrored from admin.pixelstrap.com/cion/template/table-components.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 16:14:48 GMT -->
</html>