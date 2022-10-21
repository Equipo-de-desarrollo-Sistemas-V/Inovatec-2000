

<?php
   
   $serverName = 'localhost';
   $login = "usuario";
   $paswor = "123";
   $conctioninfo = array("Database"=>"PagVentas", "UID"=>$login, "PWD"=>$paswor, "CharacterSet"=>"UTF-8");
   $conn_sis = sqlsrv_connect($serverName,$conctioninfo);


    $Eliminar_id=$_GET['id'];

    
    if ($conn_sis){
        $trab ="SELECT COUNT(*) AS pov from Productos WHERE id_proveedor= '$Eliminar_id'";
        $trab1 =sqlsrv_query($conn_sis,$trab);
        $que = sqlsrv_fetch_array($trab1);
        $qu=$que["pov"];

        if($qu==0){
            $borrar = "DELETE FROM Proveedores WHERE id_proveedor='$Eliminar_id'";
            $ejecuta =sqlsrv_query($conn_sis,$borrar);
            if($ejecuta){
                echo "<script type='text/javascript'>alert('Proveedor eliminado');
                window.location.href='lista_proveedor.php';
                </script>";
            }
            
        }else{
            echo "<script type='text/javascript'>confirm('No se puede eliminar este proveedor porque esta reguistrada en productos ¿Deseas inavilitar a este proveedor?');
                window.location.href='lista_proveedor.php';
                </script>";
        }

        
    }else{
        echo "<script type='text/javascript'>alert('No se puede ecceder a la base de datos');
                window.location.href='lista_proveedor.php';
                </script>";
    }    sqlsrv_close($conn_sis);
 

        //$mod="UPDATE Proveedores SET Estado ='False' where id_proveedor='$Eliminar_id'";
        //$mod="UPDATE Proveedores SET Estado ='False' where id_proveedor='$Eliminar_id'";
?>



    
