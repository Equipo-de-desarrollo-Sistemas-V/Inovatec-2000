<?php

    $id_ap = $_POST["Id"];
    //echo '<script>alert("'.$id_ap.'")</script>';

    $servername = "inovatecserver.database.windows.net";
    $info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
    $con = sqlsrv_connect($servername, $info);

    if ($con) {
        $querry = "SELECT Id_municipios, municipio FROM estados, estados_municipios, municipios
        WHERE estados.Id = $id_ap AND estados.Id = estados_municipios.estados_id AND 
        estados_municipios.municipios_id = municipios.Id_Municipios";

        $resultados = sqlsrv_query($con, $querry);

        while($row = sqlsrv_fetch_array($resultados)){
            $html = "<option value='" . $row['Id_municipios'] . "'>" . $row['municipio'] . "</option>";
            echo $html;
        }
    
    }
