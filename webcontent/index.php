<?php

require('../src/weather/DataProvider.php');

$dataProvider = new DataProvider();

$temperatures = $dataProvider->getTemperatureDataForChart();
$humidities = $dataProvider->getHumidityDataForChart();
$pressures = $dataProvider->getPressureDataForChart();

?>

<html>
<head>
	<title>Wykres danych pomiarowych</title>
</head>
<body>
	<style>
		.chart {
			width: 50%; 
			height: 400px; 
			display: inline-block;
			float: left;
			margin-bottom: 20px;
		}
	</style>
	
	<div id="temperature_chart" class="chart"></div>
	<div id="humidity_chart" class="chart"></div>
	<div id="pressure_chart" class="chart"></div>
	
	<script src="js/chart.js"></script>
	
	<script>
	
	function generateChart(container, data, title) {
		var chartData = [];
		for (i in data) {
			chartData.push({
				'x': new Date(data[i]['date'] * 1000),
				'y': data[i]['y']
			});
		}
		
		console.log(chartData);
		
		var chart = new CanvasJS.Chart(container, {
			animationEnabled: true,
			theme: "light2",
			axisX:{      
				labelFormatter: function (e) {
					return CanvasJS.formatDate(e.value, "HH:mm");
				},
			},
			title:{
				text: title
			},
			data: [{        
				type: "line",
				indexLabelFontSize: 16,
				dataPoints: chartData
			}]
		});
		chart.render();
	}
	
	generateChart('temperature_chart', <?php echo json_encode($temperatures) ?>, 'Wykres temperatury');
	generateChart('humidity_chart', <?php echo json_encode($humidities) ?>, 'Wykres wilgotności');
	generateChart('pressure_chart', <?php echo json_encode($pressures) ?>, 'Wykres ciśnienia');

	
	</script>

	
</body>
</html>



