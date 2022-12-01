<?php

    $id_ap = $_POST["Id"];
    //echo '<script>alert("'.$id_ap.'")</script>';

    $servername = "inovatecserver.database.windows.net";
    $info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
    $con = sqlsrv_connect($servername, $info);

    if ($con) {
        $querry = "SELECT Id_subap, SubApartado from Subapartados
        WHERE id_ap = '$id_ap'";

        $resultados = sqlsrv_query($con, $querry);

        while($row = sqlsrv_fetch_array($resultados)){
            $html = "<option value='" . $row['Id_subap'] . "'>" . $row['SubApartado'] . "</option>";
            echo $html;
        }
    
    }

?>