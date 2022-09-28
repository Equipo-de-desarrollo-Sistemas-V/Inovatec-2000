<?php
//<!-- Logica para RECUPERAR ENVIAR CORREO Y PODER RECUPERAR CONTRASEÑA -->
//<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
class Envio{
    public $con;
    public $varConectado = false;

    function conexion(){
        $serverName='localhost';
        $connectionInfo=array("Database"=>"ClientePrueba", "UID"=>"Admin", "PWD"=>"12345", "CharacterSet"=>"UTF-8");
        try{
            $this->con = sqlsrv_connect($serverName, $connectionInfo); 
            $this->varConectado=true;
        }catch (Exception $e){
            echo json_encode('conR');
        }  
    }
    
    function verificarCorreo(){
        $correo_destino=$_POST["email"];
        self::conexion();
        if ($this->varConectado===true){
            try{
                $query= "SELECT email FROM Usuarios where email ='".$correo_destino."'";
                $resultado=sqlsrv_query( $this->con, $query);
                $arreResul = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
                if (empty($arreResul)){
                    $query= "SELECT email FROM Empleados where email ='".$correo_destino."'";
                    $resultado=sqlsrv_query( $this->con, $query);
                    $arreResul = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
                    if (empty($arreResul)){
                        echo json_encode('registro');
                    }else{
                        echo json_encode('empleado');
                        $tipo="empleado";
                        self::enviarCorrreo($correo_destino, $tipo);
                        }
                }else{
                    echo json_encode('cliente');
                    $tipo="cliente";
                    self::enviarCorrreo($correo_destino, $tipo);
                }
                $this->varConectado=false;
                sqlsrv_close($this->con);
            }catch (Exception $e){
                $this->varConectado=false;
                sqlsrv_close($this->con);
            }        }
    }

    function  enviarCorrreo($correo_destino, $tipo){
        $to=$correo_destino;
        $from="ale.74flor@gmail.com";
        $subject="Recuperación de contraseña - InovaTec";  
        $message="Haz clic en el siguiente link para restablecer tu contrase;a";
        $headers="Desde".$from;
        $file = fopen("archivo_correo.txt", "w");
        fwrite($file, $correo_destino. PHP_EOL);
        fwrite($file, $tipo. PHP_EOL);
        fclose($file);
        //mail($to, $subject, $message, "From:$from"); 
       // echo json_encode('correo');
    }  
    }

$rec= new Envio;
$rec->verificarCorreo();
?>