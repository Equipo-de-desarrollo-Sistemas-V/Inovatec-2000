<?php
error_reporting(0);
session_start();
include("perProveedor.php");
$sesion_i = $_SESSION["nombres"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nuevo proveedor</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="administrativo.css">
</head>

<body>
	<!--Script de funcionaminto del menu desplegable-->
	<script src="funcionamiento.js"></script>

	<!--Estructura Header Superior-->
	<header>
		<div class="header_superior">
			<div class="titulo">
				<h1>Administrativo</h1>
				<div class="logo">
					<img src="assets-administrativo/Nombre.svg" alt="">
				</div>
			</div>
			<?php echo ucwords("Bienvenid@")." ". ucwords($sesion_i);?>
			<div class="btn-header">
				<!-- <li><a class="btn-cerrar-session" type="button" href="cerrar.php">Cerrar sesión</a></li> -->
				<a class="btn-cerrar-session" type="button" href="cerrar.php">Cerrar sesión</a>
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
								<li><a id="menuProducto2" href="lista_productos.php">Lista de Productos</a></li>
							</ul>
						</li>

						<li><a href="#">Sucursales</a>
							<ul>
								<li><a id="menuSucursal1" href="alta_sucursal.php">Nueva sucursal</a></li>
								<li><a id="menuSucursal2" href="lista_sucursal.php">Lista de sucursales</a></li>
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
								<li><a id="menuInventario3" href="stockMin_prod.php">Productos en stock mínimo</a></li>
								<li><a id="menuInventario2" href="consulta_inventario.php">Consulta inventario</a></li>
							</ul>
						</li>

						<li><a href="#">Reportes</a>
							<ul>
								<li><a id="menuVentas1" href="registro_ventas.php">Ventas</a></li>
								<li><a id="menuVentas2" href="informe_ventas.php">Productos</a></li>
							</ul>
						</li>

						<li><a href="#">Promociones</a>
							<ul>
								<li><a id="menuVentas1" href="registro_promocion.php">Nueva promoción</a></li>
								<li><a id="menuVentas2" href="lista_promociones.php">Lista de promociones</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<!--Main General-->
	<main>
		<!--Contenido de la parte PROVEEDOR-->
		<div class="contenidoAgregaProv" id="contenidoAgregaProv">
			<article>
				<h1 align="center">Nuevo proveedor</h1>
				<br>
				<form action="" class="formularios" method="post" enctype="multipart/form-data" id="formulario">
					<div class="formulario_grupo-input">
						<label for="idProveedor" class="formulario_label">Id</label>
						<div class="formulario_grupo-input">
							<input type="text" name="idProveedor" id="idProveedor" class="formulario_input" required maxlength="8" minlength="1">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="empresa" class="formulario_label">Empresa</label>
						<div class="formulario_grupo-input">
							<input type="text" name="empresaProv" id="empresaProv" class="formulario_input" required maxlength="20">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="rfcProv" class="formulario_label">RFC</label>
						<div class="formulario_grupo-input">
							<input type="text" name="rfcProv" id="rfcProv" class="formulario_input" required maxlength="12" minlength="12"></input >
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="correoProv" class="formulario_label">Correo electrónico</label>
						<div class="formulario_grupo-input">
							<input type="email" name="correoProv" id="correoProv" class="formulario_input" required maxlength="255"></input>
						</div>
					</div><br>

					<div class="btn_enviar">
						<button type="submit" class="btn_submit" name="guardar" id="guardar" value="Guardar">Guardar</button>
					</div>

				</form>
			</article>
			<script src="js/validAltaProveedor.js"></script>
		</div>
	</main>

	<script src="js/alertasProveedor.js"></script>
	
</body>

</html>