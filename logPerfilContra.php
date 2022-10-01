<?php
class PerfilContra{
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
            //echo "No se puedo conectar";
        }  
    }

    function actualizarContra(){
        $ingreso="Retzat";
        $contra=$_POST["new-password"];
        $confirmacion=$_POST["confirm-password"];
        if($contra != $confirmacion){
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
                            echo json_encode('contAct');
                            //echo "Contraseña actualizada";
                            $this->varConectado=false;
                            sqlsrv_close($this->con);
                        }
                    }
                }
            } else {
                echo json_encode('longitud');
            }
        }

    }
}
$per= new PerfilContra;
$per->actualizarContra();
?>