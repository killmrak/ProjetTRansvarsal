<?php

function connectDB(){
	$dsn = "mysql:host=localhost;dbname=pauvrete;";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, 'root', 'root', $opt);
return $pdo;
}

function indicateur($parametre){
$pdo=connectDB();	
$stmt = $pdo->query("SELECT pays,pays_Code,temps,Value FROM ". $parametre ." where temps=2010 and Value >1");
$arrphp=array();
while ($row = $stmt->fetch())
{
	array_push($arrphp, $row);

}
$pdo=null;
return $arrphp;	
}

?>