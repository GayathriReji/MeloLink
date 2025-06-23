<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");

if (isset($_GET['did'])) {
    $delQry = "DELETE FROM tbl_complaints WHERE cmp_id=" . $_GET['did'];
    if ($con->query($delQry)) {
?>
        <script>
            alert('Deleted');
            window.location = "Complaint.php";
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

$message = "";
$cmptitle = "";
$cmpcontent = "";
$cid = "";
$cmpdate = "";

if (isset($_POST["btnsave"])) {
    $cmptitle = $_POST["txttitle"];
    $cmpcontent = $_POST["txtcontent"];
    $cmp_id = $_POST["txtid"];

    if ($cmp_id != "") {
        // Escape user inputs to prevent SQL injection
        $cmptitle = $con->real_escape_string($cmptitle);
        $cmpcontent = $con->real_escape_string($cmpcontent);

        $upQry = "UPDATE tbl_complaints SET cmp_title='" . $cmptitle . "', cmp_content='" . $cmpcontent . "', cmp_date=CURDATE() WHERE cmp_id=" . $cmp_id;
        if ($con->query($upQry)) {
?>
            <script>
                alert('Updated');
                window.location = "Complaint.php";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Failed');
            </script>
        <?php
        }
    } else {
        $insQry = "INSERT INTO tbl_complaints(cmp_title, cmp_content, cmp_date, user_id) VALUES('" . $cmptitle . "','" . $cmpcontent . "',CURDATE(),'" . $_SESSION["uid"] . "')";
        if ($con->query($insQry)) {
            ?>
            <script>
            alert('Inserted');
            window.location = "Complaint.php";
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
if (isset($_GET['eid'])) {
    $SelQry = "SELECT * FROM tbl_complaints WHERE cmp_id=" . $_GET['eid'];
    $resEdit = $con->query($SelQry);
    $rowEdit = $resEdit->fetch_assoc();
    $cid = $rowEdit['cmp_id'];
    $cmptitle = $rowEdit['cmp_title'];
    $cmpcontent = $rowEdit['cmp_content'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Complaints</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form id="form1" name="form1" method="post" action="">
            <input type="hidden" name="txtid" value="<?php echo $cid ?>">
            <h2 class="text-center">Complaints</h2>
            <div class="form-group">
                <label for="txttitle">Complaint Title</label>
                <input type="text" class="form-control" name="txttitle" id="txttitle" value="<?php echo $cmptitle ?>">
            </div>
            <div class="form-group">
                <label for="txtcontent">Complaint Content</label>
                <textarea class="form-control" name="txtcontent" id="txtcontent" rows="5" required><?php echo $cmpcontent ?></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="btnsave" id="btnsave">Submit</button>
            </div>
        </form>
<br><br>
        <form id="form2" name="form2" method="post" action="">
            <h2 class="text-center">Complaint List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl no.</th>
                        <th>Complaint Title</th>
                        <th>Complaint Content</th>
                        <th>Complaint Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select = "SELECT * FROM tbl_complaints WHERE user_id=" . $_SESSION['uid'];
                    $res = $con->query($select);
                    $i = 0;
                    while ($row = $res->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['cmp_title']; ?></td>
                            <td><?php echo $row['cmp_content']; ?></td>
                            <td><?php echo $row['cmp_date']; ?></td>
                            <td>
                                <a href="Complaint.php?did=<?php echo $row['cmp_id']; ?>" class="btn btn-danger">Delete</a>
                                <a href="Complaint.php?eid=<?php echo $row['cmp_id']; ?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<?php
ob_flush();
include('Foot.php');
?>

</html>
