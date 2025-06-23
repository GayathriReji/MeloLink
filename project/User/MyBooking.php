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
    <!-- Add Font Awesome stylesheet link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .project-wrap {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            transition: transform 0.2s;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .project-wrap:hover {
            transform: scale(1.05);
        }

        .project-wrap .img {
            display: block;
            background-size: cover;
            background-position: center;
            height: 200px;
        }

        .project-wrap .price {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .project-wrap .text {
            padding: 20px;
        }

        .features {
            list-style: none;
            padding: 0;
        }

        .features li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .features li .fa {
            margin-right: 5px;
            color: #007bff;
        }

        .btn-primary,
        .btn-warning,
        .btn-success,
        .btn-secondary {
            width: 100%;
            margin-top: 15px;
        }

        .text-danger {
            color: #dc3545;
        }

        .text-warning {
            color: #ffc107;
        }

        .text-success {
            color: #28a745;
        }

        .rate-course-button {
            background-color: #ffc107;
            border-color: #ffc107;
            width: 100%;
            margin-top: 15px;
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

        .img {
    display: inline-block; 
    width: 200px;
    height: 200px; 
    background-size: cover; 
}
    </style>
</head>
<body>

  

    <form method="post">
        <div class="row">
            <?php  
            $selQry = "SELECT * FROM tbl_course c
            INNER JOIN tbl_class cl ON c.course_id = cl.course_id
            INNER JOIN tbl_classbooking cb ON cl.class_id = cb.class_id
            WHERE user_id = '" . $_SESSION["uid"] . "' AND booking_status = 1";
            $res = $con->query($selQry);
            $i = 0;

            while ($row = $res->fetch_assoc()) {
                $i++;
                ?>
                <div class="col-md-2 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img" style="background-image: url(../Assets/Files/CoursePhoto/<?php echo $row['course_photo']; ?>);">
                        <span class="course-name"><?php echo $row['course_name']; ?></span>
                        </a>
                        <div class="text p-4">
                            <p class="advisor"><strong>Course Details:</strong></p>
                            <ul class="features">
                                <li><span class="fa fa-check"></span> Course Rate: <?php echo $row['course_rate']; ?></li>
                                <li><span class="fa fa-check"></span> Duration: <?php echo $row['course_duration']; ?> Months</li>
                                <?php if ($row['payment_status'] == 1): ?>
    <li><span class="fa fa-check"></span> Date of Payment: <?php echo $row['payment_date']; ?></li><br>
<?php else: ?>
    <li><span class="fa fa-times"></span> Date of Payment:  Not Paid</li><br>
<?php endif; ?>

                               
                            </ul>

                            <?php
                            if ($row['booking_status'] == 0) {
                                ?>
                                <p class="text-danger mt-3">Status: Not Booked</p>
                                <?php
                            }

                            if ($row['booking_status'] == 1 && $row['payment_status'] == 0) {
                                ?>
                                <p class="text-warning mt-3">Status: Payment Not Completed</p>
                                <a href="Payment.php" class="btn btn-warning">Pay Now</a>
                                <?php
                            }

                            if ($row['booking_status'] == 1 && $row['payment_status'] == 1 ) {
                                $paymentDate = strtotime($row['payment_date']);
                                $expirationDate = strtotime("+" . $row['course_duration'] . " months", $paymentDate);
                                $currentDate = strtotime(date('Y-m-d'));

                                if ($currentDate <= $expirationDate) {
                                    ?>
                                    <p class="text-success mt-3">Status: Completed Payment</p>
                                    <a href="TutorialView.php?tid=<?php echo $row['course_id']; ?>" class="btn btn-success">Start Class</a>
                                    <?php
                                } else {
                                    ?>
                                    <p class="text-success mt-3">Status: Course Duration Ended</p>
                                   
                                    <a href="Rating.php?cid=<?php echo $row['course_id']; ?>" class="btn btn-secondary rate-course-button"><i class="fas fa-star"></i> Rate Course</a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <?php
                if ($i % 6 == 0) {
                    echo '</div><div class="row">';
                }
            }
            ?>
        </div>
    </form>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>

<?php
include('Foot.php');
?>

</html>
