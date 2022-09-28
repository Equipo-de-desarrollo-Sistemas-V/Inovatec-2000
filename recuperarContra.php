<?php
//<!-- Logica para RECUPERAR ENVIAR CORREO Y PODER RECUPERAR CONTRASEÑA -->
class Envio{
    public $con;
    public $varConectado = false;
    
    //conexion a la base de datoss
    function conexion(){
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        try{
           $this->con = sqlsrv_connect($serverName, $connectionInfo); 
           $this->varConectado=true;
        }catch (Exception $e){
            echo json_encode('conR');
        }  
    }
    //funcion para verificar que el correo sea valido y este registrado en el sistema
    function verificarCorreo(){
        $correo_destino=$_POST["email"];

        //verificar si el correo existe
        include_once("VerifyEmail.php");

        $vmail = new verifyEmail();

        if ($vmail->check($correo_destino)) {
            //echo json_encode('correo');
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
                                    //echo json_encode('empleado');
                                    $tipo="empleado";
                                    self::enviarCorrreo($correo_destino, $tipo);
                                }
                            }else{
                                //echo json_encode('cliente');
                                $tipo="cliente";
                                self::enviarCorrreo($correo_destino, $tipo);
                            }
                            $this->varConectado=false;
                            sqlsrv_close($this->con);
                        }catch (Exception $e){
                            $this->varConectado=false;
                            sqlsrv_close($this->con);
                        }        
                    }
        } else if ($vmail->isValid($correo_destino)) {
            echo json_encode('correoInvalido');
            // echo 'email &lt;' . $correo . '&gt; valid, but not exist!';
            // echo '<script>alert("Por favor inserte un correo válido")</script>';
            
        } else {
            echo json_encode('correoInvalido');
            // echo 'email &lt;' . $correo . '&gt; not valid and not exist!';
            // echo '<script>alert("Por favor inserte un correo válido")</script>';
        } 
    }

    //funcion para enviar el email junto con el link para ingresar un nueva contraseña
    function  enviarCorrreo($correo_destino, $tipo){
        $to=$correo_destino;
        $from="inovatec2000st@gmail.com";
        $subject="Recuperación de contraseña - InovaTec";  
        $message="Haz clic en el siguiente link para restablecer tu contrase;a";
        $headers="Desde".$from;
        $file = fopen("archivo_correo.txt", "w");
        fwrite($file, $correo_destino. PHP_EOL);
        fwrite($file, $tipo. PHP_EOL);
        fclose($file);
        //mail($to, $subject, $message, "From:$from"); 
        echo json_encode('correo');
    }  
    }

$rec= new Envio;
$rec->verificarCorreo();
?>