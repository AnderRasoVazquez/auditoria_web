<?php
$id = $_GET['id'];
$conexion = mysqli_connect("localhost","Xoye001","pLTtQGp83") or die("Fallo en el establecimiento de la conexión");
mysqli_select_db($conexion,"Xoye001_BaseballFans") or die ("Error en la selección de la base de datos");
$query = "DELETE FROM Jugadores WHERE ID = '$id'";
mysqli_query($conexion, $query) or die('Database error!');
echo "<script> alert('Elemento borrado');</script>";
mysqli_close($connection);
echo '<script> window.location="panel.php"; </script>';
?>