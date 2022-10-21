<?php
   
   $serverName = 'localhost';
   $login = "usuario";
   $paswor = "123";
   $conctioninfo = array("Database"=>"PagVentas", "UID"=>$login, "PWD"=>$paswor, "CharacterSet"=>"UTF-8");
   $conn_sis = sqlsrv_connect($serverName,$conctioninfo);


    $Eliminar_id=$_GET['id'];

    $query="SELECT COUNT(*) AS MEC FROM Inventario_suc WHERE id_producto='$Eliminar_id'";
    $quer = sqlsrv_query($conn_sis,$query);
    $que = sqlsrv_fetch_array($quer);
    $qu=$que["MEC"];

    if ($conn_sis){
        if ($qu==0){
            $query="DELETE FROM imagenes WHERE id_prod='$Eliminar_id'";
            $quer = sqlsrv_query($conn_sis,$query);


                    $borrar = "DELETE FROM Productos WHERE id_producto='$Eliminar_id'";

                    $ejecutar = sqlsrv_query($conn_sis,$borrar) ;
                    
                    

                    echo "<script type='text/javascript'>alert('Producto eliminado');
                    window.location.href='lista_productos.php';  
                    </script>";
                    

                }
        
        else{
            echo "<script type='text/javascript'>confirm('No se puede eliminar este producto porque esta en inventario ¿Deseas desactivar este producto?');
            
            
            
            window.location.href='lista_productos.php';  
            </script>";
            }}
    else{
        echo "<script type='text/javascript'>alert('No se puede ecceder a la base de datos');
        window.location.href='lista_productos.php';  
        </script>";
    }
    sqlsrv_close($conn_sis);

?>