<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
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

        //consulta para actualizar
        $sql = "update persona set nombre='" . $nombre . "', apellidoPaterno='" . $apellidoPaterno . "' , 
           apellidoMaterno='" . $apellidoMaterno . "', fechaNac='" . $fechaNac . "'where curp='" . $curp . "'";
        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo "<script language='JavaScript'>
            alert ('los datos fueron actualizados correctamente');
            location.assign('index.php');
            </script>";
        } else {
            echo "<script language='JavaScript'>
               alert ('ERROR: los datos NO fueron actualizados');
               location.assign('index.php');
               </script>";
        }

        mysqli_close($conexion);
    } else {
        $curp = $_GET['curp'];
        $sql = "select * from persona where curp='" . $curp . "'";
        $resultado = mysqli_query($conexion, $sql);

        $fila = mysqli_fetch_assoc($resultado);
        $nombre = $fila['nombre'];
        $apellidoPaterno = $fila['apellidoPaterno'];
        $apellidoMaterno = $fila['apellidoMaterno'];
        $fechaNac = $fila['fechaNac'];

        mysqli_close($conexion);

    ?>
        <h1>Editar Persona</h1>
        <div class="myDiv">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">


                <label>Nombre:</label><br>
                <input type="text" name="nombre" value="<?php echo $nombre; ?>"> <br>
                <label>Apellido Paterno:</label><br>
                <input type="text" name="apellidoPaterno" value="<?php echo $apellidoPaterno; ?>"> <br>
                <label>Apellido Materno:</label><br>
                <input type="text" name="apellidoMaterno" value="<?php echo $apellidoMaterno; ?>"> <br>
                <label>Fecha Nacimiento:</label><br>
                <input type="date" name="fechaNac" value="<?php echo $fechaNac; ?>"> <br>
                <input type="hidden" name="curp" value="<?php echo $curp; ?>"> <br>


                <input type="submit" name="enviar" value="Actualizar">
                <a href="index.php">Regresar</a>


            </form>
        </div>
    <?php
    }
    ?>
</body>

</html>