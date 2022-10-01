<?php
class PerfilBanco{
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

    function actualizarBanco(){
        $ingreso="Retzat";
        $nombreTar=$_POST["nombre-tarjeta"];
        $numTar=$_POST["numero-tarjeta"];
        $mesTar=$_POST["month-expiracion"];
        $añoTar=$_POST["year-expiracion"];
        $ccvTar=$_POST["ccv"];
        
        $validarNom=self::letras($nombreTar);
        if ((strlen($nombreTar)>20) or ($validarNom===false)){
            echo json_encode('nomTar');
            //echo "El nombre de la tarjeta deber contenr solo letras (a-z / A-Z)";
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
                echo json_encode('numTar');
                //echo "El número de tarjeta debe tener 16 díigitos (0-9)";
            }else{
                if((strlen($mesTar)>3) or (is_numeric($mesTar)===false) or ($mesTar>12) or ($mesTar<1)){
                    echo json_encode('mes');
                    //echo "El mes de expiración debe ser totalmente númerico de 2 dígitos, (1-12).";
                }else{
                    if((strlen($añoTar)>3) or (is_numeric($añoTar)===false) or ($añoTar<22)){
                        echo json_encode('anio');
                        //echo "El año de expiración debe ser totalmente númerico de 2 dígitos, (del 2022 en adelante).";
                    }else{
                        if((strlen($ccvTar)!=3) or (is_numeric($ccvTar)===false)){
                            echo json_encode('cvv');
                            //echo "El cvv debe ser numerico de tres digitos.";
                        }else{
                            $ban1=false;
                            self::conexion();
                            if ($this->varConectado===true){
                                try{
                                    $query= "UPDATE Tarjetas set Nombre_Tar = '".$nombreTar."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $query= "UPDATE Tarjetas set no_tarjeta = '".$numTar."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $query= "UPDATE Tarjetas set fecha_ven_mes = '".$mesTar."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $query= "UPDATE Tarjetas set fecha_ven_anio = '".$añoTar."'where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $ban1=true;

                                }catch(Exception $e){
                                    $this->varConectado=false;
                                    sqlsrv_close($this->con);
                                }
                                if ($ban1===true){
                                    echo json_encode('banAct');
                                    //echo "Datos bancarios actualizados";
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
            }
        }
        if ($ban===$longi){
            return true;
        }else{
            return false;
        }
    }

}
$per= new PerfilBanco;
$per->actualizarBanco();
?>