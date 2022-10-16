<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 


$salida="";

$query="SELECT Productos.id_producto, Productos.nombre, descripcion, Apartados.Nombre, Subapartados.SubApartado, precio_com, precio_ven, nombre_empresa
from [Productos], [Apartados], [Subapartados], [Proveedores]
where Apartado=Apartados.ID_ap and
Productos.id_proveedor=Proveedores.id_proveedor and
Productos.Subapartado=Subapartados.Id_subap 
ORDER BY Productos.id_producto";


if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query="SELECT Productos.id_producto, Productos.nombre, descripcion, Apartados.Nombre, Subapartados.SubApartado, precio_com, precio_ven, nombre_empresa  
    FROM[Productos], [Apartados], [Subapartados], [Proveedores]
    WHERE (Productos.id_producto like '%".$q."%' or 
    Productos.nombre like '%".$q."%' or 
    descripcion like '%".$q."%' or
    Apartados.Nombre like '%".$q."%' or
    Subapartados.SubApartado like '%".$q."%' or
    precio_com like '%".$q."%' or
    precio_ven like '%".$q."%' or
    nombre_empresa like '%".$q."%') and
    (Apartado=Apartados.ID_ap and
    Productos.id_proveedor=Proveedores.id_proveedor and
    Productos.Subapartado=Subapartados.Id_subap) 
    ORDER BY Productos.id_producto";
}



$resultado=sqlsrv_query($con, $query);
//if(!empty($row)){
if($resultado==true){
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
							$edi='Editar';
							$eli='Eliminar';
        $salida.='<tr>';
        $salida.='<td>'.$id.'</td>';
        $salida.='<td>'.$nombre.'</td>'; 
        $salida.='<td>'.$descri.'</td>'; 
        $salida.='<td>'.$categoria.'</td>'; 
        $salida.='<td>'.$subcate.'</td>'; 
        $salida.='<td>'.$pre_com.'</td>'; 
        $salida.='<td>'.$pre_ven.'</td>'; 
        $salida.='<td>'.$proveedor.'</td>';
        $salida.='<td>'.'</td>';
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
echo $salida;
?>
<!-- <script src="alertaEliminar.js"></script> -->

