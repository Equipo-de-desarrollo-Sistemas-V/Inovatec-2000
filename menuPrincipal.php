<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importación de los scripts para los iconos -->
    <script src="https://kit.fontawesome.com/2c54bc1d9c.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Menú principal</title>
    <!-- Importación de los archivos css para el uso de la página -->
    <link rel="stylesheet" href="css/menuPrincipal.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <img src="css/assets/Logo_Integrado.svg" required class="logo">
            
            <div class="containerOpciones">
                <div class="containerBuscador">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" class="buscador" id="buscador" placeholder="Realiza una búsqueda">
                </div>

                <div class="containerBtn">
                    <a href="#" class="btn">Iniciar sesión</a>
                    <a href="#" class="btn">Registrate</a>
                    <a href="#" class="btn">Mi perfil</a>
                    <a href="#" class="btn">Mi carrito</a>
                </div>
            </div>
            
        </nav>
    </header>

    <section class="containerAll">
        <article class="containerMenu">
            
            <i class="fa-solid fa-computer"></i>
                <select name="computadoras" id="computadoras" class="categorias">
                    <option value="compu">Computadoras</option>
                    <option value="laptops">Laptops</option>
                    <option value="desktops">Desktops</option>
                    <option value="smartphones">Smartphones</option>
                    <option value="tablets">Tablets</option>
                </select>
            
            <i class="fa-solid fa-microchip"></i>
            <select name="hardware" id="hardware" class="categorias">
                <option value="hardw">Hardware</option>
                <option value="discosDuros">Discos duros</option>
                <option value="procesadores">Procesadores</option>
                <option value="memorias">Memorias</option>
                <option value="placasMadre">Placas madre</option>
            </select>

            <i class="fa-solid fa-keyboard"></i>
            <select name="accesorios" id="accesorios" class="categorias">
                <option value="acces">Accesorios</option>
                <option value="perifericos">Perifericos</option>
                <option value="cables">Cables</option>
                <option value="adaptadores">Adaptadores</option>
                <option value="herramientas">Herramientas</option>
                <option value="limpieza">Limpieza</option>
            </select>

            <i class="fa-solid fa-wrench"></i>
            <select name="electronica" id="electronica" class="categorias">
                <option value="electro">Electrónica</option>
                <option value="monitores">Monitores</option>
                <option value="audifonos">Audífonos</option>
                <option value="microfonos">Micrófonos</option>
                <option value="bocinas">Bocinas</option>
                <option value="capturadorasVideo">Capturadoras de video</option>
            </select>

            <i class="fa-solid fa-wifi"></i>
            <select name="redes" id="redes" class="categorias">
                <option value="red">Redes</option>
                <option value="ruteadores">Ruteadores inalámbicos</option>
                <option value="cablesRed">Cables de red</option>
                <option value="adaptadoresBluethoot">Adaptadores Bluetooth</option>
                <option value="tarjetaRed">Tarjetas de Red</option>
                <option value="adaptadoresInalambricos">Adaptadores inalámbricos</option>
            </select>

            <i class="fa-solid fa-laptop-code"></i>
            <select name="software" id="software" class="categorias">
                <option value="softw">Software</option>
                <option value="antivirus">Antivirus y seguridad</option>
                <option value="sistOperativos">Sistemas operativos</option>
                <option value="ofimatica">Ofimática</option>
                <!-- <option value="">Software punto de venta</option> -->
            </select>

            <i class="fa-solid fa-server"></i>
            <select name="servidores" id="servidores" class="categorias">
                <option value="servers">Servidores</option>
                <option value="accesoriosServers">Accesorios servidores</option>
                <option value="serverRedes">Redes</option>
                <option value="energía">Energía</option>
            </select>

            <i class="fa-solid fa-print"></i>
            <select name="impresion" id="impresion" class="categorias">
                <option value="impres">Impresión</option>
                <option value="consmibles">Consumibles y articulos</option>
                <option value="impresoras">Impresoras</option>
                <!-- <option value="3">Puntos de venta</option> -->
                <option value="scanners">Scanners de cama</option>
            </select>
            
        </article>

        <aside class="lateral"></aside>

        <i class="baseline-assignment_turned_in"></i>
            <article class="slider-frame">
                <ul>
                    <li><img src="assets/imagen-1.jpg" alt=""></li>
                    <li><img src="assets/imagen-2.jpg" alt=""></li>
                    <li><img src="assets/imagen-3.jpg" alt=""></li>
                    <li><img src="assets/imagen-4.jpg" alt=""></li>
                </ul>
            </article>

        <article class="containerProductos" >

            <div class="containerinfo">
                <h2 class="subtitulo">Computadoras</span></h2>
                <a href="#" class="link">Ver más</a>
            </div>

            <div class="containerCards">

                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion1-producto1"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion1-precio1"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-1/computadora1.png" alt="">
    
                    <h3 class="nombreProducto"><span id="seccion1-nombre1"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion1-producto2"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion1-precio2"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-1/computadora2.png" alt="">
    
                    <h3 class="nombreProducto"><span id="seccion1-nombre2"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion1-producto3"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion1-precio3"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-1/computadora3.png" alt="">
    
                    <h3 class="nombreProducto"><span id="seccion1-nombre3"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion1-producto4"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion1-precio4"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-1/computadora4.png" alt="">
    
                    <h3 class="nombreProducto"><span id="seccion1-nombre4"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
            </div>
                        
        </article>

        <article class="containerProductos">

            <div class="containerinfo">
                <h2 class="subtitulo">Procesadores</h2>
                <a href="#" class="link">Ver más</a>
            </div>

            <div class="containerCards">

                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion2-producto1"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion2-precio1"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-2/imagen1.png" alt="">
    
                    <h3 class="nombreProducto"><span id="seccion2-nombre1"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion2-producto2"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion2-precio2"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-2/imagen2.png" alt="">
    
                    <h3 class="nombreProducto"><span id="seccion2-nombre2"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion2-producto3"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion2-precio3"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-2/imagen3.png" alt="">
    
                    <h3 class="nombreProducto"><span id="seccion2-nombre3"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion2-producto4"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion2-precio4"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-2/imagen4.png" alt="">
    
                    <h3 class="nombreProducto"><span id="seccion2-nombre4"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
            </div>
                        
        </article>

        <article class="containerProductos">

            <div class="containerinfo">
                <h2 class="subtitulo">Placas madre</h2>
                <a href="#" class="link">Ver más</a>
            </div>

            <div class="containerCards">

                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion3-producto1"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion3-precio1"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-3/imagen1.png" alt="">
    
                    <h3 class="nombreProducto"><span id="seccion3-nombre1"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion3-producto2"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion3-precio2"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-3/imagen2.png" alt="">
    
                    <h3 class="nombreProducto"><span  id="seccion3-nombre2"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion3-producto3"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion3-precio3"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-3/imagen3.png" alt="">
    
                    <h3 class="nombreProducto"><span id="seccion3-nombre3"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span id="seccion3-producto4"></span></h3>
                        <h3 class="tituloPrecio"><span id="seccion3-precio4"></span></h3>
                    </div>
                    
                    <img src="assets/seccion-3/imagen4.png" alt="">
    
                    <h3 class="nombreProducto"><span id="seccion3-nombre4"></span></h3>
                    <a href="#" class="btn">Comprar</a>
            </div>
                        
        </article>
    </section>
    <script src="js/prueba.js"></script>
</body>
</html>
<?php
    include("conexiones.php");

    /* Realiza una consulta a la base de datos */
    $resultado = sqlsrv_query($conexion, "SELECT productos.nombre, precio_ven, apartados.nombre as categoria, Subapartados.SubApartado as subcategoria FROM $tabla_productos, $tabla_apartados, $tabla_subapartados where Apartado = Apartados.ID_ap and Productos.Subapartado = Id_subap");
    
    /* Declara una lista y guarda los valores dentro de una lista independiente pora nombre, precio_ven y apartados.nombre */
    $nombres = array();
    $precios = array();
    $categorias = array();
    $subcategorias = array();

    while($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){
        $nombres[] = $fila['nombre'];
        $precios[] = $fila['precio_ven'];
        $categorias[] = $fila['categoria'];
        $subcategorias[] = $fila['subcategoria'];
    }

    /* Separa el contenido de nombres en conjuntos de 4 y con javascript pasalo a los span con la clase seccion1-producto*/
    $nombres = array_chunk($nombres, 12);
    $precios = array_chunk($precios, 12);
    $categorias = array_chunk($categorias, 12);
    $subcategorias = array_chunk($subcategorias, 12);
    
    $nombres = $nombres[0];
    $precios = $precios[0];
    $categorias = $categorias[0];
    $subcategorias = $subcategorias[0];

    /* elimina los ultimos dos caracteres de los precios*/
    for($i = 0; $i < count($nombres); $i++){
        $precios[$i] = substr($precios[$i], 0, -2);
    }

    /* Crea un script de javascript para las primeras 4 tarjetas */
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
        
        let nombre1 = document.getElementById('seccion1-nombre1');
        let nombre2 = document.getElementById('seccion1-nombre2');
        let nombre3 = document.getElementById('seccion1-nombre3');
        let nombre4 = document.getElementById('seccion1-nombre4');
        
        /* Asignamos una prueba para mandar nombres */
        subcategoria1.innerHTML = '$subcategorias[0]';
        subcategoria2.innerHTML = '$subcategorias[1]';
        subcategoria3.innerHTML = '$subcategorias[2]';
        subcategoria4.innerHTML = '$subcategorias[3]';
        
        precio1.innerHTML = '$precios[0]';
        precio2.innerHTML = '$precios[1]';
        precio3.innerHTML = '$precios[2]';
        precio4.innerHTML = '$precios[3]';
        
        nombre1.innerHTML = '$nombres[0]';
        nombre2.innerHTML = '$nombres[1]';
        nombre3.innerHTML = '$nombres[2]';
        nombre4.innerHTML = '$nombres[3]';
    </script>";   
    
    /* Crea un script de javascript para las siguientes 4 tarjetas */
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
        
        let nombre5 = document.getElementById('seccion2-nombre1');
        let nombre6 = document.getElementById('seccion2-nombre2');
        let nombre7 = document.getElementById('seccion2-nombre3');
        let nombre8 = document.getElementById('seccion2-nombre4');
        
        /* Asignamos una prueba para mandar nombres */
        subcategoria5.innerHTML = '$subcategorias[4]';
        subcategoria6.innerHTML = '$subcategorias[5]';
        subcategoria7.innerHTML = '$subcategorias[6]';
        subcategoria8.innerHTML = '$subcategorias[7]';
        
        precio5.innerHTML = '$precios[4]';
        precio6.innerHTML = '$precios[5]';
        precio7.innerHTML = '$precios[6]';
        precio8.innerHTML = '$precios[7]';
        
        nombre5.innerHTML = '$nombres[4]';
        nombre6.innerHTML = '$nombres[5]';
        nombre7.innerHTML = '$nombres[6]';
        nombre8.innerHTML = '$nombres[7]';
    </script>";

    /* Crea un script de javascript para las ultimas 4 tarjetas */
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
        
        let nombre9 = document.getElementById('seccion3-nombre1');
        let nombre10 = document.getElementById('seccion3-nombre2');
        let nombre11 = document.getElementById('seccion3-nombre3');
        let nombre12 = document.getElementById('seccion3-nombre4');
        
        /* Asignamos una prueba para mandar nombres */
        subcategoria9.innerHTML = '$subcategorias[8]';
        subcategoria10.innerHTML = '$subcategorias[9]';
        subcategoria11.innerHTML = '$subcategorias[10]';
        subcategoria12.innerHTML = '$subcategorias[11]';
        
        precio9.innerHTML = '$precios[8]';
        precio10.innerHTML = '$precios[9]';
        precio11.innerHTML = '$precios[10]';
        precio12.innerHTML = '$precios[11]';
        
        nombre9.innerHTML = '$nombres[8]';
        nombre10.innerHTML = '$nombres[9]';
        nombre11.innerHTML = '$nombres[10]';
        nombre12.innerHTML = '$nombres[11]';
    </script>";
?>