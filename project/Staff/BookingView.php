<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Class Booking Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-4">Class Booking Details</h1>
        <form method="post">
            <table class="table table-bordered table-striped mt-4">
                <thead class="thead-dark">
                    <tr>
                    <th>Sl No</th>
                        <th>User Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Coure Id</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    $selQry = "SELECT * FROM tbl_user u INNER JOIN tbl_classbooking cb ON cb.user_id = u.user_id INNER JOIN tbl_class c ON cb.class_id = c.class_id WHERE staff_id = '".$_SESSION["sid"]."'";
                    $res = $con->query($selQry);
                    $i = 0;
                    while ($row = $res->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                             <td><?php echo $i ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['user_gender']; ?></td>
                            <td><?php echo $row['user_email']; ?></td>
                            <td><?php echo $row['user_address']; ?></td>
                            <td><?php echo $row['user_contact']; ?></td>
                            <td><?php echo $row['course_id']; ?></td>
                            <td>
                                <?php if ($row['payment_status'] == 1) {
                                    echo "Payment completed";
                                } else {
                                    echo "Payment Pending";
                                } ?>
                            </td>
                        </tr>
                        <?php
                        if ($i == 4) {
                            $i = 0;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
ob_flush();
include('Foot.php');
?>
</html>