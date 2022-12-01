<?php
    $contrasena = "ProyectoProgramacion5";
    $servidor = "inovatecserver.database.windows.net";
    $usuario = "Inovatecadm";
    $bd = "InovatecBD";

    $conexion = sqlsrv_connect($servidor, array("UID" => $usuario, "PWD" => $contrasena, "Database" => $bd, "CharacterSet" => "UTF-8"));

    array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");

    if($conexion){
        echo "Conexión establecida.<br />";
    }else{
        echo "Conexión no se pudo establecer.<br />";
        die(print_r(sqlsrv_errors(), true));
    }

    $consulta = "SELECT campo FROM pruebas";
    $resultado = sqlsrv_query($conexion, $consulta);

    if($resultado){
        echo "Consulta ejecutada.<br />";
        /* Muesrtra el resultado de la consulta */   
        while($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){
            echo $fila['campo'] . "<br />";
        }
    }else{
        echo "Consulta no se pudo ejecutar.<br />";
        die(print_r(sqlsrv_errors(), true));
    }
?>