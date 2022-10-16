<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nuevo trabajador</title>

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
            $query="SELECT * FROM Empleados where id_empleado='$id'";
            $res= sqlsrv_query($conn_sis, $query);
            if( $res === false) {
                    die( print_r( sqlsrv_errors(), true) );
            }
            while( $row = sqlsrv_fetch_array($res) ) {
                $id=$row["id_empleado"];
                $nomEmp=$row["nombres"];
                $ape_Pat=$row["ap_paterno"];
                $ape_Mat=$row["ap_materno"];
                $sucursal=$row["sucursal"];
                $rfc=$row["rfc"];
                $puesto=$row["puesto"];                
                $correo=$row["email"];
                $contra=$row["contra_em"];     
            }
            $queryPermisos="SELECT * FROM Permisos where id_empleado='$id'";
            $resPer= sqlsrv_query($conn_sis, $queryPermisos);
            if( $resPer === false) {
                    die( print_r( sqlsrv_errors(), true) );
            }
            while( $rowPer = sqlsrv_fetch_array($resPer) ) {
                $idPer=$rowPer["id_empleado"];
                $Per1=$rowPer["permiso1"];
                $Per2=$rowPer["permiso2"];
                $Per3=$rowPer["permiso3"];
                $Per4=$rowPer["permiso4"];
                $Per5=$rowPer["permiso5"];
                $Per6=$rowPer["permiso6"];                
                $Per7=$rowPer["permiso7"];
            }
            ?>
		<!--Contenido de la parte TRABAJADOR-->
		<div class="contenidoAgregaTrab" id="contenidoAgregaTrab">
			<article>
				<h1 align="center">Nuevo trabajador</h1>
				<br>
                                <form action="LOGUpdate_Emp.php" class="formularios" method="post" enctype="multipart/form-data">
					<div class="formulario_grupo-input">
						<label for="idTrabajador" class="formulario_label">Id</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="idTrabajador" id="idTrabajador" class="formulario_input" required maxlength="8" minlength="6" readonly="readonly" value="<?php echo $id;?>">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="nombreTabajador" class="formulario_label">Nombre</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="nombreTabajador" id="nombreTabajador" class="formulario_input" required maxlength="40" value="<?php echo $nomEmp;?>">
						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="apPaterno" class="formulario_label">Apellido paterno</label>

						<div class="formulario_grupo-input">
							<input type="text" name="apPaterno" id="apPaterno" class="formulario_input" required maxlength="20" value="<?php echo $ape_Pat;?>"></input>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="apMaterno" class="formulario_label">Apellido materno</label>

						<div class="formulario_grupo-input">
							<input type="text" name="apMaterno" id="apMaterno" class="formulario_input" maxlength="20" value="<?php echo $ape_Mat;?>"></input>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="rfc" class="formulario_label">RFC</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="rfc" id="rfc" class="formulario_input" required maxlength="13" minlength="13" value="<?php echo $rfc;?>">
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="puesto" class="formulario_label">Puesto</label>
						<div class="formulario_grupo-input">
                                                    <select type="text" name="puesto" id="puesto" class="formulario_input" required>
                                                        <?php
                                                            $serverName='localhost';
                                                            $connectionInfo=array("Database"=>"PagVentas", "UID"=>"usuario", "PWD"=>"123", "CharacterSet"=>"UTF-8");
                                                            $conn_sis=sqlsrv_connect($serverName, $connectionInfo);
                                                            $getPuesto ="select * from puestos";
                                                            $getPuesto2 = sqlsrv_query($conn_sis, $getPuesto);
                                                            if( $getPuesto2 === false) {
                                                                die( print_r( sqlsrv_errors(), true) );
                                                            }
                                                            while ($rowPuesto = sqlsrv_fetch_array($getPuesto2))
                                                            {
                                                                $id_pues=$rowPuesto['id_puesto'];
                                                                $pues=$rowPuesto['puesto'];
                                                                //echo '<script>alert("'.$puesto.'")</script>';
                                                                if($id_pues==$puesto){
                                                                ?>
                                                                    <option value="<?php echo $id_pues;?>" selected><?php echo $pues;?></option>
                                                                <?php    
                                                                }else{
                                                                ?>
                                                                    <option value="<?php echo $id_pues;?>"><?php echo $pues;?></option>
                                                                <?php
                                                                }                                                                
                                                            }

                                                        ?>     
                                                    </select>
						</div>
					</div>
                                    
					<div class="formulario_grupo-input">
						<label for="usuario" class="formulario_label">Usuario</label> 
						<div class="formulario_grupo-input">
							<input type="text" name="usuario"id="usuario" class="formulario_input" required value="<?php echo $correo;?>"</input>
 						</div>
					</div>

					<div class="formulario_grupo-input">
						<label for="contraseña" class="formulario_label">Contraseña</label> 
						<div class="formulario_grupo-input">
							<input type="password" name="contraseña" id="contraseña" class="formulario_input" required maxlength="100"></input>
						</div>
					</div>

					<div class="formulario_grupo-input2">
						<label class="formulario_label">Permisos</label> 
					</div>

					<div class="formulario_grupo-input">
                                            <?php
                                            if ($Per2){?>
							<label class="formulario_label-checkbox1"><input type="checkbox" name="cbox1" id="cbox1" value="1" checked="checked"> Acceso a inventario </label>
                                            <?php }else{ ?>
                                                        <label class="formulario_label-checkbox1"><input type="checkbox" name="cbox1" id="cbox1" value="1"> Acceso a inventario </label>
                                            <?php } ?>
					</div>
                                        
					<div class="formulario_grupo-input">
                                            <?php
                                            if ($Per3){?>
                                                        <label class="formulario_label-checkbox2"><input type="checkbox" name="cbox2" id="cbox2" value="1" checked="checked"> Acceso a proveedores </label>
                                            <?php }else{ ?>
                                                        <label class="formulario_label-checkbox2"><input type="checkbox" name="cbox2" id="cbox2" value="1"> Acceso a proveedores </label>
                                            <?php } ?>    
					</div>

					<div class="formulario_grupo-input">
                                            <?php
                                            if ($Per4){?>
							<label class="formulario_label-checkbox1"><input type="checkbox" name="cbox3" id="cbox3" value="1" checked="checked"> Acceso a sucursales </label>
                                            <?php }else{ ?>
                                                        <label class="formulario_label-checkbox1"><input type="checkbox" name="cbox3" id="cbox3" value="1" > Acceso a sucursales </label>
                                            <?php } ?>                                                           
					</div>

					<div class="formulario_grupo-input">
                                            <?php
                                            if ($Per5){?>
                                                        <label class="formulario_label-checkbox2"><input type="checkbox" name="cbox4" id="cbox4" value="1" checked="checked"> Acceso a ventas </label>
                                            <?php }else{ ?>
                                                        <label class="formulario_label-checkbox2"><input type="checkbox" name="cbox4" id="cbox4" value="1"> Acceso a ventas </label>
                                            <?php } ?>             
					</div>

					<div class="formulario_grupo-input">
                                            <?php
                                            if ($Per6){?>
							<label class="formulario_label-checkbox1"><input type="checkbox" name="cbox5" id="cbox5" value="1" checked="checked"> Acceso a promociones </label>
                                            <?php }else{ ?>
                                                        <label class="formulario_label-checkbox1"><input type="checkbox" name="cbox5" id="cbox5" value="1"> Acceso a promociones </label>
                                            <?php } ?>             
					</div>

					<div class="formulario_grupo-input">
                                            <?php
                                            if ($Per7){?>
                                                        <label class="formulario_label-checkbox2"><input type="checkbox" name="cbox6" id="cbox6" value="1" checked="checked"> Bloqueado </label>
                                            <?php }else{ ?>
                                                        <label class="formulario_label-checkbox2"><input type="checkbox" name="cbox6" id="cbox6" value="1"> Bloqueado </label>
                                            <?php } ?>             
					</div>

					<div class="btn_enviar">
						<button type="submit" class="btn_submit" name="guardar" id="guardar" value="Guardar">Guardar</button>
					</div>

				</form>		
			</article>
			
		</div>
    </main>
	<script src="js/validAltaTrabajador.js"></script>

</body>
</html>
