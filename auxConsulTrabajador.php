<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 


$salida="";
//Consulta normal, muetra todos los registros
$query="SELECT id_empleado, nombres, ap_paterno, ap_materno, rfc, email, sucursal.id_sucursal, puestos.puesto
from [Empleados], [sucursal], [puestos]
where sucursal=id_sucursal and
Empleados.puesto=puestos.id_puesto
ORDER BY id_empleado";

//detecta si se escribio algo en la caja de busqueda
//Consulta que busca lo que hay dentro de la caja de busqueda, en todas las columnas
if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query="SELECT  id_empleado, nombres, ap_paterno, ap_materno, rfc, email, sucursal.id_sucursal, puestos.puesto
    from [Empleados], [sucursal], [puestos]
    WHERE (id_empleado like '%".$q."%' or 
    nombres like '%".$q."%' or 
    ap_paterno like '%".$q."%' or
    ap_materno like '%".$q."%' or
    rfc like '%".$q."%' or
    puestos.puesto like '%".$q."%' or
    email like '%".$q."%' or
    sucursal.id_sucursal like '%".$q."%') and
    (sucursal=id_sucursal and
    Empleados.puesto=puestos.id_puesto)
    ORDER BY id_empleado";
}



$resultado=sqlsrv_query($con, $query);
//if(!empty($row)){
if($resultado==true){
    //define el formato de la tabla
    $salida.=
    "<table>
    <thead>
        <tr>
            <th>Id</th> 
            <th>Nombre</th> 
            <th>Ap. Paterno</th> 
            <th>Ap. Materno</th> 
            <th>RFC</th> 
            <th>Puesto</th> 
            <th>Correo electronico</th> 
            <th>Sucursal</th>
            <th>Permisos</th>
            <th>Acciones</th>
            <th></th>
        </tr>
    </thead>
    <tbody>";
    while( $row = sqlsrv_fetch_array($resultado) ) {
                            $id=$row["id_empleado"];
                            $nombre=$row["nombres"];
                            $ap_paterno=$row["ap_paterno"];
                            $ap_materno=$row["ap_materno"];
                            $rfc=$row["rfc"];
                            $puesto=$row["puesto"];
							$correo=$row["email"];
                            $sucu=$row["id_sucursal"];
                            $per='Permisos';
							$edi='Editar';
							$eli='Eliminar';
        //muestra los resultados en la tabla
        $salida.='<tr>';
        $salida.='<td>'.$id.'</td>';
        $salida.='<td>'.$nombre.'</td>'; 
        $salida.='<td>'.$ap_paterno.'</td>'; 
        $salida.='<td>'.$ap_materno.'</td>'; 
        $salida.='<td>'.$rfc.'</td>'; 
        $salida.='<td>'.$puesto.'</td>'; 
        $salida.='<td>'.$correo.'</td>'; 
        $salida.='<td>'.$sucu.'</td>';
        $salida.='<td>'.'<a href="#">'.$per. '</a>'.'</td>';
        $salida.='<td>'.'<a href="LOGActualizar_Emp.php?item='.$id.'">'.$edi. '</a>'.'</td>';
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
<!-- <script src="alertaEliminar.js"></script> -->

