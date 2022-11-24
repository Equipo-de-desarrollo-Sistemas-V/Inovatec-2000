<?php
//conexion a la BD
$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 
//echo json_encode("AQUIOIIIIIIIIIIIII");
if($con){    
    
    //obtengo el usuario que ha iniciado sesion
    
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    //Obtengo los valores de los input
    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];

    //obtengo la contrase;a actual y comparo con la ingresada
    $query= "SELECT Contra_us 
        FROM Persona 
        where usuario ='".$usuario."'";
    $resultado=sqlsrv_query($con, $query);
    $row = sqlsrv_fetch_array($resultado);
    $hash=$row['Contra_us'];

    if (password_verify($password, $hash)){
        $bandn = 0;
        $bandc = 0;
        $bandM = 0;
        $bandm = 0;
        for($i=0;$i<strlen($newPassword);$i++){
            //verificar que tenga numeros
            if(ord($newPassword[$i])>=48 and ord($newPassword[$i])<=57){
                $bandn ++;
            }
            //verificar que tenga caracteres especiales
            if((ord($newPassword[$i]) >=32) and (ord($newPassword[$i]) <=47 or ord($newPassword[$i])>=58) and (ord($newPassword[$i])<=64 or ord($newPassword[$i])>=91)   and (ord($newPassword[$i])<=96 or ord($newPassword[$i])>=123)){
                $bandc ++;
            }
            //verificar que tenga mayusculas
            if(ord($newPassword[$i])>=65 and ord($newPassword[$i])<=90){
                $bandM ++;
            }
            //verificar que tenga minusculas
            if(ord($newPassword[$i])>=97 and ord($newPassword[$i])<=122){
                $bandm ++;
            }
        }
        
        if($bandn == 0 or $bandc == 0 or $bandm == 0 or $bandM == 0){
            sqlsrv_close($con);
            echo json_encode('La nueva contraseña debe contener números, mayúsculas, minúsculas y caracteres especiales');
        }else{
            $clave = password_hash($newPassword, PASSWORD_DEFAULT);
            $query= "UPDATE Persona set Contra_us = '".$clave."'
                where Usuario='".$usuario."'" ;
            $resultado=sqlsrv_query( $con, $query);
            sqlsrv_close($con);
            echo json_encode("Contraseña actualizada exitosamente");
        }
    }else{
        sqlsrv_close($con);
        echo json_encode("La contraseña actual ingresada no coincide con la registrada");
    }
}else{
    echo json_encode("Fallo al conectar a la base de datos");
} 
?>