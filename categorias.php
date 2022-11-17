<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categorias</title>
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/cards.css">
  <script src="https://kit.fontawesome.com/2c54bc1d9c.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
  <input type="checkbox" name="" id="check">
  <nav>
    <img src="css/assets/Logo_Integrado.svg" required class="logo" id="logo">
    
    <div class="search-box">
      <input type="search" placeholder="Busquemos algunas cosas...">
      <span><i class="fa-solid fa-magnifying-glass"></i></span>
    </div>

    <ol>
      <li><a href="sesion_iniciada_Cli.php" class="">Iniciar sesión</a></li>

      <li><a href="sesion_iniciada_Reg.php" class="">Registrate</a></li>

      <li><a href="perfilCliente.php" class="">
          <ion-icon name="person-circle-outline" class="icon"></ion-icon>
        </a></li>

      <li><a href="#" class="">
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
                      <a href="categorias.php?item=Redes/Ruteadores inalambricos" >Ruteadores inalámbicos</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=Redes/Cables de red">Cables de red</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=Redes/Adaptadores Bluetooth">Adaptadores Bluetooth</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=Redes/Tarjetas y adaptadores inalambricos">Tarjertas de red y adaptadores inalámbricos</a>
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
                      <a href="categorias.php?item=Software/Microsft Office">Ofimatica</a>
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
                      <a href="categorias.php?item=Servidores e impresion/Accesorios para servidores">Accesorios de servidores</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=Servidores e impresion/Redes">Redes</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=Servidores e impresion/Energia">Energía</a>
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
                      <a href="categorias.php?item=Impresion/Consumibles">Consumibles y articulos</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=Impresion/Impresoras">Impresoras</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=Impresion/Scanners de cama">Scanners de cama</a>
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
                      <a href="categorias.php?item=computadoras/laptop">Laptops</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=computadoras/Smarthphones">Smartphones</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=computadoras/Tablets">Tablets</a>
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
                      <a href="categorias.php?item=Accesorios/Perifericos">Perifericos</a>
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
                      <a href="categorias.php?item=Electronica/Monitores">Monitores</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=Electronica/Audifonos">Audifonos</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=Electronica/Bocinas">Bocinas</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="categorias.php?item=Electronica/Capturadora de video">Capturadoras de video</a>
                    </li>
                    <div class="arrow"></div>
                  </ul>
                </div>
              </li>

            </ul>
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

      </div>
    </article>

    <span id="categoria"style="display:none"></span>
    <span id="subcategoria"style="display:none"></span>
  </section>
</body>

  <script src="JsPhp/categoriasBridge.js"></script>
</html>

<?php
  $item = $_GET['item'];

  /* Separa el item en dos secciones y guardalo en diferentes variables */
  $item = explode("/", $item);
  
  /* Asigna el nombre de la subcategoria al h2 con el id subtitulo */
  echo "<script>document.getElementById('subtitulo').innerHTML = '$item[1]'</script>";

  echo "<script>document.getElementById('categoria').innerText = '$item[0]'</script>";
  echo "<script>document.getElementById('subcategoria').innerText = '$item[1]'</script>";
?>