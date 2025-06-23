<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Course View</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Add Font Awesome stylesheet link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

       
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

        .course-name {
    position: absolute;
    bottom: 10px; 
    right: 10px; 
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
    </style>
</head>

<body>

   

        <div class="row">
            <?php
            $selQry = "select * from tbl_course";
            $res = $con->query($selQry);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
            ?>
               <div class="col-md-3 ftco-animate mb-5">
                    <div class="project-wrap">
                        <a href="../User/CourseView.php?cid=<?php echo $row['course_id'] ?>" class="img" style="background-image: url(../Assets/Files/CoursePhoto/<?php echo $row['course_photo']; ?>);">
                            <span class="course-name"><?php echo $row['course_name']; ?></span>
                        </a>
                    </div>
                </div>
            <?php
                $i++;
                if ($i % 4 == 0) {
                    echo '</div><div class="row">'; // Start a new row after every 4 courses
                }
            }
            ?>
        </div>

    

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php
    include('Foot.php');
    ob_end_flush();
    ?>

</body>

</html>
