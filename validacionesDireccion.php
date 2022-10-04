
<?php
// <!-- Logica para guardar datos de direccion -->
    class Direccion{

        //verifica que el codigo postal tenga 5 digitos
        function validar()
        {
            $in=new Direccion;
            $calle = $_POST["calle"];
            $numero = $_POST["numero"];
            $colonia = $_POST["colonia"];
            $ciudad = $_POST["ciudad"];
            $estado = $_POST["estado"];
            $cp = $_POST["codigo-postal"];

            //informacion de la conexion a BD
            $servername = "localhost";
            $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
            $con = sqlsrv_connect($servername, $info);

            if ($con) {
                //verificar que el estado exista en la base de datos
                $querry_estado = "SELECT Id FROM estados where estado = '$estado'";

                $resultados_estado = sqlsrv_query($con, $querry_estado);

                if (sqlsrv_fetch_array($resultados_estado, SQLSRV_FETCH_ASSOC)) {

                    //verifica que el municipio exista en la base de datos
                    $querry_municipio = "SELECT Id_Municipios FROM municipios where municipio = '$ciudad'";

                    $resultados_municipio = sqlsrv_query($con, $querry_municipio);

                    if (sqlsrv_fetch_array($resultados_municipio, SQLSRV_FETCH_ASSOC)) {

                        //verifica que el municipio si este en el estado
                        $querry_relacion = "SELECT  estados_municipios.id FROM estados_municipios, estados, municipios
                        where estados.Estado = '$estado'
                        and municipios.municipio = '$ciudad' and 
                        estados_municipios.estados_id = estados.id and 
                        estados_municipios.municipios_id = municipios.id_Municipios";

                        $resultados_relacion = sqlsrv_query($con, $querry_relacion);

                        if ($r = sqlsrv_fetch_array($resultados_relacion, SQLSRV_FETCH_ASSOC)) {
                            $estado_municipio = $r["id"];

                            //verifica que calle no tenga mas de 20 carateres
                            if(strlen($calle) <= 20){

                                $numc = $this -> numeros($calle);
                                $carc = $this -> caracteres($calle);

                                //verifica que la calle no tenga numeros ni caracteres especiales
                                if($numc == 0 and $carc == 0){

                                    //verifica que la colonia no pase de los 20 caracteres
                                    if(strlen($colonia) <= 20){

                                        $numc = $this->numeros($colonia);
                                        $carc = $this->caracteres($colonia);

                                        //verifica que la colonia no tenga numeros ni caracteres especiales
                                        if($numc == 0 and $carc == 0){
                                            //verifica que el codigo postal tenga 5 digitos
                                            if (strlen($cp) == 5) {

                                                //verifica que el codigo y el numero de calle postal sea positivo
                                                if ($cp >= 1) {

                                                    //verifica que el numero de la calle sea positivo
                                                    if ($numero >= 1) {

                                                        //la informacion paso todos los filtros
                                                        $this->guardar($estado_municipio);
                                                        echo json_encode("todo chido");
                                                        //$in->alertas("aceptado", 'Listo!!!', 'La información ha sido aceptada');
                                                    }
                                                     
                                                    else {
                                                        echo json_encode("negativo calle");
                                                        //$in->alertas("validacion", 'Datos inválidos', '"El número de la calle no puede ser menor que 1');
                                                    }
                                                } 
                                                
                                                else {
                                                    echo json_encode("negativoCP");
                                                    //$in->alertas("validacion", 'Datos inválidos', '"El código postal debe ser positivo');
                                                }
                                            } 
                                            
                                            else {
                                                echo json_encode("digitosCP");
                                                //$in->alertas("validacion", 'Datos inválidos', '"El código postal debe tener 5 dígitos');
                                            }
                                        }

                                        else{
                                            echo json_encode("numeros colonia");
                                            $in->alertas("validacion", 'Datos inválidos', 'El nombre de la colonia no debe contener números ni caracteres especiales');
                                        }
                                        
                                    }
                                    
                                    else{
                                        echo json_encode("colonia largo");
                                        //$in->alertas("validacion", 'Datos inválidos', '"La colonia no debe tener más de 20 dígitos');
                                    }
                                }

                                else{
                                    echo json_encode("numeros calle");
                                    //$in->alertas("validacion", 'Datos inválidos', '"La calle no debe contener números ni caracteres especiales');
                                }
                                
                            }  

                            else{
                                echo json_encode("calle largo");
                                //$in->alertas("validacion", 'Datos inválidos', '"La calle no debe tener más de 20 dígitos');
                            }
                        } 
                        
                        else {
                            echo json_encode("estado-municipio");
                            //$in->alertas("validacion", 'Datos inválidos', '"El municipio no se encuentra en el estado indicado');
                        }
                    } 
                    
                    else {
                        echo json_encode("municipio");
                        //$in->alertas("validacion", 'Datos inválidos', '"La ciudad no existe');
                    }
                } 
                
                else {
                    echo json_encode("estado");
                    //$in->alertas("validacion", 'Datos inválidos', '"El estado no existe');
                }
            } 
            
            else {
                die(print_r(sqlsrv_errors(), true));
            }
        }

        //guarda los datos de dirección en el fichero
        function guardar($estado_municipio)
        {
            $calle = $_POST["calle"];
            $numero = $_POST["numero"];
            $colonia = $_POST["colonia"];
            $cp = $_POST["codigo-postal"];

            $file = fopen("archivo_campos.txt", "a");
            fwrite($file, $calle . PHP_EOL);
            fwrite($file, $numero . PHP_EOL);
            fwrite($file, $colonia . PHP_EOL);
            fwrite($file, $estado_municipio.PHP_EOL);
            fwrite($file, $cp . PHP_EOL);
            fclose($file);
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
                        location.href='registroDireccion.php';
                    }else{
                        location.href='registroDireccion.php';
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
                        location.href="registroTarjeta.php"
                    }else{
                        location.href="registroTarjeta.php"
                    }
                })
            </script>
            </body>
            </html>
            <?php
            }
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

    }


$obj = new Direccion;
$obj->validar(); 

?>