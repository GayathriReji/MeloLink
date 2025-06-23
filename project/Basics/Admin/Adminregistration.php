<?php
$adminname="";
$adminid=0;
$admincontact="";
$adminemail="";
$adminpassword="";
 include("../Assets/Connections/Connection.php");
 if(isset($_GET['did']))
 {
	 $delQry="delete from tbl_admin where admin_id=".$_GET['did'];
	 if($con->query($delQry))
	 {
		 ?>
         <script>
		 alert('Deleted')
		 window.location="Adminregistration.php" 
		 </script>
         <?php
	 }
	 else 
	 {
		 ?>
         <script>
		 alert('Failed')
		 </script>
         <?php
	}
 }
 $message="";
 if(isset($_POST["btnsave"]))
 {
	  $adminname=$_POST["txtname"];
	  $admincontact=$_POST["txtcontact"];
	  $adminemail=$_POST["txtemail"];
	  $adminpassword=$_POST["txtpwd"];
	  $admin_id=$_POST["txtid"];
	  if($adminid==0)
	  {
	  $insQry="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password)values('".$adminname."','".$admincontact."','".$adminemail."','".$adminpassword."')";
	  if($con->query($insQry))
	  {
		  $message="Reacord Inserted...";
	  }
	  else
	  {
		  $message="Insertion Failed...";
	  }
	  
      }
 else 
 {
	$upQry="update tbl_admin set admin_name='".$adminname."',admin_contact='".$admincontact."',admin_email='".$adminemail."',admin_password='".$adminpassword."' where admin_id=".$adminid;
   if($con->query($upQry))
    {
	?>
   <script>
     alert('Updated')
      </script>
      <?php
    }
    else
     {
       ?>
     <script>
       alert('Failed')
     </script>
       <?php
     }
  }
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="txtid" >
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
         <input type="text" name="txtname" id="txtname" required  /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
          <input type="text" name="txtcontact" id="txtcontact" required />  </td>
    </tr>
    <tr>
      <td>E-Mail</td>
      <td><label for="txtemail"></label>
          <input type="text" name="txtemail" id="txtemail" required /> </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpwd"></label>
          <input type="password" name="txtpwd" id="txtpwd" required  /> </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Submit" />
         <input type="reset" name="txtcancel" id="txtcancel" value="Cancel" />
    </tr>
   </table> <?php echo $message?></td></tr>
   </form>
    <tr>
    <td colspan="2" align="center">
      <table width="200" border="1">
        <tr>
          <td>Sl No</td>
          <td>Name</td>
          <td>Action</td>
        </tr>
         <?php
	$select="select * from tbl_admin";
	$res=$con->query($select);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['admin_name']; ?></td>
      <td><a href="Adminregistration.php?did=<?php echo $row ['admin_id'] ?>">Delete</a>
      
	<?php
	}
	?>
</form>
</html>