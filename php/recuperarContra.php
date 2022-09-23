<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<?php
class Recuperacion{
    public $con;
    function __construct(){
    }

    function conexion(){
        $serverName='localhost';
        $connectionInfo=array("Database"=>"ClientePrueba", "UID"=>"Admin", "PWD"=>"12345", "CharacterSet"=>"UTF-8");
        $this->con = sqlsrv_connect($serverName, $connectionInfo);
        if ($this->con){
            echo "Conexion exitosa";
        }else{
            echo "No se pudo conectar";
            die (print_r(sqlsrv_errors(), true));
        }    
    }

    function verificarCorreo(){
        $correo_destino=$_POST["email"];
        echo $correo_destino;
        self::conexion();
        $query= "SELECT email FROM Usuarios where email =$correo_destino";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $resul = sqlsrv_query( $this->con, $query , $params, $options );
        if ($resul==true){
            echo "<br>encontrado";
        }else{
            echo '<script>alert("El correo no se encuentra registrado en el sistema.")</script>';
        }
        // $row_count = sqlsrv_num_rows( $resul );
        // if ($row_count==0){
        //     echo "EMAIL NO REGISTRADO";
        // }else{
        //     echo  "Email si registrado";
        // }
        // if ($row_count === false){
        //     echo "Error in retrieveing row count.";
        //     die( print_r( sqlsrv_errors(), true));
        // }else{
        //     echo $row_count;
        // }
        

    }

    function  enviarCorrreo(){
        //$correo_destino=$_POST["email"];
        $correo_destino='coral85gemma@hotmail.com';
        $asunto="Recuperación de contraseña - InovaTec";  
        $mensaje="Haz clic en el soguiente link para restablecr tu contrase;a";
        $header="Enviado desde la pagina InovaTec";
        mail($correo_destino, $asunto, $mensaje);
        echo '<script>alert("Se ha enviado un correo electronico con las instrucciones para la 
        recuperacion de tu contraseña. Por favor verifica la infromación enviada.")</script>';
        //echo '<script> setTimeout(\"location.href='recuperar2.html'\", 1000)</script>';
        
    }
}

$rec= new Recuperacion;
//$rec->verificarCorreo();
$rec->enviarCorrreo();
?>