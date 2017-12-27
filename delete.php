<?php
$id = $_GET['id'];
$conexion = mysqli_connect("localhost","Xdperez067","AVmu8sW4r") or die("Fallo en el establecimiento de la conexión");
mysqli_select_db($conexion,"Xdperez067_db_auditoria_sgssi") or die ("Error en la selección de la base de datos");
$query = "DELETE FROM Jugadores WHERE ID = '$id'";
mysqli_query($conexion, $query) or die('Database error!');
echo "<script> alert('Elemento borrado');</script>";
mysqli_close($connection);
echo '<script> window.location="panel.php"; </script>';
?>
