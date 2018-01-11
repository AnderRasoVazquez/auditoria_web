<?php
include 'inactity_check.php';
?>
<!DOCTYPE html>
<html>
<head>
    <head>
        <title>Modificar</title>
        <meta charset="utf-8">
        <link type="text/css" href="./css/formato.css" rel="stylesheet" />
        <script type="text/javascript">
        function update(nombre,nac,fecha,equipo){
            if(comprobar(nombre,equipo,nac)){
                return true;
                $.post("update.php", {
                    nombre1: nombre,
                    nac1: nac,
                    fecha1: fecha,
                    equipo1: equipo
                },function(data) {
                    if (data == '¡Modificación exitosa!') {
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
</head>
<body>

    <?php
    include 'serv.php';

    $id = $_GET['id'];

    $pattern = "/^[0-9]*$/";
    if (!preg_match($pattern , $id)) {
        $kanye_west_meme ="¯\\\_\(ツ\)_\/¯";
        echo "<script> alert('Intento de inyección SQL detectado, su IP ha quedado registrada y se enviará a las autoridades.". $kanye_west_meme ."');</script>";
        echo '<script> window.location="panel.php"; </script>';
    } else {
        $idact = $id;

        $sql1 = "SELECT * FROM Jugadores WHERE ID=?";
        $sent1 = $conexion->prepare($sql1);
        $sent1->bind_param("i", $id);
        $id = $_GET['id'];
        $sent1->execute();

        if($res = $sent1->get_result()){
            if(mysqli_num_rows($res) > 0){
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Nacionalidad</th>";
                echo "<th>FechaNacimiento</th>";
                echo "<th>NombreEquipo</th>";
                echo "</tr>";
                while($row1 = mysqli_fetch_array($res)){
                    echo "<tr>";
                    echo "<td>" . $row1['ID'] . "</td>";
                    echo "<td>" . $row1['Nombre'] . "</td>";
                    echo "<td>" . $row1['Nacionalidad'] . "</td>";
                    echo "<td>" . $row1['FechaNacimiento'] . "</td>";
                    echo "<td>" . $row1['NombreEquipo'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
    }
    ?>
    <div id="cuerpo">
        <form id="form" action="update.php" method="POST" autocomplete="off">

            <p><label>Nombre <?php echo $id ?>:</label></p>
            <input name="nombre" type="text" id="nombre" placeholder="Ingresa Nombre" autofocus="" required=""></p>

            <p><label>Nacionalidad:</label></p>
            <input name="nac" type="text" id="nac" placeholder="Introduce Nacionalidad" required=""></p>

            <p><label>Fecha Nacimiento:</label></p>
            <input name="fecha" type="date" id="fecha" class="fecha" placeholder="Introduce fecha de nacimiento" required=""/></p>

            <p><label>Nombre Equipo:</label></p>
            <input name="equipo" type="text" id="equipo" placeholder="Ingresa Equipo" autofocus="" required=""></p>

            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />

            <p id="bot"><input name="submit" type="submit" id="submit" value="Actualizar" class="boton" onclick="return update('nombre', 'nac', 'fecha', 'equipo');"/></p>
        </form>
    </div><!--fin cuerpo-->

</body>
</html>
