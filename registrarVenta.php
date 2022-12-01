<?php
//[[60020,"10"],[50200,"5"],[50350,"1"],[6654687946549846]]
//conexion a la BD
$serverName='inovatecserver.database.windows.net';
$connectionInfo = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
$con=sqlsrv_connect($serverName, $connectionInfo);

//obtener el numero de la ultima venta
$arreIdVentas=array();
$query="SELECT id_ventas
from ventas
order by fecha desc";
$resultado=sqlsrv_query($con, $query);
while($row = sqlsrv_fetch_array($resultado)){
        $aux=explode("-", $row['id_ventas']);
        $arreIdVentas[]=$aux[0];
};

if (!empty($arreIdVentas)){
    $ultimaVenta=max($arreIdVentas);
}else{
    $ultimaVenta=0;
}
//echo "Ultima venta, id", $ultimaVenta;


//obtengo el arreglo del url de productos de la compra y su cantidad 
$arrProd = (array)json_decode($_GET["item"]);

$totProd=1;
$totVenta=0;
for($z=0;$z<(count($arrProd)-1);$z++) {
    $producto=$arrProd[$z][0]; 
    $cantiCompra=$arrProd[$z][1];  
    
    //echo "<br>-----------------------PRODCUCTO-----------------", $producto, "<br>";
    //echo "Cantida del url ", $cantiCompra;

    //obtengo el precio de venta y nombre del producto actual
    $query="SELECT precio_ven, nombre
    from Productos
    where id_producto='".$producto."'";
    $resultado=sqlsrv_query($con, $query);
    $row = sqlsrv_fetch_array($resultado);
    $precioVenta=$row['precio_ven'];
    $nombreProd=$row['nombre'];

    //arreglos para guardar el stock del productos en las distintas sucursales
    $arreSotck=array();
    $arreSucur=array();
    //$producto=60020;

    //obtengo el stock actual del producto actual, ordeno de mayor a menor y agrego los datos a los arreglos anteriores
    $query="SELECT cantidad, id_sucursal
    from Inventario_suc
    where id_producto='".$producto."' order by cantidad desc";
    $resultado=sqlsrv_query($con, $query);
    while($row = sqlsrv_fetch_array($resultado)){
        $arreSotck[]=$row['cantidad'];
        $arreSucur[]=$row['id_sucursal'];
    };

    //Actualizo stock,, ya sea en una sola sucursal o en varias, dependiendo la cantidad a vander y el stock de la sucursal
    $totSuc=1;
    for($i=0;$i<count($arreSotck);$i++) {
        //echo "<br>"."Stock de la sucusal ".$arreSotck[$i]."________________________Sucursal ".$arreSucur[$i];
        //echo "<br>"."Cantidad compra ".$cantiCompra,"<br>";
        
        if ($cantiCompra!=0){
            if ($arreSotck[$i]!=0){
                
                if($arreSotck[$i]>=$cantiCompra){
                    $updateQuery ="UPDATE Inventario_suc
                    SET cantidad=(cantidad-$cantiCompra)
                    WHERE id_producto='".$producto."' and id_sucursal='".$arreSucur[$i]."'";
                    $resul = sqlsrv_query($con, $updateQuery);  
                    $totVenta+=registrar($producto, $nombreProd, $arreSucur[$i], $cantiCompra, $precioVenta, $ultimaVenta, $totProd, $totSuc, $con);
                    break;                 
                }else{
                    $cantiCompra-=$arreSotck[$i];
                    $updateQuery ="UPDATE Inventario_suc
                    SET cantidad=0
                    WHERE id_producto='".$producto."' and id_sucursal='".$arreSucur[$i]."'";
                    $resul = sqlsrv_query($con, $updateQuery); 
                    $totVenta+=registrar($producto, $nombreProd, $arreSucur[$i], $arreSotck[$i], $precioVenta, $ultimaVenta, $totProd, $totSuc, $con); 
                }
                $totSuc++;
                if ($cantiCompra==0){
                    break;
                }
            } 
        }
    }
    $totProd++;
}

$tarjetaCliente=$arrProd[count($arrProd)-1][0];
//echo "<br> Total de la vetna", $tarjetaCliente;

// actualizo el monto de la tarjeta del cliente
$updateQuery ="UPDATE banco 
SET dineros=(dineros-$totVenta) 
WHERE noTarjeta='".$tarjetaCliente."'";
$getProv = sqlsrv_query($con, $updateQuery);



//obtengo el usuario
error_reporting(0);
session_start();
$usuario = $_SESSION["Usuario"];

//Si se hizo una compra multiple, es decir, desde carrito, se vacia el carrito
$longi=count($arrProd);
if ($longi!=2){
    for($z=0;$z<($longi-1);$z++){
        $idProd=$arrProd[$z][0]; 
        $updateQuery ="DELETE FROM carritoclientes
        WHERE id_producto = '$idProd' and usuario = '$usuario'";
        $eliminar = sqlsrv_query($con, $updateQuery);
    }
}

sqlsrv_close($con);

function registrar($id_producto, $nombreProd, $id_sucrusal, $cantiCompra, $precioVenta, $ultimaVenta, $totProd, $totSuc, $con){           //funcion para registrar las ventas
    //echo $id_producto."  ".$nombreProd."  ".$id_sucrusal."  ".$cantiCompra."  ".$precioVenta."  ".$ultimaVenta."  ".$totProd."  ".$totSuc;
    
    // obtengo la fecha en la que se lleva acabo la venta
    date_default_timezone_set("America/Mexico_City");
    $fechaActual=date("Y-m-d");

    //obtengo el descuento
    $query= "SELECT descuento
    FROM Productos 
    where id_producto ='".$id_producto."'";
      $resultado=sqlsrv_query($con, $query);
      $row = sqlsrv_fetch_array($resultado);
      $auxDesc=$row["descuento"];
    $desc=(($precioVenta*$auxDesc)/100);

    $totalVenta=($precioVenta-$desc)*$cantiCompra;
    $idVenta=strval($ultimaVenta+1)."-".strval($totProd)."-".strval($totSuc);
    //echo "<br> ID DE VENTA", $idVenta, "<br>";
    $query = "INSERT INTO ventas
    VALUES('$fechaActual', '$id_producto', '$nombreProd', '$id_sucrusal', '$cantiCompra', '$precioVenta', '$totalVenta', '$desc', '$idVenta')";
    $resultado=sqlsrv_query($con, $query);
    return $totalVenta;
}
?>

