<?php
class PerfilDireccion{
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
                    echo json_encode('calle');
                    //echo "El nombre de la calle debe ser igual o menor a 20 carácteres (a-z / A-Z)";
                }else{
                    if((strlen($numeroPersona)>10) or (is_numeric($numeroPersona)===false)){
                        echo json_encode('numero');
                        //echo "El número de la calle debe ser totalmente númerico (0-9), máximo 10 dígitos.";
                    }else{
                        $validarCol=self::letras($coloniaPersona);
                        if ((strlen($coloniaPersona)>20) or ($validarCol===false)){
                            echo json_encode('colonia');
                            //echo "El nombre de la colonia debe ser igual o menor a 20 carácteres (a-z / A-Z)";
                        }else{
                            if((strlen($cpPersona)!=5) or (is_numeric($cpPersona)===false)){
                                echo json_encode('codigo');    
                                    //echo "El código postal debe ser totalmente númerico (0-9), de 5 dígitos.";
                            }else{
                                $validarMun=self::letras($municipioPersona);
                                $validarEst=self::letras($estadoPersona);
                                if ((strlen($municipioPersona)>100) or ($validarMun===false) or (strlen($estadoPersona)>100) or ($validarEst===false)){
                                    echo json_encode('munEst'); 
                                    //echo "El nombre del municipio y/o estado debe ser igual o menor a 100 carácteres (a-z / A-Z)";
                                }else{
                                    $query = "SELECT Id FROM estados where estado = '$estadoPersona'";
                                    $resultado = sqlsrv_query($this->con, $query);
                                    $arreResul = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
                                    if (empty($arreResul)){
                                        echo json_encode('estado');
                                    }else{   
                                        $query= "SELECT Id_Municipios FROM municipios where municipio = '$municipioPersona'";
                                        $resultado = sqlsrv_query($this->con, $query);
                                        $arreResul = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
                                        if (empty($arreResul)){
                                            echo json_encode('municipio');
                                        }else{
                                            $query = "SELECT  estados_municipios.id FROM estados_municipios, estados, municipios
                                            where estados.Estado = '$estadoPersona'
                                            and municipios.municipio = '$municipioPersona' and 
                                            estados_municipios.estados_id = estados.id and 
                                            estados_municipios.municipios_id = municipios.id_Municipios";
                                            $resultado = sqlsrv_query($this->con, $query);
                                            $arreResul = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
                                            if (empty($arreResul)){
                                                echo json_encode('munEstaExi');
                                            }else{
                                                $row1 = sqlsrv_fetch_array($resultado);
                                                $relacion=$row1['id'];
                                                $query= "UPDATE Direccion set calle = '".$callePersona."'where Usuario='".$ingreso."'" ;
                                                $resultado=sqlsrv_query( $this->con, $query);
                                                $query= "UPDATE Direccion set no_calle = '".$numeroPersona."'where Usuario='".$ingreso."'" ;
                                                $resultado=sqlsrv_query( $this->con, $query);
                                                $query= "UPDATE Direccion set colonia = '".$coloniaPersona."'where Usuario='".$ingreso."'" ;
                                                $resultado=sqlsrv_query( $this->con, $query);
                                                $query= "UPDATE Direccion set Ciudad_Estado = '".$relacion."'where Usuario='".$ingreso."'" ;
                                                $resultado=sqlsrv_query( $this->con, $query);
                                                $query= "UPDATE Direccion set codigo_postal = '".$cpPersona."'where Usuario='".$ingreso."'" ;
                                                $resultado=sqlsrv_query( $this->con, $query);
                                                $ban1=true;
                                            }
                                        }
                                    }
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
                echo json_encode('dirAct'); 
                //echo "Dirección actualizada";
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
            }
        }
        if ($ban===$longi){
            return true;
        }else{
            return false;
        }
    }
}
$per= new PerfilDireccion;
$per->actualizarDirec();
?>