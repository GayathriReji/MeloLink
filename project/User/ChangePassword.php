 <?php
 ob_start();
 include('Head.php');
include("../Assets/Connections/Connection.php");

if(isset($_POST['btn_save']))
{
   $oldpw=$_POST['txt_oldpw'];
   $curpw=$_POST['txt_curpw'];
   $conpw=$_POST['txt_conpw'];
   $selQry= "select * from tbl_user where user_id =".$_SESSION['uid'];
   $row=$con->query($selQry);
   $data=$row->fetch_assoc();
   $oldPassword=$data['user_password'];
	if($oldPassword==$oldpw)
	{
		if($curpw==$conpw)
		{	
		$upQry="update tbl_user set user_password='".$conpw."' where user_id = ".$_SESSION['uid'];
			if($con->query($upQry))
			{
				echo"updated";
			}
		}
		else
		{
			?>
   			 <script>
				alert("Miss match password and Confirm Password");
			</script>
    		<?php
		}
	}
	else
	{
	?>
    <script>
	alert("Old Password Is Wrong");
	</script>
    <?php
	}
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Bootstrap Form</title>
</head>
<body>
  <div class="container">
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-bordered table-responsive-sm mx-auto" style="width: 500px;">
        <tr>
          <td>Old Password</td>
          <td><input type="password" class="form-control" name="txt_oldpw" id="txt_oldpw" required/></td>
        </tr>
        <tr>
          <td>Current Password</td>
          <td><input type="password" class="form-control" name="txt_curpw" id="txt_curpw" required/></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td><input type="password" class="form-control" name="txt_conpw" id="txt_conpw" required /></td>
        </tr>
        <tr>
          <td colspan="2" class="text-center">
            <input type="submit" class="btn btn-primary" name="btn_save" value="Submit" />
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>

<?php
ob_flush();
include('Foot.php');
?>
</html>