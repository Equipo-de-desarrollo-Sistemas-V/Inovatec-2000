<?php
    $producto_carrito = $_POST['auxProd'];
    $cantidad_carrito = $_POST['auxCanti'];

    //Obtencion del usuario logeado
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    //conexion a la BD
    $serverName='localhost';
    $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
    $con=sqlsrv_connect($serverName, $connectionInfo);

    if ($con){
        $query = "SELECT COUNT(*) as limite 
        FROM carritoclientes 
        WHERE Usuario='$usuario'";
        $resultado=sqlsrv_query($con, $query);
        $row=sqlsrv_fetch_array($resultado);
        $totProd=$row['limite'];
        if ($totProd>24){
            echo json_encode("Has llegado al límite de productos permitidos en carrito. Por favor vacía el carrito.");
        }else{
            //Verifico si el producto ya esta agregado al carrito, en caso de ser así actualizo solo la cantidad, en caso contrario agrego el producto a la tabla
        $query = "SELECT cantidad 
        FROM carritoclientes 
        WHERE Usuario='$usuario' and id_producto='$producto_carrito'";
        $resultado=sqlsrv_query($con, $query);
        $row=sqlsrv_fetch_array($resultado);
        $cant=$row['cantidad'];

        if($cant==''){
            $query_insert="INSERT INTO carritoclientes 
            VALUES('$usuario','$producto_carrito',$cantidad_carrito)";
            $resultado=sqlsrv_query($con, $query_insert);
            echo json_encode("Producto agregado al carrito");

            
        }
        else{
            $query_update="UPDATE carritoclientes 
            set cantidad=(cantidad + $cantidad_carrito)
            where Usuario='$usuario' 
            and id_producto='$producto_carrito'";
            $resultado=sqlsrv_query($con, $query_update);
            echo json_encode("Producto agregado al carrito");
        }
        }



        
    }
    else{
        echo json_encode('No se pudo conectar con BD');
    }

?>

    