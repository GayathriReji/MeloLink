<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

$msg="";
/*ob_start();
include("Head.php");*/
include("../Assets/Connections/Connection.php");
 

  if(isset($_POST["btnsave"]))
  {
	  
	  $name=$_POST["txtname"];
	  $district=$_POST["sel_district"];
	  $place=$_POST["sel_place"];
	  $contact=$_POST["txtcontact"];
	  $email=$_POST["txtemail"];
	  $gender=$_POST["btngender"];
	  $address=$_POST["txtaddress"];
	  $password=$_POST["txtpassword"];
	  $photo =$_FILES["file_photo"]["name"];
	  $temp1 =$_FILES["file_photo"]["tmp_name"];
	  move_uploaded_file($temp1,"../Assets/Files/UserPhoto/".$photo);
	  $proof =$_FILES["file_proof"]["name"];
	  $temp2 =$_FILES["file_proof"]["tmp_name"];
	  move_uploaded_file($temp2,"../Assets/Files/UserProof/".$proof);
	    $sel="select *from tbl_user where user_email='".$email."'";
  $r=$con->query($sel);
  
  if($row=$r->fetch_assoc())
  {
    ?><?php
		 
		  $upQry="update tbl_user set user_status=1 where user_status=0";
		$con->query($upQry);
      ?>
        <script>
    alert("Account already exists for this email");
    window.location="NewUser.php"
    </script>
        <?php
  }
  else
  {

	  $insQry="insert into tbl_user(user_name,place_id,user_email,user_gender,user_address,user_contact,user_password,user_photo,user_proof,user_doj)values('".$name."','".$place."','".$email."','".$gender."','".$address."','".$contact."','".$password."','".$photo."','".$proof."',curdate())";
	  if($con->query($insQry))
	 {
		
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'melolinkmusicclass@gmail.com'; // Your gmail
    $mail->Password = 'svqejdsszuskejob'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    
    $mail->setFrom('melolinkmusicclass@gmail.com'); // Your gmail
    
    $mail->addAddress($email);
    
    $mail->isHTML(true);
    
    $mail->Subject = "Welcome to MeloLink Online Music Class";
    $mail->Body = "Hello,<br>Thank You for choosing MeloLink. Always grateful to receive your profile. You can use our website to learn your favorite music. Follow your passion.<br><br>Thank you and HAPPY LEARNING...😊💕";
    
    if ($mail->send()) {
        echo "Email Sent";
    } else {
        echo "Email Failed to Send: " . $mail->ErrorInfo;
    }
    
  
  //Email Code End
    $msg="User Registered Successfully";
    
 }
  else
  {
    $msg="Insertion Failed";
  }
  }
}


        ?>
  <html>
  <head>      
</head>
<style>

</style>
<body>
<div class="indent-small">
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="txtid" id="txtid" />
  <table width="390" border="1" align="center">
    <tr>
      <td width="60">Name</td>
      <td width="314"><label for="txtname"></label>
           <input type="text" name="txtname" id="txtname" /></td>
      </tr>
       <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
          <select name="sel_district" id="sel_district" onChange="getPlace(this.value)">
          <option value="">---select---<option>
     <?php
	 $selplace="select * from  tbl_district";
	 $resplace=$con->query($selplace);
	 while($rowcat=$resplace->fetch_assoc())
	 {
	 ?>
     <option value="<?php echo $rowcat["district_id"]?>"><?php echo $rowcat["district_name"]?></option>
     <?php
	 }
	 ?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
          <select name="sel_place" id="sel_place" >
          <option value ="">--select--</option>
          </select></td>    
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
          <input type="email" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
          <input type="password" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="btngender" id="btngender" value="Male" />
          <label for="btngender">Male</label>
          <input type="radio" name="btngender"id="btngender" value="Female" />
          <label for="btngender">Female</label>
          <input type="radio" name="btngender" id="btngender" value="Others" />
          </label><label for="btngender">Others</label></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
          <textarea name="txtaddress" id="txtaddress" col="45" row="5"> </textarea> </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
          <input type="text" name="txtcontact" id="txtcontact" ></td>
    </tr>
    <tr>
      <td >Photo</td>
      <td><label><input type="file" name="file_photo" id="file_photo"></label></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label><input type="file" name="file_proof" id="file_proof" ></label>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
       <input type="submit" name="btnsave" id="btnsave" value="Register" />
       <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table> 
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
		}
	});
}
</script>
</html>
<?php
/*include("Foot.php");
ob_flush();*/
?>