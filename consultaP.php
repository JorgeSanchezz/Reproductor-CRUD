<?php
//esta es la parte del codigo de busqueda
include_once("lib.php");
$re = $conn->query("SELECT * FROM actores ORDER BY cveactor ASC");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td bgcolor="#efda0b"><b><font size=3>Clave actor</b></td></font>
        <td bgcolor="efda0b"><b><font size=3>Nombre</b></td></font>
        <td bgcolor="efda0b"><b><font size=3>Apellidos</b></td></font>
        <td bgcolor="efda0b"><b><font size=3>Nacionalidad</b></td></font>
        <td bgcolor="efda0b"><b><font size=3>Edad</b></td></font>
    </tr>
</body>
</html>
<?php
//lo de arriba es la creacion de la tabla y todo lo demas es el codigo para realizar la consulta
include_once("lib.php");
if (isset($_POST['btn2'])) {
$alias = $_POST['nombre'];
$SQL = 'SELECT cveactor, nombre, apellidos,edad, nacionalidad FROM actores WHERE nombre = :doc';
$stmt = $conn->prepare($SQL);
$result = $stmt->execute(array(':doc'=>$alias));
$rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
if(count($rows)){
	foreach ($rows AS $row) {
        echo "<tr>";
	    echo "<td>".$row->cveactor."</td>";
	    echo "<td>".$row->nombre."</td>";
	    echo "<td>".$row->apellidos."</td>";
	    echo "<td>".$row->nacionalidad."</td>";
	    echo "<td>".$row->edad."</td>";
	}
}
else {
	 while($ro = $re->fetch(PDO::FETCH_ASSOC)) {         
        echo "<tr>";
        echo "<td>".$ro['cveactor']."</td>";
        echo "<td>".$ro['nombre']."</td>";
        echo "<td>".$ro['apellidos']."</td>";
        echo "<td>".$ro['nacionalidad']."</td>";    
        echo "<td>".$ro['edad']."</td>";    
 }
} 
}
 ?>