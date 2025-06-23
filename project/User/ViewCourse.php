<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");

// Handle booking logic
if (isset($_GET["rid"])) {
    $classId = $_GET["rid"];
    $userId = $_SESSION["uid"];

    $insQry = "INSERT INTO tbl_classbooking(class_id, user_id, booking_status, booking_date) VALUES ('$classId', '$userId', 1, CURDATE())";

    if ($con->query($insQry)) {
        ?>
        <script>
            alert('Booked successfully');
            window.location = "Payment.php";
        </script>
        <?php
    }
}

// Fetch and display courses
$selQry = "SELECT * FROM tbl_course c 
           INNER JOIN tbl_class cl ON c.course_id = cl.course_id 
           INNER JOIN tbl_staff s ON cl.staff_id = s.staff_id   
           WHERE cl.staff_id='" . $_GET['vid'] . "'";

$res = $con->query($selQry);
$i = 0;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles can be added here */
        .img {
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .course-name {
            position: absolute;
            bottom: 10px; 
            right: 10px; 
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .project-wrap {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
            while ($row = $res->fetch_assoc()) {
                $i++;
            ?>
            <div class="col-md-3"><!-- Assuming you want three columns in each row -->
                <div class="project-wrap">
                    <a href="" class="img" style="background-image: url(../Assets/Files/CoursePhoto/<?php echo $row['course_photo']; ?>);">
                        <span class="course-name"><?php echo $row['course_name']; ?></span>
                    </a>
                    <div class="card-body">
                        <p class="card-title"><?php echo $row['class_data']; ?></p>
                        <p class="card-text" style="font-size: 16px; font-weight: bold;">Rate: <?php echo $row['course_rate']; ?></p>
                        <p class="card-text" style="font-size: 16px; font-weight: bold;">Duration: <?php echo $row['course_duration']; ?> Months</p>
                        <a href="ViewCourse.php?rid=<?php echo $row['class_id']; ?>" class="btn btn-primary">Book & Pay</a>
                    </div>
                </div>
            </div>
            <?php
                if ($i % 3 == 0) {
                    echo '</div><div class="row">';
                }
            }
            ?>
        </div>
    </div>

    <!-- Include Bootstrap JS if needed -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script> -->

    <?php
    ob_flush();
    include('Foot.php');
    ?>
</body>
</html>
