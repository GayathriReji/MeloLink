<?php 

$classname="";

$classid=0;
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");
if(isset($_POST["btnsave"]))
{
	$classname=$_POST["txtdata"];
	
	$courseid=$_POST['sel_course'];
	
	$insQry="insert into tbl_class(class_data,course_id,staff_id)values('".$classname."','".$courseid."','".$_SESSION["sid"]."')";
	 
	 if($con->query($insQry))
   {
		?>
		<script>
		alert('Inserted')
		window.location="Class.php" 
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

	?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Class</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <form method="post" action="">
      <input type="hidden" name="txtid" value="<?php echo $classid?>" />
      <div class="row justify-content-center mt-4">
        <div class="col-md-4">
          <div class="form-group">
          <table class="table" border=1 align="center">
          <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="form-group">
          <tr>
                      <td>
            <label for="sel_course">Course</label>
            <select class="form-control" name="sel_course" id="sel_course">
              <option value="">--select--</option>
              <?php
              $type = "SELECT * FROM tbl_course where staff_id='".$_SESSION['sid']."'";
              $restype = $con->query($type);
              while ($rowcat = $restype->fetch_assoc()) {
              ?>
                <option value="<?php echo $rowcat["course_id"] ?>"><?php echo $rowcat["course_name"] ?></option>
              <?php
              }
              ?>
            </select></td> </tr>
          </div>
        </div>
      </div>
                      <tr>
                      <td>
            <label for="txtdata">Class Data</label>
            <input type="text" class="form-control" name="txtdata" id="txtdata" value="<?php echo $classname ?>" required /></td> </tr>
                    </div>
        </div>
      </div>

      <!-- <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="form-group">
          <tr>
                      <td>
            <label for="txtfrom">Class From Time</label>
            <input type="text" class="form-control" name="txtfrom" id="txtfrom" value="<?php echo $fromtime ?>" required /></td> </tr>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="form-group">
          <tr>
                      <td>
            <label for="txtto">Class To Time</label>
            <input type="text" class="form-control" name="txtto" id="txtto" value="<?php echo $totime ?>"  required/></td> </tr>
          </div>
        </div>
      </div> -->

     

      <div class="row justify-content-center mt-3">
        <div class="col-md-4">
          <div class="text-center">
          <tr>
                      <td>
            <input type="submit" class="btn btn-primary" name="btnsave" id="btnsave" value="Submit" />
            <input type="reset" class="btn btn-secondary" name="btncancel" id="btncancel" value="Cancel" /></td> </tr></table>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
ob_flush();
include('Foot.php');
?>
</html>