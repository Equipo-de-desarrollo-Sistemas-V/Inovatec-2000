<?php
$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 

$tabla="";
$query="SELECT * FROM Productos ORDER BY id_producto";

if (isset($_POST['alumnos'])){
    $q=($_POST['alumnos']);
    $query="SELECT* FROM Productos WHERE nombre LIKE '%".$q."%' OR descripcion LIKE '%".$q."%' OR Apartado LIKE '%".$q."%'";
}

$buscarAlumnos=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array( $buscarAlumnos, SQLSRV_FETCH_ASSOC);
if(!empty($row)){
    $tabla.=
    "<table>
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
            <th></th>
            <th></th>
		</tr>";
    while($filaAlumnos=$row){
        $id=$row["id_producto"];
							$nombre=$row["nombre"];
							$descri=$row["descripcion"];
							$cate=$row["Apartado"];
							$subcate=$row["Subapartado"];
							$pre_com=$row["precio_com"];
							$pre_ven=$row["precio_ven"];
							$prove=$row["id_proveedor"];
        $tabla.=
        "<tr>
            <th>'.$id.'</th> 
            <th>.'$nombre'</th> 
            <th>.$descri.</th> 
            <th>.$cate.</th> 
            <th>.$subcate.</th> 
            <th>.$pre_com.</th> 
            <th>.$pre_ven.</th> 
            <th>.$prove.</th>
            <th></th>
            <th></th>
		</tr>";
    }
	$tabla.="</table>";

}else{
    $tabla="No hay resultados";
}

echo $tabla;



?>

