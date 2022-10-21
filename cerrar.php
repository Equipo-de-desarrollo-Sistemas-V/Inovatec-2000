<?php
session_start();
session_unset();
session_destroy();
header("location: ../Inovatec-2000/login.php");
?>