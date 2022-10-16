<?php
class ActPro{
    function Update(){
        $id= filter_input(INPUT_POST, "idSucursal");
        $mun=$_POST['ciudadSuc'];        
        $estado=$_POST['estado_ah'];
        //echo $id.$mun.$estado;
        
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conn_sis=sqlsrv_connect($serverName, $connectionInfo) ;
        $updateQuery ="UPDATE Sucursal SET ciudad_est=('$mun'),Estado=('$estado') WHERE id_sucursal='$id'";
        $getProv = sqlsrv_query($conn_sis, $updateQuery);
        if( $getProv === false) {            
            die( print_r( sqlsrv_errors(), true) );
        }
        include("lista_sucursal.php");
        echo '<script>alert("Sucursal actualizada con éxito")</script>';
    }
}
    $obj= new ActPro;
    $obj->Update();
