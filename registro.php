<?php
session_start();
if(isset($_SESSION['usuario'])) {
    echo '<script> alert("Sesión ya iniciada. Volverás a tu panel de usuario.");</script>';
    echo '<script> window.location="panel.php"; </script>';
}else{
    echo "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario</title>
    <meta charset="utf-8">
    <link type="text/css" href="./css/formato.css" rel="stylesheet" />
    <script type="text/javascript">

    function misFunciones(idMail,dni,pass,repass,nombre,apellidos,usuario,fecha, cuentabancaria){
        if (validateMail(idMail) &&
        validarDni(dni) &&
        comprobarPasswords(pass,repass) &&
        comprobarCaracteresN(nombre) &&
        comprobarCaracteresA(apellidos) &&
        comprobarUsuario(usuario))
        comprobarCuentaBancaria(cuentabancaria)) {
            document.getElementById("form_id").submit();
        }
    }

    function comprobarPasswords(pass1,pass2){
        valueForm1=document.getElementById(pass1).value;
        valueForm2=document.getElementById(pass2).value;
        if (valueForm1==valueForm2){
            // no me gusta el ir comprobando la misma string multiples veces para distintos criterios
            // pero las regex no son lo mío. al menos parece que tira
            if (valueForm1.length >= 8) {
                regex = /[a-z]+/;
                if (regex.test(valueForm1)) {
                    regex = /[A-Z]+/;
                    if (regex.test(valueForm1)) {
                        regex = /[0-9]+/;
                        if (regex.test(valueForm1)) {
                            regex = /[_¿?¡!|@·#$~%&()]+/;
                            if (regex.test(valueForm1)) {
                                return true;
                            }
                        }
                    }
                }
            }
            alert('La contraseña tiene que contener letras mayúsculas, minúscuas, números y símbolos. Longitud mínima de 8 caracteres.');
            return false;
        }
        alert('Las contraseñas no coinciden');
        return false;
    }

    function comprobarCaracteresN(nombre){
        valueForm=document.getElementById(nombre).value;
        var patron = /^[a-zA-Z\s]{1,20}$/;
        if(!valueForm.search(patron)){
            return true;
        }
        alert('Solo letras en nombre');
        return false;
    }

    function comprobarUsuario(nombre){
        valueForm=document.getElementById(nombre).value;
        var patron = /^[\w]{1,20}$/;
        if(!valueForm.search(patron)){
            return true;
        }
        alert('Sin espacios el usuario');
        return false;
    }

    function comprobarCuentaBancaria(cuentabancaria){
        valueForm=document.getElementById(cuentabancaria).value;
        var patron = /^[A-Z]{2}[0-9]{22}$/;
        if(!valueForm.search(patron)){
            return true;
        }
        alert('Cuenta bancaria no válida');
        return false;
    }

    function comprobarCaracteresA(apellidos){
        valueForm=document.getElementById(apellidos).value;
        var patron = /^[a-zA-Z\s]{1,20}$/;
        if(!valueForm.search(patron)){
            return true;
        }
        alert('Solo letras en apellidos');
        return false;
    }

    function validateMail(idMail){
        //Creamos un objeto
        object=document.getElementById(idMail);
        valueForm=object.value;

        // Patron para el correo
        var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        if(valueForm.search(patron)==0){
            //Mail correcto
            object.style.color="#000";
            return true;
        }
        //Mail incorrecto
        object.style.color="#f00";

        alert('Mail incorrecto');

        return false;
    }

    function validarDni(dni){
        var numero;
        var letr;
        var letra;
        var expresion_regular_dni;
        object=document.getElementById(dni);
        valueForm=object.value;
        valueForm1=object.value;
        valueForm2=object.value;
        expresion_regular_dni = /^\d{8}-[a-zA-Z]$/;

        if(valueForm.search(expresion_regular_dni)==0){
            numero = valueForm1.substr(0,8);
            letr = valueForm2.substr(9,1);
            letr=letr.toUpperCase();
            numero = numero % 23;
            letra='TRWAGMYFPDXBNJZSQVHLCKET';
            letra=letra.substr(numero,1);
            if (letra!=letr) {
                object.style.color="#f00";
                alert('La letra no corresponde con el DNI.');
                return false;
            }else{
                object.style.color="#000";
                return true;
            }
        }else{
            object.style.color="#f00";
            alert('DNI no válido.');
            return false;
        }
    }

    </script>

</head>

<body>
    <div id="registrar">
        <a href="inicio.php"</a>Regresar</a>
    </div>
    <div id="envoltura">
        <div id="contenedor">

            <div id="cabecera">
                <img src="./css/imagen/iniciologo1.jpg" >
            </div>

            <div id="cuerpo">

                <form id="form_id" action="insert.php" method="post" >
                    <p><label for="nombre">Usuario:</label></p>
                    <input name="usuario" type="text" id="usuario" class="usuario" placeholder="Introduce tu usuario" autofocus="" required=""/></p>
                    <p><label for="nombre">Nombre:</label></p>
                    <input name="nombre" type="text" id="nombre" class="nombre" placeholder="Introduce tu nombre" required=""/></p>
                    <!--=============================================================================================-->
                    <!--La sisguientes 2 líneas son para agregar campos al formulario con sus respectivos labels-->
                    <!--Puedes usar tantas como necesites-->
                    <p><label for="apellidos">Apellidos:</label></p>
                    <input name="apellidos" type="text" id="apellidos" class="apellidos" placeholder="Introduce tus apellidos" required=""/></p>
                    <p><label for="dni">DNI:</label></p>
                    <input name="dni" type="text" id="dni" class="dni" placeholder="Introduce tu DNI" required="" /></p>
                    <!--=============================================================================================-->
                    <p><label for="fecha">Fecha de nacimiento:</label></p>
                    <input name="fecha" type="date" id="fecha" class="fecha" placeholder="Introduce tus fecha de nacimiento" required=""/></p>
                    <p><label for="correo">Correo:</label></p>
                    <input name="correo" type="text" id="correo" class="correo" placeholder="Introduce tu mail"  required="" /></p>
                    <p><label for="cuentabancaria">Cuenta bancaria:</label></p>
                    <input name="cuentabancaria" type="text" id="cuentabancaria" class="cuentabancaria" placeholder="Introduce tu cuenta bancaria"  required="" /></p>
                    <p><label for="pass">Password:</label></p>
                    <input name="pass" type="password" id="pass" class="pass" placeholder="Introduce tu contraseña" required=""/></p>
                    <p><label for="repass">Repetir Password:</label></p>
                    <input name="repass" type="password" id="repass" class="repass" placeholder="Repite contraseña" required=""/></p>

                <p id="bot"><input name="btnSubmit" type="button" id="boton" value="Registrar" class="boton" onclick="misFunciones('correo','dni','pass','repass','nombre','apellidos','usuario', 'fecha', 'cuentabancaria')" /></p>
                </form>
            </div>

            <div id="pie">Sistema de Login Y Registro</div>
        </div><!-- fin contenedor -->

    </div>

</body>

</html>
