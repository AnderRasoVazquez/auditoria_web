<?php
include 'inactivity_check.php';
include 'serv.php';

if(isset($_POST['submit3'])){
    $sql = "SELECT * FROM Usuarios WHERE username=?";
    $sent = $conexion->prepare($sql);
    $sent->bind_param('s', $usuario);
    $usuario = $_SESSION['usuario'];
    $sent->execute();
    $result = $sent->get_result();
    $row = $result->fetch_object();
    $hash = $row->password;
    $subhash = substr($hash ,7, 16);


    $sql2 = "UPDATE Usuarios SET cuentabancaria=? WHERE username=?";
    $sent2 = $conexion->prepare($sql2);
    $sent2->bind_param("ss", $nombre, $actual);
    $cuentabancaria = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $subhash, $_POST['cuentabancaria'], MCRYPT_MODE_ECB);
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
