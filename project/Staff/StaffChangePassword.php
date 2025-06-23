<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");


if(isset($_POST['btn_save']))
{
  $oldpw=$_POST['txt_oldpw'];
  $curpw=$_POST['txt_curpw'];
  $conpw=$_POST['txt_conpw'];
  $selQry= "select * from tbl_staff where staff_id =".$_SESSION['sid'];
  $row=$con->query($selQry);
  $data=$row->fetch_assoc();
  $oldPassword=$data['staff_password'];
	if($oldPassword==$oldpw)
	{
		if($curpw==$conpw)
		{	

      $upQry="update tbl_staff set staff_password='".$conpw."' where staff_id = ".$_SESSION['sid'];
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

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Change Password</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <form id="form1" name="form1" method="post" action="">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="form-group">
            <table class="table table-bordered" align="center">
              <tr><td>
            <label for="txt_oldpw">Old Password</label>
            <input type="password" class="form-control" name="txt_oldpw" id="txt_oldpw"required></td></tr>
          </div>
          <div class="form-group">
          <tr><td> <label for="txt_curpw">Current Password</label>
            <input type="password" class="form-control" name="txt_curpw" id="txt_curpw" required></td></tr>
          </div>
          <div class="form-group">
          <tr><td> <label for="txt_conpw">Confirm Password</label>
            <input type="password" class="form-control" name="txt_conpw" id="txt_conpw" required></td></tr>
          </div>
          <tr><td align="center"><button type="submit" class="btn btn-primary" name="btn_save">Submit</button></td></tr>
       
</table>
</div>
      </div>
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