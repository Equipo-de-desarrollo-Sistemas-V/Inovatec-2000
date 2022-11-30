<?php
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    include '../conexiones.php';

    $resultado_carrito = sqlsrv_query($conexion, "SELECT precio_ven, cantidad
    FROM $tabla_carrito, $tabla_productos
    WHERE carritoclientes.id_producto = Productos.id_producto and
    Usuario='$usuario'");


    /* Verficamos que la consulta se haya realizado de manera correcta */
    if($resultado_carrito === false){
        $mensaje = die(print_r(sqlsrv_errors(), true));
        echo json_encode($mensaje);
    }
    else{
        /* Creamos un arreglo para almacenar los datos de la consulta */
        $precios_productos = array();
        $cantidad_productos = array();

        /* Recorremos los datos de la consulta */
        while($fila = sqlsrv_fetch_array($resultado_carrito, SQLSRV_FETCH_ASSOC)){
            $precios_productos[] = $fila['precio_ven'];
            $cantidad_productos[] = $fila['cantidad'];
        }

        /* Elimina los dos ulimos digitos a los precios */
        $precios_productos = array_map(function($precio){
            return substr($precio, 0, -2);
        }, $precios_productos);

        /* Creamos un arreglo para almacenar los datos de la consulta */
        $data = array('precios' => $precios_productos, 'cantidad' => $cantidad_productos);
        echo json_encode($data);
    }
?>