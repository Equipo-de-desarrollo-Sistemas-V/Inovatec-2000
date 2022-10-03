<?php
class PerfilContra{
    public $con;
    public $varConectado = false;
    public $in;
    
    
    //conexion a la base de datoss
    function conexion(){
        $this->in=new PerfilContra;
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

        self::conexion();
        $query= "SELECT Contra_us FROM Persona where usuario ='".$ingreso."'";
        $resultado=sqlsrv_query($this->con, $query);
        

        $row = sqlsrv_fetch_array($resultado);
        sqlsrv_close($this->con);
        $hash=$row['Contra_us'];
        echo $hash;

        if (password_verify($actual, $hash)){
            if($contra != $confirmacion){
                $this->in->alertas("validacion", 'Datos inválidos', 'La contraseña y la confirmación no coinciden');
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
                        $this->in->alertas("validacion", 'Datos inválidos', 'La contraseña debe contener números, mayúsculas, minúsculas y caracteres especiales');
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
                                $this->in->alertas("aceptado", 'Listo!!!', 'Contraseña actualizada correctamente');
                                $this->varConectado=false;
                                sqlsrv_close($this->con);
                            }
                        }
                    }
                } else {
                    $this->in->alertas("validacion", 'Datos inválidos', 'La contraseña debe tener un mínimo de 8 caracteres');
                }
            }
        }else{
            $this->in->alertas("validacion", 'Datos inválidos', 'La contraseña actual ingresada no coincide con la registrada');
        }
    }
        
    function alertas($valor, $titulo, $mensaje){
        ?>
        <html>
        <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
$per= new PerfilContra;
$per->actualizarContra();
?>