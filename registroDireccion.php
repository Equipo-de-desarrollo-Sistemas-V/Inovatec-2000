<!-- Interfaz para REGISTRO DE DIRECCION -->
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
                <form method="POST" action="validacionesDireccion.php" id="formulario">
                    <!--llama a la accion de logear-->
                    <h2>CREA TU CUENTA</h2>

                    <p class="subcabecera">Continuemos agregando tu <span>dirección</span>.</p>

                    <div class="cajas">
                        <!-- Caja para el nombre -->
                        <div class="input-group">
                            <input type="text" name="calle" id="calle" required class="input" autocomplete="off">
                            <label for="calle" class="input-label">Calle</label>
                        </div>

                        <div class="input-group-2">
                            <input type="number" name="numero" id="numero" required class="input" autocomplete="off">
                            <label for="numero" class="input-label">Número</label>
                        </div>

                        <div class="input-group">
                            <input type="text" name="colonia" id="colonia" required class="input" autocomplete="off">
                            <label for="colonia" class="input-label">Colonia</label>
                        </div>

                        <div class="input-group-2">
                            <input type="text" name="ciudad" id="ciudad" required class="input" autocomplete="off">
                            <label for="ciudad" class="input-label">Ciudad</label>
                        </div>

                        <div class="input-group">
                            <input type="text" name="estado" id="estado" required class="input" autocomplete="off">
                            <label for="estado" class="input-label">Estado</label>
                        </div>

                        <div class="input-group-2">
                            <input type="number" name="codigo-postal" id="codigo-postal" required class="input" autocomplete="off">
                            <label for="codigo-postal" class="input-label">Código Postal</label>
                        </div>

                    </div>
                    <input type="submit" value="Siguiente ->" class="btn-login">
                    <p class="recuperar">¿Has perdido tu cuenta? <a class="metodos-recuperacion" href="recuperarCorreo.php">Recuperar
                            contraseña</a></p>
                </form>
            </div>
        </article>
    </section>
</body>

</html>