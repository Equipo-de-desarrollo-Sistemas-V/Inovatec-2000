<?php
    include '../conexiones.php';
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    $id_producto = $_POST['id'];
    $cantidad_producto = $_POST['cantidad'];

    $resultado = sqlsrv_query($conexion, "UPDATE carritoclientes 
    SET cantidad='$cantidad_producto'
    WHERE id_producto = '$id_producto' and usuario = '$usuario'");

    /* Verficamos que la consulta se haya realizado de manera correcta */
    if($resultado === false){
        $mensaje = die(print_r(sqlsrv_errors(), true));
        echo json_encode($mensaje);
    }
    else{
        $mensaje = "Actualizacion completa";
        echo json_encode($mensaje);
    }
?>