<?php
    //logica para registrar un producto en la base de datos

    class Productos{

        function prueba(){
            echo "ecta corriendo el archivo de lógica" . '<br>';
            $this -> registrar();
        }
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

                echo $proveedor. '<br>';
                $proveedor = $this ->quitarEspacio($proveedor);
                echo $proveedor . '<br>';
                //inserta los datos a la base de datos
                $querry = "INSERT INTO Productos
                VALUES($id, '$nombre', $categoria, $precioCompra, $precioVenta, '$proveedor', '$descripcion', $subcategoria)";
                echo $querry;

                $stm = sqlsrv_query($con, $querry);

                $confirm = "SELECT * FROM Productos
                WHERE id_producto = $id";

                $resultados = sqlsrv_query($con, $confirm);

                if(sqlsrv_fetch_array($resultados)){
                    include("administrativo2.php");
                    echo '<script>alert("Producto registrado con éxito")</script>';
                    
                }

                else{
                    echo 'Fallo al conectar con la base de datos'. '<br>';
                    die(print_r(sqlsrv_errors(), true));
                }
            }

            else{
                die(print_r(sqlsrv_errors(), true));
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
    $obj -> prueba();

?>
