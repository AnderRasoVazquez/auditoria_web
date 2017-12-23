<?php
session_start();
include 'serv.php';
if(isset($_POST['submit7'])){
	$email = $_POST['idMail'];
	$actual = $_SESSION['usuario'];
	$actualizaruser = "UPDATE Usuarios SET email='$email' WHERE username='$actual'";
	mysqli_query($conexion,$actualizaruser);
	}
	mysqli_close($connection);
	echo '<script> window.location="panel.php"; </script>';
?>