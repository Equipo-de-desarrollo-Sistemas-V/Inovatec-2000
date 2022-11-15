<?php
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Importación de los scripts para los iconos -->
  <script src="https://kit.fontawesome.com/2c54bc1d9c.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <title>Comprar producto</title>
  <!-- Importación de los archivos css para el uso de la página -->
  <link rel="stylesheet" href="css/menuPrincipal.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/productoIndividual.css">
</head>

<body>
  <header>
    <input type="checkbox" name="" id="check">

    <nav>
      <img src="css/assets/Logo_Integrado.svg" required class="logo" id="logo">
      <?php echo ucwords("Bienvenido")." ". ucwords($sesion_i);?>
      <div class="search-box">
        <input type="search" placeholder="Busquemos algunas cosas...">
        <span><i class="fa-solid fa-magnifying-glass"></i></span>
      </div>
  
      <ol>
        <li><a href="login.php" class="">Iniciar sesión</a></li>
  
        <li><a href="RegistroUsuarios.php" class="">Registrate</a></li>
  
        <li><a href="perfilCliente.php" class=""><ion-icon name="person-circle-outline" class="icon"></ion-icon></a></li>
  
        <li><a href="#" class=""><ion-icon name="cart-outline" class="icon"></ion-icon></a></li>
  
      </ol>
  
      <label for="check" class="bar">
        <span><i class="fas fa-bars" id="bars"></i></span>
        <span><i class="fas fa-times" id="times"></i></span>
      </label>
    </nav>
  </header>

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
                    <a href="">Ruteadores inalámbicos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Cables de red</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Adaptadores Bluetooth</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Tarjertas de red</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Adaptadores inalámbricos</a>
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
                    <a href="">Antivirus y seguridad</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Sistemas operativos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Ofimatica</a>
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
                    <a href="">Accesorios de servidores</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Redes</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Energía</a>
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
                    <a href="">Consumibles y articulos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Impresoras</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Scanners de cama</a>
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
                    <a href="">Desktops</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Laptops</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Smartphones</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Tablets</a>
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
                    <a href="">Discos duros</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Procesadores</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Memorias</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Motherboards</a>
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
                    <a href="">Perifericos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Cables</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Adaptadores</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Herramientas</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Limpieza</a>
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
                    <a href="">Monitores</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Audifonos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Micrófonos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Bocinas</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="">Capturadoras de video</a>
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

    <section class="container-all">
        
        <article id="container-datos-usuario" class="contenedor">
            <div class="imagen_producto">
              <p id="nombre">Nombre del producto</p>

                <img src="" alt=""  id="imagen" class="imagen-producto" height="300">
                <!-- <img src="imagenes/computadora1.png" alt="" class="imagen-producto" height="300"> -->

            </div>

            <div class="comprar-producto">
              <form action="#" class="formulario-producto">
                <div class="labels-precio">
                  <label align="center" class="label-precio">Precio total: </label>
                  
                  <label align="center" class="label-total" id="precio">$850</label>
                  
                  <label align="center" class="label-noDescuento" id="precioDes"><del>$850</del></label>
                </div>
               
                <div class="div-cantidad">
                  <label for="cantidad">Cantidad: </label>
                  <input type="number" name="cantidad" id="cantidad" class="input-cantidad" value="1" min="1">
                </div>
                <br>
                
                <label align="center" type="submit" name="agregar" id="agregar" value="Agregar" class="btn" disabled>
                  <i class="fa-solid fa-cart-shopping"></i>
                  Agregar al carrito
                </label>
                <br>
                <label align="center" type="submit" name="comprar" id="comprar" class="btn" disabled>
                  <i class="fa-solid fa-bag-shopping"></i>
                  Comprar
                </label>    
                 
                <br>
                <label align="center" type="submit" name="existentes" id="existentes" class="label-existentes" disabled>
                  <span>Existentes: </span>
                  <span>10</span>
                </label>
              </form>

            </div>
            <br>

            <div class="descripcion-producto">
              <h1>Descripción del producto - Características - Especificaciones</h1>
              <br>
              <p id="descripcion">Aqui va la descripción del producto</p>
              
            </div>

            
        </article>
    </section>
    <script src="js/linkHome.js"></script>
</body>

</html>

<?php
$idProducto=$_GET["item"];
echo "HOLA".$idProducto."ADIOS";

$ruta="imagenes/computadora1.png";
echo "
<script>
  document.getElementById('nombre').innerHTML = 'Hola yo voy dentro del label!';
  document.getElementById('precio').innerHTML = 'Hola yo voy dentro del label!';
  document.getElementById('precioDes').innerHTML = 'Hola yo voy dentro del label!';
  document.getElementById('descripcion').innerHTML = 'Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!Hola yo voy dentro del label!';
  document.getElementById('imagen').src= '$ruta';
  
</script>";

?>
