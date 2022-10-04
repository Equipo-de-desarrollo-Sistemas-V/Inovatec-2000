<?php
class login{
    function verifica(){
        #Conexion a la base de datos
        $in=new login;
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conn_sis= sqlsrv_connect($serverName, $connectionInfo);

        $usuario = $_POST["email"];
        $palabra_secreta = $_POST["password"];

        //Verficar si es un empleado
        $query="SELECT nombres, email FROM Empleados WHERE email='$usuario'";
        $res= sqlsrv_query($conn_sis, $query);
        //echo $res . 'hola' . '<br>';

        if($res === false){
            die(print_r(sqlsrv_errors(), true));
        }

        else{
            $arreEmpl = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);
            if (!empty($arreEmpl)) {
                $query1 = "SELECT contra_em FROM Empleados WHERE email='$usuario'";
                $res = sqlsrv_query($conn_sis, $query1);
                $row = sqlsrv_fetch_array($res);
                $contraHash = $row['contra_em'];
                if (password_verify($palabra_secreta, $contraHash)) {
                    //echo $arreEmpl['nombres'];
                    session_start();
                    $_SESSION["nombres"] = $arreEmpl['nombres'];
                    include "administrativo.php";
                } else {
                    $in->alertas("validacion", 'Error', 'Correo o contraseña incorrectos');
                }
            } else {
                $query = "SELECT Usuario, email FROM Persona WHERE email='$usuario'";
                $res = sqlsrv_query($conn_sis, $query);
                $arreClien = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);
                if (!empty($arreClien)) {
                    $query1 = "SELECT Contra_us FROM Persona WHERE email='$usuario'";
                    $res = sqlsrv_query($conn_sis, $query1);
                    $row = sqlsrv_fetch_array($res);
                    $contraHash = $row['Contra_us'];
                    if (password_verify($palabra_secreta, $contraHash)) {
                        //echo $arreClien['Usuario'];
                        $file = fopen("archivo_correo.txt", "w");
                        fwrite($file, $arreClien['Usuario'] . PHP_EOL);
                        fclose($file);
                        session_start();
                        $_SESSION["Usuario"] = $arreClien['Usuario'];
                        include "perfilCliente.php";
                    } else {
                        $in->alertas("validacion", 'Error', 'Correo o contraseña incorrectos');
                    }
                } else {
                    $in->alertas("validacion", 'Error', 'Correo no registrado');
                }
            }
        }
        
        sqlsrv_close($conn_sis);


        // #Informacion ingresada en las cajas de texto
        // $usuario = $_POST["email"];
        // $palabra_secreta = $_POST["password"];
        // #Instruccion en la base de datos
        // $query="SELECT email FROM Empleados WHERE email='$usuario'";
        // $res= sqlsrv_query($conn_sis, $query);
        // if( $res === false) {
        //     // die( print_r( sqlsrv_errors(), true) );
        //     $in->alertas("validacion", 'Vaya...', 'Fallo al conectar a la base de datos');
        // }
        // #Inicalizamos un contador con un ciclo para los datos
        // $conta=0;
        // $conta00=0;
        // while( $row = sqlsrv_fetch_array($res) ) {
        //     $conta++;
        // }
        // #Se verifica si hay datos de empleados, si no se manda a los clientes
        // if ($conta===1){
        //     #Si esta registrado el empleado, se verifica la contraseña
        //     $query1="SELECT contra_em FROM Empleados WHERE email='$usuario'";
        //     $res1= sqlsrv_query($conn_sis, $query1);
        //     if( $res1 === false) {
        //         // die( print_r( sqlsrv_errors(), true) );
        //         $in->alertas("validacion", 'Vaya...', 'Fallo al conectar a la base de datos');
        //     }
        //     $conta1=0;
        //     while( $row1 = sqlsrv_fetch_array($res1) ) {
        //         $conta1++;
        //         $hash=$row1['contra_em'];
        //         if (password_verify($palabra_secreta, $hash)) {
        //             $query0="SELECT nombres FROM Empleados WHERE email='$usuario'";
        //             $res0= sqlsrv_query($conn_sis, $query0);
        //             if( $res0 === false) {
        //                 // die( print_r( sqlsrv_errors(), true) );
        //                 $in->alertas("validacion", 'Vaya...', 'Fallo al conectar a la base de datos');
        //             }
        //             echo 'aqui uno';
        //             #Inicalizamos un contador con un ciclo para los datos
        //             $conta0=0;
        //             while( $row0 = sqlsrv_fetch_array($res0) ) {
        //                 $conta0++;
        //                 $in->alertas("aceptado", 'Ingreso', 'Ha iniciado sesión');
        //                 session_start();
        //                 $_SESSION["nombres"] = $row0['nombres'];
        //                 include "administrativo.php";
        //     }
        //     } else {
        //         $in->alertas("validacion", 'Error', 'Correo o contraseña incorrectos');
        //     } 
        //     } 
        //     #Si hay contraseña entonces ya se entra al sistema, si no el empleado no esta registrado
        // } else if ($conta===0) {
        //     echo 'aqui vamos e nuevo';
        //     #Si no esta regitrado como cliente, entonces se busca como cliente
        //     $usuario = $_POST["email"];
        //     $palabra_secreta = $_POST["password"];
        //     #Instruccion en la base de datos
        //     $query2="SELECT email FROM Persona WHERE email='$usuario'";
        //     $res2= sqlsrv_query($conn_sis, $query2);
        //     if( $res2 === false) {
        //         // die( print_r( sqlsrv_errors(), true) );
        //         $in->alertas("validacion", 'Vaya...', 'Fallo al conectar a la base de datos');
        //     }
        //     $conta2=0;
        //     while( $row2 = sqlsrv_fetch_array($res2) ) {
        //         $conta2++;
        //     }
        //     #Si esta registrado el cliente entonces se verifica junto con la contraseña
        //     if ($conta2===1){
        //         $palabra_secreta = $_POST["password"];
        //         $query3="SELECT Contra_us FROM Persona WHERE email='$usuario'";
        //         $res3= sqlsrv_query($conn_sis, $query3);
        //         if( $res3 === false) {
        //             // die( print_r( sqlsrv_errors(), true) );
        //             $in->alertas("validacion", 'Vaya...', 'Fallo al conectar a la base de datos');
        //         }
        //         $conta3=0;
        //         while( $row3 = sqlsrv_fetch_array($res3) ) {
        //             $conta3++;
        //             $hash1=$row3['Contra_us'];
        //             if (password_verify($palabra_secreta, $hash1)) {
        //                 $query011="SELECT Usuario FROM Persona WHERE email='$usuario'";
        //                 $res011= sqlsrv_query($conn_sis, $query011);
        //                 if( $res011 === false) {
        //                     // die( print_r( sqlsrv_errors(), true) );
        //                     $in->alertas("validacion", 'Vaya...', 'Fallo al conectar a la base de datos');
        //                 }
        //                 $conta011=0;
        //                 while( $row011 = sqlsrv_fetch_array($res011) ) {
        //                     $conta011++;
        //                     $in->alertas("aceptado", 'Ingreso', 'Ha iniciado sesión');
        //                     session_start();
        //                     $_SESSION["Usuario"] = $row011['Usuario'];

        //                     $ingreso=$row011["Usuario"];
        //                     $file = fopen("archivo_correo.txt", "w");
        //                     fwrite($file, $ingreso. PHP_EOL);
        //                     fclose($file);
        //                     echo 'aqui dos';
        //                     include "perfilCliente.php";
        //                 }
        //             } else {
        //                 $in->alertas("validacion", 'Error', 'Correo o contraseña incorrectos');
        //                 }
        //     }
        //     }
        //     }else if ($conta00===0 and $conta===0){
        //         $in->alertas("validacion", 'Error', 'Correo no registrado');
        //     }
        //     sqlsrv_close($conn_sis);
    }

    function alertas($valor, $titulo, $mensaje){
        ?>
        <html>
        <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php
        if($valor=='validacion'){
            ?>
            <script>
            Swal.fire({
            icon: 'error',
            title: '<?=$titulo?>',
            text: '<?=$mensaje?>',
            confirmButtonText: 'Ok',
            timer:5000,
            timerProgressBar: true,
            }).then((result)=>{
                if(result.isConfirmed){
                    location.href='login.php';
                }else{
                    //location.href='login.php';
                }
            })
        </script>
        </body>
        </html>
        <?php
        }else if($valor=='aceptado'){
            ?>
            <script>
            Swal.fire({
            icon: 'success',
            title: '<?=$titulo?>',
            text: '<?=$mensaje?>',
            confirmButtonText: 'Ok',
            timer:5000,
            timerProgressBar: true,
            }).then((result)=>{
                if(result.isConfirmed){
                    //location.href='login.php';
                }else{
                    //location.href='login.php';
                }
            })
        </script>
        </body>
        </html>
        <?php
        }
    }
}
$log=new login();
$log->verifica();
?>