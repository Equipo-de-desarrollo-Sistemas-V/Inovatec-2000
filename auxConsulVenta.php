<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8", 'ReturnDatesAsStrings'=> true);
$con = sqlsrv_connect($serverName, $connectionInfo); 


$salida="";
//Consulta normal, muetra todos los registros
$query="SELECT ventas.id_ventas, ventas.fecha, ventas.id_prod, ventas.nombre,
ventas.id_suc, Apartados.Nombre, Subapartados.SubApartado, 
ventas.cantidad, ventas.precio_ven,
ventas.descuento, ventas.total
FROM [ventas], [Productos], [Apartados], [Subapartados]
WHERE ventas.id_prod=Productos.id_producto and 
ventas.nombre=Productos.nombre and
Productos.Subapartado=Subapartados.Id_subap and 
Productos.Apartado=Apartados.ID_ap";

//detecta si se escribio algo en la caja de busqueda
//Consulta que busca lo que hay dentro de la caja de busqueda, en todas las columnas
if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query="SELECT ventas.fecha, ventas.id_prod, ventas.nombre,
    ventas.id_suc, Apartados.Nombre, Subapartados.SubApartado, 
    ventas.cantidad, ventas.precio_ven,
    ventas.descuento, ventas.total
    FROM [ventas], [Productos], [Apartados], [Subapartados]
    WHERE (ventas.id_ventas like '%".$q."%' or 
    ventas.fecha like '%".$q."%' or 
    ventas.id_prod like '%".$q."%' or 
    ventas.nombre like '%".$q."%' or
    ventas.id_suc like '%".$q."%' or
    Apartados.Nombre like '%".$q."%' or
    Subapartados.SubApartado like '%".$q."%' or
    ventas.cantidad like '%".$q."%' or
    ventas.precio_ven like '%".$q."%' or
    ventas.descuento like '%".$q."%' or
    ventas.total like '%".$q."%') and
    (ventas.id_prod=Productos.id_producto and 
    ventas.nombre=Productos.nombre and
    Productos.Subapartado=Subapartados.Id_subap and 
    Productos.Apartado=Apartados.ID_ap)";
}



$resultado=sqlsrv_query($con, $query);
//if(!empty($row)){
if($resultado==true){
    //define el fromato de la tabla
    $salida.=
    "<table>
    <thead>
        <tr>
            <th>Id venta</th> 
            <th>Fecha</th> 
            <th>Id producto</th> 
            <th>Producto</th> 
            <th>Id sucursal</th> 
            <th>categoría</th>
            <th>Subcategoría</th>
            <th>Cantidad </th>
            <th>Precio de venta </th>
            <th>Descuento </th>
            <th>Total </th>
        </tr>
    </thead>
    <tbody>";
    while( $row = sqlsrv_fetch_array($resultado) ) {
                            $fecha=$row["fecha"];
							$id_prod=$row["id_prod"];
							$nombre=$row["nombre"];
							$id_suc=$row["id_suc"];
							$cate=$row["Nombre"];
							$subcate=$row["SubApartado"];
							$cantidad=$row["cantidad"];
							$pre_ven=$row["precio_ven"];
                            $descuento=$row["descuento"];
                            $total=$row["total"];
                            $id=$row["id_ventas"];
							$edi='Editar';
							$eli='Eliminar';
        //muestra los resultados en la tabla
        $salida.='<tr>';
        $salida.='<td>'.$id.'</td>';
        $salida.='<td>'.$fecha.'</td>';
        $salida.='<td>'.$id_prod.'</td>'; 
        $salida.='<td>'.$nombre.'</td>'; 
        $salida.='<td>'.$id_suc.'</td>'; 
        $salida.='<td>'.$cate.'</td>'; 
        $salida.='<td>'.$subcate.'</td>'; 
        $salida.='<td>'.$cantidad.'</td>'; 
        $salida.='<td>'.$pre_ven.'</td>';
        $salida.='<td>'.$descuento.'</td>';
        $salida.='<td>'.$total.'</td>';
		$salida.='</tr>';
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