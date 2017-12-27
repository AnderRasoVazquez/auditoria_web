<?php
session_start();
include 'serv.php';
if(isset($_SESSION['usuario'])){
//el siguiente script hace que nos redirijamos a panel.php si tenemos la sesión iniciada
echo'<script> window.location="panel.php"; </script>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Formulario</title>
    <meta charset="utf-8">
    <link type="text/css" href="./css/formato.css" rel="stylesheet" />
	  <script type="text/javascript">
	function mostrarOcultar(id){
	var elemento = document.getElementById(id);
	if(!elemento) {
	return true;
	}
	if (elemento.style.display == "none") {
	elemento.style.display = "block"
	} else {
	elemento.style.display = "none"
	};
	return true;
	};

	function comprobarCaracteres(nombrej,fechaj,equipo,nac){

	if(comprobar(nombrej,equipo,nac)){
	  return true;
	   $.post("insertplayer.php", {
			nombrej1: nombrej,
			fechaj1: fechaj,
			equipo1: equipo,
			nac1: nac
		 }, function(data) {
			if (data == '¡Has añadido el jugador correctamente!') {
				$("form")[0].reset();
			}
			alert(data);
			window.locationf="panel.php";
			});
	}else{
	alert('Solo letras en los campos');
	return false;
	}
	}
	function comprobar(nombrej,equipo,nac){
		var patron = /^[a-zA-Z\s]{1,20}$/;
		valueForm1=document.getElementById(nombrej).value;
		valueForm2=document.getElementById(equipo).value;
		valueForm3=document.getElementById(nac).value;
		if((!valueForm1.search(patron))&&(!valueForm2.search(patron))&&(!valueForm3.search(patron))){
			alert ('datos correctos');
			return true;
		}else{
			alert('datos incorrectos');
			return false;
		}
	}
	</script>
	</head>

<body background="./css/imagen/fondo.jpg">

    <div id="registrar">
<a href="registro.php"</a>Registrarse</a>
</div> <!-- fin opcion-->
    <div id="envoltura">
        <div id="contenedor">

            <div id="cabecera" >
                <img src="./css/imagen/iniciologo1.jpg" >
            </div>

            <div id="cuerpo">
                <form id="form-login" action="validar.php" method="POST" autocomplete="off">

                    <p><label >Usuario:</label></p>
                        <input name="usuario" type="text" id="usuario" placeholder="Ingresa Usuario" autofocus="" required=""></p>

                    <p><label>Contraseña:</label></p>
                        <input name="contrasenia" type="password" id="contrasenia" placeholder="Ingresa Password" required=""></p>

                    <p id="bot"><input type="submit" id="submit" name="login" value="Ingresar" class="boton"></p>
                </form>
				<!--parte de añadir elemnto/jugador-->
				<button onclick="return mostrarOcultar('ocultable2')" type="button" class="boton">Añadir Jugador</button>
				<div style="display:none;" id="ocultable2">
				<form id="form" action="insertplayer.php" method="post" >
						<p><label >Nombre Jugador:</label></p>
                        <input name="nombrej" type="text" id="nombrej" placeholder="Nombre y Apellidos Jugador"  required=""></p>

						<p><label for="fecha">Fecha de nacimiento:</label></p>
                        <input name="fechaj" type="date" id="fechaj" class="fecha" placeholder="Fecha de Nacimiento Jugador" required=""/></p>

						<p><label >Equipo Jugador:</label></p>
                        <input name="equipo" type="text" id="equipo" placeholder="Nombre Equipo"  required=""></p>

						<p><label >Nacionalidad:</label></p>
                        <input name="nac" type="text" id="nac" placeholder="Nacionalidad del Jugador" required=""></p>
						<p align="right" id="bot"><input type="submit" id="submit" name="submit" value="Añadir" class="boton1" onclick="return comprobarCaracteres('nombrej','fechaj','equipo','nac')"></p>
				 </form>
				</div>
				<!--tabla de jugadores-->
				<button onclick="return mostrarOcultar('ocultable3')" type="button" class="boton">Mostrar Jugadores</button>
				<div style="display:none;" id="ocultable3">
				TABLA DE JUGADORES
				<p></p>
				<!--tabla-->
				<?php
	$conexion = mysqli_connect("localhost","Xdperez067","AVmu8sW4r") or die("Fallo en el establecimiento de la conexión");
    mysqli_select_db($conexion,"Xdperez067_db_auditoria_sgssi") or die ("Error en la selección de la base de datos");

	$query = "SELECT * FROM Jugadores";
	$result = mysqli_query($conexion, $query);
	?>
				<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
<tr>
<td width=25>ID:</td>
<td width=25>Nombre:</td>
<td width=25>Action:</td>
</tr>
<form action="modify.php" method="post">
<?php while ($row = mysqli_fetch_array($result)){
	$id = $row['ID'];
	?>
<tr>
<td><?php echo $row['ID']; ?> </td>
<td><?php echo $row['Nombre']; ?> </td>
<td><?php echo "<a href='modify.php?id=$id'>Modificar</a>";?> <?php echo "<a href='delete.php?id=$id'>Borrar</a>"; }?> </td>
</tr>
</table>

                <div>
				<div style="display:none;" id="ocultable">
				<?php


				?>
				<form name="form1" style="display:block">
				</form>
				</div>
				</div>
				</div>

            </div><!--fin cuerpo-->

            <div id="pie">Sistema de Login Y Registro</div>
        </div><!-- fin contenedor -->
    </div><!--fin envoltura-->
</body>

</html>
