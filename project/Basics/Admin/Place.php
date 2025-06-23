<?php
ob_start();
include('Head.php');
$placename="";
$placeid=0;
$pincode="";
 include("../Assets/Connections/Connection.php");
 if(isset($_GET['did']))
 {
	 $delQry="delete from tbl_place where place_id=".$_GET['did'];
	 if($con->query($delQry))
	 {
		 ?>
         <script>
		 alert('Deleted')
		 </script>
         <?php
	 }
	 else {
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
	 
	  $placename=$_POST["txtplace"];
	  $pincode=$_POST["txtpin"];
	  $placeid=$_POST["txtid"];
	  $district=$_POST["sel_district"];
	  if($placeid==0)
	  {
	  $insQry="insert into tbl_place(place_name,place_pincode,district_id)values('".$placename."','".$pincode."','".$district."')";
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
		$upQry="update tbl_place set place_name='".$placename."' where place_id=".$placeid;
		if($con->query($upQry))
		{
		?>
		<script>
		alert('Updated')
		window.location="Place.php" 
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
if(isset($_GET['eid']))
{
$SelQry="select * from tbl_place where place_id=".$_GET['eid'];
$resEdit=$con->query($SelQry);
$rowEdit=$resEdit->fetch_assoc();
$placeid=$rowEdit['place_id'];
$placename=$rowEdit['place_name'];
$pincode=$rowEdit['place_pincode'];
}
 ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Place</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <form id="form1" name="form1" method="post" action="">
        <input type="hidden" name="txtid" value="<?php echo $placeid ?>" >

        <div class="container">
            <h2>Add a Place</h2>
            <table class="table" border=1>
                <tr>
                    <td>District Name</td>
                    <td>
                        <select class="form-control" name="sel_district" id="sel_district">
                            <option value="">--select--</option>
                            <?php
                            $selQry = "select * from tbl_district";
                            $res = $con->query($selQry);
                            while ($row = $res->fetch_assoc()) { ?>
                                <option value="<?php echo $row['district_id']; ?>"><?php echo $row['district_name']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Place Name</td>
                    <td>
                        <input class="form-control" type="text" name="txtplace" id="txtplace" value="<?php echo $placename ?>" required />
                    </td>
                </tr>
                <tr>
                    <td>Pincode</td>
                    <td>
                        <input class="form-control" type="text" name="txtpin" id="txtpin" value="<?php echo $pincode ?>"required />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input class="btn btn-primary" type="submit" name="btnsave" id="btnsave" value="Submit" />
                        <input class="btn btn-secondary" type="reset" name="btncancel" id="btncancel" value="Cancel" />
                    </td>
                </tr>
            </table>
            <?php echo $message ?>
        </div>
    </form>

    <form>
        <div class="container">
            <h2>Place List</h2>
            <table class="table" border=1>
                <tr>
                    <td>Sl no.</td>
                    <td>District Name</td>
                    <td>Place Name</td>
                    <td>Action</td>
                </tr>
                <?php
                $selQry = "select  * from tbl_place fc inner join tbl_district c on fc.district_id=c.district_id";
                $res = $con->query($selQry);
                $i = 0;
                while ($row = $res->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['district_name']; ?></td>
                        <td><?php echo $row['place_name']; ?></td>

                        <td>
                            <a href="Place.php?did=<?php echo $row['place_id'] ?>" class="btn btn-danger btn-sm">
    </i>Delete</a>
                            <a href="Place.php?eid=<?php echo $row['place_id'] ?>" class="btn btn-primary btn-sm">
   </i> Edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </form>

    <!-- Add Bootstrap JS and jQuery (recommended at the end of your HTML document) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

  
</form>
</body>
<?php
ob_flush();
include('Foot.php');
?>
</html>