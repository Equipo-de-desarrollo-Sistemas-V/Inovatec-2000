<?php
error_reporting(0);
session_start();
//include("no_iniciada_cli.php");
$sesion_e = $_SESSION["Usuario"];
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
  <title>Comprar producto</title>
  <!-- Importación de los archivos css para el uso de la página -->
  <link rel="stylesheet" href="css/menuPrincipal.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/productoIndividual.css">
  <link rel="stylesheet" href="css/estiloFooter.css">

</head>

<body>
  
    <input type="checkbox" name="" id="check">

    <nav>
      <img src="css/assets/Logo_Integrado.svg" required class="logo" id="logo">
      <?php echo ucwords("Bienvenido")." ". ucwords($sesion_e);?>

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
            </a>
        </li>
  
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
                    <a href="categorias.php?item=Redes/Ruteadores inalámbricos" >Ruteadores inalámbicos</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Redes/Cables de red">Cables de red</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Redes/Adaptadores Bluetooth">Adaptadores Bluetooth</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="categorias.php?item=Redes/Tarjetas y adaptadores inalámbricos">Tarjertas de red y adaptadores inalámbricos</a>
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
                    <a href="categorias.php?item=Almacenamiento/M.2" >M.2</a>
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
            <div class="imagen_producto">
              <p id="nombre">Nombre del producto</p>

                <img src="" alt=""  id="imagen" class="imagen-producto" height="300" width="300">

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
                  <input type="number" name="cantidadE" id="cantidadE" class="input-cantidad" value="1" min="1" required>
                </div>
                <br>
                <br>
                <input type="button" id='agregar' name='agregar' value="Agregar al carrito" onclick="datos_carrito();" class="btn">
                <br>

                <input type="button" id='comprar' name='comprar' value="Comprar" onclick="datos();" class="btn">
                <br>
                <label align="center" name="existencia" id="existencia" class="label-existentes" disabled>
                  <span>Existentes: </span>
                  <span>0</span>
                </label>
                <input type="hidden" id='auxCanti' name='auxCanti' class="btn">
                <input type="hidden" id='auxProd' name='auxProd' class="btn">
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
    <script src="js/linkHome.js"></script>
    <script src="JsPhp/ObtenerBuscador.js"></script> 
</body>

</html>

<?php
  $idProducto=$_GET["item"];
  //$idProducto=13;

  //Consulta para obtener los datos del productos seleccionado
  $serverName='inovatecserver.database.windows.net';
  $connectionInfo = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
  $con = sqlsrv_connect($serverName, $connectionInfo); 


  $query="SELECT Productos.nombre, Productos.precio_ven, Productos.descripcion, descuento, ruta
  FROM [Productos], [imagenes]
  where Productos.id_producto=imagenes.id_prod and Productos.id_producto=$idProducto";

  $resultado=sqlsrv_query($con, $query);
  if($resultado==true){
    $row = sqlsrv_fetch_array($resultado);
    $nomProd=$row["nombre"];
    $auxPrecio=$row["precio_ven"];
    $desProd=$row["descripcion"];
    $auxDescuento=$row["descuento"];
    $ruta=$row["ruta"];


    if ($auxDescuento!=0){
      $auxPrecioFinal=$auxPrecio-(($auxPrecio*$auxDescuento)/100);
      $precioFinal= "$ ".substr($auxPrecioFinal, 0);
      $descuento= "$ ".substr($auxPrecio, 0, -2);
    }else{
      $precioFinal= "$ ".substr($auxPrecio, 0, -2);
      $descuento="";
    }

    //Obtener el total de existentes del producto, en todas las sucursales.
    $query = "SELECT cantidad FROM Inventario_suc
    WHERE id_producto = $idProducto";
    $resultado = sqlsrv_query($con, $query);

    $existentes = 0;
    while($row = sqlsrv_fetch_array($resultado)){
        $existentes = $existentes + $row["cantidad"];
    }

$resultado=preg_replace("[\n|\r|\n\r]", "<br>", $desProd);
    
    echo "
    <script>
      document.getElementById('nombre').innerHTML = '$nomProd';
      document.getElementById('precio').innerHTML = '$precioFinal';
      document.getElementById('precioDes').innerHTML = '<del>$descuento<del>';
      document.getElementById('existencia').innerHTML = 'Existentes: $existentes';
      document.getElementById('descripcion').innerHTML = '$resultado';
      document.getElementById('imagen').src= '$ruta';
      let auxId= $idProducto;
      let auxExis= $existentes;
    </script>";

  }

  //Cerrar conexion
  sqlsrv_close($con);
?>

<script>
  //obtengo el valor  de lo que se esta escribiendo en el input de cantidad y valido
  cantidadE.addEventListener('keyup', (e) => {
	let valorInput = e.target.value;

	cantidadE.value = valorInput
  .replace(/[^0-9.]/, "")
  })

  //Valdido que no este vacio y que el numero sea entero, mlientras que no sea vedadero el boton esta desactivado
  banCanti=true
  const input = document.querySelector('cantidadE');
  cantidadE.addEventListener('input', updateValue);
  
  function updateValue(){
    let canti = document.getElementById('cantidadE').value;
    const comprar = document.getElementById('comprar');
    if (canti=="" || canti%1!=0 || canti<=0){
      cantidadE.style.border = "3px solid red";
      comprar.disabled=true;
      agregar.disabled=true;
      banCanti=false
    }else{
      cantidadE.removeAttribute("style");
      comprar.disabled=false;
      agregar.disabled=false;
    }
  }


  //funcion que es llamada por el boton de comprar, valido que haya stock, que la cantidad sea menor o igual que el stock
  function datos(){
    let canti = document.getElementById('cantidadE').value;
      if (auxExis==0){
        alert('El stock esta vacío')
      }else{
        if (canti>auxExis){
          alert('Stock insuficiente')
        }else{
          //creo un arreglo para mandar el prodcuto y su cantidad
          var arreProduc = new Array(1);
          arreProduc[0] = new Array(2);
          arreProduc[0][0] = auxId;
          arreProduc[0][1] = canti;
          let envio= arreProduc;
          location.href="datos_venta.php?item="+JSON.stringify(envio);
          
        }
      }
    }
  
  function datos_carrito(){
    let canti = document.getElementById('cantidadE').value;
      if (auxExis==0){
        alert('El stock esta vacío')
      }else{
        if (canti>auxExis){
          alert('Stock insuficiente')
        }else{
          document.getElementById('auxCanti').value=canti;
          document.getElementById('auxProd').value=auxId;

          var auxCanti=document.getElementById("auxCanti").value;
          var auxProd=document.getElementById("auxProd").value;
        
        $.ajax({
            type: "POST",
            url: "datos_carrito.php",
            dataType: "json",
            data: {"auxCanti":auxCanti, "auxProd":auxProd},
            success: function(data){
                alert(data)
            }
        });
          
        }
      }
    }
    

</script>