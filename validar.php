<?php
	session_start();
	require_once 'password_compat/lib/password.php';

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
				$sql = "SELECT * FROM Usuarios WHERE username=?";
				# sentencia
				$sent = $conexion->prepare($sql);

				$sent->bind_param('s', $usuario);

				$usuario = $_POST['usuario'];
				$pw = $_POST['contrasenia'];

				$sent->execute();

				$result = $sent->get_result();

				if (mysqli_num_rows($result)!=0) {

					$row = $result->fetch_object();
					$hash = $row->password;
					if (password_verify($pw, $hash)) {
						echo $pw;
						$_SESSION["usuario"] = $usuario;
				  	echo 'Iniciando sesión para '.$_SESSION['usuario'].' <p>';
						echo '<script> window.location="panel.php"; </script>';
					}else{
						echo $hash;
					}
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
