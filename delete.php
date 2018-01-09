<?php
include 'utils.php';
session_start();
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

include 'serv.php';

$sql = "DELETE FROM Jugadores WHERE ID = ?";
# sentencia
$sent = $conexion->prepare($sql);
if($sent === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conexion->errno . ' ' . $conexion->error, E_USER_ERROR);
}

$sent->bind_param("i", $id);
$id = $_GET['id'];

$sent->execute();
echo "<script> alert('Elemento borrado');</script>";
mysqli_close($conexion);
echo '<script> window.location="panel.php"; </script>';

?>
