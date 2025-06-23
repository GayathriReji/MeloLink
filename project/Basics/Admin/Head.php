<?php
include("SessionValidator.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melolink</title>
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
    ,<!--  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search here.." aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-lg-flex d-none">
                <button type="button" class="btn btn-info font-weight-bold">+ Create New</button>
                
            </li>
          <li class="nav-item dropdown d-flex">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="icon-air-play mx-0"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../Assets/Template/Admin/images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../Assets/Template/Admin/images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../Assets/Template/Admin/images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item">               
                  <i class="icon-head"></i> Profile
              </a>
              <a class="dropdown-item preview-item">
                  <i class="icon-inbox"></i> Logout
              </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-4 d-lg-flex d-none">
            <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="">
              <i class="icon-grid"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button> -->
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="padding-left:0px;">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <!-- <img src="../Assets/Files"> -->
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
<li class="nav-item">
    <a class="nav-link" href="../Admin/Type.php">
        <i></i>
        <span class="menu-title">Music Type</span>
    </a>
</li>

          <li class="nav-item">
            <a class="nav-link" href="../Admin/CourseType.php">
              <i class="icon-book  menu-icon"></i>
              <span class="menu-title">Course Type</span>
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
              <span class="menu-title">Complaints</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="viewComplaint.php">User Complaints  </a></li>
                <li class="nav-item"> <a class="nav-link" href="ViewStaffComplaint.php"> Staff Complaint </a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div style="padding: 100px;">