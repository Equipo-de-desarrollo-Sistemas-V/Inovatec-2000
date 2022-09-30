
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
                        echo json_encode("numeros");
                    }
    
                    else if($bandM == 0 or $bandm == 0){
                        echo json_encode("mayusculas");
                    }
    
                    else if($bandc == 0){
                        echo json_encode("caracteres");
                    }

                    else{
                        
                        $clave = $this -> encriptar($contra);
                        echo json_encode("todo chido");
                        //$this -> guardar($clave);
                    }
                }
    
                else{
                    echo json_encode("longitud");
                }
            }

            else {
                echo json_encode("coincidencia");
            }
        }
            
            
        
    }

$obj = new Contra;
$obj->validar();
?>