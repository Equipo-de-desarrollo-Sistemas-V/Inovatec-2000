<?php

//a diferencia de auxConsulInventario, aqui solo se muestran los productos donde el existente es menor o igual que el stock minimo

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
where Productos.id_producto=Inventario_suc.id_producto and Inventario_suc.cantidad<=Inventario_suc.stock_min";

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
    Productos.id_producto=Inventario_suc.id_producto and 
    Inventario_suc.cantidad<=Inventario_suc.stock_min
    ORDER BY Productos.id_producto";
}



$resultado=sqlsrv_query($con, $query);
//if(!empty($row)){
if($resultado==true){
    //define el fromato de la tabla
    $salida.=
    "<table>
    <thead>
        <tr>
            <th>Id producto</th> 
            <th>Nombre producto</th> 
            <th>Sucursal</th> 
            <th>Existentes</th> 
            <th>Stock mínimo</th> 
        </tr>
    </thead>
    <tbody>";
    // <th>Inversión</th>
    // <th>Valor</th>
    while( $row = sqlsrv_fetch_array($resultado) ) {
                            $id=$row["id_producto"];
							$nombre=$row["nombre"];
							$sucursal=$row["id_sucursal"];
							$cantidad=$row["cantidad"];
							$min=$row["stock_min"];
							$inver=$row["Inversion"];
							$valor=$row["Valor"];
							$edi='Editar';
							$eli='Eliminar';
        //muestra los resultados en la tabla
        $salida.='<tr>';
        $salida.='<td>'.$id.'</td>';
        $salida.='<td>'.$nombre.'</td>'; 
        $salida.='<td>'.$sucursal.'</td>'; 
        $salida.='<td>'.$cantidad.'</td>'; 
        $salida.='<td>'.$min.'</td>'; 
        //$salida.='<td>'.$inver.'</td>'; 
        //$salida.='<td>'.$valor.'</td>';
        //$salida.='<td>'.'<a href="LOGActualizar_Inv.php?item='.$id.'">'.$edi. '</a>'.'</td>';
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

