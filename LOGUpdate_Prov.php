<?php
class ActPro{
    function Update(){
        $id= filter_input(INPUT_POST, "idProveedor");
        $nomEmp= filter_input(INPUT_POST, "empresaProv");        
        $rfc= filter_input(INPUT_POST, "rfcProv");
        $correo= filter_input(INPUT_POST, "correoProv");
        $estado=$_POST['estado'];
        //echo $id.$mun.$estado;
        
        $serverName='inovatecserver.database.windows.net';
        $connectionInfo = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
        $conn_sis=sqlsrv_connect($serverName, $connectionInfo) ;
        $updateQuery ="UPDATE Proveedores SET nombre_empresa=('$nomEmp'),RFC=('$rfc'),email_empresa=('$correo'),Estado=('$estado') WHERE id_proveedor='$id'";
        $getProv = sqlsrv_query($conn_sis, $updateQuery);
        if( $getProv === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        header("location:lista_proveedor.php");
        //echo '<script>alert("Proveedor actualizada con éxito")</script>';
    }
}
    $obj= new ActPro;
    $obj->Update();
