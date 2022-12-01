<?php
error_reporting(0);
session_start();
include("perProdInv.php");
$sesion_i = $_SESSION["nombres"];
?>


<?php

//informacion para la conexion
$servername = "inovatecserver.database.windows.net";
$info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($servername, $info);

//obtener id y nombres de los productos
$querry_productos = "SELECT id_producto, nombre FROM Productos
		WHERE Estado = 'Activo'";

$resultados_productos = sqlsrv_query($con, $querry_productos);

//obtenr id de las sucursales
$querry_sucursales = "SELECT sucursal.id_sucursal as id_sucursal, estados.Estado as estado, municipios.municipio as municipio 
FROM estados, estados_municipios, municipios, sucursal
WHERE sucursal.Estado = 'Activo' and
sucursal.ciudad_est = estados_municipios.id and
estados_municipios.estados_id = estados.Id and
municipios.Id_Municipios = estados_municipios.municipios_id";

$resultados_sucursales = sqlsrv_query($con, $querry_sucursales);


?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Producto inventario</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="administrativo.css">

	<!-- Scripts para el funrionamiento de las combobox-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- <script languaje="javascript" src="js/jquery-3.6.1.min.js"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
			<?php echo ucwords("Bienvenid@") . " " . ucwords($sesion_i); ?>
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

	<main>
		<!--Contenido de la parte INVENTARIO-->
		<div class="contenidoInventario" id="contenidoInventario">
			<article>
				<h1 align="center">Producto inventario</h1>
				<br>
				<form action="" class="formularios" method="post" enctype="multipart/form-data" id="formulario">
					<div class="formulario_grupo-input">
						<label for="idProveedor" class="formulario_label">Producto</label>
						<div class="formulario_grupo-input">
							<select type="text" name="idProveedor" id="idProv" class="formulario_input" required>
								<option value=""></option>
								<?php

								//cargar los resultados de la consulta en la combobox
								while ($row = sqlsrv_fetch_array($resultados_productos)) { ?>
									<option value=" <?php echo $row['id_producto']; ?>"> <?php echo $row['id_producto'] . ' - ' . $row["nombre"]; ?> </option>

								<?php }
								?>
							</select>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="empresa" class="formulario_label">Sucursal</label>
						<div class="formulario_grupo-input">
							<select type="text" name="empresa" id="empresa" class="formulario_input" required>
								<option value=""></option>
								<?php

								//cargar los resultados de la consulta en la combobox
								while ($row = sqlsrv_fetch_array($resultados_sucursales)) { ?>
									<option value=" <?php echo $row['id_sucursal']; ?>"> <?php echo $row['id_sucursal'], ' - ' . $row["municipio"] . ', ' . $row["estado"]; ?> </option>

								<?php }
								?>
							</select>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="rfcProv" class="formulario_label">Existentes</label>
						<div class="formulario_grupo-input">
							<input type="text" name="existentes" id="existentes" class="formulario_input" required></input>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="correoProv" class="formulario_label">Stock mínimo</label>
						<div class="formulario_grupo-input">
							<input type="text" name="stock" id="stock" class="formulario_input" required></input>
						</div>
					</div><br>

					<div class="btn_enviar">
						<button type="submit" class="btn_submit" name="guardar" id="guardar" value="Guardar">Guardar</button>
					</div>

				</form>
			</article>
			<script src="js/validAltaInventario.js"></script>
		</div>
	</main>

	<script src="js/alertasInventario.js"></script>
</body>

</html>

<!-- funcionamiento de la busqueda inteligente de los select -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#idProv').select2();
	});

	$(document).ready(function() {
		$('#empresa').select2();
	});
</script>	