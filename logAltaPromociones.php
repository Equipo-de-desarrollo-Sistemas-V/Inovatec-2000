<?php
    //logica para registrar un producto en la base de datos

    class Promociones{

        //informacion para la conexion a base de datos
        function registrar(){
            $servername = "localhost";
            $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
            $con = sqlsrv_connect($servername, $info);

            if($con){

                //datos del formulario
                $id = $_POST["idProducto"];
                $descuento = $_POST['descProd'];
                $foto = $_FILES['foto']['name'];

                //verificar que el ID no se repita
                $querry_id = "SELECT * FROM Productos
                WHERE id_producto = $id";
                $resultID = sqlsrv_query($con, $querry_id);

                if (sqlsrv_fetch_array($resultID)) {
                    echo json_encode("ID existente");
                }

                else{
                    //verifica que si se haya subido una foto
                    if($foto != null and $foto != ''){

                        //obtener caracteristicas de la imagen
                        $tipo = $_FILES['foto']['type'];
                        $tamano = $_FILES['foto']['size'];
                        $temp = $_FILES['foto']['tmp_name'];

                        //comprobar que la extencion del archivo si sea de imagen y no pese mas de 200KB
                        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                           echo json_encode("formato");
                        }

                        else{

                            //guardar la imagen en la carpeta
                            if (move_uploaded_file($temp, 'imagenesPromociones/' . $foto)) {
                                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                chmod('imagenes/' . $foto, 0777);

                                //ruta de la imagen
                                $ruta = 'imagenes/' . $foto;

                                //inserta los datos a la tabla producto
                                $querry = "UPDATE Productos
                                SET descuento = $descuento
                                WHERE id_producto = $id";

                                $stm = sqlsrv_query($con, $querry);

                                //verifica que el producto de verdad se inserto en la base de datos
                                $confirm = "SELECT * FROM Productos
                                WHERE id_producto = $id";

                                $resultados = sqlsrv_query($con, $confirm);

                                if (sqlsrv_fetch_array($resultados)) {
                                    //include("administrativo2.php");
                                    
                                    //inserta el id y la ruta en la tabla imagenes
                                    $querry_img = "INSERT INTO imagenes
                                    VALUES($id, '$ruta')";

                                    $stm = sqlsrv_query($con, $querry_img);

                                    echo json_encode("todo chido");
                                } 
                                
                                else {
                                    //echo 'Fallo al conectar con la base de datos'. '<br>';
                                    //die(print_r(sqlsrv_errors(), true));
                                    echo json_encode("consulta BD");
                                }
                            }
                            
                        }

                    }
                    
                    else{
                        echo json_encode("foto nula");
                    }
                } 
            }

            else{
                //die(print_r(sqlsrv_errors(), true));
                echo json_encode("conexion BD");
            }
        }

        function quitarEspacio($cadena){
            $aux = "";

            for($i=1; $i < strlen($cadena); $i++){
                $aux = $aux . $cadena[$i];
            }

            return $aux;
        }
    }

    $obj = new Promociones;
    $obj -> registrar();
