<?php
$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 
$ingreso="Retzat";
$query= "SELECT* FROM Persona where usuario ='".$ingreso."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$nombre=$row['nombres'];
$aP=$row['ap_paterno'];
$aM=$row['ap_materno'];
$email=$row['email'];
$contra=$row['Contra_us'];

$query= "SELECT* FROM Direccion where usuario ='".$ingreso."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$colonia=$row['colonia'];
$calle=$row['calle'];
$no_calle=$row['no_calle'];
$telefono=$row['telefono'];
$cp=$row['codigo_postal'];
$auxRela=$row['Ciudad_Estado'];
echo $auxRela;

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

$query= "SELECT* FROM Tarjetas where usuario ='".$ingreso."'";
$resultado=sqlsrv_query($con, $query);
$row = sqlsrv_fetch_array($resultado);
$nombreTar=$row['Nombre_Tar'];
$noTar=$row['no_tarjeta'];
$mes=$row['fecha_ven_mes'];
$anio=$row['fecha_ven_anio'];
?>


<!-- Interfaz para PERFIL CLIENTE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/prefilcCliente.css">
</head>

<body>
    <header>
        <nav class="navbar container">
            <img src="css/assets/Logo_Integrado.svg" required class="logo">
            <input type="checkbox" id="toggler">
            <label for="toggler"><i class="ri-menu-line"></i></label>
            <div class="menu">
                <ul class="list">
            <?php 
			echo ucwords("Bienvenido") . " " . ucwords($_SESSION['Usuario']);?>
                    <a class="btn-cerrar-session" href="cerrar.php" type="button">Cerrar Sesión</a>
                </ul>
            </div>
        </nav>
    </header>

    <section class="waves">
        <div class="bgcolor"></div>
        <div class="wave w1"></div>
    </section>

    <section class="container-all">
        <article id="datos-pagina" class="contenedor-titulos">
            <h1 id="subtitulo">Perfil del usuario</h1>
            <p>Gestiona todos los <span>datos</span> de tu <span>cuenta</span> desde aquí</p>
            <article class="menu">
                <a href="#container-datos-usuario">Mis datos</a>
                <a href="#container-datos-direccion">Mi dirección</a>
                <a href="#container-passwords">Mi contraseña</a>
                <a href="#container-datos-bancarios">Mis tarjetas</a>
                <a href="#container-eliminar-cuenta">Eliminar mi cuenta</a>
            </article>
        </article>

        <article id="container-datos-usuario" class="contenedor">

            <h3 id="subtitulo">Mis datos</h3>

            <p class="leyenda-1">Modifica tu <span>nombre</span> o apellidos por si tienes algún error.</p>

            <form id="formulario" action="logPerfilUsua.php" method="post" class="formulario">

                <div class="entrada-2">
                    <div class="input-group">
                        <input type="text" name="nombre-cliente" id="nombre-cliente" required class="input" value=<?php echo $nombre;?>>
                        <label for="nombre-cliente" class="input-label">Nombre</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="apellido-paterno" id="apellido-paterno" required class="input" value=<?php echo $aP;?>>
                        <label for="apellido-paterno" class="input-label">Apellido paterno</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="apellido-materno" id="apellido-materno" required class="input" value=<?php echo $aM;?>>
                        <label for="apellido-paterno" class="input-label">Apellido paterno</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="telefono" id="telefono" required class="input" value=<?php echo $telefono;?>>
                        <label for="telefono" class="input-label">Teléfono</label>
                    </div>

                    <div class="input-group">
                        <input type="email" name="correo" id="correo" required class="input" value=<?php echo $email;?>>
                        <label for="correo" class="input-label">Correo</label>
                    </div>

                </div>

                <input type="submit" name="boton1" value="Actualizar datos" class="btn">
            </form>
        </article>

        <article id="container-datos-direccion" class="contenedor">
            <h3 id="subtitulo">Mi dirección</h3>

            <p class="leyenda-1">Actualiza tu <span>dirección</span> para saber a donde enviar tus <span>pedidos</span>.
            </p>

            <form id="formularioD" action="logPerfilDir.php" method="post" class="formulario">

                <div class="entrada-2">
                    <div class="input-group">
                        <input type="text" name="calle" id="calle" required class="input" value=<?php echo $calle;?>>
                        <label for="calle" class="input-label">Calle</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="numero" id="numero" required class="input" value=<?php echo $no_calle;?>>
                        <label for="numero" class="input-label">Número</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="colonia" id="colonia" required class="input" value=<?php echo $colonia;?>>
                        <label for="colonia" class="input-label">Colonia</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="municipio" id="municipio" required class="input" value=<?php echo $municipio;?>>
                        <label for="municipio" class="input-label">Municipio</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="estado" id="estado" required class="input" value=<?php echo $estado;?>>
                        <label for="estado" class="input-label">Estado</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="codigo-postal" id="codigo-postal" required class="input" value=<?php echo $cp;?>>
                        <label for="codigo-postal" class="input-label">Código postal</label>
                    </div>

                </div>

                <input type="submit" name="boton2" value="Actualizar mi direccón" class="btn">
            </form>
        </article>

        <article id="container-passwords" class="contenedor">
            <h3 id="subtitulo">Cambiar contraseña</h3>

            <p class="leyenda-1">Manten tu <span>contraseña</span> actualizada en todo <span>momento</span>.</p>
            <p class="leyenda-2">Evita ser <span>víctima</span> del robo de tu <span>cuenta</span>.</p>

            <form id="formularioC" action="logPerfilContra.php" method="post" class="formulario">
                <div class="entrada-1">
                    <div class="input-group">
                        <input type="password" name="password" id="password" required class="input" value=<?php echo $contra;?>>
                        <label for="password" class="input-label">Contraseña actual</label>
                    </div>

                    <div class="input-group">
                        <input type="password" name="new-password" id="new-password" required class="input">
                        <label for="new-password" class="input-label">Nueva contraseña</label>
                    </div>

                    <div class="input-group">
                        <input type="password" name="confirm-password" id="confirm-password" required class="input">
                        <label for="confirm-password" class="input-label">Confirmar contraseña</label>
                    </div>
                </div>

                <input type="submit" name="boton3" value="Actualizar contraseña" class="btn">
            </form>
        </article>

        <article id="container-datos-bancarios" class="contenedor">
            <h3 id="subtitulo">Mis datos bancarios</h3>

            <p class="leyenda-1"><span>Actualiza</span> los campos de tu poderosa <span>tarjeta</span>.</p>

            <form id="formularioB" action="logPerfilBanco.php" method="post" class="formulario">

                <div class="entrada-2">
                    <div class="input-group">
                        <input type="text" name="nombre-tarjeta" id="nombre-tarjeta" required class="input" value=<?php echo $nombreTar;?>>
                        <label for="nombre-tarjeta" class="input-label">Nombre en la tarjeta</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="numero-tarjeta" id="numero-tarjeta" required class="input" value=<?php echo $noTar;?>>
                        <label for="numero-tarjeta" class="input-label">Número de tarjeta</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="month-expiracion" id="month-expiracion" required class="input" value=<?php echo $mes;?>>
                        <label for="month-expiracion" class="input-label">Mes de expiración</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="year-expiracion" id="year-expiracion" required class="input" value=<?php echo $anio;?>>
                        <label for="year-expiracion" class="input-label">Año de expiración</label>
                    </div>
                    <div class="input-group">
                        <input type="text" name="ccv" id="ccv" required class="input">
                        <label for="ccv" class="input-label">CCV</label>
                    </div>
                </div>

                <input type="submit" name="boton4" value="Actualizar tarjeta" class="btn">
            </form>
        </article>

        <article id="container-eliminar-cuenta" class="contenedor">
            <h3 id="subtitulo">Eliminar cuenta</h3>

            <p class="leyenda-1">¿Deseas <span>eliminar</span> todos los datos asociados a esta <span>cuenta</span>?
            </p>
            <p class="leyenda-2">Se <span>perderán</span> para siempre. Eso es mucho <span>tiempo</span>.</p>

            <form id="formularioE" action="logicaPerfil.php" method="post" class="formulario">
                <div class="entrada-3">
                    <div class="input-group">
                        <input type="delete-password" name="delete-password" id="delete-password" required
                            class="input">
                        <label for="delete-password" class="input-label">Contraseña</label>
                    </div>

                    <div class="input-group">
                        <input type="confirm-delete-password" name="confirm-delete-password"
                            id="confirm-delete-password" required class="input">
                        <label for="confirm-delete-password" class="input-label">Confirmar contraseña</label>
                    </div>
                </div>

                <input type="submit" value="Eliminar cuenta" class="btn">
            </form>
        </article>
        <script src="js/alertasPerfilUsua.js"></script>
        <script src="js/alertasPerfilDir.js"></script>
        <script src="js/alertasPerfilContra.js"></script>
        <script src="js/alertasPerfilBanco.js"></script>
        <script src="js/alertasPerfilElim.js"></script>
    </section>
</body>

</html>