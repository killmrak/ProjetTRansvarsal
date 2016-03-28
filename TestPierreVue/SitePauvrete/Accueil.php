<!DOCTYPE html>
<html lang="en">
	<!-- HEAD -->
	 <head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Pauvrete dans le monde</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<?php
			require_once("Map/functions.php");
		?>
		
		<!-- Fichier CSS de la page -->
		<link href="Skin.css" rel="stylesheet">
		
		<!-- Fichier Javascript de la partie Statistique -->
		<script src="js/Statistique.js"></script>
		<script src="js/Selection.js"></script>
		<script src="js/Amcharts/amcharts/amcharts.js" type="text/javascript"></script>
		<script src="js/Amcharts/amcharts/serial.js" type="text/javascript"></script>
		
		<!-- Fichiers pour la carte interactive -->
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/maps/modules/map.js"></script>
		<script src="https://code.highcharts.com/mapdata/custom/world.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cloud.github.com/downloads/lafeber/world-flags-sprite/flags32.css" />

		
	</head>
   



<!-- BODY -->  
 <body onLoad="afficherGraphe()";"document.location.href = 'ExporterFichier.php'";"document.location.href = 'GenererPays.php'">
  
		
		<!-- Generation du JSON -->
 		<?php
			//require("GenererJson.php");
		?> 
	
<div class="container">
	
	
	<!-- Entкte du site --> 
	<div class="row">
	
		<!-- Logo du Site --> 
		<div class="col-xs-2">	
			<img src="Ressources/Logo.png" alt="Logo" /> 	
		</div>
		
		<!-- Titre du Site --> 		
		<div class="col-xs-8">	
			<center>
				<h1>
					<br> La Pauvrete dans le monde
				</h1>
			</center>
		</div>
			
		
	</div>
	
	
	<br> 
	<br>
	
	
	<!-- Partie 02 Du site --> 
	<div class="row">
	
		<!-- Espace Vide --> 
		<div class="col-xs-1">	
				
		</div>
		
		<!-- Fenкtre d'affichage des statistiques --> 
		<div class="col-xs-6">	
		
			<!-- Fenкte -->
			<div class="panel panel-default">
				<div class="panel-body">
					
							
					<!-- Bouton Graphe -->
					<button type="button" class="btn btn-success" onclick="afficherGraphe()" >
						<span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
						
					</button>
					
			
				
					<!-- Bouton Tableau -->
					<button type="button" class="btn btn-primary" onclick="afficherTableau()">
						<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
					</button>
				
				
					<!-- Bouton Exporter -->
					<button type="button" class="btn btn-warning" onclick="document.location.href = 'ExporterFichier.php'">
						<span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span>
					</button>
				

					<!-- Menu déroulant de choix d'indicateur -->
	                
 	
					
					
					<!-- Possitionnement de l'affichage du graphe/Tableau  -->
					<div id="statistiques" style="width: 500px; height: 200px;">
						
				</div>
				</div>
			</div>
		</div>
		
				
		<!-- Fenкtre de choix de pays --> 
		<div class="col-xs-4">	
			<div class="panel panel-default">
				<div class="panel-body">
				
					<!-- Bouton Accepter -->
					<button type="button" class="btn btn-success">
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					</button>
					
					<!-- Bouton Enlever -->
					<button type="button" class="btn btn-danger">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
					
					<!-- Espace -->
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<!-- Bouton Actualiser -->
					<button type="button" class="btn btn-default">
						<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>	
					</button>
					
					<!-- Bouton Supprimer -->
					<button type="button" class="btn btn-default">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</button>
					
					<br>
					
					
					
					<!-- Menu pour le choix pays -->
					
						
							
				<div id="monDiv" class="btn-group2" >
							 

								<ul class="nav nav-pills nav-stacked" >
								<li select id="select" onchange="colourFunction()">
										
									  <a href="#" class="color">Choix des pays</a></li>
									  <?php
									  try
										{
											// On se connecte а MySQL
											$bdd = new PDO('mysql:host=localhost;dbname=pauvrete;charset=utf8', 'root', 'root');
										}
										catch(Exception $e)
										{
											// En cas d'erreur, on affiche un message et on arrкte tout
												die('Erreur : '.$e->getMessage());
										}
									  $reponse = $bdd->query('SELECT DISTINCT pays FROM urbaine');
									 while ($donnees = $reponse->fetch())
										{
										?>
										
									  <li><a href="#" class="color" >
									  <option value=" <?php echo $donnees['pays']; ?>"> <?php echo $donnees['pays'];  ?></option>
									   </a>
									  
									  </li>
									  <?php
									  }
								  ?>
								   

								</ul>	
							
					<br><br><br><br><br><br><br>
					
				</div>
			</div>	
		</div>
		
		
		
		
		<!-- Espace Vide --> 
		<div class="col-xs-1">	
				
		</div>	
		
	</div>
	
		
</div>

<!-- Emplacement carte interactive -->
<div class="row">
	
			<!-- Espace Vide --> 
		<div class="col-xs-1">					
		</div>
		
		<!-- Carte Interactive --> 
		<div class="col-xs-10">
			<div class="panel panel-default">
					<div class="panel-body">
						<iframe src="Map/worldmap_ajax.php" width="830px" height="600px" >
							<br> 
						</iframe >
					</div>
			</div>
		</div>
		
		<!-- Espace Vide --> 
		<div class="col-xs-1">					
		</div>
	
</div>
		
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	
	
	
	
</body>
  

  
</html>
