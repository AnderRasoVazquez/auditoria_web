<?php
session_start();
include 'serv.php';
	if(isset($_POST['submit2'])){
	$pass = md5($_POST['pass']);
	$actual = $_SESSION['usuario'];
	$actualizaruser = "UPDATE Usuarios SET password='$pass' WHERE username='$actual'";
	mysqli_query($conexion,$actualizaruser);
	}
	mysqli_close($connection);
	echo '<script> window.location="panel.php"; </script>';
?>