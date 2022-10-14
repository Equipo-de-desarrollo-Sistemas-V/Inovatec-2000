<?php
    /* Llamamos al archivo que contiene la conexion a sqlserver */
    include 'conexiones.php';

    $id = "1";
    $nombre = "Matebook X 2022";
    $Apartado = "Computadoras";
    $Subapartado = "Laptops";
    $Precio_compra = "20000";
    $Precio_venta = "25000";
    $id_proveedor = "1";
    $descripcion = "Laptop de 16GB de RAM, 1TB de almacenamiento, 8GB de video, 4K";   
    $estado = "1";
    /* inserta dentro de tabla productos */
    $consulta = "INSERT INTO $tabla_productos (id_producto, nombre, Apartado, precio_com, precio_ven,id_proveedor, descripcion, Subapartado, Estado) VALUES ('$id', '$nombre', '$Apartado', '$Precio_compra', '$Precio_venta', '$id_proveedor', '$descripcion', '$Subapartado', '$estado')";

    $resultado = sqlsrv_query($conexion, $consulta);
?>