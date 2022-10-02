
<?php
//logica para guardar datos de contraseña
    class Contra{

        //regresa una cadena con la contraseña hasheada
        function encriptar($contra){
            $salt = "";
            $clave = password_hash($contra, PASSWORD_DEFAULT, [15]);
            
            //return $clave;

            $this -> guardar($clave);
        }

        //añade la contraseña al archivo
        function guardar($clave){
            $file = fopen("archivo_campos.txt", "a");
            fwrite($file, $clave.PHP_EOL);
            fclose($file);
        }

        //Comprueba que la contraseña cumpla con los requerimientos de seguridad
        function validar(){
            $in=new Contra;
            $contra = $_POST["contraseña"];
            $confirmacion = $_POST["confirmar-contraseña"];
            $bandn = 0;
            $bandc = 0;
            $bandM = 0;
            $bandm = 0;

            if($contra == $confirmacion){
                if(strlen($contra) >= 8){
                    for($i=0;$i<strlen($contra);$i++){
                        //verificar que tenga numeros
                        if(ord($contra[$i])>=48 and ord($contra[$i])<=57){
                            $bandn ++;
                        }
                        //verificar que tenga caracteres especiales
                        if((ord($contra[$i]) <=47 or ord($contra[$i])>=58) and (ord($contra[$i])<=64 or ord($contra[$i])>=91) and (ord($contra[$i])<=96 or ord($contra[$i])>=123)){
                            $bandc ++;
                        }
        
                        //verificar que tenga mayusculas
                        if(ord($contra[$i])>=65 and ord($contra[$i])<=90){
                            $bandM ++;
                        }
        
                        //verificar que tenga minusculas
                        if(ord($contra[$i])>=97 and ord($contra[$i])<=122){
                            $bandm ++;
                        }
                    }
    
                    if($bandn == 0){
                        // echo json_encode("numeros");
                        $in->alertas("validacion", 'Datos inválidos', 'La contraseña debe contener números');
                    }
    
                    else if($bandM == 0 or $bandm == 0){
                        // echo json_encode("mayusculas");
                        $in->alertas("validacion", 'Datos inválidos', 'La contraseña debe contener mayúsculas y minúsculas');
                    }
    
                    else if($bandc == 0){
                        // echo json_encode("caracteres");
                        $in->alertas("validacion", 'Datos inválidos', 'La contraseña debe tener al menos un carácter especial');
                    }

                    else{
                        
                        $clave = $this -> encriptar($contra);
                        // echo json_encode("todo chido");
                        $in->alertas("aceptado", 'Listo!!!', 'La contraseña ha sido aceptada');
                        //$this -> guardar($clave);
                    }
                }
    
                else{
                    // echo json_encode("longitud");
                    $in->alertas("validacion", 'Datos inválidos', 'La contraseña debe tener un mínimo de 8 caracteres');
                }
            }

            else {
                // echo json_encode("coincidencia");
                $in->alertas("validacion", 'Datos inválidos', 'La contraseña y la confirmación no coinciden');
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
                        location.href='registroContrasea.php';
                    }else{
                        location.href='registroContrasea.php';
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
                        location.href="registroDireccion.php"
                    }else{
                        location.href="registroDireccion.php"
                    }
                })
            </script>
            </body>
            </html>
            <?php
            }
        }

            
            
        
    }

$obj = new Contra;
$obj->validar();
?>