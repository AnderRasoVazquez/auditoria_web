<?php
	include 'serv.php';
    include 'utils.php';
    // session_start();
    // if(!isset($_SESSION['usuario'])) {
    //     // no hay sesión iniciada
    //     echo '<script> window.location="inicio.php"; </script>';
    // } elseif(isset($_SESSION['tiempo']) AND time() > $_SESSION['tiempo'] + getInactivityTime()) {
    //     // ha expirado el tiempo de inactividad
    //     session_unset();
    //     session_destroy();
    //     echo 'Sesión cerrada por inactividad.';
    // 	echo '<script> window.location="inicio.php"; </script>';
    // }
    // $_SESSION['tiempo'] = time();

	$sql1 = "SELECT * FROM Usuarios WHERE email=?";
	$sent1 = $conexion->prepare($sql1);
	$sent1->bind_param("s", $correo);
	$sent1->execute();
	$correo = $_POST['correo'];
	$result1 = $sent1->get_result();
	$data1 = mysqli_num_rows($result1)>0;
	if ($data1) {
		echo '<script> alert("El Email introducido ya pertenece a otro usuario.");</script>';
	}
	$sent1->close();

	$sql2 = "SELECT * FROM Usuarios WHERE username=?";
	$sent2 = $conexion->prepare($sql2);
	$sent2->bind_param("s", $user);
	$user = $_POST['usuario'];
	$sent2->execute();
	$result2 = $sent2->get_result();
	$data2 = mysqli_num_rows($result2)>0;
	if ($data2) {
		echo '<script> alert("El nombre de usuario introducido ya pertence a otro usuario.");</script>';
	}
	$sent2->close();

	$sql3 = "SELECT * FROM Usuarios WHERE dni=?";
	$sent3 = $conexion->prepare($sql3);
	$sent3->bind_param("s", $dni);
	$dni = $_POST['dni'];
	$sent3->execute();
	$result3 = $sent3->get_result();
	$data3 = mysqli_num_rows($result3)>0;
	if ($data3) {
		echo '<script> alert("El DNI introducido ya pertence a otro usuario.");</script>';
	}
	$sent3->close();


	if (!$data1 && !$data2 && !$data3)  {
		$sql = "INSERT INTO Usuarios(username, password, nombre, apellidos, dni, fechanacimiento, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$sent = $conexion->prepare($sql);
		$sent->bind_param("sssssss", $user, $pass, $name, $lastname, $dni, $date, $correo);

		$user = $_POST['usuario'];
		$correo = $_POST['correo'];
		$dni = $_POST['dni'];
		$name = $_POST['nombre'];
		$lastname = $_POST['apellidos'];
		$date = $_POST['fecha'];
		$pass = md5($_POST['pass']);

		if($sent->execute()){
			echo '<script> alert("¡Te has registrado correctamente!");</script>';
			echo '<script> window.location="inicio.php"; </script>';
		}else{
			echo "Error....!!";
		}

	} else {
		echo "Vuelve atrás para intentar registrate de nuevo.";
	}

	mysqli_close($conexion);

?>
