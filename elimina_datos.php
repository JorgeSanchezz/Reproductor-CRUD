<?php
    include_once "lib.php";

	$link=$conn;
	//$noticia[];
	if(@$_POST['btnEliminar'])
	{
		foreach($_POST['nombre'] as $cveactor)
		{
		 $result = $conn->query('delete from actores where cveactor='.$cveactor);
		}
		header('Location: delete.php');
	}	
	?>