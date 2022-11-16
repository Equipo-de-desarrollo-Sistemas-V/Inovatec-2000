<?php
session_start();
$sesion_i = $_SESSION["Usuario"];

if($sesion_i==null||$sesion_i=""){
    echo '<script> alert("No tienes sesion activa");
    location.href="login.php";
    </script>';
    die();
    }

?>