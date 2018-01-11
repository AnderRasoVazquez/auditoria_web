<?php
include 'utils.php';
include 'serv.php';
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

$id = $_GET['id'];

# comprobar que el id es solo un numero y no una inyección sql
$pattern = "/^[0-9]*$/";
if (preg_match($pattern , $id)) {
    $sql = "DELETE FROM Jugadores WHERE ID = ?";
    # sentencia
    $sent = $conexion->prepare($sql);

    $sent->bind_param("i", $id);
    $id = $_GET['id'];

    $sent->execute();
    echo "<script> alert('Elemento borrado');</script>";
} else {
    $kanye_west_meme ="¯\\\_\(ツ\)_\/¯";
    echo "<script> alert('Intento de inyección SQL detectado, su IP ha quedado registrada y se enviará a las autoridades.". $kanye_west_meme ."');</script>";
}

mysqli_close($conexion);
echo '<script> window.location="panel.php"; </script>';

?>
