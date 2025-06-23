<?php
include("../Assets/Connections/Connection.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../ASSETS/phpMail/src/Exception.php';
require '../ASSETS/phpMail/src/PHPMailer.php';
require '../ASSETS/phpMail/src/SMTP.php';

if (isset($_POST['btnsub']))
 {
    $email = $_POST['email'];
    $_SESSION['mail']=$email;
    
    $st = "SELECT * FROM tbl_user WHERE user_email='" . $email . "'";
    $resst = $con->query($st);
  
    if ($resst->num_rows > 0)
     {
      
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'melolink06@gmail.com'; // Your Gmail
        $mail->Password = 'tehlvrnxjgknckte'; // Your Gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('melolink06@gmail.com'); // Your Gmail
  
            $mail->addAddress($email);
      

        $mail->isHTML(true);

        $mail->Subject = "Reset password";
        $mail->Body = "Here is your OTP for password reset: <br>" . $otp;
        if ($mail->send()) {
            header('Location: Reset.php');
            exit;
        } else {
            echo "Failed to send email.";
        }
     
    } 
     
    



$dr = "SELECT * FROM tbl_staff WHERE staff_email='" . $email . "'";
$resdr = $con->query($dr);
if ($resdr->num_rows > 0) 
 {
   
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'melolink06@gmail.com'; // Your Gmail
        $mail->Password = 'tehlvrnxjgknckte'; // Your Gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('melolink06@gmail.com'); // Your Gmail
  
            $mail->addAddress($email);
      

        $mail->isHTML(true);

        $mail->Subject = "Reset password";
        $mail->Body = "Here is your OTP for password reset: <br>" . $otp;
        if ($mail->send()) {
            header('Location: Reset.php');
            exit;
        } else {
            echo "Failed to send email.";
        }
    } else   echo "Email doesn't exist in any table.";
       
}   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container">
        <h1 class="mt-5">Forgot Password</h1>
        <form method="post" action="" class="mt-4">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <button type="submit" name="btnsub" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Add the Bootstrap JS and Popper.js scripts if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

