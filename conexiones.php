<?php
    /* Deifnir las constantes generales de la conexion a la base de datos en SQLServer*/
    $nombre_servidor = "inovatecserver.database.windows.net";
    $nombre_usuario = "Inovatecadm";
    $password = "ProyectoProgramacion5";
    $nombre_bd = "InovatecBD";

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
    $tabla_carrito = "carritoclientes";
    
    /* Crear la conexion a la base de datos para SQLServer*/
    $connectionInfo = array("Database"=>$nombre_bd, "UID"=>$nombre_usuario, "PWD"=>$password, "CharacterSet" => "UTF-8");
    $conexion = sqlsrv_connect($nombre_servidor, $connectionInfo);

    /* Verificar la conexion a la base de datos */
    if( $conexion === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    else{
        //echo "Conexion exitosa";
    }
?>  