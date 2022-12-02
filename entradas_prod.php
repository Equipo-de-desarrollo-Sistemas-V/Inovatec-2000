<?php
error_reporting(0);
session_start();
$sesion_i = $_SESSION["nombres"];
?>

<?php
//informacion para la conexion
$servername = "inovatecserver.database.windows.net";
$info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($servername, $info);

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Entradas de productos</title>

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
		<?php
		$aux=$_GET["item"];
		$array1 = explode("/",$aux);
		$id=$array1[0];
		$id_Suc=$array1[1];
		$serverName='inovatecserver.database.windows.net';
		$connectionInfo = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
		$conn_sis=sqlsrv_connect($serverName, $connectionInfo);
		$querry_productos = "SELECT Inventario_suc.id_producto, Productos.nombre, Inventario_suc.id_sucursal 
		FROM Inventario_suc, Productos
		WHERE Inventario_suc.id_producto=Productos.id_producto and
		Inventario_suc.id_producto = '$id' and Inventario_suc.id_sucursal='$id_Suc'";
		$resultados_productos = sqlsrv_query($conn_sis, $querry_productos);
		$row = sqlsrv_fetch_array($resultados_productos);
		$nombre=$row["nombre"];
		
		
		$querry_sucursales = "SELECT sucursal.id_sucursal as id_sucursal, estados.Estado as estado, municipios.municipio as municipio 
		FROM estados, estados_municipios, municipios, sucursal, Inventario_suc
		WHERE sucursal.id_sucursal='$id_Suc' and
		sucursal.ciudad_est = estados_municipios.id and
		estados_municipios.estados_id = estados.Id and
		municipios.Id_Municipios = estados_municipios.municipios_id";
		$resultados_sucursales = sqlsrv_query($conn_sis, $querry_sucursales);
		$row = sqlsrv_fetch_array($resultados_sucursales);
		$estado=$row["estado"];
		$muni=$row["municipio"];
		?>

		<div class="contenidoInventario" id="contenidoInventario">

			<article>
				<h1 align="center">Entradas de productos</h1>
				<br>
				<form action="" class="formularios" method="post" enctype="multipart/form-data" id="formulario">
					<div class="formulario_grupo-input">
						<label for="idProveedor" class="formulario_label">Producto</label>
						<div class="formulario_grupo-input">
						<select type="text" name="idProducto" id="idProducto" class="formulario_input" readonly="readonly">
								<option  value=" <?php echo $id; ?>"> <?php echo $id . ' - ' . $nombre; ?></option>
							</select>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="empresa" class="formulario_label">Sucursal</label>
						<div class="formulario_grupo-input">
						<select type="text" name="idSuc" id="idSuc" class="formulario_input" readonly="readonly">
								<option  value=" <?php echo $id_Suc; ?>"> <?php echo $id_Suc. ' - '. $muni. ', '. $estado; ?></option>
							</select>
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="carga" class="formulario_label">Carga de productos</label>
						<div class="formulario_grupo-input">
							<input type="text" name="carga" id="carga" class="formulario_input"></input>
						</div>
					</div><br>

					<div class="btn_enviar">
						<button type="submit" class="btn_submit" name="guardar" id="guardar" value="Guardar">Guardar</button>
					</div>

				</form>
			</article>
			<script src="js/validEntrada.js"></script>
		</div>
	</main>

	<script src="js/alertaEntrada.js"></script>
</body>

</html>