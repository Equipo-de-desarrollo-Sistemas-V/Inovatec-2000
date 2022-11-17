<?php
error_reporting(0);
session_start();
include("no_iniciada.php");
$sesion_i = $_SESSION["nombres"];
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu Administrativo</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<script src="js/push.min.js"></script>

	<?php
		$serverName='localhost';
		$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
		$conn_sis= sqlsrv_connect($serverName, $connectionInfo);
		$query="SELECT id_empleado FROM Empleados WHERE nombres='$sesion_i'";
		$res= sqlsrv_query($conn_sis, $query);

		if($res === false){
			die(print_r(sqlsrv_errors(), true));
		}else{
			$row=sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);
			if (!empty($row)) {
				$id=$row['id_empleado'];
				$query0="SELECT permiso2 FROM Permisos WHERE id_empleado='$id'";
				$res0= sqlsrv_query($conn_sis, $query0);
				if($res0 === false){
					die(print_r(sqlsrv_errors(), true));
				}else{
					$row0=sqlsrv_fetch_array($res0, SQLSRV_FETCH_ASSOC);
					if(!empty($row0)){
						$inventario=$row0["permiso2"];
						if($inventario===1){
							$query0="SELECT* FROM Inventario_suc 
							WHERE cantidad<=stock_min";
							$res0= sqlsrv_query($conn_sis, $query0);
							$row0=sqlsrv_fetch_array($res0, SQLSRV_FETCH_ASSOC);
							if(!empty($row0)){
								//echo "<script>Push.create('Stock mínimo alcanzado',)</script>";
								echo "<script>Push.create('Stock mínimo alcanzado', {
									body: 'Varios productos han alcanzado el stock mínimo', 
									});
								</script>";
							}
							
						}
					}
				}
			}
		}
?>



	<link rel="stylesheet" href="administrativo.css">
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
			<?php echo ucwords("Bienvenido")." ".ucwords($sesion_i);?> 
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
	
</body>
</html>