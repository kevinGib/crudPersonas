<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Personas</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estas seguro?, se eliminaran los datos de la persona')
        }
    </script>
    <link rel="stylesheet" type="text/css" href="estilos.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <?php
        include("conexion.php");
        //select
        $sql="select*from persona";
        $resultado=mysqli_query($conexion, $sql)
    ?>
    <h1>Personas</h1>
    <a href="agregar.php">Nueva Persona</a><br><br>
    <table>
        <thead>
            <tr>
                <th>CURP</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas=mysqli_fetch_assoc($resultado)){

               
            ?>
            <tr>
            <td><?php echo $filas ['curp'] ?></td>
            <td><?php echo $filas ['nombre'] ?></td>
            <td><?php echo $filas ['apellidoPaterno'] ?></td>
            <td><?php echo $filas ['apellidoMaterno'] ?></td>
            <td><?php echo $filas ['fechaNac'] ?></td>
            <td>
                <?php echo "<a href= 'editar.php?curp=".$filas['curp']."'>EDITAR</a>"; ?>
                -
                <?php echo "<a href= 'eliminar.php?curp=".$filas['curp']."'
                onclick='return confirmar()'>ELIMINAR</a>"; ?>
            </td>
            </tr>
        <?php            
        }
        ?>
        </tbody>
    </table>

    <?php 
        mysqli_close($conexion);
    ?>
</body>
</html>