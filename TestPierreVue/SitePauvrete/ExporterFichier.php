<?php
 
// Inclusion des librairies d'exportation en excell
include 'Ressources/PHPExcel/Classes/PHPExcel.php';
include 'Ressources/PHPExcel/Classes/PHPExcel//Writer/Excel2007.php';

// Instanciation objet  objet PHPExcel
$workbook = new PHPExcel;

// Nous activons la feuille sur laquelle nous allons travailler (la feuille par défaut), grâce à  la méthode ->getActiveSheet(). 
$sheet = $workbook->getActiveSheet();

// Remplissage de la cellule
$sheet->setCellValueByColumnAndRow(1, 4, 'Coucou');

// Création du fichier
$writer = new PHPExcel_Writer_Excel2007($workbook);
$writer->setOffice2003Compatibility(true);

// Nom du fichier et chemin
$records = './fichier.xlsx';

//Enregistrement
$writer->save($records);

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