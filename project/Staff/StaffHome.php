<?php

include("../Assets/Connections/Connection.php");

include("SessionValidator.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>MeloLink:Staff HomePage</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="../Assets/Template/Main/css/flaticon.css">
    <link rel="stylesheet" href="../Assets/Template/Main/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
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
    <!-- END nav -->
    <div class="hero-wrap js-fullheight" style="background-image: url('../Assets/Template/Main/images/msbg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <span class="subheading">Welcome to MeloLink</span>
                    <h1 class="mb-4">We Are Online Platform For Make Learn Music</h1>
                    <p class="caps">"The key to the mystery of a great artist is that for reasons unknown, he will give away his energies and his life just to make sure that one note follows another... and leaves us with the feeling that something is right in the world."<br> - Leonard Bernstein</p>
                    <!<p class="mb-0"><a href="../User/AllCourseView.php ?>" class="btn btn-primary">Our Course</a> </p>  
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">        
        </div>
    </section>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Start Learning Today</span>
                    <h2 class="mb-4">Pick Your Choice</h2>
                </div>          
                <!-- course loop Starts -->
                     <?php
                        $selQry="select * from tbl_course c inner join  tbl_staff s on c.staff_id=s.staff_id LIMIT 6";
                        $res=$con->query($selQry);
                        $i=0;
                       while($row=$res->fetch_assoc())
	                    {
	                    ?>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="StaffCourseView.php?cid=<?php echo $row['course_id'] ?>" class="img" style="background-image: url(../Assets/Files/CoursePhoto/<?php echo $row['course_photo'];?>);">
                            <span class="price"><?php echo $row['course_name']; ?></span></a>
                              <div class="text p-4">
                              <!--  <h3><a href="#"></a><?php echo $row['staff_name']; ?></h3>
                                     <p class="advisor"><span><?php echo $row['course_duration']; ?></span></p>
                                     <ul class="d-flex justify-content-between">
                                       <li><span class="flaticon-shower"></span></li>
                                       <li class="price"><?php echo $row['course_rate'];?></li>
                                      </ul>
                                      
                                -->
                                <!-- <h3>
    <a href="Material.php?mid=<?php echo $row['course_id']; ?>" class="btn btn-primary btn-sm" style="display: inline-block;">
        <i class="fas fa-plus"></i> Material
    </a>
    <a href="Tutorial.php?tid=<?php echo $row['course_id']; ?>" class="btn btn-primary btn-sm" style="display: inline-block;">
        <i class="fas fa-plus"></i> Tutorial
    </a>
</h3>--></div>
                    </div>
               </div>
             <?php
	   
	                   }
	         ?>
               </div>
                <!-- course loop ends -->
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(../Assets/Template/Main/images/bg2.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-online"></span></div>
                        <div class="text">
                            <strong class="number" data-number="400">0</strong>
                            <span>Online Courses</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-graduated"></span></div>
                        <div class="text">
                            <strong class="number" data-number="4500">0</strong>
                            <span>Students Enrolled</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-instructor"></span></div>
                        <div class="text">
                            <strong class="number" data-number="1200">0</strong>
                            <span>Experts Instructors</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-tools"></span></div>
                        <div class="text">
                            <strong class="number" data-number="300">0</strong>
                            <span>Hours Content</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-about img">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 about-intro">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="d-flex about-wrap">
                                <div class="img d-flex align-items-center justify-content-center"
                                    style="background-image:url(../Assets/Template/Main/images/bg1.jpg);">
                                </div>
                                <div class="img-2 d-flex align-items-center justify-content-center"
                                    style="background-image:url(../Assets/Template/Main/images/kid.jpg);">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-5 py-5">
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate">
                                    <span class="subheading">Enhanced Your Skills</span>
                                    <h2 class="mb-4">Learn Anything You Want Today</h2>
                                    <p>Discover the joy of making music as you learn from world-class musicians and educators.Our online music classes are your gateway to mastering your instrument, understanding music theory, and unleashing your inner composer.</p>
                                    <p><a href="#" class="btn btn-primary">Get in touch with us</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section services-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 heading-section pr-md-5 ftco-animate d-flex align-items-center">
                    <div class="w-100 mb-4 mb-md-0">
                        <span class="subheading">Welcome to MeloLink</span>
                        <h2 class="mb-4">We Are Melolink An Online Learning Center</h2>
                        <p>Explore the magic of music from the comfort of your home with our expert instructors.</p>
                        <p>We bring the world of music right to your screen, making it easier than ever to start your musical journey.Unlock the mysteries of music with our engaging and interactive classes. Start your musical adventure today!</p>
                        <!-- <div class="d-flex video-image align-items-center mt-md-4">
                            <a href="" class="video img d-flex align-items-center justify-content-center"
                                style="background-image: url(../Assets/Template/Main/images/about.jpg);">
                                <span class="fa fa-play-circle"></span>
                            </a>
                            <h4 class="ml-4">Learn anything from MeloLink, Watch video</a></h4>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-tools"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Top Quality Content</h3>
                                    <p>Our music classes offer a creative and enjoyable learning experience for all ages and skill levels.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services">
                                <div class="icon icon-2 d-flex align-items-center justify-content-center"><span
                                        class="flaticon-instructor"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Highly Skilled Instructor</h3>
                                    <p>Our experienced instructor brings a wealth of knowledge and expertise to every class.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services">
                                <div class="icon icon-3 d-flex align-items-center justify-content-center"><span
                                        class="flaticon-quiz"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">World Class &amp; Quiz</h3>
                                    <p>"Explore the beauty of music and unleash your inner creativity."</p>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="ftco-footer ftco-no-pt">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <!-- <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                            <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                        </ul> -->
                    </div>
                </div>
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Help Desk</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Customer Care</a></li>
                            <li><a href="#" class="py-2 d-block">Legal Help</a></li>
                            <li><a href="#" class="py-2 d-block">Services</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                            <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
                            <li><a href="#" class="py-2 d-block">Call Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Recent Courses</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Music Theory</a></li>
                            <li><a href="#" class="py-2 d-block">Instrument Instruction</a></li>
                            <li><a href="#" class="py-2 d-block">Vocal Training</a></li>
                            <li><a href="#" class="py-2 d-block">Songwriting</a></li>
                            <li><a href="#" class="py-2 d-block">Music Production</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-map-marker"></span><span class="text">203 Fake St. Mountain
                                        View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929
                                            210</span></a></li>
                                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span
                                            class="text"> melolinkmusicclass@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved | This template
                        is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="../Assets/Template/Main/js/jquery.min.js"></script>
    <script src="../Assets/Template/Main/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../Assets/Template/Main/js/popper.min.js"></script>
    <script src="../Assets/Template/Main/js/bootstrap.min.js"></script>
    <script src="../Assets/Template/Main/js/jquery.easing.1.3.js"></script>
    <script src="../Assets/Template/Main/js/jquery.waypoints.min.js"></script>
    <script src="../Assets/Template/Main/js/jquery.stellar.min.js"></script>
    <script src="../Assets/Template/Main/js/owl.carousel.min.js"></script>
    <script src="../Assets/Template/Main/js/jquery.magnific-popup.min.js"></script>
    <script src="../Assets/Template/Main/js/jquery.animateNumber.min.js"></script>
    <script src="../Assets/Template/Main/js/bootstrap-datepicker.js"></script>
    <script src="../Assets/Template/Main/js/scrollax.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="../Assets/Template/Main/js/google-map.js"></script>
    <script src="../Assets/Template/Main/js/main.js"></script>

</body>

</html>