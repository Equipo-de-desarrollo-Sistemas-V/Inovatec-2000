<?php
session_start();
$sesion_i = $_SESSION["Usuario"];

if($sesion_i!=""){
    header("location:menuPrincipal.php");
}

?>