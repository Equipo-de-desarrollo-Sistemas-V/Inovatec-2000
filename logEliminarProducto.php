<?php

class Producto{
    function eliminar(){
       //informacion para la conexion a la base de datos
       $servername = "localhost";
       $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
       $con = sqlsrv_connect($servername, $info);
            
        if($con){
            $id=$_GET['item'];
            $query="SELECT id_producto
            from Inventario_suc
            where id_producto='$id'";

            $resultado=sqlsrv_query($con, $query);

            if($resultado){
                $cont=0;
                while( $row = sqlsrv_fetch_array($resultado) ) {
                    $cont++;
                }
                if ($cont>0){
                    $querry = "UPDATE Productos
                    SET Estado = 'No surtiendo'
                    WHERE id_producto = '$id'";

                    $stm_des = sqlsrv_query($con, $querry);
                    echo"<script>alert('Se ha cambiado el status del producto')</script>";
                    //include_once('lista_productos.php');
                    header("Location:../Inovatec-2000/lista_productos.php");
                }else{
                    
                    $query="SELECT COUNT(*) as total
                    from Productos
                    where id_producto='$id' and
                    descuento!=0";

                    $resultado=sqlsrv_query($con, $query);
                    $row = sqlsrv_fetch_array($resultado); 
                    $totProm=$row["x"];
                    if ($totProm==1){
                        $querry = "UPDATE Productos
                        SET Estado = 'No surtiendo'
                        WHERE id_producto = '$id'";
                        echo"<script>alert('Actualmente el producto se encuentra en una promoción')</script>";
                        header("Location:../Inovatec-2000/lista_productos.php");
                    }else{
                        $querry = "DELETE FROM imagenes
                        WHERE id_prod = '$id'";
                        $stm = sqlsrv_query($con, $querry);

                        $querry = "DELETE FROM Productos
                        WHERE id_producto = '$id'";
                        $stm = sqlsrv_query($con, $querry);
                        
                        echo"<script>alert('Producto eliminado')</script>";
                        header("Location:lista_productos.php");
                    }  
                }


            }else{
                echo"<script>alert('No se pudo eliminar el producto')</script>";
                header("Location:lista_productos.php");
            }

        }else{
            echo"<script>alert('Error al conectar con la base de datos')</script>";
            //header("Location:lista_productos.php");
        }
        #CERRAR CONEXION A BASE DE DATOS
        sqlsrv_close($con);
    }

}
$obj = new Producto;
$obj -> eliminar();

?>
