<?php
include 'inactity_check.php';
include 'serv.php';
?>
<!DOCTYPE html>
<html>
<head>

    <title>Panel Usuario</title>
    <meta charset="utf-8">
    <link type="text/css" href="./css/formatousuario.css" rel="stylesheet" />

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

    function comprobarPasswords(pass1,pass2){



        if(confirm("¿Estás seguro de querer cambiar la contraseña?")){
            valueForm1=document.getElementById(pass1).value;

            valueForm2=document.getElementById(pass2).value;


            if (valueForm1==valueForm2){


                return true;
                $.post("modifyPass.php", {
                    password1: pass1

                }, function(data) {
                    if (data == '¡Has modificado la contraseña correctamente!') {
                        $("form")[0].reset();
                    }
                    alert(data);
                    window.locationf="panel.php";
                });

            }
            alert('Las contraseñas no coinciden');
            return false;
        }
        else
        {
            return false;
        }
    }




    function validateMail(idMail)
    {



        if(confirm("¿Estás seguro de querer cambiar el email?")){

            //Creamos un objeto
            object=document.getElementById(idMail);
            valueForm=object.value;

            // Patron para el correo
            var patron=/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,4})+$/;
            if(valueForm.search(patron)==0)
            {
                //Mail correcto
                object.style.color="#000";
                return true;
                $.post("modifyMail.php", {
                    mail1: idMail

                }, function(data) {
                    if (data == '¡Has modificado el correo correctamente!') {
                        $("form")[0].reset();
                    }
                    alert(data);
                    window.locationf="panel.php";
                });
            }
            //Mail incorrecto
            object.style.color="#f00";

            alert('Mail incorrecto');

            return false;
        }
        else
        {
            return false;

        }
    }

    function comprobarCaracteresN(nombre){



        if(confirm("¿Estás seguro de querer cambiar el nombre?")){

            valueForm=document.getElementById(nombre).value;
            var patron = /^[a-zA-Z\s]{1,20}$/;
            if(!valueForm.search(patron)){

                return true;
                $.post("modifyName.php", {
                    name1: nombre

                }, function(data) {
                    if (data == '¡Has modificado el nombre correctamente!') {
                        $("form")[0].reset();
                    }
                    alert(data);
                    window.locationf="panel.php";
                });
            }
            alert('Solo letras en nombre');
            return false;
        }
        else
        {
            return false;
        }
    }


    function comprobarCaracteresA(apellidos){

        confirmacion=confirm("¿Estás seguro de querer cambiar los apellidos?");

        if(confirmacion){

            valueForm=document.getElementById(apellidos).value;
            var patron = /^[a-zA-Z\s]{1,20}$/;
            if(!valueForm.search(patron)){

                return true;
                $.post("modifySurname.php", {
                    surname1: apellidos

                }, function(data) {
                    if (data == '¡Has modificado los apellidos correctamente!') {
                        $("form")[0].reset();
                    }
                    alert(data);
                    window.locationf="panel.php";
                });
            }
            alert('Solo letras en apellidos');
            return false;
        }
        else
        {
            return false;
        }
    }

    function actualizarFecha(fecha){

        if(confirm("¿Estás seguro de querer cambiar tu fecha de Nacimiento?")){
            return true;
            $.post("modifyDate.php", {
                date1: fecha

            }, function(data) {
                if (data == '¡Has modificado tu DNI correctamente!') {
                    $("form")[0].reset();
                }
                alert(data);
                window.locationf="panel.php";
            });
        }
        else{
            return false;
        }
    }

    function validarDni(dni){



        if(confirm("¿Estás seguro de querer cambiar el DNI?")){

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

                }
                else{

                    object.style.color="#000";

                    return true;
                    $.post("modifyDNI.php", {
                        dni1: dni

                    }, function(data) {
                        if (data == '¡Has modificado tu DNI correctamente!') {
                            $("form")[0].reset();
                        }
                        alert(data);
                        window.locationf="panel.php";
                    });
                }
            }
            else{
                object.style.color="#f00";

                alert('DNI no válido.');

                return false;


            }
        }
        else
        {
            return false;
        }
    }

    </script>

</head>
<body background="./css/imagen/fondo.jpg">
    <div id="registrar">
    </div> <!-- fin opcion-->

    <div id="envoltura">
        <div id="contenedor">

            <div id="cabecera" >
                Bienvenido a BaseballFans
                <?php
                echo " ";
                echo $_SESSION['usuario'];
                ?>

            </div>

            <div id="cuerpo">
                <!--parte de modificar usuario-->
                <button onclick="return mostrarOcultar('ocultable1')" type="button" class="boton">Modificar Datos</button>
                <div style="display:none;" id="ocultable1">

                    <form id="form-pass" action="modifyPass.php" method="post" autocomplete="off">
                        <p><label for="pass">Contraseña:</label></p>
                        <input name="pass" type="password" id="pass" class="pass" placeholder="Introduce la nueva contraseña" required=""/></p>
                        <p><label for="repass">Repetir Contraseña:</label></p>
                        <input name="repass" type="password" id="repass" class="repass" placeholder="Repite contraseña" required=""/></p>
                        <p align="right" id="bot"><input type="submit" id="submit2" name="submit2" value="Modificar Contraseña" class="boton1" onclick="return comprobarPasswords('repass','pass')"></p>
                    </form>
                    <form id="form-name" action="modifyName.php" method="post" autocomplete="off">
                        <p><label for="nombre">Nombre:</label></p>
                        <input name="nombre" type="text" id="nombre" class="nombre" placeholder="Introduce tu nombre" required=""/></p>
                        <p align="right" id="bot"><input type="submit" id="submit3" name="submit3" value="Modificar Nombre" class="boton1" onclick="return comprobarCaracteresN('nombre')"></p>
                    </form>
                    <form id="form-ape" action="modifySurname.php" method="post" autocomplete="off">
                        <p><label for="apellidos">Apellidos:</label></p>
                        <input name="apellidos" type="text" id="apellidos" class="apellidos" placeholder="Introduce tus apellidos" required=""/></p>
                        <p align="right" id="bot"><input type="submit" id="submit4" name="submit4" value="Modificar Apellidos" class="boton1" onclick="return comprobarCaracteresA('apellidos')"></p>
                    </form>
                    <form id="form-dni" action="modifyDNI.php" method="post" autocomplete="off">
                        <p><label for="dni">DNI:</label></p>
                        <input name="dni" type="text" id="dni" class="dni" placeholder="Introduce tu DNI" onchange="javascript:colorearDni('dni')" required="" /></p>
                        <p align="right" id="bot"><input type="submit" id="submit5" name="submit5" value="Modificar DNI" class="boton1" onclick="return validarDni('dni')"></p>
                    </form>
                    <form id="form-fecha" action="modifyDate.php" method="post" autocomplete="off">
                        <p><label for="fecha">Fecha de nacimiento:</label></p>
                        <input name="fecha" type="date" id="fecha" class="fecha" placeholder="Introduce tus fecha de nacimiento" required=""/></p>
                        <p align="right" id="bot"><input type="submit" id="submit6" name="submit6" value="Modificar Fecha" class="boton1" onclick="return actualizarFecha('fecha')"></p>
                    </form>
                    <form id="form-correo" action="modifyMail.php" method="post" autocomplete="off">
                        <p><label for="correo">Correo:</label></p>
                        <input name="correo" type="text" id="correo" class="correo" placeholder="Introduce tu mail"  required="" /></p>
                        <p align="right" id="bot"><input type="submit" id="submit7" name="submit7" value="Modificar Correo" class="boton1" onclick="return validateMail('correo')"></p>
                    </form>
                </div>
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
                <button onclick="return mostrarOcultar('ocultable3')" type="button" class="boton">Mostrar Jugadores</button>
                <div style="display:none;" id="ocultable3">
                    TABLA DE JUGADOES
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

                                    <form name="form1" style="display:block">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--fintabla-->
                        <div>
                            <p></p>
                            <p></p>
                            <p></p>
                            <p align="right">
                                <a href="logout.php"><button class="boton" >Salir</button></a>
                            </p>
                        </div>
                    </div><!--fin cuerpo-->

                    <div id="pie">Sistema de Login Y Registro</div>
                </div><!-- fin contenedor -->
            </div><!--fin envoltura-->

        </body>
        </html>
