<?php
error_reporting(0);
session_start();
$sesion_i = $_SESSION["Usuario"];

if($sesion_i==""){
    echo'<script>location.href="registroUsuarios.php";</script>';
}else{
    echo'<script>location.href="index.php";</script>';
}

?>