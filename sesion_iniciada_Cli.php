<?php
error_reporting(0);
session_start();
$sesion_i = $_SESSION["Usuario"];

if($sesion_i!=""){
    header("location:datos_venta.php");
}

?>