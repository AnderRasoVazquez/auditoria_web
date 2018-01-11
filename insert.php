<?php
// include 'inactivity_check.php';
include 'serv.php';
require_once 'password_compat/lib/password.php';
require_once 'utils/encriptacion.php';

$sql1 = "SELECT email FROM Usuarios WHERE email=?";
$sent1 = $conexion->prepare($sql1);
$sent1->bind_param("s", $correo);
$user = $_POST['correo'];
$sent1->execute();
$sent1->bind_result($res1);
$sent1->fetch();
if (isset($res1)) {
    echo '<script> alert("El Email introducido ya pertenece a otro usuario.");</script>';
}
$sent1->close();

$sql2 = "SELECT username FROM Usuarios WHERE username=?";
$sent2 = $conexion->prepare($sql2);
$sent2->bind_param("s", $user);
$user = $_POST['usuario'];
$sent2->execute();
$sent2->bind_result($res2);
$sent2->fetch();
if (isset($res2)) {
    echo '<script> alert("El nombre de usuario introducido ya pertence a otro usuario.");</script>';
}
$sent2->close();

$sql3 = "SELECT dni FROM Usuarios WHERE dni=?";
$sent3 = $conexion->prepare($sql3);
$sent3->bind_param("s", $dni);
$dni = $_POST['dni'];
$sent3->execute();
$sent3->bind_result($res3);
$sent3->fetch();
if (isset($res3)) {
    echo '<script> alert("El DNI introducido ya pertence a otro usuario.");</script>';
}
$sent3->close();

if (!isset($res1) && !isset($res2) && !isset($res3))  {
    $sql = "INSERT INTO Usuarios(username, password, nombre, apellidos, dni, fechanacimiento, email, cuentabancaria) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $sent = $conexion->prepare($sql);
    $sent->bind_param("ssssssss", $user, $pass, $name, $lastname, $dni, $date, $correo, $cuentabancaria);

    $user = $_POST['usuario'];
    $correo = $_POST['correo'];
    $dni = $_POST['dni'];
    $name = $_POST['nombre'];
    $lastname = $_POST['apellidos'];
    $date = $_POST['fecha'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $cuentabancaria = encriptarNumCuenta($_POST['cuentabancaria']);


    if($sent->execute()){
        echo '<script> alert("¡Te has registrado correctamente!");</script>';
        // echo '<script> window.location="inicio.php"; </script>';
    }else{
        echo "Error....!!";
    }

} else {
    echo "Vuelve atrás para intentar registrate de nuevo.";
}

mysqli_close($conexion);

?>
