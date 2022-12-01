<?php
    // <!-- Logica para guadar datos de tarjeta y guardar los datos en BD -->
    class Tarjeta{
        function registro(){
            //$in=new Tarjeta;
            //obtener los datos del formulario
            $usuario = $_POST["usuario"];
            $nombre = $_POST["nombre"];
            $paterno = $_POST["paterno"];
            $materno = $_POST["materno"];
            $correo = $_POST["email"];
            $telefono = $_POST["telefono"];
            $contra = $this->encriptar($_POST["contra"]);

            $calle = $_POST["calle"];
            $numero = $_POST["numero"];
            $colonia = $_POST["colonia"];
            $estado = $_POST["estado"];
            $municipio = $_POST["municipio"];
            $cp = $_POST["cp"];

            $ntarjeta = $_POST["numeroTarjeta"];
            $nombreProp = $_POST["nombrePropietario"];
            $mes = $_POST["mesCaja"];
            $year = $_POST["yearCaja"];
            $ccv = $_POST["ccvCaja"];

            //retirar los espacios del numero de tarjeta

            $auxiliar = "";

            for($i=0;$i<strlen($ntarjeta);$i++){
                if($ntarjeta[$i] != " "){
                    $auxiliar = $auxiliar. $ntarjeta[$i];
                }

            }

            $ntarjeta = $auxiliar;
            //echo $ntarjeta. '<br>';

            //verificar que el numero de tarjeta tenga los 16 digitos
            if(strlen($ntarjeta) != 16){
                //$in->alertas("validacion", 'Datos inválidos', 'El número de tarjeta debe tener 16 dígitos');
                /*echo '<script>alert("El número de tarjeta debe tener 16 díigitos")</script>';
                echo 'No. de digitos: '. strlen($ntarjeta).'<br>';
                echo $ntarjeta;*/
                //include("registroTarjeta.php");
                echo json_encode("digitos tarjeta");
            }

            else{

                //conexion a la base de datos
                $servername = "inovatecserver.database.windows.net";
                $info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
                $con = sqlsrv_connect($servername, $info);

                //verificar que la conexion se hizo bien
                if ($con){

                    $querry_edoMun = "SELECT estados_municipios.id as edo_mun
                    FROM estados_municipios, estados, municipios
                    WHERE municipios.id_Municipios = $municipio AND estados.id = $estado
                    AND estados_municipios.estados_id = estados.id AND municipios.Id_Municipios = estados_municipios.municipios_id";

                    $resultado = sqlsrv_query($con, $querry_edoMun);
                    $row = sqlsrv_fetch_array($resultado);
                    $estado_municipio = $row["edo_mun"];

                    //inserta los datos en la tabla personas
                    $querry ="BEGIN TRAN
                    INSERT INTO Persona
                    values('$usuario', '$contra', '$nombre', '$paterno', '$materno', '$correo',  '$telefono')
                    INSERT INTO Direccion
                    values('$usuario', $estado_municipio, '$colonia', '$calle', '$numero', '$cp')
                    INSERT INTO Tarjetas
                    values('$usuario', '$ntarjeta', '$mes', '$year', '$nombreProp')
                    COMMIT";
                    $resultado = sqlsrv_query($con, $querry);
                    /*$querry_user = "INSERT INTO Persona
                    values('$usuario', '$contra', '$nombre', '$paterno', '$materno', '$correo',  '$telefono')";
                    $consulta_user = sqlsrv_query($con, $querry_user);

                    //inserta los datos en la tabla direccion
                    $querry_direccion = "INSERT INTO Direccion
                    values('$usuario', $estado_municipio, '$colonia', '$calle', '$numero', '$cp')";
                    $consulta_direccion = sqlsrv_query($con, $querry_direccion);

                    //inserta los datos en la tabla tarjetas
                    $querry_tarjeta = "INSERT INTO Tarjetas
                    values('$usuario', '$ntarjeta', '$mes', '$year', '$nombreProp')";
                    $consulta_tarjeta = sqlsrv_query($con, $querry_tarjeta);*/

                    echo json_encode("todo chido");
                    //$in->alertas("aceptado", '¡Felicidades!', 'Tu cuenta ha sido creada.');

                }
                
                else{
                    //$in->alertas("validacion", 'Ups...', 'Fallo al conectar a la base de datos');
                    //die (print_r(sqlsrv_errors(), true));
                    //echo '<script>alert("no se pudo conectar")</script>';
                    //include("registroUsuarios.php");
                    echo json_encode("fallo db");
                }
            }
        }
        function alertas($valor, $titulo, $mensaje){
            ?>
            <html>
            <body>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <?php
            if($valor=='validacion'){
                ?>
                <script>
                Swal.fire({
                icon: 'error',
                title: '<?=$titulo?>',
                text: '<?=$mensaje?>',
                confirmButtonText: 'Ok',
                timer:5000,
                timerProgressBar: true,
                }).then((result)=>{
                    if(result.isConfirmed){
                        location.href='registroTarjeta.php';
                    }else{
                        location.href='registroTarjeta.php';
                    }
                })
            </script>
            </body>
            </html>
            <?php
            }else if($valor=='aceptado'){
                ?>
                <script>
                Swal.fire({
                icon: 'success',
                title: '<?=$titulo?>',
                text: '<?=$mensaje?>',
                confirmButtonText: 'Ok',
                timer:5000,
                timerProgressBar: true,
                }).then((result)=>{
                    if(result.isConfirmed){
                        location.href="login.php"
                    }else{
                        location.href="login.php"
                    }
                })
            </script>
            </body>
            </html>
            <?php
            }
        }

    function encriptar($contra){
        $salt = "";
        $clave = password_hash($contra, PASSWORD_DEFAULT, [15]);

        return $clave;
    }
}
$obj = new Tarjeta;
$obj->registro();
?>