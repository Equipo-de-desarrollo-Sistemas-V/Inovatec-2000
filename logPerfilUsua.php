<?php
class PerfilUsuario{
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
            echo json_encode('registro');
            //echo "No se puedo conectar";
        }  
    }
    function actualizarDatos(){
        $ingreso="Retzat";
        $nombreCliente=$_POST['nombre-cliente'];
        $apellidoPaterno=$_POST["apellido-paterno"];
        $apellidoMaterno=$_POST["apellido-materno"];
        $correoPersona=$_POST["correo"];
        $telefonoPersona=$_POST["telefono"];
        //$correoPersona="1correoleo2@gmail.com";
        //$telefonoPersona="1234567890";

        $ban1=false;
        self::conexion();
        if ($this->varConectado===true){
           try{
                $validarNombre=self::letras($nombreCliente);
                if ((strlen($nombreCliente)>40) or ($validarNombre===false)){
                    echo json_encode('nombre');
                    //echo "El nombre debe ser igual o menor a 40 carácteres (a-z / A-Z)";
                }else{
                    $validarAP=self::letras($apellidoPaterno);
                    $validarAM=self::letras($apellidoMaterno);
                    if ((strlen($apellidoPaterno)>20) or ($validarAP===false) or (strlen($apellidoMaterno)>20) or ($validarAM===false)){
                        echo json_encode('apellidos');
                        //echo "Los apellidos debe contener igual o menos de 20 carácteres, cada uno. (a-z / A-Z)";
                    }else{
                        if((strlen($telefonoPersona)!=10) or (is_numeric($telefonoPersona)===false)){
                            echo json_encode('telefono');
                            //echo "El teléfono debe tener 10 dígitos (0-9)";
                        }else{
                            $query= "SELECT email FROM Persona where usuario ='".$ingreso."'";
                            $resultado=sqlsrv_query( $this->con, $query);
                            $row1 = sqlsrv_fetch_array($resultado);
                            $resAux=$row1['email'];
                            $b1=false;
                            $b2=false;
                            if ($correoPersona===$resAux){
                                $b1=true;
                                $b2=true;
                            }else {
                                $query= "SELECT email FROM Persona where email ='".$correoPersona."'";
                                $resultado=sqlsrv_query( $this->con, $query);
                                $arreResul = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
                                if (!empty($arreResul)){
                                    echo json_encode('correo');
                                    //echo "El correo ya se encuentra registrado en el sistema.";
                                }else{
                                    $b1=true;
                                    $b2=true;
                                    $query= "UPDATE Persona set email = '".$correoPersona."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    /*include_once("VerifyEmail.php");
                                    $vmail = new verifyEmail();
                                    if ($vmail->check($correoPersona)) {
                                        echo "correo valido";
                                    }elseif ($vmail->isValid($correoPersona)) {
                                        echo 'email &lt;' . $correoPersona . '&gt; valid, but not exist!';
                                        //echo '<script>alert("Por favor inserte un correo válido")</script>';
                                        
                                    } else {
                                        echo 'email &lt;' . $correoPersona . '&gt; not valid and not exist!';
                                        //echo '<script>alert("Por favor inserte un correo válido")</script>';
                                    }*/
                                }
                            }
                            if ($b1===true and $b2===true){
                                $query= "UPDATE Persona set nombres = '".$nombreCliente."'where Usuario='".$ingreso."'" ;
                                $resultado=sqlsrv_query( $this->con, $query);
                                $query= "UPDATE Persona set ap_paterno = '".$apellidoPaterno."'where Usuario='".$ingreso."'" ;
                                $resultado=sqlsrv_query( $this->con, $query);
                                $query= "UPDATE Persona set ap_materno = '".$apellidoMaterno."'where Usuario='".$ingreso."'" ;
                                $resultado=sqlsrv_query( $this->con, $query);
                                $query= "UPDATE Direccion set telefono = '".$telefonoPersona."'where Usuario='".$ingreso."'" ;
                                $resultado=sqlsrv_query( $this->con, $query);
                                $ban1=true;
                            } 
                            
                        }
                    }
                }
            }catch (Exception $e){
                    $this->varConectado=false;
                    sqlsrv_close($this->con);
                    }        
            }
            if ($ban1===true){
                echo json_encode('datAct');
                // echo "Datos actualizados";
                $this->varConectado=false;
                sqlsrv_close($this->con);
            }
    }

    function letras($cadena){
        $longi=strlen($cadena);
        $ban=0;
        for($i=0;$i<strlen($cadena);$i++){
            if(ord($cadena[$i])>=65 and ord($cadena[$i])<=90){
                $ban++;
            }
            if(ord($cadena[$i])>=97 and ord($cadena[$i])<=122){
                $ban ++;
            }
            if(ord($cadena[$i])>=160 and ord($cadena[$i])<=165){
                $ban+=2;
            }/*if((ord($cadena[$i])==130) or (ord($cadena[$i])==181)or (ord($cadena[$i])==144)or (ord($cadena[$i])==214) or 
            (ord($cadena[$i])==224)or (ord($cadena[$i])==233)){
                $ban+=2;
            }*/
        }
        if ($ban===$longi){
            return true;
        }else{
            return false;
        }
    }
}
$per= new PerfilUsuario;
$per->actualizarDatos();
?>