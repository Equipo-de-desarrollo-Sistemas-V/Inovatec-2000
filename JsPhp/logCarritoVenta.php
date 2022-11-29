<?php
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    include '../conexiones.php';

    $resultado_carrito = sqlsrv_query($conexion, "SELECT carritoclientes.id_producto, carritoclientes.cantidad, Inventario_suc.cantidad
    FROM $tabla_carrito, $tabla_productos, $tabla_inventario
    WHERE carritoclientes.id_producto = Productos.id_producto and
    Productos.id_producto = Inventario_suc.id_producto 
    Usuario='$usuario'");


    /* Verficamos que la consulta se haya realizado de manera correcta */
    if($resultado_carrito === false){
        $mensaje = die(print_r(sqlsrv_errors(), true));
        echo json_encode($mensaje);
    }
    else{
        /* Creamos un arreglo para almacenar los datos de la consulta */
        $id_existentes = array();
        $cantidad_existentes = array();
        $id_no_existentes = array();

        /* Recorremos los datos de la consulta */
        while($fila = sqlsrv_fetch_array($resultado_carrito, SQLSRV_FETCH_ASSOC)){
            if($fila['Inventario_suc.cantidad']>=$fila['carritoclientes.cantidad']){
                $id_existentes[] = $fila['id_producto'];
                $cantidad_existentes[] = $fila['carritoclientes.cantidad'];
            }else{
                $id_no_existentes[] = $fila['id_producto'];
            }
        }

        /* Creamos un arreglo para almacenar los datos de la consulta */
        $data = array('id_existentes' => $id_existentes, 'cantidad_existentes' => $cantidad_existentes, 'id_no_existentes' => $id_no_existentes);
        echo json_encode($data);
    }
?>