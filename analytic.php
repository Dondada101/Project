<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="analytic.css">
  <title>Analytics</title>
</head>
<body>
  <div class="mychart">
    <div class="chartTypes">
    <button onclick="setChartType('doughnut')">Pie Chart</button>
    <button onclick="setChartType('bar')">Bar</button>
    </div>
  <canvas id="myChart"></canvas>
  </div>
  <div class="mychart">
  <button onclick="setChartType1('doughnut')">Pie Chart</button>
  <button onclick="setChartType1('bar')">Bar</button>
  <canvas id="myChart1"></canvas>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jss/analytic.js"></script>
</body>
</html>