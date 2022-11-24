<?php
//conexion a la BD
$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 

if($con){
    //obtengo el usuario que ha iniciado sesion
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    //Obtengo los valores de los input
    $nombreTarjeta = $_POST['nombreTarjeta'];
    $numeroTarjeta = $_POST['numeroTarjeta'];
    $monthExpiracion = $_POST['monthExpiracion'];
    $yearExpiracion = $_POST['yearExpiracion'];
    
    if((is_numeric($monthExpiracion)==false) or ($monthExpiracion>12) or ($monthExpiracion<1)){
        sqlsrv_close($con);
        echo json_encode("El mes de expiración debe ser un número entre 1 y 12");
    }else{
        if((is_numeric($yearExpiracion)==false) or ($yearExpiracion<22) or ($yearExpiracion>39)){
            sqlsrv_close($con);
            echo json_encode("El mes de expiración debe ser de dos dígitos ((mayor o igual al año 2022))");
        }else{
            $query= "UPDATE Tarjetas set Nombre_Tar = '".$nombreTarjeta."',
                no_tarjeta = '".$numeroTarjeta."',
                fecha_ven_mes = '".$monthExpiracion."',
                fecha_ven_anio = '".$yearExpiracion."'
                where Usuario='".$usuario."'" ;
            $resultado=sqlsrv_query( $con, $query);
            sqlsrv_close($con);
            echo json_encode("Datos bancarios actualizados exitosamente");
        }
    }
}else{
    echo json_encode("Fallo al conectar a la base de datos");
}

?>