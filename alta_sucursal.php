<?php
$servername = "localhost";
$info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($servername, $info);

$query = "SELECT Id, Estado FROM estados";
$resultados = sqlsrv_query($con, $query);

$query_municipios = "SELECT Id_municipios, municipio FROM estados, estados_municipios, municipios
WHERE estados.Id = 32 AND estados.Id = estados_municipios.estados_id AND 
estados_municipios.municipios_id = municipios.Id_Municipios";
$resultados_proveedores = sqlsrv_query($con, $query_municipios);
?>


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nueva sucursal</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="administrativo.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- <script languaje="javascript" src="js/jquery-3.6.1.min.js"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<!-- llama al archivo getSubApartados para obtener solo los suabpartados correspondientes a la categoria seleccionada-->
	<script languaje="javascript">
		$(document).ready(function() {
			$("#estado").change(function() {
				$("#estado option:selected").each(function() {
					Id = $(this).val();
					$.post("getMunicipios.php", {
						Id: Id
					}, function(data) {
						$("#ciudadSuc").html(data);
					});
				});
			})
		});
	</script>
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
		<!--Contenido de la parte SUCURSAL-->
		<div class="contenidoAgregaSuc" id="contenidoAgregaSuc">
			<article>
				<h1 align="center">Nueva sucursal</h1>
				<br>
				<form action="" class="formularios" method="post" enctype="multipart/form-data" id="formulario">
					<div class="formulario_grupo-input">
						<label for="idSucursal" class="formulario_label">Id</label>
						<div class="formulario_grupo-input">
							<input type="text" name="idSucursal" id="idSucursal" class="formulario_input" required maxlength="8" minlength="1">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="estado" class="formulario_label">Estado</label>
						<div class="formulario_grupo-input">
							<select type="text" name="estado" id="estado" class="formulario_input" required>
								<?php

								//cargar los resultados de la consulta en la combobox
								while ($row = sqlsrv_fetch_array($resultados)) { ?>
									<option value=" <?php echo $row['Id']; ?>"> <?php echo $row['Estado']; ?> </option>

								<?php }
								?>
							</select>
							</select>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="ciudadSucursal" class="formulario_label">Municipio</label>
						<div class="formulario_grupo-input">
							<select type="text" name="ciudadSuc" id="ciudadSuc" class="formulario_input" required>

							</select>
						</div>
					</div>


					<br>

					<!--select para la parte de actualizar
					<div class="formulario_grupo-input">
						<label for="estado" class="formulario_label">Estado</label>
						<div class="formulario_grupo-input">
							<select type="text" name="estado" id="estado" class="formulario_input"></select>
						</div>
					</div>
					-->

					<div class="btn_enviar">
						<button type="submit" class="btn_submit" name="guardar" id="guardar" value="Guardar">Guardar</button>
					</div>

				</form>
			</article>
		</div>
	</main>
	<script src="js/validAltaSucursales.js"></script>
</body>

<script src="js/alertasSucursal.js"></script>

</html>

<!-- Sript para la busqueda inteligente (me lo fusilé de con Nayeli) -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#estado').select2();
	});

	$(document).ready(function() {
		$('#ciudadSuc').select2();
	});
</script>