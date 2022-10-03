<?php
class PerfilBanco{
    public $con;
    public $varConectado = false;
    public $in;
    
    
    //conexion a la base de datoss
    function conexion(){
        $this->in=new PerfilBanco;

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

    function actualizarBanco(){
        $ingreso="Retzat";
        $nombreTar=$_POST["nombre-tarjeta"];
        $numTar=$_POST["numero-tarjeta"];
        $mesTar=$_POST["month-expiracion"];
        $añoTar=$_POST["year-expiracion"];
        $ccvTar=$_POST["ccv"];
        
        $validarNom=self::letras($nombreTar);
        if ((strlen($nombreTar)>20) or ($validarNom===false)){
            $this->in->alertas("validacion", 'Datos inválidos', 'El nombre de la tarjeta solo debe contener letras (a-z / A-Z)');
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
                $this->in->alertas("validacion", 'Datos inválidos', 'El número de tarjeta debe tener 16 dígitos (0-9)');
            }else{
                if((strlen($mesTar)>3) or (is_numeric($mesTar)===false) or ($mesTar>12) or ($mesTar<1)){
                    $this->in->alertas("validacion", 'Datos inválidos', 'El mes de expiración debe ser númerico (1-12), máximo 2 dígitos');
                }else{
                    if((strlen($añoTar)>3) or (is_numeric($añoTar)===false) or ($añoTar<22)){
                        $this->in->alertas("validacion", 'Datos inválidos', 'El año de expiración debe ser númerico de 2 dígitos');
                    }else{
                        if((strlen($ccvTar)!=3) or (is_numeric($ccvTar)===false)){
                            $this->in->alertas("validacion", 'Datos inválidos', 'El cvv debe ser númerico de tres dígitos');
                        }else{
                            $ban1=false;
                            self::conexion();
                            if ($this->varConectado===true){
                                try{
                                    $query= "UPDATE Tarjetas set Nombre_Tar = '".$nombreTar."',
                                    no_tarjeta = '".$numTar."',
                                    fecha_ven_mes = '".$mesTar."',
                                    fecha_ven_anio = '".$añoTar."',
                                    where Usuario='".$ingreso."'" ;
                                    $resultado=sqlsrv_query( $this->con, $query);
                                    $ban1=true;

                                }catch(Exception $e){
                                    $this->varConectado=false;
                                    sqlsrv_close($this->con);
                                }
                                if ($ban1===true){
                                    $this->in->alertas("aceptado", 'Listo!!!', 'Datos bancarios actualizados correctamente');
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
$per= new PerfilBanco;
$per->actualizarBanco();
?>