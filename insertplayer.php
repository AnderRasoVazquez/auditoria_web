<?php
include 'inactity_check.php';
include 'serv.php';

if(isset($_POST['submit'])){
    $sql2 = "SELECT * FROM Jugadores WHERE Nombre=?";
    $sent2 = $conexion->prepare($sql2);
    $sent2->bind_param("s", $name);
    $name = $_POST['nombrej'];
    $sent2->execute();
    $result2 = $sent2->get_result();
    $data2 = mysqli_num_rows($result2) > 0;
    $sent2->close();
    if ($data2) {
        echo '<script> alert("El jugador ya está creado.");</script>';
    } else {
        $sql2 = "INSERT INTO Jugadores(Nombre, Nacionalidad, FechaNacimiento, NombreEquipo) VALUES (?, ?, ?, ?)";
        $sent2 = $conexion->prepare($sql2);
        $sent2->bind_param("ssss", $name, $nation, $dateplay, $team);

        $name = $_POST['nombrej'];
        $dateplay = $_POST['fechaj'];
        $team = $_POST['equipo'];
        $nation = $_POST['nac'];

        if($sent2->execute()){
            echo '<script> alert("¡Has añadido el jugador correctamente!");</script>';
        }else{
            echo "Error....!!";
        }
    }
}

mysqli_close($conexion);
echo '<script> window.location="panel.php"; </script>';
?>
