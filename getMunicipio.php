<?php
$serverName='inovatecserver.database.windows.net';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 

$id_estado=$_POST['Id'];
$querry_relacion = "SELECT  Id_Municipios, municipio FROM estados_municipios, estados, municipios
                        where estados.id = '$id_estado' and 
                        estados_municipios.estados_id = estados.id and 
                        estados_municipios.municipios_id = municipios.id_Municipios 
                        order by municipio ASC";

$resultados_relacion = sqlsrv_query($con, $querry_relacion);

$html="<option value='0'>Estado</option>";
while($row = sqlsrv_fetch_array($resultados_relacion)){
    $html="<option value='".$row['Id_Municipios']."'>".$row['municipio']."</option>";
    echo $html;
}


?>