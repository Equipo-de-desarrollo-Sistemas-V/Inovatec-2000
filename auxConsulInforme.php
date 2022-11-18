<?php
//echo '<script>alert("Si entra al arcihvo de logica");</script>';
$serverName = 'localhost';
$connectionInfo = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo);


$salida = "";
//Consulta normal, muetra todos los registros
$query = "SELECT Productos.id_producto, Productos.precio_com,
Productos.precio_ven, Productos.precio_com*0.16 as iva
FROM Productos";

//detecta si se escribio algo en la caja de busqueda
//Consulta que busca lo que hay dentro de la caja de busqueda, en todas las columnas
if (isset($_POST['consulta'])) {
    $q = ($_POST['consulta']);
    $query = "SELECT Productos.id_producto, Productos.precio_com,
    Productos.precio_ven, Productos.precio_com*0.16 as iva
    FROM Productos
    where (Productos.id_producto like '%".$q."%' or 
    productos.precio_com like '%".$q."%' or productos.precio_ven like '%.$q.%'
    or iva like '%".$q."%'";
    //like '%".$q."%'

}


//Consulta para saber el total de resgistros que cumplen la condicion
$resultad0 = sqlsrv_query($con, $query);
if ($resultad0 == true) {
    $cont = 0;
    while ($row = sqlsrv_fetch_array($resultad0)) {
        $cont++;
    }
}

//contador para saber que registro se esta mostrando y en el ultimo agregar una fila para el total
$x = 0;

//contadores para guardar el total de la inversion y el total del valor, 
//de todos los registros que se muestren en la tabla
$totIva = 0;
$totValor = 0;
$total_precio_venta = 0;
$total_precio_compra = 0;
$total_final = 0;


$resultado = sqlsrv_query($con, $query);
if ($resultado == true) {
    //define el formato de la tabla
    $salida .=
        "<table>
    <thead>
        <tr>
            <th>Id producto</th> 
            <th>Cantidad</th> 
            <th>Precio de compra</th> 
            <th>Precio público</th> 
            <th>IVA</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>";
    while ($row = sqlsrv_fetch_array($resultado)) {
        //condicional que permite mostrar los registros obtenidos de la consulta
        if ($x < $cont) {
            $id = $row["id_producto"];
            $cantidad = getCantidad($row["id_producto"]);
            $precio_venta = quitarCeros($row["precio_com"]);
            $precio_compra = quitarCeros($row["precio_ven"]);
            $iva = quitarCerosIva($row["iva"]);
            $total = $row["precio_ven"] * $cantidad;

            $total_precio_compra = $total_precio_compra + $precio_compra;
            $total_precio_venta = $total_precio_venta + $precio_venta;
            $totIva = $totIva + $iva;
            $total_final = $total_final + $total;

            //muestra los resultados en la tabla
            $salida .= '<tr>';
            $salida .= '<td>' . $id . '</td>';
            $salida .= '<td>' . $cantidad . '</td>';
            $salida .= '<td>' . "$".$precio_venta . '</td>';
            $salida .= '<td>' . "$".$precio_compra . '</td>';
            $salida .= '<td>' . $iva . '</td>';
            $salida .= '<td>' . "$".$total       . '</td>';
        }

        //condicional que identifica cuando se acaba de mostrar el ultimo registros, y asi añadir una ultima fila
        //con los totales
        if ($x + 1 == $cont) {
            //muestra los resultados en la tabla
            $salida .= '<tr>';
            $salida .= '<td>' . "" . '</td>';
            $salida .= '<td>' . "TOTAL" . '</td>';
            $salida .= '<td>' . "$".$total_precio_compra . '</td>';
            $salida .= '<td>' . "$".$total_precio_venta . '</td>';
            $salida .= '<td>' . $totIva . '</td>';
            $salida .= '<td>' . "$".$total_final . '</td>';

        }

        $x++;
    }

    $salida .= "</tbody></table>";
} else {
    $no = 'No hay resultados';
    $salida .= '<tr>';
    $salida .= '<td>' . $no . '</td>';
    $salida .= '</tr>';
}

function getCantidad($id_prod){
    $serverName = 'localhost';
    $connectionInfo = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
    $con = sqlsrv_connect($serverName, $connectionInfo);


    $query = "SELECT cantidad FROM Inventario_suc
    WHERE id_producto = $id_prod";

    $resultado = sqlsrv_query($con, $query);

    $acum = 0;

    while($row = sqlsrv_fetch_array($resultado)){
        $acum = $acum + $row["cantidad"];
    }
    return $acum;
}

function quitarCeros($cadena){
    $cad = substr($cadena, 0, -2);
    return $cad;
}

function quitarCerosIva($cadena)
{
    $cad = substr($cadena, 0, -4);
    return $cad;
}

sqlsrv_close($con);
echo $salida;
?> 