<?php
ob_start();
include('Head.php');
include("../Assets/Connections/Connection.php");
?><!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  
<form id="form1" name="form1" method="post" action="">

  <div class="container">
    <h2>Open Complaints</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
      <th>Sl No</td>
      <th>Complaint Title</td>
      <th>Complaint Content</td>
      <th>Staff Name</td>
      <th>Action</td>
      </tr>
        </thead>
        <tbody>
    <?php
              $select="select * from tbl_complaints c  inner join tbl_staff s on c.staff_id=s.staff_id where cmp_status=0";
              $res=$con->query($select);
              $i=0;
              while($row=$res->fetch_assoc())
              {
                           $i++;
   ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['cmp_title']; ?></td>
      <td><?php echo $row['cmp_content']; ?></td>
      <td><?php echo $row['staff_name']  ?></td>
      
      <td><a href="StaffReply.php?rid=<?php echo $row ['cmp_id'] ?>"class="btn btn-primary">Reply</a>
    </tr>
              <?php
              }
              ?>
               </tbody>
    </table>
</div>
  <div class="container">
    <h2>Closed Complaints</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
      <th>Sl No</td>
      <th>Complaint Title</td>
      <th> Complaint Content</td>
      <th> Staff Name</td>
       <th>Reply</td>
    </tr>
    <?php
              $select="select * from tbl_complaints c  inner join tbl_staff s on c.staff_id=s.staff_id where cmp_status=1";
              $res=$con->query($select);
              $i=0;
              while($row=$res->fetch_assoc())
              {
                           $i++;
                           ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['cmp_title']; ?></td>
      <td><?php echo $row['cmp_content']; ?></td>
      <td><?php echo $row['staff_name']; ?></td>
      <td><?php echo $row['cmp_reply']; ?></td>
    </tr>
              <?php
              }
              ?>
     </tr>          
    </tbody>
    </table>
</div>

</body>
</html>
    <?php
ob_flush();
include('Foot.php');
?>
