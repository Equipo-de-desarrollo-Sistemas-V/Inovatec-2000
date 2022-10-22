<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 


$salida="";
//Consulta normal, muetra todos los registros
$query="SELECT * FROM Proveedores ORDER BY id_proveedor";

//detecta si se escribio algo en la caja de busqueda
//Consulta que busca lo que hay dentro de la caja de busqueda, en todas las columnas
if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query="SELECT * 
    FROM Proveedores
    WHERE (id_proveedor like '%".$q."%' or 
    nombre_empresa like '%".$q."%' or 
    RFC like '%".$q."%' or
    email_empresa like '%".$q."%' or
    Estado like '%".$q."%')
    ORDER BY id_proveedor";
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
            <th>Empresa</th> 
            <th>RFC</th> 
            <th>Correo electrónico</th> 
            <th>Condición</th>
            <th>Acciones</th>
            <th></th>
        </tr>
    </thead>
    <tbody>";
    while( $row = sqlsrv_fetch_array($resultado) ) {
                            $id=$row["id_proveedor"];
							$nombre=$row["nombre_empresa"];
							$rfc=$row["RFC"];
							$email=$row["email_empresa"];
							$condi=$row["Estado"];
							$edi='Editar';
							$eli='Eliminar';
        //muestra los resultados en la tabla
        $salida.='<tr>';
        $salida.='<td>'.$id.'</td>';
        $salida.='<td>'.$nombre.'</td>'; 
        $salida.='<td>'.$rfc.'</td>'; 
        $salida.='<td>'.$email.'</td>';
        $salida.='<td>'.$condi.'</td>';
        $salida.='<td>'.'<a href="LOGActualizar_Prov.php?item='.$id.'">'.$edi. '</a>'.'</td>';
        $salida.='<td>'.'<a href="LOGEliminar_Prov.php?id='.$id.'" ; class="table__item_link">'.$eli. '</a>'.'</td>';
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
<script src="alertaEliminar_Prov.js"></script>

