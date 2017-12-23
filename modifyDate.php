<?php
session_start();
include 'serv.php';
if(isset($_POST['submit6'])){
	$fecha = $_POST['fecha'];
	$actual = $_SESSION['usuario'];
	$actualizaruser = "UPDATE Usuarios SET fechanacimiento='$fecha' WHERE username='$actual'";
	mysqli_query($conexion,$actualizaruser);
	}
	mysqli_close($connection);
	echo '<script> window.location="panel.php"; </script>';
?>