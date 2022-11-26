<?php
class ActPro{
    function Update(){
        $id= filter_input(INPUT_POST, "prodId");
        $descuento=filter_input(INPUT_POST, "descProd");        
       
        //echo '<script>alert("'.$id.$descuento.'")</script>';
        
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conn_sis=sqlsrv_connect($serverName, $connectionInfo) ;
        $updateQuery ="UPDATE Productos 
        SET  descuento=('$descuento') 
        WHERE id_producto=$id";
        $getProv = sqlsrv_query($conn_sis, $updateQuery);
        if( $getProv === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        header("location:lista_promociones.php");
        //echo '<script>alert("Producto actualizado con éxito")</script>';
    }
}
class Foto{
        function guardar(){
            //echo 'en el archivo de logica'. '<br>';

            $archivo = $_FILES['foto']['name'];
            $id = $_POST["prodId"];

            //verifica si hay un archivo seleccionado
            if($archivo != null and $archivo != ''){
                //echo 'la imagen se capturo'. '<br>';

                //obtener caracteristicas de la imagen
                $tipo = $_FILES['foto']['type'];
                $tamano = $_FILES['foto']['size'];
                $temp = $_FILES['foto']['tmp_name'];

                //comprobar que la extencion del archivo si sea de imagen y no pese mas de 200KB
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                    //echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                    //- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                }

                else{
                    //echo 'el archivo si es valido'. '<br>';

                    //guardar la imagen en la carpeta
                    if (move_uploaded_file($temp, 'imgProm/' . $archivo)) {
                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod('imagenes/' . $archivo, 0777);

                        //ruta de la imagen
                        $ruta = 'imagenes/'. $archivo;
                        //Mostramos la imagen subida
                        //echo '<p><img src="imagenes/' . $archivo . '"></p>';

                        //conectar con la base de datos
                        $servername = "localhost";
                        $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
                        $con = sqlsrv_connect($servername, $info);

                        //consulta para insertar el link y el id en la base de datos
                        $querry = "UPDATE imgpromocion SET ruta=('$ruta') WHERE id_prod=$id ";
                        //echo $querry. '<br>';

                        $resultados = sqlsrv_query($con, $querry);

                    }

                    else{
                        echo 'Notificación: No hay imágen nueva';
                    }
                }
                

            }

            else{
                //echo 'no se capturo nada';
            }
        }
    }
    
    $obj= new ActPro;
    $obj->Update();
    $obj = new Foto();
    $obj -> guardar();
    ?>
