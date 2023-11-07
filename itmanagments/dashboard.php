<?php
session_start();
include 'dbconnect.php'; 
$sql = "SELECT label, value FROM dashboard_data";
$result = $con->query($sql);
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close the database connection
$con->close();
?>
<html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Dashboard</h1>
    <div style="width: 800px; margin: 0 auto;">
        <canvas id="barChart"></canvas>
    </div>

    <script>
        // Example data for chart
        var labels = [];
        var values = [];

        <?php
        foreach ($data as $item) {
            echo "labels.push('".$item['label']."');";
            echo "values.push('".$item['value']."');";
        }
        ?>

        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Data from DB',
                    data: values,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>