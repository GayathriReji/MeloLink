<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
if(isset($_POST["btnadd"]))
{
	$a=0;$b=0;$result=0;
	$a=$_POST["txtfno"];
	$b=$_POST["txtsno"];
	$result=$a+$b;
}
if(isset($_POST["btnsub"]))
{
	$a=0;$b=0;$result=0;
	$a=$_POST["txtfno"];
	$b=$_POST["txtsno"];
	$result=$a-$b;

}
if(isset($_POST["btnmul"]))
{
	$a=0;$b=0;$result=0;
	$a=$_POST["txtfno"];
	$b=$_POST["txtsno"];
	$result=$a*$b;
}
if(isset($_POST["btndiv"]))
{
$a=0;$b=0;$result=0;
	$a=$_POST["txtfno"];
	$b=$_POST["txtsno"];
	$result=$a/$b;
}
?>
<body>
<form method="post">
<table border="1">
<tr>
<td>First number</td>
<td><input type="text"  name="txtfno" placeholder="Enter number " required="required"></td>
</tr>
<tr>
<td>Second number</td>
<td><input type="text"  name="txtsno"  placeholder="Enter number"  required="required"></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="btnadd"  value="add">
<input type="submit" name="btnsub"  value="substract">
<input type="submit" name="btnmul"  value="multiple">
<input type="submit" name="btndiv"  value="divide">
</td>
</tr>
<tr>
<td>Result=<?php echo $result ?></td>
</tr>
</table>
</form> 
</body>
</html>
