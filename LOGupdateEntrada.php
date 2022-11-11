<?php
class updEnt{
    function Update(){
        $id_pro=$_POST["idProveedor"];
        $id_suc=$_POST["empresa"];
        $carga=$_POST["carga"];
        $array1 = explode("-",$id_pro);
        $lon1= count($array1);
        $array = explode("-",$id_suc);
        $lon= count($array);
        $id_p=$array1[0];
        $id_s=$array[0];
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conexion=sqlsrv_connect($serverName, $connectionInfo);
        $query="SELECT cantidad FROM Inventario_suc WHERE id_producto='$id_p' and id_sucursal='$id_s'";
        $resultados = sqlsrv_query($conexion, $query);
		while ($row = sqlsrv_fetch_array($resultados)) {
			$can=$row["cantidad"];
		}
        $suma=$carga+$can;
        $query1="UPDATE Inventario_suc SET cantidad='$suma' WHERE id_producto='$id_p' and id_sucursal='$id_s'";
        $resultados1=sqlsrv_query($conexion, $query1);
        if($resultados1){
            echo json_encode("confirmado");
        }else{
            echo json_encode("error");
        }

    }
}
    $obj= new updEnt;
    $obj->Update();