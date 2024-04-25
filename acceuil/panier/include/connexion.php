<?php
$servername = 'localhost'; 
$username = 'root'; 
$password = '';

try
{
$idcon = new PDO ("mysql:host=$servername;dbname=flora",$username, $password) ;

//0n définit le mode d'erreur de PDO sur Exception
$idcon->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
}


catch(PDOException $excp) 
{
echo "Erreur : " . $excp->getMessage();
}
?>