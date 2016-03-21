/*
Fichier Javascript incluant toutes les fonctions du bloc statistique
*/



// Affiche le graphe lors du clic du bouton graphe
function afficherGraphe() {
	
	
		// Création du graphe
		var chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData;
		chart.categoryField = "country";
		var graph = new AmCharts.AmGraph();
		graph.valueField = "visits";
		graph.type = "column";
		chart.addGraph(graph);
		chart.write('statistiques');


}


// Affiche le tableau lors du clic du bouton tableau
function afficherTableau(){
	document.getElementById("statistiques").innerHTML="<img src='Ressources/Logo.png'/>";
}

