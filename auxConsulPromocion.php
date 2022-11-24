<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 


$salida="";
//Consulta normal, muetra todos los registros
$query="SELECT Productos.id_producto, Productos.nombre, Productos.precio_ven, Productos.descuento, 
Productos.descuento * (Productos.precio_ven / 100) as oferta FROM Productos";

//detecta si se escribio algo en la caja de busqueda
//Consulta que busca lo que hay dentro de la caja de busqueda, en todas las columnas
if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query= "SELECT Productos.id_producto, Productos.nombre, Productos.precio_ven, Productos.descuento,
    Productos.descuento * (Productos.precio_ven / 100) as oferta FROM Productos
    WHERE (Productos.id_producto like '%".$q."%' or 
    Productos.nombre like '%".$q."%' or 
    precio_ven like '%".$q."%' or
    Productos.descuento like '%".$q."%')";
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
                <th>Precio venta</th>
                <th>Descuento (%)</th>
                <th>Descuento ($)</th>
                <th>Imagen</th>
                <th>Acciones</th>
                <th></th>
        </tr>
    </thead>
    <tbody>";
    while( $row = sqlsrv_fetch_array($resultado) ) {
        $id=$row["id_producto"];
        $nombre=$row["nombre"];
        $pre_ven=substr($row["precio_ven"],0,-2);
        $query0="SELECT ruta FROM imagenes WHERE id_prod='$id'";
        $resultados0=sqlsrv_query($con, $query0);
        if( $resultados0 === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        while ($row0= sqlsrv_fetch_array($resultados0)) {
            $imagen=$row0["ruta"];
        }
        $descuento=$row["descuento"];
        $oferta = substr($row["oferta"], 0, -2);
        $edi='Editar';
        $eli='Eliminar';
        
        //muestra los resultados en la tabla
        $salida.='<tr>';
        $salida.='<td>'.$id.'</td>';
        $salida.='<td>'.$nombre.'</td>';  
        $salida.='<td>'."$".$pre_ven.'</td>';
        $salida.='<td>'.$descuento."%".'</td>';
        $salida.='<td>'."$".$oferta.'</td>'; 
        $salida.='<td>'.'<p><img src="' .$imagen. '" width="50" height="50"></p></td>';
        $salida.='<td>'.'<a href="LOGActualizar_Promocion.php?item='.$id.'">'.$edi. '</a>'.'</td>';
        $salida.='<td>'.'<a href="logEliminarProducto.php?item='.$id.'" ; class="table__item_link">'.$eli. '</a>'.'</td>';
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
<script src="../Inovatec-2000/js/alertasEliminarProducto.js"></script>