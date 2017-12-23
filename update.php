<?php
include 'serv.php';

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
	mysqli_close($connection);
	
	echo '<script> window.location="panel.php"; </script>';;
?>