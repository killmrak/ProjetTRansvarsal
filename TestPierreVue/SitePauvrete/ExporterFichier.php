<?php
 
// Inclusion des librairies d'exportation en excell
include 'Ressources/PHPExcel/Classes/PHPExcel.php';
include 'Ressources/PHPExcel/Classes/PHPExcel//Writer/Excel2007.php';

// Instanciation objet  objet PHPExcel
$workbook = new PHPExcel;



// Nous activons la feuille sur laquelle nous allons travailler (la feuille par défaut), grâce à  la méthode ->getActiveSheet(). 
$page1 = $workbook->getActiveSheet();

//Création de la feuille 1
$page1->setTitle('Indicateur 1');



//création de la  feuille 2
$page2 = $workbook->createSheet();
$page2->setTitle('Indicateur 2');


 
 //création de la feuille 3
$page3 = $workbook->createSheet();
$page3->setTitle('Indicateur 3');

 
  // Connexion a la BDD 
 try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lapauvretedanslemonde;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}
 
 
 // Récupérer les données sur la BDD et les stocker dans le fichier
$reponse = $bdd->query('SELECT * FROM table_1');

$i = 1;

while ($row = $reponse->fetch()) {
	
	// Remplissage de la cellule
	$page1->setCellValueByColumnAndRow(0, $i, $row['Country']);
	$i = $i + 1;
}
 

// Création du fichier Excell2007 compaptible avec 2003
$writer = new PHPExcel_Writer_Excel2007($workbook);
$writer->setOffice2003Compatibility(true);

// Nom du fichier et chemin
$records = './Ressources/Statistiques/La_Pauvrete_Dans_Le_Monde.xlsx';

//Enregistrement
$writer->save($records);


$fileName="Ressources/Statistiques/La_Pauvrete_Dans_Le_Monde.xlsx";
header('Content-disposition: attachment; filename='.$fileName); 
header('Content-Type: application/force-download'); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize($fileName));
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
readfile($fileName);

?>  






























  <?php /*
 //FONCTIONNE!!!!!!!!!!!!!!!!!!
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


// Récupérer les données sur la BDD et les stocker dans le fichier
$reponse = $bdd->query('SELECT * FROM table_1');


while ($row = $reponse->fetch())
{
	echo $row['Country'];
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
readfile($fileName); */
?>  