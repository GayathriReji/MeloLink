<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div style="width:100%;max-width:600px">
    <canvas id="performanceChart"></canvas>
</div>

<?php
// Your database connection code
include("../Assets/Connections/Connection.php");

// Fetch data from the database
$labels = [];
$data = [];

$sel = "SELECT * FROM tbl_staff";
$row = $con->query($sel);

while ($type = $row->fetch_assoc()) {
    $labels[] = $type["staff_name"];

    $sel1 = "SELECT COUNT(classbooking_id) as id FROM tbl_classbooking cb  
            INNER JOIN tbl_user u ON u.user_id = cb.user_id 
            INNER JOIN tbl_class cs ON cb.class_id = cs.class_id 
            INNER JOIN tbl_course c ON cs.course_id = c.course_id 
            INNER JOIN tbl_staff s ON s.staff_id = c.staff_id 
            WHERE c.staff_id = '{$type["staff_id"]}'";
    
    $row1 = $con->query($sel1);
    $data[] = $row1->fetch_assoc()["id"];
}
?>

<script>
   var ctx = document.getElementById('performanceChart').getContext('2d');
var performanceChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1,
            data: <?php echo json_encode($data); ?>
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Class Bookings'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Staff Name'
                }
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});

</script>

</body>
</html>
