<?php
//<!-- Logica para RECUPERAR ENVIAR CORREO Y PODER RECUPERAR CONTRASEÑA -->
class Envio{

    //funcion para verificar que el correo sea valido y este registrado en el sistema
    function verificarCorreo(){
        $servername = "localhost";
        $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
        $con = sqlsrv_connect($servername, $info);

        if($con){
            $correo_destino=$_POST["email"];

            //verifico que el correo pertenezca a un empleado o cliente
            $query= "SELECT email 
                FROM Persona 
                where email ='".$correo_destino."'";
            $resultado=sqlsrv_query( $con, $query);
            $arreResul = sqlsrv_fetch_array($resultado);  

            if (empty($arreResul)){         //si no encontro coincidencias en clientes, se pasa a empleados
                $query= "SELECT email FROM Empleados where email ='".$correo_destino."'";
                $resultado=sqlsrv_query($con, $query);
                $arreResul = sqlsrv_fetch_array( $resultado);

                if (empty($arreResul)){ 
                    sqlsrv_close($con); 
                    //echo"<script>alert('no hay')</script>";
                    echo json_encode('registro');
                }else{
                    sqlsrv_close($con);
                    //echo"<script>alert('empleado')</script>";
                    $tipo="empleado";
                    self::crearEmail($correo_destino, $tipo);
                }
            }else{
                sqlsrv_close($con);
                //echo"<script>alert('cliente')</script>";
                $tipo="cliente";
                //self::enviarCorrreo($correo_destino, $tipo);
            }
            }else{
                sqlsrv_close($con);
                echo json_encode("conR");
        }
    }

    //funcion para crear el correo
    public function crearEmail($correo_destino, $tipo){
        $remitente ="inovatec2000st@gmail.com";
        // $destinatario= "tetillamas@gmail.com";
        $destinatario=$correo_destino;
        $asunto = "Código para recuperar tu contraseña";
        $codigo=random_int(1000,9999);
        $cuerpo="Ingresa el siguiente código para recuperar tu contraseña. ".$codigo;
        $this->MensajeEmail($remitente,$destinatario,$cuerpo,$asunto);
    }

    public function MensajeEmail($remitente,$destinatario,$cuerpo, $asunto){
        //manda el correo electronico
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $headers = "From:" . $remitente . " \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html\r\n";
        //$resultado = mail($destinatario,$asunto,$cuerpo, $headers);
        $resultado=true;
        if($resultado){
            echo json_encode('correo');
        }else{
            echo json_encode('correoNo');
        }   
    }

    public function insertarCodigo($codigo, $tipo){
        $servername = "localhost";
        $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
        $con = sqlsrv_connect($servername, $info);

        if($con){
            if ($tipo="empleado"){
                $query="SELECT COUNT(*)
                    FROM Empleados 
                    WHERE CodigoR = '$codigo'";
                $resul=sqlsrv_query($con, $query);
                

            }
            


            $query= "UPDATE Direccion set calle = '".$calle."',
            no_calle = '".$numero."',
            colonia = '".$colonia."',
            Ciudad_Estado = '".$relacion."',
            codigo_postal = '".$codigoPostal."'
            where Usuario='".$usuario."'" ;
                $resultado=sqlsrv_query($con, $query);
                $arreResul = sqlsrv_fetch_array( $resultado);

        }else{
            sqlsrv_close($con);
            echo json_encode("conR");
    }
    }
  
}


$rec= new Envio;
$rec->verificarCorreo();
?>