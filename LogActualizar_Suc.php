
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Actualizar datos de sucursal</title>

	<script src="https://kit.fontawesome.com/f8c41f1595.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="administrativo.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- <script languaje="javascript" src="js/jquery-3.6.1.min.js"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<link rel="stylesheet" href="administrativo.css">
	<script languaje="javascript">
		$(document).ready(function() {
			$("#estado").change(function() {
				$("#estado option:selected").each(function() {
					Id = $(this).val();
					$.post("getMunicipios.php", {
						Id: Id
					}, function(data) {
						$("#ciudadSuc").html(data);
					});
				});
			})
		});
	</script>
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

			<div class="btn-header">
				<button class="btn-cerrar-session" type="button">Cerrar sesión</button>
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
        
    <!--Main General-->
	<main>
            <?php
            //echo "Este dato: " . $_GET["item"] . " lo recibo por URL.";
            $serverName='localhost';
            $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
            $conn_sis=sqlsrv_connect($serverName, $connectionInfo);
            $id=$_GET["item"];            
            $query="SELECT id_sucursal,ciudad_est,Estado FROM sucursal where id_sucursal='$id'";
            $res= sqlsrv_query($conn_sis, $query);
            if( $res === false) {
                    die( print_r( sqlsrv_errors(), true) );
            }
            while( $row = sqlsrv_fetch_array($res) ) {
            $id=$row["id_sucursal"];
            $id_MunEst=$row["ciudad_est"];
            $situacion=$row["Estado"];            
            }            
            $mun_Est="select estados_municipios.id,Estado,estados.Id,municipio from estados_municipios,estados,municipios where estados_municipios.id=Id_Municipios and estados_id=estados.id and estados_municipios.id=$id_MunEst";
            $lugar= sqlsrv_query($conn_sis, $mun_Est);
            if( $lugar === false) {
                    die( print_r( sqlsrv_errors(), true) );
            }
            while( $rowlugar = sqlsrv_fetch_array($lugar) ) {
                $id_gen=$rowlugar["id"];
                $id_est=$rowlugar["Id"];
                $est=$rowlugar["Estado"];
                $mun=$rowlugar["municipio"];
            }
            //echo $id_gen.$id_est;
            //echo '<script>alert('.$id_gen.$id_est.')</script>';
        ?>
        <!--Contenido de la parte SUCURSAL-->
        <div class="contenidoAgregaSuc" id="contenidoAgregaSuc">
            <article>
                <h1 align="center">Actualizar datos de la sucursal</h1>
                <br>
                <form action="LOGUpdate_Suc.php" class="formularios" method="post" enctype="multipart/form-data">
                    <div class="formulario_grupo-input">
                        <label for="idSucursal" class="formulario_label">Id</label> 
                        <div class="formulario_grupo-input">
                            <input type="text" name="idSucursal" id="idSucursal" class="formulario_input" readonly="readonly" value="<?php echo $id;?>">
                        </div>
                    </div>

                    <div class="formulario_grupo-input">
                        <label for="estado" class="formulario_label">Estado</label>
                        <div class="formulario_grupo-input">
                            <select type="text" name="estado" id="estado" class="formulario_input">
                            <?php
                            $getEstado ="select * from estados";
                            $getEstado2 = sqlsrv_query($conn_sis, $getEstado);
                            if( $getEstado2 === false) {
                                die( print_r( sqlsrv_errors(), true) );
                            }
                            while ($rowEstado = sqlsrv_fetch_array($getEstado2)){
                                $id_es=$rowEstado['Id'];
                                $estado=$rowEstado['Estado'];
                                if ($id_es==$id_est){?>
                                    <option value="<?php echo $id_est;?>" selected><?php echo $estado;?></option>
                            <?php
                            }else{
                                ?>
                                <option value="<?php echo $id_es;?>"><?php echo $estado;?></option>
                                <?php
                            }}
                        ?>    
                            </select>
                            </div>
                    </div>
                    
                    
                    <div class="formulario_grupo-input">
                        <label for="ciudadSucursal" class="formulario_label">Municipio</label> 
                        <div class="formulario_grupo-input">
                            <select type="text" name="ciudadSuc" id="ciudadSuc" class="formulario_input">
                            <?php
                            $getCiudad ="select * from municipios";
                            $getCiudad2 = sqlsrv_query($conn_sis, $getCiudad);
                            if( $getCiudad2 === false) {
                                die( print_r( sqlsrv_errors(), true) );
                            }
                            while ($rowCiudad = sqlsrv_fetch_array($getCiudad2)){
                                $id_mun=$rowCiudad['Id_Municipios'];
                                $municipios=$rowCiudad['municipio'];
                                if ($id_gen==$id_mun){?>
                                    <option value="<?php echo $id_mun;?>" selected><?php echo $municipios;?></option>
                            <?php
                            }else{
                                ?>
                                <option value="<?php echo $id_mun;?>"><?php echo $municipios;?></option>
                                <?php
                            }}
                        ?>   
                            </select>
                        </div>
                    </div>
                    <div class="formulario_grupo-input">
                        <label for="Estado_ah" class="formulario_label">Estado</label> 
                        <div class="formulario_grupo-input"> 
                            <select type="text" name="estado_ah" id="estado_ah" class="formulario_input">
                                <?php
                                if ($situacion=="Activo"){?>
                                <option value="Activo" selected>Activo</option>
                                <option value="Deshabilitado">Deshabilitado</option>
                                <?php 
                                }else{?>
                                <option value="Activo">Activo</option>
                                <option value="Deshabilitado" selected>Deshabilitado</option>
                                <?php                                
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="btn_enviar">
                        <button type="submit" onclick="alert('Sucursal actualizada con éxito')" class="btn_submit" value="Actualizar">Actualizar</button>
                    </div>
                    
                </form>		
            </article>
        </div>
    </main>  
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		$('#estado').select2();
	});

	$(document).ready(function() {
		$('#ciudadSuc').select2();
	});
</script>