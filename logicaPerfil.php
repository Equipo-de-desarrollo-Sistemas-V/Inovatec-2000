<?php
class PerfilCliente{
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
            //echo json_encode('conR');
            echo "No se puedo conectar";
        }  
    }

    function mostrarDatos(){

    }

    function botones(){
        $boton1="";
        $boton2="";
        $boton3="";
        $boton4="";
        if(isset($_POST['boton1']))$boton1=$_POST['boton1'];
        if(isset($_POST['boton2']))$boton2=$_POST['boton2'];
        if(isset($_POST['boton3']))$boton3=$_POST['boton3'];
        if(isset($_POST['boton4']))$boton4=$_POST['boton4'];

        if($boton1){
            echo "Se pulso el boton 1";
            self::actualizarDatos();
        }
        if ($boton2){
            echo "Se pulso el boton 2";
            self::actualizarDirec();
        }
        if($boton3){
            echo "Se pulso el boton 3";
            self::actualizarContra();
        }
        if ($boton4){
            echo "Se pulso el boton 4";
            self::actualizarBanco();
        }
    }

    function actualizarDatos(){
        $ingreso="Retzat";
        $nombreCliente=$_POST["nombre-cliente"];
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
                    echo "El nombre debe ser menor a 40 carácteres (a-z / A-Z)";
                }else{
                    $validarAP=self::letras($apellidoPaterno);
                    $validarAM=self::letras($apellidoMaterno);
                    if ((strlen($apellidoPaterno)>20) or ($validarAP===false) or (strlen($apellidoMaterno)>20) or ($validarAM===false)){
                        echo "Los apellidos debe contener menos de 20 carácteres, cada uno. (a-z / A-Z)";
                    }else{
                        $query= "SELECT email FROM Persona where email ='".$correoPersona."'";
                        $resultado=sqlsrv_query( $this->con, $query);
                        $arreResul = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
                        if (!empty($arreResul)){
                            echo "El correo ya se encuentra registrado en el sistema.";
                        }else{
                            if((strlen($telefonoPersona)!=10) or (is_numeric($telefonoPersona)===false)){
                                echo "El teléfono debe tener 10 díjitos (0-9)";
                            }else{
                                $query= "UPDATE Persona set nombres = '".$nombreCliente."'where Usuario='".$ingreso."'" ;
                                $resultado=sqlsrv_query( $this->con, $query);
                                $query= "UPDATE Persona set ap_paterno = '".$apellidoPaterno."'where Usuario='".$ingreso."'" ;
                                $resultado=sqlsrv_query( $this->con, $query);
                                $query= "UPDATE Persona set ap_materno = '".$apellidoMaterno."'where Usuario='".$ingreso."'" ;
                                $resultado=sqlsrv_query( $this->con, $query);
                                $query= "UPDATE Persona set email = '".$correoPersona."'where Usuario='".$ingreso."'" ;
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
                echo "Datos actualizados";
                $this->varConectado=false;
                sqlsrv_close($this->con);
            }
    }

    function actualizarDirec(){
        $ingreso="Retzat";
        $callePersona=$_POST["calle"];
        $numeroPersona=$_POST["numero"];
        $coloniaPersona=$_POST["colonia"];
        $municipioPersona=$_POST["municipio"];
        $estadoPersona=$_POST["estado"];
        $cpPersona=$_POST["codigo-postal"];
        $ban1=false;
        self::conexion();
        if ($this->varConectado===true){
           try{
                $validarCalle=self::letras($callePersona);
                if ((strlen($callePersona)>20) or ($validarCalle===false)){
                    echo "El nombre de la calle debe ser menor a 20 carácteres (a-z / A-Z)";
                }else{
                    if((strlen($numeroPersona)>10) or (is_numeric($numeroPersona)===false)){
                        echo "El número de la calle debe ser totalmente númerico (0-9), máximo 10 dígitos.";
                    }else{
                        $validarCol=self::letras($coloniaPersona);
                        if ((strlen($coloniaPersona)>20) or ($validarCol===false)){
                            echo "El nombre de la colonia debe ser menor a 20 carácteres (a-z / A-Z)";
                        }else{
                            $validarMun=self::letras($municipioPersona);
                            $validarEst=self::letras($estadoPersona);
                            if ((strlen($municipioPersona)>100) or ($validarMun===false) or (strlen($estadoPersona)>100) or ($validarEst===false)){
                                echo "El nombre del municipio y/o estado debe ser menor a 100 carácteres (a-z / A-Z)";
                            }else{
                                if((strlen($cpPersona)>5) or (is_numeric($cpPersona)===false)){
                                    echo "El código postal ser totalmente númerico (0-9), de 5 dígitos.";
                                }else{
                                    $query= "UPDATE Direccion set calle = '".$callePersona."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $query= "UPDATE Direccion set no_calle = '".$numeroPersona."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $query= "UPDATE Direccion set colonia = '".$coloniaPersona."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    /*$query= "UPDATE Direccion set municipio = '".$municipioPersona."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $query= "UPDATE Direccion set estado = '".$estadoPersona."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    */
                                    $query= "UPDATE Direccion set codigo_postal = '".$cpPersona."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $ban1=true;
                                }
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
                echo "Dirección actualizada";
                $this->varConectado=false;
                sqlsrv_close($this->con);
            }
    }
    
    function actualizarContra(){
        $ingreso="Retzat";
        $contra=$_POST["new-password"];
        $confirmacion=$_POST["confirm-password"];
        if($contra != $confirmacion){
            //echo json_encode('confirmacion');
            echo "no coinciden";
        }else{
            if(strlen($contra)>=8){
                $bandE = 0;
                $bandn = 0;
                $bandc = 0;
                $bandM = 0;
                $bandm = 0;
                for($i=0;$i<strlen($contra);$i++){
                    //verificar que tenga numeros
                    if(ord($contra[$i])>=48 and ord($contra[$i])<=57){
                        $bandn ++;
                    }
                    //verificar que tenga caracteres especiales
                    if((ord($contra[$i]) >=32) and (ord($contra[$i]) <=47 or ord($contra[$i])>=58) and (ord($contra[$i])<=64 or ord($contra[$i])>=91) and (ord($contra[$i])<=96 or ord($contra[$i])>=123)){
                        $bandc ++;
                    }
                    //verificar que tenga mayusculas
                    if(ord($contra[$i])>=65 and ord($contra[$i])<=90){
                        $bandM ++;
                    }
                    //verificar que tenga minusculas
                    if(ord($contra[$i])>=97 and ord($contra[$i])<=122){
                        $bandm ++;
                    }
                }
    
                if($bandE!=0 or $bandn == 0 or $bandc == 0 or $bandm == 0 or $bandM == 0){
                    echo json_encode('validacion');
                }else{
                    $clave = password_hash($contra, PASSWORD_DEFAULT);
                    //$clave=$contra;
                    $ban1=false;
                    self::conexion();
                    if ($this->varConectado===true){
                        try{
                            $query= "UPDATE Persona set Contra_us = '".$clave."'where Usuario='".$ingreso."'" ;
                            $resultado=sqlsrv_query( $this->con, $query);
                            $ban1=true;

                        }catch(Exception $e){
                            $this->varConectado=false;
                            sqlsrv_close($this->con);
                        }
                        if ($ban1===true){
                            echo "Contraseña actualizada";
                            $this->varConectado=false;
                            sqlsrv_close($this->con);
                        }
                    }
                }
            }
        }

    }

    function actualizarBanco(){
        $ingreso="Retzat";
        $nombreTar=$_POST["nombre-tarjeta"];
        $numTar=$_POST["numero-tarjeta"];
        $mesTar=$_POST["month-expiracion"];
        $añoTar=$_POST["year-expiracion"];
        $ccvTar=$_POST["ccv"];
        
        $validarNom=self::letras($nombreTar);
        if ((strlen($nombreTar)>20) or ($validarNom===false)){
            echo "El nombre de la tarjeta deber contenr solo letras (a-z / A-Z)";
        }else{
            $auxiliar = "";
            for($i=0;$i<strlen($numTar);$i++){
                if($numTar[$i] != " "){
                    $auxiliar = $auxiliar. $numTar[$i];
                }
            }
            $numTar = $auxiliar;
            //verificar que el numero de tarjeta tenga los 16 digitos
            if(strlen($numTar) != 16){
                echo "El número de tarjeta debe tener 16 díigitos (0-9)";
            }else{
                if((strlen($mesTar)>3) or (is_numeric($mesTar)===false) or ($mesTar>12) or ($mesTar<1)){
                    echo "El mes de expiración debe ser totalmente númerico de 2 dígitos, (1-12).";
                }else{
                    if((strlen($añoTar)>3) or (is_numeric($añoTar)===false) or ($añoTar<22)){
                        echo "El año de expiración debe ser totalmente númerico de 2 dígitos, (del 2022 en adelante).";
                    }else{
                        if((strlen($ccvTar)>4) or (is_numeric($ccvTar)===false)){
                            echo "El año de expiración debe ser totalmente númerico de 3 dígitos.";
                        }else{
                            $ban1=false;
                            self::conexion();
                            if ($this->varConectado===true){
                                try{
                                    $query= "UPDATE Tarjetas set no_tarjeta = '".$numTar."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $ban1=true;

                                }catch(Exception $e){
                                    $this->varConectado=false;
                                    sqlsrv_close($this->con);
                                }
                                if ($ban1===true){
                                    echo "Contraseña actualizada";
                                    $this->varConectado=false;
                                    sqlsrv_close($this->con);
                                }
                             } 
                        } 
                    }
                }
                
            }
        }

        
        
    }

    function eliminarCuenta(){

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
        }
        if ($ban===$longi){
            return true;
        }else{
            return false;
        }
    }
    
    }

$per= new PerfilCliente;
$per->botones();
?>

?>