<?php
class ActPro{
    function Update(){
        $id= filter_input(INPUT_POST, "idProducto");
        $nombreP=filter_input(INPUT_POST, "nombreProd");
        $apar=$_POST['categoria'];
        $pC=filter_input(INPUT_POST, "precioProd");
        $pV=filter_input(INPUT_POST, "precioVenta");
        $des=filter_input(INPUT_POST, "descripcion");
        $proved=$_POST['proveedor'];
        $subA=$_POST['subcategoria'];
        $estado=$_POST['estado_ah'];
        //echo '<script>alert("'.$proved.'")</script>';
        
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conn_sis=sqlsrv_connect($serverName, $connectionInfo) ;
        $updateQuery ="UPDATE Productos SET nombre=('$nombreP'),Apartado=('$apar'),precio_com=('$pC'),precio_ven=('$pV'),id_proveedor=('$proved'), descripcion=('$des'),Subapartado=('$subA'), Estado=('$estado') WHERE id_producto=$id";
        $getProv = sqlsrv_query($conn_sis, $updateQuery);
        if( $getProv === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        include("lista_productos.php");
        //echo '<script>alert("Producto actualizado con éxito")</script>';
    }
}
class Foto{
        function guardar(){
            //echo 'en el archivo de logica'. '<br>';

            $archivo = $_FILES['foto']['name'];
            $id = $_POST["idProducto"];

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
                    if (move_uploaded_file($temp, 'imagenes/' . $archivo)) {
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
                        $querry = "UPDATE imagenes SET ruta=('$ruta') WHERE id_prod=$id ";
                        //echo $querry. '<br>';

                        $resultados = sqlsrv_query($con, $querry);

                    }

                    else{
                        echo 'ERROR: No se pudo guardar la imágen';
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
   