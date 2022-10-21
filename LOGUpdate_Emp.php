<?php
class ActPro{
    function Update(){
        $id= filter_input(INPUT_POST, "idTrabajador");
        $nomEmp= filter_input(INPUT_POST, "nombreTabajador");
        $ap_pat= filter_input(INPUT_POST, "apPaterno");
        $ap_mat= filter_input(INPUT_POST, "apMaterno");
        $rfc= filter_input(INPUT_POST, "rfc");
        $user= filter_input(INPUT_POST, "usuario");
        $suc=$_POST['idSucursal'];
        $puesto=$_POST['puesto'];
        if(isset($_POST['cbox1']))
        {
            $p1=1;
        }
        else{
            $p1=0;
        }
        if(isset($_POST['cbox2']))
        {
            $p2=1;
        }
        else{
            $p2=0;
        }
        if(isset($_POST['cbox3']))
        {
            $p3=1;
        }
        else{
            $p3=0;
        }
        if(isset($_POST['cbox4']))
        {
            $p4=1;
        }
        else{
            $p4=0;
        }
        if(isset($_POST['cbox5']))
        {
            $p5=1;
        }
        else{
            $p5=0;
        }
        if(isset($_POST['cbox6']))
        {
            $p6=1;
        }
        else{
            $p6=0;
        }
        /*echo "<pre>";
        print_r($_POST);
        print_r($p1.$p2.$p3.$p4.$p3.$p6);
        echo "</pre>";*/
    //}
        //echo $id.$mun.$estado;
        
        $serverName='localhost';
        $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
        $conn_sis=sqlsrv_connect($serverName, $connectionInfo) ;
        $updateQuery ="UPDATE Empleados SET nombres=('$nomEmp'),ap_paterno=('$ap_pat'),ap_materno=('$ap_mat'),sucursal=('$suc'),rfc=('$rfc'),email=('$user'),puesto=('$puesto') WHERE id_empleado='$id'";
        $getProv = sqlsrv_query($conn_sis, $updateQuery);
        if( $getProv === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        $updateQueryPer ="UPDATE Permisos SET permiso2=('$p1'),permiso3=('$p2'),permiso4=('$p3'),permiso5=('$p4'),permiso6=('$p5'),permiso7=('$p6') WHERE id_empleado='$id'";
        $getProv = sqlsrv_query($conn_sis, $updateQueryPer);
        if( $getProv === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        
        include("lista_trabajador.php");
    //}
}}
    //echo '<script>alert("Empleado actualizado con éxito")</script>';
    $obj= new ActPro;
    $obj->Update();
