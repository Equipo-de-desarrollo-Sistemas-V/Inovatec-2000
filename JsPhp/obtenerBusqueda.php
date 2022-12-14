<?php
    error_reporting(0);
    session_start();
    $sesion_i = $_SESSION["Usuario"];

    include '../conexiones.php';
    $nombre_buscador = $_POST['busqueda'];



    $resultado_productos = sqlsrv_query($conexion, "SELECT productos.nombre, precio_ven, apartados.nombre as categoria, Subapartados.SubApartado as subcategoria, ruta, productos.id_producto 
    FROM [Productos], [Apartados], [Subapartados], [imagenes] 
    WHERE (Productos.nombre like '%".$nombre_buscador."%' or 
    descripcion like '%".$nombre_buscador."%' or
    Apartados.Nombre like '%".$nombre_buscador."%' or
    Subapartados.SubApartado like '%".$nombre_buscador."%') and 
    Apartado = Apartados.ID_ap and 
    Productos.Subapartado = Id_subap and 
    Productos.id_producto = imagenes.id_prod");

    /* Verficamos que la consulta se haya realizado de manera correcta */
    if($resultado_productos === false){
        $mensaje = die(print_r(sqlsrv_errors(), true));
        echo json_encode($mensaje);
    }
    else{
        /* Creamos un arreglo para almacenar los datos de la consulta */
        $nombres_productos = array();
        $precios_productos = array();
        //$categorias_productos = array();
        $subcategorias_productos = array();
        $rutas_productos = array();
        $id_productos = array();

        /* Recorremos los datos de la consulta */
        while($fila = sqlsrv_fetch_array($resultado_productos, SQLSRV_FETCH_ASSOC)){
            $nombres_productos[] = $fila['nombre'];
            $precios_productos[] = $fila['precio_ven'];
            $categorias_productos[] = $fila['categoria'];
            $subcategorias_productos[] = $fila['subcategoria'];
            $rutas_productos[] = $fila['ruta'];
            $id_productos[] = $fila['id_producto'];
        }

        /* Elimina los dos ulimos digitos a los precios */
        $precios_productos = array_map(function($precio){
            return substr($precio, 0, -2);
        }, $precios_productos);

        /* Creamos un arreglo para almacenar los datos de la consulta */
        $data = array('nombres' => $nombres_productos, 'precios' => $precios_productos, 'subcategorias' => $subcategorias_productos, 'rutas' => $rutas_productos, 'id_productos' => $id_productos);
        echo json_encode($data);
    }
?>