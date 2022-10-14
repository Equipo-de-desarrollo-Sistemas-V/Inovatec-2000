<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nueva sucursal</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="administrativo.css">
</head>
<body>

	<!--Estructura Header Superior-->
	<header>
		<div class="header_superior">
			<div class="titulo">
				<h1>Administrativo</h1>
				<div class="logo">
					<img src="assets-administrativo/Nombre.svg" alt="">
				</div>
			</div>

			<div class="btn-header">
				<button class="btn-cerrar-session" type="button">Cerrar session</button>
			</div>
		</div>

		<!-- Menu Desplegable -->
		<div class="container_menu">
			<div class="menu">
				<input type="checkbox" id="check__menu">
				<label id="label__check" for="check__menu">
					<i class="fa-sharp fa-solid fa-bars icon__menu"></i>
				</label>
				<nav>
					<ul>
						<li><a href="#">Productos</a>
							<ul>
								<li><a id="menuProducto1" href="alta_producto.php">Nuevo producto</a></li>
								<li><a id="menuProducto2" href="lista_productos.php">Productos</a></li>
							</ul>
						</li>

						<li><a href="#">Sucursales</a>
							<ul>
								<li><a id="menuSucursal1" href="alta_sucursal.php" >Nueva sucursal</a></li>
								<li><a id="menuSucursal2" href="lista_sucursal.php" >Lista de sucursales</a></li>
							</ul>
						</li>

						<li><a href="#">Trabajadores</a>
							<ul>
								<li><a id="menuTrabajador1" href="alta_trabajador.php">Nuevo trabajador</a></li>
								<li><a id="menuTrabajador2" href="lista_trabajador.php">Lista de trabajadores</a></li>
							</ul>
						</li>

						<li><a href="#">Proveedores</a>
							<ul>
								<li><a id="menuProveedor1" href="alta_proveedor.php">Nuevo proveedor</a></li>
								<li><a id="menuProveedor2" href="lista_proveedor.php">Lista de proveedores</a></li>
							</ul>
						</li>

						<li><a href="#">Inventario</a>
							<ul>
								<li><a id="menuInventario1" href="producto_inventario.php">Productos</a></li>
								<li><a id="menuInventario2" href="consulta_inventario.php">Consulta inventario</a></li>
							</ul>
						</li>

						<li><a href="#">Ventas</a>
							<ul>
								<li><a id="menuVentas1" href="registro_ventas.php" >Registro de ventas</a></li>
								<li><a id="menuVentas2" href="informe_ventas.php">Reporte de ventas</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

    <!--Main General-->
	<main>
        <!--Contenido de la parte SUCURSAL-->
        <div class="contenidoAgregaSuc" id="contenidoAgregaSuc">
            <article>
                <h1 align="center">Nueva sucursal</h1>
                <br>
                <form action="" class="formularios" method="post" enctype="multipart/form-data">
                    <div class="formulario_grupo-input">
                        <label for="idSucursal" class="formulario_label">Id</label> 
                        <div class="formulario_grupo-input">
                            <input type="text" name="idSucursal" id="idSuc" class="formulario_input">
                        </div>
                    </div>

                    <div class="formulario_grupo-input">
                        <label for="ciudadSucursal" class="formulario_label">Ciudad</label> 
                        <div class="formulario_grupo-input">
                            <input type="text" name="ciudadSuc" id="ciudadSuc" class="formulario_input">
                        </div>
                    </div>

                    <div class="formulario_grupo-input">
                        <label for="estado" class="formulario_label">Estado</label>
                        <div class="formulario_grupo-input">
                            <select type="text" name="estado" id="estado" class="formulario_input"></select>
                            </div>
                    </div><br>

					<!--select para la parte de actualizar
					<div class="formulario_grupo-input">
						<label for="estado" class="formulario_label">Estado</label>
						<div class="formulario_grupo-input">
							<select type="text" name="estado" id="estado" class="formulario_input"></select>
						</div>
					</div>
					-->

                    <div class="btn_enviar">
                        <button type="submit" class="btn_submit" value="Guardar">Guardar</button>
                    </div>
                    
                </form>		
            </article>
        </div>
    </main>  
</body>
</html>