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
            <th>Correo electrónico</th> 
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
                            $query="SELECT * FROM Permisos WHERE id_empleado='$id' ORDER BY id_empleado";
                            $res= sqlsrv_query($con, $query);
                            $mensaje="";
                            if( $res === false) {
                                die( print_r( sqlsrv_errors(), true) );
                            }
                            while( $row = sqlsrv_fetch_array($res) ) {
                                $bloqueo=$row["permiso7"];
                                if($bloqueo===1){
                                    $mensaje="Bloqueado";
                                }else{
                                    $empleados=$row["permiso1"];
                                    if ($empleados===1){
                                        $len=strlen($mensaje);
                                        if (($len==0)){
                                            $mensaje=$mensaje."Empleados";
                                        }else{
                                            $mensaje=$mensaje."<br>"."Empleados";
                                        }
                                    }else{
                                        $empleado1="";
                                    }
                                    $inventario=$row["permiso2"];
                                    if($inventario===1){
                                        $len=strlen($mensaje);
                                        if (($len==0)){
                                            $mensaje=$mensaje."Inventario";
                                        }else{
                                            $mensaje=$mensaje."<br>"."Inventario";
                                        }
                                    }else{
                                        $inventario1="";
                                    }
                                    $proveedores=$row["permiso3"];
                                    if($proveedores===1){
                                        $len=strlen($mensaje);
                                        if (($len==0)){
                                            $mensaje=$mensaje."Proveedores";
                                        }else{
                                            $mensaje=$mensaje."<br>"."Proveedores";
                                        }
                                    }else{
                                        $proveedores1="";
                                    }
                                    $sucursales=$row["permiso4"];
                                    if($sucursales===1){
                                        $len=strlen($mensaje);
                                        if (($len==0)){
                                            $mensaje=$mensaje."Sucursales";
                                        }else{
                                            $mensaje=$mensaje."<br>"."Sucursales";
                                        }
                                    }else{
                                        $sucursales1="";
                                    }
                                    $ventas=$row["permiso5"];
                                    if($ventas===1){
                                        $len=strlen($mensaje);
                                        if (($len==0)){
                                            $mensaje=$mensaje."Ventas";
                                        }else{
                                            $mensaje=$mensaje."<br>"."Ventas";
                                        }
                                    }else{
                                        $ventas1="";
                                    }
                                    $promociones=$row["permiso6"];
                                    if($promociones===1){
                                        $len=strlen($mensaje);
                                        if (($len==0)){
                                            $mensaje=$mensaje."Promociones";
                                        }else{
                                            $mensaje=$mensaje."<br>"."Promociones";
                                        }
                                    }else{
                                        $promociones1="";
                                    }
                                }
    
                            }
                            $edi='Editar';
                            $eli='Eliminar';

        $queryPermisos="SELECT * FROM Permisos where id_empleado='$id'";
        $resPer= sqlsrv_query($con, $queryPermisos);
        if( $resPer === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        while( $rowPer = sqlsrv_fetch_array($resPer) ) {
            $Per1=$rowPer["permiso1"];
        }
        if($Per1==0){
            $salida.='<tr>';
        $salida.='<td>'.$id.'</td>';
        $salida.='<td>'.$nombre.'</td>'; 
        $salida.='<td>'.$ap_paterno.'</td>'; 
        $salida.='<td>'.$ap_materno.'</td>'; 
        $salida.='<td>'.$rfc.'</td>'; 
        $salida.='<td>'.$puesto.'</td>'; 
        $salida.='<td>'.$correo.'</td>'; 
        $salida.='<td>'.$sucu.'</td>';
        $salida.='<td>'.$mensaje.'</td>';
        $salida.='<td>'.'<a href="LOGActualizar_Emp.php?item='.$id.'">'.$edi. '</a>'.'</td>';
        $salida.='<td>'.'<a href="LOGEliminar_Trabajador.php?id='.$id.'" ; class="table__item_link">'.$eli. '</a>'.'</td>';
		$salida.='</tr>';
            
        }
        else{
            $salida.='<tr>';
        $salida.='<td>'.$id.'</td>';
        $salida.='<td>'.$nombre.'</td>'; 
        $salida.='<td>'.$ap_paterno.'</td>'; 
        $salida.='<td>'.$ap_materno.'</td>'; 
        $salida.='<td>'.$rfc.'</td>'; 
        $salida.='<td>'.$puesto.'</td>'; 
        $salida.='<td>'.$correo.'</td>'; 
        $salida.='<td>'.$sucu.'</td>';
        $salida.='<td>'.$mensaje.'</td>';
        $salida.='<td>'.'<a href="LOGActualizar_Emp.php?item='.$id.'">'.$edi. '</a>'.'</td>';
        $salida.='<td>'.''.'</td>';
		$salida.='</tr>';
        }



        //muestra los resultados en la tabla
        
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
<script src="js/alertaEliminar_Trab.js"></script> 

