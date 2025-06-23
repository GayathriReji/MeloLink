<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");

if(isset($_POST['btn_save']))
{ 
	$name=$_POST['txt_name'];
	$email=$_POST['txt_email'];
	$contact=$_POST['txt_contact'];
	$address=$_POST['txt_address'];
	$upQry = "update tbl_user set user_name = '".$name."',user_email='".$email."',user_contact='".$contact."',user_address='".$address."' where user_id = ".$_SESSION['uid'];
	if($con->query($upQry))
	{
   ?>
    <script>
    alert('Updated')
window.location="EditProfile.php" 
    </script>
    <?php
    
	}
} 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User Edit Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .profile-image {
        max-width: 100px;
        height: auto;
        border: 2px solid #ccc;
        border-radius: 50%;
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css">

</head>
<body>
    <div class="container">
        <form id="form1" name="form1" method="post" action="">
            <?php
            $userid = $_SESSION['uid'];
            $selQry = "select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where user_id='" . $userid . "'";
            $res = $con->query($selQry);
            while ($row = $res->fetch_assoc()) {
                ?>
                <div class="text-center">
                     <table class="table table-bordered"><tr><td  colspan="2" align="center">
                    <img class="profile-image" src="../Assets/Files/UserPhoto/<?php echo $row['user_photo']; ?>" width="200" height="150"></td></tr>
                </div>
               
                    <tr>
                        <td align="center">Name</td>
                        <td align="center"><input type="text" class="form-control" name="txt_name"
                                                  value="<?php echo $row['user_name']; ?>"></td>
                    </tr>
                    <tr>
                        <td align="center">Email</td>
                        <td align="center"><input type="text" class="form-control" name="txt_email"
                                                  value="<?php echo $row['user_email']; ?>"></td>
                    </tr>
                    <tr>
                        <td align="center">Contact</td>
                        <td align="center"><input type="text" class="form-control" name="txt_contact"
                                                  value="<?php echo $row['user_contact']; ?>"></td>
                    </tr>
                    <tr>
                        <td align="center">Address</td>
                        <td align="center"><input type="text" class="form-control" name="txt_address"
                                                  value="<?php echo $row['user_address']; ?>"></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type="submit" class="btn btn-primary" name="btn_save"
                                                            value="Submit"/></td>
                    </tr>
                </table>
                <?php
            }
            ?>
        </form>
    </div>
</body>


<?php
ob_flush();
include('Foot.php');
?>
</html>
