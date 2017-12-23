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
				$usuario = $_POST['usuario'];
				$pw = md5($_POST['contrasenia']);
				$log = mysqli_query($conexion, "SELECT * FROM Usuarios WHERE username='$usuario' AND password='$pw'");
				if (mysqli_num_rows($log)>0) {
					$row = mysqli_fetch_array($log);
					$_SESSION["usuario"] = $row['username']; 
				  	echo 'Iniciando sesión para '.$_SESSION['usuario'].' <p>';
					echo '<script> window.location="panel.php"; </script>';
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="inicio.php"; </script>';
				}
			}
			mysqli_close($connection);
		?>	
</body>
</html>