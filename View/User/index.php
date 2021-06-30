<?php


session_start();
$user = unserialize($_SESSION['usuario']);
if (!$user)
  header("location../../index.php");

include_once "menu.php";
$leva = array();
$leva = unserialize($_SESSION['graficos']);


?>
<html>

<head>

    <style>
        body {
            color: white;
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day']
                <?php
                foreach ($leva as $levas) {
                    $agua = $levas['agua'];
                    $tipo = $levas['tipo'];
                    echo ",['$tipo',  $agua]";
                }

                ?>
            ]);

            var options = {
                title: 'litragem de Agua ao produzir a cerveja',
                'is3D': true,
                backgroundColor: 'transparent'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div id="piechart" name="divchar" class="divchar"></div>
</body>

</html>
<style>
    .divchar {
        width: 900px;
        height: 500px;
        background-color: transparent;


    }
</style>