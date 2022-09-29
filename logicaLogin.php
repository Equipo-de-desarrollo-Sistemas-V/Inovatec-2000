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
        try {
            $query="SELECT email FROM Empleados WHERE email='$usuario'";
            $res= sqlsrv_query($conn_sis, $query);
            if( $res === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            #Inicalizamos un contador con un ciclo para los datos
            $conta=0;
            while( $row = sqlsrv_fetch_array($res) ) {
                $conta++;
            }
            #Se verifica si hay datos de empleados, si no se manda a los clientes
            if ($conta===1){
                #Si esta registrado el empleado, se verifica la contraseña
                $palabra_secreta = $_POST["palabra_secreta"];
                $query1="SELECT contra_em FROM Empleados WHERE contra_em='$palabra_secreta'";
                $res1= sqlsrv_query($conn_sis, $query1);
                if( $res1 === false) {
                    die( print_r( sqlsrv_errors(), true) );
                }
                $conta1=0;
                while( $row1 = sqlsrv_fetch_array($res1) ) {
                    $conta1++;
                }
                #Si hay contraseña entonces ya se entra al sistema, si no el empleado no esta registrado
                if ($conta1===1){
                    #Sesion Iniciada como empleado
                    session_start();
                    $_SESSION["email"] = $usuario;
                } else {
                    echo json_encode('registro');
                }
            } else{
                #Si no esta regitrado como cliente, entonces se busca como cliente
                $usuario = $_POST["email"];
                $palabra_secreta = $_POST["password"];
                #Instruccion en la base de datos
                $query2="SELECT email FROM Persona WHERE email='$usuario'";
                $res2= sqlsrv_query($conn_sis, $query2);
                if( $res2 === false) {
                    die( print_r( sqlsrv_errors(), true) );
                }
                $conta2=0;
                while( $row2 = sqlsrv_fetch_array($res2) ) {
                    $conta2++;
                }
                #Si esta registrado el cliente entonces se verifica junto con la contraseña
                if ($conta2===1){
                    $palabra_secreta = $_POST["password"];
                    $query3="SELECT Contra_us FROM Persona WHERE Contra_us='$palabra_secreta'";
                    $res3= sqlsrv_query($conn_sis, $query3);
                    if( $res3 === false) {
                        die( print_r( sqlsrv_errors(), true) );
                    }
                    $conta3=0;
                    while( $row3 = sqlsrv_fetch_array($res3) ) {
                        $conta3++;
                    }
                    #Entra al sistema como cliente, pero si no esta, entonces no esta registrado
                    if ($conta3===1){
                        #Sesion Iniciada como cliente
                        session_start();
                        $_SESSION["email"] = $usuario;
                    } else {
                        echo json_encode('registro');
            }
            }
            }
                
            }catch (Exception $e){
                sqlsrv_close($conn_sis);
            }
}
}
$login=new login();
$login->verifica();
?>