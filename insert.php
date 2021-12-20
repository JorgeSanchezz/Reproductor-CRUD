<?php
	require 'lib.php';
	$cveactor=$_POST["cveactor"];
	$nombre=$_POST["nombre"];
	$apellidos=$_POST["apellidos"];
	$nacionalidad=$_POST["nacionalidad"];
	$edad=$_POST["edad"];

$sql=$conn->prepare("INSERT INTO actores values (:cveactor,:nombre,:apellidos,:nacionalidad,:edad)");
	$sql->bindParam(':cveactor',$cveactor);
	$sql->bindParam(':nombre',$nombre);
	$sql->bindParam(':apellidos',$apellidos);
	$sql->bindParam(':nacionalidad',$nacionalidad);
	$sql->bindParam(':edad',$edad);
	$sql->execute(); //var-dump($sql);

header("Location: index.html");
?>