<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Material View</title>
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

        /* Added styles for the course name and view button */
        .course-name {
            font-size: 24px;
            font-weight: bold;
            color: #3498db; /* Adjust the color as needed */
            margin-bottom: 15px;
        }

        .view-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #27ae60; /* Adjust the color as needed */
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .view-button:hover {
            background-color: #218c53; /* Adjust the hover color as needed */
        }
    </style>
</head>

<body>
    <div class="container cont text-center">
        <?php
        if (isset($_GET['mid'])) {
            // Use prepared statement to avoid SQL injection
            $stmt = $con->prepare("SELECT * FROM tbl_material m INNER JOIN tbl_course c ON m.course_id = c.course_id WHERE c.course_id = ?");
            $stmt->bind_param("s", $_GET['mid']);
            $stmt->execute();

            $res = $stmt->get_result();

            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    // Display the course name with new styles
                    echo '<div class="material-name">' . $row['material_name'] . '</div>';
                    // Display the view button with Bootstrap class
                    echo '<a href="../Assets/Files/StaffMaterial/' . $row['material_file'] . '" target="_blank" class="btn btn-success view-button">View</a><br>';
                }
            } else {
                echo "No study materials available for this course.";
            }

            $stmt->close();
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
