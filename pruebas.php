<?php
    //incluimos el archivo de conexion a la base de datos
    include("conexiones.php");

    //creamos la consulta
    $resultado_seccion1 = sqlsrv_query($conexion, "SELECT productos.nombre, precio_ven, Subapartados.SubApartado as subcategoria 
    FROM productos, apartados, subapartados, imagenes 
    WHERE Apartado = Apartados.ID_ap 
    and Productos.Subapartado = Id_subap 
    and Apartados.nombre = 'Computadoras'
    and Productos.id_producto = imagenes.id_prod");

    

?>