<?php
try
{
    // On se connecte � MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=lapauvretedanslemonde;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arr�te tout
        die('Erreur : '.$e->getMessage());
}
 
// Si tout va bien, on peut continuer
 
// On r�cup�re tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM table_1');
 
// On affiche chaque entr�e une � une
while ($donnees = $reponse->fetch())
{
 
echo $donnees['Country']. '<br />' ;

     
 
}
 
$reponse->closeCursor(); // Termine le traitement de la requ�te
 
?>