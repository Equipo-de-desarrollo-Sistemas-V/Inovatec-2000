<?php
class PerfilDireccion{
    public $con;
    public $varConectado = false;
    public $in;
    
    
    //conexion a la base de datoss
    function conexion(){
        $this->in=new PerfilDireccion;
        
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        try{
            $this->con = sqlsrv_connect($serverName, $connectionInfo); 
            $this->varConectado=true;
        }catch (Exception $e){
            $this->in->alertas("validacion", 'Vaya...', 'Fallo al conectar a la base de datos');
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
                    $this->in->alertas("validacion", 'Datos inválidos', 'El nombre de la calle no debe contener más de 20 caracteres (a-z / A-Z)');
                }else{
                    if((strlen($numeroPersona)>10) or (is_numeric($numeroPersona)===false)){
                        $this->in->alertas("validacion", 'Datos inválidos', 'El número de la calle debe ser totalmente númerico (0-9), máximo 10 dígitos');
                    }else{
                        $validarCol=self::letras($coloniaPersona);
                        if ((strlen($coloniaPersona)>20) or ($validarCol===false)){
                            $this->in->alertas("validacion", 'Datos inválidos', 'El nombre de la colonia no debe contener más de 20 caracteres (a-z / A-Z)');
                        }else{
                            if((strlen($cpPersona)!=5) or (is_numeric($cpPersona)===false)){
                                $this->in->alertas("validacion", 'Datos inválidos', 'El código postal debe ser totalmente númerico (0-9), de 5 dígitos');
                            }else{
                                $validarMun=self::letras($municipioPersona);
                                $validarEst=self::letras($estadoPersona);
                                if ((strlen($municipioPersona)>100) or ($validarMun===false) or (strlen($estadoPersona)>100) or ($validarEst===false)){
                                    $this->in->alertas("validacion", 'Datos inválidos', 'El nombre del municipio y/o estado no debe contener más de 100 caracteres (a-z / A-Z)');
                                }else{
                                    $query = "SELECT Id FROM estados where estado = '$estadoPersona'";
                                    $resultado = sqlsrv_query($this->con, $query);
                                    $arreResul = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
                                    if (empty($arreResul)){
                                        $this->in->alertas("validacion", 'Datos inválidos', 'El estado no existe');
                                    }else{   
                                        $query= "SELECT Id_Municipios FROM municipios where municipio = '$municipioPersona'";
                                        $resultado = sqlsrv_query($this->con, $query);
                                        $arreResul = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
                                        if (empty($arreResul)){
                                            $this->in->alertas("validacion", 'Datos inválidos', 'El municipio no existe');
                                        }else{
                                            $query = "SELECT  estados_municipios.id FROM estados_municipios, estados, municipios
                                            where estados.Estado = '$estadoPersona'
                                            and municipios.municipio = '$municipioPersona' and 
                                            estados_municipios.estados_id = estados.id and 
                                            estados_municipios.municipios_id = municipios.id_Municipios";
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
                                                 $this->in->alertas("validacion", 'Datos inválidos', 'El municipio no se encuentra en el estado indicado');
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
                $this->in->alertas("aceptado", 'Listo!!!', 'Dirección actualizada correctamente');
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
            if(ord($cadena[$i])==32){
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
    function alertas($valor, $titulo, $mensaje){
        ?>
        <html>
        <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>s
        <?php
        if($valor=='validacion'){
            ?>
            <script>
            Swal.fire({
            icon: 'error',
            title: '<?=$titulo?>',
            text: '<?=$mensaje?>',
            confirmButtonText: 'Ok',
            timer:5000,
            timerProgressBar: true,
            }).then((result)=>{
                if(result.isConfirmed){
                    location.href='perfilCliente.php';
                }else{
                    location.href='perfilCliente.php';
                }
            })
        </script>
        </body>
        </html>
        <?php
        }else if($valor=='aceptado'){
            ?>
            <script>
            Swal.fire({
            icon: 'success',
            title: '<?=$titulo?>',
            text: '<?=$mensaje?>',
            confirmButtonText: 'Ok',
            timer:5000,
            timerProgressBar: true,
            }).then((result)=>{
                if(result.isConfirmed){
                    location.href='perfilCliente.php';
                }else{
                    location.href='perfilCliente.php';
                }
            })
        </script>
        </body>
        </html>
        <?php
        }
    }
}
$per= new PerfilDireccion;
$per->actualizarDirec();
?>