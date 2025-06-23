<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .containercon{
            max-width: 600px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 50px auto;
            padding: 30px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }

        .profile-image {
            display: block;
            margin: 0 auto 20px;
            width: 200px;
            height: 200px;
            border: 5px solid ;
            border-radius: 50%;
            object-fit: cover;
        }

        .table {
            width: 100%;
            max-width: 500px;
            margin: 20px auto;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <form id="form1" name="form1" method="post" action="">
        <div class="containercon">
            <?php
            $userid = $_SESSION['uid'];
            $selQry = "select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where user_id='" . $userid . "'";
            $res = $con->query($selQry);
            while ($row = $res->fetch_assoc()) {
                ?>
                <center>
                    <img class="profile-image" src="../Assets/Files/UserPhoto/<?php echo $row['user_photo']; ?>" alt="User Photo">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <td><?php echo $row['user_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row['user_email']; ?></td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td><?php echo $row['user_contact']; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $row['user_address']; ?> </td>
                        </tr>
                        <tr>
                            <th>District</th>
                            <td><?php echo $row['district_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Place</th>
                            <td><?php echo $row['place_name']; ?></td>
                        </tr>
                    </table>
                </center>
            <?php
        }
        ?>
    </form>
</div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>