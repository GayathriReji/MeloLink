<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request Report</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
<?php

ob_start();
include("Head.php");

include("../Assets/Connections/Connection.php");


?>
<form id="form1" name="form1" method="post" action="">
<table  border="1"  cellpadding="10" align="center">
    <tr>
      <td>From Date</td>
      <td><label for="txt_f"></label>
      <input type="date" name="txt_f" id="txt_f" /></td>
      <td>To Date</td>
      <td><label for="txt_t"></label>
      <input type="date" name="txt_t" id="txt_t" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input type="submit" name="btnsave" id="btnsave" value="View Results" /></td>
    </tr>
  </table>
  <?php
  if(isset($_POST["btnsave"]))
  {
  ?>
  <div id="pri">
  <table  border="1" cellpadding="10" align="center">
    <tr>
      <td width="41">Sl.no</td>
      <td width="46">Name</td>
      <td width="60">Contact</td>
      <td width="97">Email</td>
      <td width="59">Address</td>
     
     
    </tr>
    <?php
     $sel = "SELECT * FROM  tbl_user u 
     INNER JOIN tbl_classbooking cb ON u.user_id = cb.user_id
     INNER JOIN tbl_class cs ON cb.class_id = cs.class_id
     INNER JOIN tbl_course c ON cs.course_id = c.course_id
     INNER JOIN tbl_type t ON t.type_id = c.musictype_id  where payment_status='1' and payment_date  between '".$_POST["txt_f"]."' and '".$_POST["txt_t"]."'";
$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["user_name"];?></td>
      <td><?php echo $data["user_contact"];?></td>
      <td><?php echo $data["user_email"];?></td>
      <td><?php echo $data["user_address"];?></td>
   
          </tr>
          <?php
	}
		  ?>
  </table>
  </div>
   <center><input type="button" onclick="printDiv('pri')" id="invoice-print"  class="btn btn-success" value="Print" /></center>
  <?php
  }
  ?>
 
</form>
</body>
</html>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php
include("Foot.php");
ob_flush();
?>
