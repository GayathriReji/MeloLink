<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tutorial View</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .cont {
            max-width: 800px; /* Adjust the maximum width as needed */
            margin: 0 auto; /* Center the container horizontally */
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container cont text-center">
        <?php
        if (isset($_GET['tid'])) {
            $selQry = "SELECT * FROM tbl_tutorial t INNER JOIN tbl_course c ON t.course_id = c.course_id WHERE c.course_id = '" . $_GET['tid'] . "'";
            $res = $con->query($selQry);

            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo '<h2>' . $row['course_name'] . '</h2>';

                    echo '<video width="640" height="360" controls>
                              <source src="../Assets/Files/StaffTutorial/' . $row['tutorial_video'] . '" type="video/mp4">
                              Your browser does not support the video tag.
                          </video><br>';

                    // Button to view materials
                    echo '<a href="MaterialView.php?mid=' . $row['course_id'] . '" class="btn btn-primary">View Materials</a>';
                }
            } else {
                echo "No videos available for this course.";
            }
        } else {
            echo "Invalid request.";
        }
        ?>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include('Foot.php');
// ob_end_flush();
?>
