
<?php
// <!-- Logica para guardar datos de direccion -->
    class Direccion{

        //verifica que el codigo postal tenga 5 digitos
        function validar()
        {
            $calle = $_POST["calle"];
            $numero = $_POST["numero"];
            $colonia = $_POST["colonia"];
            $ciudad = $_POST["ciudad"];
            $estado = $_POST["estado"];
            $cp = $_POST["codigo-postal"];

            //informacion de la conexion a BD
            $servername = "localhost";
            $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
            $con = sqlsrv_connect($servername, $info);

            if ($con) {
                //verificar que el estado exista en la base de datos
                $querry_estado = "SELECT Id FROM estados where estado = '$estado'";

                $resultados_estado = sqlsrv_query($con, $querry_estado);

                if (sqlsrv_fetch_array($resultados_estado, SQLSRV_FETCH_ASSOC)) {

                    //verifica que el municipio exista en la base de datos
                    $querry_municipio = "SELECT Id_Municipios FROM municipios where municipio = '$ciudad'";

                    $resultados_municipio = sqlsrv_query($con, $querry_municipio);

                    if (sqlsrv_fetch_array($resultados_municipio, SQLSRV_FETCH_ASSOC)) {

                        //verifica que el municipio si este en el estado
                        $querry_relacion = "SELECT  estados_municipios.id FROM estados_municipios, estados, municipios
                        where estados.Estado = '$estado'
                        and municipios.municipio = '$ciudad' and 
                        estados_municipios.estados_id = estados.id and 
                        estados_municipios.municipios_id = municipios.id_Municipios";

                        $resultados_relacion = sqlsrv_query($con, $querry_relacion);

                        if ($r = sqlsrv_fetch_array($resultados_relacion, SQLSRV_FETCH_ASSOC)) {
                            $estado_municipio = $r["id"];
                            //verifica que el codigo postal tenga 5 digitos
                            if (strlen($cp) == 5) {

                                //verifica que el codigo y el numero de calle postal sea positivo
                                if ($cp >= 1) {

                                    //verifica que el numero de la calle sea positivo
                                    if ($numero >= 1) {

                                        //la informacion paso todos los filtros
                                        $this -> guardar($estado_municipio);
                                        echo json_encode("todo chido");


                                    } else {
                                        echo json_encode("negativo calle");
                                    }
                                } else {
                                    echo json_encode("negativoCP");
                                }
                            } else {
                                echo json_encode("digitosCP");
                            }
                        } else {
                            echo json_encode("estado-municipio");
                        }
                    } else {
                        echo json_encode("municipio");
                    }
                } else {
                    echo json_encode("estado");
                }
            } else {
                die(print_r(sqlsrv_errors(), true));
            }
        }

        //guarda los datos de dirección en el fichero
        function guardar($estado_municipio)
        {
            $calle = $_POST["calle"];
            $numero = $_POST["numero"];
            $colonia = $_POST["colonia"];
            $cp = $_POST["codigo-postal"];

            $file = fopen("archivo_campos.txt", "a");
            fwrite($file, $calle . PHP_EOL);
            fwrite($file, $numero . PHP_EOL);
            fwrite($file, $colonia . PHP_EOL);
            fwrite($file, $estado_municipio.PHP_EOL);
            fwrite($file, $cp . PHP_EOL);
            fclose($file);
        }

    }


$obj = new Direccion;
$obj->validar(); 

?>