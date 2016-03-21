<?php
		
			// Generation du JSON
		
					// Connexion a la BDD 
					 try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=lapauvretedanslemonde;charset=utf8', 'root', 'root');
					}
					catch (Exception $e)
					{
						   die('Erreur : ' . $e->getMessage());
					}
					
					// Requête SQL
					$reponse = $bdd->query("SELECT * FROM table_1 WHERE Country = 'Albania'");
					
					// Génération de la ligne
					while ($row = $reponse->fetch()) {
						$country = $row['Country'];
						$visits = $row['1996 [YR1996]'];
						$all = array(array("country:" => $country, "visits:" => $visits));
					}
					
					// Création du fichier JSON
					$fp = fopen('Graphe.json', 'w+');
					fwrite($fp, json_encode($all));
					fclose($fp);

?> 