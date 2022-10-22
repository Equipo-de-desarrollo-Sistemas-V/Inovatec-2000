<?php
session_start();
unset($_SESSION["nombres"]);
session_destroy();
header("location:login.php");
?>