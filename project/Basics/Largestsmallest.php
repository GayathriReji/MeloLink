<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Largestsmallest</title>
</head>
</html>
<?php
if(isset($_POST["btnsub"]))
{
	$a=0;$b=0;$c=0;$big;$small;
    $a=$_POST["txtno1"];
    $b=$_POST["txtno2"];
    $c=$_POST["txtno3"];
    $big=$a;
	$small=$a;
	if($b>$big)
	{
		$big=$b;                                        
	}
	if($b<$big)                                              
	{                                                     
	$small=$b;
    }

	if($c>$big)
	{
		$big=$c;
	}

if($c<$big)
{
	$small=$c;
}

}
?>
<body>
<form method="post">
<table border="1">
<tr>
<td>Enter number 1</td>
<td><input type="text"  name="txtno1"  placeholder="Enter here" required="required"></td>
</tr>
<tr>
<td>Enter number 2</td>
<td><input type="text"  name="txtno2"  placeholder="Enter here" required="required"></td>
</tr>
<tr>
<td>Enter number 3</td>
<td><input type="text"  name="txtno3"  placeholder="Enter here" required="required"></td>
</tr>
<tr>
<td colspan="2" align="right">
<input type="submit" name="btnsub"  value="Submit">
</td>
</tr>
<tr>
<td>Largest=<?php echo $big ?></td>
<td>Smallest=<?php echo $small ?></td>
</tr>
</table>
</form>
</body>
</html>