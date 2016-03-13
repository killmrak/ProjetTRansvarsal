 <?php
 
// Modification du fichier local
$fileName  = fopen('Ressources/Statistiques/Ratio_de_la_population_pauvre_en_fonction_du_seuil_de_pauvrete_national_urbain.txt',"w");
ftruncate($fileName ,0);
 
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
$reponse = $bdd->query('SELECT country FROM table_1');


while ($row = $reponse->fetch())
{
	echo $row['country'];
?> 
 <?php
}
 
 
// Téléchargement du fichier txt 
$fileName="Ressources/Statistiques/Ratio_de_la_population_pauvre_en_fonction_du_seuil_de_pauvrete_national_urbain.txt";
header('Content-disposition: attachment; filename='.$fileName); 
header('Content-Type: application/force-download'); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize($fileName));
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
readfile($fileName);
?> 