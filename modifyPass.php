<?php
session_start();
include 'serv.php';
include 'utils.php';
if(!isset($_SESSION['usuario'])) {
    // no hay sesión iniciada
    echo '<script> window.location="inicio.php"; </script>';
} elseif(isset($_SESSION['tiempo']) AND time() > $_SESSION['tiempo'] + getInactivityTime()) {
    // ha expirado el tiempo de inactividad
    session_unset();
    session_destroy();
    echo 'Sesión cerrada por inactividad.';
	echo '<script> window.location="inicio.php"; </script>';
}
$_SESSION['tiempo'] = time();
	if(isset($_POST['submit2'])){
	$pass = md5($_POST['pass']);
	$actual = $_SESSION['usuario'];
	$actualizaruser = "UPDATE Usuarios SET password='$pass' WHERE username='$actual'";
	mysqli_query($conexion,$actualizaruser);
	}
	mysqli_close($connection);
	echo '<script> window.location="panel.php"; </script>';
?>
