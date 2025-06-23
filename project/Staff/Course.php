<?php

$cname="";
$ctype="";
$crate="";
$duration="";
$courseid=0;
$cduration="";
$staffid=0;
$photo="";
$temp1="";

$mtype="";
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");
  if(isset($_GET['did']))
 {
	 $delQry="delete from tbl_course where course_id=".$_GET['did'];
	 if($con->query($delQry))
	 {
		 ?>
         <script>
		 alert('Deleted')
		 window.location="Course.php" 
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
if(isset($_POST["btn_save"]))
{
	$cname=$_POST["txtcourse"];
	$ctype=$_POST["sel_type"];
	$mtype=$_POST["sel_mtype"];
	$crate=$_POST["txtrate"]; 
	$cduration=$_POST["txtduration"];
	$course_id=$_POST['txtid'];
	$photo=$_FILES["file_photo"]["name"];
	$temp1=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp1,"../Assets/Files/CoursePhoto/".$photo);
		if($course_id==0)
	  {
	$insQry="insert into tbl_course(course_name,coursetype_id,course_rate,course_duration,staff_id,musictype_id,course_photo)values('".$cname."','".$ctype."','".$crate."','".$cduration."','".$_SESSION["sid"]."','".$mtype."','".$photo."')";
	 if($con->query($insQry))
   {
    ?>
        <script>
    alert('Inserted Successfully')
    window.location="Course.php" 
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
	  
else 
 {
	 $upQry="update tbl_course set course_name='".$cname."',coursetype_id='".$ctype."',course_rate='".$crate."',course_duration='".$cduration."',staff_id= '".$_SESSION["sid"]."',musictype_id='".$mtype."',course_photo='".$photo."' where course_id=".$course_id;
	 if($con->query($upQry))
      {
	?>
                           <script>
                           alert('Updated')
						   window.location="Course.php" 
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
$SelQry="select * from tbl_course where course_id=".$_GET['eid'];
$resEdit=$con->query($SelQry);
$rowEdit=$resEdit->fetch_assoc();
$courseid=$rowEdit['course_id'];
$cname=$rowEdit['course_name'];
$ctype=$rowEdit['coursetype_id'];
$mtype=$rowEdit['musictype_id'];
$crate=$rowEdit['course_rate'];
$cduration=$rowEdit['course_duration'];
$staffid=$rowEdit['staff_id'];
$photo=$rowEdit['course_photo'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Music Class</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="txtid" value="<?php echo $courseid ?>">
            <table class="table" border=1 align="center">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                   
                      <tr>
                      <td>  <label for="txtcourse">Course Name</label>
                        <input type="text" class="form-control" name="txtcourse" id="txtcourse" value="<?php echo $cname ?>" required/></td></tr>
                    </div>
                    <div class="form-group">
                    
                    <tr>
                      <td>  <label for="file_photo">Photo</label>
                        <input type="file" class="form-control-file" name="file_photo" id="file_photo" value="<?php echo $photo ?>" /></td></tr>
                    </div>
                    <div class="form-group">
                     
                    <tr>
                      <td>    <label for="sel_mtype">Music Type</label>
                        <select class="form-control" name="sel_mtype" id="sel_mtype">
                            <option value="">--select--</option>
       <?php
	    $type="select * from  tbl_type";
		$restype=$con->query($type);
	   while($rowcat=$restype->fetch_assoc())
	   {
	   ?>
       <option value="<?php echo $rowcat["type_id"]?>"><?php echo $rowcat["type_name"]?></option>
       <?php
	   }
	   ?>
      </select></td></tr>
                    </div>
                    <div class="form-group">
                      
                    <tr>
                      <td>   <label for="sel_type">Course Type</label>
                        <select class="form-control" name="sel_type" id="sel_type">
                            <option value="">--select--</option>
       <?php
	    $type="select * from  tbl_coursetype";
		$restype=$con->query($type);
	   while($rowcat=$restype->fetch_assoc())
	   {
	   ?>
       <option value="<?php echo $rowcat["coursetype_id"]?>"><?php echo $rowcat["coursetype_name"]?></option>
       <?php
	   }
	   ?>
                   </select></td></tr>
                    </div>
                    <div class="form-group">
                       
                      <tr>
                      <td>  <label for="txtrate">Course Rate</label>
                        <input type="text" class="form-control" name="txtrate" id="txtrate" value="<?php echo $crate ?>" required /></td></tr>
                    </div>
                    <div class="form-group">
                       
                      <tr>
                      <td>  <label for="txtduration">Course Duration</label>
                        <input type="text" class="form-control" name="txtduration" id="txtduration" value="<?php echo $cduration ?>" required/></td></tr>
                    </div>
                   
                    <tr>
                      <td align="center"><button type="submit" name="btn_save" id="btn_save" class="btn btn-primary">Submit</button></td></tr>
                </div>
            </div>
            <?php echo $message ?>
    </table>
        </form>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Course id</th>
                    <th>Music id</th>
                    <th>course Type id</th>
                    <th>Rate</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
         <?php
	$select="select * from tbl_course where staff_id= '".$_SESSION["sid"]."'";
	$res=$con->query($select);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $_SESSION['cid']= $row['course_id']; ?></td>
      <td><?php echo $row['musictype_id']; ?></td>
      <td><?php echo $row['coursetype_id']; ?></td>
      <td><?php echo $row['course_rate'];?></td>
      <td><?php echo $row['course_duration']; ?></td>
      <td><a href="Course.php?did=<?php echo $row['course_id'] ?>" class="btn btn-danger btn-sm">
    <i class="fas fa-trash"></i> Delete
</a>

<a href="Course.php?eid=<?php echo $row['course_id'] ?>" class="btn btn-primary btn-sm">
    <i class="fas fa-edit"></i> Edit
</a>

<a href="Material.php?cid=<?php echo $row['course_id'] ?>" class="btn btn-success btn-sm">
    <i class="fas fa-plus"></i> Add Materials
</a>

<a href="Tutorial.php?cid=<?php echo $row['course_id'] ?>" class="btn btn-info btn-sm">
    <i class="fas fa-plus"></i> Add Tutorial
</a>
  </td> </tr>
	<?php
	}
	?>
  </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<?php
ob_flush();
include('Foot.php');
?>
</html>