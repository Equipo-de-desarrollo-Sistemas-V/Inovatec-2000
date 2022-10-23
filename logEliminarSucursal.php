<?php

class Sucursal
{
    function eliminar()
    {

        
        //informacion para la conexion a la base de datos
        $servername = "localhost";
        $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
        $con = sqlsrv_connect($servername, $info);

        if ($con) {
            //obtener el ID del URL
            $id = $_GET['id'];
            //echo $id. '<br>';

            //verificar si la sucursal tiene registros en ventas
            $querry_ventas  = "SELECT * FROM ventas
            WHERE id_suc = '$id'";
            //echo '<script>alert('. $id. ');</script>';

            $resultados_ventas = sqlsrv_query($con, $querry_ventas);

            if (sqlsrv_fetch_array($resultados_ventas)) {
                echo '<script>alert("Esta sucursal todavía tiene ventas registradas, necesarias para el balance, por lo que no puede ser eliminada. La sucursal será deshabilitada");</script>';
                $querry_update = "UPDATE sucursal
                SET Estado = 'Dshabilitado'
                WHERE id_sucursal = '$id'";

                $stm_des = sqlsrv_query($con, $querry_update);

                echo '<script>alert("La sucursal '. $id . ' ha sido deshabilitada")</script>';
                include("lista_sucursal.php");
            } 
            
            else {
                //verifica si la sucursal tiene productos en el inventario
                $querry_inventario  = "SELECT * FROM Inventario_suc
                    WHERE id_sucursal = '$id'";
                //echo '<script>alert('. $id. ');</script>';

                $resultados_inventario = sqlsrv_query($con, $querry_inventario);

                if (sqlsrv_fetch_array($resultados_inventario)) {
                    echo '<script>alert("Todos los productos que tiene la sucursal '. $id. ' serán eliminados del inventario");</script>';
                    $querry_delete_inventario = "DELETE FROM Inventario_suc
                    WHERE id_sucursal = '$id'";

                    $stm_inv = sqlsrv_query($con, $querry_delete_inventario);
                }

                //verifica si hay empleados registrados en la sucursal
                $querry_empleados  = "SELECT id_empleado FROM Empleados
                    WHERE sucursal = '$id'";
                //echo '<script>alert('. $id. ');</script>';

                $resultados_empleados = sqlsrv_query($con, $querry_empleados);
                    $c = 0;
                    //elimina a los empleados de la tabla de permisoso
                    while($row = sqlsrv_fetch_array($resultados_empleados)){
                        $c++;
                        echo '<script>alert("si entra al ciclo");</script>';
                        $id_empleado = $row["id_empleado"];
                        echo '<script>alert("'.$id_empleado.'");</script>';

                        $querry_delete_permisos = "DELETE FROM Permisos
                            WHERE id_empleado = '$id_empleado'";

                        $stm_per = sqlsrv_query($con, $querry_delete_permisos);
                    }

                    if($c != 0){
                        echo '<script>alert("Todos los empleados de la sucursal ' . $id . ' serán eliminados del registro");</script>';
                    }

                    //elimina a los empleados de la tabla de empleados
                    $querry_delete_empleados = "DELETE FROM Empleados
                    WHERE sucursal = '$id'";

                    $stm_emp = sqlsrv_query($con, $querry_delete_empleados);
                

                //elimina ahora si la sucursal
                $querry_delete = "DELETE FROM sucursal
                WHERE id_sucursal = '$id'";
                $stm = sqlsrv_query($con, $querry_delete);
                echo '<script>alert("La sucursal y todos los datos relacionados con ella han sido eliminados correctamente");</script>';
                include_once("lista_sucursal.php");
            }

        } 
        
        else {
            echo '<script>alert("Error al conectar con la base de datos"); </script>';
        }
    }
}

$obj = new Sucursal();
$obj->eliminar();

?>
