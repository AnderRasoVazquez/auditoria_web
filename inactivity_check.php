<?php
function getInactivityTime() {
    return 60;
}

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
?>
