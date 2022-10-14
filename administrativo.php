<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu Administrativo</title>
	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/administrativo.css">
</head>
<body>
	<!--Script de funcionaminto del menu desplegable-->
	<script src="js/funcionamientoAdmin.js"></script>

	<!--Estructura Header Superior-->
	<header>
		<div class="header_superior">
			<div class="titulo">
				<h1>Administrativo</h1>
				<div class="logo">
					<img src="css/assets/Nombre.svg" alt="">
				</div>
			</div>

			<div class="btn-header">
			<?php 
			session_start();
			echo ucwords("Bienvenido") . " " . ucwords($_SESSION['nombres']);?>
				<a class="btn-cerrar-session" href="cerrar.php" type="button">Cerrar sesión</a>
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
						<li><a href="#">Inventario</a>
							<ul>
								<li><a id="menuProducto1" href="#" onclick="show('contenidoAgregaProd')">Nuevo Producto</a></li>
								<li><a id="menuProducto2" href="#" onclick="show('contenidoListaProd')">Lista de Productos</a></li>
							</ul>
						</li>

						<li><a href="#">Sucursales</a>
							<ul>
								<li><a id="menuSucursal1" href="#" onclick="show('contenidoAgregaSuc')">Nueva Sucursal</a></li>
								<li><a id="menuSucursal2" href="#" onclick="show('contenidoListaSuc')">Lista de Sucursales</a></li>
							</ul>
						
						</li>

						<li><a href="#">Trabajadores</a>
							<ul>
								<li><a id="menuTrabajador1" href="#" onclick="show('contenidoAgregaTrab')">Nuevo Trabajador</a></li>
								<li><a id="menuTrabajador2" href="#" onclick="show('contenidoListaTrab')">Lista de Trabajadores</a></li>
							</ul>
						</li>

						<li><a href="#">Proveedores</a>
							<ul>
								<li><a id="menuProveedor1" href="#"onclick="show('contenidoAgregaProv')">Nuevo Proveedor</a></li>
								<li><a id="menuProveedor2" href="#" onclick="show('contenidoListaProv')">Lista de Proveedores</a></li>
							</ul>
						</li>

						<li><a href="#">Ventas</a>
							<ul>
								<li><a id="menuVentas1" href="#" onclick="show('contenidoAgregaVenta')">Nueva Venta</a></li>
								<li><a id="menuVentas2" href="#" onclick="show('contenidoListaVenta')">Ventas</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<!--Main General-->
	<main>

		<!--Contenido de la parte PRODUCTOS-->
		<div class="contenidoAgregaProd" id="contenidoAgregaProd">
			<article>
				<h1>Parte de Agregar Productos</h1>
			</article>
		</div>
	
		<div class="contenidoListaProd" id="contenidoListaProd">
			<article>
				<h1>Parte de Lista Productos</h1>
			</article>
		</div>

	<!--Contenido de la parte SUCURSAL-->
		<div class="contenidoAgregaSuc" id="contenidoAgregaSuc">
			<article>
				<h1>Parte de Agregar Sucursal</h1>
			</article>
		</div>
	
		<div class="contenidoListaSuc" id="contenidoListaSuc">
			<article>
				<h1>Parte de Lista Sucursal</h1>
			</article>
		</div>

		<!--Contenido de la parte TRABAJADOR-->
		<div class="contenidoAgregaTrab" id="contenidoAgregaTrab">
			<article>
				<h1>Parte de Agregar Trabajador</h1>
			</article>
		</div>
	
		<div class="contenidoListaTrab" id="contenidoListaTrab">
			<article>
				<h1>Parte de Lista Trabajadores</h1>
			</article>
		</div>

		<!--Contenido de la parte PROVEEDOR-->
		<div class="contenidoAgregaProv" id="contenidoAgregaProv">
			<article>
				<h1>Parte de Agregar Proveedor</h1>
			</article>
		</div>
	
		<div class="contenidoListaProv" id="contenidoListaProv">
			<article>
				<h1>Parte de Lista Proveedores</h1>
			</article>
		</div>

		<!--Contenido de la parte VENTAS-->
		<div class="contenidoAgregaVenta" id="contenidoAgregaVenta">
			<article>
				<h1>Parte de Agregar Venta</h1>
			</article>
		</div>
	
		<div class="contenidoListaVenta" id="contenidoListaVenta">
			<article>
				<h1>Parte de Lista Ventas</h1>
			</article>
		</div>
	</main>
</body>
 <?php
			if (!isset($_SESSION['nombres'])){
				//include_once("login.php");
				header("location: ../Inovatec-2000/login.php");
			}
			?> 
</html>

