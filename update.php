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

if(isset($_POST['submit'])){
    $sql2 = "UPDATE Jugadores SET Nombre=?, Nacionalidad=?,FechaNacimiento=?, NombreEquipo=? WHERE ID=?";
    $sent2 = $conexion->prepare($sql2);
    $sent2->bind_param("ssssi", $nombre, $nac, $fecha, $equipo, $id);

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nac = $_POST['nac'];
    $fecha = $_POST['fecha'];
    $equipo = $_POST['equipo'];

    if($sent2->execute()){
        echo '<script> alert("¡Has actualizado el jugador correctamente!");</script>';
    }else{
        echo "Error....!!";
    }

    mysqli_close($conexion);
    echo '<script> window.location="panel.php"; </script>';
}
?>
