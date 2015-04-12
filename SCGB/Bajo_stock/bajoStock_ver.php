<?php session_start();
include ("../include/conectar.php");
$CODIGO= $_SESSION["PERMISO"];		
?>
<?php
include '../Conexion.php';
$cn = new Conexion();$cn->Conectar();
$cn2 = new Conexion();$cn2->Conectar();
$cn3 = new Conexion();$cn3->Conectar();
$cn4 = new Conexion();$cn4->Conectar();
$cn5 = new Conexion();$cn5->Conectar();
$cn6 = new Conexion();$cn6->Conectar();
$id= $_GET['id'];
$obtiene = array();
$guarda1 = array();

$res3 = $cn3->Consulta("SELECT s.S_CANTIDAD + count(pu.CODIGOPRODUCTO) AS RESULTADO,s.S_CANTIDAD,s.S_CANTIDADMINIMA,count(pu.CODIGOPRODUCTO) AS BAJA FROM STOCK s,PRODUCTO_UNITARIO pu WHERE pu.PU_ESTADO=1 AND s.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND pu.CODIGOPRODUCTO='$id'");
while($row3 = $cn3->getRespuesta($res3)){
        $RESULTADO=$row3['RESULTADO'];
		$CANTIDAD=$row3['S_CANTIDAD'];
		$CANTIDAD_MINIMA=$row3['S_CANTIDADMINIMA'];
		$CANTIDAD_BAJA=$row3['BAJA'];
	}
	
$res4 = $cn4->Consulta("SELECT count(CODIGOPRODUCTO) AS TOTAL FROM PRODUCTO_UNITARIO WHERE CODIGOPRODUCTO='$id' AND PU_ESTADO=1");
while($row4 = $cn4->getRespuesta($res4)){
        $BODEGA=$row4['TOTAL'];
	}
$res5 = $cn5->Consulta("SELECT count(CODIGOPRODUCTO) AS TOTAL FROM PRODUCTO_UNITARIO WHERE CODIGOPRODUCTO='$id' AND PU_ESTADO=5");
while($row5 = $cn5->getRespuesta($res5)){
        $MANTENCION=$row5['TOTAL'];
	}
$res6 = $cn6->Consulta("SELECT count(CODIGOPRODUCTO) AS TOTAL FROM PRODUCTO_UNITARIO WHERE CODIGOPRODUCTO='$id' AND PU_ESTADO between 2 and 3
");
while($row6 = $cn6->getRespuesta($res6)){
        $ARRIENDO=$row6['TOTAL'];
	}

/*---------------------------------------LLENAR LAS IMAGENES DE LA PARTE SUPERIOR----------------------------------------------------------------------------------------------------------------------------------*/


$res = $cn->Consulta("SELECT CODIGOPRODUCTO,CODIGOUNITARIO,PU_ESTADO FROM PRODUCTO_UNITARIO WHERE CODIGOPRODUCTO='$id'");
while($row = $cn->getRespuesta($res)){
	  array_push($obtiene, $row['CODIGOPRODUCTO']);
	  array_push($obtiene, $row['CODIGOUNITARIO']);
	  if($row['PU_ESTADO']==1){ array_push($obtiene, "EN BODEGA");}
	  else if($row['PU_ESTADO']==2 || $row['PU_ESTADO']==3){ array_push($obtiene, "PRESTADO");}
	  else if($row['PU_ESTADO']==4){ array_push($obtiene, "DADO DE BAJA");}
	  else if($row['PU_ESTADO']==5){ array_push($obtiene, "MANTENCIÓN");}  
	}
$i = 0;
while ($i < count($obtiene)) {
    $consulta=$obtiene[$i];
	$i++;
    $consulta2=$obtiene[$i];
	$i++;
	
	
		 $res2 = $cn2->Consulta("SELECT p.CODIGOPRODUCTO,pu.CODIGOUNITARIO,ip.IP_FECHA,ip.NUMEROFACTURA,ep.EP_ESTADOPRODUCTO,ep.EP_OBSERVACION   FROM PRODUCTO p,PRODUCTO_UNITARIO pu,INGRESO_PRODUCTO ip,ESTADO_PRODUCTO ep WHERE p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=ep.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=ip.CODIGOPRODUCTO AND pu.CODIGOUNITARIO=ep.CODIGOUNITARIO AND pu.PU_NUMEROFACTURA=ip.NUMEROFACTURA AND p.CODIGOPRODUCTO='$consulta' AND pu.CODIGOUNITARIO=$consulta2 AND ep.EP_FECHA=(select max(ep.EP_FECHA) FROM PRODUCTO p,PRODUCTO_UNITARIO pu,ESTADO_PRODUCTO ep WHERE p.CODIGOPRODUCTO='$consulta' AND pu.CODIGOUNITARIO=$consulta2 AND p.CODIGOPRODUCTO=ep.CODIGOPRODUCTO AND pu.CODIGOUNITARIO=ep.CODIGOUNITARIO)"); 
        
		 while($row2 = $cn2->getRespuesta($res2)){
			   array_push($guarda1, $row2['CODIGOPRODUCTO']);
			   array_push($guarda1, $row2['CODIGOUNITARIO']);
			   array_push($guarda1, $row2['IP_FECHA']);
			   array_push($guarda1, $row2['NUMEROFACTURA']);
			   array_push($guarda1, $obtiene[$i]);
			   array_push($guarda1, $row2['EP_ESTADOPRODUCTO']);
			   array_push($guarda1, $row2['EP_OBSERVACION']);
			   
			 } 
			  
	$i++; 
}
?>


<!DOCTYPE html>
<html lang="es"> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
   <meta charset="utf-8" />
   <title>Bureau Veritas|Cesmec S.C.G.B </title>
   <link rel="shortcut icon" href="../favicon.ico">
   <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <link href="../assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
   <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
   <link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
   <link href="../assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="../assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="../assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" type="text/css" href="../assets/plugins/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" href="../assets/plugins/fancybox/source/jquery.fancybox.css"/>
   <link rel="stylesheet" href="../assets/plugins/data-tables/DT_bootstrap.css" />
   <link href="../assets/css/pages/invoice.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="../css_mantenedoressd/alertify.core.css" />
   <link rel="stylesheet" href="../css_mantenedoressd/alertify.default.css" />
   <link rel="stylesheet" href="../css_mantenedoressd/style_botones.css" media="screen" type="text/css" />
   
</head> 
   
<body class="fixed-top">
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <!-- BEGIN LOGO -->
      <a class="brand" href="../inicio.php"> <img src="../assets/img/logo.png" alt="Conquer" /> </a>
      <!-- END LOGO -->
      <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="arrow"></span></a>
      <div class="top-nav">
        <? $sql = "SELECT COUNT( p.P_NOMBRE )as NUMERO FROM PRODUCTO p, STOCK s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA ";
	conectar();
	$rs=mysql_query($sql,$conexion);	
	while ($row=mysql_fetch_array($rs)){
              ?>
        <ul class="nav pull-right" id="top_menu">
          <li class="divider-vertical hidden-phone hidden-tablet"></li>
          <li  class="dropdown-toggle" id="header_notification_bar"> <a id="pulsate-regular" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-warning-sign"></i> <span class="label label-important">
            <?=$row["NUMERO"];?>
            </span></a>
            <ul class="dropdown-menu extended notification active">
              <li>
                <p>tienes
                  <?=$row["NUMERO"]; }?>
                  nuevas  notificaciones</p>
              </li>
              <?
  
	$sql1 = "SELECT p.P_NOMBRE, s.S_CANTIDAD FROM PRODUCTO p, STOCK s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA ";
	conectar();
	$rss=mysql_query($sql1,$conexion);		
	while ($row=mysql_fetch_array($rss)){
	
  ?>
              <li> <a href="#"> <span class="label label-important"><i class="icon-bolt"></i></span> Bajo stock
                <?=$row["P_NOMBRE"];?>
                quedan <span class="small italic">
                  <?=$row["S_CANTIDAD"];?>
                </span> en Bodega. </a></li>
              <?
						}?>
              <li> <a href="#">Ver todas las notificaciones</a></li>
            </ul>
          </li>
          <li class="divider-vertical hidden-phone hidden-tablet"></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="../calendario/calendario.php"><i class="icon-calendar"></i> Calendario</a></li>
              <li class="divider"></li>
              <li> <a href="#"><i class="icon-user"> </i>
                <?php
                          if(!isset($_SESSION["USUARIO"]))
                            header ("Location:../index.php");
                          else   
                           echo "<strong>" .$_SESSION["USUARIO"]." </strong>";
                         ?>
                </a>
              <li><a href="#"></a><a href="../logout.php"><i class="icon-key"></i> cerrar secion</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="container" class="row-fluid">
   <div id="sidebar" class="nav-collapse collapse">
    <?
  	
	$sql3 = "SELECT PROVEEDOR,PRODUCTO,PERSONAL,OBRA,BODEGA,INFORMEYGRAFICO,ADMINISTRACION from PERMISO WHERE CODIGOPERMISO= $CODIGO ";
	conectar();
	$rs=mysql_query($sql3,$conexion);	
	while ($row4=mysql_fetch_array($rs)){
	
	  
  ?>
    <div class="sidebar-toggler hidden-phone"></div>
    <ul>
      <li class=""> <a href="../inicio.php"> <i class="icon-home"></i> <span class="title ">Inicio</span> <span class="arrow "></span></a></li>
      <li class=""> <a href="../Calendario/calendario.php"> <i class="icon-calendar"></i> <span class="title">Calendario</span> <span class="arrow "></span></a></li>
      <? if($row4["PROVEEDOR"]==1){
		?>
      <li class="has-sub "> <a href="javascript:;"> <i class="icon-user "></i> <span class="title" >Proveedor</span> <span class="arrow "></span></a>
        <ul class="sub">
          <li ><a href="../proveedor/add_proveedor.php">Agregar Proveedor</a></li>
          <li ><a href="../proveedor/mod_proveedor.php">Buscar</a></li>
        </ul>
      </li>
      <? }
	
		if($row4["PRODUCTO"]==1){
		?>
      <li class="has-sub "> <a href="javascript:;"> <i class="icon-book"></i> <span class="title">Producto</span> <span class="arrow"></span></a>
        <ul class="sub">
          <li ><a href="../Herramienta/mod_herramienta.php">Herramienta</a></li>
          <li ><a href="../Insumo/mod_insumo.php">Insumo</a></li>
          <li ><a href="../Ropa/mod_ropa.php">Ropa</a></li>
          <li ><a href="../Vehiculo/mod_vehiculo.php">Vehiculo</a></li>
        </ul>
      </li>
      <? }
	
		if($row4["PERSONAL"]==1){
		?>
      <li class="has-sub"> <a href="javascript:;"> <i class="icon-group"></i> <span class="title">Personal</span> <span class="arrow "></span></a>
        <ul class="sub">
          <li ><a href="../Trabajador/add_trabajador.php">Agregar Trabajadores</a></li>
          <li ><a href="../Cargo/add_cargo.php">Agregar cargo</a></li>
          <li ><a href="../Trabajador/mod_trabajador.php">Buscar Trabajador</a></li>
          <li ><a href="../Cargo/mod_cargo.php">Buscar Cargo</a></li>
          <li ><a href="../Trabajador/termino_contrato.php">Termino Contrato</a></li>
        </ul>
      </li>
      <? }
	
		 if($row4["OBRA"]==1){
		?>
      <li class="has-sub "> <a href="javascript:;"> <i class="icon-map-marker"></i> <span class="title">Obra</span> <span class="arrow "></span></a>
        <ul class="sub">
          <li  ><a href="../Obra/add_obra.php">Agregar obra</a></li>
          <li  ><a href="../Obra/mod_obra.php">Buscar</a></li>
          <li ><a href="../Obra/cerrar_obra.php">Cerrar Obra</a></li>
        </ul>
      </li>
      <? }
	
	      if($row4["BODEGA"]==1){
		?>
      <li class="has-sub  star active"> <a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Bodega</span> <span class="arrow "></span></a>
        <ul class="sub">
          <li ><a href="../Prestamo/prestamo.php">Prestamo</a></li>
          <li ><a href="../Devolucion/devolucion.php">Devolucion</a></li>
          <li ><a href="../Mantencion/mantencion.php">Mantencion</a></li>
          <li ><a href="../Ficha_Trabajador/prestamo.php">Ficha Trabajador</a></li>
          <li ><a href="../Bajo_stock/baja_stock.php">Bajo de Stock</a></li>
          <li ><a href="../Baja_producto/baja_producto.php">Dar de baja Producto</a></li>
          <li ><a href="../ingreso_producto/ingreso_producto.php">Ingreso de Producto</a></li>
        </ul>
      </li>
      <? }
	
	      if($row4["INFORMEYGRAFICO"]==1){
		?>
      <li class="has-sub  "> <a href="javascript:;"> <i class="icon-search"></i> <span class="title">informes y Graficos</span> <span class="arrow "></span></a>
        <ul class="sub">
          <li ><a href="../graficos/menu_graficos.php">Graficos</a></li>
          <li ><a href="../listados/menu_listados.php">Informes</a></li>
        </ul>
      </li>
      <? }
	
 if($row4["ADMINISTRACION"]==1){
		?>
      <li class="has-sub  "> <a href="javascript:;"> <i class="icon-warning-sign"></i> <span class="title">Administracion</span> <span class="arrow "></span></a>
        <ul class="sub">
          <li ><a href="../Usuario/add_usuario.php">Agregar Usuario</a></li>
          <li ><a href="../Usuario/mod_usuario.php">Buscar Usuario</a></li>
          <li ><a href="../Modificar_producto/mod_ingresoProducto.php">Modificar ingreso Produccto</a></li>
          <li ><a href="#">Eliminar</a></li>
          <li ><a href="../RespaldoBD/GenerarBD.php">Respalda base de datos</a></li>
        </ul>
      </li>
      <? }
	}
		 ?>
      <li class=""> <a href="../logout.php"> <i class="icon-user"></i> <span class="title">Cerrar seccion</span></a></li>
    </ul>
  </div>
      
      <div id="body">
     
         <div class="container-fluid">
            <div class="row-fluid">
               <div class="span12">
                  <h3 class="page-title">Dar de Baja Producto</h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="#">Incio</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="#">Bodega</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="baja_stock.php">Bajo Stock</a></li>
                  </ul>

               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget box green">
                     <div class="widget-title">
                        <div class="widget-title">               
                     <h4><i class="icon-globe"></i>Productos Bajo Stock </h4>
                     </div>
                     </div>
                     <div class="widget-body form">
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------>  
<div class="container">                   
<ul class="lista-wid cf">
	<li>
		<aside class="wid wid--grapefruit">
			<div class="wid__central">
				<h4>Cantidad ingresada</h4>
			</div>
			<div class="wid__contexto">
				<span class="wid__value"><?php echo $RESULTADO ?></span>
				</div>
		</aside>
	</li>
	<li>
		<aside class="wid wid--sunflower">
			<div class="wid__central">
					<h4>Cantidad actual</h4>
				</div>
				<div class="wid__contexto">
					<span class="wid__value"><?php echo $CANTIDAD ?></span>
				</div>
		</aside>
	</li>
	<li>
		<aside class="wid wid--dark-gray widget--move">
			<div class="wid__central">
					<h4>Cantidad en bodega</h4>
				</div>
				<div class="wid__contexto">
					<span class="wid__value"><?php echo $BODEGA ?></span>
				</div>
		</aside>
	</li>
    <li>
		<aside class="wid wid--aqua widget--move">
			<div class="wid__central">
					<h4>Cantidad en prestamo</h4>
				</div>
				<div class="wid__contexto">
					<span class="wid__value"><?php echo $ARRIENDO ?></span>
				</div>
		</aside>
	</li>
    
    <li>
		<aside class="wid wid--aqua widget--move">
			<div class="wid__central">
					<h4>Cantidad dada de baja</h4>
				</div>
				<div class="wid__contexto">
					<span class="wid__value"><?php echo $CANTIDAD_BAJA ?></span>
				</div>
		</aside>
	</li>
    <li>
		<aside class="wid wid--aqua widget--move">
			<div class="wid__central">
					<h4>Cantidad en mantención</h4>
				</div>
				<div class="wid__contexto">
					<span class="wid__value"><?php echo $MANTENCION ?></span>
				</div>
		</aside>
	</li>
    <li>
		<aside class="wid wid--aqua widget--move">
			<div class="wid__central">
					<h4>Cantidad minima</h4>
				</div>
				<div class="wid__contexto">
					<span class="wid__value"><?php echo $CANTIDAD_MINIMA ?></span>
				</div>
		</aside>
	</li>
   </ul>
 </div>                 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
                       
                     <div class="clearfix margin-bottom-10">
                       </div>
                        <h3>Detalle de Producto</h3>
                    <table id="tabla_BajoStock_Unitario" class="table table-striped table-bordered table-hover" >
                       <thead>
                           <tr >
                             <th>Codigo Producto</th>
                             <th>Codigo Unitario</th>
                             <th>Fecha Ingreso</th>
                             <th>N° Factura</th>
                             <th>Estado</th>
                             <th>Condición</th>
                             <th>Observación</th>
                         </tr>
                      </thead>
                    <tbody>
                        <?php $j=0; while($j < count($guarda1)){ ?>
                      <tr>
                       <td><?php echo $guarda1[$j]; $j++; ?></td>
                       <td><?php echo $guarda1[$j]; $j++; ?></td>
                       <td><?php echo $guarda1[$j]; $j++; ?></td>
                       <td><?php echo $guarda1[$j]; $j++; ?></td>
                       <td><?php echo $guarda1[$j]; $j++; ?></td>
                       <td><?php echo $guarda1[$j]; $j++; ?></td>
                       <td><?php echo $guarda1[$j]; $j++; ?></td>
                       <?php } ?>
                     </tr>  
                  </tbody>
                 </table>   
                        <div class="control-group">
                             <div class="controls chzn-controls"></div>
                       </div>
                           <div class="form-actions">
                              <button type="button" name="volver" class="btn" onclick = "location.href = 'baja_stock.php'">Volver</button>
                           </div>                        
                     </div>
                  </div>
               </div>
            </div>         
         </div>
      </div>  
   </div>
<div id="footer">
      Bureau Veritas|Cesmec S.C.G.B desarrollado por Daniel Jara,Rodrigo Muñoz.
</div>

   <script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>    
   <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
   <script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>   
   <script src="../assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>   
   <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="../assets/plugins/jquery.blockui.js" type="text/javascript"></script>  
   <script src="../assets/plugins/jquery.cookie.js" type="text/javascript"></script>
   <script src="../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script> 
  <script type="text/javascript" src="../js_mantenedores/jquery.fancybox.js"></script>
   <script type="text/javascript" src="../assets/plugins/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
   <script src="../assets/scripts/app.js"></script>
   <script src="../assets/scripts/table-managed.js"></script>  
   <script src="../assets/scripts/form-validation.js"></script> 
   <script type="text/javascript" src="../assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
   <script type="text/javascript" src="../assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
   <script type="text/javascript" src="../js_mantenedores/alertify.js"></script> 
         
</body>
</html>