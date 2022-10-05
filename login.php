<!-- Interfaz para login -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesion</title>
  <link rel="stylesheet" href="css/login.css">
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
    <!-- Este article es para la implementación del vector svg animado -->
    <article class="image">
      <img src="css/assets/security-animate_yelow.svg" alt="logo">
    </article>

    <article class="login">
      <!-- Del H2 hasta el siguiente comentario es la implementación del login -->
      <div class="card-login">
        <form action="logicaLogin.php" method="POST" id="formulario">
          <!--llama a la accion de logear-->
          <h2>INICIO DE SESIÓN</h2>

          <p class="subcabecera">Es <span>rápido</span>, <span>fácil</span> y <span>sencillo</span>.</p>

          <div class="input-group">
            <input type="email" name="email" id="email" required class="input">
            <label for="email" class="input-label">Correo Electrónico</label>
          </div>

          <div class="input-group-2">
            <input type="password" name="password" id="password" required class="input">
            <label for="password" class="input-label">Contraseña</label>
          </div>

          <input type="submit" value="Iniciar Sesión" class="btn-login">

          <p class="label-1">¿No tienes una cuenta? <a class="metodos-recuperacion" href="registroUsuarios.php">Regístrate</a>
          </p>

          <p class="label-2">¿Has perdido tu cuenta? <a class="metodos-recuperacion" href="recuperarCorreo.php">Recuperar
              contraseña</a></p>
        </form>
      </div>
    </article>
    <script src="js/alertaLogin.js"></script>
  </section>
</body>

</html>