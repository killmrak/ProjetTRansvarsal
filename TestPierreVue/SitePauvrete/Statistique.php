



<script type="text/javascript">

// Affiche le graphe lors du clic du bouton graphe

	
	<?php
	// Connexion a la BDD 
	 try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lapauvretedanslemonde;charset=utf8', 'root', 'root');
	}
	catch (Exception $e)
	{
		   die('Erreur : ' . $e->getMessage());
	}

	 // Récupérer les données sur la BDD
	$reponse = $bdd->query("SELECT * FROM table_1 where Country='Armenia'");

	?>
	
	var chartData = [


<?php
		while ($row = $reponse->fetch()) {
			// Remplissage de la cellule
			for($i=1974;$i<2015;$i++) {
?>			
			<script type="text/javascript">	
			{"annee": <?php $i ?>,
			"valeur":<?php $row[$i] ?>
			},
			
<?php			
			}
		}		
?>	

		
			
	];
		
		
		// Création du graphe
		var chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData;
		chart.categoryField = "country";
		var graph = new AmCharts.AmGraph();
		graph.valueField = "visits";
		graph.type = "line";
		graph.fillAlphas = 0; // or delete this line, as 0 is default
		graph.bullet = "round";
		graph.lineColor = "#8d1cc6";
		chart.addGraph(graph);
		chart.write('statistiques');



</script>