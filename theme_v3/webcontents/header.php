<?php
     $employee_name= $_SESSION['employee_name'];
     $employee_role=$_SESSION['role'];
    ?>
    <div class="page-header">
      <div class="header-wrapper row">
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo.png"
              alt=""></a></div>
              <svg class="stroke-icon toggle-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
      
        <form class="col-auto form-inline search-full" action="#" method="get">
          <div class="form-group">
            <div class="Typeahead Typeahead--twitterUsers">
            
              <div class="Typeahead-menu"></div>
            </div>
          </div>
        </form>
        <div class="nav-right col-auto pull-right right-header p-0 ms-auto">
          <ul class="nav-menus">
             <!-- <li><a href="email.php"><i data-feather="mail"> </i></a></li> -->
             <li><a href="editor.php"><i data-feather="edit-2"> </i></a></li>
             <li><a href="todo.php"><i data-feather="file-text"> </i></a></li>
            <li class="profile-nav onhover-dropdown pe-0 py-0">
              <div class="d-flex align-items-center profile-media"><img class="b-r-25"
                  src="../assets/images/dashboard/profile.png" alt="">
                <div class="flex-grow-1 user"><span><?php echo $employee_name; ?></span>
                  <p class="mb-0 font-nunito"><?php echo $employee_role; ?>
                    <svg>
                      <use href="https://admin.pixelstrap.com/cion/assets/svg/icon-sprite.svg#header-arrow-down"></use>
                    </svg>
                  </p>
                </div>
              </div>
              <ul class="profile-dropdown onhover-show-div">
                <!-- <li><a href="user-profile.html"><i data-feather="user"></i><span>Account </span></a></li>
                <li><a href="email-application.html"><i data-feather="mail"></i><span>Inbox</span></a></li>
                <li><a href="task.html"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
                <li><a href="edit-profile.html"><i data-feather="settings"></i><span>Settings</span></a></li> -->
                <li><a href="logout.php"><i data-feather="log-in"> </i><span>Log Out</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
