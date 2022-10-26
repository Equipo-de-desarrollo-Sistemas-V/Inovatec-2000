<?php
error_reporting(0);
session_start();
$sesion_i = $_SESSION["Usuario"];

if($sesion_i!=""){
    echo "<script type='text/javascript'>
    window.location.href='menuPrincipal.php'</script>";
}else{
    echo "<script type='text/javascript'>window.location.href='login.php'</script>";
}

?>