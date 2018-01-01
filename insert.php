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
	$user = $_POST['usuario'];
	$name = $_POST['nombre'];
	$lastname = $_POST['apellidos'];
	$dni = $_POST['dni'];
	$date = $_POST['fecha'];
	$correo = $_POST['correo'];
	$pass = md5($_POST['pass']);

	$result = mysqli_query($conexion, "SELECT * FROM Usuarios WHERE email='$correo'");
	$data = mysqli_num_rows($result);
	if(($data)>0){
		echo '<script> alert("El Email introducido ya pertenece a otro usuario.");</script>';
	}

	$result1 = mysqli_query($conexion, "SELECT * FROM Usuarios WHERE username='$user'");
	$data1 =mysqli_num_rows($result1);
	if(($data1)>0){
		echo '<script> alert("El nombre de usuario introducido ya pertence a otro usuario.");</script>';
	}

	$result2 = mysqli_query($conexion, "SELECT * FROM Usuarios WHERE dni='$dni'");
	$data2 =mysqli_num_rows($result2);
	if(($data2)>0){
		echo '<script> alert("El DNI introducido ya pertence a otro usuario.");</script>';
	}

	if (($data)==0 && ($data1)==0 && ($data2)==0){

		$query = mysqli_query($conexion, "INSERT INTO Usuarios(username, password, nombre, apellidos, dni, fechanacimiento, email) VALUES ('$user', '$pass', '$name', '$lastname', '$dni', '$date', '$correo')");
		if($query){
			echo '<script> alert("¡Te has registrado correctamente!");</script>';
			echo '<script> window.location="inicio.php"; </script>';
		}else{
			echo "Error....!!";
		}
	}
	mysqli_close($conexion);

?>
