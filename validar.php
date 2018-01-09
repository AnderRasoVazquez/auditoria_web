<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body>
		<?php
			include 'serv.php';
			if(isset($_POST['login'])){
				$sql = "SELECT * FROM Usuarios WHERE username=? AND password=?";
				# sentencia
				$sent = $conexion->prepare($sql);
				if($sent === false) {
					trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conexion->errno . ' ' . $conexion->error, E_USER_ERROR);
				}

				$sent->bind_param("ss", $usuario, $pw);

				$usuario = $_POST['usuario'];
				$pw = md5($_POST['contrasenia']);

				$sent->execute();

				$result = $sent->get_result();

				if (mysqli_num_rows($result)>0) {
					$_SESSION["usuario"] = $usuario;
				  	echo 'Iniciando sesión para '.$_SESSION['usuario'].' <p>';
					echo '<script> window.location="panel.php"; </script>';
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="inicio.php"; </script>';
				}
			}
    		mysqli_close($conexion);
		?>
</body>
</html>
