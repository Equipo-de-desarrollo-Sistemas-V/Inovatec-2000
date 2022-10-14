<!DOCTYPE html>
<!-- Interfaz para INGRESAR EL CORREO Y PODER RECUPERAR LA CUENTA-->
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar tu cuenta</title>
    <link rel="stylesheet" href="css/resetPassword.css">
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
        <article class="image">
            <img src="css/assets/sent-message-animate.svg" alt="logo">
        </article>

        <article class="login">
            <div class="card-login">
                <form id="formulario">
                    <h2>RECUPERAR CONTRASEÑA</h2>
                    <p class="subcabecera">Ingresemos tu <span>correo</span> para enviarte un <span>enlace</span>.</p>
                    <!-- Caja para el email -->
                    <div class="input-group">
                        <input type="email" name="email" id="email" required class="input">
                        <label for="email" class="input-label">Correo electrónico</label>
                    </div>
                    <input type="submit" value="Enviar ->" class="btn-login">
                </form>
            </div>
        </article>
        <script src="js/alertas.js"></script>
    </section>
</body>

</html>