<?php
$file = fopen("archivo_correo.txt", "r");
$auxIngreso = fgets($file);
fclose($file);

$ingreso ="";
for ($i=0;$i<strlen($auxIngreso)-2;$i++){
    $ingreso= $ingreso.$auxIngreso[$i];
}

$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 

$query= "SELECT* FROM Persona where usuario ='".$ingreso."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$nombre=$row['nombres'];
$aP=$row['ap_paterno'];
$aM=$row['ap_materno'];
$email=$row['email'];
//echo $nombre;
//$nombre=strtr($auxNombre, " ", "_");

$query= "SELECT* FROM Direccion where usuario ='".$ingreso."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$colonia=$row['colonia'];
$calle=$row['calle'];
$no_calle=$row['no_calle'];
$telefono=$row['telefono'];
$cp=$row['codigo_postal'];
$auxRela=$row['Ciudad_Estado'];

$query= "SELECT* FROM estados_municipios where id ='".$auxRela."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$auxMun=$row['municipios_id'];
$auxEst=$row['estados_id'];

$query= "SELECT* FROM municipios where Id_Municipios ='".$auxMun."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$municipio=$row['municipio'];

$query= "SELECT* FROM estados where id ='".$auxEst."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$estado=$row['Estado'];

$query= "SELECT * FROM Tarjetas where usuario ='".$ingreso."'";
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
            <img src="css/assets/Logo_Integrado.svg" required class="logo">
            <input type="checkbox" id="toggler">
            <label for="toggler"><i class="ri-menu-line"></i></label>
            <div class="menu">
                <!-- <ul class="list"> -->
            <?php 
            session_start();
             //$_SESSION["Usuario"] = $arreClien['Usuario'];
			echo ucwords("Bienvenido") . " " . ucwords($_SESSION['Usuario']);?>
                    <a class="btn-cerrar-session" href="cerrar.php" type="button">Cerrar Sesión</a>
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
                        <input type="text" name="nombreCliente" id="nombreCliente" required class="input" maxlength="40" value=<?php echo $nombre;?>>
                        <label for="nombre-cliente" class="input-label">Nombre</label>
                        
                    </div>

                    <div class="input-group">
                        <input type="text" name="apellidoPaterno" id="apellidoPaterno" required class="input" maxlength="20" value=<?php echo $aP;?>>
                        <label for="apellido-paterno" class="input-label">Apellido paterno</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="apellidoMaterno" id="apellidoMaterno" required class="input" maxlength="20"value=<?php echo $aM;?>>
                        <label for="apellido-paterno" class="input-label">Apellido paterno</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="telefono" id="telefono" required class="input" maxlength="10" minlength="10" value=<?php echo $telefono;?>>
                        <label for="telefono" class="input-label">Teléfono</label>
                    </div>

                    <div class="input-group">
                        <input type="email" name="correo" id="correo" required class="input" maxlength="255" value=<?php echo $email;?>>
                        <label for="correo" class="input-label">Correo</label>
                    </div>

                </div>

                <br>
                <br>
                <br>
                <!-- <input type="submit" name="boton1" value="Actualizar datos" class="btn"> -->

            <h3 id="subtitulo">Mi dirección</h3>

            <p class="leyenda-1">Actualiza tu <span>dirección</span> para saber a donde enviar tus <span>pedidos</span>.</p>

                <div class="entrada-2">
                    <div class="input-group">
                        <input type="text" name="calle" id="calle" required class="input" maxlength="20" value=<?php echo $calle;?>>
                        <label for="calle" class="input-label">Calle</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="numero" id="numero" required class="input" maxlength="10" value=<?php echo $no_calle;?>>
                        <label for="numero" class="input-label">Número</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="colonia" id="colonia" required class="input" maxlength="20"  value=<?php echo $colonia;?>>
                        <label for="colonia" class="input-label">Colonia</label>
                    </div>

                    <div class="input-group">
                    <select name="estado" id="estado" name="estado" class="estado">
                    <option value="<?php echo $auxEs;?>"><?php echo $estado;?></option>
                                <?php
                                $serverName='localhost';
                                $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
                                $con = sqlsrv_connect($serverName, $connectionInfo); 
                                
                                $query = "SELECT Id, Estado FROM estados";
                                $resultado = sqlsrv_query($con, $query);

                                    while($row = sqlsrv_fetch_array($resultado)){?>
                                        <option value="<?php echo $row['Id'];?>"><?php echo $row['Estado'];?></option>
                                <?php } ?>
                            </select>
                        <!-- <input type="text" name="estado" id="estado" required class="input" value=
                        //?php echo $estado;?>>
                        <label for="estado" class="input-label">Estado</label> -->
                    </div>

                    <div class="input-group">
                            <select name="municipio" id="municipio" class="municipio">
                                <option value="<?php echo $auxMun;?>"><?php echo $municipio;?></option>
                                
                                <!-- Generar aquí el contenido de las ciudades -->
                            </select>
                        <!-- <input type="text" name="municipio" id="municipio" required class="input" value=
                        //</?p//hp echo $municipio;?>>
                        <label for="municipio" class="input-label">Municipio</label> -->


                    </div>

                    

                    <div class="input-group">
                        <input type="text" name="codigoPostal" id="codigoPostal" required class="input" 
                        maxlength="5" minlength="5" value=<?php echo $cp;?>>
                        <label for="codigo-postal" class="input-label">Código postal</label>
                    </div>

                </div>

                <!-- <input type="submit" name="boton2" value="Actualizar mi direccón" class="btn"> -->
                <br>
                <br>
                <br>

            <h3 id="subtitulo">Cambiar contraseña</h3>

            <p class="leyenda-1">Manten tu <span>contraseña</span> actualizada en todo <span>momento</span>.</p>
            <p class="leyenda-2">Evita ser <span>víctima</span> del robo de tu <span>cuenta</span>.</p>

                <div class="entrada-1">
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="input">
                        <label for="password" class="input-label">Contraseña actual</label>
                    </div>

                    <div class="input-group">
                        <input type="password" name="new-password" id="new-password" class="input">
                        <label for="new-password" class="input-label">Nueva contraseña</label>
                    </div>

                    <div class="input-group">
                        <input type="password" name="confirm-password" id="confirm-password" class="input">
                        <label for="confirm-password" class="input-label">Confirmar contraseña</label>
                    </div>
                </div>

                <!-- <input type="submit" name="boton3" value="Actualizar contraseña" class="btn"> -->
                <br>
                <br>
                <br>

            <h3 id="subtitulo">Mis datos bancarios</h3>
            <p class="leyenda-1"><span>Actualiza</span> los campos de tu poderosa <span>tarjeta</span>.</p>

                <div class="entrada-2">
                    <div class="input-group">
                        <input type="text" name="nombreTarjeta" id="nombreTarjeta" required class="input" maxlength="100" minlength="3" value=<?php echo $nombreTar;?>>
                        <label for="nombre-tarjeta" class="input-label">Nombre en la tarjeta</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="numeroTarjeta" id="numeroTarjeta" required class="input" maxlength="16"  value=<?php echo $noTar;?>>
                        <label for="numero-tarjeta" class="input-label">Número de tarjeta</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="monthExpiracion" id="monthExpiracion" required class="input" maxlength="2" minlength="2" value=<?php echo $mes;?>>
                        <label for="month-expiracion" class="input-label">Mes de expiración</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="yearExpiracion" id="yearExpiracion" required class="input"maxlength="2" minlength="2"  value=<?php echo $anio;?>>
                        <label for="year-expiracion" class="input-label">Año de expiración</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="ccv" id="ccv" class="input" maxlength="3" minlength="3">
                        <label for="ccv" class="input-label">CCV</label>
                    </div>
                </div>

                <input type="submit" name="boton4" id="boton4" value="Actualizar" class="btn" disabled>
                <br>
                <br>
                <br>

            <h3 id="subtitulo">Eliminar cuenta</h3>

            <p class="leyenda-1">¿Deseas <span>eliminar</span> todos los datos asociados a esta <span>cuenta</span>?
            </p>
            <p class="leyenda-2">Se <span>perderán</span> para siempre. Eso es mucho <span>tiempo</span>.</p>

            <div class="entrada-3">
                    <div class="input-group">
                        <input type="password" name="delete-password" id="delete-password"
                            class="input">
                        <label for="delete-password" class="input-label">Contraseña</label>
                    </div>

                    <div class="input-group">
                        <input type="password" name="confirm-delete-password"
                            id="confirm-delete-password" class="input">
                        <label for="confirm-delete-password" class="input-label">Confirmar contraseña</label>
                    </div>
                </div>

                <input type="submit" value="Eliminar cuenta" class="btn">

            </form>
        </article>
        <script src="js/alertasPerfil.js"></script>
        <script src="js/validPerfil.js"></script>
    </section>
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