<?php
include("includes/compteurVisite.php");
?>
<div>
    <canvas id="myChart"></canvas>
</div>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    let visitsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
                label: 'Nombre de visites',
                data: <?php echo json_encode($visits); ?>,
                backgroundColor: '#fff',
                borderColor: '#e60000',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>