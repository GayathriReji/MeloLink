<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");
$replyid=0;

if(isset($_POST['btnsave']))
{
    $reply=$_POST['txtreply'];
    $upQry="update tbl_complaints set cmp_reply='".$reply."',cmp_status=1 where cmp_id=".$_GET['rid'];
    if($con->query($upQry))
    {
        echo "updated";
        header("location:ViewStaffComplaint.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Add the Bootstrap CSS link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <form id="form1" name="form1" method="post" action="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtreply">Reply Content</label>
                        <input type="text" class="form-control" name="txtreply" id="txtreply" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="btnsave" id="btnsave" value="Submit" />
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Add the Bootstrap JS and Popper.js scripts (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php
ob_flush();
include('Foot.php');
?>
</html>