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
            $in->alertas("validacion", 'Vaya...', 'Fallo al conectar a la base de datos');
            //echo "No se puedo conectar";
        }  
    }
    function actualizarDatos(){
        $in=new PerfilUsuario;
        $ingreso="Retzat";
        $nombreCliente=$_REQUEST['nombre-cliente'];
        $apellidoPaterno=$_POST["apellido-paterno"];
        $apellidoMaterno=$_POST["apellido-materno"];
        $correoPersona=$_POST["correo"];
        $telefonoPersona=$_POST["telefono"];
        echo $nombreCliente;  

        $ban1=false;
        self::conexion();
        if ($this->varConectado===true){
           try{
                $validarNombre=self::letras($nombreCliente);
                if ((strlen($nombreCliente)>40) or ($validarNombre===false)){
                    $in->alertas("validacion", 'Datos inválidos', 'El nombre no debe contener más de 40 caracteres (a-z / A-Z)');
                }else{
                    $validarAP=self::letras($apellidoPaterno);
                    $validarAM=self::letras($apellidoMaterno);
                    if ((strlen($apellidoPaterno)>20) or ($validarAP===false) or (strlen($apellidoMaterno)>20) or ($validarAM===false)){
                        $in->alertas("validacion", 'Datos inválidos', 'Los apellidos no deben contener más de 20 caracteres (a-z / A-Z)');
                    }else{
                        echo $telefonoPersona;
                        echo is_numeric($telefonoPersona);
                        if((strlen($telefonoPersona)!=10) or (is_numeric($telefonoPersona)===false)){
                            $in->alertas("validacion", 'Datos inválidos', 'El teléfono debe tener 10 dígitos (0-9)');
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
                                    $in->alertas("validacion", 'Datos inválidos', 'El correo ya se encuentra registrado');
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
                $in->alertas("aceptado", 'Listo!!!', 'Datos actualizados correctamente');
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
$per= new PerfilUsuario;
$per->actualizarDatos();
?>