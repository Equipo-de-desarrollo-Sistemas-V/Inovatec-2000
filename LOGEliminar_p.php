<?php
   
   $serverName = 'localhost';
   $login = "usuario";
   $paswor = "123";
   $conctioninfo = array("Database"=>"PagVentas", "UID"=>$login, "PWD"=>$paswor, "CharacterSet"=>"UTF-8");
   $conn_sis = sqlsrv_connect($serverName,$conctioninfo);


    $Eliminar_id=$_GET['id'];
    

    $borrar = "DELETE FROM Productos WHERE id_producto='$Eliminar_id'";
    
    
    $ejecutar = sqlsrv_query($conn_sis,$borrar) ;
 

    if( $ejecutar === false) {
        die( print_r( sqlsrv_errors(), true) );}


  




?>



<script type="text/javascript">alert('Producto eliminado');
        window.location.href='lista_productos.php';
    
    </script>

    
