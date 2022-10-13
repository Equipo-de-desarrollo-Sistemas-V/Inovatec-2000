<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu Administrativo</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
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
								<li><a id="menuProducto1" href="#" onclick="show('contenidoAgregaProd')">Nuevo producto</a></li>
								<li><a id="menuProducto2" href="#" onclick="show('contenidoListaProd')">Lista de productos</a></li>
							</ul>
						</li>

						<li><a href="#">Sucursales</a>
							<ul>
								<li><a id="menuSucursal1" href="#" onclick="show('contenidoAgregaSuc')">Nueva sucursal</a></li>
								<li><a id="menuSucursal2" href="#" onclick="show('contenidoListaSuc')">Lista de sucursales</a></li>
							</ul>
						
						</li>

						<li><a href="#">Trabajadores</a>
							<ul>
								<li><a id="menuTrabajador1" href="#" onclick="show('contenidoAgregaTrab')">Nuevo trabajador</a></li>
								<li><a id="menuTrabajador2" href="#" onclick="show('contenidoListaTrab')">Lista de trabajadores</a></li>
							</ul>
						</li>

						<li><a href="#">Proveedores</a>
							<ul>
								<li><a id="menuProveedor1" href="#"onclick="show('contenidoAgregaProv')">Nuevo proveedor</a></li>
								<li><a id="menuProveedor2" href="#" onclick="show('contenidoListaProv')">Lista de proveedores</a></li>
							</ul>
						</li>

						<li><a href="#">Inventario</a>
							<ul>
								<li><a id="menuInventario1" href="#" onclick="show('contenidoInventario')">Productos</a></li>
								<li><a id="menuInventario2" href="#" onclick="show('contenidoListaInventario')">Consulta inventario</a></li>
							</ul>
						</li>

						<li><a href="#">Ventas</a>
							<ul>
								<li><a id="menuVentas1" href="#" onclick="show('contenidoAgregaVenta')">Nueva venta</a></li>
								<li><a id="menuVentas2" href="#" onclick="show('contenidoListaVenta')">Ventas</a></li>
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
				<h1 align="center">Nuevo productos</h1>
				<br>
				<form action="" class="formularios" method="post" enctype="multipart/form-data">
					<div class="formulario_grupo-input">
						<label for="idProducto" class="formulario_label">Id</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="idProducto" id="idProd" class="formulario_input">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="nombreProd" class="formulario_label">Nombre</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="nombreProd" id="nombreProd" class="formulario_input">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="categoria" class="formulario_label">Categoria</label>

						<div class="formulario_grupo-input">
							<select type="text" name="categoria" id="categoria" class="formulario_input"></select>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="subcategoria" class="formulario_label">Subcategoria</label>

						<div class="formulario_grupo-input">
							<select type="text" name="subcategoria" id="subcategoria" class="formulario_input"></select>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="precioCompra" class="formulario_label">Precio de compra</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="precioProd" id="precioProd" class="formulario_input">
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="precioVenta" class="formulario_label">Precio de venta</label>
						<div class="formulario_grupo-input">
							<input type="text" name="precioVenta" id="precioVenta" class="formulario_input"> 
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="descripcion" class="formulario_label">Descripcion</label> 

						<div class="formulario_grupo-input">
							<textarea type="text" name="descripcion"id="descripcion" class="formulario_input"></textarea>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="proveedor" class="formulario_label">Proveedor</label> 
						<div class="formulario_grupo-input">
							<select name="proveedor" id="sucursal" class="formulario_input"></select>
						</div>
					</div>

					<div class="photo">
						<label for="foto" class="formulario_label">Imagen</label>
							<div class="prevPhoto">
							<span class="delPhoto notBlock">X</span>
							<label for="foto"></label>
							</div>
							<div class="upimg">
							<input type="file" name="foto" id="foto"  class="formulario_input">
							</div>
							<div id="form_alert"></div>
					</div>

					<div class="btn_enviar">
						<button type="submit" class="btn_submit" value="Guardar">Guardar</button>
					</div>

				</form>		
			</article>
		</div>
	
		<div class="contenidoListaProd" id="contenidoListaProd">
			<article>
				<h1 align="center">Productos</h1>
				<div class="contenido-barra-buscar">
					<input type="text" placeholder="Buscar" required />
					<button class="btn-buscar">
						<i class="fas fa-search icon"></i>

					</button>
				</div>
				<br>
				<section class="tablas">
					<table>
						<thead>
						<?php
							$serverName='localhost';
							$connectionInfo=array("Database"=>"PagVentas", "UID"=>"sa", "PWD"=>"lebronjames23", "CharacterSet"=>"UTF-8");
							$conn_sis=sqlsrv_connect($serverName, $connectionInfo);
							?>
							<tr>
								<th>Id</th> 
								<th>Nombre</th> 
								<th>Descripcion</th> 
								<th>Categoria</th> 
								<th>Subcategoria</th> 
								<th>Precio compra</th> 
								<th>Precio venta</th> 
								<th>Proveedor</th>
								<th>Imagen</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<?php
						$query0="SELECT COUNT(*) AS total_registro FROM Productos";
						$res0= sqlsrv_query($conn_sis, $query0);
						if( $res0 === false) {
							die( print_r( sqlsrv_errors(), true) );
						}
						while( $row0 = sqlsrv_fetch_array($res0) ) {
							$total_registro=$row0["total_registro"];
						}
						$por_pagina=3;
						if (empty($_GET['pagina'])){
							$pagina=1;
						}else{
							$pagina=$_GET['pagina'];
						}
						$desde=($pagina-1)*$por_pagina;
						$total_paginas=ceil($total_registro/$por_pagina);
						
						$query="SELECT * FROM Productos ORDER BY id_producto OFFSET $desde ROWS FETCH NEXT $por_pagina ROWS ONLY";
						$res= sqlsrv_query($conn_sis, $query);
						if( $res === false) {
							die( print_r( sqlsrv_errors(), true) );
						}
						while( $row = sqlsrv_fetch_array($res) ) {
							$id=$row["id_producto"];
							$nombre=$row["nombre"];
							$descri=$row["descripcion"];
							$cate=$row["Apartado"];
							$query1="SELECT Nombre FROM Apartados WHERE ID_ap='$cate'";
							$res1= sqlsrv_query($conn_sis, $query1);
							if( $res1 === false) {
								die( print_r( sqlsrv_errors(), true) );
							}
							while( $row1 = sqlsrv_fetch_array($res1) ) {
								$categoria=$row1["Nombre"];
							}
							$subcate=$row["Subapartado"];
							$pre_com=$row["precio_com"];
							$pre_ven=$row["precio_ven"];
							$prove=$row["id_proveedor"];
							$query2="SELECT nombre_empresa FROM Proveedores WHERE id_proveedor='$prove'";
							$res2= sqlsrv_query($conn_sis, $query2);
							if( $res2 === false) {
								die( print_r( sqlsrv_errors(), true) );
							}
							while( $row2 = sqlsrv_fetch_array($res2) ) {
								$proveedor=$row2["nombre_empresa"];
							}
							$edi='Editar';
							$eli='Eliminar';
							echo '<tr>
									<td>'.$id.'</td>
									<td>'.$nombre.'</td>
									<td>'.$descri.'</td>
									<td>'.$categoria.'</td>
									<td>'.$subcate.'</td>
									<td>'.$pre_com.'</td>
									<td>'.$pre_ven.'</td>
									<td>'.$proveedor.'</td>
									<td>'.'</td>
									<td>'.'<a href="LOGActualizar.php?item='.$id.'">'.$edi. '</a>'.'</td>
									<td>'.'<a href="LOGEliminar_p.php?id='.$id.'" onclick="return confirm('.$text.');">'.$eli. '</a>'.'</td>
									</tr>';
						}
						?>
					</table>
					<div class="paginador">
						<ul>
						<?php
							if($pagina!=1)
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

							if($pagina!=$total_paginas)
							{
						?>
							<li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
							<li><a href="?pagina=<?php echo $total_paginas; ?>">>|</a></li>
						<?php } ?>
						</ul>
					</div>
				</section>
			</article>
		</div>

	<!--Contenido de la parte SUCURSAL-->
		<div class="contenidoAgregaSuc" id="contenidoAgregaSuc">
			<article>
				<h1 align="center">Nueva sucursal</h1>
				<br>
				<form action="" class="formularios" method="post" enctype="multipart/form-data">
					<div class="formulario_grupo-input">
						<label for="idSucursal" class="formulario_label">Id</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="idSucursal" id="idSuc" class="formulario_input">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="ciudadSucursal" class="formulario_label">Ciudad</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="ciudadSuc" id="ciudadSuc" class="formulario_input">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="estado" class="formulario_label">Estado</label>
						<div class="formulario_grupo-input">
							<select type="text" name="estado" id="estado" class="formulario_input"></select>
 						</div>
					</div><br>

					<div class="btn_enviar">
						<button type="submit" class="btn_submit" value="Guardar">Guardar</button>
					</div>
					
				</form>		
			</article>
		</div>
	
		<div class="contenidoListaSuc" id="contenidoListaSuc">
			<article>
				<h1 align="center">Lista de sucursales</h1>
				<div class="contenido-barra-buscar">
					<input type="text" placeholder="Buscar" required />
					<button class="btn-buscar">
						<i class="fas fa-search icon"></i>
					</button>
				</div>
				<br>

				<section class="tablas">
					<table>
						<thead>
							<tr>
								<th>Id</th> 
								<th>Ciudad</th> 
								<th>Estado</th> 
							</tr>
						</thead>
					</table>
				</section>
			</article>
		</div>

		<!--Contenido de la parte TRABAJADOR-->
		<div class="contenidoAgregaTrab" id="contenidoAgregaTrab">
			<article>
				<h1 align="center">Nuevo trabajador</h1>
				<br>
				<form action="" class="formularios" method="post" enctype="multipart/form-data">
					<div class="formulario_grupo-input">
						<label for="idTrabajador" class="formulario_label">Id</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="idTrabajador" id="idTrabajador" class="formulario_input">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="nombreTabajador" class="formulario_label">Nombre</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="nombreTabajador" id="nombreTabajador" class="formulario_input">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="apPaterno" class="formulario_label">Apellido paterno</label>

						<div class="formulario_grupo-input">
							<input type="text" name="apPaterno" id="apPaterno" class="formulario_input"></input>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="apMaterno" class="formulario_label">Apellido materno</label>

						<div class="formulario_grupo-input">
							<input type="text" name="apMaterno" id="apMaterno" class="formulario_input"></input>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="rfc" class="formulario_label">RFC</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="rfc" id="rfc" class="formulario_input">
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="puesto" class="formulario_label">Puesto</label>
						<div class="formulario_grupo-input">
							<input type="text" name="puesto" id="puesto" class="formulario_input"> 
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="usuario" class="formulario_label">Usuario</label> 

						<div class="formulario_grupo-input">
							<input type="text" name="usuario"id="usuario" class="formulario_input"></input>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="contraseña" class="formulario_label">Contraseña</label> 
						<div class="formulario_grupo-input">
							<input type="password" name="contraseña" id="contraseña" class="formulario_input"></input>
						</div>
					</div>

					<div class="formulario_grupo-input2">
						<label class="formulario_label">Permisos</label> 
					</div>

					<div class="formulario_grupo-input">
							<label class="formulario_label-checkbox1"><input type="checkbox" id="cbox1" value="permiso1"> Acceso a inventario </label>
					</div>

					<div class="formulario_grupo-input">
						<label class="formulario_label-checkbox2"><input type="checkbox" id="cbox2" value="permiso2"> Acceso a proveedores </label>
					</div>

					<div class="formulario_grupo-input">
							<label class="formulario_label-checkbox1"><input type="checkbox" id="cbox3" value="permiso3"> Acceso a sucursales </label>
					</div>

					<div class="formulario_grupo-input">
						<label class="formulario_label-checkbox2"><input type="checkbox" id="cbox4" value="permiso4"> Acceso a ventas </label>
					</div>

					<div class="formulario_grupo-input">
							<label class="formulario_label-checkbox1"><input type="checkbox" id="cbox5" value="permiso5"> Acceso a promociones </label>
					</div>

					<div class="formulario_grupo-input">
						<label class="formulario_label-checkbox2"><input type="checkbox" id="cbox6" value="permiso6"> Bloqueado </label>
					</div>

					<div class="btn_enviar">
						<button type="submit" class="btn_submit" value="Guardar">Guardar</button>
					</div>

				</form>		
			</article>
			
		</div>
	
		<div class="contenidoListaTrab" id="contenidoListaTrab">
			<article>
				<h1 align="center">Lista de trabajadores</h1>
				<div class="contenido-barra-buscar">
					<input type="text" placeholder="Buscar" required />
					<button class="btn-buscar">
						<i class="fas fa-search icon"></i>

					</button>
				</div>
				<br>

				<section class="tablas">
					<table>
						<thead>
							<tr>
								<th>Id</th> 
								<th>Nombre</th> 
								<th>Ap. paterno</th> 
								<th>Ap. materno</th> 
								<th>RFC</th> 
								<th>Pue+</th> 
								<th>Usuario</th>
								<th>Permisos</th>
							</tr>
						</thead>
					</table>
				</section>
			</article>
		</div>

		<!--Contenido de la parte PROVEEDOR-->
		<div class="contenidoAgregaProv" id="contenidoAgregaProv">
			<article>
				<h1 align="center">Nuevo proveedor</h1>
				<br>
				<form action="" class="formularios" method="post" enctype="multipart/form-data">
					<div class="formulario_grupo-input">
						<label for="idProveedor" class="formulario_label">Id</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="idProveedor" id="idProv" class="formulario_input">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="empresa" class="formulario_label">Empresa</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="empresa" id="empresaProv" class="formulario_input">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="rfcProv" class="formulario_label">RFC</label>
						<div class="formulario_grupo-input">
							<input type="text" name="rfcProv" id="rfcProv" class="formulario_input"></input>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="correoProv" class="formulario_label">Correo electrónico</label>
						<div class="formulario_grupo-input">
							<input type="email" name="correoProv" id="correoProv" class="formulario_input"></input>
 						</div>
					</div><br>

					<div class="btn_enviar">
						<button type="submit" class="btn_submit" value="Guardar">Guardar</button>
					</div>
					
				</form>		
			</article>
		</div>
	
		<div class="contenidoListaProv" id="contenidoListaProv">
			<article>
				<h1 align="center">Lista de proveedores</h1>
				<div class="contenido-barra-buscar">
					<input type="text" placeholder="Buscar" required />
					<button class="btn-buscar">
						<i class="fas fa-search icon"></i>

					</button>
				</div>
				<br>

				<section class="tablas">
					<table>
						<thead>
							<tr>
								<th>Id</th> 
								<th>Empresa</th> 
								<th>RFC</th> 
								<th>Correo</th> 
								<th>Acciones</th>
							</tr>
						</thead>
					</table>
				</section>
			</article>
		</div>

		<!--Contenido de la parte INVENTARIO-->
		<div class="contenidoInventario" id="contenidoInventario">
			<article>
				<h1>Inventario</h1>
			</article>
		</div>

		<div class="contenidoListaInventario" id="contenidoListaInventario">
			<article>
				<h1 align="center">Lista de inventario</h1>
				<div class="contenido-barra-buscar">
					<input type="text" placeholder="Buscar" required />
					<button class="btn-buscar">
						<i class="fas fa-search icon"></i>

					</button>
				</div>
				<br>

				<section class="tablas">
					<table>
						<thead>
							<tr>
								<th>Id producto</th> 
								<th>Nombre producto</th> 
								<th>Id sucursal</th> 
								<th>Stock mínimo</th> 
								<th>Inversión</th>
								<th>ULTIMA VENTA</th>
							</tr>
						</thead>
					</table>
				</section>
			</article>
		</div>

		<!--Contenido de la parte VENTAS-->
		<div class="contenidoAgregaVenta" id="contenidoAgregaVenta">
			<article>
				<h1>Parte de agregar Venta</h1>
			</article>
		</div>
	
		<div class="contenidoListaVenta" id="contenidoListaVenta">
			<article>
				<h1>Parte de Lista Ventas</h1>
			</article>
		</div>
	</main>

	
</body>
</html>