<?php
class Usuario
{
    function validar()
    {
        $in = new Usuario;
        //obtener los datos del fomulario 1
        $nombre = $_POST["nombre-cliente"];
        $paterno = $_POST["apellido-paterno"];
        $materno = $_POST["apellido-materno"];
        $correo = $_POST["email"];
        $telefono = $_POST["Teléfono"];
        $usuario = $_POST["usuario"];

        //Información para conectar a la base
        $servername = "localhost";
        $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
        $con = sqlsrv_connect($servername, $info);

        //verificar que la conexion se hizo bien
        if ($con) {
            //verifica que el usuario no exeda los 20 caracteres
            if (strlen($usuario) <= 20) {
                //verifica que el usuario no exista en la base de  datos
                $querry = "SELECT Usuario FROM Persona
                    WHERE Usuario = '$usuario'";

                $resultados = sqlsrv_query($con, $querry);

                if ($resultados === false) {
                    die(print_r(sqlsrv_errors(), true));
                } else {

                    if (sqlsrv_fetch_array($resultados, SQLSRV_FETCH_ASSOC)) {

                        echo json_encode("usuario existente");
                        //$in->alertas("validacion", 'Datos inválidos', 'Este usuario no está disponible');
                    } 
                    
                    else {

                        //verificar que los nombres no pasen los 40 caracteres
                        if (strlen($nombre) <= 40) {

                            //verificar que el nombre no tenga numeros
                            $numn = $this->numeros($nombre);
                            $carn = $this->caracteres($nombre);

                            if ($numn == 0 and $carn == 0) {

                                //verificar que los apellidos no pasen los 20 caracterse cada uno
                                if (strlen($paterno) <= 20 and strlen($materno) <= 20) {

                                    //verificar que los apellidos no tengan numeros
                                    $nump = $this->numeros($paterno);
                                    $numm = $this->numeros($materno);
                                    $carp = $this->caracteres($paterno);
                                    $carm = $this->caracteres($materno);

                                    if ($nump == 0 and $numm == 0 and $carp == 0 and $carm == 0) {

                                        //verificar que el correo sea real
                                        /*include_once("VerifyEmail.php");

                                        $vmai = new verifyEmail();

                                        if ($vmai->check($correo)) {*/

                                            //verificar que el correo no este registrdado en la base de datos
                                            $querry = "SELECT email from Persona
                                                where email = '$correo'";

                                            $resultados = sqlsrv_query($con, $querry);

                                            if ($resultados === false) {
                                                die(print_r(sqlsrv_errors(), true));
                                            } 
                                            
                                            else {

                                                if (sqlsrv_fetch_array($resultados, SQLSRV_FETCH_ASSOC)) {
                                                    echo json_encode("correo existente");
                                                    //$in->alertas("validacion", 'Datos inválidos', 'Este correo ya está registrado en la base de datos');
                                                } 
                                                
                                                else {
                                                    //verificar que el telefono tenga 10 digitos
                                                    if (strlen($telefono) == 10) {

                                                        //verificar que el telefono tenga solo numeros
                                                        $numt = $this->numeros($telefono);
                                                        if ($numt == 10) {

                                                            //los datos pasaron todas las verificaciones
                                                            $this->guardar();
                                                            echo json_encode("todo chido");
                                                            //$in->alertas("aceptado", 'Listo!!!', 'Los datos se han registrado con éxito');
                                                        } 
                                                        
                                                        else {
                                                            echo json_encode("letras telefono");
                                                            //$in->alertas("validacion", 'Datos inválidos', 'El número de teléfono no debe contener letras ni caracteres especiales');
                                                        }
                                                    } 
                                                    
                                                    else {
                                                        echo json_encode("longitud");
                                                        //$in->alertas("validacion", 'Datos inválidos', 'El número de teléfono debe contener 10 caracteres');
                                                    }
                                                }
                                            }
                                        /*} 
                                        
                                        else if ($vmai->isValid($correo)) {
                                            echo json_encode("inexistente");
                                            //$in->alertas("validacion", 'Datos inválidos', 'El correo ingresado no existe');
                                        } 
                                        
                                        else {
                                            echo json_encode("invalido");
                                            //$in->alertas("validacion", 'Datos inválidos', 'El correo no es válido');
                                        }*/
                                    }
                                    
                                    else {
                                        echo json_encode("numeros apellidos");
                                        //$in->alertas("validacion", 'Datos inválidos', 'Los apellidos no deben contener números ni caracteres especiales');
                                    }
                                } 
                                
                                else {
                                    echo json_encode("apellidos largos");
                                    //$in->alertas("validacion", 'Datos inválidos', 'Los apellidos no deben contener más de 20 caracteres cada uno');
                                }
                            } 
                            
                            else {
                                echo json_encode("numeros nombre");
                                //$in->alertas("validacion", 'Datos inválidos', 'El usuario no debe contener números ni caracteres especiales');
                            }
                        } 
                        
                        else {
                            echo json_encode("nombres largos");
                            //$in->alertas("validacion", 'Datos inválidos', 'El nombre de usuario no debe contener más de 40 caracteres');
                        }
                    }
                }
            } 
            
            else {
                echo json_encode("usuario largo");
                //$in -> alertas("validacion", 'Datos inválidos', 'El usuario no debe contener más de 20 caracteres');
            }
        } 
        
        else {
            die(print_r(sqlsrv_errors(), true));
        }
    }

    function guardar()
    {
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

    //devuelve la cantidad de numeros encontrados en una cadena
    function numeros($cadena)
    {
        $conta = 0;

        for ($i = 0; $i < strlen($cadena); $i++) {
            if (ord($cadena[$i]) >= 48 and ord($cadena[$i]) <= 57) {
                $conta++;
            }
        }

        return $conta;
    }

    //devuelve la cantidad de caracteres especiales (sin incluir letras acentuadas ni la ñ) encontradas en una cadena
    function caracteres($cadena)
    {
        $conta = 0;

        for ($i = 0; $i < strlen($cadena); $i++) {

            //verifica que el caracter no sea numero, letra o espacio (ya admite acentos y ñ)
            if ((ord($cadena[$i]) <= 47 or ord($cadena[$i]) >= 58) and (ord($cadena[$i]) <= 64 or ord($cadena[$i]) >= 91) and (ord($cadena[$i]) <= 96 or ord($cadena[$i])
                    >= 123) and ord($cadena[$i]) != 32 and ord($cadena[$i]) != 195 and ord($cadena[$i]) != 161 and ord($cadena[$i]) != 169 and ord($cadena[$i]) != 173 and
                ord($cadena[$i]) != 179 and ord($cadena[$i]) != 186 and ord($cadena[$i]) != 129 and ord($cadena[$i]) != 137 and ord($cadena[$i]) != 141 and ord($cadena[$i]) != 147
                and ord($cadena[$i]) != 154 and ord($cadena[$i]) != 177 and ord($cadena[$i]) != 145
            ) {
                $conta++;
                //echo json_encode(ord($cadena[$i]));
            }
        }

        return $conta;
    }

            function alertas($valor, $titulo, $mensaje)
            {
        ?>
                <html>

                <body>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <?php
                    if ($valor == 'validacion') {
                    ?>
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: '<?= $titulo ?>',
                                text: '<?= $mensaje ?>',
                                confirmButtonText: 'Ok',
                                timer: 5000,
                                timerProgressBar: true,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = 'registroUsuarios.php';
                                } 
                                
                                else {
                                    location.href = 'registroUsuarios.php';
                                }
                            })
                        </script>
                </body>

                </html>
            <?php
                    } else if ($valor == 'aceptado') {
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: '<?= $titulo ?>',
                        text: '<?= $mensaje ?>',
                        confirmButtonText: 'Ok',
                        timer: 5000,
                        timerProgressBar: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "registroContrasea.php"
                        } 
                        
                        else {
                            location.href = "registroContrasea.php"
                        }
                    })
                </script>
                </body>

                </html>
        <?php
                    }
                }
    }

    $obj = new Usuario;
    $obj->validar();
?>