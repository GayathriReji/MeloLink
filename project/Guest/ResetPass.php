<?php
include("../ASSETS/connections/Connection.php");
session_start();

if (isset($_POST['change'])) {
    if ($_POST['newPassword'] == $_POST['confirmPassword']) {
        $k = "select * from tbl_user where user_email='" . $_SESSION['mail'] . "'";
        $r1 = $conn->query($k);
        
        if ($r1->num_rows > 0) {
            $up1 = "update tbl_user set user_password='" . $_POST['confirmPassword'] . "' where user_email='" . $_SESSION['mail'] . "'";
            $conn->query($up1);
        } else {
            $k1 = "select * from tbl_staff where staff_email='" . $_SESSION['mail'] . "'";
            $r2 = $conn->query($k1);
            $row2 = $r2->fetch_assoc();
            
            if ($r2->num_rows > 0) {
                $up2 = "update tbl_staff set staff_password='" . $_POST['confirmPassword'] . "' where staff_email='" . $_SESSION['mail'] . "'";
                $conn->query($up2);
            }
        }
        ?>
        <script>
            alert("Password Updated");
        </script>
        <?php
        header("location:../Guest/login.php");
    } else {
        echo "Passwords don't match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Change Password</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="newPassword">Enter New Password:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password:</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <input type="submit"  name="change" class="btn btn-primary" value="Change Password">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
