<?php

    //obtener los datos del formulario
    $calle = $_POST["calle"];
    $numero = $_POST["numero"];
    $colonia= $_POST["colonia"];
    $ciudad = $_POST["ciudad"];
    $estado = $_POST["estado"];
    $cp = $_POST["codigo-postal"];

    //verificar que el código postal este completo
    if(strlen($cp) != 5){
        echo '<script>alert("El código postal debe tener 5 cifras")</script>';
        include("../register3.html");
    }

    else{
        if($numero <= 0 or $cp <= 0) {
            echo '<script>alert("No puedes poner números negativos")</script>';
            include("../register3.html");
        }

        else{
            
            //mandar los datos al archivo
            $file = fopen("archivo_campos.txt", "a");
            fwrite($file, $calle.PHP_EOL);
            fwrite($file, $numero.PHP_EOL);
            fwrite($file, $colonia.PHP_EOL);
            fwrite($file, $ciudad.PHP_EOL);
            fwrite($file, $estado.PHP_EOL);
            fwrite($file, $cp.PHP_EOL);
            fclose($file);

            //llamar al ultimo formulario de registro
            include("../register4.html");

        }
        
    }
?>