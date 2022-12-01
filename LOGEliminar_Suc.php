<?php
   $serverName = 'inovatecserver.database.windows.net';
   $login = "usuario";
   $paswor = "123";
   $conctioninfo = array("Database"=>"PagVentas", "UID"=>$login, "PWD"=>$paswor, "CharacterSet"=>"UTF-8");
   $conn_sis = sqlsrv_connect($serverName,$conctioninfo);


    $Eliminar_id=$_GET['id'];
    
    if ($conn_sis){

    $query1="SELECT COUNT(*) AS ter from Empleados WHERE id_empleado='$Eliminar_id'";
    $quer = sqlsrv_query($conn_sis,$query1);
    $que = sqlsrv_fetch_array($quer);
    $qu=$que["ter"];

    
        if ($qu==0){
            $query="SELECT COUNT(*) AS ter from Inventario_suc WHERE id_sucursal='$Eliminar_id'";
            $quer = sqlsrv_query($conn_sis,$query);
            $que = sqlsrv_fetch_array($quer);
            $qu=$que["ter"];

                if($qu==0){
                    
                    $borrar = "DELETE FROM sucursal WHERE id_sucursal='$Eliminar_id'";

                    $ejecutar = sqlsrv_query($conn_sis,$borrar) ;
                    echo "<script type='text/javascript'>alert('Sucursal eliminado');
                    window.location.href='lista_sucursal.php'; 
                    </script>";

                }
                else{
                    
                    echo "<script type='text/javascript'>confirm('No se puede eliminar esta sucursal porque esta reguistrada en inventario ¿Deseas inavilirar esta sucursal?');
                    window.location.href='lista_sucursal.php';
                    </script>";

                }
        
    
            }
        else{
            echo "<script type='text/javascript'>confirm('No se puede eliminar esta sucursal porque esta registrada en empleados ¿Deseas inavilirar esta sucursal?');
            window.location.href='lista_sucursal.php';  
            </script>";
            }}
    else{
        echo "<script type='text/javascript'>alert('No se puede ecceder a la base de datos');
        window.location.href='lista_sucursal.php'; 
        </script>";
    }    sqlsrv_close($conn_sis);
 


  




?>
    
