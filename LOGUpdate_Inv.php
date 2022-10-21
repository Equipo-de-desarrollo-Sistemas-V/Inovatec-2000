<?php
class ActPro{
    function Update(){
        $id_pro= filter_input(INPUT_POST, "idProducto");
        $id_suc=$_POST['idSucursal'];
        $cantidad= filter_input(INPUT_POST, "cantidad");
        $stock= filter_input(INPUT_POST, "stockmin");
        //echo $id.$mun.$estado;
        
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conn_sis=sqlsrv_connect($serverName, $connectionInfo) ;
        $updateQuery ="UPDATE Inventario_suc SET cantidad=('$cantidad'), stock_min=('$stock') WHERE id_producto='$id_pro' and id_sucursal='$id_suc'";
        $getProv = sqlsrv_query($conn_sis, $updateQuery);
        if( $getProv === false) {            
            die( print_r( sqlsrv_errors(), true) );
        }
        include("consulta_inventario.php");
        //echo '<script>alert("Inventario actualizado con éxito")</script>';
    }
}
    $obj= new ActPro;
    $obj->Update();
