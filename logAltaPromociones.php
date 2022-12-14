<?php
    //logica para registrar un producto en la base de datos

    class Promociones{

        //informacion para la conexion a base de datos
        function registrar(){
            $servername = "inovatecserver.database.windows.net";
            $info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
            $con = sqlsrv_connect($servername, $info);

            if($con){

                //datos del formulario
                $id = $_POST["idProducto"];
                $descuento = $_POST['descProd'];
                $foto = $_FILES['foto']['name'];

                $querry_descuento = "SELECT descuento FROM Productos
                WHERE id_producto = $id AND descuento != 0";

                $resultados_descuento = sqlsrv_query($con, $querry_descuento);

                if(sqlsrv_fetch_array($resultados_descuento)){
                    //el producto ya esta en promocion
                    echo json_encode("producto en promocion");
                }

                else{
                    //verifica que el descuento sea mayor que 0
                    if($descuento >= 1){
                    //verifica que se haya subido la foto
                        if ($foto != null and $foto != '') {
                            //obtener caracteristicas de la imagen
                            $tipo = $_FILES['foto']['type'];
                            $tamano = $_FILES['foto']['size'];
                            $temp = $_FILES['foto']['tmp_name'];

                            //comprobar que la extencion del archivo si sea de imagen y no pese mas de 200KB
                            if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                                echo json_encode("formato");
                            } else {
                                //guardar la imagen en la carpeta
                                if (move_uploaded_file($temp, 'imgProm/' . $foto)) {
                                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                    chmod('imgProm/' . $foto, 0777);

                                    //ruta de la imagen
                                    $ruta = 'imgProm/' . $foto;

                                    //echo json_encode($ruta);

                                    //actualiza la tabla productos
                                    $querry_update = "BEGIN TRAN
                                    UPDATE Productos
                                    SET descuento = $descuento  
                                    WHERE id_producto = $id
                                    INSERT INTO imgpromocion VALUES($id, '$ruta')
                                    COMMIT";

                                    $exect_actualizar = sqlsrv_query($con, $querry_update);

                                    //verifica que el descuento si se haya aplicado
                                    $confirm_prod = sqlsrv_query($con, $querry_descuento);

                                    if (sqlsrv_fetch_array($confirm_prod)) {
                                        echo json_encode('todo chido');
                                    } else {
                                        //el decuento no se aplico bien
                                        echo json_encode("consulta prod");
                                    }
                                }
                            }
                        } else {
                            //no se subio la foto
                            echo json_encode("foto nula");
                        }
                    
                    }

                    else{
                        echo json_encode('descuento');
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
