 <?php
 
// Téléchargement d'un fichier txt 
$fileName = "coucou.txt";
header('Content-disposition: attachment; filename='.$fileName); 
header('Content-Type: application/force-download'); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize($fileName));
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
readfile($fileName);
?> 