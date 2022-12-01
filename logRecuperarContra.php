<?php
$servername = "inovatecserver.database.windows.net";
$info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($servername, $info);

if($con){
    $codigo=$_POST['codigo'];
    $newPassword=$_POST['contraseña'];
    $correo=$_POST['correo'];

    $query= "SELECT Codigo
        FROM recuperacion 
        where usuario ='$correo'";
    $resultado=sqlsrv_query($con, $query);
    $row = sqlsrv_fetch_array($resultado);
    $codigoBD=$row['Codigo'];

    if($codigo==$codigoBD){
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

            $query= "SELECT COUNT(*) as tot
            FROM Empleados 
            where email ='$correo'";
            $resultado=sqlsrv_query($con, $query);
            $row = sqlsrv_fetch_array($resultado);
            $x=$row['tot'];
            if ($x!=0){
                $query= "UPDATE Empleados set contra_em = '$clave'
                where email ='$correo'" ;
                $resultado=sqlsrv_query( $con, $query);
            }else{
                $query= "UPDATE Persona set Contra_us = '".$clave."'
                where Usuario='".$usuario."'" ;
                $resultado=sqlsrv_query( $con, $query);
            }
            $query= "DELETE FROM recuperacion
            where usuario ='$correo'" ;
            $resultado=sqlsrv_query( $con, $query);

            sqlsrv_close($con);
            echo json_encode("Actualizado");
        }

    }else{
        echo json_encode('Código incorrecto');
    }


}else{
    sqlsrv_close($con);
    echo json_encode("Fallo al conectar a la base de datos.");
}





?>