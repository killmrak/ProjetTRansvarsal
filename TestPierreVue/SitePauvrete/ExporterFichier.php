<?php
// Inclusion des librairies d'exportation en excell
include 'Ressources/PHPExcel/Classes/PHPExcel.php';
include 'Ressources/PHPExcel/Classes/PHPExcel//Writer/Excel2007.php';

// Instanciation objet  objet PHPExcel
$workbook = new PHPExcel;

  // Connexion a la BDD 
 try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lapauvretedanslemonde;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}


// Nous activons la feuille sur laquelle nous allons travailler (la feuille par défaut), grâce à  la méthode ->getActiveSheet(). 
$page1 = $workbook->getActiveSheet();

//Création de la feuille 1
$page1->setTitle('Poverty headcount ratio at 1.90');



//création de la  feuille 2
$page2 = $workbook->createSheet();
$page2->setTitle('Rural poverty headcount ratio');


 
 //création de la feuille 3
$page3 = $workbook->createSheet();
$page3->setTitle('Urban poverty headcount ratio');

 
//===========================================================CONTENU DE LA FEUILLE N°1 ===================================================================
$page1->setCellValueByColumnAndRow(1, 1, "Country Code");
$page1->setCellValueByColumnAndRow(0, 1, "Country");
$k = 2;

for ($annee=1974; $annee<2015; $annee++){
		$page1->setCellValueByColumnAndRow($k, 1, $annee);
		$k++;
	}
 
 // Récupérer les données sur la BDD et les stocker dans le fichier
$reponse = $bdd->query('SELECT * FROM table_1');

$i = 1;
while ($row = $reponse->fetch()) {
	
	
	// Remplissage de la cellule
	for ($j=2; $j<45; $j++){
		
		$page1->setCellValueByColumnAndRow($j-2, $i+1, $row[$j]);
	}		
	$i = $i + 1;
}
//========================================================================================================================================================




//===========================================================CONTENU DE LA FEUILLE N°2 ===================================================================
$page2->setCellValueByColumnAndRow(1, 1, "Country Code");
$page2->setCellValueByColumnAndRow(0, 1, "Country");
$k = 2;

for ($annee=1974; $annee<2015; $annee++){
		$page2->setCellValueByColumnAndRow($k, 1, $annee);
		$k++;
	}
 
 // Récupérer les données sur la BDD et les stocker dans le fichier
$reponse = $bdd->query('SELECT * FROM table_2');

$i = 1;
while ($row = $reponse->fetch()) {
	
	
	// Remplissage de la cellule
	for ($j=2; $j<45; $j++){
		
		$page2->setCellValueByColumnAndRow($j-2, $i+1, $row[$j]);
	}		
	$i = $i + 1;
}
//========================================================================================================================================================


//===========================================================CONTENU DE LA FEUILLE N°3 ===================================================================
$page3->setCellValueByColumnAndRow(1, 1, "Country Code");
$page3->setCellValueByColumnAndRow(0, 1, "Country");
$k = 2;

for ($annee=1974; $annee<2015; $annee++){
		$page3->setCellValueByColumnAndRow($k, 1, $annee);
		$k++;
	}
 
 // Récupérer les données sur la BDD et les stocker dans le fichier
$reponse = $bdd->query('SELECT * FROM table_3');

$i = 1;
while ($row = $reponse->fetch()) {
	
	
	// Remplissage de la cellule
	for ($j=2; $j<45; $j++){
		
		$page3->setCellValueByColumnAndRow($j-2, $i+1, $row[$j]);
	}		
	$i = $i + 1;
}
 //========================================================================================================================================================

// Création du fichier Excell2007 compaptible avec 2003
$writer = new PHPExcel_Writer_Excel2007($workbook);
$writer->setOffice2003Compatibility(true);

// Nom du fichier et chemin
$records = './Ressources/Statistiques/La_Pauvrete_Dans_Le_Monde.xlsx';

//Enregistrement
$writer->save($records);

// Téléchargement du fichier via le navigateur
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
 //Permet d'exporter nom des pays en fichier TXT
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