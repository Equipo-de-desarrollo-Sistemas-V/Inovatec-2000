<?php
$servername = "localhost";
$info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($servername, $info);

$query = "SELECT ID_ap, Nombre FROM Apartados";
$resultados = sqlsrv_query($con, $query);

$query_proveedores = "SELECT id_proveedor, nombre_empresa FROM Proveedores";
$resultados_proveedores = sqlsrv_query($con, $query_proveedores);
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nuevo Producto</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="administrativo.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- <script languaje="javascript" src="js/jquery-3.6.1.min.js"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<!-- llama al archivo getSubApartados para obtener solo los suabpartados correspondientes a la categoria seleccionada-->
	<script languaje="javascript">
		$(document).ready(function() {
			$("#categoria").change(function() {
				$("#categoria option:selected").each(function() {
					Id = $(this).val();
					$.post("getSubApartados.php", {
						Id: Id
					}, function(data) {
						$("#subcategoria").html(data);
					});
				});
			})
		});
	</script>
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

						<li><a href="#">Ventas</a>
							<ul>
								<li><a id="menuVentas1" href="registro_ventas.php">Registro de ventas</a></li>
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
		<!--Contenido de la parte PRODUCTOS-->
		<div class="contenidoAgregaProd" id="contenidoAgregaProd">
			<article>
				<h1 align="center">Nuevo producto</h1>
				<br>
				<form action="" class="formularios" method="post" enctype="multipart/form-data" id="formulario">
					<div class="formulario_grupo-input">
						<label for="idProducto" class="formulario_label">Id</label>
						<div class="formulario_grupo-input">
							<input type="text" name="idProducto" id="idProducto" class="formulario_input" required maxlength="8" minlength="1">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="nombreProd" class="formulario_label">Nombre</label>
						<div class="formulario_grupo-input">
							<input type="text" name="nombreProd" id="nombreProd" class="formulario_input" required maxlength="50">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="categoria" class="formulario_label">Categoria</label>
						<div class="formulario_grupo-input">
							<select type="text" name="categoria" id="categoria" class="formulario_input" required>
								<option value=""></option>
								<?php

								//cargar los resultados de la consulta en la combobox
								while ($row = sqlsrv_fetch_array($resultados)) { ?>
									<option value=" <?php echo $row['ID_ap']; ?>"> <?php echo $row['Nombre']; ?> </option>

								<?php }
								?>
							</select>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="subcategoria" class="formulario_label">Subcategoria</label>

						<div class="formulario_grupo-input">
							<select type="text" name="subcategoria" id="subcategoria" class="formulario_input" required>
								<!-- <option value="0">Subcategoría</option> -->
							</select>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="precioCompra" class="formulario_label">Precio de compra</label>
						<div class="formulario_grupo-input">
							<input type="text" name="precioProd" id="precioProd" class="formulario_input" required>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="precioVenta" class="formulario_label">Precio de venta</label>
						<div class="formulario_grupo-input">
							<input type="text" name="precioVenta" id="precioVenta" class="formulario_input" required>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="descripcion" class="formulario_label">Descripcion</label>

						<div class="formulario_grupo-input">
							<textarea type="text" name="descripcion" id="descripcion" class="formulario_input-textarea" required></textarea>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="proveedor" class="formulario_label">Proveedor</label>
						<div class="formulario_grupo-input">
							<select name="proveedor" id="sucursal" class="formulario_input required">
								<?php

								//cargar los resultados de la consulta en la combobox
								while ($row = sqlsrv_fetch_array($resultados_proveedores)) { ?>
									<option value=" <?php echo $row['id_proveedor']; ?>"> <?php echo $row['nombre_empresa']; ?> </option>

								<?php }
								?>
							</select>
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

<!-- Sript para la busqueda inteligente (me lo fusilé de con Nayeli) -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#sucursal').select2();
	});
</script>