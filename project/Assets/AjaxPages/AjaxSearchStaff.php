<?php
include("../Connections/Connection.php");
session_start();

function getStaffDetails($con, $tid) {
    $selQry = "SELECT * FROM tbl_staff WHERE staff_musictype = ?";
    $stmt = $con->prepare($selQry);
    $stmt->bind_param("i", $tid);
    $stmt->execute();
    $res = $stmt->get_result();
    $stmt->close();

    return $res;
}

if (isset($_GET['tid']) && !empty($_GET['tid'])) {
    $tid = $_GET['tid'];
    
    $staffDetails = getStaffDetails($con, $tid);
    
    while ($row = $staffDetails->fetch_assoc()) {
        echo '<div class="col-md-2">';
        echo '<div class="thumbnail">';
        echo '<img src="../Assets/Files/StaffPhoto/' . $row['staff_photo'] . '" alt="' . $row['staff_name'] . '" class="img-fluid" style="height: 150px; object-fit: cover;">';
        echo '<div class="caption">';
        echo '<h5>' . $row['staff_name'] . '</h5>';
        echo '<p>' . $row['staff_email'] . '</p>';
        echo '<p>' . $row['staff_contact'] . '</p>';
        echo '<p><a href="ViewCourse.php?vid=' . $row['staff_id'] . '" class="btn btn-primary">View More Course</a></p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

mysqli_close($con);
?>
