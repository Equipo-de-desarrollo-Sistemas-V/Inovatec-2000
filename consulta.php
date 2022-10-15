<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 

$query0="SELECT COUNT(*) AS total_registro FROM Productos";
$res0= sqlsrv_query($con, $query0);
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

$query="SELECT * FROM Productos ORDER BY id_producto OFFSET $desde ROWS FETCH NEXT $por_pagina ROWS ONLY";


if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query="SELECT * FROM Productos WHERE  id_producto LIKE '%".$q."%' OR nombre LIKE '%".$q."%' OR descripcion LIKE '%".$q."%' OR precio_com LIKE '%".$q."%' OR precio_ven LIKE '%".$q."%'";
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
    $edi='No hay resultados';
    $salida.='<tr>';
    $salida.='<td>'.$edi.'</td>';
    $salida.='</tr>';
    
}
echo $salida;
?>
<script src="alertaEliminar.js"></script>

