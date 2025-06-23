<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your custom CSS styles here */

        .contain {
            background-color: #f8f9fa; /* Light gray background */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border: 1px solid #dee2e6;
            margin-bottom: 20px;
        }

        .table td {
            padding: 15px;
        }

        .form-control {
            width: 100%;
            padding: 15px;
        }

        select.form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 8px;
            background-color: #f8f9fa; /* Light gray background */
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        select.form-control:focus {
            border-color: #007bff; /* Focus color */
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Focus shadow */
        }

        .thumbnail {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px; /* Adjust the padding */
            text-align: center;
        }

        .thumbnail img {
            width: 100%;
            height: 150px; /* Set a fixed height for all photos */
            object-fit: cover; /* Ensure photos maintain their aspect ratio */
        }

        .caption {
            text-align: center;
            padding: 10px;
        }

        .caption h5 {
            font-size: 16px; /* Adjust the font size */
            margin-bottom: 5px; /* Add margin for spacing */
        }

        .caption p {
            font-size: 14px; /* Adjust the font size */
            margin-bottom: 5px; /* Add margin for spacing */
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

<div class="contain">
    <form id="form1" name="form1" method="post" action="">
        <div class="text-center">
            <table class="table table-bordered table-condensed">
                <tr>
                    <td> Music Type</td>
                    <td>
                        <label for="sel_type"></label>
                        <select class="form-control" name="sel_type" id="sel_type" onChange="getStaff(this.value)">
                            <option value="">--Select--</option>
                            <?php
                            $type = "SELECT * FROM tbl_type";
                            $restype = $con->query($type);
                            while ($rowcat = $restype->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $rowcat["type_id"] ?>"><?php echo $rowcat["type_name"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <div id="staffphoto" class="row">
        
            <?php
            $selQry = "SELECT * FROM tbl_staff s INNER JOIN tbl_type t ON t.type_id = s.staff_musictype";
            $res = $con->query($selQry);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                $i++;
            ?>
               <div class="col-md-2">
    <div class="thumbnail">
        <img src="../Assets/Files/StaffPhoto/<?php echo $row['staff_photo']; ?>" alt="<?php echo $row['staff_name']; ?>" class="img-fluid">
        <div class="caption">
            <h5><?php echo $row['staff_name']; ?></h5>
            <p><?php echo $row['staff_email']; ?></p>
            <p><?php echo $row['staff_contact']; ?></p>
            <p>
                <a href="ViewCourse.php?vid=<?php echo $row['staff_id'] ?>" class="btn btn-primary">View More Course</a>
            </p>
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
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

<script>
    function getStaff(did) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxSearchStaff.php?tid=" + did,
            success: function (html) {
                $("#staffphoto").html(html);
            }
        });
    }
</script>

<?php
include('Foot.php');
?>
</html>