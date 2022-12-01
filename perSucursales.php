<?php

session_start();
$sesion_i = $_SESSION["nombres"];
$serverName='inovatecserver.database.windows.net';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$conn_sis= sqlsrv_connect($serverName, $connectionInfo);
$query="SELECT id_empleado FROM Empleados WHERE nombres='$sesion_i'";
$res= sqlsrv_query($conn_sis, $query);
if($res === false){
    die(print_r(sqlsrv_errors(), true));
}else{
    $row=sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);
    if (!empty($row)) {
        $id=$row['id_empleado'];
        $query0="SELECT permiso4 FROM Permisos WHERE id_empleado='$id'";
        $res0= sqlsrv_query($conn_sis, $query0);
        if($res0 === false){
            die(print_r(sqlsrv_errors(), true));
        }else{
            $row0=sqlsrv_fetch_array($res0, SQLSRV_FETCH_ASSOC);
            if(!empty($row0)){
                $inventario=$row0["permiso4"];
                if($inventario===1){
                }else{
                    header("location:denegado.php");
                }
            }
        }
    }
}
        


?>