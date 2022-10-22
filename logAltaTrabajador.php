<?php
    class Trabajador{
        function registrar(){
            //informacion para la conexion a base de datos
            $servername = "localhost";
            $info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
            $con = sqlsrv_connect($servername, $info);

            if ($con) {
                $id = $_POST["idTrabajador"];
                $nombre = $_POST["nombreTabajador"];
                $paterno = $_POST["apPaterno"];
                $materno = $_POST["apMaterno"];
                $rfc = $_POST["rfc"];
                $puesto = $_POST["puesto"];
                $correo = $_POST["correoE"];
                $pass = $_POST["contraseña"];
                $sucursal = $_POST["sucursal"];
                $cbox1 = isset($_POST["cbox1"]);
                $cbox2 = isset($_POST["cbox2"]);
                $cbox3 = isset($_POST["cbox3"]);
                $cbox4 = isset($_POST["cbox4"]);
                $cbox5 = isset($_POST["cbox5"]);
                $cbox6 = isset($_POST["cbox6"]);

                //verifica que el ID no este regostrado en la base
                $querry_id = "SELECT * FROM Empleados
                WHERE id_empleado = '$id'";
                $resultID = sqlsrv_query($con, $querry_id);

                if(sqlsrv_fetch_array($resultID)){
                    echo json_encode("ID existente");
                    //echo "el id existe";
                }

                else{

                    $validar = $this -> formatoConstrasena($pass);
                    if ($validar=="si"){
                        $contra = $this->encriptar($pass); //encriptar la contraseña
                        $sucursal = $this->quitarEspacio($sucursal); //quitarle el especio del principio a sucursal

                        //verifica si la casilla de bloqueado esta seleccionada
                        $p6 = $this -> evaluarPermiso($cbox6);
                        if($p6 == 1){

                            $querry_emp = "INSERT INTO Empleados
                            VALUES('$id', '$nombre', '$paterno', '$materno', '$sucursal', '$rfc', '$correo', '$contra', '$puesto')";

                            $stm = sqlsrv_query($con, $querry_emp);
                            if ($stm === false) {
                                //die(print_r(sqlsrv_errors(), true));
                                echo json_encode("consulta BD");
                            } 
                            
                            else {

                                //verifica que el empleado si se haya insertado en la base 
                                $confirm = "SELECT * FROM Empleados
                                WHERE id_empleado = '$id'";

                                $resultados = sqlsrv_query($con, $confirm);

                                if (sqlsrv_fetch_array($resultados)) {

                                    //inserta datos en la tabla de permisos pero con todos en false
                                    $querry_permisos = "INSERT INTO Permisos
                                            VALUES('$id', 0, 0, 0, 0, 0, 0, 1)";
                                    $stmp = sqlsrv_query($con, $querry_permisos);
                                    //echo json_encode("bloqueado");

                                    echo json_encode("todo chido");
                                }

                                else{
                                    echo json_encode("consulta BD");
                                }
                                    
                            }
                        }

                        else{

                            //evaluar cuales casillas estan seleccionadas
                            $p1 = $this->evaluarPermiso($cbox1);
                            $p2 = $this->evaluarPermiso($cbox2);
                            $p3 = $this->evaluarPermiso($cbox3);
                            $p4 = $this->evaluarPermiso($cbox4);
                            $p5 = $this->evaluarPermiso($cbox5);

                            //verifica que al menos un check este seleccionado
                            if($p1 == 0 and $p2 == 0 and $p3 == 0 and $p4 == 0 and $p5 == 0){
                                echo json_encode("check");
                            }  

                            else{
                                $querry_emp = "INSERT INTO Empleados
                                VALUES('$id', '$nombre', '$paterno', '$materno', '$sucursal', '$rfc', '$correo', '$contra', '$puesto')";

                                $stm = sqlsrv_query($con, $querry_emp);
                                if ($stm === false) {
                                    //die(print_r(sqlsrv_errors(), true));
                                    echo json_encode("consulta BD");
                                } else {

                                    //verifica que el empleado si se haya insertado en la base 
                                    $confirm = "SELECT * FROM Empleados
                                    WHERE id_empleado = '$id'";

                                    $resultados = sqlsrv_query($con, $confirm);

                                    if (sqlsrv_fetch_array($resultados)) {

                                        //inserta datos en la tabla de permisos pero con todos en false
                                        $querry_permisos = "INSERT INTO Permisos
                                                VALUES('$id', 0, $p1, $p2, $p3, $p4, $p5, 0)";
                                        $stmp = sqlsrv_query($con, $querry_permisos);
                                        //echo json_encode("bloqueado");

                                        echo json_encode("todo chido");
                                    } else {
                                        echo json_encode("consulta BD");
                                    }
                                }
                            }
                        }
                    }
                    else {
                            echo json_encode('contra');
                    }
                }            
            }

            else{
                echo json_encode('conexion BD');
                //die(print_r(sqlsrv_errors(), true));
            }
        }

        function evaluarPermiso($permiso){
            if ($permiso == false) {
                //echo "permiso denegado";
                return 0;
            } else {
                //echo "permiso concedido";
                return 1;
            }
        }

        function encriptar($contra){
            $clave = password_hash($contra, PASSWORD_DEFAULT, [15]);
            return $clave;
        }

        function quitarEspacio($cadena){
            $aux = "";

            for ($i = 1; $i < strlen($cadena); $i++) {
                $aux = $aux . $cadena[$i];
            }

            return $aux;
        }

        function formatoConstrasena($contra){
            $bandE = 0;
            $bandn = 0;
            $bandc = 0;
            $bandM = 0;
            $bandm = 0;
            for($i=0;$i<strlen($contra);$i++){
                //verificar que tenga numeros
                if(ord($contra[$i])>=48 and ord($contra[$i])<=57){
                    $bandn ++;
                }
                //verificar que tenga caracteres especiales
                if((ord($contra[$i]) >=32) and (ord($contra[$i]) <=47 or ord($contra[$i])>=58) and (ord($contra[$i])<=64 or ord($contra[$i])>=91) and (ord($contra[$i])<=96 or ord($contra[$i])>=123)){
                    $bandc ++;
                }
                //verificar que tenga mayusculas
                if(ord($contra[$i])>=65 and ord($contra[$i])<=90){
                    $bandM ++;
                }
                //verificar que tenga minusculas
                if(ord($contra[$i])>=97 and ord($contra[$i])<=122){
                    $bandm ++;
                }
            }

            if($bandE!=0 or $bandn == 0 or $bandc == 0 or $bandm == 0 or $bandM == 0){
                // $this->in->alertas("validacion", 'Datos inválidos', 'La contraseña debe contener números, mayúsculas, minúsculas y caracteres especiales');
                return "no";
            }else{
                return "si";
            }
        }
    }

    $obj = new Trabajador();
    $obj -> registrar();
?>