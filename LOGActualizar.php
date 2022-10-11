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
                <div class="contenidoActProd" id="contenidoActProd">
			<article>
				<h1 align="center">Actualizar productos</h1>
				<br>
                                <?php
                                //echo "Este dato: " . $_GET["item"] . " lo recibo por URL.";
                                $serverName='localhost';
                                $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
                                $conn_sis=sqlsrv_connect($serverName, $connectionInfo);
                               
                                $id=$_GET["item"];
                                //if (isset($_POST('Actualizar')))
                                    $query="SELECT id_producto,nombre,Apartado,precio_com,precio_ven,id_proveedor,descripcion,Subapartado FROM Productos where id_producto=$id";
                                    $res= sqlsrv_query($conn_sis, $query);
                                    if( $res === false) {
                                            die( print_r( sqlsrv_errors(), true) );
                                    }
                                    while( $row = sqlsrv_fetch_array($res) ) {
                                    $id=$row["id_producto"];
                                    $nombre=$row["nombre"];
                                    $descri=$row["descripcion"];
                                    $cate=$row["Apartado"];
                                    $subcate=$row["Subapartado"];
                                    $pre_com=$row["precio_com"];
                                    $pre_ven=$row["precio_ven"];
                                    $prove=$row["id_proveedor"];
                                    //echo $id.$nombre;
                                    $getApartado ="select * from"
                                    }
                                        ?>
				<form action="" class="formularios" method="POST" enctype="multipart/form-data">
					<div class="formulario_grupo-input">
						<label for="idProducto" class="formulario_label">Id</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="idProducto" id="idProd" class="formulario_input" value="<?php echo $id;?>">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="nombreProd" class="formulario_label">Nombre</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="nombreProd" id="nombreProd" class="formulario_input" value="<?php echo $nombre;?>">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="categoria" class="formulario_label">Categoria</label>

						<div class="formulario_grupo-input">
							<select type="text" name="categoria" id="categoria" class="formulario_input" value="<?php echo $Apartado;?>"></select>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="subcategoria" class="formulario_label">Subcategoria</label>

						<div class="formulario_grupo-input">
							<select type="text" name="subcategoria" id="subcategoria" class="formulario_input" value="<?php echo $subcate;?>"></select>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="precioCompra" class="formulario_label">Precio de compra</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="precioProd" id="precioProd" class="formulario_input" value="<?php echo $pre_com;?>">
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="precioVenta" class="formulario_label">Precio de venta</label>
						<div class="formulario_grupo-input">
							<input type="text" name="precioVenta" id="precioVenta" class="formulario_input" value="<?php echo $pre_ven;?>"> 
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="descripcion" class="formulario_label">Descripcion</label> 

						<div class="formulario_grupo-input">
							<textarea type="text" name="descripcion"id="descripcion" class="formulario_input" value="<?php echo $descri;?>"></textarea>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="proveedor" class="formulario_label">Proveedor</label> 
						<div class="formulario_grupo-input">
							<select name="proveedor" id="sucursal" class="formulario_input" value="<?php echo $prove;?>"></select>
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
						<button type="submit" name="actualizar" class="btn_submit" value="Actualizar">Actualizar</button>
					</div>
                                        
				</form>		
			</article>
		</div>
		
</body>
</html>