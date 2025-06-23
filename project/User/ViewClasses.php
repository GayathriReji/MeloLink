<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");
if(isset($_GET["rid"])){
    $insQry = "insert into tbl_classbooking(class_id,user_id,booking_status,booking_date)values('" . $_GET["rid"] . "','" . $_SESSION["uid"] . "',1,curdate())";
		if ($con->query($insQry)) {
          

			
			?>
			<script>
				alert('Booked successfully')
                window.location="Payment.php";


			</script>
			<?php
		}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course Booking</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
    <div class="container">
        <div class="row">
            <?php
            $selQry = "select * from tbl_class where course_id=" . $_GET['cid'];
            $res = $con->query($selQry);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                $i++;
            ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['class_data']; ?></h5>
                            <!-- <p class="card-text">
                                <?php echo $row['class_fromtime']; ?> - <?php echo $row['class_totime']; ?>
                            </p> -->
                            <a href="ViewClasses.php?rid=<?php echo $row['class_id']; ?>&cid=<?php echo $_GET['cid']?>" class="btn btn-primary">Book Now</a>
                            <!-- <a href="ConfirmPayment.php?bid=<?php echo $row['class_id']; ?>" class="btn btn-success">Pay Now</a> -->
                        </div>
                    </div>
                </div>
            <?php
                if ($i == 4) {
                    echo "</div><div class='row'>";
                    $i = 0;
                }
            }
            ?>
        </div>
    </div>

</form>
<?php
ob_flush();
include('Foot.php');
?>
</body>
</html>