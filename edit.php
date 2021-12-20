<?php
include_once("lib.php");

if(isset($_POST['update']))
{    
    $cveactor = $_POST['cveactor'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $nacionalidad = $_POST['nacionalidad'];
    $edad = $_POST['edad'];   
    
    // checking empty fields
   if(empty($cveactor) || empty($nombre) || empty($apellidos) || empty($nacionalidad) || empty($edad)) {    
            
        if(empty($cveactor)) {
            echo "<font color='red'>cveactor field is empty.</font><br/>";
        }
        
        if(empty($nombre)) {
            echo "<font color='red'>nombre field is empty.</font><br/>";
        }
        
        if(empty($apellidos)) {
            echo "<font color='red'>apellidos field is empty.</font><br/>";
        }
          if(empty($nacionalidad)) {
            echo "<font color='red'>nacionalidad field is empty.</font><br/>";
        }
          if(empty($edad)) {
            echo "<font color='red'>edad field is empty.</font><br/>";
        }
          
    } else {    
        //updating the table
        $sql = "UPDATE actores SET cveactor=:cveactor, nombre=:nombre, apellidos=:apellidos, nacionalidad=:nacionalidad, edad=:edad WHERE cveactor=:cveactor";
        $query = $conn->prepare($sql);
                
        $query->bindparam(':cveactor', $cveactor);
        $query->bindparam(':nombre', $nombre);
        $query->bindparam(':apellidos', $apellidos);
        $query->bindparam(':nacionalidad', $nacionalidad);
        $query->bindparam(':edad',$edad);
        $query->execute();

        header("Location: editar2.php");
    }
}
?>
<html>
<head>    
    <link rel="stylesheet" type="text/css" href="css/crud.css">
    <title>Edit Data</title>
    <body background="fondo.jpg">
</head>
 
<body>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
              <tr> 
                <td>Clave Actor</td>
                <td><input type="text" name="cveactor"></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre"></td>
            </tr>
            <tr> 
                <td>Apellidos</td>
                <td><input type="text" name="apellidos"></td>
            </tr>
              <tr> 
                <td>Nacionalidad</td>
                <select id="nacionalidad" type="text" class="validate" name="nacionalidad" value="<?php echo $nacionalidad;?>">
                <option>Mexicana</option>
                <option>Estadounidense</option>
                <option>Canadiense</option>
                <option>Aleman</option>
                <option>Sueco</option>
                <option>Noruego</option>
                <option>Cubano</option>
                <option>Ruso</option>
                <option>Venezolano</option>
                <option>Italiano</option>
                </select>
            </tr>
              <tr> 
                <td>Edad</td>
                <td><input type="text" name="edad"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="cveactor" value=<?php echo $_GET['cveactor'];?>></td>
                <td><input id="act" type="submit" name="update" value="Actualzar"></td>
            </tr>
        </table>
    </form>
</body>
</html>