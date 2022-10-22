<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 


$salida="";
//Consulta normal, muetra todos los registros
$query="SELECT id_sucursal, estados.Estado, municipios.municipio, sucursal.Estado
from [sucursal], [estados_municipios], [estados], [municipios]
where ciudad_est=estados_municipios.id and
municipios_id=municipios.Id_Municipios and
estados_id=estados.id
ORDER BY id_sucursal";

//detecta si se escribio algo en la caja de busqueda
//Consulta que busca lo que hay dentro de la caja de busqueda, en todas las columnas
if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query="SELECT id_sucursal, estados.Estado, municipios.municipio, sucursal.Estado
    FROM [sucursal], [estados_municipios], [estados], [municipios]
    WHERE (id_sucursal like '%".$q."%' or 
    estados.Estado like '%".$q."%' or 
    municipios.municipio like '%".$q."%' or
    sucursal.Estado like '%".$q."%') and
    (ciudad_est=estados_municipios.id and
    municipios_id=municipios.Id_Municipios and
    estados_id=estados.id)
    ORDER BY id_sucursal";
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
            <th>Municipio</th> 
            <th>Estado</th>
            <th>Condición</th> 
            <th>Acciones</th>
            <th></th>
        </tr>
    </thead>
    <tbody>";
    while( $row = sqlsrv_fetch_array($resultado) ) {
                            $id=$row["id_sucursal"];
							$municipio=$row["municipio"];
							$estado=$row[1];
							$condi=$row["Estado"];
							$edi='Editar';
							$eli='Eliminar';
        //muestra los resultados en la tabla
        $salida.='<tr>';
        $salida.='<td>'.$id.'</td>';
        $salida.='<td>'.$municipio.'</td>'; 
        $salida.='<td>'.$estado.'</td>'; 
        $salida.='<td>'.$condi.'</td>'; 
        $salida.='<td>'.'<a href="LOGActualizar_Suc.php?item='.$id.'">'.$edi. '</a>'.'</td>';
        $salida.='<td>'.'<a href="LOGEliminar_Suc.php?id='.$id.'" ; class="table__item_link">'.$eli. '</a>'.'</td>';
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
<script src="alertaEliminar_Suc.js"></script> 

