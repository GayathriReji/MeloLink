<?php
include("SessionValidator.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melolink:admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/jquery-bar-rating/fontawesome-stars.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../Assets/Template/Admin/css//style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../Assets/Template/Admin/images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0-beta3/css/all.min.css">

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="../Assets/Template/Admin/images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../Assets/Template/Admin/images/logo-mini.svg" alt="logo"/></a>
      
         
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <!-- <img src="../Assets/files"> -->
          </div>
          <div class="user-name">
              <?php
               echo $_SESSION['aname'];
               ?>
          </div>
                  </div>
                  <ul class="nav">
          <li class="nav-item">
          <a class="nav-link" href="../Admin/AdminPage.php">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</a>
              </span>
              </li>
          
          
          <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#location" aria-expanded="false" aria-controls="location">
              <i class="icon-location  menu-icon"></i>
              <span class="menu-title">Location</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="location">
              <ul class="nav flex-column sub-menu">
            </a>
            <li class="nav-item"><a class="nav-link" href="../Admin/District.php">District</a></li>
          <li class="nav-item"><a class="nav-link" href="../Admin/Place.php"> Place</a></li>
              </ul>
            </div>
          </li>        
                     <li class="nav-item"><a class="nav-link" href="../Admin/Type.php">
              <i class="icon-music  menu-icon"></i>
              <span class="menu-title">Music Type</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/CourseType.php">
              <i class="icon-book  menu-icon"></i>
              <span class="menu-title">Course</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/Verification.php">
              <i class="icon-star  menu-icon"></i>
              <span class="menu-title">Verification</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../Guest/Login.php"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="../Assets/Template/Admin/pages/samples/login-2.html"> Login 2 </a></li>
               
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CourseBookingPaymentReport.php">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Report</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">Hi, welcome back!</h4><br><br><br>
              <p class="font-weight-normal mb-2 text-muted"></p>
            </div>
          </div>
          <div class="row mt-9">
    <div class="col-xl-6 flex-column d-flex grid-margin stretch-card">
        <div class="row flex-grow">
            <div class="col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Staff</h4><br><br><br>
                        <div class="col-lg-12">
                            <iframe src="UserBar.php" width="100%" height="400" frameborder="0" scrolling="no"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Course Booking Details</h4><br><br><br>
                <div class="row">
                    <div class="col-lg-12">
                        <iframe src="CourseBookPie.php" width="100%" height="400" frameborder="0" scrolling="no"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
          </div>
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block mt-2">Distributed By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span> 
        </footer>
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="../Assets/Template/Admin/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../Assets/Template/Admin/js/off-canvas.js"></script>
  <script src="../Assets/Template/Admin/js/hoverable-collapse.js"></script>
  <script src="../Assets/Template/Admin/js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../Assets/Template/Admin/vendors/chart.js/Chart.min.js"></script>
  <script src="../Assets/Template/Admin/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../Assets/Template/Admin/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

