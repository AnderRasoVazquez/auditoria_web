<?php
include 'inactity_check.php';
include 'serv.php';

if(isset($_POST['submit5'])){
    $sql2 = "UPDATE Usuarios SET dni=? WHERE username=?";
    $sent2 = $conexion->prepare($sql2);
    $sent2->bind_param("ss", $dni, $actual);

    $dni = $_POST['dni'];
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
