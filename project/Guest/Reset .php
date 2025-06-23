<?php include("../ASSETS/connections/Connection.php");
session_start();
if (isset($_POST['btnsub'])) {
    if ($_POST['otptext'] == $_SESSION['otp']) {
        header('location: ResetPass.php');
        exit; // Add an exit statement to stop further script execution
    } else {
        echo "Incorrect OTP";
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>OTP Input Field</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="otp">Enter OTP:</label>
                        <input type="text" name="otptext" class="form-control" id="otp" maxlength="6" pattern="\d{6}" title="Please enter a 6-digit OTP" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="btnsub" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
