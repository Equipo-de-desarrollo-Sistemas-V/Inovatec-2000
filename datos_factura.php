<?php
error_reporting(0);
session_start();
include("no_iniciada_cli.php");
$sesion_e = $_SESSION["Usuario"];

$serverName = 'inovatecserver.database.windows.net';
$connectionInfo = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
$conn_sis = sqlsrv_connect($serverName, $connectionInfo);

//$id=$_GET["item"];

//if (isset($_POST('Actualizar')))
/*$query="SELECT nombre,Apartado,precio_ven FROM Productos where id_producto=$id";
  $res= sqlsrv_query($conn_sis, $query);
  if( $res === false) {
    die( print_r( sqlsrv_errors(), true) );
  }
  while( $row = sqlsrv_fetch_array($res) ) {
    $nombre=$row["nombre"];
    $pre_ven=substr($row['precio_ven'],0,-2);							
  //echo '<script>alert("'.$nombre.'")</script>';
  }
  $array_para_recibir_via_url = urldecode($arre);
  $matriz_completa = unserialize($array_para_recibir_via_url);*/




$arrProd = (array)json_decode($_GET["item"]);
$numPro = count($arrProd);
//echo '<script>alert("'.$arre[1][1].'")</script>';
$fecha = date("d/m/Y");
//$total=$pre_ven*1;
//$str = serialize((array)json_decode($_GET["item"], true));
//$products = json_decode($_GET["item"], true);
$articulos = [];

$conta = 0;
for ($i = 0; $i < $numPro; $i++) {
  $idProd = $arrProd[$i][0];                         //id del producto
  $articulos[] = $idProd;
  $conta++;
  $cantiProd = $arrProd[$i][1];                     //cantidad que se va a comprar
  $articulos[] = $cantiProd;
  $conta++;
}
$arre = serialize($articulos);
$arre = urlencode($arre);
$pagSiguiente = "Factura.php?item=" . $arre;
//action="Factura.php?item=<?php echo $arre; ? >"
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
  <title>Datos factura</title>
  <!-- Importación de los archivos css para el uso de la página -->
  <link rel="stylesheet" href="css/menuPrincipal.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/datosFactura.css">
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

    <section class="container-all">
      <article id="container-datos-usuario" class="contenedor">
        <!-- <input type="submit" name="boton1" value="Actualizar datos" class="btn"> -->
        <br>
        <br>

        <h3 id="subtitulo">Datos para la factura</h3>
        <br>
        <form id="formulario" action="Factura.php?item=<?php echo $arre; ?>" target="_blank" class="formularios" method="POST">
          <div class="entrada-2">

            <!--<form action="Factura.php" class="formularios" method="post">-->
            <div class="input-group">
              <input type="text" name="nombreDenominación" id="nombreDenominación" required class="input" maxlength="100" minlength="3">
              <label for="nombre-denominación" class="input-label">Nombre denominación o razón social</label>
            </div>

            <div class="input-group">
              <input type="text" name="regimenFiscal" id="regimenFiscal" required class="input" maxlength="100">
              <label for="regimen-fiscal" class="input-label">Régimen fiscal del receptor de comprobante</label>
            </div>

            <div class="input-group">
              <input type="text" name="usoComprobante" id="usoComprobante" required class="input" maxlength="100" minlength="3">
              <label for="uso-comprobante" class="input-label">Uso del comprobante</label>
            </div>

            <div class="input-group">
              <input type="text" name="direccion" id="direccion" required class="input" minlength="2" maxlength="20">
              <label for="uso-comprobante" class="input-label">Dirección</label>
            </div>
            <div class="input-group">
              <input type="text" name="codigoPostal" id="codigoPostal" required class="input" minlength="5" maxlength="5">
              <label for="codigo-postal" class="input-label">Código postal del domicilio fiscal</label>
            </div>

            <div class="input-group">
              <input type="email" name="email" id="email" required class="input">
              <label for="uso-comprobante" class="input-label">Correo electrónico</label>
            </div>

            <div class="input-group">
              <input type="text" name="telefono" id="telefono" required class="input" minlength="10" maxlength="10">
              <label for="uso-comprobante" class="input-label">Teléfono</label>
            </div>

            <!--</form>-->
          </div>
          <br>

          <h3 id="subtitulo">Detalles del producto</h3>

          <div class="tabla-datos-compra">
            <table>
              <thead>
                <tr>
                  <th> <b>Producto</b> </th>
                  <td> <b>Cantidad</b> </td>
                  <td> <b>Precio </b> </td>
                  <td> <b>Fecha</b> </td>
                  <td> <b>Total</b> </td>
                </tr>
              </thead>
              <?php
              $conta = 0;
              $aux = json_encode($arrProd);
              $longi = count($arrProd);
              for ($i = 0; $i < $numPro; $i++) {
                $idProd = $arrProd[$i][0];                         //id del producto
                $articulos[] = $idProd;
                $conta++;
                $cantiProd = $arrProd[$i][1];                     //cantidad que se va a comprar
                $articulos[] = $cantiProd;
                $conta++;
                //echo'<script>alert("'.$idProd.'")</script>';
                //echo'<script>alert("'.$cantiProd.'")</script>';
                $query = "SELECT nombre, precio_ven,descuento
                      FROM Productos 
                      where id_producto ='" . $idProd . "'";
                $resultado = sqlsrv_query($conn_sis, $query);
                $row = sqlsrv_fetch_array($resultado);
                $nomProd = $row['nombre'];                      //nombre del prodcuto
                $precio = substr($row['precio_ven'], 0, -2);      //precio de venta
                $descuento = $row['descuento'];                                 // descuento en pesos
                $subT = $precio * ((int)$cantiProd);                //subtotal a pagar por producto
                $totProd = $subT - $descuento;                    //
                $totDeCompra += $totProd;
                echo '<tr>
                          <td>' . $nomProd . '</td>
                          <td>' . $cantiProd . '</td>
                          <td>' . $precio . '</td>
                          <td>' . $fecha . '</td>
                          <td>' . $totProd . '</td>
                          </tr>';
              }
              //echo '<script>alert("'.$articulos[0].'")</script>';
              //echo '<script>alert("'.$conta.'")</script>';
              echo '<tr>
                          <td>' . "" . '</td>
                          <td>' . "" . '</td>
                          <td>' . "" . '</td>
                          <td>' . "Total a pagar $" . '</td>
                          <td>' . $totDeCompra . '</td>
                          </tr>';
              echo "
                          <script>
                            // let auxId= $producto;
                            // let auxCan= $cantiCompra;
                            let auxTot = $totDeCompra;
                            let arreglo = $aux;
                            let arreglo2 = $aux;
                            let longi = $longi;
                          </script>";
              sqlsrv_close($conn_sis); ?>
            </table>
          </div>

          <br>
          <br>
          <input id="arrayProd" name="arrayProd" type="hidden" value="<?php echo $articulos; ?>">
          <input type="submit" name="boton4" id="boton4" value="Continuar" class="btn">

          <br>
          <br>
          <br>
        </form>
      </article>
    </section>

    <!--    Pie de Pagina    -->

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
    <script src="js/validFactura.js"></script>
    <script src="js/linkHome.js"></script>
    <script src="JsPhp/ObtenerBuscador.js"></script>
</body>


</html>