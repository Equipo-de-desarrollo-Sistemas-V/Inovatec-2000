

<?php
   
   $serverName = 'localhost';
   $login = "usuario";
   $paswor = "123";
   $conctioninfo = array("Database"=>"PagVentas", "UID"=>$login, "PWD"=>$paswor, "CharacterSet"=>"UTF-8");
   $conn_sis = sqlsrv_connect($serverName,$conctioninfo);


    $Eliminar_id=$_GET['id'];
    

    $borrar = "DELETE FROM Proveedores WHERE id_proveedor='$Eliminar_id'";
    
    
    $ejecutar = sqlsrv_query($conn_sis,$borrar) ;
 

    if( $ejecutar === false) {
        
        //$mod="UPDATE Proveedores SET Estado ='False' where id_proveedor='$Eliminar_id'";
        echo "
        <script type='text/javascript'>alert('No se puede puede eliminar el provedor');
        window.location.href='lista_proveedor.php';
            
            </script>
        ";
        //$mod="UPDATE Proveedores SET Estado ='False' where id_proveedor='$Eliminar_id'";
    }

    else{
        echo "
        <script type='text/javascript'>alert('Proveedor eliminado');
                window.location.href='lista_proveedor.php';
            
            </script>
        ";
    }


  




?>



<script type="text/javascript">alert('Proveedor eliminado');
        window.location.href='lista_sucursal.php';
    
    </script>

    
