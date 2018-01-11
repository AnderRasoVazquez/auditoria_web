<?php
include 'inactity_check.php';
include 'serv.php';

if(isset($_POST['submit2'])){
    $sql2 = "UPDATE Usuarios SET password=? WHERE username=?";
    $sent2 = $conexion->prepare($sql2);
    $sent2->bind_param("ss", $pass, $actual);

    $pass = md5($_POST['pass']);
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
