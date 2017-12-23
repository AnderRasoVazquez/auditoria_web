<?php
include 'serv.php';
	if(isset($_POST['submit'])){
	$name = $_POST['nombrej'];
	$dateplay = $_POST['fechaj'];
	$team = $_POST['equipo'];
	$nation = $_POST['nac'];
	//comprobamos que el jugador no existe/el select hay que ponerle bien los nombres/
	$result = mysqli_query($conexion, "SELECT * FROM Jugadores WHERE Nombre='$name'");
	$data = mysqli_num_rows($result);
	if(($data)>0){
		echo '<script> alert("El jugador ya está creado.");</script>';
	}
	if (($data)==0){
		//hay que poner bien los nombres del INSERT
		$query = mysqli_query($conexion, "INSERT INTO Jugadores(Nombre, Nacionalidad, FechaNacimiento, NombreEquipo) VALUES ('$name', '$nation', '$dateplay', '$team')");
		if($query){
			echo '<script> alert("¡Has añadido el jugador correctamente!");</script>';
		}else{
			echo "Error....!!";
		}
	}
	}
	mysqli_close($connection);
	echo '<script> window.location="panel.php"; </script>';
?>