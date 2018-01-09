<?php
    $conexion = mysqli_connect("localhost","Xdperez067","AVmu8sW4r") or die("Fallo en el establecimiento de la conexión");
    // mysqli_select_db($conexion,"Xdperez067_db_auditoria_sgssi")
    mysqli_select_db($conexion,"Xdperez067_db_auditoria_sgssi") or die ("Error en la selección de la base de datos");
    $conexion->set_charset("utf8");

    // $sql = "SELECT Nombre FROM Jugadores where ID= ?";
    // # sentencia
    // $sent = $conexion->prepare($sql);
    // if($sent === false) {
    //     trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conexion->errno . ' ' . $conexion->error, E_USER_ERROR);
    // }
    //
    // $sent->bind_param("i", $super_id);
    // $super_id = $_GET["id"];
    //
    // $sent->execute();
    // $sent->bind_result($name);
    //
    // while ($row = $sent->fetch()) {
    //     echo($name);
    //     echo("   ");
    // } ;
    //
	// if ($sent->num_rows > 0) {
    //     echo ("tomaaaaaa");
    // } else {
    //     echo ("niggggga");
    // }
    //
    // mysqli_close($conexion);



?>
