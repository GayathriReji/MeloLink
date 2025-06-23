<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Course view</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    .cont {
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

   /* Custom styles for course duration and rate */
ul.features.course-details li span.flaticon-check {
    color: #A533FF; /* Change the color as desired */
}

ul.d-flex.justify-content-between li.course-details span.flaticon-shower {
    color: #3336FF; /* Change the color as desired */
}

ul.d-flex.justify-content-between li.course-price {
    color: #3336FF; /* Change the color as desired */
}

   
</style>

</head>

<body>
    <form id="form1" name="form1" method="post" action="">
    <div class="container cont text-center"> <!-- Add 'text-center' class for centering -->

            <?php
                if(isset($_GET['cid']))
                {
                $selQry = "SELECT * FROM tbl_course c inner join tbl_class cl on c.course_id=cl.course_id INNER JOIN  tbl_staff s ON cl.staff_id = s.staff_id    where cl.course_id='".$_GET['cid']."'";  
                $res = $con->query($selQry);
                $i = 0;
                while ($row = $res->fetch_assoc()) {
                    
                    
                ?>
            <div class="col-md-10  ftco-animate">
                <div class="project-wrap">
                    <a href="" class="img"
                        style="background-image: url(../Assets/Files/CoursePhoto/<?php echo $row['course_photo']; ?>);">
                        <span class="price">
                            <?php echo $row['course_name']; ?>
                        </span> </a>
                    <div class="text p-4">
                        <h3><a href="#">
                                <?php echo $row['course_name']; ?>
                            </a></h3>
                        <p class="advisor"><strong>Course Details:</strong></p>
                        <ul class="features course-details">
    <li><span class="flaticon-check"><?php echo $row['class_data']; ?></span></li><br>
</ul>

<ul class="d-flex justify-content-between">
    <li class="course-details"><span class="flaticon-shower">Duration: <?php echo $row['course_duration']; ?> Months</span></li><br>
    <li><span class="flaticon-shower"></span></li>
    <li class="course-price"><strong>Price: <?php echo $row['course_rate']; ?></strong></li>
</ul>
                    </div>
                </div>
            </div>

            <?php
       
        }
    
    
    ?>
            <?php
}?>


        </div>


        <!-- Include Bootstrap JS and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </form>

</body>



</html>
<?php
include('Foot.php');

// ob_end_flush();
?>