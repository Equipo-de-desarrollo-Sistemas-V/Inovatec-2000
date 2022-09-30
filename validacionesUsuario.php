<?php
    class Usuario{
        function validar(){
            //obtener los datos del fomulario 1
            $nombre=$_POST["nombre-cliente"];
            $paterno=$_POST["apellido-paterno"];
            $materno=$_POST["apellido-materno"];
            $correo=$_POST["email"];
            $telefono=$_POST["Teléfono"];
            $usuario=$_POST["usuario"];

            //Información para conectar a la base
            $servername = "localhost";
            $info=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
            $con = sqlsrv_connect($servername, $info);

            //verificar que la conexion se hizo bien
            if ($con){
            //verifica que el usuario no exeda los 20 caracteres
                if (strlen($usuario) <= 20) {

                    //verifica que el usuario no este registrado ya
                    $querry = "SELECT * FROM Persona WHERE Usuario = '$usuario'";
                    $resultados = sqlsrv_query($con, $querry);
                    if ($resultados === false) {
                        die(print_r(sqlsrv_errors(), true));
                    }
                    //verificar si el usuario esta disponible
                    if (sqlsrv_fetch_array($resultados, SQLSRV_FETCH_ASSOC)) {
                        echo json_encode("usuario existente");
                    } else {
                        //verificar que el correo sea real
                        include_once("VerifyEmail.php");

                        $vmail = new verifyEmail();

                        if ($vmail->check($correo)) {

                            //verifica que los nombres no tengan mas de 40 caracteres
                            if (strlen($nombre) <= 40) {

                                //verifica que los apellidos no tengan mas de 20 caracteres
                                if (strlen($paterno) <= 20 and strlen($materno) <= 20) {
                                    $contador = 0;

                                    for ($i = 0; $i < strlen($telefono); $i++) {
                                        if (ord($telefono[$i]) <= 47 or ord($telefono[$i]) >= 59) {
                                            $contador++;
                                        }
                                    }

                                    if ($contador >= 1) {
                                        echo json_encode("letras");
                                    } else {
                                        if (strlen($telefono) == 10) {
                                            $this->guardar();
                                            echo json_encode("todo chido");
                                        } else {
                                            echo json_encode("longitud");
                                        }
                                    }
                                } else {
                                    echo json_encode("apellidos largos");
                                }
                            } else {
                                echo json_encode("nombres largos");
                            }
                        } else if ($vmail->isValid($correo)) {
                            echo json_encode("inexistente");
                        } else {
                            echo json_encode("invalido");
                        }
                    }
                } else {
                    echo json_encode("usuario largo");
                }
                }else{
                    //echo "no se pudo conectar";
                    die (print_r(sqlsrv_errors(), true));
                }

            
        }

        function guardar(){
            $nombre = $_POST["nombre-cliente"];
            $paterno = $_POST["apellido-paterno"];
            $materno = $_POST["apellido-materno"];
            $correo = $_POST["email"];
            $telefono = $_POST["Teléfono"];
            $usuario = $_POST["usuario"];

            //escribir campos en el fichero
            $file = fopen("archivo_campos.txt", "w");
            fwrite($file, $nombre . PHP_EOL);
            fwrite($file, $paterno . PHP_EOL);
            fwrite($file, $materno . PHP_EOL);
            fwrite($file, $correo . PHP_EOL);
            fwrite($file, $telefono . PHP_EOL);
            fwrite($file, $usuario . PHP_EOL);

            fclose($file);

            //include ("registroContrasea.php");

        }
    }

    $obj = new Usuario;
    $obj->validar(); 
?>