<?php
  include("../Connections/Connection.php");

?>
<option>Select</option>
<?php 
$sel="select * from tbl_place where district_id='".$_GET["pid"]."'";
$result=$con->query($sel);
while($data=$result->fetch_assoc())
{
?>
<option value="<?php echo $data["place_id"] ?>"><?php echo $data["place_name"] ?></option>
<?php
}
?>