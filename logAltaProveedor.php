<?php
    //logica para registrar un producto en la base de datos

use Proveedor as GlobalProveedor;

    class Proveedor{
        
        function registrar(){
            
            //informacion para la conexion a base de datos
            $servername = "inovatecserver.database.windows.net";
            $info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
            $con = sqlsrv_connect($servername, $info);

            if($con){

                //datos del formulario
                $id = $_POST["idProveedor"];
                $empresa = $_POST["empresaProv"];
                $rfc = $_POST["rfcProv"];
                $correo = $_POST["correoProv"];
               
                //verifica que el id no este registrado
                $querry_id = "SELECT * FROM Proveedores
                WHERE id_proveedor = '$id'";

                $resultID = sqlsrv_query($con, $querry_id);

                if (sqlsrv_fetch_array($resultID)) {
                    echo json_encode("ID existente");
                }

                else{
                    //inserta los datos a la base de datos
                    $querry = "INSERT INTO Proveedores
                    VALUES('$id', '$empresa', '$rfc', '$correo', 'Activo')";
                    //echo $querry;

                    $stm = sqlsrv_query($con, $querry);

                    //verifica que el proveedor de verdad se inserto en la base
                    $confirm = "SELECT * FROM Proveedores
                    WHERE id_proveedor = '$id'";

                    $resultados = sqlsrv_query($con, $confirm);

                    if (sqlsrv_fetch_array($resultados)) {
                        //include("administrativo2.php");
                        //echo '<script>alert("Proveedor registrado con éxito")</script>';
                        echo json_encode('todo chido');
                    } 
                    
                    else {
                        //die(print_r(sqlsrv_errors(), true));
                        echo json_encode('consulta BD');
                    }
                }
                
            }

            else{
                //die(print_r(sqlsrv_errors(), true));
                echo json_encode('conexion BD');
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

    $obj = new Proveedor;
    $obj -> registrar();
