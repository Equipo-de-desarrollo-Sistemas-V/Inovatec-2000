<?php
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    include '../conexiones.php';

    $resultado_productos = sqlsrv_query($conexion, "SELECT carritoclientes.id_producto, carritoclientes.cantidad
    FROM $tabla_carrito, $tabla_productos
    WHERE carritoclientes.id_producto = Productos.id_producto and
    Usuario='$usuario'");

    /* Verficamos que la consulta se haya realizado de manera correcta */
    if($resultado_productos === false){
        $mensaje = die(print_r(sqlsrv_errors(), true));
        echo json_encode($mensaje);
    }
    else{
        /* Creamos un arreglo para almacenar los datos de la consulta */
        $id_existentes = array();
        $cantidad_existentes = array();
        $id_no_existentes = array();

        /* Recorremos los datos de la consulta que si completan el stock*/
        while($fila = sqlsrv_fetch_array($resultado_productos, SQLSRV_FETCH_ASSOC)){
            $cantidadSucursal = getCantidad($fila["id_producto"]);
            if ($cantidadSucursal>=$fila['cantidad']){
                $id_existentes[] = $fila['id_producto'];
                $cantidad_existentes[] = $fila['cantidad'];
            }else{
                $id_no_existentes[] = $fila['id_producto'];
            }
        }

        /* Creamos un arreglo para almacenar los datos de la consulta */
        $data = array('id_existentes' => $id_existentes, 'cantidad_existentes' => $cantidad_existentes, 'id_no_existentes' => $id_no_existentes);
        echo json_encode($data);
    }


    function getCantidad($id_prod){
        $serverName = 'localhost';
        $connectionInfo = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
        $con = sqlsrv_connect($serverName, $connectionInfo);
    
    
        $query = "SELECT cantidad FROM Inventario_suc
        WHERE id_producto = $id_prod";
    
        $resultado = sqlsrv_query($con, $query);
    
        $acum = 0;
    
        while($row = sqlsrv_fetch_array($resultado)){
            $acum = $acum + $row["cantidad"];
        }
        sqlsrv_close($con);
        return $acum;
    }

?>