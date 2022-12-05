<?php
    $ $servername = "inovatecserver.database.windows.net";
    $info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
    $con = sqlsrv_connect($servername, $info);
    $Eliminar_id=$_GET['id'];

    if ($con){

        $query="SELECT cantidad FROM Inventario_suc WHERE id_producto='$Eliminar_id'";
        $resultado=sqlsrv_query($con, $query);
        $cant=sqlsrv_fetch_array($resultado);

        if($cant[0]==0){
            $borrar="DELETE FROM Inventario_suc WHERE id_producto='$Eliminar_id'";
            $ejecutar = sqlsrv_query($con,$borrar);

            echo"<script>alert('Producto eliminado')</script>";
            header("Location:consulta_inventario.php");
        }
        
        else{

            echo"<script>alert('No se pudo eliminar el producto porque todavia esta en stock')</script>";
            header("Location:consulta_inventario.php");
            }
    }else{
        
        echo "<script type='text/javascript'>alert('No se puede ecceder a la base de datos');
        window.location.href='consulta_inventario.php';  
        </script>";
    }
    sqlsrv_close($conn_sis);

?>