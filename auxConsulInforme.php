<?php

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 


$salida="";
//Consulta normal, muetra todos los registros
$query="SELECT Productos.id_producto, Productos.precio_com, Productos.precio_ven cantidad, Inventario_suc.id_sucursal, Inventario_suc.cantidad
from Productos, Inventario_suc
where Productos.id_producto=Inventario_suc.id_producto";

//detecta si se escribio algo en la caja de busqueda
//Consulta que busca lo que hay dentro de la caja de busqueda, en todas las columnas
if (isset($_POST['consulta'])){
    $q=($_POST['consulta']);
    $query="SELECT Productos.id_producto, Productos.nombre, Inventario_suc.id_sucursal,
    Inventario_suc.cantidad, Inventario_suc.stock_min,
    Inventario_suc.cantidad*Productos.precio_com AS Inversion, 
    Inventario_suc.cantidad*Productos.precio_ven AS Valor
    FROM [Productos], [Inventario_suc]
    where (Productos.id_producto like '%".$q."%' or 
    Productos.nombre like '%".$q."%' or 
    Inventario_suc.cantidad like '%".$q."%' or 
    Inventario_suc.stock_min like '%".$q."%' or
    Inventario_suc.id_sucursal like '%".$q."%') and 
    Productos.id_producto=Inventario_suc.id_producto
    ORDER BY Productos.id_producto";
}


//Consulta para saber el total de resgistros que cumplen la condicion
$resultad0=sqlsrv_query($con, $query);
if($resultad0==true){
    $cont=0;
    while( $row = sqlsrv_fetch_array($resultad0) ) {
        $cont++;
    }
}

//contador para saber que registro se esta mostrando y en el ultimo agregar una fila para el total
$x=0;

//contadores para guardar el total de la inversion y el total del valor, 
//de todos los registros que se muestren en la tabla
$totInversion=0;
$totValor=0;


$resultado=sqlsrv_query($con, $query);
if($resultado==true){
    //define el formato de la tabla
    $salida.=
    "<table>
    <thead>
        <tr>
            <th>Id producto</th> 
            <th>Cantidad</th> 
            <th>Precio unitario</th> 
            <th>Precio público</th> 
            <th>Iva</th> 
            <th>Total</th>
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
                $query0="SELECT ruta FROM imagenes WHERE id_prod='$id'";
                $resultados0=sqlsrv_query($con, $query0);
                if( $resultados0 === false) {
                    die( print_r( sqlsrv_errors(), true) );
                }
                while ($row0= sqlsrv_fetch_array($resultados0)) {
                    $imagen=$row0["ruta"];
                }
                $condi=$row["Estado"];
                $edi='Editar';
                $eli='Eliminar';
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
        $salida.='<td>'.'<p><img src="' .$imagen. '" width="50" height="50"></p></td>';
        $salida.='<td>'.$condi.'</td>';
        $salida.='<td>'.'<a href="LOGActualizar.php?item='.$id.'">'.$edi. '</a>'.'</td>';
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
<script src="js/alertaEliminar_Inv.js"></script> 


