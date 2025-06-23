 <?php
 ob_start();
 include('Head.php');
 include("../Assets/Connections/Connection.php");
 $msg="";
 $accstatus=1;
 $rejstatus=2;
if(isset($_GET['accid']))
  {
     $upQry="update tbl_staff set staff_status=".$accstatus." where staff_id=".$_GET['accid'];
    if($con->query($upQry))
      {
	       $msg="status updated to 1(accepted)";
	?>
 <script>
	            window.location="Verification.php"
	</script>
    <?php
     }
        else
           {
              $msg="failed to accept";
	  ?>
  <script>
	            window.location="Verification.php"
	</script>
    <?php
           }
     }
  if(isset($_GET['rejid']))
  {
	$upQry="update tbl_staff set staff_status=".$rejstatus." where staff_id=".$_GET['rejid'];
if($con->query($upQry))
{
	$msg="status updated to 2(rejected)";
	?>
 <script>
	window.location="Verification.php"
	</script>
  <?php
 }
 else
 {
 $msg="failed to reject";
	?>
  <script>
	window.location="Verification.php"
	</script>
  <?php
 }  
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .table-wrapper {
            overflow-x: auto;
            margin-bottom: 20px; /* Add some margin to separate tables */
        }
    </style>
<title>Verification</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div class="table-wrapper">
<table class="table table-bordered table-striped">
    <thead class="thead-light">
    <th>SlNo.</th>
            <th>Name</th>
            <th>Address</th>
            <th>E-mail</th>
            <th>Photo</th>
            <th>Contact</th>
            <th>Proof</th>
            <th>MusicType</th>
            <th>Password</th>
            <th>District</th>
            <th>Place</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php
	$selQry="select * from tbl_staff s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where staff_status !=".$accstatus." and staff_status !=".$rejstatus."";
	$res=$con->query($selQry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
		?>
   
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['staff_name'];      ?></td>
      <td><?php echo $row['staff_address'];   ?></td>
      <td><?php echo $row['staff_email'];     ?></td>
      <td><img src="..\Assets\Files\StaffPhoto\<?php echo $row['staff_photo'];?>" width="50" /></td>
      <td><?php echo $row['staff_contact'];   ?></td>
      <td><img src="..\Assets\Files\StaffProof\<?php echo $row['staff_proof'];?>" width="50" /></td>
      <td><?php echo $row['staff_musictype']; ?></td>
      <td><?php echo $row['staff_password'];  ?></td>
      <td><?php echo $row['district_name'];   ?></td>
      <td><?php echo $row['place_name'];?></td>
      <td><a href="verification.php?accid=<?php echo $row['staff_id'] ?>" class="btn btn-success">Accept</a>
<a href="verification.php?rejid=<?php echo $row['staff_id'] ?>" class="btn btn-danger">Reject</a>
</td>
      
    </tr>
	<?php
	}
	?>
    
  </table>
  <h3><?php echo $msg ?></h3>
  <h2>Accepted </h2>
  <table class="table table-bordered table-striped">
    <thead class="thead-light">
  <th>SlNo.</th>
            <th>Name</th>
            <th>Address</th>
            <th>E-mail</th>
            <th>Photo</th>
            <th>Contact</th>
            <th>Proof</th>
            <th>MusicType</th>
            <th>Password</th>
            <th>District</th>
            <th>Place</th>
            <th>Status</th>
        </tr>
    </thead>
  
   <?php
	$selQry="select * from tbl_staff s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where staff_status=".$accstatus;
	$res=$con->query($selQry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
		?>
   
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['staff_name']; ?></td>
      <td><?php echo $row['staff_address'];?></td>
      <td><?php echo $row['staff_email'];?></td>
      <td><img src="..\Assets\Files\StaffPhoto\<?php echo $row['staff_photo'];?>" width="50" /></td>
      <td><?php echo $row['staff_contact'];?></td>
      <td><img src="..\Assets\Files\StaffProof\<?php echo $row['staff_proof'];?>" width="50" /></td>
      <td><?php echo $row['staff_musictype'];?></td>
      <td><?php echo $row['staff_password'];?></td>
      <td><?php echo $row['district_name'];?></td>
      <td><?php echo $row['place_name'];?></td>
      <td><a href="verification.php?rejid=<?php echo $row ['staff_id'] ?>"class="btn btn-danger">Reject</a></td>
   </tr>
	<?php
	}
	?>
    </table>
    <h3><?php echo $msg ?></h3>
  <h2>Rejected </h2>
  <table class="table table-bordered table-striped">
    <thead class="thead-light">
  <th>SlNo.</th>
            <th>Name</th>
            <th>Address</th>
            <th>E-mail</th>
            <th>Photo</th>
            <th>Contact</th>
            <th>Proof</th>
            <th>MusicType</th>
            <th>Password</th>
            <th>District</th>
            <th>Place</th>
            <th>Status</th>
        </tr>
    </thead>
  <?php
	$selQry="select * from tbl_staff s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where staff_status=".$rejstatus;
	$res=$con->query($selQry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
		?>
   
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['staff_name']; ?></td>
      <td><?php echo $row['staff_address'];?></td>
      <td><?php echo $row['staff_email'];?></td>
      <td><img src="..\Assets\Files\StaffPhoto\<?php echo $row['staff_photo'];?>" width="50" /></td>
      <td><?php echo $row['staff_contact'];?></td>
      <td><img src="..\Assets\Files\StaffProof\<?php echo $row['staff_proof'];?>" width="50" /></td>
      <td><?php echo $row['staff_musictype'];?></td>
      <td><?php echo $row['staff_password'];?></td>
      <td><?php echo $row['district_name'];?></td>
      <td><?php echo $row['place_name'];?></td>
      <td><a href="verification.php?accid=<?php echo $row ['staff_id'] ?>"class="btn btn-success">Accept</a></td?
    </tr>
	<?php
	}
	?>
    </table>
</form>
</div>
<?php
ob_flush();
include('Foot.php');
?>
</html>
