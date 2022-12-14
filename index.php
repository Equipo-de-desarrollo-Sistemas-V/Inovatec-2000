<?php
error_reporting(0);
session_start();
$sesion_e = $_SESSION["Usuario"];
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
  <link rel="stylesheet" href="css/estiloFooter.css">

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

      <div class="hamburger-menu-container">
        <div class="hamburger-menu">
          <div></div>
        </div>
      </div>
    </article>

    <aside class="lateral"></aside>

    <?php include_once("auxCarrusel.php") ?>
    
    
    <div class="contenido-total">

      <div class="pagina-facebook">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v15.0" nonce="Qnm5ITKs"></script>
        <div class="fb-page" data-href="https://www.facebook.com/Inovatec-100088416570916" data-tabs="timeline" data-width="250" data-height="1120" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Inovatec-100088416570916" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Inovatec-100088416570916">Inovatec</a></blockquote></div>
      </div>

      <div class="contenido-all-productos">
        <article class="containerProductos">

          <div class="containerinfo">
            <h2 class="subtitulo">Computación</span></h2>
            <a href="#" class="link"></a>
          </div>

          <div class="containerCards">

            <div class="cardProducto">
              <div class="encabezado">
                <h3 class="tituloProducto"><span id="seccion1-producto1"></span></h3>
                <h3 class="tituloPrecio"><span id="seccion1-precio1"></span></h3>
              </div>

              <img src="" alt="" id="seccion1-imagen1">

              <!-- $salida.='<td>'.'<a href="LOGActualizar.php?item='.$id.'">'.$edi. '</a>'.'</td>'; -->
              <h3 class="nombreProducto"><span id="seccion1-nombre1"></span></h3>
              <a onclick="href='producto_individual.php?item='+id1" class="btn"> Comprar</a>
              <!-- <a href='producto_individual.php?item='+compra class="btn">Comprar</a> -->
            </div>

            <div class="cardProducto">
              <div class="encabezado">
                <h3 class="tituloProducto"><span id="seccion1-producto2"></span></h3>
                <h3 class="tituloPrecio"><span id="seccion1-precio2"></span></h3>
              </div>

              <img src="" alt="" id="seccion1-imagen2">

              <h3 class="nombreProducto"><span id="seccion1-nombre2"></span></h3>
              <a onclick="href='producto_individual.php?item='+id2" class="btn"> Comprar</a>
            </div>

            <div class="cardProducto">
              <div class="encabezado">
                <h3 class="tituloProducto"><span id="seccion1-producto3"></span></h3>
                <h3 class="tituloPrecio"><span id="seccion1-precio3"></span></h3>
              </div>

              <img src="" alt="" id="seccion1-imagen3">

              <h3 class="nombreProducto"><span id="seccion1-nombre3"></span></h3>
              <a onclick="href='producto_individual.php?item='+id3" class="btn"> Comprar</a>
            </div>

            <div class="cardProducto">
              <div class="encabezado">
                <h3 class="tituloProducto"><span id="seccion1-producto4"></span></h3>
                <h3 class="tituloPrecio"><span id="seccion1-precio4"></span></h3>
              </div>

              <img src="" alt="" id="seccion1-imagen4">

              <h3 class="nombreProducto"><span id="seccion1-nombre4"></span></h3>
              <a onclick="href='producto_individual.php?item='+id4" class="btn"> Comprar</a>
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
              <a onclick="href='producto_individual.php?item='+id5" class="btn"> Comprar</a>
            </div>

            <div class="cardProducto">
              <div class="encabezado">
                <h3 class="tituloProducto"><span id="seccion2-producto2"></span></h3>
                <h3 class="tituloPrecio"><span id="seccion2-precio2"></span></h3>
              </div>

              <img src="" alt="" id="seccion2-imagen2">

              <h3 class="nombreProducto"><span id="seccion2-nombre2"></span></h3>
              <a onclick="href='producto_individual.php?item='+id6" class="btn"> Comprar</a>
            </div>

            <div class="cardProducto">
              <div class="encabezado">
                <h3 class="tituloProducto"><span id="seccion2-producto3"></span></h3>
                <h3 class="tituloPrecio"><span id="seccion2-precio3"></span></h3>
              </div>

              <img src="" alt="" id="seccion2-imagen3">

              <h3 class="nombreProducto"><span id="seccion2-nombre3"></span></h3>
              <a onclick="href='producto_individual.php?item='+id7" class="btn"> Comprar</a>
            </div>

            <div class="cardProducto">
              <div class="encabezado">
                <h3 class="tituloProducto"><span id="seccion2-producto4"></span></h3>
                <h3 class="tituloPrecio"><span id="seccion2-precio4"></span></h3>
              </div>

              <img src="" alt="" id="seccion2-imagen4">

              <h3 class="nombreProducto"><span id="seccion2-nombre4"></span></h3>
              <a onclick="href='producto_individual.php?item='+id8" class="btn"> Comprar</a>
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
              <a onclick="href='producto_individual.php?item='+id9" class="btn"> Comprar</a>
            </div>

            <div class="cardProducto">
              <div class="encabezado">
                <h3 class="tituloProducto"><span id="seccion3-producto2"></span></h3>
                <h3 class="tituloPrecio"><span id="seccion3-precio2"></span></h3>
              </div>

              <img src="" alt="" id="seccion3-imagen2">

              <h3 class="nombreProducto"><span id="seccion3-nombre2"></span></h3>
              <a onclick="href='producto_individual.php?item='+id10" class="btn"> Comprar</a>
            </div>

            <div class="cardProducto">
              <div class="encabezado">
                <h3 class="tituloProducto"><span id="seccion3-producto3"></span></h3>
                <h3 class="tituloPrecio"><span id="seccion3-precio3"></span></h3>
              </div>

              <img src="" alt="" id="seccion3-imagen3">

              <h3 class="nombreProducto"><span id="seccion3-nombre3"></span></h3>
              <a onclick="href='producto_individual.php?item='+id11" class="btn"> Comprar</a>
            </div>

            <div class="cardProducto">
              <div class="encabezado">
                <h3 class="tituloProducto"><span id="seccion3-producto4"></span></h3>
                <h3 class="tituloPrecio"><span id="seccion3-precio4"></span></h3>
              </div>

              <img src="" alt="" id="seccion3-imagen4">

              <h3 class="nombreProducto"><span id="seccion3-nombre4"></span></h3>
              <a onclick="href='producto_individual.php?item='+id12" class="btn"> Comprar</a>
            </div>
          </div>

        </article>
      </div>
    </div>

    <!--    Pie de Pagina    -->
  </section>

  <footer class="pie-pagina">
    <div class="grupo-1">
      <div class="box">
        <figure>
          <a href="#">
            <img src="css/assets/Logo_inovatec_original.png" alt="">
          </a>
        </figure>
      </div>
      <div class="box">
        <p>Inovación Tecnológica 2000. </p>
        <p> Av. Tecnológico #100, Col. Las Moritas, Tlaltenango de Sánchez Román, Zac. 99700</p>
        <p>Teléfono: 4371010101</p>
        <p>fabricaitszas.com/inovatec/</p>
        <p>Correo electrónico: inovatec2000st@gmail.com</p>
      </div>
    </div>
    <div class="grupo-2">
      <small>&copy; 2022 <b>Inovatec</b> - Todos los Derechos Reservados.</small>
    </div>
  </footer>

  <script src="js/linkHome.js"></script>
  <script src="JsPhp/ObtenerBuscador.js"></script>
</body>

</html>

<?php
include 'conexiones.php';
/* Creamos la consulta para obtener las computadoras */
$resultado_computadoras = sqlsrv_query($conexion, "SELECT productos.nombre, precio_ven, apartados.nombre as categoria, Subapartados.SubApartado as subcategoria, ruta, Productos.id_producto  
    FROM $tabla_productos, $tabla_apartados, $tabla_subapartados, $tabla_imagenes 
    WHERE Apartado = Apartados.ID_ap and Productos.Subapartado = Id_subap and Apartados.nombre = 'Computadoras' and Productos.id_producto = imagenes.id_prod");

/* Verficamos que la consulta se haya realizado de manera correcta */
if ($resultado_computadoras === false) {
  die(print_r(sqlsrv_errors(), true));
}

/* Declara una lista y guarda los valores de resultado_computadoras para elegir 4 al azar*/
$nombres_computadoras = array();
$precios_computadoras = array();
$categorias_computadoras = array();
$subcategorias_computadoras = array();
$rutas_computadoras = array();
$ids_computadoras = array();

while ($row = sqlsrv_fetch_array($resultado_computadoras)) {
  array_push($nombres_computadoras, $row['nombre']);
  array_push($precios_computadoras, $row['precio_ven']);
  array_push($categorias_computadoras, $row['categoria']);
  array_push($subcategorias_computadoras, $row['subcategoria']);
  array_push($rutas_computadoras, $row['ruta']);
  array_push($ids_computadoras, $row['id_producto']);
}

/* Obten la longitud del arreglo nombres_computadoras */
$longitud = count($nombres_computadoras);
/* Genera 4 numeros aleatorios que no se repitan entre 0 y la longitud del arreglo nombres_computadoras */
$numeros_aleatorios = array();
while (count($numeros_aleatorios) < 4) {
  $numero = rand(0, $longitud - 1);
  if (!in_array($numero, $numeros_aleatorios)) {
    array_push($numeros_aleatorios, $numero);
  }
}

/* Almacena los resultados por categoria en diferentes arrglos que solo contengan su categoria*/
$nombres_computadoras_categoria = array();
$precios_computadoras_categoria = array();
$subcategorias_computadoras_categoria = array();
$rutas_computadoras_categoria = array();
$ids_computadoras_categoria = array();

for ($i = 0; $i < 4; $i++) {
  array_push($nombres_computadoras_categoria, $nombres_computadoras[$numeros_aleatorios[$i]]);
  array_push($precios_computadoras_categoria, $precios_computadoras[$numeros_aleatorios[$i]]);
  array_push($subcategorias_computadoras_categoria, $subcategorias_computadoras[$numeros_aleatorios[$i]]);
  array_push($rutas_computadoras_categoria, $rutas_computadoras[$numeros_aleatorios[$i]]);
  array_push($ids_computadoras_categoria, $ids_computadoras[$numeros_aleatorios[$i]]);
}

/* Elimina los ultimos dos caracteres de los precios */
for ($i = 0; $i < 4; $i++) {
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

        /* Asignamos el id de cada producto a una variable para mandarlo en la url de cada tarjeta*/
        let id1= '$ids_computadoras_categoria[0]';
        let id2= '$ids_computadoras_categoria[1]';
        let id3= '$ids_computadoras_categoria[2]';
        let id4= '$ids_computadoras_categoria[3]';
    </script>";

/* Cierra la conexion */
sqlsrv_close($conexion);
?>

<?php
include 'conexiones.php';
/* Creamos la consulta para obtener los procesadores */
$resultado_procesadores = sqlsrv_query($conexion, "SELECT productos.nombre, precio_ven, apartados.nombre as categoria, Subapartados.SubApartado as subcategoria, ruta,  Productos.id_producto
    FROM $tabla_productos, $tabla_apartados, $tabla_subapartados, $tabla_imagenes 
    WHERE Apartado = $tabla_apartados.ID_ap and $tabla_productos.Subapartado = Id_subap and $tabla_subapartados.SubApartado = 'Procesadores' and $tabla_productos.id_producto = $tabla_imagenes.id_prod");

if ($resultado_procesadores === false) {
  die(print_r(sqlsrv_errors(), true));
}

/* Declara una lista y guarda los valores de resultado_procesadores para elegir 4 al azar*/
$nombres_procesadores = array();
$precios_procesadores = array();
$categorias_procesadores = array();
$subcategorias_procesadores = array();
$rutas_procesadores = array();
$ids_procesadores = array();

while ($row = sqlsrv_fetch_array($resultado_procesadores)) {
  array_push($nombres_procesadores, $row['nombre']);
  array_push($precios_procesadores, $row['precio_ven']);
  array_push($categorias_procesadores, $row['categoria']);
  array_push($subcategorias_procesadores, $row['subcategoria']);
  array_push($rutas_procesadores, $row['ruta']);
  array_push($ids_procesadores, $row['id_producto']);
}

/* Obten la longitud del arreglo nombres_computadoras */
$longitud = count($nombres_procesadores);
/* Genera 4 numeros aleatorios que no se repitan entre 0 y la longitud del arreglo nombres_computadoras */
$numeros_aleatorios = array();
while (count($numeros_aleatorios) < 4) {
  $numero = rand(0, $longitud - 1);
  if (!in_array($numero, $numeros_aleatorios)) {
    array_push($numeros_aleatorios, $numero);
  }
}
/* Almacena los resultados por categoria en diferentes arrglos que solo contengan su categoria */
$nombres_procesadores_categoria = array();
$precios_procesadores_categoria = array();
$subcategorias_procesadores_categoria = array();
$rutas_procesadores_categoria = array();
$ids_procesadores_categoria = array();

for ($i = 0; $i < 4; $i++) {
  array_push($nombres_procesadores_categoria, $nombres_procesadores[$numeros_aleatorios[$i]]);
  array_push($precios_procesadores_categoria, $precios_procesadores[$numeros_aleatorios[$i]]);
  array_push($subcategorias_procesadores_categoria, $subcategorias_procesadores[$numeros_aleatorios[$i]]);
  array_push($rutas_procesadores_categoria, $rutas_procesadores[$numeros_aleatorios[$i]]);
  array_push($ids_procesadores_categoria, $ids_procesadores[$numeros_aleatorios[$i]]);
}
/* Elimina los ultimos dos caracteres de los precios */
for ($i = 0; $i < 4; $i++) {
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

        /* Asignamos el id de cada producto a una variable para mandarlo en la url de cada tarjeta*/
        let id5= '$ids_procesadores_categoria[0]';
        let id6= '$ids_procesadores_categoria[1]';
        let id7= '$ids_procesadores_categoria[2]';
        let id8= '$ids_procesadores_categoria[3]';
    </script>";

/* Cierra la conexion */
sqlsrv_close($conexion);
?>

<?php
include("conexiones.php");
/* Creamos la consulta para obtener los procesadores */
$resultado_motherboards = sqlsrv_query($conexion, "SELECT productos.nombre, precio_ven, apartados.nombre as categoria, Subapartados.SubApartado as subcategoria, ruta, Productos.id_producto
    FROM $tabla_productos, $tabla_apartados, $tabla_subapartados, $tabla_imagenes 
    WHERE Apartado = $tabla_apartados.ID_ap and $tabla_productos.Subapartado = Id_subap and $tabla_subapartados.SubApartado = 'Tarjeta Madre' and $tabla_productos.id_producto = $tabla_imagenes.id_prod");

if ($resultado_motherboards === false) {
  die(print_r(sqlsrv_errors(), true));
}

/* Declara una lista y guarda los valores de resultado_procesadores para elegir 4 al azar*/
$nombres_motherboards = array();
$precios_motherboards = array();
$subcategorias_motherboards = array();
$rutas_motherboards = array();
$ids_motherboards = array();

/* imprime el contenido de los arreglos */
while ($row = sqlsrv_fetch_array($resultado_motherboards)) {
  array_push($nombres_motherboards, $row['nombre']);
  array_push($precios_motherboards, $row['precio_ven']);
  array_push($subcategorias_motherboards, $row['subcategoria']);
  array_push($rutas_motherboards, $row['ruta']);
  array_push($ids_motherboards, $row['id_producto']);
}
/* Obten la longitud del arreglo nombres_computadoras */
$longitud = count($nombres_motherboards);

/* Genera 4 numeros aleatorios que no se repitan entre 0 y la longitud del arreglo nombres_computadoras */
$numeros_aleatorios = array();
while (count($numeros_aleatorios) < 4) {
  $numero = rand(0, $longitud - 1);
  if (!in_array($numero, $numeros_aleatorios)) {
    array_push($numeros_aleatorios, $numero);
  }
}
/* Almacena los resultados por categoria en diferentes arrglos que solo contengan su categoria */
$nombres_motherboards_categoria = array();
$precios_motherboards_categoria = array();
$subcategorias_motherboards_categoria = array();
$rutas_motherboards_categoria = array();
$ids_motherboards_categoria = array();

for ($i = 0; $i < 4; $i++) {
  array_push($nombres_motherboards_categoria, $nombres_motherboards[$numeros_aleatorios[$i]]);
  array_push($precios_motherboards_categoria, $precios_motherboards[$numeros_aleatorios[$i]]);
  array_push($subcategorias_motherboards_categoria, $subcategorias_motherboards[$numeros_aleatorios[$i]]);
  array_push($rutas_motherboards_categoria, $rutas_motherboards[$numeros_aleatorios[$i]]);
  array_push($ids_motherboards_categoria, $ids_motherboards[$numeros_aleatorios[$i]]);
}

/* Elimina los ultimos dos caracteres de los precios */
for ($i = 0; $i < 4; $i++) {
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

        /* Asignamos el id de cada producto a una variable para mandarlo en la url de cada tarjeta*/
        let id9= '$ids_motherboards_categoria[0]';
        let id10= '$ids_motherboards_categoria[1]';
        let id11= '$ids_motherboards_categoria[2]';
        let id12= '$ids_motherboards_categoria[3]';

    </script>";
/* Cierra la conexion a la base de datos */
sqlsrv_close($conexion);
?>