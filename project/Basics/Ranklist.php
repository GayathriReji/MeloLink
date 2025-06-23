<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php 
$name="";
$gender="";
$dept="";
$total="";
$percentage="";
$grade="";
if(isset($_POST["btnsub"]))
{ 
	$fname=$_POST["txtfname"];
	$lname=$_POST["txtlname"];
	$gender=$_POST["btngender"];
	if($gender="male")
	{
	 $name="Mr. ".$fname."".$lname;
}
else 
{
	$name="Ms. ".$fname."".$lname;
}

	$dept=$_POST["ddldept"];
	$mark1=$_POST["txtm1"];
	$mark2=$_POST["txtm2"];
	$mark3=$_POST["txtm3"];
	$total=$mark1+$mark2+$mark3;
	$percent=($total)/3;
	if($percentage>=90)
	{
		$grade="A+";
	}
	else if($percentage>=80)
	{
		$grade="A";
	}
	else
	{
		$grade="D";
	}
}
?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="333" border="1">
    <tr>
      <td width="118">First name</td>
      <td width="199"><label for="txtfname"></label>
      <input type="text" name="txtfname" id="txtfname" /></td>
    </tr>
    <tr>
      <td>Last name</td>
      <td><label for="txtsname"></label>
      <input type="text" name="txtlname" id="txtlname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="radio" id="gender" value="male" />Male
      <label for="btn">
        <input type="radio" name="radio" id="gender" value="female" />Female
      </label></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><label for="department"></label>
        <select name="ddldept" id="ddldept">
          <option>BCA</option>
          <option>BBA</option>
          <option>BCOM</option>
          <option>BTECH</option>
      </select></td>
    </tr>
    <tr>
      <td>Mark 1</td>
      <td><label for="txtm1"></label>
      <input type="text" name="txtm1" id="txtm1" /></td>
    </tr>
    <tr>
      <td>Mark 2</td>
      <td><label for="txtm2"></label>
      <input type="text" name="txtm2" id="txtm2" /></td>
    </tr>
    <tr>
      <td>Mark 3</td>
      <td><label for="txtm3"></label>
      <input type="text" name="txtm3" id="txtm3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsub" id="btnsub" value="Submit" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td>Name</td>
   <td><?php echo $name?></td>
   <td>&nbsp;</td>
   </tr>
   <tr>
   <td>Gender</td>
   <td><?php echo $gender?></td>
   <td>&nbsp;</td>
   </tr>
   <tr>
   <td>Department</td>
   <td><?php echo $dept?></td>
   <td>&nbsp;</td>
   </tr>
   <tr>
   <td>Total mark</td>
   <td><?php echo $total?></td>
   <td>&nbsp;</td>
   </tr>
   <tr><td>Percentage<td>
   <td><?php echo $percentage?></td>
   <td>&nbsp;</td>
   <tr>
   <td>Grade</td>
   <td><?php echo $grade?></td>
   <td>&nbsp;</td>  
      
    </tr>
  </table>
</form>
</body>
</html>