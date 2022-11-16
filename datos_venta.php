<?php
error_reporting(0);
session_start();
include("no_iniciada_cli.php");
$sesion_i = $_SESSION["Usuario"];
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
    <?php
    $serverName='localhost';
    $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName, $connectionInfo); 
    $query = "SELECT * FROM Tarjetas WHERE Usuario='$sesion_i'";
    $resultado = sqlsrv_query($con, $query);
    $row=sqlsrv_fetch_array($resultado);
    $no_tar=$row["no_tarjeta"];
    $fecha=$row["fecha_ven_mes"];
    $fecha1=$row["fecha_ven_anio"];
    $nombre=$row["Nombre_Tar"];
    ?>

    <section class="container-all">

        <article id="container-datos-usuario" class="contenedor">
                <!-- <input type="submit" name="boton1" value="Actualizar datos" class="btn"> -->
                <br>
                <br>

            <h3 id="subtitulo">Datos bancarios</h3>

            <div class="entrada-2">
                <div class="input-group">
                    <label for="nombre-tarjeta" class="input-label">Nombre en la tarjeta</label>
                    <input type="text" name="nombreTarjeta" id="nombreTarjeta" required class="input" maxlength="40" value=<?php echo $nombre;?>>
                    
                </div>

                <div class="input-group">
                    <input type="text" name="numeroTarjeta" id="numeroTarjeta" required class="input" maxlength="16" value=<?php echo $no_tar;?>>
                    <label for="numero-tarjeta" class="input-label">Número de tarjeta</label>
                </div>

                <div class="input-group">
                    <input type="text" name="monthExpiracion" id="monthExpiracion" required class="input" maxlength="2" minlength="2" value=<?php echo $fecha;?>>
                    <label for="month-expiracion" class="input-label">Mes de expiración</label>
                </div>

                <div class="input-group">
                    <input type="text" name="yearExpiracion" id="yearExpiracion" required class="input"maxlength="2" minlength="2" value=<?php echo $fecha1;?>>
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
                        <input type="text" name="calle" id="calle" required class="input" maxlength="20">
                        <label for="calle" class="input-label">Calle</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="numero" id="numero" required class="input" maxlength="10">
                        <label for="numero" class="input-label">Número</label>
                    </div>

                    <div class="input-group">
                        <input type="text" name="colonia" id="colonia" required class="input" maxlength="20" >
                        <label for="colonia" class="input-label">Colonia</label>
                    </div>

                    <div class="input-group">
                    <select name="estado" id="estado" name="estado" class="estado">
                    <option value="<?php echo $auxEst;?>"><?php echo $estado;?></option>
                                <?php
                                $serverName='localhost';
                                $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
                                $con = sqlsrv_connect($serverName, $connectionInfo); 
                                
                                $query = "SELECT Id, Estado FROM estados";
                                $resultado = sqlsrv_query($con, $query);

                                    while($row = sqlsrv_fetch_array($resultado)){?>
                                        <option value="<?php echo $row['Id'];?>"><?php echo $row['Estado'];?></option>
                                <?php } ?>
                            </select>
                        <!-- <input type="text" name="estado" id="estado" required class="input" value=
                        //?php echo $estado;?>>
                        <label for="estado" class="input-label">Estado</label> -->
                    </div>

                    <div class="input-group">
                            <select name="municipio" id="municipio" class="municipio">
                                <option value="<?php echo $auxMun;?>"><?php echo $municipio;?></option>
                                
                                <!-- Generar aquí el contenido de las ciudades -->
                            </select>
                        <!-- <input type="text" name="municipio" id="municipio" required class="input" value=
                        //</?p//hp echo $municipio;?>>
                        <label for="municipio" class="input-label">Municipio</label> -->


                    </div>

                    <div class="input-group">
                        <input type="text" name="codigoPostal" id="codigoPostal" required class="input" 
                        maxlength="5" minlength="5">
                        <label for="codigo-postal" class="input-label">Código postal</label>
                    </div>

                </div>    

                <!-- <input type="submit" name="boton3" value="Actualizar contraseña" class="btn"> -->
                <br>
                <br>
                <br>



                <input type="submit" name="boton4" id="boton4" value="Comprar" class="btn" disabled>
                <br>
                <br>
                <br>

            </form>
        </article>
        <script src="js/alertasPerfil.js"></script>
        <script src="js/validPerfil.js"></script>
    </section>
    <script src="js/linkHome.js"></script>
</body>

</html>
