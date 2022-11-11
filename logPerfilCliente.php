<?php
class PerfilUsuario{
    public $con;
    public $varConectado = false;
    
    
    //conexion a la base de datoss
    function conexion(){
        $in=new PerfilUsuario;
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        try{
            $this->con = sqlsrv_connect($serverName, $connectionInfo); 
            $this->varConectado=true;
        }catch (Exception $e){
            echo json_encode('conR');
            //echo "No se puedo conectar";
        }  
    }

    //Se detecta que proceso se realiza, actualizacion de datos o eliminar cuenta
    function proceso(){
        $contra=$_POST["delete-password"];
        if ($contra===""){
            $this->actualizarDatos();
        }else{
            $this->eliminarCuenta();
        }
    }

    //proceso para eliminar cuenta
    function eliminarCuenta(){
        $file = fopen("archivo_correo.txt", "r");
        $auxIngreso = fgets($file);
        fclose($file);

        $ingreso ="";
        for ($i=0;$i<strlen($auxIngreso)-2;$i++){
            $ingreso= $ingreso.$auxIngreso[$i];
        }
        $contra=$_POST["delete-password"];
        $confirmacion=$_POST["confirm-delete-password"];

        if($contra != $confirmacion){
            echo json_encode('confirmacion');
        }else{
            $ban1=false;
            self::conexion();
            if ($this->varConectado===true){
                try{
                    $query= "SELECT* FROM Persona WHERE Usuario='$ingreso'";
                    $resultado=sqlsrv_query( $this->con, $query);
                    $row1 = sqlsrv_fetch_array($resultado);
                    $hash=$row1['Contra_us'];
                    if (password_verify($contra, $hash)){
                        $this->varConectado=false;
                    sqlsrv_close($this->con);
                        
                        echo json_encode('eliminar');
                        // $in->alertas("borrar", '¿Eliminar cuenta?', '¡No podrás revertir esto!');
                        /*$query= "DELETE FROM Tarjetas WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query( $this->con, $query);
                        $query= "DELETE FROM Direccion WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query( $this->con, $query);
                        $query= "DELETE FROM Persona WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query( $this->con, $query);*/
                        
                        //$ban1=true;
                    }else{
                        //echo "Constrase;a incorrecta";
                        // $in->alertas("validacion", 'Ups...', 'Constraseña incorrecta');
                        echo json_encode('incor');
                    }
                }catch(Exception $e){
                    $this->varConectado=false;
                    sqlsrv_close($this->con);
                }
            }
        }
    }

    //proceso par actualizar los datos personales
    function actualizarDatos(){
        $file = fopen("archivo_correo.txt", "r");
        $auxIngreso = fgets($file);
        fclose($file);

        $ingreso ="";
        for ($i=0;$i<strlen($auxIngreso)-2;$i++){
            $ingreso= $ingreso.$auxIngreso[$i];
        }
        $nombreCliente=$_REQUEST['nombreCliente'];
        $apellidoPaterno=$_POST["apellidoPaterno"];
        $apellidoMaterno=$_POST["apellidoMaterno"];
        $correoPersona=$_POST["correo"];
        $telefonoPersona=$_POST["telefono"]; 

        $ban1=false;
        self::conexion();
        if ($this->varConectado===true){
           try{
                $numn = $this->numeros($nombreCliente);
                $carn = $this->caracteres($nombreCliente);
                if ((strlen($nombreCliente)>40) or ($numn != 0 or $carn != 0)){
                    echo json_encode('nombre');
                }else{
                    $nump = $this->numeros($apellidoPaterno);
                    $numm = $this->numeros($apellidoMaterno);
                    $carp = $this->caracteres($apellidoPaterno);
                    $carm = $this->caracteres($apellidoMaterno);
                    if ((strlen($apellidoPaterno)>20) or ($nump != 0 or $numm != 0 or $carp != 0 or $carm != 0)){
                        echo json_encode('apellidos');
                    }else{
                        if((strlen($telefonoPersona)!=10) or (is_numeric($telefonoPersona)===false)){
                            echo json_encode('telefono');
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
                                }else{
                                    $query= "SELECT email FROM Empleados where email ='".$correoPersona."'";
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $arreResul = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
                                    if (!empty($arreResul)){
                                        echo json_encode('correo');
                                    }else{
                                        $b1=true;
                                        $b2=true;
                                        $query= "UPDATE Persona set email = '".$correoPersona."'where Usuario='".$ingreso."'" ;
                                        $resultado=sqlsrv_query( $this->con, $query);
                                    }
                                }
                            }
                            if ($b1===true and $b2===true){
                                $query= "UPDATE Persona set nombres = '".$nombreCliente."',
                                ap_paterno = '".$apellidoPaterno."', 
                                ap_materno = '".$apellidoMaterno."',
                                telefono = '".$telefonoPersona."'
                                where Usuario='".$ingreso."'" ;
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
                $this->varConectado=false;
                sqlsrv_close($this->con);
                $this->actualizarDirec();
            }
    }

    //proceso para actualizar la direccion
    function actualizarDirec(){
        $file = fopen("archivo_correo.txt", "r");
        $auxIngreso = fgets($file);
        fclose($file);

        $ingreso ="";
        for ($i=0;$i<strlen($auxIngreso)-2;$i++){
            $ingreso= $ingreso.$auxIngreso[$i];
        }
        $callePersona=$_POST["calle"];
        $numeroPersona=$_POST["numero"];
        $coloniaPersona=$_POST["colonia"];
        $municipioPersona=$_POST["municipio"];
        $estadoPersona=$_POST["estado"];
        $cpPersona=$_POST["codigoPostal"];
        $ban1=false;
        self::conexion();
        if ($this->varConectado===true){
           try{
            $numc = $this -> numeros($callePersona);
            $carc = $this -> caracteres($callePersona);
                if ((strlen($callePersona)>20) or ($numc != 0 or $carc != 0)){
                    echo json_encode('calle');
                }else{
                    if((strlen($numeroPersona)>10) or (is_numeric($numeroPersona)===false)){
                        echo json_encode('numero');
                    }else{
                        $numc = $this->numeros($coloniaPersona);
                        $carc = $this->caracteres($coloniaPersona);
                        if ((strlen($coloniaPersona)>20) or ($numc != 0 or $carc != 0)){
                            echo json_encode('colonia');
                        }else{
                            if((strlen($cpPersona)!=5) or (is_numeric($cpPersona)===false)){
                                echo json_encode('codigo');
                            }else{
                                            $query = "SELECT  id FROM estados_municipios
                                            where estados_id= '$estadoPersona'
                                            and municipios_id = '$municipioPersona'";
                                            $resultado = sqlsrv_query($this->con, $query);

                                            if ($r = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                                                $relacion = $r["id"];
                                                //echo $relacion;
                                                $query= "UPDATE Direccion set calle = '".$callePersona."',
                                                no_calle = '".$numeroPersona."',
                                                colonia = '".$coloniaPersona."',
                                                Ciudad_Estado = '".$relacion."',
                                                codigo_postal = '".$cpPersona."'
                                                where Usuario='".$ingreso."'" ;
                                                $resultado=sqlsrv_query( $this->con, $query);
                                                $ban1=true;
                                            }else{
                                                echo json_encode('munEstaExi');
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
                $this->varConectado=false;
                sqlsrv_close($this->con);
                $this->actualizarContra();
            }
    }

    //proceso para actualizar contraseña
    function actualizarContra(){
        $file = fopen("archivo_correo.txt", "r");
        $auxIngreso = fgets($file);
        fclose($file);

        $ingreso ="";
        for ($i=0;$i<strlen($auxIngreso)-2;$i++){
            $ingreso= $ingreso.$auxIngreso[$i];
        }
        
        $actual=$_POST["password"];
        $contra=$_POST["new-password"];
        $confirmacion=$_POST["confirm-password"];
        if ($actual!=""){

        self::conexion();
        $query= "SELECT Contra_us FROM Persona where usuario ='".$ingreso."'";
        $resultado=sqlsrv_query($this->con, $query);
        

        $row = sqlsrv_fetch_array($resultado);
        sqlsrv_close($this->con);
        $hash=$row['Contra_us'];

        if (password_verify($actual, $hash)){
            if($contra != $confirmacion){
                echo json_encode('confirmacion');
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
                                $this->varConectado=false;
                                sqlsrv_close($this->con);
                                $this->actualizarBanco();
                            }
                        }
                    }
                } else {
                    echo json_encode('longitud');
                }
            }
        }else{
            echo json_encode('actual');
        }
    }else{
    $this->actualizarBanco();
}
}

    //proceso para actualizar datos del banco
    function actualizarBanco(){
        $file = fopen("archivo_correo.txt", "r");
        $auxIngreso = fgets($file);
        fclose($file);

        $ingreso ="";
        for ($i=0;$i<strlen($auxIngreso)-2;$i++){
            $ingreso= $ingreso.$auxIngreso[$i];
        }
        $nombreTar=$_POST["nombreTarjeta"];
        $numTar=$_POST["numeroTarjeta"];
        $mesTar=$_POST["monthExpiracion"];
        $añoTar=$_POST["yearExpiracion"];
        $ccvTar=$_POST["ccv"];

        
        $nump = $this->numeros($nombreTar);
        $carp = $this->caracteres($nombreTar);
        if ((strlen($nombreTar)>20) or ($nump != 0 or $carp != 0)){
            echo json_encode('nomTar');
        }else{
            $auxiliar = "";
            for($i=0;$i<strlen($numTar);$i++){
                if($numTar[$i] != " "){
                    $auxiliar = $auxiliar. $numTar[$i];
                }
            }
            $numTar = $auxiliar;
            if(strlen($numTar) != 16){
                echo json_encode('numTar');
            }else{
                if((strlen($mesTar)>3) or (is_numeric($mesTar)===false) or ($mesTar>12) or ($mesTar<1)){
                    echo json_encode('mes');
                }else{
                    if((strlen($añoTar)>3) or (is_numeric($añoTar)===false) or ($añoTar<22) or ($añoTar>39)){
                        echo json_encode('anio');
                    }else{
                        if((strlen($ccvTar)>3) or (is_numeric($ccvTar)===false and $ccvTar!="")){
                            echo json_encode('cvv');
                        }else{
                            $ban1=false;
                            self::conexion();
                            if ($this->varConectado===true){
                                try{
                                    $query= "UPDATE Tarjetas set Nombre_Tar = '".$nombreTar."',
                                    no_tarjeta = '".$numTar."',
                                    fecha_ven_mes = '".$mesTar."',
                                    fecha_ven_anio = '".$añoTar."'
                                    where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $ban1=true;

                                }catch(Exception $e){
                                    $this->varConectado=false;
                                    sqlsrv_close($this->con);
                                }
                                if ($ban1===true){
                                    echo json_encode('chido');
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


    //proceso para verificar que el parametro recibido contenga numeros
    function numeros($cadena)
    {
        $conta = 0;

        for ($i = 0; $i < strlen($cadena); $i++) {
            if (ord($cadena[$i]) >= 48 and ord($cadena[$i]) <= 57) {
                $conta++;
            }
        }

        return $conta;
    }

    //devuelve la cantidad de caracteres especiales (sin incluir letras acentuadas ni la ñ) encontradas en una cadena
    function caracteres($cadena)
    {
        $conta = 0;

        for ($i = 0; $i < strlen($cadena); $i++) {

            //verifica que el caracter no sea numero, letra o espacio (ya admite acentos y ñ)
            if ((ord($cadena[$i]) <= 47 or ord($cadena[$i]) >= 58) and (ord($cadena[$i]) <= 64 or ord($cadena[$i]) >= 91) and (ord($cadena[$i]) <= 96 or ord($cadena[$i])
                    >= 123) and ord($cadena[$i]) != 32 and ord($cadena[$i]) != 195 and ord($cadena[$i]) != 161 and ord($cadena[$i]) != 169 and ord($cadena[$i]) != 173 and
                ord($cadena[$i]) != 179 and ord($cadena[$i]) != 186 and ord($cadena[$i]) != 129 and ord($cadena[$i]) != 137 and ord($cadena[$i]) != 141 and ord($cadena[$i]) != 147
                and ord($cadena[$i]) != 154 and ord($cadena[$i]) != 177 and ord($cadena[$i]) != 145
            ) {
                $conta++;
            }
        }

        return $conta;
    }
}
$per= new PerfilUsuario;
$per->proceso();
?>