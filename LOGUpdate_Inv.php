<?php
class ActPro{
    function Update(){
        $id_pro= $_POST["idProducto"];
        $id_suc=$_POST["idSuc"];
        $cantidad= $_POST["cantidad"];
        $stock= $_POST["stockmin"];
        //echo $id.$mun.$estado;

        $produc = $this->quitarEspacio($id_pro); //quitarle el especio del principio al id delproducto
        $suc = $this->quitarEspacio($id_suc); //quitarle el especio del principio al id de la sucursal

        $serverName='inovatecserver.database.windows.net';
        $connectionInfo = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
        $conn_sis=sqlsrv_connect($serverName, $connectionInfo) ;
        //$query= "UPDATE Persona set email = '".$correoPersona."'where Usuario='".$ingreso."'" ;
        $updateQuery ="UPDATE Inventario_suc SET cantidad='".$cantidad."', stock_min='".$stock."' WHERE id_producto='".$produc."' and id_sucursal='".$suc."'";
        $getProv = sqlsrv_query($conn_sis, $updateQuery);
        if( $getProv === false) {            
            die( print_r( sqlsrv_errors(), true) );
        }
        header("location:consulta_inventario.php");
        //echo '<script>alert("Inventario actualizado con éxito")</scrip>';
    }

    function quitarEspacio($cadena){
        $aux = "";

        for ($i = 1; $i < strlen($cadena); $i++) {
            $aux = $aux . $cadena[$i];
        }

        return $aux;
    }
}
    $obj= new ActPro;
    $obj->Update();
