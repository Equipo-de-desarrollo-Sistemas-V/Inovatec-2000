<!-- Logica para guardar los datos basico del usuario -->
<?php

    //Información para conectar a la base

    $servername = "localhost";
    $info=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($servername, $info);

    //verificar que la conexion se hizo bien
    if ($con){
        echo "Conexion exitosa".'<br>';
    }else{
        echo "no se pudo conectar";
        die (print_r(sqlsrv_errors(), true));
    }

    //obtener los datos del fomulario 1
    $nombre=$_POST["nombre-cliente"];
    $paterno=$_POST["apellido-paterno"];
    $materno=$_POST["apellido-materno"];
    $correo=$_POST["email"];
    $telefono=$_POST["Teléfono"];
    $usuario=$_POST["usuario"];

    
    //veificar que el correo exista

    echo $usuario. ' '. $correo. '<br>';
    $querry="Select * from Usuarios where usuario = '". $usuario."'";
    $resultados = sqlsrv_query($con, $querry);
    if($resultados === false){
        die (print_r(sqlsrv_errors(), true));
    }
    //mostrar las tuplas
    if($r = sqlsrv_fetch_array($resultados, SQLSRV_FETCH_ASSOC)){
        
        while($r = sqlsrv_fetch_array($resultados, SQLSRV_FETCH_ASSOC)){
            echo "usuario encontrado".'<br>';
            include("../register.html");
        }

    }    
    
    else{
        echo "usuario no encontrado";

        //verificar si el correo existe
        include_once("VerifyEmail.php");

        $vmail = new verifyEmail();
        
        if ($vmail->check($correo)) {
            echo 'email &lt;' . $correo . '&gt; exist!';
            //echo '<script>alert("El correo es válido")</script>';
            if(strlen($telefono)!=10){
                echo '<script>alert("El teléfono debe tener 10 díjitos")</script>';
            }
            else {
                //escribir campos en el fichero
                $file = fopen("archivo_campos.txt", "w");
                fwrite($file, $nombre.PHP_EOL);
                fwrite($file, $paterno.PHP_EOL);
                fwrite($file, $materno.PHP_EOL);
                fwrite($file, $correo.PHP_EOL);
                fwrite($file, $telefono.PHP_EOL);
                fwrite($file, $usuario.PHP_EOL);

                fclose($file);
                
                //llamar al segundo formulario

                //Nota: los html se corren desde donde se les invoca, por eso las rutas de los siguientes 
                //formularios de registro deben estar adapradas en base a las rutas de los archivos php que las invocan
                include("../registroContrasea.html");

            }
            
        } elseif ($vmail->isValid($correo)) {
            echo 'email &lt;' . $correo . '&gt; valid, but not exist!';
            echo '<script>alert("Por favor inserte un correo válido")</script>';
            
        } else {
            echo 'email &lt;' . $correo . '&gt; not valid and not exist!';
            echo '<script>alert("Por favor inserte un correo válido")</script>';
        }
        
        
    }
    /*$res=sqlsrv_prepare($con, $querry);
    echo $res.'<br>';

    //$resultados = $res.get_resources();
    $tipo = get_resource_type($res);
    echo $tipo;*/
  
?>