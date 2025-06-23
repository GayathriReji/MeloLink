<?php
include('Head.php');
include("../Assets/Connections/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>My Booking</title>
    <!-- Add Bootstrap stylesheet link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

    <!-- ... (previous code) ... -->

    <form method="post">
        <div class="row">
            <?php  
            $staffId = $_SESSION["sid"];

            $selQry = "SELECT * FROM tbl_course WHERE staff_id= '$staffId'";
            $res = $con->query($selQry);
            $i = 0;

            while ($row = $res->fetch_assoc()) {
                $i++;
                ?>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img" style="background-image: url(../Assets/Files/CoursePhoto/<?php echo $row['course_photo']; ?>);">
                            <span class="price"><?php echo $row['course_name']; ?></span>
                        </a>
                        <div class="text p-4">
                            <p class="advisor"><strong>Course Details:</strong></p>
                            <ul class="features">
                                <li><span class="flaticon-check">Course Rate: <?php echo $row['course_rate']; ?></span></li><br>
                                <li><span class="flaticon-check">Duration: <?php echo $row['course_duration']; ?> Months</span></li><br>
                                <!-- <li><span class="flaticon-check">Date of Payment: <?php echo $row['payment_date']; ?></span></li><br> -->
                                <!-- Add more features as needed -->
                            </ul>

                            <!-- Edit button -->
                            <!-- Another custom-styled Edit button -->
<a href="EditCourse.php?course_id=<?php echo $row['course_id']; ?>" class="btn btn-primary">
    <i class="fas fa-pencil-alt"></i> Edit Course
</a>

                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </form>

    <!-- ... (remaining code) ... -->

    <!-- Add Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>

<?php
include('Foot.php');
?>
