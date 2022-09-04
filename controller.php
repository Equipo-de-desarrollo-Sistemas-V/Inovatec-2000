<?php
require_once 'model.php';
//instancia
$model=new Model();
$model->usua=$_POST['email'];
$model->contra=$_POST['password'];

$filaController= $model->Logear()
?>