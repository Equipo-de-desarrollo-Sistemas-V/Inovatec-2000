<?php
    //logica para registrar un producto en la base de datos

    class Productos{
        
        function registrar(){
            echo "Archivo de logca". '<br>';
            //informacion para la conexion a base de datos
            $servername = "localhost";
            $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
            $con = sqlsrv_connect($servername, $info);

            if($con){

                //datos del formulario
                $id = $_POST["idProveedor"];
                $empresa = $_POST["empresa"];
                $rfc = $_POST["rfcProv"];
                $correo = $_POST["correoProv"];
               
                //inserta los datos a la base de datos
                $querry = "INSERT INTO Proveedores
                VALUES('$id', '$empresa', '$rfc', '$correo')";
                echo $querry;

                $stm = sqlsrv_query($con, $querry);

                $confirm = "SELECT * FROM Proveedores
                WHERE id_proveedor = $id";

                $resultados = sqlsrv_query($con, $confirm);

                if (sqlsrv_fetch_array($resultados)) {
                    include("administrativo2.php");
                    echo '<script>alert("Proveedor registrado con éxito")</script>';
                }
                
                else {
                    echo 'Fallo al conectar con la base de datos' . '<br>';
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
    $obj -> registrar();
