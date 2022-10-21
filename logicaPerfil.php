<?php
class PerfilElimina{
    public $con;
    public $varConectado = false;
    
    
    //conexion a la base de datoss
    function conexion(){
        $in=new PerfilElimina;
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        try{
            $this->con = sqlsrv_connect($serverName, $connectionInfo); 
            $this->varConectado=true;
        }catch (Exception $e){
            $in->alertas("validacion", 'Vaya...', 'Fallo al conectar a la base de datos');
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
        $in=new PerfilElimina;

        if($contra != $confirmacion){
            $in->alertas("validacion", 'Datos inválidos', 'La contraseña y la confirmación no coinciden');
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
                        $in->alertas("borrar", '¿Eliminar cuenta?', '¡No podrás revertir esto!');
                        /*$query= "DELETE FROM Tarjetas WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query( $this->con, $query);
                        $query= "DELETE FROM Direccion WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query( $this->con, $query);
                        $query= "DELETE FROM Persona WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query( $this->con, $query);
                        */
                        //$ban1=true;
                    }else{
                        //echo "Constrase;a incorrecta";
                        $in->alertas("validacion", 'Ups...', 'Constraseña incorrecta');
                    }
                }catch(Exception $e){
                    $this->varConectado=false;
                    sqlsrv_close($this->con);
                }
                if ($ban1===true){
                    $in->alertas("aceptado", 'Listo!!!', 'Cuenta eliminada');
                    $this->varConectado=false;
                    sqlsrv_close($this->con);
                }
            }
        }
    }

    function borrar(){
        self::conexion();

        $file = fopen("archivo_correo.txt", "r");
        $auxIngreso = fgets($file);
        fclose($file);

        $ingreso ="";
        for ($i=0;$i<strlen($auxIngreso)-2;$i++){
            $ingreso= $ingreso.$auxIngreso[$i];
        }
        $query= "DELETE FROM Tarjetas WHERE Usuario='$ingreso'";
        $resultado=sqlsrv_query( $this->con, $query);
        /*$query= "DELETE FROM Direccion WHERE Usuario='$ingreso'";
        $resultado=sqlsrv_query( $this->con, $query);
        $query= "DELETE FROM Persona WHERE Usuario='$ingreso'";
        $resultado=sqlsrv_query( $this->con, $query);*/
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
        }else if($valor=='borrar'){
            ?>
            <script>
                Swal.fire({
                title: '<?=$titulo?>',
                text: '<?=$mensaje?>',
                icon: 'warning',
                timer:5000,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {
                       <?php 
                        $per= new PerfilElimina;
                        $per->borrar(); 
                        ?>
                     Swal.fire(
                     'Eliminado!',
                     'Tu cuenta ha sido elimanada',
                     'success'
                    )
                    
                    <?php
                    include "cerrar.php";
                    ?>
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

$per= new PerfilElimina;
$per->eliminarCuenta();
?>