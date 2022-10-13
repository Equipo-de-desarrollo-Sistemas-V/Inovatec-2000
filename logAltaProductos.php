<?php
    //logica para registrar un producto en la base de datos

    class Productos{

        //informacion para la conexion a base de datos
        function registrar(){
            $servername = "localhost";
            $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
            $con = sqlsrv_connect($servername, $info);

            if($con){

                //datos del formulario
                $id = $_POST["idProducto"];
                $nombre = $_POST["nombreProd"];
                $descripcion = $_POST["descripcion"];
                $categoria = $_POST["categoria"];
                $subcategoria = $_POST["subcategoria"];
                $precioCompra = $_POST["precioProd"];
                $precioVenta = $_POST["precioVenta"];
                $proveedor = $_POST["proveedor"];
                //$foto = $_POST['foto'];

                //verificar que el ID no se repita
                $querry_id = "SELECT * FROM Productos
                WHERE id_producto = $id";
                $resultID = sqlsrv_query($con, $querry_id);

                if (sqlsrv_fetch_array($resultID)) {
                    echo json_encode("ID existente");
                }

                else{
                    $proveedor = $this->quitarEspacio($proveedor);

                    //inserta los datos a la base de datos
                    $querry = "INSERT INTO Productos
                    VALUES($id, '$nombre', $categoria, $precioCompra, $precioVenta, '$proveedor', '$descripcion', $subcategoria, 1)";
                    //echo $querry;

                    $stm = sqlsrv_query($con, $querry);

                    //verifica que el producto de verdad se inserto en la base de datos
                    $confirm = "SELECT * FROM Productos
                    WHERE id_producto = $id";

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

    $obj = new Productos;
    $obj -> registrar();

?>
