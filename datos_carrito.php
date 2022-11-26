<?php
    //Obtencion del usuario logeado
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    //conexion a la BD
    $serverName='localhost';
    $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
    $con=sqlsrv_connect($serverName, $connectionInfo);

    //obtengo el arreglo del url de productos para agregar al carrito y su cantidad 
    $arrProd = (array)json_decode($_GET["item"]);

    //Verifico si el producto ya esta agregado al carrito, en caso de ser asi actualizo cantidad, en caso contrario agrego producto a tabla
    $query = "SELECT id_producto,cantidad 
    FROM carritoclientes 
    WHERE Usuario='$sesion_i'";
    $resultado=sqlsrv_query($con, $query);
    while($row = sqlsrv_fetch_array($resultado)){
        $arrayProd[]=$row('id_producto');
    }
    $producto_carrito=$arrProd[0][0];
    $band=FALSE;
    for($i=0;$i<count($arrayProd);$i++) {
        if ($producto_carrito==$arrayProd[$i]){
            $band=TRUE;
        }
    }
    if ($band==TRUE){
        $cantidad=$arrProd[0][1];
        $query_update="UPDATE carritoclientes 
        set cantidad=$cantidad 
        where Usuario='$sesion_i' 
        and id_producto='$producto_carrito'";
        $resultado=sqlsrv_query($con, $query_update);
    }
    else{
        $cantidad=$arrProd[0][1];
        $query_update="INSERT INTO carritoclientes 
        VALUES('$sesion_i','$producto_carrito',$cantidad)";
        $resultado=sqlsrv_query($con, $query_update);
    }
?>

    