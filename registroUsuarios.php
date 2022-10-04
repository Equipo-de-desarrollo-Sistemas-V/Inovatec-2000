<!-- Interfaz para REGISTRAR EL USUARIO-CREAR CUENTA -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar tu cuenta</title>
  <link rel="stylesheet" href="css/registroUsuarios.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="navbar container">
      <img src="css/assets/Logo_Integrado.svg" required class="logo">
    </nav>
  </header>

  <section class="waves">
    <div class="bgcolor"></div>
    <div class="wave w1"></div>
  </section>

  <section class="container-all">
    <article class="login">
      <!-- Del H2 hasta el siguiente comentario es la implementación del login -->
      <div class="card-login">
        <form method="POST" action="validacionesUsuario.php" id="formulario">
          <!--llama a la accion de logear-->
          <h2>CREA TU CUENTA</h2>

          <p class="subcabecera">Comencemos creando una <span>cuenta</span> para <span>ti</span>.</p>

          <div class="cajas">
            <!-- Caja para el nombre -->
            <div class="input-group">
              <input type="text" name="nombre-cliente" id="nombre-cliente" required class="input" autocomplete="off">
              <label for="nombreCliente" class="input-label">Nombre</label>
            </div>

            <div class="input-group-2">
              <input type="text" name="apellido-paterno" id="apellido-paterno" required class="input" autocomplete="off">
              <label for="apellido-paterno" class="input-label">Apellido paterno</label>
            </div>

            <div class="input-group">
              <input type="text" name="apellido-materno" id="apellido-materno" required class="input" autocomplete="off">
              <label for="apellido-materno" class="input-label">Apellido materno</label>
            </div>

            <div class="input-group-2">
              <input type="email" name="email" id="email" required class="input" autocomplete="off">
              <label for="email" class="input-label">Correo electrónico</label>
            </div>

            <div class="input-group">
              <input type="text" name="Teléfono" id="Teléfono" required class="input" autocomplete="off">
              <label for="Teléfono" class="input-label">Teléfono</label>
            </div>

            <div class="input-group-2">
              <input type="text" name="usuario" id="usuario" required class="input" autocomplete="off">
              <label for="usuario" class="input-label">Usuario</label>
            </div>

          </div>
          <input type="submit" value="Siguiente" class="btn-login">
          <p class="recuperar">¿Has perdido tu cuenta? <a class="metodos-recuperacion" href="recuperarCorreo.php">Recuperar
              contraseña</a></p>
        </form>
      </div>
    </article>
  </section>

  <script src="js/alertasUsuario.js"> </script>
  
</body>

</html>