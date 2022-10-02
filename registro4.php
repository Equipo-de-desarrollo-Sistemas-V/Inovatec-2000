<!-- Logica para guadar datos de tarjeta y guardar los datos en BD -->
<?php

    class Tarjeta{
        function registro(){
            $in=new Tarjeta;
            //obtener los datos del formulario
            $ntarjeta = $_POST["numeroTarjeta"];
            $nombre = $_POST["nombrePropietario"];
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
            echo $ntarjeta. '<br>';

            //verificar que el numero de tarjeta tenga los 16 digitos
            if(strlen($ntarjeta) != 16){
                $in->alertas("validacion", 'Datos inválidos', 'El número de tarjeta debe tener 16 dígitos');
                /*echo '<script>alert("El número de tarjeta debe tener 16 díigitos")</script>';
                echo 'No. de digitos: '. strlen($ntarjeta).'<br>';
                echo $ntarjeta;*/
                //include("registroTarjeta.php");
            }

            else{
                //obtener los datos del resto de formularios desde el fichero
                $file = fopen("archivo_campos.txt", "r");

                $nombre = fgets($file);
                $paterno = fgets($file);
                $materno = fgets($file);
                $correo = fgets($file);
                $telefono = fgets($file);
                $usuario = fgets($file);
                $contra = fgets($file);
                $calle = fgets($file);
                $numero = fgets($file);
                $colonia = fgets($file);
                $estado_municipio = fgets($file);
                $cp = fgets($file);

                //quiterle el salto de linea al telefono
                $auxiliar ="";

                for ($i=0;$i<strlen($telefono)-2;$i++){
                    $auxiliar = $auxiliar.$telefono[$i];
                }

                //echo $auxiliar.'<br>';
                //echo $telefono;

                $telefono = $auxiliar;
                //echo $telefono;

                //quiterle el salto de linea a el codigo postal
                $auxiliar ="";

                for ($i=0;$i<strlen($cp)-2;$i++){
                    $auxiliar = $auxiliar.$cp[$i];
                }

                //echo $auxiliar.'<br>';
                //echo $cp;

                $cp = $auxiliar;
                //echo $cp;

                //conexion a la base de datos
                $servername = "localhost";
                $info=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
                $con = sqlsrv_connect($servername, $info);

                //verificar que la conexion se hizo bien
                if ($con){
                    //echo "Conexion exitosa".'<br>';

                    //inserta los datos en la tabla personas
                    $querry_user = "INSERT INTO Persona
                    values('$usuario', '$contra', '$nombre', '$paterno', '$materno', '$correo)";
                    $consulta_user = sqlsrv_query($con, $querry_user);

                    //inserta los datos en la tabla direccion
                    $querry_direccion = "INSERT INTO Direccion
                    values('$usuario', $estado_municipio, '$colonia', '$calle', '$numero', '$telefono', '$cp')";
                    $consulta_direccion = sqlsrv_query($con, $querry_user);

                    //inserta los datos en la tabla tarjetas
                    $querry_tarjeta = "INSERT INTO Tarjetas
                    values('$usuario', '$ntarjeta', '$mes', '$year')";
                    $consulta_tarjeta = sqlsrv_query($con, $querry_user);
                    $in->alertas("aceptado", '¡Felicidades!', 'Tu cuenta ha sido creada.');

                }else{
                    $in->alertas("validacion", 'Ups...', 'Fallo al conectar a la base de datos');
                    //die (print_r(sqlsrv_errors(), true));
                    //echo '<script>alert("no se pudo conectar")</script>';
                    //include("registroUsuarios.php");
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
}
$obj = new Tarjeta;
$obj->registro();
?>