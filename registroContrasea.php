<?php
$usuario = $_GET['user'];
$nombre = $_GET['nombre'];
$paterno = $_GET['pat'];
$materno = $_GET['mat'];
$correo = $_GET['correo'];
$usuario = $_GET['user'];
$telefono = $_GET['tel'];

?>

<!-- Interfaz para GUARDAR CONTRASEÑA -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar tu cuenta</title>
  <link rel="stylesheet" href="css/crearAcount.css">
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

    <article class="image">
      <img src="css/assets/my-password-animate.svg" alt="logo">
    </article>

    <article class="login">
      <!-- Del H2 hasta el siguiente comentario es la implementación del login -->
      <div class="card-login">
        <form method="POST" action="validacionesContra.php" id="formulario">

          <!--auxiliares para parar datos entre formularios -->
          <input type="hidden" readonly="readonly" id="usuario" value="<?php echo $usuario ?>">
          <input type="hidden" readonly="readonly" id="nombreCliente" value="<?php echo $nombre ?>">
          <input type="hidden" readonly="readonly" id="apellidoPaterno" value="<?php echo $paterno ?>">
          <input type="hidden" readonly="readonly" id="apellidoMaterno" value="<?php echo $materno ?>">
          <input type="hidden" readonly="readonly" id="email" value="<?php echo $correo ?>">
          <input type="hidden" readonly="readonly" id="Teléfono" value="<?php echo $telefono ?>">

          <!--llama a la accion de logear-->
          <h2>CREA TU CUENTA</h2>

          <p class="subcabecera">Creemos una <span>contraseña</span> para tu <span>cuenta</span>.</p>

          <div class="input-group">
            <input type="password" name="contraseña" id="contraseña" required class="input" autocomplete="off">
            <label for="contraseña" class="input-label">Contraseña</label>
          </div>

          <div class="input-group">
            <input type="password" name="confirmar" id="confirmar" required class="input" autocomplete="off">
            <label for="confirmar-contraseña" class="input-label">Confirmar contraseña</label>
          </div>

          <input type="submit" name="siguiente" id="siguiente" value="Siguiente ->" class="btn-login">
        </form>
      </div>
    </article>
  </section>
  <script src="js/validRegContra.js"></script>
  <script src="js/alertasContra.js"> </script>
  <script src="js/linkHome.js"></script>
</body>

</html>