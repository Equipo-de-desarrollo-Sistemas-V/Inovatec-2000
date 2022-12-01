<?php
//informacion para la conexion a la base de datos
$servername = "inovatecserver.database.windows.net";
$info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($servername, $info);

$id = $_GET['item'];

if ($con) {
    $querry = "BEGIN TRAN
    DELETE FROM imgpromocion
    WHERE id_prod = $id
    UPDATE Productos
    SET descuento = 0
    WHERE id_producto = $id
    COMMIT";

    $stm = sqlsrv_query($con, $querry);

    include_once("lista_promociones.php");
}

else{
    echo '<script>alert("Error al conectar con la base de datos"); </script>';
}
?>