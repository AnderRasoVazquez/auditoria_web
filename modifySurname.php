<?php
session_start();
include 'serv.php';
if(isset($_POST['submit4'])){
	$surname = $_POST['apellidos'];
	$actual = $_SESSION['usuario'];
	$actualizaruser = "UPDATE Usuarios SET apellidos='$surname' WHERE username='$actual'";
	mysqli_query($conexion,$actualizaruser);
	}
	mysqli_close($connection);
	echo '<script> window.location="panel.php"; </script>';
?>