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
	<title>Actualizar Producto</title>

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
								<li><a id="menuVentas1" href="registro_ventas.php" >Ventas</a></li>
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
                <div class="contenidoActProd" id="contenidoActProd">
			<article>
				<h1 align="center">Actualizar datos del producto</h1>
				<br>
                                <?php
                                //echo "Este dato: " . $_GET["item"] . " lo recibo por URL.";
                                $serverName='inovatecserver.database.windows.net';
                                $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
                                $conn_sis=sqlsrv_connect($serverName, $connectionInfo);
                               
                                $id=$_GET["item"];
                                //if (isset($_POST('Actualizar')))
								$query="SELECT id_producto,nombre,Apartado,precio_com,precio_ven,id_proveedor,descripcion,Subapartado, Estado FROM Productos where id_producto=$id";
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
									$estado=$row["Estado"];									
								//echo '<script>alert("'.$prove.'")</script>';
								}
								$query2="SELECT ruta FROM imagenes WHERE id_prod='$id'";
								$res2= sqlsrv_query($conn_sis, $query2);
								if( $res2 === false) {
										die( print_r( sqlsrv_errors(), true) );
								}
								while( $row2 = sqlsrv_fetch_array($res2) ) {
								$ruta=$row2["ruta"];
								}
                                ?>                                
                                <form action="LogUpdate.php" class="formularios" method="POST" enctype="multipart/form-data" id="formulario">
					<div class="formulario_grupo-input">
						<label for="idProducto" class="formulario_label">Id</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="idProducto" id="idProducto" class="formulario_input" readonly="readonly" value="<?php echo $id;?>">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="nombreProd" class="formulario_label">Nombre</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="nombreProd" id="nombreProd" class="formulario_input" required maxlength="50" value="<?php echo $nombre;?>">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="categoria" class="formulario_label">Categoría</label>

						<div class="formulario_grupo-input">
							<select type="text" name="categoria" id="categoria" class="formulario_input" required>
                                                        <?php
                                                            $serverName='inovatecserver.database.windows.net';
                                                            $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
                                                            $conn_sis=sqlsrv_connect($serverName, $connectionInfo);
                                                            $getApartado ="select * from Apartados";
                                                            $getApartado2 = sqlsrv_query($conn_sis, $getApartado);
                                                            if( $getApartado2 === false) {
                                                                die( print_r( sqlsrv_errors(), true) );
                                                            }
                                                            while ($rowApartado = sqlsrv_fetch_array($getApartado2)){
                                                                $id_ap=$rowApartado['ID_ap'];
                                                                $apartado=$rowApartado['Nombre'];
                                                                if ($id_ap==$cate){?>
                                                                    <option value="<?php echo $id_ap;?>" selected><?php echo $apartado;?></option>
                                                            <?php
                                                            }else{
                                                                ?>
                                                                <option value="<?php echo $id_ap;?>"><?php echo $apartado;?></option>
                                                                <?php
                                                            }}
                                                        ?>
                                                        </select>
 						</div>
					</div>
                                        
					<div class="formulario_grupo-input">
						<label for="subcategoria" class="formulario_label">Subcategoría</label>

						<div class="formulario_grupo-input">
							<select type="text" name="subcategoria" id="subcategoria" class="formulario_input" required>
                                                        <?php
                                                            $serverName='inovatecserver.database.windows.net';
                                                            $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
                                                            $getSubApartado ="select * from SubApartados where id_ap=$cate";
                                                            $conn_sis=sqlsrv_connect($serverName, $connectionInfo);
                                                            $getSubApartado2 = sqlsrv_query($conn_sis, $getSubApartado);
                                                            if( $getSubApartado2 === false) {
                                                                die( print_r( sqlsrv_errors(), true) );
                                                            }
                                                            while ($rowSubApartado = sqlsrv_fetch_array($getSubApartado2))
                                                            {
                                                                $id_sap=$rowSubApartado['Id_subap'];
                                                                $ap=$rowSubApartado['id_ap'];
                                                                $subapartado=$rowSubApartado['SubApartado'];
                                                                if($id_sap==$subcate){
                                                                ?>
                                                                    <option value="<?php echo $id_sap;?>" selected><?php echo $subapartado;?></option>
                                                                <?php    
                                                                }else{
                                                                ?>
                                                                <option value="<?php echo $id_sap;?>"><?php echo $subapartado;?></option>
                                                                <?php
                                                                }                                                                
                                                            }

                                                        ?>                          
                                                        </select>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="precioCompra" class="formulario_label">Precio de compra</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="precioProd" id="precioProd" class="formulario_input" required value="<?php echo $pre_com;?>">
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="precioVenta" class="formulario_label">Precio de venta</label>
						<div class="formulario_grupo-input">
							<input type="text" name="precioVenta" id="precioVenta" class="formulario_input" required value="<?php echo $pre_ven;?>"> 
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="descripcion" class="formulario_label">Descripción</label> 

						<div class="formulario_grupo-input">
							<textarea type="text" name="descripcion"id="descripcion" class="formulario_input-textarea" required><?php echo $descri;?></textarea>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="proveedor" class="formulario_label">Proveedor</label> 
						<div class="formulario_grupo-input">
							<select type="text" name="proveedor" id="proveedor" class="formulario_input">
                                                        <?php
                                                            $serverName='inovatecserver.database.windows.net';
                                                            $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
                                                            $conn_sis=sqlsrv_connect($serverName, $connectionInfo);
                                                            $getProveedor ="select * from Proveedores";
                                                            $getProv = sqlsrv_query($conn_sis, $getProveedor);
                                                            if( $getProv === false) {
                                                                die( print_r( sqlsrv_errors(), true) );
                                                            }
                                                            while ($rowProv = sqlsrv_fetch_array($getProv))
                                                            {
                                                                $id_Pro=$rowProv['id_proveedor'];
                                                                $nomEmp=$rowProv['nombre_empresa'];
                                                                $rfc=$rowProv['RFC'];
                                                                $email=$rowProv['email_empresa'];
                                                                //echo '<script>alert("'.$id_Pro.'")</script>';                                                                
                                                                if($id_Pro==$prove){
                                                                ?>                                                                
                                                                    <option value="<?php echo $id_Pro;?>" selected><?php echo $nomEmp;?></option>
                                                                <?php    
                                                                }else{
                                                                ?>
                                                                	<option value="<?php echo $id_Pro;?>"><?php echo $nomEmp;?></option>
                                                                <?php
                                                                }                                                                
                                                            }
                                                        ?> 
                                                        </select>
						</div>
					</div>
                                    <div class="formulario_grupo-input">
						<label for="Estado_ah" class="formulario_label">Condición</label> 
						<div class="formulario_grupo-input"> 
                                                    <select type="text" name="estado_ah" id="estado_ah" class="formulario_input">
														<?php
														if ($estado == "Activo") {?>
															<option value="Activo" selected>Activo</option>
															<option value="No surtiendo">No surtiendo</option>
														<?php }else{?>
															<option value="Activo">Activo</option>
															<option value="No surtiendo" selected>No surtiendo</option>
														<?php } ?>

                                                    </select>
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
					<div class="photo">
						<label for="foto" class="formulario_label">Imagen actual</label>							
							<div class="prevPhoto_2">							
							<img src="<?php echo $ruta;?>" id='image_input' width=180 height=180 />
							<script type="text/javascript">
								$('#image_input').on('click', function(){
									$('#file_input').trigger('click');
								});
							</script>
							</div>
							<div id="form_alert"></div>
					</div>				
					<div class="btn_enviar">
						<button onclick="alert('Producto actualizado con éxito')" type="submit" name="guardar" id="guardar" class="btn_submit" value="Actualizar">Actualizar</button>
					</div>
                                        
				</form>		
			</article>
			<script src="js/validEditarProductos.js"></script>
		</div>
		
</body>
</html>