<?php
class login{
    function verifica(){
        #Conexion a la base de datos
        $in=new login;
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conn_sis= sqlsrv_connect($serverName, $connectionInfo);

        $usuario = $_POST["email"];
        $palabra_secreta = $_POST["password"];

        //Verficar si es un empleado
        $query="SELECT id_empleado, nombres, email FROM Empleados WHERE email='$usuario'";
        $res= sqlsrv_query($conn_sis, $query);

        if($res === false){
            die(print_r(sqlsrv_errors(), true));
        }

        else{
            $arreEmpl = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);
            if (!empty($arreEmpl)) {
                $id=$arreEmpl['id_empleado'];
                $query1 = "SELECT contra_em FROM Empleados WHERE email='$usuario'";
                $res = sqlsrv_query($conn_sis, $query1);
                $row = sqlsrv_fetch_array($res);
                $contraHash = $row['contra_em'];
                if (password_verify($palabra_secreta, $contraHash)) {
                    $query000="SELECT permiso7 FROM Permisos WHERE id_empleado='$id' ORDER BY id_empleado";
                    $res000= sqlsrv_query($conn_sis, $query000);
                    $permiso=sqlsrv_fetch_array($res000, SQLSRV_FETCH_ASSOC);
                    if(!empty($permiso)){
                        $perm=$permiso["permiso7"];
                        if($perm===1){
                            echo json_encode("permiso");
                        }else{
                            session_start();
                            $_SESSION["nombres"] = $arreEmpl['nombres'];
                            echo json_encode("admin");
                        }
                    }
                    
                } else {
                        echo json_encode("usuario error");
                }   
            } else {
                $query = "SELECT Usuario, email FROM Persona WHERE email='$usuario'";
                $res = sqlsrv_query($conn_sis, $query);
                $arreClien = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);
                if (!empty($arreClien)) {
                    $query1 = "SELECT Contra_us FROM Persona WHERE email='$usuario'";
                    $res = sqlsrv_query($conn_sis, $query1);
                    $row = sqlsrv_fetch_array($res);
                    $contraHash = $row['Contra_us'];
                    if (password_verify($palabra_secreta, $contraHash)) {
                        //echo $arreClien['Usuario'];
                        $file = fopen("archivo_correo.txt", "w");
                        fwrite($file, $arreClien['Usuario'] . PHP_EOL);
                        fclose($file);
                        //echo json_encode("todo bien");
                        session_start();
                        $_SESSION["Usuario"] = $arreClien['Usuario'];
                        echo json_encode("cliente");
                        //include "perfilCliente.php";
                    } else {
                        echo json_encode("usuario error");
                    }
                } else {
                    echo json_encode("usuario no registrado");
                }
            }
        }
        sqlsrv_close($conn_sis);
}
}

$log=new login();
$log->verifica();
?>