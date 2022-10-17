<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 


$salida="";
//Consulta normal, muetra todos los registros
$query="";

//detecta si se escribio algo en la caja de busqueda
//Consulta que busca lo que hay dentro de la caja de busqueda, en todas las columnas
if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query="";
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
            <th>Inversión</th>
            <th>Valor</th>
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
                            $condi=$row["Estado"];
							$edi='Editar';
							$eli='Eliminar';
            if ($condi==1){
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
        $salida.='<td>'.'</td>';
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

