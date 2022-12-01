<?php
error_reporting(0);
session_start();
$sesion_i = $_SESSION["nombres"];
?>

<?php
$servername = "localhost";
$info = array("Database" => "PagVentas", "UID" => "usuario", "PWD" => "123", "CharacterSet" => "UTF-8");
$con = sqlsrv_connect($servername, $info);

$query = "SELECT ID_ap, Nombre FROM Apartados";
$resultados = sqlsrv_query($con, $query);

$query_proveedores = "SELECT id_proveedor, nombre_empresa FROM Proveedores
where Estado = 'Activo'";
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
			<?php echo ucwords("Bienvenid@")." ". ucwords($sesion_i);?>
			<div class="btn-header">
				<a class="btn-cerrar-session" type="button" href="cerrar.php">Cerrar sesion</a>
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
				</nav>
			</div>
		</div>
	</header>

	<!--Main General-->
	<main>
		<!--Contenido de la parte PRODUCTOS-->
		<div class="contenidoAgregaProd" id="contenidoAgregaProd">
			<article>
				<h1 align="center">Acceso Denegado</h1>
            </article>
        </div>
    </main>
</body>
</html>