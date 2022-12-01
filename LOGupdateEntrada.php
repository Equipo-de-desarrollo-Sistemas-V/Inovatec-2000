<?php
class updEnt{
    function Update(){
        $id_pro=$_POST["idProducto"];
        $id_suc=$_POST["idSuc"];
        $carga=$_POST["carga"];

        $produc = $this->quitarEspacio($id_pro); //quitarle el especio del principio al id delproducto
        $suc = $this->quitarEspacio($id_suc); //quitarle el especio del principio al id de la sucursal

        $serverName='inovatecserver.database.windows.net';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conexion=sqlsrv_connect($serverName, $connectionInfo);
        $query="SELECT cantidad FROM Inventario_suc WHERE id_producto='$produc' and id_sucursal='$suc'";
        $resultados = sqlsrv_query($conexion, $query);
		$row = sqlsrv_fetch_array($resultados);
		$can=$row["cantidad"];
        $suma=$carga+$can;
        $query1="UPDATE Inventario_suc SET cantidad='$suma' WHERE id_producto='$produc' and id_sucursal='$suc'";
        $resultados1=sqlsrv_query($conexion, $query1);
        if($resultados1){
            echo json_encode("confirmado");
        }else{
            echo json_encode("error");
        }

    }

    function quitarEspacio($cadena){
        $aux = "";

        for ($i = 1; $i < strlen($cadena); $i++) {
            $aux = $aux . $cadena[$i];
        }

        return $aux;
    }
}
    $obj= new updEnt;
    $obj->Update();