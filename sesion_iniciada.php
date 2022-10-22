<?php
session_start();
$sesion_i = $_SESSION["nombres"];

if($sesion_i!=""){
    header("location:administrativo2.php");
}

?>