<?php
    $producto_carrito = $_POST['auxCanti'];
    $cantidad_carrito = $_POST['auxProd'];

    //Obtencion del usuario logeado
    error_reporting(0);
    session_start();
    $usuario = $_SESSION["Usuario"];

    //conexion a la BD
    $serverName='localhost';
    $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
    $con=sqlsrv_connect($serverName, $connectionInfo);
    if ($con){
        //obtengo el arreglo del url de productos para agregar al carrito y su cantidad 
        $arrProd = (array)json_decode($_GET["item"]);
        //$producto_carrito=$arrProd[0][0];
        //$cantidad_carrito=$arrProd[0][1];

        //Verifico si el producto ya esta agregado al carrito, en caso de ser así actualizo solo la cantidad, en caso contrario agrego el producto a la tabla
        $query = "SELECT id_producto,cantidad 
        FROM carritoclientes 
        WHERE Usuario='$usuario'";
        $resultado=sqlsrv_query($con, $query);
        $cantidad=$row['cantidad'];
        $band=FALSE;
        while($row = sqlsrv_fetch_array($resultado)){
            $producto_clientes=$row('id_producto');
            if ($producto_carrito==$producto_clientes){
                $band=TRUE;
                break;
            }
        }
        if ($band==TRUE){
            $query_update="UPDATE carritoclientes 
            set cantidad=($cantidad + $cantidad_carrito)
            where Usuario='$usuario' 
            and id_producto='$producto_carrito'";
            $resultado=sqlsrv_query($con, $query_update);
            echo json_encode("Producto agregado al carrito");
        }
        else{
            $cantidad=$arrProd[0][1];
            $query_insert="INSERT INTO carritoclientes 
            VALUES('$usuario','$producto_carrito',$cantidad_carrito)";
            $resultado=sqlsrv_query($con, $query_insert);
            echo json_encode("Producto agregado al carrito");
        }

        //actualizo el stock de inventario (no se si se tenga que actualizar el stock en inventario, por eso lo pongo en comentarios xd)
        /*$query="SELECT cantidad, id_sucursal
        from Inventario_suc
        where id_producto='$producto_carrito' order by cantidad";
        $resultado=sqlsrv_query($con, $query);
        $row = sqlsrv_fetch_array($resultado);
        $sucur=$row['id_sucursal'];

        $query_update="UPDATE Inventario_suc
        SET cantidad=(cantidad-$cantidad_carrito)
        WHERE id_producto='$producto_carrito' and id_sucursal='$sucur'";
        $resultado=sqlsrv_query($con, $query_update);
        */
        
    }
    else{
        echo json_encode('No se pudo conectar con BD');
    }

?>

    