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
      <input type="checkbox" id="toggler">
      <label for="toggler"><i class="ri-menu-line"></i></label>
      <div class="menu">
        <ul class="list">
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Nosotros</a></li>
          <li><a href="#">Contacto</a></li>
        </ul>
      </div>
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
        <form method="POST" action="php/controller.php">
          <!--llama a la accion de logear-->
          <h2>INICIO DE SESION</h2>

          <p class="subcabecera">Es <span>rápido</span>, <span>fácil</span> y <span>sencillo</span>.</p>

          <div class="input-group">
            <input type="email" name="email" id="email" required class="input">
            <label for="email" class="input-label">Correo Electronico</label>
          </div>

          <div class="input-group-2">
            <input type="password" name="password" id="password" required class="input">
            <label for="password" class="input-label">Contraseña</label>
          </div>

          <input type="submit" value="Iniciar Sesion" class="btn-login">

          <p class="label-1">¿No tienes una cuenta? <a class="metodos-recuperacion" href="registroUsuarios.php">Registrate</a>
          </p>

          <p class="label-2">¿Has perdido tu cuenta? <a class="metodos-recuperacion" href="recuperarCorreo.php">Recuperar
              contraseña</a></p>
        </form>
      </div>
    </article>
  </section>
</body>

</html>