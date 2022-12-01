<?php

class Proveedor{
    function eliminar(){
        //informacion para la conexion a la base de datos
        $servername="inovatecserver.database.windows.net";
        $info=array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
        $con=sqlsrv_connect($servername, $info);
        if ($con) {
            //obtener el ID del URL
            $id=$_GET['id'];
            $deshabilita = false;
            //echo $id. '<br>';
            //verificar si la sucursal tiene registros en ventas
            $querry_productos="SELECT * FROM Productos
            WHERE id_proveedor='$id'";
            $resultados_productos=sqlsrv_query($con, $querry_productos);
            if (sqlsrv_fetch_array($resultados_productos)) {
                //echo '<script>alert("Esta sucursal todavía tiene ventas registradas, necesarias para el balance, por lo que no puede ser eliminada. La sucursal será deshabilitada");</script>';
                $deshabilita=true;
            }
            //verifica si se encontro alguna tabla, en caso afirmativo deshabilida la sucursal, de lo contrario, la elimina
            if($deshabilita==true){
                $querry_update="UPDATE Proveedores
                SET Estado='Deshabilitado' 
                WHERE id_proveedor='$id'";
                $stm=sqlsrv_query($con, $querry_update);
            }
            else{
                $querry_delete="DELETE FROM Proveedores
                WHERE id_proveedor='$id'";

                $stm=sqlsrv_query($con, $querry_delete);
            }

            include_once("lista_proveedor.php");
        } 
        else {
            echo '<script>alert("Error al conectar con la base de datos"); </script>';
        }
    }
}
$obj = new Proveedor();
$obj->eliminar();

?>