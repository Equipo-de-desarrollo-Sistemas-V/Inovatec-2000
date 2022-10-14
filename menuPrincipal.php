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
                        <h3 class="tituloProducto"><span class="seccion1-producto1">Laptop</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion1-precio1">$31,799.49</span></h3>
                    </div>
                    
                    <img src="assets/seccion-1/computadora1.png" alt="">
    
                    <h3 class="nombreProducto"><span class="seccion1-nombre1"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span class="seccion1-producto2">Laptop</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion1-precio2">$21,999.50</span></h3>
                    </div>
                    
                    <img src="assets/seccion-1/computadora2.png" alt="">
    
                    <h3 class="nombreProducto"><span class="seccion1-nombre2"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span class="seccion1-producto3">Laptop</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion1-precio3">$25,989.00</span></h3>
                    </div>
                    
                    <img src="assets/seccion-1/computadora3.png" alt="">
    
                    <h3 class="nombreProducto"><span class="seccion1-nombre3"></span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span class="seccion1-producto4">Laptop</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion1-precio4">$114,699.00</span></h3>
                    </div>
                    
                    <img src="assets/seccion-1/computadora4.png" alt="">
    
                    <h3 class="nombreProducto"><span class="seccion1-nombre4"></span></h3>
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
                        <h3 class="tituloProducto"><span class="seccion2-producto1">Procesador</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion2-precio1">$11,300.00</span></h3>
                    </div>
                    
                    <img src="assets/seccion-2/imagen1.png" alt="">
    
                    <h3 class="nombreProducto"><span class="seccion2-nombre1">AMD Ryzen 9 3950X 16 núcleos 4.7GHz</span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span class="seccion2-producto2">Procesador</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion2-precio2">$9,226.50</span></h3>
                    </div>
                    
                    <img src="assets/seccion-2/imagen2.png" alt="">
    
                    <h3 class="nombreProducto"><span class="seccion2-nombre2">Intel core i9 10900K 5.3GHz Core 1200</span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span class="seccion2-producto3">Procesador</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion2-precio3">$9,899.00</span></h3>
                    </div>
                    
                    <img src="assets/seccion-2/imagen3.png" alt="">
    
                    <h3 class="nombreProducto"><span class="seccion2-nombre3">Intel Core i9 9900 8 núcleos 5GHz</span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span class="seccion2-producto4">Procesador</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion2-precio4">$19,139.00</span></h3>
                    </div>
                    
                    <img src="assets/seccion-2/imagen4.png" alt="">
    
                    <h3 class="nombreProducto"><span class="seccion2-nombre4">AMD Ryzen Threaddripper 2950X 16 núcleos 4.4GHz</span></h3>
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
                        <h3 class="tituloProducto"><span class="seccion3-producto1">Motherboard</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion3-precio1">$4,449.00</span></h3>
                    </div>
                    
                    <img src="assets/seccion-3/imagen1.png" alt="">
    
                    <h3 class="nombreProducto"><span class="seccion3-nombre1">Asus Tarjeta Madre AMD B550 ROG Strix B550-A Gaming</span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span class="seccion3-producto2">Motherboard</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion3-precio2">$11,620.20</span></h3>
                    </div>
                    
                    <img src="assets/seccion-3/imagen2.png" alt="">
    
                    <h3 class="nombreProducto"><span  class="seccion3-nombre2">Asus ROG Strix Z690-E Gaming WiFi Intel LGA 1700 ATX DDR5 Motherboard</span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span class="seccion3-producto3">Motherboard</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion3-precio3">$6,594.38</span></h3>
                    </div>
                    
                    <img src="assets/seccion-3/imagen3.png" alt="">
    
                    <h3 class="nombreProducto"><span class="seccion3-nombre3">ASUS ROG Strix Z490-G (Intel Z490, overclocking, 2 PCIe M.2)</span></h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
    
                <div class="cardProducto">
                    <div class="encabezado">
                        <h3 class="tituloProducto"><span class="seccion3-producto4">Motherboard</span></h3>
                        <h3 class="tituloPrecio"><span class="seccion3-precio4">$8,427.99</span></h3>
                    </div>
                    
                    <img src="assets/seccion-3/imagen4.png" alt="">
    
                    <h3 class="nombreProducto"><span class="seccion3-nombre4">Asus Motherboard ROG Strix X570-F Gaming, Socket AM4, 2ª/3ª Gen AMD Ryzen</span></h3>
                    <a href="#" class="btn">Comprar</a>
            </div>
                        
        </article>
    </section>
</body>
</html>
<?php
    include("conexiones.php");

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

    /* Guarda los valores de los arreglos en un archivo txt y llamalo variables_seccion1 */

    $archivo = fopen("variables_seccion1.txt", "w");
    fwrite($archivo, "Nombres: ");
    fwrite($archivo, print_r($nombres, true));
    fwrite($archivo, "Precios: ");
    fwrite($archivo, print_r($precios, true));
    fwrite($archivo, "Categorias: ");
    fwrite($archivo, print_r($categorias, true));
    fwrite($archivo, "Subcategorias: ");
    fwrite($archivo, print_r($subcategorias, true));
    fclose($archivo);
    
    
?>