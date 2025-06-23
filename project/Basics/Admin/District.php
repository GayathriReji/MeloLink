<?php
ob_start();
include('Head.php');
$districtname="";
$districtid=0;
include("../Assets/Connections/Connection.php");
if(isset($_GET['did']))
{
              $delQry="delete from tbl_district where district_id=".$_GET['did'];
              if($con->query($delQry))
              {
                           ?>
         <script>
                           alert('Deleted')
                           </script>
         <?php
              }
              else {
                           ?>
         <script>
                           alert('Failed')
                           </script>
         <?php
              }
}
$message="";
if(isset($_POST["btnsave"]))
{
              $districtname=$_POST["txtdist"];
              $district_id=$_POST['txtid'];
              if($district_id==0)
              {
                $insQry="insert into tbl_district(district_name)values('".$districtname."')";
                if($con->query($insQry))
                {
                             $message="Reacord Inserted...";
                }
                else
                {
                             $message="Insertion Failed...";
                }
              }
              else
              {
                           $upQry="update tbl_district set district_name='".$districtname."' where district_id=".$district_id;
                           if($con->query($upQry))
                           {
                           ?>
                           <script>
                           alert('Updated')
                           </script>
                           <?php
                           }
                           else
                           {
                                         ?>
                           <script>
                           alert('Failed')
                           </script>
                           <?php
                           }
              }
}
if(isset($_GET['eid']))
{
$SelQry="select * from tbl_district where district_id=".$_GET['eid'];
$resEdit=$con->query($SelQry);
$rowEdit=$resEdit->fetch_assoc();
$districtid=$rowEdit['district_id'];
$districtname=$rowEdit['district_name'];
}
?>
 
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<title>District</title>
</head>
 

<body>
    <form id="form1" name="form1" method="post" action="">
        <input type="hidden" name="txtid" value="<?php echo $districtid ?>">
        <div class="container">
       
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <table class="table" border=1 align="center">
                      <tr>
                      <td>
                        <label for="txtdist">District Name</label></td>
                      <td>  <input type="text" name="txtdist" id="txtdist" class="form-control" value="<?php echo $districtname ?>" required>
</td> </tr></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" align="center">
                  <tr >
                  <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Submit" class="btn btn-primary">
                    <input type="reset" name="btncancel" id="btncancel" value="Cancel" class="btn btn-secondary">
</td> </div>
            </div>
        </div>
        <?php echo $message ?>
        <tr>
        </table>
    </form>
<br><br>
    <form id="form2" name="form2" method="post" action="">
        <div class="container">
            <table class="table" border=1 align="center">
                <thead>
                    <tr>
                        <th>Sl no.</th>
                        <th>District Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select = "select * from tbl_district";
                    $res = $con->query($select);
                    $i = 0;
                    while ($row = $res->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['district_name']; ?></td>
                            <td>
                                <a href="District.php?did=<?php echo $row['district_id'] ?>" class="btn btn-danger">Delete</a>
                                <a href="District.php?eid=<?php echo $row['district_id'] ?>" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php
ob_flush();
include('Foot.php');
?>