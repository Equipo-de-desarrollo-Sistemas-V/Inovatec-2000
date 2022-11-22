<?php
//informacion para la conexion a base de datos
$servername = "localhost";
$info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($servername, $info);

$querry_producto = "SELECT id_producto, nombre FROM Productos
WHERE Estado = 'Activo' And descuento = 0";

$resultados = sqlsrv_query($con, $querry_producto);
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nueva promocion</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="administrativo.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- <script languaje="javascript" src="js/jquery-3.6.1.min.js"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

	<!-- script para que salga la foto en el cuadrito -->
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
		<div class="contenidoAgregaProm" id="contenidoAgregaProm">
			<article>
				<h1 align="center">Nueva promoción</h1>
				<br>
				<form action="" class="formularios" method="post" enctype="multipart/form-data" id="formulario">
					<div class="formulario_grupo-input">
						<label for="idProducto" class="formulario_label">Id producto</label>
						<div class="formulario_grupo-input">
							<select type="text" name="idProducto" id="idProducto" class="formulario_input" required>
								<option value=""></option>
								<?php

								//cargar los resultados de la consulta en la combobox
								while ($row = sqlsrv_fetch_array($resultados)) { ?>
									<option value=" <?php echo $row['id_producto']; ?>"> <?php echo $row['id_producto'] . ' - ' . $row["nombre"]; ?> </option>

								<?php }
								?>
							</select>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="descProd" class="formulario_label">Descuento</label>
						<div class="formulario_grupo-input">
							<input type="text" name="descProd" id="descProd" class="formulario_input" required maxlength="3">
						</div>
					</div>


					<div class="photo">
						<label for="foto" class="formulario_label">Imagen</label>
						<div class="prevPhoto">
							<span class="delPhoto notBlock">X</span>
							<label for="foto"></label>
						</div>
						<div class="upimg">
							<input type="file" name="foto" id="foto" class="formulario_input">
						</div>
						<div id="form_alert"></div>
					</div>

					<div class="btn_enviar">
						<input type="submit" class="btn_submit" value="Guardar" id="guardar" name="guardar">
					</div>

				</form>
			</article>
			<script src="js/validAltaProductos.js"></script>
		</div>
	</main>

	<script src="js/alertasProductos.js"></script>
</body>

</html>

<!-- funcionamiento de la busqueda inteligente de los select -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#idProducto').select2();
	});
</script>