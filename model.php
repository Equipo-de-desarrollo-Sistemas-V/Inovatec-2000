<?php
//modelo
class Model{
    var $id;
    var $usua;
    var $contra;
    function __construct(){

    }
    function Logear(){

        //variables conexion
        $cadenmaCnx="sqlsrv:Server=DESKTOP-PGR8IDD;Database=pruebasProyecto";
        $user="sa";
        $pass="12345";

        $cnx=new PDO($cadenmaCnx,$user,$pass);
        try{

            $consulta=$cnx->prepare("SELECT*FROM Usuario WHERE Usuario=:parametro1 and Pass=(SELECT dbo.fun_encriptar(:parametro2))");

            $consulta->bindValue(":parametro1",$this->usua);
            $consulta->bindValue(":parametro2",$this->contra);

            $consulta->execute();

            $filaModel=$consulta->fetch();

            return $filaModel;

        }catch(PDOException $e){

            echo "Error en la conexion->".$e;
        }
    }
}

?>