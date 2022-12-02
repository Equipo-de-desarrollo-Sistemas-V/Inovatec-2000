<?php
error_reporting(0);
session_start();
include("no_iniciada_cli.php");
$sesion_e = $_SESSION["Usuario"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito de compras</title>
  <link rel="stylesheet" href="css/nav.css">
  <!-- <link rel="stylesheet" href="css/cards.css"> -->
  <link rel="stylesheet" href="css/carrito.css">
  <script src="https://kit.fontawesome.com/2c54bc1d9c.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
  <input type="checkbox" name="" id="check">
  <nav>
    <img src="css/assets/Logo_Integrado.svg" required class="logo" id="logo">
    <?php echo ucwords("Bienvenido") . " " . ucwords($sesion_e); ?>
    
    <div class="search-box">
      <input type="search" placeholder="Busquemos algunas cosas..." id="search">
      <span id="spanbtn"><i class="fa-solid fa-magnifying-glass"></i></span>
    </div>

    <ol>
      <li><a href="sesion_iniciada_login.php" class="">Iniciar sesión</a></li>

      <li><a href="sesion_iniciada_Reg.php" class="">Registrate</a></li>

      <li><a href="sesion_iniciada_Per.php" class="">
          <ion-icon name="person-circle-outline" class="icon"></ion-icon>
        </a></li>

      <li><a href="carritoVentas.php" class="">
          <ion-icon name="cart-outline" class="icon"></ion-icon>
        </a></li>

    </ol>

    <label for="check" class="bar">
      <span><i class="fas fa-bars" id="bars"></i></span>
      <span><i class="fas fa-times" id="times"></i></span>
    </label>
  </nav>

  <section class="containerAll">
    <article class="container">
      <input type="checkbox" name="" id="check">


      <div class="nav-btn">
        <div class="nav-links">
          <ul>
            <!-- REDES -->
            <li class="nav-link" style="--i: .85s">

              <a href="#">
                <ion-icon name="wifi-outline"></ion-icon>
                Redes
                <i class="fas fa-caret-down"></i>
              </a>

              <div class="dropdown">

                <ul>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Redes/Ruteadores inalámbricos">Ruteadores inalámbicos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Redes/Cables de red">Cables de red</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Redes/Adaptadores Bluetooth">Adaptadores Bluetooth</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Redes/Tarjetas y adaptadores inalámbricos">Tarjertas de red y
                      adaptadores inalámbricos</a>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>

            <!-- SOFTWARE -->
            <li class="nav-link" style="--i: .85s">

              <a href="#">
                <ion-icon name="code-slash-outline"></ion-icon>
                Software
                <i class="fas fa-caret-down"></i>
              </a>

              <div class="dropdown">

                <ul>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Software/Antivirus y seguridad">Antivirus y seguridad</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Software/Sistemas operativos">Sistemas operativos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Software/Software punto de venta">Software punto de venta</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Software/Microsoft Office">Microsoft Office</a>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>

            <!-- SERVIDORES -->
            <li class="nav-link" style="--i: .85s">

              <a href="#">
                <ion-icon name="server-outline"></ion-icon>
                Servidores
                <i class="fas fa-caret-down"></i>
              </a>

              <div class="dropdown">

                <ul>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Servidores/Accesorios para servidores">Accesorios de servidores</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Servidores/Redes">Redes</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Servidores/Energía">Energía</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Servidores/Servidores">Servidores</a>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>

            <!-- IMPRESIÓN -->
            <li class="nav-link" style="--i: .85s">

              <a href="#">
                <ion-icon name="print-outline"></ion-icon>
                Impresión
                <i class="fas fa-caret-down"></i>
              </a>

              <div class="dropdown">

                <ul>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Impresión/Consumibles">Consumibles y articulos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Impresión/Impresoras">Impresoras</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Impresión/Scanner de cama">Scanners de cama</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Impresión/Punto de venta">Punto de venta</a>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>

            <!-- COMPUTADORAS -->
            <li class="nav-link" style="--i: .85s">

              <a href="#">
                <ion-icon name="desktop-outline"></ion-icon>
                Computadoras
                <i class="fas fa-caret-down"></i>
              </a>

              <div class="dropdown">

                <ul>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=computadoras/Desktops">Desktops</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=computadoras/Laptop">Laptops</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=computadoras/Smartphones">Smartphones</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=computadoras/Tablet">Tablets</a>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>

            <!-- HARDWARE -->
            <li class="nav-link" style="--i: .85s">

              <a href="#">
                <ion-icon name="hardware-chip-outline"></ion-icon>
                Hardware
                <i class="fas fa-caret-down"></i>
              </a>

              <div class="dropdown">

                <ul>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Hardware/Disco duro">Discos duros</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Hardware/Procesadores">Procesadores</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Hardware/Memorias">Memorias</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Hardware/Tarjeta Madre">Motherboards</a>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>

            <!-- ACCESORIOS -->
            <li class="nav-link" style="--i: .85s">

              <a href="#">
                <ion-icon name="wifi-outline"></ion-icon>
                Accesorios
                <i class="fas fa-caret-down"></i>
              </a>

              <div class="dropdown">

                <ul>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Accesorios/Periféricos">Periféricos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Accesorios/Cables y adaptadores">Cables y adaptadores</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Accesorios/Herramientas">Herramientas</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Accesorios/Limpieza">Limpieza</a>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>

            <!-- ELECTRONICA -->
            <li class="nav-link" style="--i: .85s">

              <a href="#">
                <ion-icon name="wifi-outline"></ion-icon>
                Electrónica
                <i class="fas fa-caret-down"></i>
              </a>

              <div class="dropdown">

                <ul>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Electrónica/Monitores">Monitores</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Electrónica/Audífonos">Audífonos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Electrónica/Bocinas">Bocinas</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Electrónica/Capturadora de video">Capturadoras de video</a>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>

            <!-- ALMACENAMIENTO -->
            <li class="nav-link" style="--i: .85s">

              <a href="#">
                <ion-icon name="cloud-circle-outline"></ion-icon>
                Almacenamiento
                <i class="fas fa-caret-down"></i>
              </a>

              <div class="dropdown">

                <ul>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Almacenamiento/M.2">M.2</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Almacenamiento/SSD">SSD</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Almacenamiento/HDD">HDD</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Almacenamiento/Memoria RAM">Memoria RAM</a>
                  </li>
                  <div class="arrow"></div>
                </ul>
              </div>
            </li>

          </ul>
        </div>

      </div>

      </div>

      <div class="hamburger-menu-container">
        <div class="hamburger-menu">
          <div></div>
        </div>
      </div>
    </article>

    <article class="containerTarjetas">
      <h2 class="subtitulo" id="subtitulo"></h2>

      <div class="containerCards">
        <h2>Tu carrito de compras</h2>
        <div class="listaCarrito">

        </div>

        <div class="containerTotal">

          <h4>Total</h4>
          <h2><span id="total" class="total"></span></h2>

          <div class="botones">
            <button type="button" class="eliminar" onclick="eliminarTodo();">
              <ion-icon name="trash-outline" class="icon"></ion-icon>
              Vaciar carrito
            </button>

            <button type="button" class="comprar" onclick="continuar();">
              <ion-icon name="bag-check-outline" class="icon"></ion-icon>
              Continuar
            </button>
          </div>

        </div>
      </div>
    </article>
  </section>
</body>
  <script src="js/linkHome.js"></script>
  <script src="JsPhp/ObtenerBuscador.js"></script>
  <script src="JsPhp/carritoBridge.js"></script>
  <script src="JsPhp/funcionesCarrito.js"></script>
</html>

<!-- <?php
?> -->