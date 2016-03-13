<!DOCTYPE html>
<html lang="en">
<!-- HEAD -->
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pauvreté dans le monde</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


	
	<!-- Fichier CSS de la page -->
	<link href="Skin.css" rel="stylesheet">
	
	<!-- Fichier Javascript de la partie Statistique -->
	<script src="js/Statistique.js"></script>
	<script src="js/Amcharts/amcharts/amcharts.js" type="text/javascript"></script>
	<script src="js/Amcharts/amcharts/serial.js" type="text/javascript"></script>
	
 </head>
   
  

<!-- BODY -->  
 <body onLoad="afficherGraphe()";"document.location.href = 'ExporterFichier.php'";"document.location.href = 'GenererPays.php'">
  
  
	
<div class="container">
	
	
	<!-- Entête du site --> 
	<div class="row">
	
		<!-- Logo du Site --> 
		<div class="col-xs-2">	
			<img src="Ressources/Logo.png" alt="Logo" /> 	
		</div>
		
		<!-- Titre du Site --> 		
		<div class="col-xs-8">	
			<center>
				<h1>
					<br> La Pauvreté dans le monde
				</h1>
			</center>
		</div>
			
		<!-- Drapeaux Français et Britanique --> 	
		<div class="col-xs-2">	
			<br>
			<br> <br> <br> <br>
				<!-- Drapeaux Français-->
				<img src="Ressources/FranceFlag.jpg" alt="Passer le site en Français"/> 
				
				<!-- Espace -->
				&nbsp;
				
				<!-- Drapeaux Britanique-->
				<img src="Ressources/BritishFlag.jpg" alt="Passer le site en Anglais"/> 
		</div>
		
	</div>
	
	
	<br> 
	<br>
	
	
	<!-- Partie 02 Du site --> 
	<div class="row">
	
		<!-- Espace Vide --> 
		<div class="col-xs-1">	
				
		</div>
		
		<!-- Fenêtre d'affichage des statistiques --> 
		<div class="col-xs-6">	
		
			<!-- Fenête -->
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
					<div class="btn-group">
						<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Choix d'un indicateur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu"> 
							<li><a href="#">Indicateur n°1 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</a></li>
							<li><a href="#">Indicateur n°2 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</a></li>
							<li><a href="#">Indicateur n°3 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</a></li>
					</div><br>
					
					
					<!-- Possitionnement de l'affichage du graphe/Tableau  -->
					<div id="statistiques" style="width: 500px; height: 200px;">
						
				</div>
				</div>
			</div>
		</div>
		
				
		<!-- Fenêtre de choix de pays --> 
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
					
						
							
							 <div class="btn-group2">
							 
								<ul class="nav nav-pills nav-stacked" >
									  <li class="active">
									  <a href="#" >Choix des pays</a></li>
									  <?php
									  try
										{
											// On se connecte à MySQL
											$bdd = new PDO('mysql:host=localhost;dbname=lapauvretedanslemonde;charset=utf8', 'root', 'root');
										}
										catch(Exception $e)
										{
											// En cas d'erreur, on affiche un message et on arrête tout
												die('Erreur : '.$e->getMessage());
										}
									  $reponse = $bdd->query('SELECT * FROM table_1');
									 while ($donnees = $reponse->fetch())
										{
										?>
										
									  <li>
									  <option value=" <?php echo $donnees['Country']; ?>"> <?php echo $donnees['Country']; ?></option>
									   
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
		
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
  
  
  
</html>