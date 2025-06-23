<!doctype html>
<html lang="en">
  <head>
  	<title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Assets/Template/Login/css/style.css">

	</head>
	<?php
include("../Assets/Connections/Connection.php");
session_start();
if(isset($_POST["btnlogin"]))
{
	$email=$_POST["txtemail"];
	$pw=$_POST["txtpassword"];
	$selUser="select * from tbl_user where user_email='".$email."' and user_password='".$pw."'";
	$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$pw."'";
	$selStaff="select * from tbl_staff where staff_email='".$email."' and staff_password='".$pw."'";
	$resUser=$con->query($selUser);
	$resAdmin=$con->query($selAdmin);
	$resStaff=$con->query($selStaff);
	if($resUser->num_rows>0)
	{
	     $row=$resUser->fetch_assoc();
		 $_SESSION['uid']=$row['user_id'];
		 $_SESSION['uname']=$row['user_name'];
		 echo("User Logged In");
		 header("location:../User/UserHomepage.php");
	}
	else if($resAdmin->num_rows>0)
	{
		 $row=$resAdmin->fetch_assoc();
		 $_SESSION['aid']=$row['admin_id'];
		 $_SESSION['aname']=$row['admin_name'];
		 echo("Admin Logged In");
		 header("location:../Admin/Adminpage.php");
	}
	else if($resStaff->num_rows>0)
	{
	     $row=$resStaff->fetch_assoc();
		 $_SESSION['sid']=$row['staff_id'];
		 $_SESSION['sname']=$row['staff_name'];
		 echo("Staff Logged In");
		 header("location:../Staff/StaffHome.php");
	}
	else
	{
		?>
		<script>
		alert("No user found..Enter valid email and password");
		</script>
        <?php
	}
}
?>

	<body class="img js-fullheight" style="background-image: url(../Assets/Template/Login/images/bg03.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form action="#" class="signin-form" method="post">
		      		<div class="form-group">
		      			<input type="email" class="form-control"  name="txtemail" placeholder="Email" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" name="txtpassword" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3" name="btnlogin">Log In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="ForgotPassword.php" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or Sign up As &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="NewUser.php" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> New User</a>
	          	<a href="Staff.php" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> New Staff</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Template/Login/js/jquery.min.js"></script>
  <script src="../Assets/Template/Login/js/popper.js"></script>
  <script src="../Assets/Template/Login/js/bootstrap.min.js"></script>
  <script src="../Assets/Template/Login/js/main.js"></script>

	</body>
</html>

