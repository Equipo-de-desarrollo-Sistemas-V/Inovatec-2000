<?php
        $id= filter_input(INPUT_POST, "idProducto");
        $nombreP=filter_input(INPUT_POST, "nombreProd");
        $apar=$_POST['categoria'];
        $pC=filter_input(INPUT_POST, "precioProd");
        $pV=filter_input(INPUT_POST, "precioVenta");
        $des=filter_input(INPUT_POST, "descripcion");
        $proved=$_POST['proveedor'];
        $subA=$_POST['subcategoria'];
        echo $id.$nombreP.$apar.$pC.$pV.$des.$subA;
        
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conn_sis=sqlsrv_connect($serverName, $connectionInfo) ;
        $updateQuery ="UPDATE Productos SET nombre=('$nombreP'),Apartado=('$apar'),precio_com=('$pC'),precio_ven=('$pV'), descripcion=('$des'),Subapartado=('$subA') WHERE id_producto=$id";
        $getProv = sqlsrv_query($conn_sis, $updateQuery);
        if( $getProv === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
?>
