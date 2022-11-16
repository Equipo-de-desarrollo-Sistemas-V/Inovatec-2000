<?php
error_reporting(0);
session_start();
include("no_iniciada_cli.php");
$sesion_i = $_SESSION["Usuario"];


$serverName='localhost';
$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo); 

$query = "SELECT * 
FROM Tarjetas 
WHERE Usuario='$sesion_i'";

$resultado = sqlsrv_query($con, $query);
$row=sqlsrv_fetch_array($resultado);
$no_tar=$row["no_tarjeta"];
$fecha=$row["fecha_ven_mes"];
$fecha1=$row["fecha_ven_anio"];
$nombre=$row["Nombre_Tar"];

$query= "SELECT* 
FROM Direccion 
where Usuario ='".$sesion_i."'";
  $resultado=sqlsrv_query($con, $query);
  $row = sqlsrv_fetch_array($resultado);
  $colonia=$row['colonia'];
  $calle=$row['calle'];
  $no_calle=$row['no_calle'];
  $cp=$row['codigo_postal'];
  $auxRela=$row['Ciudad_Estado'];

$query= "SELECT* 
FROM estados_municipios 
where id ='".$auxRela."'";
  $resultado=sqlsrv_query($con, $query);
  $row = sqlsrv_fetch_array($resultado);
  $auxMun=$row['municipios_id'];
  $auxEst=$row['estados_id'];

$query= "SELECT* 
FROM municipios 
where Id_Municipios ='".$auxMun."'";
  $resultado=sqlsrv_query($con, $query);
  $row = sqlsrv_fetch_array($resultado);
  $municipio=$row['municipio'];

$query= "SELECT* 
FROM estados 
where id ='".$auxEst."'";
  $resultado=sqlsrv_query($con, $query);
  $row = sqlsrv_fetch_array($resultado);
  $estado=$row['Estado'];


  sqlsrv_close($con);
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
  <title>Datos venta</title>
  <!-- Importación de los archivos css para el uso de la página -->
  <link rel="stylesheet" href="css/menuPrincipal.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/datosVenta.css">
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
                <!-- <input type="submit" name="boton1" value="Actualizar datos" class="btn"> -->
                <br>
                <br>
            <h1>Confirmación de datos</h1>
            <br>

            <h3 id="subtitulo">Datos bancarios</h3>

            <div class="entrada-2">
                <div class="input-group">
                    <label for="nombre-tarjeta" class="input-label">Nombre en la tarjeta</label>
                    <input type="text" name="nombreTarjeta" id="nombreTarjeta" required class="input" maxlength="40" value=<?php echo $nombre;?> readonly="readonly">
                    
                </div>

                <div class="input-group">
                    <input type="text" name="numeroTarjeta" id="numeroTarjeta" required class="input" maxlength="16" value=<?php echo $no_tar;?> readonly="readonly">
                    <label for="numero-tarjeta" class="input-label">Número de tarjeta</label>
                </div>

                <div class="input-group">
                    <input type="text" name="monthExpiracion" id="monthExpiracion" required class="input" maxlength="2" minlength="2" value=<?php echo $fecha;?> readonly="readonly">
                    <label for="month-expiracion" class="input-label">Mes de expiración</label>
                </div>

                <div class="input-group">
                    <input type="text" name="yearExpiracion" id="yearExpiracion" required class="input"maxlength="2" minlength="2" value=<?php echo $fecha1;?> readonly="readonly">
                    <label for="year-expiracion" class="input-label">Año de expiración</label>
                </div>
                <div class="input-group">
                    <input type="text" name="ccv" id="ccv" class="input" maxlength="3" minlength="3">
                    <label for="ccv" class="input-label">CCV</label>
                </div>
            </div>
            <br>
            <br>

            <h3 id="subtitulo">Datos de dirección</h3>
            <div class="entrada-2">
                <div class="input-group">
                    <input type="text" name="calle" id="calle" required class="input" maxlength="20" value=<?php echo $calle;?> readonly="readonly">
                    <label for="calle" class="input-label">Calle</label>
                </div>

                <div class="input-group">
                    <input type="text" name="numero" id="numero" required class="input" maxlength="10" value=<?php echo $no_calle;?> readonly="readonly">
                    <label for="numero" class="input-label">Número</label>
                </div>

                <div class="input-group">
                    <input type="text" name="colonia" id="colonia" required class="input" maxlength="20" value=<?php echo $colonia;?> readonly="readonly">
                    <label for="colonia" class="input-label">Colonia</label>
                </div>

                <div class="input-group">
                  <input type="text" name="estado" id="estado" required class="input" maxlength="20" value=<?php echo $estado;?> readonly="readonly">
                    <label for="colonia" class="input-label">Colonia</label>
                </div>

                <div class="input-group">
                    <input type="text" name="municipio" id="municipio" required class="input" maxlength="20" value=<?php echo $municipio;?> readonly="readonly">
                    <label for="colonia" class="input-label">Colonia</label>
                </div>

                <div class="input-group">
                    <input type="text" name="codigoPostal" id="codigoPostal" required class="input" 
                    maxlength="5" minlength="5" value=<?php echo $cp;?> readonly="readonly">
                    <label for="codigo-postal" class="input-label">Código postal</label>
                </div>
            </div>    
            <br>
            <br>
                
            <h3 id="subtitulo">Datos de compra</h3>
            <div class="entrada-2">
                <div class="input-group">
                    <label for="nombre-producto" class="input-label">Producto</label>
                    <input type="text" name="nombreProducto" id="nombreProducto" required class="input" maxlength="40" >
                </div>

                <div class="input-group">
                    <input type="text" name="precioUnitario" id="precioUnitario" required class="input" maxlength="16" >
                    <label for="precio-unitario" class="input-label">Precio unitario</label>
                </div>

                <div class="input-group">
                    <input type="text" name="cantidad" id="cantidad" required class="input" maxlength="2" minlength="2" >
                    <label for="producto-cantidad" class="input-label">Cantidad</label>
                </div>

                <div class="input-group">
                    <input type="text" name="subtotal" id="subtotal" required class="input"maxlength="2" minlength="2" >
                    <label for="subtotal" class="input-label">Subtotal</label>
                </div>

                <div class="input-group">
                    <input type="text" name="total" id="total" class="input" maxlength="3" minlength="3">
                    <label for="total" class="input-label">Total</label>
                </div>
            </div>
            <br>

            <input type="submit" name="genCompra" id="genCompra" value="Finalizar compra" class="btn" disabled>
            <!-- <input type="button" id='comprar' name='comprar' value="Comprar" onclick="datos();" class="btn"> -->
            <br>
            <br>
            <br>

            
        </article>
    </section>
    <script src="js/linkHome.js"></script>
</body>

</html>

<?php
$idProducto=$_GET["item"];
//$idProducto=13;

  echo "
  <script>
    let auxId= $idProducto;
  </script>";

?>

<script>
  function datos(){
    let envio= auxId;
    window.location.href="ventana_confirmacion.php?item="+envio;
  }
</script>
exista tarjeta, saldo, ccv

Datos de la compra
Producto, Precio unitario, cantidad, subtotal, total