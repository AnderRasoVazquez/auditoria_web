<?php
	$conexion = mysqli_connect("localhost","Xdperez067","AVmu8sW4r") or die("Fallo en el establecimiento de la conexión");
	// mysqli_select_db($conexion,"Xdperez067_db_auditoria_sgssi")
	mysqli_select_db($conexion,"Xdperez067_db_auditoria_sgssi") or die ("Error en la selección de la base de datos");
    $conexion->set_charset("utf8");
?>
