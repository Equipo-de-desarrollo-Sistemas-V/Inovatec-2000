<?php
    include '../conexiones.php';
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    $id_producto = $_POST['id'];

    $resultado = sqlsrv_query($conexion, "SELECT id_producto FROM $tabla_carrito 
    WHERE usuario = '$usuario'");

    /* Verficamos que la consulta se haya realizado de manera correcta */
    if($resultado === false){
        $mensaje = die(print_r(sqlsrv_errors(), true));
        echo json_encode($mensaje);
    }
    else{
        $id_productos = array();
        /* Recorremos los datos de la consulta */
        while($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){
            $id_productos[] = $fila['id_producto'];
        }

        /* Creamos un arreglo para almacenar los datos de la consulta */
        $data = array('id_productos' => $id_productos);
        echo json_encode($data);
    }
?>