
<?php
   
   $serverName = 'localhost';
   $login = "usuario";
   $paswor = "123";
   $conctioninfo = array("Database"=>"PagVentas", "UID"=>$login, "PWD"=>$paswor, "CharacterSet"=>"UTF-8");
   $conn_sis = sqlsrv_connect($serverName,$conctioninfo);


    $Eliminar_id=$_GET['id'];
    $queryPermisos="SELECT * FROM Permisos where id_empleado='$Eliminar_id'";
            $resPer= sqlsrv_query($conn_sis, $queryPermisos);
            if( $resPer === false) {
                    die( print_r( sqlsrv_errors(), true) );
            }
            while( $rowPer = sqlsrv_fetch_array($resPer) ) {
                $idPer=$rowPer["id_empleado"];
                $Per1=$rowPer["permiso1"];
            }
    if($conn_sis && $Per1==0){
            $del_permisos="DELETE FROM Permisos WHERE id_empleado='$Eliminar_id' and id_empleado!='1'";
            $ejecutar=sqlsrv_query($conn_sis,$del_permisos);        
            
            if($ejecutar){
                $borrar = "DELETE FROM Empleados WHERE id_empleado='$Eliminar_id'";
                $query=sqlsrv_query($conn_sis,$borrar);  
                // echo '<script>alert("Trabajador eliminado");window.location.href="lista_trabajador.php";</script>';   
                echo"<script>alert('Trabajador eliminado existosamente')</script>";
                header("Location:lista_trabajador.php");             
            }
            else{      
                echo"<script>alert('No se pudo eliminar la actividad')</script>";
                die(print_r(sqlsrv_errors(), true));          
            //     echo "<script type='text/javascript'>alert('No se pudo eliminar el trabajador');
            //     window.location.href='lista_trabajador.php';
            // </script>";
            }
    }
    else{
        echo "<script type='text/javascript'>alert('No Puedes eliminar a un SuperAdministrador');
        window.location.href='lista_trabajador.php';</script>";
    }

    sqlsrv_close($conn_sis);
        



?>




    
