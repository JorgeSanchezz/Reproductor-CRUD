<?php

//Sentencia.
$sentencia = "SELECT cveactor FROM actores WHERE cveactor='$cveactor' LIMIT 1";
$query = mysqli_query($conn,$sentencia);
$existe = mysqli_num_rows($query);//si encuentra un registro, es decir, usuario existe, su valor sera 1 en caso contrario es 0 (NULL).

//Comprobamos si existe usuario.
if ($existe===1) {
    $error_message = "El usuario ya existe.";
    break;
}

?>