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
 
// Si tout va bien, on peut continuer
 
// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM table_1');
 
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
 
echo $donnees['Country']. '<br />' ;

     
 
}
 
$reponse->closeCursor(); // Termine le traitement de la requête
 
?>