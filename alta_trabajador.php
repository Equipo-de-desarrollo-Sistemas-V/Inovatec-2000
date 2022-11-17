<?php
error_reporting(0);
session_start();
include("perTrabajadores.php");
$sesion_i = $_SESSION["nombres"];
?>


<?php
//informacion para la conexion a base de datos
$servername = "localhost";
$info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($servername, $info);

$querry_puestos = "SELECT id_puesto, puesto FROM puestos
WHERE puesto != 'Duenio'";
$resultados_puestos = sqlsrv_query($con, $querry_puestos);

$querry_sucursal = "SELECT sucursal.id_sucursal as id_sucursal, estados.Estado as estado, municipios.municipio as municipio 
FROM estados, estados_municipios, municipios, sucursal
WHERE sucursal.Estado = 'Activo' and
sucursal.ciudad_est = estados_municipios.id and
estados_municipios.estados_id = estados.Id and
municipios.Id_Municipios = estados_municipios.municipios_id";
$resultados_sucursal = sqlsrv_query($con, $querry_sucursal);
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nuevo trabajador</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="administrativo.css">

	<!-- Scripts para el funcionamiento de las combobox -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- <script languaje="javascript" src="js/jquery-3.6.1.min.js"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>
	<!--Script de funcionaminto del menu desplegable-->
	<!-- <script src="funcionamiento.js"></script> -->

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
								<li><a id="menuInventario3" href="entradas_prod.php">Entradas</a></li>
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
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<!--Main General-->
	<main>
		<!--Contenido de la parte TRABAJADOR-->
		<div class="contenidoAgregaTrab" id="contenidoAgregaTrab">
			<article>
				<h1 align="center">Nuevo trabajador</h1>
				<br>
				<form action="" class="formularios" method="post" enctype="multipart/form-data" id="formulario">
					<div class="formulario_grupo-input">
						<label for="idTrabajador" class="formulario_label">Id</label>
						<div class="formulario_grupo-input">
							<input type="text" name="idTrabajador" id="idTrabajador" class="formulario_input" required maxlength="8" minlength="1">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="nombreTabajador" class="formulario_label">Nombre</label>
						<div class="formulario_grupo-input">
							<input type="text" name="nombreTabajador" id="nombreTabajador" class="formulario_input" required maxlength="40">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="apPaterno" class="formulario_label">Apellido paterno</label>

						<div class="formulario_grupo-input">
							<input type="text" name="apPaterno" id="apPaterno" class="formulario_input" required maxlength="20"></input>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="apMaterno" class="formulario_label">Apellido materno</label>

						<div class="formulario_grupo-input">
							<input type="text" name="apMaterno" id="apMaterno" class="formulario_input" maxlength="20"></input>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="rfc" class="formulario_label">RFC</label>
						<div class="formulario_grupo-input">
							<input type="text" name="rfc" id="rfc" class="formulario_input" required maxlength="13" minlength="13">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="correoE" class="formulario_label">Correo electrónico</label>
						<div class="formulario_grupo-input">
							<input type="text" name="correoE" id="correoE" class="formulario_input" required maxlength="255"></input>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="contraseña" class="formulario_label">Contraseña</label>
						<div class="formulario_grupo-input">
							<input type="password" name="contraseña" id="contraseña" class="formulario_input" required minlength="8"></input>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="contraseña2" class="formulario_label">Confirmar contraseña</label>
						<div class="formulario_grupo-input">
							<input type="password" name="contraseña2" id="contraseña2" class="formulario_input" required minlength="8"></input>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="sucursal" class="formulario_label">Sucursal</label>
						<div class="formulario_grupo-input">
							<select type="text" name="sucursal" id="sucursal" class="formulario_input" required>
								<?php

								//cargar los resultados de la consulta en la combobox
								while ($row = sqlsrv_fetch_array($resultados_sucursal)) { ?>
									<option value=" <?php echo $row['id_sucursal']; ?>"> <?php echo $row['id_sucursal'], ' - ' . $row["municipio"] . ', ' . $row["estado"]; ?> </option>

								<?php }
								?>
							</select>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="puesto" class="formulario_label">Puesto</label>
						<div class="formulario_grupo-input">
							<select type="text" name="puesto" id="puesto" class="formulario_input" required>
								<?php

								//cargar los resultados de la consulta en la combobox
								while ($row = sqlsrv_fetch_array($resultados_puestos)) { ?>
									<option value=" <?php echo $row['id_puesto']; ?>"> <?php echo $row['puesto']; ?> </option>

								<?php }
								?>
							</select>
						</div>
					</div>

					<div class="formulario_grupo-input2">
						<label class="formulario_label">Permisos</label>
					</div>

					<div class="formulario_grupo-input">
						<label class="formulario_label-checkbox1"><input type="checkbox" name="cbox1" id="cbox1" value="permiso1"> Acceso a inventario </label>
					</div>

					<div class="formulario_grupo-input">
						<label class="formulario_label-checkbox2"><input type="checkbox" name="cbox2" id="cbox2" value="permiso2"> Acceso a proveedores </label>
					</div>

					<div class="formulario_grupo-input">
						<label class="formulario_label-checkbox1"><input type="checkbox" name="cbox3" id="cbox3" value="permiso3"> Acceso a sucursales </label>
					</div>

					<div class="formulario_grupo-input">
						<label class="formulario_label-checkbox2"><input type="checkbox" name="cbox4" id="cbox4" value="permiso4"> Acceso a ventas </label>
					</div>

					<div class="formulario_grupo-input">
						<label class="formulario_label-checkbox1"><input type="checkbox" name="cbox5" id="cbox5" value="permiso5"> Acceso a promociones </label>
					</div>

					<div class="formulario_grupo-input">
						<label class="formulario_label-checkbox2"><input type="checkbox" name="cbox6" id="cbox6" value="permiso6"> Bloqueado </label>
					</div>

					<div class="btn_enviar">
						<button type="submit" class="btn_submit" name="guardar" id="guardar" value="Guardar">Guardar</button>
					</div>

				</form>
			</article>

		</div>
	</main>
	<script src="js/alertasTrabajador.js"></script>
	<script src="js/validAltaTrabajador.js"></script>

</body>

</html>

<script type="text/javascript">
	$(document).ready(function() {
		$('#sucursal').select2();
	});
</script>