<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

$msg = "";
ob_start();
include("Head.php");
include("../Assets/Connections/Connection.php");

if (isset($_POST["btnsave"])) {
    $name = $_POST["txtname"];
    $district = $_POST["sel_district"];
    $place = $_POST["sel_place"];
    $contact = $_POST["txtcontact"];
    $email = $_POST["txtemail"];
    $gender = $_POST["gender"]; // Corrected to use "gender" instead of "btngender"
    $address = $_POST["txtaddress"];
    $password = $_POST["txtpassword"];
    $cpassword = $_POST["txtcpassword"];
    $photo = $_FILES["file_photo"]["name"];
    $temp1 = $_FILES["file_photo"]["tmp_name"];
    move_uploaded_file($temp1, "../Assets/Files/UserPhoto/" . $photo);
    $proof = $_FILES["file_proof"]["name"];
    $temp2 = $_FILES["file_proof"]["tmp_name"];
    move_uploaded_file($temp2, "../Assets/Files/UserProof/" . $proof);

    $sel = "select * from tbl_user where user_email='" . $email . "'";
    $r = $con->query($sel);

    if ($row = $r->fetch_assoc()) {
        $upQry = "update tbl_user set user_status=1 where user_status=0";
        $con->query($upQry);
        ?>
        <script>
            alert("Account already exists for this email");
            window.location = "NewUser.php";
        </script>
        <?php
    }  else {
    if ($password == $cpassword) {
        $insQry = "insert into tbl_user(user_name,place_id,user_email,user_gender,user_address,user_contact,user_password,user_confirmpswd,user_photo,user_proof,user_doj)values('" . $name . "','" . $place . "','" . $email . "','" . $gender . "','" . $address . "','" . $contact . "','" . $password . "','" . $cpassword . "','" . $photo . "','" . $proof . "',curdate())";
        if ($con->query($insQry)) {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'melolink06@gmail.com';
            $mail->Password = 'tehlvrnxjgknckte';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('melolink06@gmail.com');
            $mail->addAddress($email);

            $mail->isHTML(true);

            $mail->Subject = "Welcome to MeloLink Online Music Class";
            $mail->Body = "Hello ";

            if ($mail->send()) {
                echo "Sent";
            } else {
                echo "Failed";
            }
            ?>
            <script>
            $msg = "User Registered Successfully";
            </script>
            <?php
        } else {
            echo $insQry;
        }
    } else {
        ?>
        <script>
            alert("Enter the password correctly");
        </script>
        <?php
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      margin-top: 50px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
      <div class="form-group">
        <label for="txtname">Name</label>
        <input type="text" class="form-control" name="txtname" id="txtname" required>
      </div>

      <div class="form-group">
        <label for="sel_district">District</label>
        <select class="form-control" name="sel_district" id="sel_district" onChange="getPlace(this.value)">
          <option value="">---select---</option>
          <?php
            $selplace = "select * from  tbl_district";
            $resplace = $con->query($selplace);
            while ($rowcat = $resplace->fetch_assoc()) {
          ?>
            <option value="<?php echo $rowcat["district_id"] ?>"><?php echo $rowcat["district_name"] ?></option>
          <?php
            }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="sel_place">Place</label>
        <select class="form-control" name="sel_place" id="sel_place">
          <option value="">--select--</option>
        </select>
      </div>

      <div class="form-group">
        <label for="txtemail">Email</label>
        <input type="email" class="form-control" name="txtemail" id="txtemail" required/>
      </div>

      <div class="form-group">
    <label for="txtpassword">Password</label>
    <input type="password" class="form-control" name="txtpassword" id="txtpassword" required oninput="validatePassword()">
    <small id="passwordHelp" class="form-text text-muted">Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one number.</small>
</div>
<div class="form-group">
        <label for="txtcpassword">Confirm Password</label>
        <input type="password" class="form-control" name="txtcpassword" id="txtcpassword" required />
      </div>


      <div class="form-group">
        <label>Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male">
          <label class="form-check-label" for="genderMale">Male</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female">
          <label class="form-check-label" for="genderFemale">Female</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="genderOthers" value="Others">
          <label class="form-check-label" for="genderOthers">Others</label>
        </div>
      </div>
      <div class="form-group">
    <label for="txtaddress">Address</label>
    <textarea class="form-control" name="txtaddress" id="txtaddress" rows="5" required></textarea>
</div>


      <div class="form-group">
        <label for="txtcontact">Contact</label>
        <input type="text" class="form-control" name="txtcontact" id="txtcontact" pattern="[0-9]{10}">
      </div>

      <div class="form-group">
    <label for="file_photo">Photo</label>
    <input type="file" class="form-control-file" name="file_photo" id="file_photo" required>
</div>

<div class="form-group">
    <label for="file_proof">Proof</label>
    <input type="file" class="form-control-file" name="file_proof" id="file_proof" required>
</div>

      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="btnsave" id="btnsave" value="Register">
        <input type="reset" class="btn btn-secondary" name="btncancel" id="btncancel" value="Cancel">
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../Assets/JQ/jQuery.js"></script>
  <script>
    function getPlace(did) {
      $.ajax({
        url: "../Assets/AjaxPages/AjaxPlace.php?pid=" + did,
        success: function (html) {
          $("#sel_place").html(html);
        }
      });
    }
  
    function validatePassword() {
      var password = document.getElementById("txtpassword").value;
      var passwordHelp = document.getElementById("passwordHelp");
      var confirm_password = document.getElementById("txtcpassword").value;

      // Define the criteria for a valid password
      var minLength = 8;
      var uppercaseRegex = /[A-Z]/;
      var lowercaseRegex = /[a-z]/;
      var numberRegex = /[0-9]/;

      // Perform validation
      var isValid = true;

      if (password.length < minLength) {
        isValid = false;
        passwordHelp.innerHTML = "Password must be at least 8 characters long.";
      } else if (!uppercaseRegex.test(password)) {
        isValid = false;
        passwordHelp.innerHTML = "Password must include at least one uppercase letter.";
      } else if (!lowercaseRegex.test(password)) {
        isValid = false;
        passwordHelp.innerHTML = "Password must include at least one lowercase letter.";
      } else if (!numberRegex.test(password)) {
        isValid = false;
        passwordHelp.innerHTML = "Password must include at least one number.";
      } else {
        passwordHelp.innerHTML = "Password is valid.";
      }

      // Check if the passwords match
      if (confirm_password !== password) {
        isValid = false;
        passwordHelp.innerHTML = "Passwords do not match.";
      }

      return isValid;
    }
  </script>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>
