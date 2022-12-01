<?php
//conexion a la BD
$serverName='inovatecserver.database.windows.net';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 

if($con){
    //obtengo el usuario que ha iniciado sesion
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    //Obtengo los valores de los input
    $nombreCliente = $_POST['nombreCliente'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    //Comparo el email ingresado con el actual, si es igual, no hay problema
    $query= "SELECT email 
        FROM Persona 
        where usuario ='".$usuario."'";
    $resultado=sqlsrv_query( $con, $query);
    $row = sqlsrv_fetch_array($resultado);
    $auxCorreo=$row['email'];
    if ($correo!=$auxCorreo){      //Si el correo es diferente, verifico que no le corresponda a otro usuario (Empleado/Cliente)
        $query= "SELECT email 
            FROM Persona 
            where email ='".$correo."'";
        $resultado=sqlsrv_query( $con, $query);
        $arreResul = sqlsrv_fetch_array( $resultado);
        if (!empty($arreResul)){
            sqlsrv_close($con);
            echo json_encode('El correo ya se encuentra registrado.');
        }else{
            $query= "SELECT email 
                FROM Empleados 
                where email ='".$correo."'";
            $resultado=sqlsrv_query( $con, $query);
            $arreResul = sqlsrv_fetch_array( $resultado);
            if (!empty($arreResul)){
                sqlsrv_close($con);
                echo json_encode('El correo ya se encuentra registrado.');
            }else{
                actualizar($nombreCliente, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $usuario, $con);
            }
        }
    }else{
        actualizar($nombreCliente, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $usuario, $con);
    }
}else{
    echo json_encode("Fallo al conectar a la base de datos");
}

function actualizar($nombreCliente, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $usuario, $con){
    $query= "UPDATE Persona set nombres = '".$nombreCliente."',
        ap_paterno = '".$apellidoPaterno."', 
        ap_materno = '".$apellidoMaterno."',
        telefono = '".$telefono."',
        email = '".$correo."'
        where Usuario='".$usuario."'" ;
    $resultado=sqlsrv_query( $con, $query);
    sqlsrv_close($con);
    echo json_encode("Datos personales actualizados exitosamente");
    }  
?>