<?php
    
    //funcion para convertir la contraseña en binario
    function str2bin($str){
		$str_arr = str_split($str, 4);
        $bin = '';
		
		for($i = 0; $i<count($str_arr); $i++)
			$bin = $bin.str_pad(decbin(hexdec(bin2hex($str_arr[$i]))), strlen($str_arr[$i])*8, "0", STR_PAD_LEFT);
		
		return $bin;
	}

    $contra = $_POST["contraseña"];
    $confrimacion = $_POST["confirmar-contraseña"];
    echo $contra.'<br>';
    echo $confrimacion.'<br>';

    //validación de la contraseña
    if($contra != $confrimacion){
        echo '<script>alert("La contraseña y la confirmación no coinciden")</script>';
        include("../registroContrasea.html");
    }
    else{

        if(strlen($contra)>=8){
            $bandn = 0;
            $bandc = 0;
            $bandM = 0;
            $bandm = 0;

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

            echo "cantidad de numeros: ".$bandn.'<br>';
            echo "cantidad de caracteres: ".$bandc.'<br>';
            echo "cantidad de mayúsculas: ".$bandm.'<br>';

            if($bandn == 0 or $bandc == 0 or $bandm == 0 or $bandM == 0){
                echo '<script>alert("La contraseña debe contener números, mayúsculas, minúsculas y caracteres especiales")</script>';
                include("../registroContrasea.html");
            }

            else{
                //la contraseña pasó las verificaciones (FALTA ENCRIPTAR)
                $salt = "";
                $clave = password_hash($contra, PASSWORD_DEFAULT, [15]);
                //echo '<script>alert("La clave es: $'.$clave.'")</script>';

                //$binario = str2bin($clave);

                $file = fopen("archivo_campos.txt", "a");
                fwrite($file, $clave.PHP_EOL);
                fclose($file);

                //llamar al tercer formulario
                include("../registroDireccion.html");
            }

        }

        else {
            echo '<script>alert("La contraseña debe contener al menos 8 caracteres")</script>';
            include("../registroContrasea.html");
        }
    
    }

    //
?>