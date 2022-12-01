<?php
error_reporting(0);
session_start();
include("perTrabajadores.php");
$sesion_i = $_SESSION["nombres"];
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- <script languaje="javascript" src="js/jquery-3.6.1.min.js"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<link rel="stylesheet" href="administrativo.css">
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

    <main>
        <?php
            $aux=$_GET["item"];
			$array1 = explode("/",$aux);
        	$id=$array1[0];
			$id_Suc=$array1[1];
            $serverName='inovatecserver.database.windows.net';
            $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
            $conn_sis=sqlsrv_connect($serverName, $connectionInfo);
            $query="SELECT * FROM inventario_suc WHERE id_producto='$id' and id_sucursal='$id_Suc'";
            $res= sqlsrv_query($conn_sis, $query);
            if( $res === false) {
                    die( print_r( sqlsrv_errors(), true) );
            }
            while( $row = sqlsrv_fetch_array($res) ) {
            $id=$row["id_producto"];
            $idsucursal=$row["id_sucursal"];
            $cantidad=$row["cantidad"];
            $stock=$row["stock_min"];
            }
            $query2="SELECT nombre FROM productos WHERE id_producto='$id'";
            $res2= sqlsrv_query($conn_sis, $query2);
            if( $res2 === false) {
                    die( print_r( sqlsrv_errors(), true) );
            }
            while( $row2 = sqlsrv_fetch_array($res2) ) {
            $nom=$row2["nombre"];
            }

			//obtiene el municipio y el estado de la sucursal
			$querry_suc = "SELECT sucursal.id_sucursal as id_sucursal, estados.Estado as estado, municipios.municipio as municipio 
			FROM estados, estados_municipios, municipios, sucursal
			WHERE sucursal.id_sucursal = '$idsucursal' and
			sucursal.ciudad_est = estados_municipios.id and
			estados_municipios.estados_id = estados.Id and
			municipios.Id_Municipios = estados_municipios.municipios_id";

			$resultados_sucursal = sqlsrv_query($conn_sis, $querry_suc);

			$datos_sucursal = sqlsrv_fetch_array($resultados_sucursal)
        ?>  
        <!--Contenido de la parte INVENTARIO-->
		<div class="contenidoInventario" id="contenidoInventario">
			<article>
			<h1 align="center">Actualizar datos de producto inventario</h1>
				<br>
                        <form action="LOGUpdate_Inv.php" class="formularios" method="post" enctype="multipart/form-data" id="formulario">
					
                        <div class="formulario_grupo-input">
						<label for="idProducto" class="formulario_label">Producto</label>
						<div class="formulario_grupo-input">
						<select type="text" name="idProducto" id="idProducto" class="formulario_input" readonly="readonly">
								<option  value=" <?php echo $id; ?>"> <?php echo $id . ' - ' . $nom; ?></option>

							</select>
							<!-- <input type="text" name="idProducto" id="idProducto" class="formulario_input" readonly="readonly" value="<?php echo $id;?>"></input> -->
 						</div>
					</div>
                                    
                        <div class="formulario_grupo-input">
						<label for="idSucursal" class="formulario_label">Sucursal</label> 
						<div class="formulario_grupo-input">
						<select type="text" name="idSuc" id="idSuc" class="formulario_input" readonly="readonly">
								<option  value=" <?php echo $idsucursal; ?>"> <?php echo $idsucursal. ' - '. $datos_sucursal["municipio"]. ', '. $datos_sucursal["estado"]; ?></option>

							</select>
						<!-- <input type="text" name="idSucursal" id="idSucursal" class="formulario_input" readonly="readonly" value="<?php echo $idsucursal. ' - '. $datos_sucursal["municipio"]. ', '. $datos_sucursal["estado"];?>"></input> -->
						</div>
					</div>

					
                                    
                     
					<div class="formulario_grupo-input">
						<label for="rfcProv" class="formulario_label">Existentes</label>
						<div class="formulario_grupo-input">
							<input type="text" name="cantidad" id="cantidad" class="formulario_input" value="<?php echo $cantidad;?>" readonly="readonly"></input>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="correoProv" class="formulario_label">Stock mínimo</label>
						<div class="formulario_grupo-input">
							<input type="text" name="stockmin" id="stockmin" class="formulario_input" value="<?php echo $stock;?>" required></input>
 						</div>
					</div><br>

					<div class="btn_enviar">
						<button type="submit" onclick="alert('Artículo actualizado con éxito')" class="btn_submit" id="guardar" id="guardar" value="Guardar">Actualizar</button>
					</div>
					
				</form>		
			</article>
			<script src="js/validEditarInventario.js"></script>
		</div>
    </main>