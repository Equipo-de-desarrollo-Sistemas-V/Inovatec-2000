<?php
//conexion a la BD
$serverName='inovatecserver.database.windows.net';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 

if($con){
    //echo json_encode("Hola");
    
    //obtengo el usuario que ha iniciado sesion
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    //Obtengo los valores de los input
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $colonia = $_POST['colonia'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $codigoPostal = $_POST['codigoPostal'];

    //Obtengo el id que relacion el municipio con el estado
    $query = "SELECT  id 
        FROM estados_municipios
        where estados_id= '$estado'
        and municipios_id = '$municipio'";
        $resultado = sqlsrv_query($con, $query);
    $row = sqlsrv_fetch_array($resultado);
    $relacion = $row["id"];

    //Actualizo la direccion
    $query= "UPDATE Direccion set calle = '".$calle."',
        no_calle = '".$numero."',
        colonia = '".$colonia."',
        Ciudad_Estado = '".$relacion."',
        codigo_postal = '".$codigoPostal."'
        where Usuario='".$usuario."'" ;
        $resultado=sqlsrv_query( $con, $query);
    sqlsrv_close($con);
    echo json_encode("Dirección actualizada exitosamente");
}else{
    echo json_encode("Fallo al conectar a la base de datos");
} 
?>