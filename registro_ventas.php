<?php
error_reporting(0);
session_start();
include("perVentas.php");
$sesion_i = $_SESSION["nombres"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro ventas</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="administrativo.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="js/consulVentas.js"></script>
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
								<li><a id="menuInventario3" href="stockMin_prod.php">Productos en stock mínimo</a></li>
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

	<main>
		<div class="contenidoListaVenta" id="contenidoListaVenta">
			<article>
				<h1 align="center">Registro de ventas</h1>
				<form action="" class="formularios" method="post" action="fechas.php" id="formulario">
				<input type="date" name="fecha1" id="fecha1">
				<input type="date" name="fecha2" id="fecha2">
				</form>	
				<div class="contenido-barra-buscar">
						<input type="text" name="busqueda" id="busqueda" placeholder="Buscar..." required >
						<button class="btn-buscar">
						<i class="fas fa-search icon"></i>

					</button>
				</div>
				<br>

				<section class="tablas" id="tablaResultado">
					<!--<table>
						<thead>
							<tr>
								<th>Id venta</th> 
								<th>Fecha</th> 
								<th>Id producto</th> 
								<th>Producto</th> 
								<th>Id sucursal</th> 
								<th>categoría</th>
								<th>Subcategoría</th>
								<th>Cantidad </th>
								<th>Precio de venta </th>
								<th>Descuento </th>
								<th>Total </th>
								<th></th>
							</tr>
						</thead>
					</table>-->
				</section>
			</article>
			<!-- <script src="js/alerFecha.js"></script> -->
		</div>
    </main>
</body>
</html>

	<!-- llama al archivo getSubApartados para obtener solo los suabpartados correspondientes a la categoria seleccionada-->
	<script lenguaje="javascript">
		$(document).ready(function() {
			$("#fecha1").change(function() {
				auxUno=$('input[id=fecha2]').val()
				if (auxUno!=""){
					alert("Cambio fecha uno"+auxUno);
					//location.href="fechas.php"
					//location.href="fechas.php";
				}
			})
			$("#fecha2").change(function() {
				auxDos=$('input[id=fecha1]').val()
				if (auxDos!=""){
					alert("Cambio feha Dos"+auxDos);
				}
			})
		});
	</script>