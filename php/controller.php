<?php
    require_once 'model.php';
    //instancia
    $model=new model();
    $model->usua=$_POST['email'];
    $model->contra=$_POST['password'];

    $filaController= $model->Logear();

    if ($filaController>0){
        echo "<h1>Bienvendo Usuario>/h1>";
    }else{
        echo "<h1>Usuario o contraseña incorrectos!>/h1>";
        header ("refresh:2,url=inovatecserver.database.windows.net/Carrito-de-ventas/");
    }
?>