<?php
session_start();
include 'serv.php';

if(isset($_POST['submit3'])){
	
	$nombre = $_POST['nombre'];
	$actual = $_SESSION['usuario'];
	
	echo "<script> alert('voy a modificar $actual');</script>";
	$actualizaruser = "UPDATE Usuarios SET nombre='$nombre' WHERE username='$actual'";
	mysqli_query($conexion,$actualizaruser);
	}
	mysqli_close($connection);
	echo '<script> window.location="panel.php"; </script>';
?>