<?php
class ActPro{
    function Update(){
        $id= filter_input(INPUT_POST, "idProducto");
        $nombreP=filter_input(INPUT_POST, "nombreProd");
        $apar=$_POST['categoria'];
        $pC=filter_input(INPUT_POST, "precioProd");
        $pV=filter_input(INPUT_POST, "precioVenta");
        $des=filter_input(INPUT_POST, "descripcion");
        $proved=$_POST['proveedor'];
        $subA=$_POST['subcategoria'];
        $estado=$_POST['estado_ah'];
        //echo $id.$nombreP.$apar.$pC.$pV.$des.$subA;
        
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conn_sis=sqlsrv_connect($serverName, $connectionInfo) ;
        $updateQuery ="UPDATE Productos SET nombre=('$nombreP'),Apartado=('$apar'),precio_com=('$pC'),precio_ven=('$pV'), descripcion=('$des'),Subapartado=('$subA'), Estado=('$estado') WHERE id_producto=$id";
        $getProv = sqlsrv_query($conn_sis, $updateQuery);
        if( $getProv === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        include("lista_productos.php");
        echo '<script>alert("Producto actualizado con éxito")</script>';
    }
}
    $obj= new ActPro;
    $obj->Update();
    /*<?php                                                            
                                                            $serverName='localhost';
                                                            $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
                                                            $conn_sis=sqlsrv_connect($serverName, $connectionInfo);
                                                            $getSubApartado ="select * from SubApartados where id_ap=$cate";
                                                            $getSubApartado2 = sqlsrv_query($conn_sis, $getSubApartado);
                                                            if( $getSubApartado2 === false) {
                                                                die( print_r( sqlsrv_errors(), true) );
                                                            }
                                                            while ($rowSubApartado = sqlsrv_fetch_array($getSubApartado2))
                                                            {
                                                                $id_sap=$rowSubApartado['Id_subap'];
                                                                $ap=$rowSubApartado['id_ap'];
                                                                $subapartado=$rowSubApartado['SubApartado'];
                                                                if($id_sap==$subcate){
                                                                ?>
                                                                    <option value="<?php echo $id_sap;?>" selected><?php echo $subapartado;?></option>
                                                                <?php    
                                                                }else{
                                                                ?>
                                                                <option value="<?php echo $id_sap;?>"><?php echo $subapartado;?></option>
                                                                <?php
                                                                }                                                                
                                                            }

                                                        ?>  */
?>
