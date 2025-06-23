<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
            <div class="text-center">
                <?php
                $staffid = $_SESSION['sid'];
                $selQry = "select * from tbl_staff u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where staff_id='" . $staffid . "'";
                $res = $con->query($selQry);
                while ($row = $res->fetch_assoc()) {
                ?>
                <img src="../Assets/Files/StaffPhoto/<?php echo $row['staff_photo']; ?>" class="img-fluid" width="100">
            </div>
            <table class="table table-bordered mt-3">
                <tr>
                    <td align="center" class="font-weight-bold">Name</td>
                    <td align="center"><?php echo $row['staff_name']; ?></td>
                </tr>
                <tr>
                    <td align="center" class="font-weight-bold">Email</td>
                    <td align="center"><?php echo $row['staff_email']; ?></td>
                </tr>
                <tr>
                    <td align="center" class="font-weight-bold">Contact</td>
                    <td align="center"><?php echo $row['staff_contact']; ?></td>
                </tr>
                <tr>
                    <td align="center" class="font-weight-bold">Address</td>
                    <td align="center"><?php echo $row['staff_address']; ?></td>
                </tr>
                <tr>
                    <td align="center" class="font-weight-bold">District</td>
                    <td align="center"><?php echo $row['district_name']; ?></td>
                </tr>
                <tr>
                    <td align="center" class="font-weight-bold">Place</td>
                    <td align="center"><?php echo $row['place_name']; ?></td>
                </tr>
            </table>
            <?php
                }
            ?>
        </form>
    </div>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php
ob_flush();
include('Foot.php');
?>
</html>