<!DOCTYPE html>
<html lang="es">
<!-- Interfaz para INGRESAR EL CORREO Y PODER RECUPERAR LA CUENTA-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar tu cuenta</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
  <script>
    function alertaEnvio() {
      alert("Se ha enviado un correo electrónico con las instrucciones para la recuperación de tu contraseña. Por favor, verifica la información enviada.");
    }
  </script>
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
    <article class="login">
      <!-- Del H2 hasta el siguiente comentario es la implementación del login -->
      <div class="card-login">
        <form method="POST" id="fomrmularioCorreo">
          <!--llama a la accion de logear-->
          <h2>RECUPERAR CONTRASEÑA</h2>

          <p class="subcabecera">Ingesemos tu <span>correo</span> para enviarte un <span>enlace</span>.</p>
          <!-- Caja para el nombre -->
          <div class="input-group">
            <input type="email" name="email" id="email" required class="input" autocomplete="off"> 
            <label for="email" class="input-label">Correo electrónico</label>
          </div>
          <!-- <input type="submit" value="Enviar ->" class="btn-login"> -->
          <input type="submit" onclick="mensaje()" value="Enviar ->" class="btn-login">
        </form>
      </div>
    </article>
  </section>
</body>

</html>

<script>
  function mensaje() {
    var formulario = document.getElementById('fomrmularioCorreo');

    formulario.addEventListener('submit', function (e) {
      e.preventDefault();
      var datos = new FormData(formulario);
      fetch('recuperarContra.php', {
        method: 'POST',
        body: datos
      })
        .then(res => res.json())
        .then(data => {
          if (data === 'conR') {
            alert("Fallo al conectar a la base de datos.");
          } else if (data === 'registro') {
            alert("El correo no se encuentra registrado en el sistema.");
          } else if (data === 'empleado') {
            alert("Empleado: recuperar contra");
          } else if (data === 'cliente') {
            alert("Cliente: recuperar contra");
          } else {
            alert('Se ha enviado un correo electrónico con las instrucciones para la recuperación de tu contraseña. Por favor, verifica la información enviada.');
          }
        })
    })
  }
</script>