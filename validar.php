<?php
require_once 'password_compat/lib/password.php';
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
        $sql = "SELECT username, password FROM Usuarios WHERE username=?";
        # sentencia
        $sent = $conexion->prepare($sql);

        $sent->bind_param('s', $usuario);

        $usuario = $_POST['usuario'];
        $pw = $_POST['contrasenia'];

        $sent->execute();

        $sent->bind_result($usuario, $hash);
        $sent->fetch();
        mysqli_close($conexion);
        if (isset($hash)) {
            if (password_verify($pw, $hash)) {
                $_SESSION["usuario"] = $usuario;
                echo 'Iniciando sesión para '.$_SESSION['usuario'].' <p>';
                echo '<script> window.location="panel.php"; </script>';
            }
            echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
        }
        else{
            echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
        }
    }
    echo '<script> window.location="inicio.php"; </script>';
    ?>
</body>
</html>
