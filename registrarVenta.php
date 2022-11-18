<?php
//obtengo id del producto de la compra y la cantidad
$idProducto=$_GET["item"];
  
$array1 = explode("/",$idProducto);
$producto=$array1[0];
$cantiCompra=$array1[1];
$tarjetaCliente=$array1[2];

//conexion a la BD
$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con=sqlsrv_connect($serverName, $connectionInfo) ;


//obtengo el stock actual del producto
$query="SELECT cantidad, id_sucursal
from Inventario_suc
where id_producto='".$producto."'";
$resultado=sqlsrv_query($con, $query);
while($row = sqlsrv_fetch_array($resultado)){
    $auxStock=$row['cantidad'];
    if ($auxStock!=0){
        $stockActual=$row['cantidad'];
        $sucursalActual=$row['id_sucursal'];
        break;
    }
};

$nuevoStock=$stockActual-$cantiCompra;

//actualizo el stock del producto
$updateQuery ="UPDATE Inventario_suc
SET cantidad='".$nuevoStock."' 
WHERE id_producto='".$producto."' and id_sucursal='".$sucursalActual."'";
$resul = sqlsrv_query($con, $updateQuery);


//obtengo el precio de venta y nombre del producto
$query="SELECT precio_ven, nombre
from Productos
where id_producto='".$producto."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$precioVenta=$row['precio_ven'];
$nombreProd=$row['nombre'];

//obtengo el monto actual de la tarjeta del cliente
$query="SELECT dineros
from banco
where noTarjeta='".$tarjetaCliente."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$montoActual=$row['dineros'];

$totalVenta=$cantiCompra*$precioVenta;
$nuevoMonto=$montoActual-$totalVenta;

// actualizo el monto de la tarjeta del cliente
$updateQuery ="UPDATE banco 
SET dineros='".$nuevoMonto."' 
WHERE noTarjeta='".$tarjetaCliente."'";
$getProv = sqlsrv_query($con, $updateQuery);


// obtengo la fecha en la que se lleva acabo la venta
date_default_timezone_set("America/Mexico_City");
$fechaActual=date("Y-m-d");

//obtengo el total de ventas que se han realizado y asi poder asignar un id a la nueva venta
$query="SELECT count(*) as tot
from ventas";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$totVentas=$row['tot'];

//registro la nueva venta
$desc=0;
$idVenta=$totVentas+1;
$query = "INSERT INTO ventas
VALUES('$fechaActual', '$producto', '$nombreProd', '$sucursalActual', '$cantiCompra', '$precioVenta', '$totalVenta', '$desc', '$idVenta')";
$resultado=sqlsrv_query($con, $query);


// falta verificar que el stock actual de la sucursal seleccionada sea sufciente para surtir la compra
?>

