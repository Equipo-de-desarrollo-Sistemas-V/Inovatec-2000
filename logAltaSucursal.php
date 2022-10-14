<?php
    //logica para registrar un producto en la base de datos

    class Sucursal{

        //informacion para la conexion a base de datos
        function registrar(){
            $servername = "localhost";
            $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
            $con = sqlsrv_connect($servername, $info);

            if($con){

                //datos del formulario
                $id = $_POST["idSucursal"];
                $estado = $_POST["estado"];
                $ciudad = $_POST["ciudadSuc"];

                //verificar que el ID no se repita
                $querry_id = "SELECT * FROM sucursal
                WHERE id_sucursal = $id";
                $resultID = sqlsrv_query($con, $querry_id);

                if (sqlsrv_fetch_array($resultID)) {
                    echo json_encode("ID existente");
                }

                else{

                    //saca el ID de la relacion estado-municipio de la base
                    $querryEM = "SELECT  id FROM estados_municipios
                    where estados_id= '$estado'
                    and municipios_id = '$ciudad'";

                    $resultados_relacion = sqlsrv_query($con, $querryEM);

                    $r = sqlsrv_fetch_array($resultados_relacion, SQLSRV_FETCH_ASSOC);
                    $estado_municipio = $r["id"];

                    //inserta los datos a la base de datos
                    $querry = "INSERT INTO sucursal
                    VALUES('$id', $estado_municipio, 1)";
                    //echo $querry;

                    $stm = sqlsrv_query($con, $querry);

                    //verifica que el producto de verdad se inserto en la base de datos
                    $confirm = "SELECT * FROM sucursal
                    WHERE id_sucursal = $id";

                    $resultados = sqlsrv_query($con, $confirm);

                    if (sqlsrv_fetch_array($resultados)) {
                        //include("administrativo2.php");
                        echo json_encode("todo chido");
                    } 
                    
                    else {
                        //echo 'Fallo al conectar con la base de datos'. '<br>';
                        //die(print_r(sqlsrv_errors(), true));
                        echo json_encode("consulta BD");
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

    $obj = new Sucursal;
    $obj -> registrar();
