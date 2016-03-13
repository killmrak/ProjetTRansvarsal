 <?php
$fileName  = fopen('Ressources/Statistiques/Ratio_de_la_population_pauvre_en_fonction_du_seuil_de_pauvrete_national_rural.txt',"w+");
ftruncate($fileName ,0);
fputs($fileName ,"J'aime les coooooooooooooooooooooooooooooookies et les bonbons!"); // on écrit le nom et email dans le fichier
 
 
// Téléchargement d'un fichier txt 
$fileName="Ressources/Statistiques/Ratio_de_la_population_pauvre_en_fonction_du_seuil_de_pauvrete_national_rural.txt";
header('Content-disposition: attachment; filename='.$fileName); 
header('Content-Type: application/force-download'); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize($fileName));
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
readfile($fileName);
?> 