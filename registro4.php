<!-- Logica para guadar datos de tarjeta y guardar los datos en BD -->
<?php

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
        echo '<script>alert("El número de tarjeta debe tener 16 díigitos")</script>';
        echo 'No. de digitos: '. strlen($ntarjeta).'<br>';
        echo $ntarjeta;
        include("registroTarjeta.php");
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
        $ciudad = fgets($file);
        $estado = fgets($file);
        $cp = fgets($file);

        //quiterle el salto de linea al telefono
        $auxiliar ="";

        for ($i=0;$i<strlen($telefono)-2;$i++){
            $auxiliar = $auxiliar.$telefono[$i];
        }

        echo $auxiliar.'<br>';
        echo $telefono;

        $telefono = $auxiliar;
        echo $telefono;

        //quiterle el salto de linea a el codigo postal
        $auxiliar ="";

        for ($i=0;$i<strlen($cp)-2;$i++){
            $auxiliar = $auxiliar.$cp[$i];
        }

        echo $auxiliar.'<br>';
        echo $cp;

        $cp = $auxiliar;
        echo $cp;

        //conexion a la base de datos
        $servername = "localhost";
        $info=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $con = sqlsrv_connect($servername, $info);

        //verificar que la conexion se hizo bien
        if ($con){
            echo "Conexion exitosa".'<br>';
        }else{
            die (print_r(sqlsrv_errors(), true));
            echo '<script>alert("no se pudo conectar")</script>';
            include("registroUsuarios.php");
        }

        //consulta para insertar a la base
        $query = "INSERT INTO Usuarios VALUES('$nombre', '$paterno', '$materno', '$usuario', '$contra', '$ciudad', '$estado', '$colonia', '$calle', '$numero', '$telefono', '$cp', '$correo', '$ntarjeta', '$mes', '$year')";
        $res=sqlsrv_prepare($con, $query);

        if (sqlsrv_execute($res)){
            echo "<br>Datos insertado correctamente";
        }else{
            echo "<br>Error al insertar los datos";
            die (print_r(sqlsrv_errors(), true));
        }
    }
?>