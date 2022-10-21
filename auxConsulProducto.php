<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 


$salida="";
//Consulta normal, muetra todos los registros
$query="SELECT Productos.id_producto, Productos.nombre, descripcion, Apartados.Nombre, Subapartados.SubApartado, precio_com, precio_ven, nombre_empresa, Productos.Estado
from [Productos], [Apartados], [Subapartados], [Proveedores]
where Apartado=Apartados.ID_ap and
Productos.id_proveedor=Proveedores.id_proveedor and
Productos.Subapartado=Subapartados.Id_subap 
ORDER BY Productos.id_producto";

//detecta si se escribio algo en la caja de busqueda
//Consulta que busca lo que hay dentro de la caja de busqueda, en todas las columnas
if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query="SELECT Productos.id_producto, Productos.nombre, descripcion, Apartados.Nombre, Subapartados.SubApartado, precio_com, precio_ven, nombre_empresa, Productos.Estado
    FROM[Productos], [Apartados], [Subapartados], [Proveedores]
    WHERE (Productos.id_producto like '%".$q."%' or 
    Productos.nombre like '%".$q."%' or 
    descripcion like '%".$q."%' or
    Apartados.Nombre like '%".$q."%' or
    Subapartados.SubApartado like '%".$q."%' or
    precio_com like '%".$q."%' or
    precio_ven like '%".$q."%' or
    nombre_empresa like '%".$q."%' or
    Productos.Estado like '%".$q."%') and
    (Apartado=Apartados.ID_ap and
    Productos.id_proveedor=Proveedores.id_proveedor and
    Productos.Subapartado=Subapartados.Id_subap) 
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
            <th>Id</th> 
            <th>Nombre</th> 
            <th>Descripcion</th> 
            <th>Categoria</th> 
            <th>Subcategoria</th> 
            <th>Precio compra</th> 
            <th>Precio venta</th> 
            <th>Proveedor</th>
            <th>Imagen</th>
            <th>Condicion</th>
            <th>Acciones</th>
            <th></th>
        </tr>
    </thead>
    <tbody>";
    while( $row = sqlsrv_fetch_array($resultado) ) {
                            $id=$row["id_producto"];
							$nombre=$row["nombre"];
							$descri=$row["descripcion"];
							$categoria=$row["Nombre"];
							$subcate=$row["SubApartado"];
							$pre_com=$row["precio_com"];
							$pre_ven=$row["precio_ven"];
							$proveedor=$row["nombre_empresa"];
                            $query0="SELECT ruta FROM imagenes WHERE id_prod='$id'";
                            $resultados0=sqlsrv_query($con, $query0);
                            if( $resultados0 === false) {
								die( print_r( sqlsrv_errors(), true) );
							}
                            while ($row0= sqlsrv_fetch_array($resultados0)) {
                                $imagen=$row0["ruta"];
                            }
                            $condi=$row["Estado"];
							$edi='Editar';
							$eli='Eliminar';
            if ($condi==='Activo'){
                $aux="Activo";
            }else{
                $aux="No surtiendo";
            }
        //muestra los resultados en la tabla
        $salida.='<tr>';
        $salida.='<td>'.$id.'</td>';
        $salida.='<td>'.$nombre.'</td>'; 
        $salida.='<td>'.$descri.'</td>'; 
        $salida.='<td>'.$categoria.'</td>'; 
        $salida.='<td>'.$subcate.'</td>'; 
        $salida.='<td>'.$pre_com.'</td>'; 
        $salida.='<td>'.$pre_ven.'</td>'; 
        $salida.='<td>'.$proveedor.'</td>';
        $salida.='<td>'.'<p><img src="' .$imagen. '" width="50" height="50"></p></td>';
        $salida.='<td>'.$aux.'</td>';
        $salida.='<td>'.'<a href="LOGActualizar.php?item='.$id.'">'.$edi. '</a>'.'</td>';
        $salida.='<td>'.'<a href="LOGEliminar_p.php?id='.$id.'" ; class="table__item_link">'.$eli. '</a>'.'</td>';
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
<script src="alertaEliminar.js"></script>

