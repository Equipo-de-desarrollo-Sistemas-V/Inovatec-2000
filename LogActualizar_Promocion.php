<?php
error_reporting(0);
session_start();
$sesion_i = $_SESSION["nombres"];
?>

<?php
//informacion para la conexion a base de datos
$servername = "inovatecserver.database.windows.net";
$info = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
$conn_sis = sqlsrv_connect($servername, $info);

$querry_producto = "SELECT id_producto, nombre FROM Productos
WHERE Estado = 'Activo' And descuento = 0";

$resultados = sqlsrv_query($conn_sis, $querry_producto);

$id=$_GET["item"]; 
//echo '<script>alert('.$id.')</script>';
$query="SELECT id_producto,descuento, nombre, ruta 
		FROM Productos,imgpromocion
		WHERE id_prod=id_producto AND id_prod='$id'";
$res= sqlsrv_query($conn_sis, $query);
if( $res === false) {
		die( print_r( sqlsrv_errors(), true) );
}
while( $row = sqlsrv_fetch_array($res) ) {
$id_prod=$row["id_producto"];
$descuento=$row["descuento"];
$nombre=$row["nombre"];
$ruta=$row["ruta"];
}
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

	<!--Main General-->
	<main>
		<div class="contenidoAgregaProm" id="contenidoAgregaProm">
			<article>
				<h1 align="center">Modificar promoción</h1>
				<br>
				<form action="LOGUpdate_Promociones.php" class="formularios" method="post" enctype="multipart/form-data" id=formulario>
					<div class="formulario_grupo-input">
						<label for="idProducto" class="formulario_label">Id producto</label>
						<div class="formulario_grupo-input">
							<input type="text" name="idNomProd" id="idNomProd" class="formulario_input" readonly="readonly" value="<?php echo $id.' - '.$nombre;?>">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="descProd" class="formulario_label">Descuento (%)</label>
						<div class="formulario_grupo-input">
							<input type="text" name="descProd" id="descProd" class="formulario_input" value="<?php echo $descuento;?>" required maxlength="2">
						</div>
					</div>
					<input id="prodId" name="prodId" type="hidden" value="<?php echo $id;?>">



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
			<script src="js/validEditarProm.js"></script> -->
		</div>
	</main>

	<!-- <script src="js/alertasPromociones.js"></script> -->
</body>

</html>
