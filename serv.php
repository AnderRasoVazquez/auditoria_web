<?php
	$conexion = mysqli_connect("localhost","Xoye001","pLTtQGp83") or die("Fallo en el establecimiento de la conexión");
	mysqli_select_db($conexion,"Xoye001_BaseballFans") or die ("Error en la selección de la base de datos");
?>