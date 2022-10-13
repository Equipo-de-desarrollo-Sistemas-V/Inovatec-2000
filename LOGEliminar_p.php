<?php

$serverName = 'localhost';
$login = "usuario";
$paswor = "123";
$conctioninfo = array("Database"=>"Pruebas_Conexion", "UID"=>$login, "PWD"=>$paswor, "CharacterSet"=>"UTF-8");
$conn_sis = sqlsrv_connect($serverName,$conctioninfo);



$id=$_GET['id'];
echo $id;

$borrar = "DELETE FROM Productos WHERE id_producto='$id'";
$ejecutar = sqlsrv_query($conn_sis,$borrar);

$error = sqlsrv_errors();


if ($ejecutar){
    
echo '<script type="text/javascript">alert("El producto se elimino");
window.location.href="administrativo.php";

</script>'


}


?>


<script type="text/javascript">alert('El producto se elimino');
        window.location.href='administrativo.php';
    
    </script>