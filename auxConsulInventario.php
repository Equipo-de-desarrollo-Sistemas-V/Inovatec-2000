<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 


$salida="";
//Consulta normal, muetra todos los registros
$query="SELECT Productos.id_producto, Productos.nombre, Inventario_suc.id_sucursal,
Inventario_suc.cantidad, Inventario_suc.stock_min,
Inventario_suc.cantidad*Productos.precio_com AS Inversion, 
Inventario_suc.cantidad*Productos.precio_ven AS Valor
FROM [Productos], [Inventario_suc]
where Productos.id_producto=Inventario_suc.id_producto";

//detecta si se escribio algo en la caja de busqueda
//Consulta que busca lo que hay dentro de la caja de busqueda, en todas las columnas
if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query="SELECT Productos.id_producto, Productos.nombre, Inventario_suc.id_sucursal,
    Inventario_suc.cantidad, Inventario_suc.stock_min,
    Inventario_suc.cantidad*Productos.precio_com AS Inversion, 
    Inventario_suc.cantidad*Productos.precio_ven AS Valor
    FROM [Productos], [Inventario_suc]
    where (Productos.id_producto like '%".$q."%' or 
    Productos.nombre like '%".$q."%' or 
    Inventario_suc.cantidad like '%".$q."%' or 
    Inventario_suc.stock_min like '%".$q."%' or
    Inventario_suc.id_sucursal like '%".$q."%') and 
    Productos.id_producto=Inventario_suc.id_producto
    ORDER BY Productos.id_producto";
}


//Consulta para saber el total de resgistros que cumplen la condicion
$resultad0=sqlsrv_query($con, $query);
if($resultad0==true){
    $cont=0;
    while( $row = sqlsrv_fetch_array($resultad0) ) {
        $cont++;
    }
}

//contador para saber que registro se esta mostrando y en el ultimo agregar una fila para el total
$x=0;

//contadores para guardar el total de la inversion y el total del valor, 
//de todos los registros que se muestren en la tabla
$totInversion=0;
$totValor=0;


$resultado=sqlsrv_query($con, $query);
if($resultado==true){
    //define el formato de la tabla
    $salida.=
    "<table>
    <thead>
        <tr>
            <th>Id producto</th> 
            <th>Nombre producto</th> 
            <th>Sucursal</th> 
            <th>Existentes</th> 
            <th>Stock mínimo</th> 
            <th>Inversión</th>
            <th>Valor</th>
            <th>Acciones</th>
            <th></th>
        </tr>
    </thead>
    <tbody>";
    while( $row = sqlsrv_fetch_array($resultado) ) {
        //condicional que permite mostrar los registros obtenidos de la consulta
        if ($x<$cont){
                            $id=$row["id_producto"];
							$nombre=$row["nombre"];
							$sucursal=$row["id_sucursal"];
							$cantidad=$row["cantidad"];
							$min=$row["stock_min"];
							$inver=$row["Inversion"];
							$valor=$row["Valor"];
							$edi='Editar';
							$eli='Eliminar';
                            $totInversion=$totInversion+$inver;
                            $totValor=$totValor+$valor;
        //muestra los resultados en la tabla
        $salida.='<tr>';
        $salida.='<td>'.$id.'</td>';
        $salida.='<td>'.$nombre.'</td>'; 
        $salida.='<td>'.$sucursal.'</td>'; 
        $salida.='<td>'.$cantidad.'</td>'; 
        $salida.='<td>'.$min.'</td>'; 
        $salida.='<td>'.$inver.'</td>'; 
        $salida.='<td>'.$valor.'</td>';
        $salida.='<td>'.'<a href="LOGActualizar_Inv.php?item='.$id.'">'.$edi. '</a>'.'</td>';
        $salida.='<td>'.'<a href="LOGEliminar_p.php?id='.$id.'" ; class="table__item_link">'.$eli. '</a>'.'</td>';
		$salida.='</tr>';
        }

        //condicional que identifica cuando se acaba de mostrar el ultimo registros, y asi añadir una ultima fila
        //con los totales
        if ($x+1==$cont){
        //muestra los resultados en la tabla
        $salida.='<tr>';
        $salida.='<td>'."".'</td>';
        $salida.='<td>'."".'</td>'; 
        $salida.='<td>'."".'</td>'; 
        $salida.='<td>'."".'</td>'; 
        $salida.='<td>'."TOTAL".'</td>'; 
        $salida.='<td>'.$totInversion.'</td>'; 
        $salida.='<td>'.$totValor.'</td>';
        $salida.='<td>'."".'</td>';
        $salida.='<td>'."".'</td>';
        $salida.='</tr>';
        }

        $x++;
    }

	$salida.="</tbody></table>";
    

}else{
    $no='No hay resultados';
    $salida.='<tr>';
    $salida.='<td>'.$no.'</td>';
    $salida.='</tr>';
    
}
sqlsrv_close($con);
echo $salida;
?>
<script src="js/alertaEliminar_Inv.js"></script> 


