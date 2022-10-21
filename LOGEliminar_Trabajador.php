
<?php
   
   $serverName = 'localhost';
   $login = "usuario";
   $paswor = "123";
   $conctioninfo = array("Database"=>"PagVentas", "UID"=>$login, "PWD"=>$paswor, "CharacterSet"=>"UTF-8");
   $conn_sis = sqlsrv_connect($serverName,$conctioninfo);


    $Eliminar_id=$_GET['id'];
    if($conn_sis){
        $consulta_T ="SELECT COUNT(*) AS ter from Permisos WHERE id_empleado='$Eliminar_id'";
        $trab1 =sqlsrv_query($conn_sis,$consulta_T);
        $que = sqlsrv_fetch_array($trab1);
        $qu=$que["ter"];

        if($qu==0){
            $borrar = "DELETE FROM Empleados WHERE id_empleado='$Eliminar_id'";
            $query=sqlsrv_query($conn_sis,$borrar);
            if($query){
                echo "<script type='text/javascript'>alert('Trabajador eliminado');
                        window.location.href='lista_trabajador.php';
                    </script>";
            }
            else{
                
                echo "<script type='text/javascript'>alert('No se pudo eliminar el trabajador');
                window.location.href='lista_trabajador.php';
            </script>";
            }

        }else{
            echo "<script type='text/javascript'>confirm('No se puede eliminar el trabajador ya que esta reguistrado en los permisos ¿Deseas desavilitar al trabajador?');
            window.location.href='lista_trabajador.php';
        </script>";

        }
    }else{
    echo "<script type='text/javascript'>alert('No se puede ecceder a la base de datos');
            window.location.href='lista_sucursal.php';  
            </script>";
            }
    sqlsrv_close($conn_sis);
        



?>




    
