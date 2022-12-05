<?php
$servername = "inovatecserver.database.windows.net";
$info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($servername, $info);

if($con){
    $correo_destino=$_POST['emailVal'];

    //verifico que el correo pertenezca a un empleado o cliente
    $query= "SELECT email 
        FROM Persona 
        where email ='$correo_destino'";
    $resultado=sqlsrv_query( $con, $query);
    $arreResul = sqlsrv_fetch_array($resultado);  
    if (empty($arreResul)){         //si no encontro coincidencias en clientes, se pasa a empleados
        $query= "SELECT email 
        FROM Empleados 
        where email ='$correo_destino'";
        $resultado=sqlsrv_query($con, $query);
        $arreResul = sqlsrv_fetch_array( $resultado);

        if (empty($arreResul)){ 
            sqlsrv_close($con);
            echo json_encode('El correo no se encuentra registrado en el sistema.');
        }else{
            sqlsrv_close($con);;
            $msj=crearEmail($correo_destino);
            echo json_encode($msj);
        }
    }else{
        sqlsrv_close($con);
        $msj=crearEmail($correo_destino);
        echo json_encode($msj);
        
    }
}else{
    sqlsrv_close($con);
    echo json_encode("Fallo al conectar a la base de datos.");
}

//funcion para crear el correo
function crearEmail($correo_destino){
    $remitente ="inovatec2000st@gmail.com";
    $destinatario=$correo_destino;
    $asunto = "Código para recuperar tu contraseña";
    $codigo=random_int(1000,99999);
    //$cuerpo="Ingresa el siguiente código para recuperar tu contraseña. ".$codigo;
    $cuerpo=$codigo;

    //$msj=insertarCodigo($codigo, $correo_destino);
    $msj=MensajeEmail($remitente,$destinatario,$cuerpo,$asunto);
    return $msj;
}

function MensajeEmail($remitente,$destinatario,$cuerpo, $asunto){
    //manda el correo electronico
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $headers = "From:" . $remitente . " \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html\r\n";
    $resultado = mail($destinatario,$asunto,$cuerpo, $headers);
    //$resultado=true;
    if($resultado){
        return "Enviado";
    }else{
        return "No se pudo enviar el correo. Inténtelo más tarde.";
    }   
}

function insertarCodigo($codigo, $correo_destino){
    $servername = "inovatecserver.database.windows.net";
    $info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
    $con = sqlsrv_connect($servername, $info);

    if($con){
        $query="SELECT COUNT(*) as total
        FROM recuperacion 
        where Usuario ='$correo_destino'";
        $resultado=sqlsrv_query($con, $query);
        $row = sqlsrv_fetch_array( $resultado);
        if ($row['total']==0){
            $query="INSERT INTO recuperacion
            VALUES('$correo_destino', '$codigo')";
            $resultado=sqlsrv_query($con, $query);
        }else{
            $updateQuery ="UPDATE recuperacion 
            SET Codigo='$codigo'
            WHERE Usuario='$correo_destino'";
            $resultado = sqlsrv_query($con, $updateQuery);
        }
        sqlsrv_close($con);

    }else{
        sqlsrv_close($con);
        return "Fallo al conectar a la base de datos.";
}
}


?>