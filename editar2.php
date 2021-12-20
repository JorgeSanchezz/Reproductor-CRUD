<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/crud.css">
        <body background="fondo.jpg">
    </head>
    <body>
        <form name="frmRadios">
            <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
            <td bgcolor="#00ffae"><b><font size=4>Clave actor</b></td></font>
            <td bgcolor="#00ffae"><b><font size=4>Nombre</b></td></font>
            <td bgcolor="#00ffae"><b><font size=4>Apellidos</b></td></font>
            <td bgcolor="#00ffae"><b><font size=4>Nacionalidad</b></td></font>
            <td bgcolor="#00ffae"><b><font size=4>Edad</b></td></font>
            <td bgcolor="#00ffae"><b><font size=4>Actualizar</b></td></font>
 <?php     
include_once("lib.php");
             $result = $conn->query("SELECT * FROM actores ORDER BY cveactor ASC");
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
        echo "<tr>";
        echo "<td>".$row['cveactor']."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['apellidos']."</td>";
        echo "<td>".$row['nacionalidad']."</td>";
        echo "<td>".$row['edad']."</td>";
            print'
        </td>
        <td><input type="radio" name="cveactor"  cveactor= "nombre[]" value=" '.$row["cveactor"].' "></input></td>
        ';
        print'
    </tr>
    ';
    }
    ?>
        </form>
        <script>
            var rdb = document.frmRadios.cveactor;
            for(var i = 0; i < rdb.length; i++) {
                rdb[i].onclick = function() {
                    window.location.href = "edit.php?cveactor=" + this.value;
                };
            }
        </script>
        <?php
            $cveactor = isset($_GET['cveactor']) ? $_GET['cveactor'] : null;
            echo $cveactor;
        ?>
    </body>
</html>