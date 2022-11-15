<?php
$usuario = $_GET['user'];
$nombre = $_GET['nombre'];
$paterno = $_GET['pat'];
$materno = $_GET['mat'];
$correo = $_GET['correo'];
$usuario = $_GET['user'];
$telefono = $_GET['tel'];
$contra = $_GET['contra'];
$calle = $_GET['calle'];
$numero = $_GET['num'];
$colonia = $_GET['colonia'];
$estado = $_GET['estado'];
$municipio = $_GET['mun'];
$cp = $_GET['cp'];
?>

<!-- Interfaz para REGISTRO DE LA TARJETA -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar tu cuenta</title>
    <link rel="stylesheet" href="css/registroTarjeta.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar container">
            <img src="css/assets/Logo_Integrado.svg" required class="logo" id="logo">
        </nav>
    </header>

    <section class="waves">
        <div class="bgcolor"></div>
        <div class="wave w1"></div>
    </section>

    <section class="container-all">
        <article class="contenedor">
            <div class="pruebaContenedor">
                <!-- Tarjeta -->
                <article class="tarjeta" id="tarjeta">

                    <div class="delantera">
                        <div class="logo-marca" id="logo-marca"></div>
                        <img src="css/assets/logos-banco/chip-tarjeta.png" class="chip" alt="">
                        <div class="datos">

                            <div class="grupo" id="numero">
                                <p class="label">Número de Tarjeta</p>
                                <p class="numero">XXXX - XXXX - XXXX - XXXX</p>
                            </div>

                            <div class="flexbox">
                                <div class="grupo" id="nombre">
                                    <p class="label">Nombre del propietario</p>
                                    <p class="nombre">NOMBRE Y APELLIDO</p>
                                </div>

                                <div class="grupo" id="expiracion">
                                    <p class="label">Expiracion</p>
                                    <p class="expiracion"><span class="mes" id="mes">MM</span> / <span class="year" id="year">AA</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="trasera">
                        <div class="barra-magnetica"></div>
                        <div class="datos">
                            <div class="grupo" id="firma">
                                <p class="label">Firma</p>
                                <div class="firma">
                                    <p></p>
                                </div>
                            </div>

                            <div class="grupo" id="ccv" style="margin-top: 14px;">

                                <p class="label">CCV</p>
                                <p class="ccv"></p>

                            </div>
                        </div>

                        <p class="leyenda">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullamex, atque qui
                            adipisci
                            consequuntur impedit delectus harum dolor eaque assumenda iure odio magnam tempore error
                            nisi? Illo
                            quisquam aperiam alias.</p>
                        <a href="#" class="link-banco">www.tubanco.com</a>
                    </div>
                </article>
            </div>
        </article>

        <article class="login">
            <!-- Del H2 hasta el siguiente comentario es la implementación del login -->
            <div class="card-login">
                <form method="POST" action="" id="formulario">

                    <!-- auxiliares para la transmision de datos entre forms -->
                    <input type="hidden" readonly="readonly" name="usuario" id="usuario" value="<?php echo $usuario ?>">
                    <input type="hidden" readonly="readonly" name="nombre" id="nombreCliente" value="<?php echo $nombre ?>">
                    <input type="hidden" readonly="readonly" name="paterno" id="apellidoPaterno" value="<?php echo $paterno ?>">
                    <input type="hidden" readonly="readonly" name="materno" id="apellidoMaterno" value="<?php echo $materno ?>">
                    <input type="hidden" readonly="readonly" name="email" id="email" value="<?php echo $correo ?>">
                    <input type="hidden" readonly="readonly" name="telefono" id="Teléfono" value="<?php echo $telefono ?>">
                    <input type="hidden" readonly="readonly" name="contra" id="contraseña" value="<?php echo $contra ?>">
                    <input type="hidden" readonly="readonly" name="calle" id="calle" value="<?php echo $calle ?>">
                    <input type="hidden" readonly="readonly" name="numero" id="numero" value="<?php echo $numero ?>">
                    <input type="hidden" readonly="readonly" name="colonia" id="colonia" value="<?php echo $colonia ?>">
                    <input type="hidden" readonly="readonly" name="estado" id="estado" value="<?php echo $estado ?>">
                    <input type="hidden" readonly="readonly" name="municipio" id="municipio" value="<?php echo $municipio ?>">
                    <input type="hidden" readonly="readonly" name="cp" id="cp" value="<?php echo $cp ?>">

                    <!--llama a la accion de logear-->
                    <h2>CREA TU CUENTA</h2>

                    <p class="subcabecera">Agreguemos tus <span>métodos</span> de <span>pago</span>.</p>

                    <div class="cajas">
                        <!-- Caja para el nombre -->
                        <div class="input-group">
                            <input type="text" name="numeroTarjeta" id="numeroTarjeta" required class="input" maxlength="19" minlength="19">
                            <label for="numeroTarjeta" class="input-label">Número de tarjeta</label>
                        </div>

                        <div class="input-group-2">
                            <input type="text" name="nombrePropietario" id="nombrePropietario" required class="input" autocomplete="off" minlength="3">
                            <label for="nombrePropietario" class="input-label">Nombre del propietario</label>
                        </div>

                        <div class="container-fechas">
                            <div class="input-group">
                                <input type="text" name="mesCaja" id="mesCaja" required class="input" maxlength="2" minlength="2">
                                <label for="mesCaja" class="input-label">Mes de expiración</label>
                            </div>

                            <div class="input-group-2">
                                <input type="text" name="yearCaja" id="yearCaja" required class="input" maxlength="2" minlength="2">
                                <label for="yearCaja" class="input-label">Año de expiración</label>
                            </div>


                            <div class="input-group">
                                <input type="text" name="ccvCaja" id="ccvCaja" required class="input" maxlength="3" minlength="3">
                                <label for="ccvCaja" class="input-label">CCV</label>
                            </div>
                        </div>

                    </div>
                    <input type="submit" name="siguiente" id="siguiente" value="Finalizar" class="btn-enviar" id="btn-enviar">
                </form>
            </div>
        </article>
        <script src="js/registroTarjeta.js"></script>
        <script src="js/alertasTarjeta.js"></script>
    </section>
    <script src="js/linkHome.js"></script>
</body>

</html>