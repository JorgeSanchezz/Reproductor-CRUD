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
<input id="cerrar" name="button" type="button" onclick="window.close();" value="Cerrar" />
<form method="post" action="elimina_datos.php">
    <table width='80%' border=0> 
    <tr bgcolor='#CCCCCC'>
            <td bgcolor="#47bee8"><b><font size=5>Clave actor</b></td></font>
            <td bgcolor="47bee8"><b><font size=5>Nombre</b></td></font>
            <td bgcolor="47bee8"><b><font size=5>Apellidos</b></td></font>
            <td bgcolor="47bee8"><b><font size=5>Nacionalidad</b></td></font>
            <td bgcolor="47bee8"><b><font size=5>Edad</b></td></font>
            <td bgcolor="47bee8"><b><font size=5>Eliminar</b></td></font>
            <input id="eliminar" type="submit" value="Eliminar" name="btnEliminar" />

    </tr>
    <?php     
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
        echo "<tr>";
        echo "<td>".$row['cveactor']."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['apellidos']."</td>";
        echo "<td>".$row['nacionalidad']."</td>";
        echo "<td>".$row['edad']."</td>";
            print'
        </td>
        <td><input type="checkbox" name="nombre[]"  cveactor= "nombre[]" value=" '.$row["cveactor"].' "></input></td>
        ';
        print'
    </tr>
    ';
    }
    ?>
    </table>
</form>
</body>
</html>