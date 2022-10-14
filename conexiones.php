<?php
    /* Deifnir las constantes generales de la conexion a la base de datos en SQLServer*/
    $nombre_servidor = "localhost";
    $nombre_usuario = "usuario";
    $password = "123";
    $nombre_bd = "PagVentas";

    /* Declarar todas las constantes de todos los nombres para las tablas */
    $tabla_apartados = "Apartados";
    $tabla_direccion = "Direccion";
    $tabla_empleados = "Empleados";
    $tabla_estados = "estados";
    $tabla_estadosMunicipios = "estados_municipios";
    $tabla_imagenes = "imagenes";
    $tabla_inventario = "Inventario_suc";
    $tabla_municipios = "municipios";
    $tabla_permisos = "Permisos";
    $tabla_persona = "Persona";
    $tabla_productos = "Productos";
    $tabla_proveedores = "Proveedores";
    $tabla_subapartados = "Subapartados";
    $tabla_sucursal = "Sucursal";
    $tabla_tarjetas = "Tarjetas";
    $tabla_ventas = "Ventas";
    
    /* Crear la conexion a la base de datos para SQLServer*/
    $connectionInfo = array( "Database"=>$nombre_bd, "UID"=>$nombre_usuario, "PWD"=>$password, "CharacterSet" => "UTF-8");
    $conn = sqlsrv_connect($nombre_servidor, $connectionInfo);

    /* if( $conn ) {
        echo "Conexión establecida.<BR>";
    }else{
        echo "Conexión no se pudo establecer.<BR>";
        die( print_r( sqlsrv_errors(), true));
    } */
?>  