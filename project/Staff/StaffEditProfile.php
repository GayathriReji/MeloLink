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
	$upQry = "update tbl_staff set staff_name = '".$name."',staff_email='".$email."',staff_contact='".$contact."',staff_address='".$address."' where staff_id = ".$_SESSION['sid'];
	if($con->query($upQry))
	{
    ?>
        <script>
    alert('Updated successfully')
    window.location="StaffHome.php" 
    </script>
        <?php
  }
  else 
  {
    ?>
        <script>
    alert(' Failed To Update. Try Again')
    </script>
        <?php
 }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Edit Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
        <table class="table" border=1>
           <tr><td> <?php
            $staffid = $_SESSION['sid'];
            $selQry = "select * from tbl_staff u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where staff_id='" . $staffid . "'";
            $res = $con->query($selQry);
            while ($row = $res->fetch_assoc()) {
            ?>
            <div class="text-center">
                <img src="../Assets/Files/StaffPhoto/<?php echo $row['staff_photo']; ?>" width="100"></td></tr>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <tr><td><label for="txt_name">Name</label>
                        <input type="text" class="form-control" name="txt_name" value="<?php echo $row['staff_name'];?>"></td></tr>
                    </div>
                    <div class="form-group">
                        <tr><td><label for="txt_email">Email</label>
                        <input type="text" class="form-control" name="txt_email" value="<?php echo $row['staff_email'];?>"></td></tr>
                    </div>
                    <div class="form-group">
                        <tr><td><label for="txt_contact">Contact</label>
                        <input type="text" class="form-control" name="txt_contact" value="<?php echo $row['staff_contact'];?>"></td></tr>
                    </div>
                    <div class="form-group">
                        <tr><td><label for="txt_address">Address</label>
                        <input type="text" class="form-control" name="txt_address" value="<?php echo $row['staff_address'];?>"></td></tr>
                    </div>
                    <div class="text-center">
                   <tr> <td align="center"> <input type="submit" class="btn btn-primary" name="btn_save" value="Submit"></td></tr>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            </table>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
<?php
ob_flush();
include('Foot.php');
?>
</html>