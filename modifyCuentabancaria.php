<?php
include 'inactivity_check.php';
include 'serv.php';
require_once 'utils/encriptacion.php';

if(isset($_POST['submit8'])){
    $sql = "SELECT password FROM Usuarios WHERE username=?";
    $sent = $conexion->prepare($sql);
    $sent->bind_param('s', $usuario);
    $usuario = $_SESSION['usuario'];
    $sent->execute();
    $sent->bind_result($hash);
    $sent->fetch();
    $subhash = substr($hash ,7, 10);
    $sent->close();

    $sql2 = "UPDATE Usuarios SET cuentabancaria=? WHERE username=?";
    $sent2 = $conexion->prepare($sql2);
    $sent2->bind_param("ss", $cuentabancaria, $nombre);
    $cuentabancaria = encriptarNumCuenta($_POST['cuentabancaria']);
    $nombre = $_SESSION['usuario'];

    if ($sent2->execute()) {
        echo '<script> alert("¡Actualizado correctamente!");</script>';
    }else{
        echo "Error....!!";
    }
}

mysqli_close($conexion);
echo '<script> window.location="panel.php"; </script>';
?>
