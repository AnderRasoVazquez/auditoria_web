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
            // yyyyyyyyyyyyy todo lo que hay aqui debajo no sirve
            // naisu
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
    	} else{
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
            </div><!--fin cuerpo-->

            <div id="pie">Sistema de Login Y Registro</div>
        </div><!-- fin contenedor -->
    </div><!--fin envoltura-->
</body>

</html>
