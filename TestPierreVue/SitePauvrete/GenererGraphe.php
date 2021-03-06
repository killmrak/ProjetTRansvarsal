

	<script type="text/javascript">

	/*
	Fichier Javascript incluant toutes les fonctions du bloc statistique
	*/



	// Affiche le graphe lors du clic du bouton graphe
		
		var chartData = [{
				"country": "USA",
				"visits": 4252
			}, {
				"country": "China",
				"visits": 1882
			}, {
				"country": "Japan",
				"visits": 1809
			}, {
				"country": "Germany",
				"visits": 1322
			}, {
				"country": "UK",
				"visits": 1122
			}, {
				"country": "France",
				"visits": 1114
			}, {
				"country": "India",
				"visits": 984
			}, {
				"country": "Spain",
				"visits": 711
			}, {
				"country": "Netherlands",
				"visits": 665
			}, {
				"country": "Russia",
				"visits": 580
			}, {
				"country": "South Korea",
				"visits": 443
			}, {
				"country": "Canada",
				"visits": 441
			}, {
				"country": "Brazil",
				"visits": 395
			}, {
				"country": "Italy",
				"visits": 386
			}, {
				"country": "Australia",
				"visits": 384
			}, {
				"country": "Taiwan",
				"visits": 338
			}, {
				"country": "Poland",
				"visits": 328
			}];
			
			
			// Création du graphe
			var chart = new AmCharts.AmSerialChart();
			chart.dataProvider = chartData;
			chart.categoryField = "country";
			var graph = new AmCharts.AmGraph();
			graph.valueField = "visits";
			graph.type = "column";
			chart.addGraph(graph);
			chart.write('statistiques');



	</script>
	