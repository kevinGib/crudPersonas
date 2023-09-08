<?php
    $curp=$_GET['curp'];
    include('conexion.php');

    //consulta de eliminar un registro 
    $sql="delete from persona where curp='".$curp."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script language='JavaScript'>
        alert ('los datos se eliminaron correctamente');
        location.assign('index.php');
        </script>";
        }else{
       echo"<script language='JavaScript'>
           alert ('ERROR: los datos NO eliminados');
           location.assign('index.php');
           </script>";
        }

?>