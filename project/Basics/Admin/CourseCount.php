<?php
include("../Assets/Connections/Connection.php");


// Check connection

// Query to get the count of courses
$sql = "SELECT COUNT(*) as course_count FROM  tbl_course";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $numberOfCourses = $row["course_count"];
    echo $numberOfCourses;
} else {
    echo 0;
}

$con->close();
?>
