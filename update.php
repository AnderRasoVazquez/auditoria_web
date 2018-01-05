<?php
include 'serv.php';
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

if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$nac = $_POST['nac'];
	$fecha = $_POST['fecha'];
	$equipo = $_POST['equipo'];
	echo "<script> alert('voy a modificar: $id');</script>";
	$result = mysqli_query($conexion, "UPDATE Jugadores SET Nombre = '$nombre', Nacionalidad = '$nac',FechaNacimiento =  '$fecha', NombreEquipo = '$equipo' WHERE  ID ='$id'");
	if($result){
			echo '<script> alert("¡Has actualizado el jugador correctamente!");</script>';
		}else{
			echo "Error....!!";
		}
	}
	mysqli_close($conexion);

	echo '<script> window.location="panel.php"; </script>';;
?>
