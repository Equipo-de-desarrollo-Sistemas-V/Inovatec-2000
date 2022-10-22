<?php
session_start();
include("perProveedor.php");
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
	<link rel="stylesheet" href="administrativo.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="js/consulProveedor.js"></script>
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

			<div class="btn-header">
				<li><a class="btn-cerrar-session" type="button" href="cerrar.php">Cerrar sesion</a></li>
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

						<li><a href="#">Ventas</a>
							<ul>
								<li><a id="menuVentas1" href="registro_ventas.php" >Registro de ventas</a></li>
								<li><a id="menuVentas2" href="informe_ventas.php">Reporte de ventas</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
    <main>
        <div class="contenidoListaProv" id="contenidoListaProv">
            <article>
                <h1 align="center">Lista de proveedores</h1>
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
							/*$serverName='localhost';
							$connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
							$conn_sis=sqlsrv_connect($serverName, $connectionInfo);*/
							?>
                            <tr>
                                <th>Id</th> 
                                <th>Empresa</th> 
                                <th>RFC</th> 
                                <th>Correo</th> 
								<th>Estado</th>
                                <th>Acciones</th>
								<th></th>
                            </tr>
                        </thead>
						<?php /*
						$query0="SELECT COUNT(*) AS total_proveedores FROM Proveedores";
						$res0= sqlsrv_query($conn_sis, $query0);
						if( $res0 === false) {
							die( print_r( sqlsrv_errors(), true) );
						}
						while( $row0 = sqlsrv_fetch_array($res0) ) {
							$total_proveedores=$row0["total_proveedores"];
						}
						$por_pagina=2;
						if (empty($_GET['pagina'])){
							$pagina=1;
						}else{
							$pagina=$_GET['pagina'];
						}
						$desde=($pagina-1)*$por_pagina;
						$total_paginas=ceil($total_proveedores/$por_pagina);

						$query="SELECT * FROM Proveedores ORDER BY id_proveedor OFFSET $desde ROWS FETCH NEXT $por_pagina ROWS ONLY";
						$res= sqlsrv_query($conn_sis, $query);
						if( $res === false) {
							die( print_r( sqlsrv_errors(), true) );
						}
						while( $row = sqlsrv_fetch_array($res) ) {
							$id=$row["id_proveedor"];
							$nombre=$row["nombre_empresa"];
							$rfc=$row["RFC"];
							$email=$row["email_empresa"];
							$edi='Editar';
							$eli='Eliminar';
							echo '<tr>
								<td>'.$id.'</td>
								<td>'.$nombre.'</td>
								<td>'.$rfc.'</td>
								<td>'.$email.'</td>
								<td>'.'<a href="LOGActualizar.php?item='.$id.'">'.$edi. '</a>'.'</td>
								<td>'.'<a href="LOGEliminar_Prov.php?id='.$id.'" ; class="table__item_link">'.$eli. '</a>'.'</td>
								</tr>';
							}
						sqlsrv_close($conn_sis);*/
						?>
                    </table> -->
					<!-- <div class="paginador">
						<ul>
						<?php
							// if($pagina!=1)
							// {
						?>
							<li><a href="?pagina=<?php echo 1; ?>">|<</a><li>
							<li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a><li>
						<?php
							/*}
							for ($i=1;$i<=$total_paginas; $i++){
								if($i==$pagina)
								{
									echo '<li class="pageSelected">'.$i.'</li>';
								}else{
									echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
								}
							}

							if($pagina!=$total_paginas)
							{*/
						?>
							<li><a href="?pagina=<?php //echo $pagina + 1; ?>">>></a></li>
							<li><a href="?pagina=<?php // echo $total_paginas; ?>">>|</a></li>
						<?php //} ?>
						</ul>
					</div> -->
                </section>
            </article>
        </div>
    </main>
	<!-- <script src="alertaEliminar_Prov.js"></script> -->
</body>
</html>    