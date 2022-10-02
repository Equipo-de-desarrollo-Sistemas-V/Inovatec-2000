<?php
class login{
    function verifica(){
        #Conexion a la base de datos
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conn_sis= sqlsrv_connect($serverName, $connectionInfo);

        #Informacion ingresada en las cajas de texto
        $usuario = $_POST["email"];
        $palabra_secreta = $_POST["password"];
        #Instruccion en la base de datos
        $query="SELECT email FROM Empleados WHERE email='$usuario'";
        $res= sqlsrv_query($conn_sis, $query);
        if( $res === false) {
            // die( print_r( sqlsrv_errors(), true) );
            echo json_encode('conn');
        }
        #Inicalizamos un contador con un ciclo para los datos
        $conta=0;
        $conta00=0;
        while( $row = sqlsrv_fetch_array($res) ) {
            $conta++;
        }
        #Se verifica si hay datos de empleados, si no se manda a los clientes
        if ($conta===1){
            #Si esta registrado el empleado, se verifica la contraseña
            $query1="SELECT contra_em FROM Empleados WHERE email='$usuario'";
            $res1= sqlsrv_query($conn_sis, $query1);
            if( $res1 === false) {
                // die( print_r( sqlsrv_errors(), true) );
                echo json_encode('conn');
            }
            $conta1=0;
            while( $row1 = sqlsrv_fetch_array($res1) ) {
                $conta1++;
                $hash=$row1['contra_em'];
                if (password_verify($palabra_secreta, $hash)) {
                    $query0="SELECT nombres FROM Empleados WHERE email='$usuario'";
                    $res0= sqlsrv_query($conn_sis, $query0);
                    if( $res0 === false) {
                        // die( print_r( sqlsrv_errors(), true) );
                        echo json_encode('conn');
                    }
                    #Inicalizamos un contador con un ciclo para los datos
                    $conta0=0;
                    while( $row0 = sqlsrv_fetch_array($res0) ) {
                        $conta0++;
                        session_start();
                        $_SESSION["nombres"] = $row0['nombres'];
                        include_once "administrativo.php";
            }
            } else {
                echo json_encode('error');
            } 
            } 
            #Si hay contraseña entonces ya se entra al sistema, si no el empleado no esta registrado
        } else if ($conta===0) {
            #Si no esta regitrado como cliente, entonces se busca como cliente
            $usuario = $_POST["email"];
            $palabra_secreta = $_POST["password"];
            #Instruccion en la base de datos
            $query2="SELECT email FROM Persona WHERE email='$usuario'";
            $res2= sqlsrv_query($conn_sis, $query2);
            if( $res2 === false) {
                // die( print_r( sqlsrv_errors(), true) );
                echo json_encode('conn');
            }
            $conta2=0;
            while( $row2 = sqlsrv_fetch_array($res2) ) {
                $conta2++;
            }
            #Si esta registrado el cliente entonces se verifica junto con la contraseña
            if ($conta2===1){
                $palabra_secreta = $_POST["password"];
                $query3="SELECT Contra_us FROM Persona WHERE email='$usuario'";
                $res3= sqlsrv_query($conn_sis, $query3);
                if( $res3 === false) {
                    // die( print_r( sqlsrv_errors(), true) );
                    echo json_encode('conn');
                }
                $conta3=0;
                while( $row3 = sqlsrv_fetch_array($res3) ) {
                    $conta3++;
                    $hash1=$row3['Contra_us'];
                    if (password_verify($palabra_secreta, $hash1)) {
                        $query011="SELECT Usuario FROM Persona WHERE email='$usuario'";
                        $res011= sqlsrv_query($conn_sis, $query011);
                        if( $res011 === false) {
                            // die( print_r( sqlsrv_errors(), true) );
                            echo json_encode('conn');
                        }
                        $conta011=0;
                        while( $row011 = sqlsrv_fetch_array($res011) ) {
                            $conta011++;
                            include_once "perfilCliente.php";
                            session_start();
                            $_SESSION["Usuario"] = $row011['Usuario'];
                            
                        }
                    } else {
                        echo json_encode('error');
                        }
            }
            }
            } if ($conta00===0 and $conta===0){
                echo json_encode('registro');
            }
            sqlsrv_close($conn_sis);
}
}
$login=new login();
$login->verifica();
?>