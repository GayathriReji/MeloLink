<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");
$replyid=0;


if(isset($_POST['btnsave']))
{
    $reply=$_POST['txtreply'];
     $upQry="update tbl_complaints set cmp_reply='".$reply."',cmp_status=1 where cmp_id=".$_GET['cid'];
			if($con->query($upQry))
			{
				echo"updated";
        header("location:ViewComplaint.php");
   }
}?>
   <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- You need to include the Bootstrap CSS file here -->
  <title>Bootstrap Form</title>
</head>
<body>

<div class="container mt-5">
  <form id="form1" name="form1" method="post" action="">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="form-group">
        <table class="table table-bordered">
          <tr><td>
          <label for="txtreply">Reply Content</label>
          <input type="text" class="form-control" name="txtreply" id="txtreply" /></td></tr>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
      <tr>
                    <td colspan="2" align="center">
        <button type="submit" class="btn btn-primary" name="btnsave" id="btnsave">Submit</button></td></tr>
      </div>
    </div>
</table>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- You need to include the Bootstrap JavaScript file here -->
</body>
</html>

<?php
ob_flush();
include('Foot.php');
?>

