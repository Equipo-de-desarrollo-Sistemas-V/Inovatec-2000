<?php
error_reporting(0);
session_start();
$sesion_i = $_SESSION["Usuario"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Importación de los scripts para los iconos -->
  <script src="https://kit.fontawesome.com/2c54bc1d9c.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <title>Menú principal</title>
  <!-- Importación de los archivos css para el uso de la página -->
  <link rel="stylesheet" href="css/menuPrincipal.css">
  <link rel="stylesheet" href="css/nav.css">
</head>

<body>
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

      <aside class="lateral"></aside>

      <article class="slider-frame">
        <ul>
          <li><img src="imagenes/imagen-1.jpg" alt=""></li>
          <li><img src="imagenes/imagen-2.jpg" alt=""></li>
          <li><img src="imagenes/imagen-3.jpg" alt=""></li>
          <li><img src="imagenes/imagen-4.jpg" alt=""></li>
        </ul>
      </article>

      <article class="containerProductos">

        <div class="containerinfo">
          <h2 class="subtitulo">Computación y electrónica</span></h2>
          <a href="#" class="link"></a>
        </div>

        <div class="containerCards">

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion1-producto1"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion1-precio1"></span></h3>
            </div>

            <img src="" alt="" id="seccion1-imagen1">

            <h3 class="nombreProducto"><span id="seccion1-nombre1"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion1-producto2"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion1-precio2"></span></h3>
            </div>

            <img src="" alt="" id="seccion1-imagen2">

            <h3 class="nombreProducto"><span id="seccion1-nombre2"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion1-producto3"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion1-precio3"></span></h3>
            </div>

            <img src="" alt="" id="seccion1-imagen3">

            <h3 class="nombreProducto"><span id="seccion1-nombre3"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion1-producto4"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion1-precio4"></span></h3>
            </div>

            <img src="" alt="" id="seccion1-imagen4">

            <h3 class="nombreProducto"><span id="seccion1-nombre4"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>
        </div>

      </article>

      <article class="containerProductos">

        <div class="containerinfo">
          <h2 class="subtitulo">Procesadores</h2>
          <a href="#" class="link"></a>
        </div>

        <div class="containerCards">

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion2-producto1"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion2-precio1"></span></h3>
            </div>

            <img src="" alt="" id="seccion2-imagen1">

            <h3 class="nombreProducto"><span id="seccion2-nombre1"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion2-producto2"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion2-precio2"></span></h3>
            </div>

            <img src="" alt="" id="seccion2-imagen2">

            <h3 class="nombreProducto"><span id="seccion2-nombre2"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion2-producto3"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion2-precio3"></span></h3>
            </div>

            <img src="" alt="" id="seccion2-imagen3">

            <h3 class="nombreProducto"><span id="seccion2-nombre3"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion2-producto4"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion2-precio4"></span></h3>
            </div>

            <img src="" alt="" id="seccion2-imagen4">

            <h3 class="nombreProducto"><span id="seccion2-nombre4"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>

        </div>

      </article>

      <article class="containerProductos">

        <div class="containerinfo">
          <h2 class="subtitulo">Placas madre</h2>
          <a href="#" class="link"></a>
        </div>

        <div class="containerCards">

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion3-producto1"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion3-precio1"></span></h3>
            </div>

            <img src="" alt="" id="seccion3-imagen1">

            <h3 class="nombreProducto"><span id="seccion3-nombre1"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion3-producto2"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion3-precio2"></span></h3>
            </div>

            <img src="" alt="" id="seccion3-imagen2">

            <h3 class="nombreProducto"><span id="seccion3-nombre2"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion3-producto3"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion3-precio3"></span></h3>
            </div>

            <img src="" alt="" id="seccion3-imagen3">

            <h3 class="nombreProducto"><span id="seccion3-nombre3"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>

          <div class="cardProducto">
            <div class="encabezado">
              <h3 class="tituloProducto"><span id="seccion3-producto4"></span></h3>
              <h3 class="tituloPrecio"><span id="seccion3-precio4"></span></h3>
            </div>

            <img src="" alt="" id="seccion3-imagen4">

            <h3 class="nombreProducto"><span id="seccion3-nombre4"></span></h3>
            <a href="#" class="btn">Comprar</a>
          </div>

      </article>

    </section>

  <script src="js/linkHome.js"></script>
</body>

</html>

<?php 
    include 'conexiones.php';
    /* Creamos la consulta para obtener las computadoras */
    $resultado_computadoras = sqlsrv_query($conexion, "SELECT productos.nombre, precio_ven, apartados.nombre as categoria, Subapartados.SubApartado as subcategoria, ruta FROM $tabla_productos, $tabla_apartados, $tabla_subapartados, $tabla_imagenes WHERE Apartado = Apartados.ID_ap and Productos.Subapartado = Id_subap and Apartados.nombre = 'Computadoras' and Productos.id_producto = imagenes.id_prod");

    /* Verficamos que la consulta se haya realizado de manera correcta */
    if($resultado_computadoras === false){
        die(print_r(sqlsrv_errors(), true));
    }

    /* Declara una lista y guarda los valores de resultado_computadoras para elegir 4 al azar*/
    $nombres_computadoras = array();
    $precios_computadoras = array();
    $categorias_computadoras = array();
    $subcategorias_computadoras = array();
    $rutas_computadoras = array();

    while($row = sqlsrv_fetch_array($resultado_computadoras)){
        array_push($nombres_computadoras, $row['nombre']);
        array_push($precios_computadoras, $row['precio_ven']);
        array_push($categorias_computadoras, $row['categoria']);
        array_push($subcategorias_computadoras, $row['subcategoria']);
        array_push($rutas_computadoras, $row['ruta']);
    }
    /* Obten la longitud del arreglo nombres_computadoras */
    $longitud = count($nombres_computadoras);
    /* Genera 4 numeros aleatorios que no se repitan entre 0 y la longitud del arreglo nombres_computadoras */
    $numeros_aleatorios = array();
    while(count($numeros_aleatorios) < 4){
        $numero = rand(0, $longitud - 1);
        if(!in_array($numero, $numeros_aleatorios)){
            array_push($numeros_aleatorios, $numero);
        }
    }
    /* Almacena los resultados por categoria en diferentes arrglos que solo contengan su categoria*/
    $nombres_computadoras_categoria = array();
    $precios_computadoras_categoria = array();
    $subcategorias_computadoras_categoria = array();
    $rutas_computadoras_categoria = array();

    for($i = 0; $i < 4; $i++){
        array_push($nombres_computadoras_categoria, $nombres_computadoras[$numeros_aleatorios[$i]]);
        array_push($precios_computadoras_categoria, $precios_computadoras[$numeros_aleatorios[$i]]);
        array_push($subcategorias_computadoras_categoria, $subcategorias_computadoras[$numeros_aleatorios[$i]]);
        array_push($rutas_computadoras_categoria, $rutas_computadoras[$numeros_aleatorios[$i]]);
    }

    /* Elimina los ultimos dos caracteres de los precios */
    for($i = 0; $i < 4; $i++){
        $precios_computadoras_categoria[$i] = substr($precios_computadoras_categoria[$i], 0, -2);
    }

    echo "<script>
        /* Declaramos los nombres de los identificadores para las variables */
        let subcategoria1 = document.getElementById('seccion1-producto1');
        let subcategoria2 = document.getElementById('seccion1-producto2');
        let subcategoria3 = document.getElementById('seccion1-producto3');
        let subcategoria4 = document.getElementById('seccion1-producto4');
        
        let precio1 = document.getElementById('seccion1-precio1');
        let precio2 = document.getElementById('seccion1-precio2');
        let precio3 = document.getElementById('seccion1-precio3');
        let precio4 = document.getElementById('seccion1-precio4');

        let imagen1 = document.getElementById('seccion1-imagen1');
        let imagen2 = document.getElementById('seccion1-imagen2');
        let imagen3 = document.getElementById('seccion1-imagen3');
        let imagen4 = document.getElementById('seccion1-imagen4');
        
        let nombre1 = document.getElementById('seccion1-nombre1');
        let nombre2 = document.getElementById('seccion1-nombre2');
        let nombre3 = document.getElementById('seccion1-nombre3');
        let nombre4 = document.getElementById('seccion1-nombre4');
        
        /* Asignamos una prueba para mandar nombres */
        subcategoria1.innerHTML = '$subcategorias_computadoras_categoria[0]';
        subcategoria2.innerHTML = '$subcategorias_computadoras_categoria[1]';
        subcategoria3.innerHTML = '$subcategorias_computadoras_categoria[2]';
        subcategoria4.innerHTML = '$subcategorias_computadoras_categoria[3]';
        
        precio1.innerHTML = '$precios_computadoras_categoria[0]';
        precio2.innerHTML = '$precios_computadoras_categoria[1]';
        precio3.innerHTML = '$precios_computadoras_categoria[2]';
        precio4.innerHTML = '$precios_computadoras_categoria[3]';

        imagen1.src = '$rutas_computadoras_categoria[0]';
        imagen2.src = '$rutas_computadoras_categoria[1]';
        imagen3.src = '$rutas_computadoras_categoria[2]';
        imagen4.src = '$rutas_computadoras_categoria[3]';
        
        nombre1.innerHTML = '$nombres_computadoras_categoria[0]';
        nombre2.innerHTML = '$nombres_computadoras_categoria[1]';
        nombre3.innerHTML = '$nombres_computadoras_categoria[2]';
        nombre4.innerHTML = '$nombres_computadoras_categoria[3]';
    </script>";

    /* Cierra la conexion */
    sqlsrv_close($conexion);
?>

<?php
    include 'conexiones.php';
    /* Creamos la consulta para obtener los procesadores */
    $resultado_procesadores = sqlsrv_query($conexion, "SELECT productos.nombre, precio_ven, apartados.nombre as categoria, Subapartados.SubApartado as subcategoria, ruta FROM $tabla_productos, $tabla_apartados, $tabla_subapartados, $tabla_imagenes WHERE Apartado = $tabla_apartados.ID_ap and $tabla_productos.Subapartado = Id_subap and $tabla_subapartados.SubApartado = 'Procesadores' and $tabla_productos.id_producto = $tabla_imagenes.id_prod");

    if($resultado_procesadores === false){
        die(print_r(sqlsrv_errors(), true));
    }

    /* Declara una lista y guarda los valores de resultado_procesadores para elegir 4 al azar*/
    $nombres_procesadores = array();
    $precios_procesadores = array();
    $categorias_procesadores = array();
    $subcategorias_procesadores = array();
    $rutas_procesadores = array();

    while($row = sqlsrv_fetch_array($resultado_procesadores)){
        array_push($nombres_procesadores, $row['nombre']);
        array_push($precios_procesadores, $row['precio_ven']);
        array_push($categorias_procesadores, $row['categoria']);
        array_push($subcategorias_procesadores, $row['subcategoria']);
        array_push($rutas_procesadores, $row['ruta']);
    }

    /* Obten la longitud del arreglo nombres_computadoras */
    $longitud = count($nombres_computadoras);
    /* Genera 4 numeros aleatorios que no se repitan entre 0 y la longitud del arreglo nombres_computadoras */
    $numeros_aleatorios = array();
    while(count($numeros_aleatorios) < 4){
        $numero = rand(0, $longitud - 1);
        if(!in_array($numero, $numeros_aleatorios)){
            array_push($numeros_aleatorios, $numero);
        }
    }
    /* Almacena los resultados por categoria en diferentes arrglos que solo contengan su categoria */
    $nombres_procesadores_categoria = array();
    $precios_procesadores_categoria = array();
    $subcategorias_procesadores_categoria = array();
    $rutas_procesadores_categoria = array();

    for($i = 0; $i < 4; $i++){
        array_push($nombres_procesadores_categoria, $nombres_procesadores[$numeros_aleatorios[$i]]);
        array_push($precios_procesadores_categoria, $precios_procesadores[$numeros_aleatorios[$i]]);
        array_push($subcategorias_procesadores_categoria, $subcategorias_procesadores[$numeros_aleatorios[$i]]);
        array_push($rutas_procesadores_categoria, $rutas_procesadores[$numeros_aleatorios[$i]]);
    }

    /* Elimina los ultimos dos caracteres de los precios */
    for($i = 0; $i < 4; $i++){
        $precios_procesadores_categoria[$i] = substr($precios_procesadores_categoria[$i], 0, -2);
    }

    echo "<script>
        /* Declaramos los nombres de los identificadores para las variables */
        let subcategoria5 = document.getElementById('seccion2-producto1');
        let subcategoria6 = document.getElementById('seccion2-producto2');
        let subcategoria7 = document.getElementById('seccion2-producto3');
        let subcategoria8 = document.getElementById('seccion2-producto4');
        
        let precio5 = document.getElementById('seccion2-precio1');
        let precio6 = document.getElementById('seccion2-precio2');
        let precio7 = document.getElementById('seccion2-precio3');
        let precio8 = document.getElementById('seccion2-precio4');

        let imagen5 = document.getElementById('seccion2-imagen1');
        let imagen6 = document.getElementById('seccion2-imagen2');
        let imagen7 = document.getElementById('seccion2-imagen3');
        let imagen8 = document.getElementById('seccion2-imagen4');
        
        let nombre5 = document.getElementById('seccion2-nombre1');
        let nombre6 = document.getElementById('seccion2-nombre2');
        let nombre7 = document.getElementById('seccion2-nombre3');
        let nombre8 = document.getElementById('seccion2-nombre4');
        
        /* Asignamos una prueba para mandar nombres */
        subcategoria5.innerHTML = '$subcategorias_procesadores_categoria[0]';
        subcategoria6.innerHTML = '$subcategorias_procesadores_categoria[1]';
        subcategoria7.innerHTML = '$subcategorias_procesadores_categoria[2]';
        subcategoria8.innerHTML = '$subcategorias_procesadores_categoria[3]';
        
        precio5.innerHTML = '$precios_procesadores_categoria[0]';
        precio6.innerHTML = '$precios_procesadores_categoria[1]';
        precio7.innerHTML = '$precios_procesadores_categoria[2]';
        precio8.innerHTML = '$precios_procesadores_categoria[3]';

        imagen5.src = '$rutas_procesadores_categoria[0]';
        imagen6.src = '$rutas_procesadores_categoria[1]';
        imagen7.src = '$rutas_procesadores_categoria[2]';
        imagen8.src = '$rutas_procesadores_categoria[3]';
        
        nombre5.innerHTML = '$nombres_procesadores_categoria[0]';
        nombre6.innerHTML = '$nombres_procesadores_categoria[1]';
        nombre7.innerHTML = '$nombres_procesadores_categoria[2]';
        nombre8.innerHTML = '$nombres_procesadores_categoria[3]';
    </script>";

    /* Cierra la conexion */
    sqlsrv_close($conexion);
?>

<?php
    include("conexiones.php");
    /* Creamos la consulta para obtener los procesadores */
    $resultado_motherboards = sqlsrv_query($conexion, "SELECT productos.nombre, precio_ven, apartados.nombre as categoria, Subapartados.SubApartado as subcategoria, ruta FROM $tabla_productos, $tabla_apartados, $tabla_subapartados, $tabla_imagenes WHERE Apartado = $tabla_apartados.ID_ap and $tabla_productos.Subapartado = Id_subap and $tabla_subapartados.SubApartado = 'Tarjeta Madre' and $tabla_productos.id_producto = $tabla_imagenes.id_prod");

    if($resultado_motherboards === false){
        die(print_r(sqlsrv_errors(), true));
    }

    /* Declara una lista y guarda los valores de resultado_procesadores para elegir 4 al azar*/
    $nombres_motherboards = array();
    $precios_motherboards = array();
    $subcategorias_motherboards = array();
    $rutas_motherboards = array();

    /* imprime el contenido de los arreglos */
    while($row = sqlsrv_fetch_array($resultado_motherboards)){
        array_push($nombres_motherboards, $row['nombre']);
        array_push($precios_motherboards, $row['precio_ven']);
        array_push($subcategorias_motherboards, $row['subcategoria']);
        array_push($rutas_motherboards, $row['ruta']);
    }
    /* Obten la longitud del arreglo nombres_computadoras */
    $longitud = count($nombres_motherboards);

    /* Genera 4 numeros aleatorios que no se repitan entre 0 y la longitud del arreglo nombres_computadoras */
    $numeros_aleatorios = array();
    while(count($numeros_aleatorios) < 4){
        $numero = rand(0, $longitud - 1);
        if(!in_array($numero, $numeros_aleatorios)){
            array_push($numeros_aleatorios, $numero);
        }
    }
    /* Almacena los resultados por categoria en diferentes arrglos que solo contengan su categoria */
    $nombres_motherboards_categoria = array();
    $precios_motherboards_categoria = array();
    $subcategorias_motherboards_categoria = array();
    $rutas_motherboards_categoria = array();

    for($i = 0; $i < 4; $i++){
        array_push($nombres_motherboards_categoria, $nombres_motherboards[$numeros_aleatorios[$i]]);
        array_push($precios_motherboards_categoria, $precios_motherboards[$numeros_aleatorios[$i]]);
        array_push($subcategorias_motherboards_categoria, $subcategorias_motherboards[$numeros_aleatorios[$i]]);
        array_push($rutas_motherboards_categoria, $rutas_motherboards[$numeros_aleatorios[$i]]);
    }

    /* Elimina los ultimos dos caracteres de los precios */
    for($i = 0; $i < 4; $i++){
        $precios_motherboards_categoria[$i] = substr($precios_motherboards_categoria[$i], 0, -2);
    }

    echo "<script>
        /* Declaramos los nombres de los identificadores para las variables */
        let subcategoria9 = document.getElementById('seccion3-producto1');
        let subcategoria10 = document.getElementById('seccion3-producto2');
        let subcategoria11 = document.getElementById('seccion3-producto3');
        let subcategoria12 = document.getElementById('seccion3-producto4');
        
        let precio9 = document.getElementById('seccion3-precio1');
        let precio10 = document.getElementById('seccion3-precio2');
        let precio11 = document.getElementById('seccion3-precio3');
        let precio12 = document.getElementById('seccion3-precio4');

        let imagen9 = document.getElementById('seccion3-imagen1');
        let imagen10 = document.getElementById('seccion3-imagen2');
        let imagen11 = document.getElementById('seccion3-imagen3');
        let imagen12 = document.getElementById('seccion3-imagen4');
        
        let nombre9 = document.getElementById('seccion3-nombre1');
        let nombre10 = document.getElementById('seccion3-nombre2');
        let nombre11 = document.getElementById('seccion3-nombre3');
        let nombre12 = document.getElementById('seccion3-nombre4');
        
        /* Asignamos una prueba para mandar nombres */
        subcategoria9.innerHTML = '$subcategorias_motherboards_categoria[0]';
        subcategoria10.innerHTML = '$subcategorias_motherboards_categoria[1]';
        subcategoria11.innerHTML = '$subcategorias_motherboards_categoria[2]';
        subcategoria12.innerHTML = '$subcategorias_motherboards_categoria[3]';
        
        precio9.innerHTML = '$precios_motherboards_categoria[0]';
        precio10.innerHTML = '$precios_motherboards_categoria[1]';
        precio11.innerHTML = '$precios_motherboards_categoria[2]';
        precio12.innerHTML = '$precios_motherboards_categoria[3]';

        imagen9.src = '$rutas_motherboards_categoria[0]';
        imagen10.src = '$rutas_motherboards_categoria[1]';
        imagen11.src = '$rutas_motherboards_categoria[2]';
        imagen12.src = '$rutas_motherboards_categoria[3]';
        
        nombre9.innerHTML = '$nombres_motherboards_categoria[0]';
        nombre10.innerHTML = '$nombres_motherboards_categoria[1]';
        nombre11.innerHTML = '$nombres_motherboards_categoria[2]';
        nombre12.innerHTML = '$nombres_motherboards_categoria[3]';
    </script>";
    /* Cierra la conexion a la base de datos */
    sqlsrv_close($conexion);
?>