<?php
$serverName='inovatecserver.database.windows.net';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 

if($con){
    //obtengo el usuario que ha iniciado sesion
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    //procedo a eliminar todo registro del usuario en la BD
    $query= "DELETE FROM Tarjetas 
        WHERE Usuario='$usuario'";
    $resultado=sqlsrv_query($con, $query);

    $query= "DELETE FROM Direccion 
        WHERE Usuario='$usuario'";
    $resultado=sqlsrv_query( $con, $query);

    $query= "DELETE FROM carritoclientes 
        WHERE Usuario='$usuario'";
    $resultado=sqlsrv_query( $con, $query);

    $query= "DELETE FROM Persona 
        WHERE Usuario='$usuario'";
    $resultado=sqlsrv_query($con, $query);
    echo"<script>alert('Cuenta eliminada')</script>";
    session_start();
    session_unset();
    session_destroy();
    header("Location:index.php");
                        //location.href="index.php";
}else{
    echo json_encode("Fallo al conectar a la base de datos");
} 
sqlsrv_close($con);
?>