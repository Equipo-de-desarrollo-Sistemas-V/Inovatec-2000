<?php

class Sucursal
{
    function eliminar()
    {

        
        //informacion para la conexion a la base de datos
        $servername = "inovatecserver.database.windows.net";
        $info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
        $con = sqlsrv_connect($servername, $info);

        if ($con) {
            //obtener el ID del URL
            $id = $_GET['id'];
            $deshabilita = false;
            //echo $id. '<br>';

            //verificar si la sucursal tiene registros en ventas
            $querry_ventas  = "SELECT * FROM ventas
            WHERE id_suc = '$id'";
            //echo '<script>alert('. $id. ');</script>';

            $resultados_ventas = sqlsrv_query($con, $querry_ventas);

            if (sqlsrv_fetch_array($resultados_ventas)) {
                //echo '<script>alert("Esta sucursal todavía tiene ventas registradas, necesarias para el balance, por lo que no puede ser eliminada. La sucursal será deshabilitada");</script>';
                $deshabilita = true;
            } 
            
            else {
                //verifica si la sucursal tiene productos en el inventario
                $querry_inventario  = "SELECT * FROM Inventario_suc
                    WHERE id_sucursal = '$id'";
                //echo '<script>alert('. $id. ');</script>';

                $resultados_inventario = sqlsrv_query($con, $querry_inventario);

                if (sqlsrv_fetch_array($resultados_inventario)) {
                    $deshabilita = true;
                }

                else{
                    //verifica si hay trabajadores registrados en esa sucursal
                    $querry_empleados = "SELECT * FROM Empleados 
                    WHERE sucursal = '$id'";

                    $resultados_empleado = sqlsrv_query($con, $querry_empleados);

                    if(sqlsrv_fetch_array($resultados_empleado)){
                        $deshabilita = true;
                    }
                }
            }

            //verifica si se encontro alguna tabla, en caso afirmativo deshabilida la sucursal, de lo contrario, la elimina
            if($deshabilita == true){
                $querry_update = "UPDATE sucursal
                SET Estado = 'Deshabilitado' 
                WHERE id_sucursal = '$id'";

                $stm = sqlsrv_query($con, $querry_update);
            }

            else{
                $querry_delete = "DELETE FROM sucursal
                WHERE id_sucursal = '$id'";

                $stm = sqlsrv_query($con, $querry_delete);
            }

            include_once("lista_sucursal.php");

        } 
        
        else {
            echo '<script>alert("Error al conectar con la base de datos"); </script>';
        }
    }
}

$obj = new Sucursal();
$obj->eliminar();

?>
