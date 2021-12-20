<?php
include_once("lib.php");
$result = $conn->query("SELECT * FROM actores ORDER BY cveactor ASC");
?>
<html>
<head>    
    <link rel="stylesheet" type="text/css" href="css/crud.css">
    <title>Homepage</title>
</head>
<body>
<!--  
El form de abajo es la que manda a llamar la acticon de consultaP.php, el boton es btn2 y donde ingresas los datos es el inputext
-->
<form action="consultaP.php" method="POST" target="ventana">
    <table width="25%" border="0">
                <td>Nombre</td>
                <td><input type="text" name="nombre"></td>
                <input type="submit" name="btn2" value="Consultar" id="btn2">
            </tr>
        </table>
</form>
<iframe name="ventana" src="consultaP.php" width=600 height=250>
</iframe>
<!--  
El iframe es la ventana pequeña que aparece
-->
    <table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>

        <td bgcolor="#ad0bef"><b><font size=3>Clave actor</b></td></font>
        <td bgcolor="ad0bef"><b><font size=3>Nombre</b></td></font>
        <td bgcolor="ad0bef"><b><font size=3>Apellidos</b></td></font>
        <td bgcolor="ad0bef"><b><font size=3>Nacionalidad</b></td></font>
        <td bgcolor="ad0bef"><b><font size=3>Edad</b></td></font>

    </tr>
    <form action="modificar.php" method="POST">
    <?php     
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
        echo "<tr>";
        echo "<td>".$row['cveactor']."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['apellidos']."</td>";
        echo "<td>".$row['nacionalidad']."</td>";    
        echo "<td>".$row['edad']."</td>";    
    }
    ?>
</form>
</body>
</html>