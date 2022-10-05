<?php

$file = fopen("archivo_correo.txt", "r");
                $auxIngreso = fgets($file);
                fclose($file);

                $ingreso ="";
                for ($i=0;$i<strlen($auxIngreso)-2;$i++){
                    $ingreso= $ingreso.$auxIngreso[$i];
                }

                $file = fopen("archivo_elim.txt", "w");
                fwrite($file, "Si". PHP_EOL);
                fwrite($file, $ingreso. PHP_EOL);
                fclose($file);
/*
 $serverName='localhost';
 $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 
$query= "DELETE FROM Tarjetas WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query($con, $query);
                        $query= "DELETE FROM Direccion WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query( $con, $query);
                        $query= "DELETE FROM Persona WHERE Usuario='$ingreso'";
                        $resultado=sqlsrv_query( $con, $query);*/

?>