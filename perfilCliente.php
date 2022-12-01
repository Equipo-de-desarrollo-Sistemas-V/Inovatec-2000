<?php
error_reporting(0);
session_start();
$sesion_i = $_SESSION["Usuario"];

$serverName='inovatecserver.database.windows.net';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 

$query= "SELECT* FROM Persona where usuario ='".$sesion_i."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$nombre=$row['nombres'];
$aP=$row['ap_paterno'];
$aM=$row['ap_materno'];
$email=$row['email'];
$telefono=$row['telefono'];

$query ="SELECT colonia, calle, no_calle, codigo_postal, municipios.municipio, municipios.Id_Municipios, estados.Estado, estados.Id
FROM Direccion, estados_municipios, estados, municipios
WHERE Ciudad_Estado=estados_municipios.id and
estados_municipios.estados_id = estados.id and
estados_municipios.municipios_id = municipios.Id_Municipios and
Usuario ='".$sesion_i."'";
  $resultado=sqlsrv_query($con, $query);
  $row = sqlsrv_fetch_array($resultado);
  $colonia=$row['colonia'];
  $calle=$row['calle'];
  $no_calle=$row['no_calle'];
  $cp=$row['codigo_postal'];
  $municipioS=$row['municipio'];
  $estadoS=$row['Estado'];
  $auxEst=$row['Id'];
  $auxMun=$row['Id_Municipios'];


$query= "SELECT * FROM Tarjetas where usuario ='".$sesion_i."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);

if($row != null){
    $nombreTar = $row['Nombre_Tar'];
    $noTar = $row['no_tarjeta'];
    $mes = $row['fecha_ven_mes'];
    $anio = $row['fecha_ven_anio'];
}

else{
    $nombreTar = "";
    $noTar = "";
    $mes = "";
    $anio = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/prefilcCliente.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script languaje="javascript">
        $(document).ready(function(){
            $("#estado").change(function(){
                $("#estado option:selected").each(function(){
                    Id=$(this).val();
                    $.post("getMunicipio.php", {Id: Id}, function(data){
                        $("#municipio").html(data);
                    });
                });
            })
        });

    </script>

</head>


<body>
    <header>
        <nav class="navbar container">
            <img src="css/assets/Logo_Integrado.svg" required class="logo" id="logo">
            <input type="checkbox" id="toggler">
            <label for="toggler"><i class="ri-menu-line"></i></label>
            <div class="menu">
                <!-- <ul class="list"> -->
            <?php 
             //$_SESSION["Usuario"] = $arreClien['Usuario'];
			//echo ucwords("Bienvenido") . " " . ucwords($_SESSION['Usuario']);?>
                    <a class="btn-cerrar-session btn" href="cerrar_cli.php" type="button">Cerrar Sesión</a>
                <!-- </ul> -->
            </div>
        </nav>
    </header>

    <section class="waves">
        <div class="bgcolor"></div>
        <div class="wave w1"></div>
    </section>

    <section class="container-all">

        <article id="container-datos-usuario" class="contenedor">

            <h3 id="subtitulo">Mis datos</h3>

            <p class="leyenda-1">Modifica tu <span>nombre</span> o apellidos por si tienes algún error.</p>

            <form id="formulario" action="" method="post" class="formulario">
                
                <div class="entrada-2">
                    <div class="input-group">
                        <input type="text" name="nombreCliente" id="nombreCliente" required class="input" maxlength="40" value="<?php echo $nombre;?>">
                        <label for="nombre-cliente" class="input-label">Nombre</label>
                        
                    </div>

                    <div class="input-group">
                        <input type="text" name="apellidoPaterno" id="apellidoPaterno" required class="input" maxlength="20" value="<?php echo $aP;?>">
                        <label for="apellido-paterno" class="input-label">Apellido paterno</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="apellidoMaterno" id="apellidoMaterno" class="input" maxlength="20"value="<?php echo $aM;?>">
                        <label for="apellido-paterno" class="input-label">Apellido paterno</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="telefono" id="telefono" required class="input" maxlength="10" minlength="10" value="<?php echo $telefono;?>">
                        <label for="telefono" class="input-label">Teléfono</label>
                    </div>

                    <div class="input-group">
                        <input type="email" name="correo" id="correo" required class="input" maxlength="255" value="<?php echo $email;?>">
                        <label for="correo" class="input-label">Correo</label>
                    </div>

                </div>

                <input type="button" name="boton1" id="boton1" value="Actualizar datos" class="btn" onclick="datosPersonales();">
                <br>
                <br>
                <br>

            <h3 id="subtitulo">Mi dirección</h3>

            <p class="leyenda-1">Actualiza tu <span>dirección</span> para saber a donde enviar tus <span>pedidos</span>.</p>

                <div class="entrada-2">
                    <div class="input-group">
                        <input type="text" name="calle" id="calle" required class="input" maxlength="20" value="<?php echo $calle;?>">
                        <label for="calle" class="input-label">Calle</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="numero" id="numero" required class="input" maxlength="10" value="<?php echo $no_calle;?>">
                        <label for="numero" class="input-label">Número</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="colonia" id="colonia" required class="input" maxlength="20"  value="<?php echo $colonia;?>">
                        <label for="colonia" class="input-label">Colonia</label>
                    </div>

                    <div class="input-group">
                    <select name="estado" id="estado" name="estado" class="estado">
                    <option value="<?php echo $auxEst;?>"><?php echo $estadoS;?></option>
                                <?php
                                $serverName='inovatecserver.database.windows.net';
                                $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
                                $con = sqlsrv_connect($serverName, $connectionInfo); 
                                
                                $query = "SELECT Id, Estado FROM estados";
                                $resultado = sqlsrv_query($con, $query);

                                    while($row = sqlsrv_fetch_array($resultado)){?>
                                        <option value="<?php echo $row['Id'];?>"><?php echo $row['Estado'];?></option>
                                <?php } ?>
                            </select>
                    </div>

                    <div class="input-group">
                            <select name="municipio" id="municipio" class="municipio">
                                <option value="<?php echo $auxMun;?>"><?php echo $municipioS;?></option>
                            </select>
                    </div>
                    
                    <div class="input-group">
                        <input type="text" name="codigoPostal" id="codigoPostal" required class="input" 
                        maxlength="5" minlength="5" value="<?php echo $cp;?>">
                        <label for="codigo-postal" class="input-label">Código postal</label>
                    </div>

                </div>

                <input type="button" id="boton2" name="boton2" value="Actualizar mi direccón" class="btn" onclick="datosDireccion();">
                <br>
                <br>
                <br>

            <h3 id="subtitulo">Cambiar contraseña</h3>

            <p class="leyenda-1">Manten tu <span>contraseña</span> actualizada en todo <span>momento</span>.</p>
            <p class="leyenda-2">Evita ser <span>víctima</span> del robo de tu <span>cuenta</span>.</p>

                <div class="entrada-1">
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="input" required>
                        <label for="password" class="input-label">Contraseña actual</label>
                    </div>

                    <div class="input-group">
                        <input type="password" name="newPassword" id="newPassword" class="input" required>
                        <label for="newPassword" class="input-label">Nueva contraseña</label>
                    </div>

                    <div class="input-group">
                        <input type="password" name="confirmPassword" id="confirmPassword" class="input" required>
                        <label for="confirmPassword" class="input-label">Confirmar contraseña</label>
                    </div>
                </div>

                <input type="button" id="boton3" name="boton3" value="Actualizar contraseña" class="btn" onclick="datosContra();">
                <br>
                <br>
                <br>

            <h3 id="subtitulo">Mis datos bancarios</h3>
            <p class="leyenda-1"><span>Actualiza</span> los campos de tu poderosa <span>tarjeta</span>.</p>

                <div class="entrada-2">
                    <div class="input-group">
                        <input type="text" name="nombreTarjeta" id="nombreTarjeta" required class="input" maxlength="100" minlength="3" value="<?php echo $nombreTar;?>">
                        <label for="nombre-tarjeta" class="input-label">Nombre en la tarjeta</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="numeroTarjeta" id="numeroTarjeta" required class="input" maxlength="16"  value="<?php echo $noTar;?>">
                        <label for="numero-tarjeta" class="input-label">Número de tarjeta</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="monthExpiracion" id="monthExpiracion" required class="input" maxlength="2" minlength="2" value="<?php echo $mes;?>">
                        <label for="month-expiracion" class="input-label">Mes de expiración</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="yearExpiracion" id="yearExpiracion" required class="input"maxlength="2" minlength="2"  value="<?php echo $anio;?>">
                        <label for="year-expiracion" class="input-label">Año de expiración</label>
                    </div>
                </div>

                <input type="button" name="boton4" id="boton4" value="Actualizar datos bancarios" class="btn" onclick="datosBanco();">
                <br>
                <br>
                <br>

            <h3 id="subtitulo">Eliminar cuenta</h3>

            <p class="leyenda-1">¿Deseas <span>eliminar</span> todos los datos asociados a esta <span>cuenta</span>?
            </p>
            <p class="leyenda-2">Se <span>perderán</span> para siempre. Eso es mucho <span>tiempo</span>.</p>

            <div class="entrada-3">
                    <div class="input-group">
                        <input type="password" name="deletePassword" id="deletePassword" class="input" required>
                        <label for="deletePassword" class="input-label">Contraseña</label>
                    </div>

                    <div class="input-group">
                        <input type="password" name="confirmDeletePassword" id="confirmDeletePassword" class="input" required>
                        <label for="confirmDeletePassword" class="input-label">Confirmar contraseña</label>
                    </div>
                </div>

                <input type="button" id="boton5" name="boton5" value="Eliminar cuenta" class="btn" onclick="datosEliminar();">
                <br>
            </form>
        </article>
        <script src="js/validPerfil.js"></script>
    </section>
    <script src="js/linkHome.js"></script>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#estado').select2();
    });
    $(document).ready(function(){
        $('#municipio').select2();
    });
</script>

<script>
    function datosPersonales(){
        var nombreCliente=document.getElementById("nombreCliente").value;
        var apellidoPaterno=document.getElementById("apellidoPaterno").value;
        var apellidoMaterno=document.getElementById("apellidoMaterno").value;
        var telefono=document.getElementById("telefono").value;
        var correo=document.getElementById("correo").value;
        $.ajax({
            type: "POST",
            url: "logPerfilPersonal.php",
            dataType: "json",
            data: {"nombreCliente":nombreCliente, "apellidoPaterno":apellidoPaterno, "apellidoMaterno":apellidoMaterno, "telefono":telefono, "correo":correo},
            success: function(data){
                alert(data)
            }
        });
    }

    function datosDireccion(){
        var calle=document.getElementById("calle").value;
        var numero=document.getElementById("numero").value;
        var colonia=document.getElementById("colonia").value;
        var estado=document.getElementById("estado").value;
        var municipio=document.getElementById("municipio").value;
        var codigoPostal=document.getElementById("codigoPostal").value;
        //alert($calle, $numero, $colonia, $estado, $municipio, $codigoPostal)
        
        $.ajax({
            type: "POST",
            url: "logPerfilDireccion.php",
            dataType: "json",
            data: {"calle":calle, "numero":numero, "colonia":colonia, "estado":estado, "municipio":municipio, "codigoPostal":codigoPostal},
            success: function(data){
                alert(data)
            }
        });
    }

    function datosContra(){
        var passwordS=document.getElementById("password").value;
        var newPasswordS=document.getElementById("newPassword").value;
        if (passwordS==""){
            password.style.border = "3px solid red";
            //boton3.disabled=false;
	    }else{
            password.removeAttribute("style");
            //boton3.disabled=true;
        }
        if (passwordS!="" && newPasswordS!=""){
            $.ajax({
            type: "POST",
            url: "logPerfilContraseña.php",
            dataType: "json",
            data: {"password":passwordS, "newPassword":newPasswordS},
            success: function(data){
                alert(data)
                if (data=="Contraseña actualizada exitosamente"){
                    document.getElementById("password").value = "";
                    document.getElementById("newPassword").value = "";
                    document.getElementById("confirmPassword").value = "";
                }
                
            }
        });
	    }   
    }

    function datosBanco(){
        var nombreTarjeta=document.getElementById("nombreTarjeta").value;
        var numeroTarjeta=document.getElementById("numeroTarjeta").value;
        var monthExpiracion=document.getElementById("monthExpiracion").value;
        var yearExpiracion=document.getElementById("yearExpiracion").value;
        $.ajax({
            type: "POST",
            url: "logPerfilBanco.php",
            dataType: "json",
            data: {"nombreTarjeta":nombreTarjeta, "numeroTarjeta":numeroTarjeta, "monthExpiracion":monthExpiracion, "yearExpiracion":yearExpiracion},
            success: function(data){
                alert(data)
            }
        });
    }

    function datosEliminar(){
        var passwordE=document.getElementById("deletePassword").value;
        if (passwordE==""){
            deletePassword.style.border = "3px solid red";
            boton5.disabled=true;
	    }else{
            deletePassword.removeAttribute("style");
            //boton3.disabled=true;
        }
        console.log("Eliminar")
        if (passwordE!=""){
            console.log("Eliminarsssssssssss")
            
            $.ajax({
            type: "POST",
            url: "logPerfilEliminar.php",
            dataType: "json",
            data: {"deletePassword":passwordE},
            success: function(data){
                if (data=="Confirmar eliminar"){
                    var respuesta=confirm("¿Estas seguro que deseas eliminar tu cuenta?");
                    if(respuesta==true){
                        location.href="eliminarCuenta.php";
                    }else{
                        document.getElementById("deletePassword").value = "";
                        document.getElementById("confirmDeletePassword").value = "";
                    }
                }else{
                    alert(data)
                }
                
            }
        }); 
	    }  
    }
</script>

