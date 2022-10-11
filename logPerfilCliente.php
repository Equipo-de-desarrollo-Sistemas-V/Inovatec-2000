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
            // $in->alertas("validacion", 'Vaya...', 'Fallo al conectar a la base de datos');
            echo json_encode('conR');
            //echo "No se puedo conectar";
        }  
    }

    function proceso(){
        $contra=$_POST["delete-password"];
        if ($contra===""){
            $this->actualizarDatos();
        }else{
            $this->eliminarCuenta();
        }
    }


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
            // $in->alertas("validacion", 'Datos inválidos', 'La contraseña y la confirmación no coinciden');
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
                /*if ($ban1===true){
                    // $in->alertas("aceptado", 'Listo!!!', 'Cuenta eliminada');
                     //echo json_encode('conR');
                    //$this->varConectado=false;
                    //sqlsrv_close($this->con);
                    //include_once("cerrar.php");
                }*/

            }
        }
    }

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
                    // $in->alertas("validacion", 'Datos inválidos', 'El nombre no debe contener más de 40 caracteres (a-z / A-Z)');
                    echo json_encode('nombre');
                }else{
                    $nump = $this->numeros($apellidoPaterno);
                    $numm = $this->numeros($apellidoMaterno);
                    $carp = $this->caracteres($apellidoPaterno);
                    $carm = $this->caracteres($apellidoMaterno);
                    if ((strlen($apellidoPaterno)>20) or ($nump != 0 or $numm != 0 or $carp != 0 or $carm != 0)){
                        // $in->alertas("validacion", 'Datos inválidos', 'Los apellidos no deben contener más de 20 caracteres (a-z / A-Z)');
                        echo json_encode('apellidos');
                    }else{
                        if((strlen($telefonoPersona)!=10) or (is_numeric($telefonoPersona)===false)){
                            // $in->alertas("validacion", 'Datos inválidos', 'El teléfono debe tener 10 dígitos (0-9)');
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
                                    // $in->alertas("validacion", 'Datos inválidos', 'El correo ya se encuentra registrado');
                                    echo json_encode('correo');
                                }else{
                                    $query= "SELECT email FROM Empleados where email ='".$correoPersona."'";
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $arreResul = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
                                    if (!empty($arreResul)){
                                        // $in->alertas("validacion", 'Datos inválidos', 'El correo ya se encuentra registrado');
                                        echo json_encode('correo');
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
                            }
                            if ($b1===true and $b2===true){
                                $query= "UPDATE Persona set nombres = '".$nombreCliente."',
                                ap_paterno = '".$apellidoPaterno."', 
                                ap_materno = '".$apellidoMaterno."'
                                where Usuario='".$ingreso."'" ;
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
                // $in->alertas("aceptado", '¡Enhorabuena!', 'Datos actualizados correctamente');
                //echo json_encode('datAct');
                $this->varConectado=false;
                sqlsrv_close($this->con);
                $this->actualizarDirec();
            }
    }


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
        //echo $municipioPersona."fwef";
        self::conexion();
        if ($this->varConectado===true){
           try{
            $numc = $this -> numeros($callePersona);
            $carc = $this -> caracteres($callePersona);
                if ((strlen($callePersona)>20) or ($numc != 0 or $carc != 0)){
                    // $this->in->alertas("validacion", 'Datos inválidos', 'El nombre de la calle no debe contener más de 20 caracteres (a-z / A-Z)');
                    echo json_encode('calle');
                }else{
                    if((strlen($numeroPersona)>10) or (is_numeric($numeroPersona)===false)){
                        // $this->in->alertas("validacion", 'Datos inválidos', 'El número de la calle debe ser totalmente númerico (0-9), máximo 10 dígitos');
                        echo json_encode('numero');
                    }else{
                        $numc = $this->numeros($coloniaPersona);
                        $carc = $this->caracteres($coloniaPersona);
                        if ((strlen($coloniaPersona)>20) or ($numc != 0 or $carc != 0)){
                            // $this->in->alertas("validacion", 'Datos inválidos', 'El nombre de la colonia no debe contener más de 20 caracteres (a-z / A-Z)');
                            echo json_encode('colonia');
                        }else{
                            if((strlen($cpPersona)!=5) or (is_numeric($cpPersona)===false)){
                                // $this->in->alertas("validacion", 'Datos inválidos', 'El código postal debe ser totalmente númerico (0-9), de 5 dígitos');
                                echo json_encode('codigo');
                            }else{
                                            $query = "SELECT  id FROM estados_municipios
                                            where estados_id = '$estadoPersona'
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
                                                //  $this->in->alertas("validacion", 'Datos inválidos', 'El municipio no se encuentra en el estado indicado');
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
                // $this->in->alertas("aceptado", 'Listo!!!', 'Dirección actualizada correctamente');
                //echo json_encode('dirAct'); 
                $this->varConectado=false;
                sqlsrv_close($this->con);
                $this->actualizarContra();
            }
    }

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
                // $this->in->alertas("validacion", 'Datos inválidos', 'La contraseña y la confirmación no coinciden');
                echo json_encode('confirmacion');
                //echo "no coinciden";
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
                        // $this->in->alertas("validacion", 'Datos inválidos', 'La contraseña debe contener números, mayúsculas, minúsculas y caracteres especiales');
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
                                // $this->in->alertas("aceptado", 'Listo!!!', 'Contraseña actualizada correctamente');
                                // echo json_encode('contAct');
                                $this->varConectado=false;
                                sqlsrv_close($this->con);
                                $this->actualizarBanco();
                            }
                        }
                    }
                } else {
                    // $this->in->alertas("validacion", 'Datos inválidos', 'La contraseña debe tener un mínimo de 8 caracteres');
                    echo json_encode('longitud');
                }
            }
        }else{
            // $this->in->alertas("validacion", 'Datos inválidos', 'La contraseña actual ingresada no coincide con la registrada');
            echo json_encode('actual');
        }
    }else{
    $this->actualizarBanco();
}
}



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
            // $in->alertas("validacion", 'Datos inválidos', 'El nombre de la tarjeta solo debe contener letras (a-z / A-Z)');
            echo json_encode('nomTar');
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
                // $in->alertas("validacion", 'Datos inválidos', 'El número de tarjeta debe tener 16 dígitos (0-9)');
                echo json_encode('numTar');
            }else{
                if((strlen($mesTar)>3) or (is_numeric($mesTar)===false) or ($mesTar>12) or ($mesTar<1)){
                    // $in->alertas("validacion", 'Datos inválidos', 'El mes de expiración debe ser númerico (1-12), máximo 2 dígitos');
                    echo json_encode('mes');
                }else{
                    if((strlen($añoTar)>3) or (is_numeric($añoTar)===false) or ($añoTar<22)){
                        // $in->alertas("validacion", 'Datos inválidos', 'El año de expiración debe ser númerico de 2 dígitos');
                        echo json_encode('anio');
                    }else{
                        if((strlen($ccvTar)>3) or (is_numeric($ccvTar)===false and $ccvTar!="")){
                            // $in->alertas("validacion", 'Datos inválidos', 'El cvv debe ser númerico de tres dígitos');
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
                                    // $in->alertas("aceptado", 'Listo!!!', 'Datos bancarios actualizados correctamente');
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
                //echo json_encode(ord($cadena[$i]));
            }
        }

        return $conta;
    }
}
$per= new PerfilUsuario;
//$per->actualizarDatos();
$per->proceso();
?>