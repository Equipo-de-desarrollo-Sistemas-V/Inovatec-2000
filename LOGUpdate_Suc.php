<?php
class ActPro{
    function Update(){
        $id= filter_input(INPUT_POST, "idSucursal");
        $mun=$_POST['ciudadSuc'];        
        $estado=$_POST['estado_ah'];
        //echo $id.$mun.$estado;
        
        $serverName='inovatecserver.database.windows.net';
        $connectionInfo = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
        $conn_sis=sqlsrv_connect($serverName, $connectionInfo) ;
        $updateQuery ="UPDATE Sucursal SET ciudad_est=('$mun'),Estado=('$estado') WHERE id_sucursal='$id'";
        $getProv = sqlsrv_query($conn_sis, $updateQuery);
        if( $getProv === false) {            
            die( print_r( sqlsrv_errors(), true) );
        }
        header("location:lista_sucursal.php");
        //echo '<script>alert("Sucursal actualizada con éxito")</script>';
    }
}
    $obj= new ActPro;
    $obj->Update();
