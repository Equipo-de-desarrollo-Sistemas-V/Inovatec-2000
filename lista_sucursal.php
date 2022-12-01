<?php
error_reporting(0);
session_start();
include("perSucursales.php");
$sesion_i = $_SESSION["nombres"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista sucursal</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="administrativo.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="js/consulSucursal.js"></script>
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

						<li><a href="#">Reportes</a>
							<ul>
								<li><a id="menuVentas1" href="registro_ventas.php" >Ventas
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
	
		<div class="contenidoListaSuc" id="contenidoListaSuc">
			<article>
				<h1 align="center">Lista de Sucursales</h1>
				<div class="contenido-barra-buscar">
					<input type="text" name="busqueda" id="busqueda" placeholder="Buscar..." required />
					<button class="btn-buscar">
						<i class="fas fa-search icon"></i>
					</button>
				</div>
				<br>

				<section class="tablas" id="tablaResultado">
					<!-- <table>
						<thead>
						<?php
							/*$serverName='inovatecserver.database.windows.net';
							$connectionInfo = array("Database" => "InovatecBD", "UID" => "Inovatecadm", "PWD" => "ProyectoProgramacion5", "CharacterSet" => "UTF-8");
							$conn_sis=sqlsrv_connect($serverName, $connectionInfo);*/
							?>
							<tr>
								<th>Id</th> 
								<th>Ciudad</th> 
								<th>Estado</th>
								<th>Estado</th> 
								<th>Acciones</th>
								<th></th>
							</tr>
						</thead>
						<?php
						/*$query0="SELECT COUNT(*) AS total_sucursales FROM sucursal";
						$res0= sqlsrv_query($conn_sis, $query0);
						if( $res0 === false) {
							die( print_r( sqlsrv_errors(), true) );
						}
						while( $row0 = sqlsrv_fetch_array($res0) ) {
							$total_sucursales=$row0["total_sucursales"];
						}
						$por_pagina=1;
						if (empty($_GET['pagina'])){
							$pagina=1;
						}else{
							$pagina=$_GET['pagina'];
						}
						$desde=($pagina-1)*$por_pagina;
						$total_paginas=ceil($total_sucursales/$por_pagina);

						$query="SELECT * FROM sucursal ORDER BY id_sucursal OFFSET $desde ROWS FETCH NEXT $por_pagina ROWS ONLY";
						$res= sqlsrv_query($conn_sis, $query);
						if( $res === false) {
							die( print_r( sqlsrv_errors(), true) );
						}
						while( $row = sqlsrv_fetch_array($res) ) {
							$id=$row["id_sucursal"];
							$nombre0=$row["ciudad_est"];
							$query1="SELECT municipios_id FROM estados_municipios WHERE id='$nombre0'";
							$res1= sqlsrv_query($conn_sis, $query1);
							if( $res1 === false) {
								die( print_r( sqlsrv_errors(), true) );
							}
							while( $row1 = sqlsrv_fetch_array($res1) ) {
								$nombre00=$row1["municipios_id"];
							}
							$query2="SELECT municipio FROM municipios WHERE Id_Municipios='$nombre00'";
							$res2= sqlsrv_query($conn_sis, $query2);
							if( $res2 === false) {
								die( print_r( sqlsrv_errors(), true) );
							}
							while( $row2 = sqlsrv_fetch_array($res2) ) {
								$nombre=$row2["municipio"];
							}
							$query3="SELECT estados_id FROM estados_municipios WHERE id='$nombre0'";
							$res3= sqlsrv_query($conn_sis, $query3);
							if( $res3 === false) {
								die( print_r( sqlsrv_errors(), true) );
							}
							while( $row3 = sqlsrv_fetch_array($res3) ) {
								$estado0=$row3["estados_id"];
							}
							$query4="SELECT Estado FROM estados WHERE Id='$estado0'";
							$res4= sqlsrv_query($conn_sis, $query4);
							if( $res4 === false) {
								die( print_r( sqlsrv_errors(), true) );
							}
							while( $row4 = sqlsrv_fetch_array($res4) ) {
								$estado=$row4["Estado"];
							}
							$edi='Editar';
							$eli='Eliminar';
							echo '<tr>
								<td>'.$id.'</td>
								<td>'.$nombre.'</td>
								<td>'.$estado.'</td>
								<td>'.'<a href="LOGActualizar_Suc.php?item='.$id.'">'.$edi. '</a>'.'</td>
								<td>'.'<a href="LOGEliminar_Suc.php?id='.$id.'" ; class="table__item_link">'.$eli. '</a>'.'</td>
								</tr>';
							}
						sqlsrv_close($conn_sis);*/
						?>
					</table> -->
					<!-- <div class="paginador">
						<ul>
						<?php
							/*if($pagina!=1)
							{
						?>
							<li><a href="?pagina=<?php echo 1; ?>">|<</a><li>
							<li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a><li>
						<?php
							}
							for ($i=1;$i<=$total_paginas; $i++){
								if($i==$pagina)
								{
									echo '<li class="pageSelected">'.$i.'</li>';
								}else{
									echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
								}
							}

							if($pagina!=$total_paginas)*/
							{
						?>
							<li><a href="?pagina=<?php //echo $pagina + 1; ?>">>></a></li>
							<li><a href="?pagina=<?php //echo $total_paginas; ?>">>|</a></li>
						<?php } ?>
						</ul>
					</div> -->
				</section>
			</article>
		</div>
    </main>
	<!-- <script src="alertaEliminar_Suc.js"></script> -->
</body>
</html>