<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 

$query0="SELECT COUNT(*) AS total_registro FROM Productos";
$res0= sqlsrv_query($con, $query0);
if( $res0 === false) {
	die( print_r( sqlsrv_errors(), true) );
}
	while( $row0 = sqlsrv_fetch_array($res0) ) {
	$total_registro=$row0["total_registro"];
}
	$por_pagina=10;
if (empty($_GET['pagina'])){
	$pagina=1;
}else{
	$pagina=$_GET['pagina'];
}
$desde=($pagina-1)*$por_pagina;
$total_paginas=ceil($total_registro/$por_pagina);



$salida="";
// $query="SELECT id_producto, nombre, descripcion, Apartado, Subapartado, precio_com, precio_ven, id_proveedor FROM Productos ORDER BY id_producto";

$query="SELECT * FROM Productos ORDER BY id_producto OFFSET $desde ROWS FETCH NEXT $por_pagina ROWS ONLY";


if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query="SELECT id_producto, nombre, descripcion, Apartado, Subapartado, precio_com, precio_ven, id_proveedor FROM Productos WHERE nombre LIKE '%".$q."%' OR descripcion LIKE '%".$q."%' OR Apartado LIKE '%".$q."%'";
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
							$cate=$row["Apartado"];
							$query1="SELECT Nombre FROM Apartados WHERE ID_ap='$cate'";
							$res1= sqlsrv_query($con, $query1);
							while( $row1 = sqlsrv_fetch_array($res1) ) {
								$categoria=$row1["Nombre"];
							}
							$subcate=$row["Subapartado"];
							$pre_com=$row["precio_com"];
							$pre_ven=$row["precio_ven"];
							$prove=$row["id_proveedor"];
							$query2="SELECT nombre_empresa FROM Proveedores WHERE id_proveedor='$prove'";
							$res2= sqlsrv_query($con, $query2);
							while( $row2 = sqlsrv_fetch_array($res2) ) {
								$proveedor=$row2["nombre_empresa"];
							}
							$edi='Editar';
							$eli='Eliminar';
        /*$id=$row["id_producto"];
        $nombre=$row["nombre"];
        $descri=$row["descripcion"];
        $cate=$row["Apartado"];
        $subcate=$row["Subapartado"];
        $pre_com=$row["precio_com"];
        $pre_ven=$row["precio_ven"];
        $prove=$row["id_proveedor"];
        $edi='Editar';
        $eli='Eliminar';*/
        $salida.=
        "<tr>
            <th>$id</th> 
            <th>$nombre</th> 
            <th>$descri</th> 
            <th>$categoria</th> 
            <th>$subcate</th> 
            <th>$pre_com</th> 
            <th>$pre_ven</th> 
            <th>$proveedor</th>
            <th></th>
            <th></th>
		</tr>";
    }

	$salida.="</tbody></table>";

}else{
    $salida="No hay resultados";
}

echo $salida;




?>

