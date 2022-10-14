<?php
    include("conexiones.php");

    $resultado = sqlsrv_query($conexion, "SELECT productos.nombre, precio_ven, apartados.nombre as categoria, Subapartados.SubApartado as subcategoria FROM $tabla_productos, $tabla_apartados, $tabla_subapartados where Apartado = Apartados.ID_ap and Productos.Subapartado = Id_subap");
    
    /* Declara una lista y guarda los valores dentro de una lista independiente pora nombre, precio_ven y apartados.nombre */
    $nombres = array();
    $precios = array();
    $categorias = array();
    $subcategorias = array();

    while($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){
        $nombres[] = $fila['nombre'];
        $precios[] = $fila['precio_ven'];
        $categorias[] = $fila['categoria'];
        $subcategorias[] = $fila['subcategoria'];
    }

    /* llama al elemento  */
    
    
?>