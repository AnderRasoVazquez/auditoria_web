<?php
session_start();
include 'serv.php';
if(isset($_POST['submit5'])){
	$dni = $_POST['dni'];
	$actual = $_SESSION['usuario'];
	$actualizaruser = "UPDATE Usuarios SET dni='$dni' WHERE username='$actual'";
	mysqli_query($conexion,$actualizaruser);
	}
	mysqli_close($connection);
	echo '<script> window.location="panel.php"; </script>';
?>