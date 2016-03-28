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

function indicateur($table, $annee){
$pdo=connectDB();	
$stmt = $pdo->query("SELECT pays,pays_Code,temps,Value FROM $table where temps=$annee and Value >1");
$arrphp=array();
while ($row = $stmt->fetch())
{
	array_push($arrphp, $row);

}
$pdo=null;
return $arrphp;	
}



function table(){
$pdo=connectDB();	
$arrphp=array();
$stmt = $pdo->query("SHOW TABLES");
while ($row = $stmt->fetch())
{
	array_push($arrphp, $row);

}
$pdo=null;
return $arrphp;	
}

function Year(){
$pdo=connectDB();	
$arrphp=array();
$stmt = $pdo->query("select distinct (temps) from indicateur where temps>0");
while ($row = $stmt->fetch())
{
	array_push($arrphp, $row);

}
$pdo=null;
return $arrphp;	
}

function nameTable($param){
$pdo=connectDB();	
$arrphp=array();
$stmt = $pdo->query("Select distinct (indicateur_Name) from $param");
$st;
while ($row = $stmt->fetch())
{
$st=$row["indicateur_Name"];
break;
}
$pdo=null;
return $st;	
}

function showOption($value, $text, $current)
{
echo "<option value=\"$value\"";
if ($value == $current) echo " selected";
echo ">$text</option>\n";
}



 
?>