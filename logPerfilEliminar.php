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
    $deletePassword = $_POST['deletePassword'];

    //Comparo que la contrase;a sea la que esta registrada
    $query= "SELECT* 
        FROM Persona 
        WHERE Usuario='$usuario'";
    $resultado=sqlsrv_query( $con, $query);
    $row = sqlsrv_fetch_array($resultado);
    $hash=$row['Contra_us'];
    if (password_verify($deletePassword, $hash)){
        echo json_encode("Confirmar eliminar");
    }else{
        echo json_encode("Contraseña incorrecta");
    }
    sqlsrv_close($con);
}else{
    echo json_encode("Fallo al conectar a la base de datos");
} 
?>