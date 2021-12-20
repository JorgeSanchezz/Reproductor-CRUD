<?php
include_once("lib.php");
if(isset($_POST['update']))
{    
    $cveactor=$_POST['cveactor'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $nacionalidad=$_POST['nacionalidad'];
    $edad=$_POST['edad'];    
    if(empty($cveactor) || empty($nombre) || empty($apellidos) || empty($nacionalidad) || empty($edad)) {    
            
        if(empty($cveactor)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if(empty($nombre)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        if(empty($apellidos)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($nacionalidad)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if(empty($edad)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }        
    } else {    
        $sql = "UPDATE actores SET cveactor=:cveactor, nombre=:nombre, apellidos=:apellidos, nacionalidad=:nacionalidad, edad=:edad WHERE cveactor=:cveactor";
        $query = $conn->prepare($sql);    
        $query->bindparam(':cveactor', $cveactor);
        $query->bindparam(':nombre', $nombre);
        $query->bindparam(':apellidos', $apellidos);
        $query->bindparam(':nacionalidad', $nacionalidad);
        $query->bindparam(':edad', $edad);
        $query->execute();
        header("Location: update.php");
    }
}
?>
<?php
$cveactor = $_GET['cveactor'];
$sql = "SELECT * FROM actores WHERE cveactor=:cveactor";
$query = $conn->prepare($sql);
$query->execute(array(':cveactor' => $cveactor));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $cveactor = $row['cveactor'];
    $nombre = $row['nombre'];
    $apellidos = $row['apellidos'];
    $nacionalidad = $row['nacionalidad'];
    $edad = $row['edad'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <input name="button" type="button" onclick="window.close();" value="Cerrar" />

    <a href="update.php">Volver</a>
    <br/><br/>
    
    <form name="form1" method="post" action="modificar.php">
        <table border="0">
            <tr> 
                <td>Clave Actor</td>
                <td><input type="text" name="cveactor" value="<?php echo $cveactor;?>"></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
            </tr>
            <tr> 
                <td>Apellidos</td>
                <td><input type="text" name="apellidos" value="<?php echo $apellidos;?>"></td>
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
                <td><input type="text" name="edad" value="<?php echo $edad;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="cveactor" value=<?php echo $_GET['cveactor'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>