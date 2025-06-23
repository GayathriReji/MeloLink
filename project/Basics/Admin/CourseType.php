<?php
ob_start();
include('Head.php');

$ctypename = "";
$ctypeid = 0;
include("../Assets/Connections/Connection.php");

// Delete record
if (isset($_GET['did'])) 
{
    $delQry = "DELETE FROM tbl_coursetype WHERE coursetype_id=" . $_GET['did'];
    if ($con->query($delQry)) 
    {
        ?>
        <script>
            alert('Deleted');
            window.location="CourseType.php";
        </script>
        <?php
    } else
    {
        ?>
        <script>
            alert('Failed');
        </script>
        <?php
    }
}

$message = "";

// Insert or Update record
if (isset($_POST["btnsave"])) 
{
    $ctypename = $_POST["txtname"];
    $ctypeid = $_POST["txtid"];

    if ($ctypeid == 0) 
      {
        $insQry = "INSERT INTO tbl_coursetype (coursetype_name) VALUES ('" . $ctypename . "')";
        if ($con->query($insQry)) 
        {

        ?>
        <script>
            alert('Inserted'); // Changed 'Deleted' to 'Inserted'
            window.location="CourseType.php"
        </script>
        <?php
        } else
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
        $upQry = "UPDATE tbl_coursetype SET coursetype_name='" . $ctypename . "' WHERE coursetype_id=" . $ctypeid;
        if ($con->query($upQry)) {
            ?>
            <script>
                alert('Updated');
                window.location="CourseType.php";
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
// Fetch record for editing
if (isset($_GET['eid'])) {
    $SelQry = "SELECT * FROM tbl_coursetype WHERE coursetype_id=" . $_GET['eid'];
    $resEdit = $con->query($SelQry);
    $rowEdit = $resEdit->fetch_assoc();
    $ctypeid = $rowEdit['coursetype_id'];
    $ctypename = $rowEdit['coursetype_name'];
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Your Page Title</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form id="form1" name="form1" method="post" action="">
            <input type="hidden" name="txtid" value="<?php echo $ctypeid ?>">
            <table class="table" border=1>
                <tr>
                    <td>Course Type</td>
                    <td>
                        <input type="text" name="txtname" id="txtname" value="<?php echo $ctypename ?>" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnsave" id="btnsave" value="Submit" class="btn btn-primary">
                        <input type="reset" name="btncancel" id="btncancel" value="Cancel" class="btn btn-secondary">
                    </td>
                </tr>
            </table>
            <?php echo $message ?>
        </form>

        <table class="table" border=1>
            <tr>
                <th>Sl No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <?php
            $select = "SELECT * FROM tbl_coursetype";
            $res = $con->query($select);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['coursetype_name']; ?></td>
                    <td>
                        <a href="CourseType.php?did=<?php echo $row['coursetype_id'] ?>" class="btn btn-danger">Delete</a>
                        <a href="CourseType.php?eid=<?php echo $row['coursetype_id'] ?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <!-- Include Bootstrap JS (optional, for components that require JavaScript) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php
ob_flush();
include('Foot.php');
?>
</html>
