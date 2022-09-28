<?php
class Recuperar{
    public $con;
    public $varConectado = false;
    
    //conexion a la base de datos
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

    function verificarContra(){
        $contra=$_POST["contraseña"];
        $confirmacion=$_POST["confirmar-contraseña"];
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
                    //verificar que no tenga espacios
                    if(ord($contra[$i])===32){
                        $bandE ++;
                    } 
                    //verificar que tenga numeros
                    if(ord($contra[$i])>=48 and ord($contra[$i])<=57){
                        $bandn ++;
                    }
                    //verificar que tenga caracteres especiales
                    if((ord($contra[$i]) >=33) and (ord($contra[$i]) <=47 or ord($contra[$i])>=58) and (ord($contra[$i])<=64 or ord($contra[$i])>=91) and (ord($contra[$i])<=96 or ord($contra[$i])>=123)){
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
                    //la contraseña pasó las verificaciones (FALTA ENCRIPTAR)
                    //$clave = password_hash($contra, PASSWORD_DEFAULT);
                    $clave=$contra;
                    self::conexion();
                    if ($this->varConectado===true){
                        try{
                            //obtner el correo para identificar a quien se le actualiza la contraseña
                            $file = fopen("archivo_correo.txt", "r");
                            $auxCorreo = fgets($file);
                            $auxTipo = fgets($file);
                            fclose($file);
                            $correo_destino ="";
                     
                            for ($i=0;$i<strlen($auxCorreo)-2;$i++){
                                $correo_destino = $correo_destino.$auxCorreo[$i];
                            }
                            $tipo ="";
                            for ($i=0;$i<strlen($auxTipo)-2;$i++){
                                $tipo = $tipo.$auxTipo[$i];
                            }
                            //verificar si es sliente o un empleado y actualizar
                            if ($tipo==="cliente"){
                                $query= "UPDATE Usuarios set contra_us = '".$clave."'where email='".$correo_destino."'" ;
                                $resultado=sqlsrv_query( $this->con, $query);
                            }else{
                                $query= "UPDATE Empleados set contra_em = '".$clave."'where email='".$correo_destino."'" ;
                                $resultado=sqlsrv_query( $this->con, $query);
                            }
                            echo json_encode('actualizacion');
                            $this->varConectado=false;
                            sqlsrv_close($this->con);

                        }catch(Exception $e){
                            $this->varConectado=false;
                            sqlsrv_close($this->con);
                        }
                    }
                }
            }
    
            else {
                echo json_encode('longitud');
            }
        }
    }
}

$reC= new Recuperar;
$reC->verificarContra();
?>