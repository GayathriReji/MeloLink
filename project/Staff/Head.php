<?php
include("../Assets/Connections/Connection.php");

include("SessionValidator.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Melolink:staff</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../Assets/Template/Main/css/animate.css">

    <link rel="stylesheet" href="../Assets/Template/Main/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Assets/Template/Main/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../Assets/Template/Main/css/magnific-popup.css">

    <link rel="stylesheet" href="../Assets/Template/Main/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../Assets/Template/Main/css/jquery.timepicker.css">


    <link rel="stylesheet" href="../Assets/Template/Main/css/flaticon.css">
    <link rel="stylesheet" href="../Assets/Template/Main/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark ftco-navbar-light scrolled sleep awake" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html"><span>MeloLink</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="StaffHome.php" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
       <i class="fas fa-plus"></i> Add</a>
       <div class="dropdown-menu">
               <a class="dropdown-item" href="Course.php" ><i class="fas fa-graduation-cap"></i></i> Course</a>
               <a class="dropdown-item" href="Class.php"><i class="fas fa-chalkboard"></i> Class</a>
               <!-- <a class="dropdown-item" href="Material.php"><i class="fas fa-book"></i> Materials</a>
               <a class="dropdown-item" href="Tutorial.php"><i class="fas fa-info-circle"></i> Tutorial -->

                <li class="nav-item active"><a href="BookingView.php" class="nav-link"><span class="booking-icon">&#128197;</span>  Booking </a></li>           
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> Profile</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="StaffProfile.php"><i class="fas fa-user"></i> My Profile</a>
                <a class="dropdown-item" href="MyCourses.php"><i class="fas fa-graduation-cap"></i> My Courses</a>

                <a class="dropdown-item" href="../Guest/Logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </div>
        </li>
       <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
       <i class="fas fa-cog"></i> Setting</a>
           <div class="dropdown-menu">
               <a class="dropdown-item" href="StaffChangePassword.php" ><i class="fas fa-key"></i> Edit Password</a>
               <a class="dropdown-item" href="StaffEditProfile.php"><i class="fas fa-edit"></i> Edit Profile</a>
               <a class="dropdown-item" href="StaffComplaint.php"><i class="fas fa-exclamation-circle"></i> Complaint</a>

        </li>
</ul>
        </div>
    </div>
</div> 
    </nav>
    <div style="padding-top:100px">
    <br><br>