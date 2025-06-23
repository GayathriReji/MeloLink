<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");

if (isset($_GET['did'])) {
    $delQry = "DELETE FROM tbl_material WHERE material_id=" . $_GET['did'];
    if ($con->query($delQry)) {
        ?>
        <script>
            alert('Deleted');
            window.location = "Material.php";
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
if (isset($_POST["btnsave"])) {
    $name = $_POST["txtname"];
    $courseid = $_GET["cid"];
    $material = $_FILES["file_material"]["name"];
    $temp1 = $_FILES["file_material"]["tmp_name"];
    move_uploaded_file($temp1, "../Assets/Files/StaffMaterial/" . $material);
    $insQry = "INSERT INTO tbl_material (material_file, course_id, staff_id, material_name) 
               VALUES ('" . $material . "', '" . $_GET["cid"] . "', '" . $_SESSION["sid"] . "', '" . $name . "')";
    if ($con->query($insQry)) {
        $message = "Record Inserted...";
    } else {
        $message = "Insertion Failed...";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Material</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <table class="table" border=1 align="center">
                            <tr>
                                <td><label for="file_material">Material</label></td>
                                <td><input type="file" class="form-control" name="file_material" id="file_material" required></td>
                            </tr>
                            <tr>
                                <td><label for="txtname">Material Name</label></td>
                                <td><input type="text" class="form-control" name="txtname" id="txtname" required></td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" name="btnsave" id="btnsave">Submit</button>
                            <button type="reset" class="btn btn-secondary" name="btncancel" id="btncancel">Cancel</button>
                        </div>
                    </div>
                </form>
                <?php echo $message; ?>
                <br><br>
            </div>
        </div>

        <!-- List of Materials Table -->
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" align="center">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = "SELECT * FROM tbl_material";
                        $res = $con->query($select);
                        $i = 0;
                        while ($row = $res->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['material_name']; ?></td>
                                <td>
                                    <a href="Material.php?did=<?php echo $row['material_id']; ?>" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

<?php
ob_flush();
include('Foot.php');
?>
</html>
