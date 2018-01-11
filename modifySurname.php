<?php
include 'inactity_check.php';
include 'serv.php';

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
