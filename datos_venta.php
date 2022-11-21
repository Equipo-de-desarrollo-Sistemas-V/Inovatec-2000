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

$query2 = "SELECT * 
FROM banco 
WHERE noTarjeta='$no_tar'";
  $resultado2 = sqlsrv_query($con, $query2);
  $cont=0;
  while( $row2 = sqlsrv_fetch_array($resultado2) ) {
      $cont++;
  }
  if ($cont!=0){
    $resultadoS = sqlsrv_query($con, $query2);
    $rowS=sqlsrv_fetch_array($resultadoS);
    $auxTar=$rowS["noTarjeta"];
    $auxCCV=$rowS["ccv"];
    $auxDin=$rowS["dineros"];
    //$nombre="si hay";
  }else{
    $auxTar="";
    $auxCCV="";
    $auxDin="";
  }

$query ="SELECT colonia, calle, no_calle, codigo_postal, municipios.municipio, estados.Estado
FROM Direccion, estados_municipios, estados, municipios
WHERE Ciudad_Estado=estados_municipios.id and
estados_municipios.estados_id = estados.id and
estados_municipios.municipios_id = municipios.Id_Municipios and
Usuario ='".$sesion_i."'";
  $resultado=sqlsrv_query($con, $query);
  $row = sqlsrv_fetch_array($resultado);
  $colonia=$row['colonia'];
  $calle=$row['calle'];
  $no_calle=$row['no_calle'];
  $cp=$row['codigo_postal'];
  $municipio=$row['municipio'];
  $estado=$row['Estado'];

//obtengo el arreglo del url de productos de la compra y su cantidad 
$arrProd = (array)json_decode($_GET["item"]);
$numPro=count($arrProd);
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <title>Datos venta</title>
  <!-- Importación de los archivos css para el uso de la página -->
  <link rel="stylesheet" href="css/menuPrincipal.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/datosVenta.css">
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
                    <input type="text" name="nombreTarjeta" id="nombreTarjeta" class="input" value="<?php echo $nombre;?>" readonly="readonly">
                    
                </div>

                <div class="input-group">
                    <input type="text" name="numeroTarjeta" id="numeroTarjeta" class="input" value="<?php echo $no_tar;?>" readonly="readonly">
                    <label for="numero-tarjeta" class="input-label">Número de tarjeta</label>
                </div>

                <div class="input-group">
                    <input type="text" name="monthExpiracion" id="monthExpiracion" class="input" value="<?php echo $fecha;?>" readonly="readonly">
                    <label for="month-expiracion" class="input-label">Mes de expiración</label>
                </div>

                <div class="input-group">
                    <input type="text" name="yearExpiracion" id="yearExpiracion" class="input" value="<?php echo $fecha1;?>" readonly="readonly">
                    <label for="year-expiracion" class="input-label">Año de expiración</label>
                </div>
                <div class="input-group">
                    <input type="text" name="ccv" id="ccv" class="input" maxlength="3" minlength="3" required>
                    <label for="ccv" class="input-label">CCV</label>
                </div>
            </div>
            <br>
            <br>

            <h3 id="subtitulo">Datos de dirección</h3>
            <div class="entrada-2">
                <div class="input-group">
                    <input type="text" name="calle" id="calle" class="input" value="<?php echo $calle;?>" readonly="readonly">
                    <label for="calle" class="input-label">Calle</label>
                </div>

                <div class="input-group">
                    <input type="text" name="numero" id="numero" class="input" value="<?php echo $no_calle;?>" readonly="readonly">
                    <label for="numero" class="input-label">Número</label>
                </div>

                <div class="input-group">
                    <input type="text" name="colonia" id="colonia" class="input" value="<?php echo $colonia;?>" readonly="readonly">
                    <label for="colonia" class="input-label">Colonia</label>
                </div>

                <div class="input-group">
                  <input type="text" name="estado" id="estado" class="input" value="<?php echo $estado;?>" readonly="readonly">
                    <label for="colonia" class="input-label">Estado</label>
                </div>

                <div class="input-group">
                    <input type="text" name="municipio" id="municipio" required class="input" maxlength="20" value=<?php echo $municipio;?> readonly="readonly">
                    <label for="colonia" class="input-label">Municipio</label>
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

            <div class="tabla-datos-compra">
              <table>
                <thead>
                  <tr>
                    <th> <b>Producto</b> </th> 
                    <td> <b>Precio unitario $</b> </td> 
                    <td> <b>Cantidad</b> </td> 
                    <td> <b>Subtotal $</b> </td> 
                    <td> <b>Descuento $</b> </td> 
                    <td> <b>Total $</b> </td> 
                  </tr>
                </thead>
                <?php
                    $aux=json_encode($arrProd);
                  $x=0;
                  $totDeCompra=0;                  //contador para acumular los totales de cada producto y obtner el monto final de la compra
                  for($i=0;$i<$numPro;$i++) {
                      $idProd=$arrProd[$i][0];                        //id del producto
                      $cantiProd=$arrProd[$i][1];                     //cantidad que se va a comprar
                      $query= "SELECT nombre, precio_ven
                      FROM Productos 
                      where id_producto ='".$idProd."'";
                        $resultado=sqlsrv_query($con, $query);
                        $row = sqlsrv_fetch_array($resultado);
                        $nomProd=$row['nombre'];                      //nombre del prodcuto
                        $precio=substr($row['precio_ven'],0,-2);      //precio de venta
                        $descuento=0;                                 // descuento en pesos
                      $subT=$precio*((int)$cantiProd);                //subtotal a pagar por producto
                      $totProd=$subT-$descuento;                    //
                      $totDeCompra+=$totProd;
                        echo '<tr>
                          <td>'.$nomProd.'</td>
                          <td>'.$precio.'</td>
                          <td>'.$cantiProd.'</td>
                          <td>'.$subT.'</td>
                          <td>'.$descuento.'</td>
                          <td>'.$totProd.'</td>
                          </tr>';
                  }
                  echo '<tr>
                          <td>'."".'</td>
                          <td>'."".'</td>
                          <td>'."".'</td>
                          <td>'."".'</td>
                          <td>'."Total a pagar $".'</td>
                          <td>'.$totDeCompra.'</td>
                          </tr>';
                  echo "
                    <script>
                      // let auxId= $producto;
                      // let auxCan= $cantiCompra;
                      let auxNumTar= $auxTar;
                      let auxCcvTar= $auxCCV;
                      let auxDinTar= $auxDin;
                      let auxTot= $totDeCompra;
                      let arreglo = $aux;
                    </script>";
                        sqlsrv_close($con);

                ?>
              </table>
              <?php
              ?>
            </div>
            <br>

            <input type="button" name="genCompra" id="genCompra" value="Finalizar compra" onclick="datos();" class="btn">
            <br>
            <br>
            <br>

            
        </article>
    </section>
    <script src="js/linkHome.js"></script>
</body>

</html>

<script>
//obtengo el valor  de lo que se esta escribiendo en el input de ccv y valido
ccv.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	ccv.value = valorInput
  .replace(/[^0-9]/, "")
  })

  //Valdido que no este vacio y que el numero sea entero, mientras que no sea verdadero el boton esta desactivado

  const input = document.querySelector('ccv');
  ccv.addEventListener('input', updateValue);
  
  function updateValue(){
    let auxCCV = document.getElementById('ccv').value;
    const comprar = document.getElementById('genCompra');
    let auxLong=auxCCV.toString();
    if (auxLong.length!=3){
      ccv.style.border = "3px solid red";
      genCompra.disabled=true;
    }else{
      ccv.removeAttribute("style");
      genCompra.disabled=false;
    }
  }

  function datos(){
    if (auxNumTar==""){
      alert("Número de tarjeta no existente")
    }else{
      let auxCCV = document.getElementById('ccv').value;
      if (auxCcvTar!=auxCCV){
        alert("CCV incorrecto, favor de verificarlo")
      }else{
        if (auxDinTar<auxTot){
          alert("Monto insuficiente")
        }else{
          
          //let envio= auxId+"/"+auxCan+"/"+auxNumTar;
          location.href="registrarVenta.php?item="+JSON.stringify(arreglo);
/*
          let envio2= auxId+"/"+auxCan;
          location.href="ventana_confirmacion.php?item="+envio2;
          */
          //  location.href="ventana_confirmacion.php?item="+JSON.stringify(arreglo);
        }
      }
    }
    
  }
</script>