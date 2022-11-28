<?php
    include '../conexiones.php';
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    $id_producto = $_POST['id'];

    $resultado = sqlsrv_query($conexion, "DELETE FROM $tabla_carrito WHERE id_producto = '$id_producto' and usuario = '$usuario'");

    /* Verficamos que la consulta se haya realizado de manera correcta */
    if($resultado === false){
        $mensaje = die(print_r(sqlsrv_errors(), true));
        echo json_encode($mensaje);
    }
    else{
        $mensaje = "Producto eliminado del carrito";
        echo json_encode($mensaje);
    }
?>