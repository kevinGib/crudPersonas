<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $curp = $_POST['curp'];
        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $fechaNac = $_POST['fechaNac'];

        include("conexion.php");
        //agregar
        $sql = "insert into persona(curp,nombre,apellidoPaterno,apellidoMaterno,fechaNac)
             values('" . $curp . "','" . $nombre . "','" . $apellidoPaterno . "','" . $apellidoMaterno . "','" . $fechaNac . "') ";

        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) {
            //los datos ingresan a la base de datos
            echo "<script language='JavaScript'>
                       alert ('los datos fueron agregados correctamente');
                       location.assign('index.php');
                       </script>";
        } else {
            //los datos no se ingresaron a la base de datos
            echo "<script language='JavaScript'>
                    alert ('ERROR: los datos NO fueron ingresados correcteamente');
                    location.assign('index.php');
                    </script>";
        }
        mysqli_close($conexion);
    } else {
    }
    ?>

    <h1>Agregar persona</h1>
    <!-permite trabajar en el mismo archivo sin necesidad de crear otro para enviar la peticion->
    <div class="myDiv">
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label>CURP:</label><br>
            <input type="text" name="curp"> <br>
            <label>Nombre:</label><br>
            <input type="text" name="nombre"> <br>
            <label>Apellido Paterno:</label><br>
            <input type="text" name="apellidoPaterno"> <br>
            <label>Apellido Materno:</label><br>
            <input type="text" name="apellidoMaterno"> <br>
            <label>Fecha Nacimiento:</label><br>
            <input type="date" name="fechaNac"> <br><br>
            <input type="submit" name="enviar" value="AGREGAR">
            <a href="index.php">Regresar</a>
        </form>

    </div>
        
       
</body>

</html>