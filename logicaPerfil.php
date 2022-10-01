<?php
class PerfilCliente{
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
            //echo json_encode('conR');
            echo "No se puedo conectar";
        }  
    }

    
    function eliminarCuenta(){
        $ingreso="Naye";
        $contra=$_POST["delete-password"];
        $confirmacion=$_POST["confirm-delete-password"];
        if($contra != $confirmacion){
            echo json_encode('confirmacion');
            //echo "no coinciden";
        }else{
            $ban1=false;
            self::conexion();
            if ($this->varConectado===true){
                try{
                    $query= "SELECT Contra_us FROM Persona WHERE Usuario='$ingreso'";
                    $resultado=sqlsrv_query( $this->con, $query);
                    $row1 = sqlsrv_fetch_array($resultado);
                    $hash=$row1['Contra_us'];
                    if (password_verify($contra, $hash)){
                        $query= "DELETE FROM Tarjetas WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query( $this->con, $query);
                        $query= "DELETE FROM Direccion WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query( $this->con, $query);
                        $query= "DELETE FROM Persona WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query( $this->con, $query);
                         $ban1=true;
                    }else{
                        //echo "Constrase;a incorrecta";
                        echo json_encode('incor');
                    }

                   

                }catch(Exception $e){
                    $this->varConectado=false;
                    sqlsrv_close($this->con);
                }
                if ($ban1===true){
                    //echo "Cuenta eliminada";
                    echo json_encode('elim');
                    $this->varConectado=false;
                    sqlsrv_close($this->con);
                }
            }
        }
    }

    
    }

$per= new PerfilCliente;
//$per->botones();
?>

?>