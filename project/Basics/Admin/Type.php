<?php

ob_start();
include('Head.php');
$typename="";
$typeid=0;
 include("../Assets/Connections/Connection.php");
 if(isset($_GET['did']))
 {
	 $delQry="delete from tbl_type where type_id=".$_GET['did'];
	 if($con->query($delQry))
	 {
		 ?>
         <script>
		 alert('Deleted')
		 window.location="Type.php"
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
	  $typename=$_POST["txttype"];
	  $type_id=$_POST["txtid"];
	  if($type_id==0)
	  {
	  $insQry="insert into tbl_type(type_name)values('".$typename."')";
	  if ($con->query($insQry)) {
      ?>
      <script>
          alert('Inserted'); // Changed 'Deleted' to 'Inserted'
          window.location="Type.php"
      </script>
      <?php
  } else {
      ?>
      <script>
          alert('Failed')
      </script>
      <?php
  }
  
 }
 else
 {
	$upQry = "UPDATE tbl_type SET type_name='".$typename."' WHERE type_id=".$type_id; // Changed $typeid to $type_id
if ($con->query($upQry)) {
    ?>
    <script>
        alert('Updated');
        window.location="Type.php"
    </script>
    <?php
} else {
    ?>
    <script>
        alert('Failed');
    </script>
    <?php
}
 }
		
 }
 if(isset($_GET['eid']))
 
 {
	 $SelQry="select * from tbl_type where type_id=".$_GET['eid'];
	 $resEdit=$con->query($SelQry);
     $rowEdit=$resEdit->fetch_assoc();
     $typeid=$rowEdit['type_id'];
     $typename=$rowEdit['type_name'];
 }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Other head elements... -->
</head>
<body>
    <!-- Your HTML content... -->

<body>
  <form id="form1" name="form1" method="post" action="">
    <input type="hidden" name="txtid" value="<?php echo $typeid?>">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-4">
          <table class="table" border=1>
            <tr>
              <td>Type</td>
              <td>
                <input type="text" name="txttype" id="txttype" class="form-control" value="<?php echo $typename ?>" required/>
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input type="submit" name="btnsave" id="btnsave" class="btn btn-primary" value="Submit" />
                <input type="reset" name="btncancel" id="btncancel" class="btn btn-secondary" value="Cancel" />
              </td>
            </tr>
          </table>
          <?php echo $message ?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-8">
          <table class="table table-bordered" >
            <tr>
              <td>Sl No</td>
              <td>Type</td>
              <td>Action</td>
            </tr>
            <?php
            $select = "select * from tbl_type";
            $res = $con->query($select);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
              $i++;
            ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $_SESSION['type'] = $row['type_name']; ?></td>
              <td>
              <a href="Type.php?did=<?php echo $row['type_id'] ?>" class="btn btn-danger">Delete</a>
<a href="Type.php?eid=<?php echo $row['type_id'] ?>" class="btn btn-primary">Edit</a>

              </td>
            </tr>
            <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </form>
  
  <!-- Include Bootstrap JS and jQuery (Optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
<?php
ob_flush();
include('Foot.php');
?>
</html>