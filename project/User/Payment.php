<?php
session_start();
include("../Assets/Connections/Connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <a href="UserHomePage.php">Home</a> -->
    <meta charset="UTF-8">
    <title>Payment Gateway</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Baloo+Bhaijaan|Ubuntu');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Ubuntu', sans-serif;
        }

        body {
            background: #2196F3;
            margin: 0 10px;
        }

        .payment {
            background: #f8f8f8;
            max-width: 360px;
            margin: 80px auto;
            height: auto;
            padding: 35px;
            padding-top: 70px;
            border-radius: 5px;
            position: relative;
        }

        .payment h2 {
            text-align: center;
            letter-spacing: 2px;
            margin-bottom: 40px;
            color: #0d3c61;
        }

        .form .label {
            display: block;
            color: #555555;
            margin-bottom: 6px;
        }

        .input {
            padding: 13px 0px 13px 25px;
            width: 100%;
            text-align: center;
            border: 2px solid #dddddd;
            border-radius: 5px;
            letter-spacing: 1px;
            word-spacing: 3px;
            outline: none;
            font-size: 16px;
            color: #555555;
        }

        .card-grp {
            display: flex;
            justify-content: space-between;
        }

        .card-item {
            width: 48%;
        }

        .space {
            margin-bottom: 20px;
        }

        .icon-relative {
            position: relative;
        }

        .icon-relative .fas,
        .icon-relative .far {
            position: absolute;
            bottom: 12px;
            left: 15px;
            font-size: 20px;
            color: #555555;
        }

        .btn {
            margin-top: 40px;
            background: #2196F3;
            padding: 12px;
            text-align: center;
            color: #f8f8f8;
            border-radius: 5px;
            cursor: pointer;
        }


        .payment-logo {
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 100px;
            background: #f8f8f8;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            text-align: center;
            line-height: 85px;
        }

        .payment-logo:before {
            content: "";
            position: absolute;
            top: 5px;
            left: 5px;
            width: 90px;
            height: 90px;
            background: #2196F3;
            border-radius: 50%;
        }

        .payment-logo p {
            position: relative;
            color: #f8f8f8;
            font-family: 'Baloo Bhaijaan', cursive;
            font-size: 58px;
        }

        input[type=submit] {
            background-color: #2196F3;
            border: none;
            color: #f8f8f8;
            font-size: 16px;
        }

        @media screen and (max-width: 420px) {
            .card-grp {
                flex-direction: column;
            }

            .card-item {
                width: 100%;
                margin-bottom: 20px;
            }

            .btn {
                margin-top: 20px;
            }
        }
    </style>
</head>
<?php

if (isset($_POST["btnpay"])) {

    $userid = $_SESSION["uid"];

    $selqry = "select max(classbooking_id) as id from tbl_classbooking where user_id = $userid";
    
    $result = $con->query($selqry);
    if ($row3 = $result->fetch_assoc()) {
        $upQry = "UPDATE tbl_classbooking SET payment_status = 1, booking_status = 1,payment_date= curdate() WHERE classbooking_id = " . $row3['id'];
        if ($con->query($upQry)) {
            ?>
            <script>
                alert('Payment Completed')
               
                setTimeout(function () { window.location.href = "MyBooking.php" }, 100);
            </script>

            <?php
        }

    } else {
        ?>
        <script>
            alert('Payment Failed')
        </script>
        <?php
    }
}

?>

<body>
    <!-- partial:index.partial.html -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">

    <div class="wrapper">
        <div class="payment">
            <div class="payment-logo">
                <p>p</p>
            </div>
            <h2>Payment Gateway</h2>
            <div class="form">

                <form method="post">
                    <div class="card space icon-relative">
                        <label class="label">Card holder:</label>
                        <input type="text" class="input" placeholder="Card Holder" required>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card space icon-relative">
                        <label class="label">Card number:</label>
                        <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number"
                            required>
                        <i class="far fa-credit-card"></i>
                    </div>
                    <div class="card-grp space">
                        <div class="card-item icon-relative">
                            <label class="label">Expiry date:</label>
                            <input type="text" name="expiry-data" class="input" data-mask="00 / 00"
                                placeholder="00 / 00" required>
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="card-item icon-relative">
                            <label class="label">CVV:</label>
                            <input type="text" class="input" data-mask="000" placeholder="000" required>
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <div class="btn">
                        <input type="submit" name="btnpay" id="btnpay" value="Pay">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script>
    <script src="./script.js"></script>

</body>

</html>