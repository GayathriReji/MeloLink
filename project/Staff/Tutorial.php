Copy code
<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");

// Session start should be at the beginning
// session_start();

$message = "";

// Security: Validate and sanitize input
if (isset($_GET['did']) && is_numeric($_GET['did'])) {
    $delQry = "DELETE FROM tbl_tutorial WHERE tutorial_id = " . $_GET['did'];
    if ($con->query($delQry)) {
        echo '<script>alert("Deleted"); window.location="Tutorial.php"; </script>';
    } else {
        echo '<script>alert("Failed"); </script>';
    }
}

// Security: Validate and sanitize input
if (isset($_POST["btnsave"]) && isset($_FILES["file_video"]) && isset($_GET['cid'])) {
    $video = $_FILES["file_video"]["name"];
    $temp1 = $_FILES["file_video"]["tmp_name"];

    // Security: Validate file type and size
    $allowedTypes = ['video/mp4', 'video/webm', 'video/ogg'];
    $maxFileSize = 10 * 1024 * 1024; // 10 MB

    if (in_array($_FILES["file_video"]["type"], $allowedTypes) && $_FILES["file_video"]["size"] <= $maxFileSize) {
        move_uploaded_file($temp1, "../Assets/Files/StaffTutorial/" . $video);

        $insQry = "INSERT INTO tbl_tutorial(tutorial_video, course_id, staff_id) VALUES ('$video', '" . $_GET["cid"] . "', '" . $_SESSION["sid"] . "')";

        if ($con->query($insQry)) {
            $message = "Record Inserted...";
        } else {
            $message = "Insertion Failed... " . $con->error; // Check for query error
        }
    } else {
        $message = "Invalid file type or size. Allowed types: " . implode(", ", $allowedTypes) . ". Maximum size: " . ($maxFileSize / (1024 * 1024)) . " MB.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Music Class</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
                    <table class="table" border=1 align="center">
                        <tr>
                            <td>
                                <label for="file_video">Video</label>
                            </td>
                            <td> <input type="file" class="form-control-file" name="file_video" id="file_video" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"> <button type="submit" name="btnsave" id="btnsave" class="btn btn-primary">Submit</button>
                                <button type="reset" name="btncancel" id="btncancel" class="btn btn-secondary">Cancel</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
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
                        $select = "SELECT * FROM tbl_tutorial";
                        $res = $con->query($select);
                        $i = 0;
                        while ($row = $res->fetch_assoc()) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['tutorial_video']; ?></td>
                                <td><a href="Tutorial.php?did=<?php echo $row['tutorial_id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
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
