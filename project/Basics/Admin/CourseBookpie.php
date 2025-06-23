<?php

include("../Assets/Connections/Connection.php");


?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<div id="tab" align="center">
<canvas id="myChart" style="width:50%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_type";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["type_name"]."',";
      
  }

?>
];

var yValues = [
  <?php
$sel = "SELECT * FROM tbl_type";
$row = $con->query($sel);

if ($row) {
    while ($data = $row->fetch_assoc()) {
        $typeId = $data["type_id"];
        $sel1 = "SELECT COUNT(cb.classbooking_id) as id FROM tbl_classbooking cb
                 INNER JOIN tbl_user u ON u.user_id = cb.user_id
                 INNER JOIN tbl_class cs ON cb.class_id = cs.class_id
                 INNER JOIN tbl_course c ON cs.course_id = c.course_id
                 INNER JOIN tbl_type t ON t.type_id = c.musictype_id
                 WHERE c.musictype_id = $typeId";

        $row1 = $con->query($sel1);

        if ($row1) {
            while ($data1 = $row1->fetch_assoc()) {
                echo $data1["id"] . ",";
            }
        }
    }
} else {
    echo "Error in the first query: " . $con->error;
}
?>

];



var barColors = [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                'rgb (255, 0, 255)',
                'rgb(0, 255, 0)',
                'rgb(255, 0, 255)',
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "All course booking"
    }
  }
});
</script>

</div>
</body>
</html>
