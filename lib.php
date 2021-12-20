<?php
$servername='localhost';
$user='root';
$password='';
$bd='cinema';

try{
	$conn= new PDO("mysql:host=$servername; dbname=$bd",$user,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//e es la variable del error
}catch(Exception $e){							//el punto concatena
echo"<div align=center> ahi para la otra </div>".$e->getMessage();
}

?>