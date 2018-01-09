<?php
session_start();
include 'serv.php';
include 'utils.php';
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

if(isset($_POST['submit4'])){
    $sql2 = "UPDATE Usuarios SET apellidos=? WHERE username=?";
    $sent2 = $conexion->prepare($sql2);
    $sent2->bind_param("ss", $surname, $actual);

	$surname = $_POST['apellidos'];
    $actual = $_SESSION['usuario'];

    if ($sent2->execute()) {
		echo '<script> alert("¡Actualizado correctamente!");</script>';
    }else{
        echo "Error....!!";
    }
}

mysqli_close($conexion);
echo '<script> window.location="panel.php"; </script>';
?>
