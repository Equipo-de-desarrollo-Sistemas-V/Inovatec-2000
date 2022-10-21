<?php
    class Inventario{
        function registrar(){

            //informacion para la conexion a la base de datos
            $servername = "localhost";
            $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
            $con = sqlsrv_connect($servername, $info);

            if ($con) {

                //obtener los datos del formulario
                $id_prod = $_POST["idProveedor"];
                $sucursal = $_POST["empresa"];
                $minimo = $_POST["stock"];
                $existentes = $_POST["existentes"];

                $sucursal = $this->quitarEspacio($sucursal); // le quita el espacio del proncipio a a sucursal

                //verifica que el producto no este registrado en esa sucursal
                $querry_id = "SELECT * FROM Inventario_suc
                    WHERE id_producto = $id_prod AND id_sucursal = '$sucursal'";
                
                $resultID = sqlsrv_query($con, $querry_id);

                if (sqlsrv_fetch_array($resultID)) {
                    echo json_encode("ID existente");
                }

                else{
                    //obtiene los precios de compra y venta del producto
                    $querry_precios = "SELECT precio_com, precio_ven FROM Productos
                    WHERE id_producto = $id_prod";
                    $resultados_precios = sqlsrv_query($con, $querry_precios);

                    if($row = sqlsrv_fetch_array($resultados_precios)){
                        $precio_compra = $row["precio_com"];
                        $precio_venta = $row["precio_ven"];

                        //obtiene el monto y la inversion
                        $inversion = $precio_compra * $existentes;
                        $monto = $precio_venta * $existentes;

                        //mete los datos a la tabla
                        $querry_inventario = "INSERT INTO Inventario_suc
                            VALUES($id_prod, '$sucursal', $existentes, GETDATE(), $minimo, $monto, $inversion)";

                        $stm = sqlsrv_query($con, $querry_inventario);

                        //verifica que los datos si se insertaron en la tabla
                        $querry_confrim = "SELECT * FROM Inventario_suc
                            WHERE id_producto = $id_prod AND id_sucursal = '$sucursal'";

                        $resultados_confirm = sqlsrv_query($con, $querry_confrim);

                        if (sqlsrv_fetch_array($resultados_confirm)) {
                            echo json_encode("todo chido");
                        }

                        else{
                            echo json_encode("consulta BD");
                        }

                    }

                    else{
                        echo json_encode("producto inexistente");
                    }
                }
            }

            else{
                echo json_encode("conexion BD");
            }
        }

        function quitarEspacio($cadena)
        {
            $aux = "";

            for ($i = 1; $i < strlen($cadena); $i++) {
                $aux = $aux . $cadena[$i];
            }

            return $aux;
        }

    }

    $obj = new Inventario();
    $obj -> registrar();
?>