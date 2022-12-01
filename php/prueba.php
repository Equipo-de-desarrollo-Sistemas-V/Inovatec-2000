<!-- How to connect SLQSERVERdb -->
<?php
    $serverName = "inovatecserver.database.windows.net";
    $connectionInfo = array( "Database"=>"db", "UID"=>"sa", "PWD"=>"123456");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    if( $conn ) {
        echo "Connection established.<BR>";
    }
    else{
        echo "Connection could not be established.<BR>";
        die( print_r( sqlsrv_errors(), true));
    }
?>