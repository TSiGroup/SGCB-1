<?php @session_start();
include ("include/conectar.php");
$CODIGO= $_SESSION["PERMISO"];

?><!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title>Bureau Veritas|Cesmec S.C.G.B </title>
   <link rel="shortcut icon" href="favicon.ico">
   <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
   <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="Proyecto/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" type="text/css" href="assets/plugins/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css"/>
   <link rel="stylesheet" href="assets/plugins/data-tables/DT_bootstrap.css" />
	<!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
	<!-- BEGIN HEADER -->
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container-fluid">
	      <!-- BEGIN LOGO -->
	      <a class="brand" href="../inicio.php"> <img src="assets/img/logo.png" alt="Conquer" /> </a>
	      <!-- END LOGO -->
	      <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="arrow"></span></a>
	      <div class="top-nav">
	        <?php $sql = "SELECT COUNT( p.P_NOMBRE )as NUMERO FROM producto p, stock s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA ";
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
	              <?php
  
	$sql1 = "SELECT p.P_NOMBRE, s.S_CANTIDAD FROM producto p, stock s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA ";
	conectar();
	$rss=mysql_query($sql1,$conexion);		
	while ($row=mysql_fetch_array($rss)){
	
  ?>
	              <li> <a href="#"> <span class="label label-important"><i class="icon-bolt"></i></span> Bajo stock
	                <?=$row["P_NOMBRE"];?>
	                quedan <span class="small italic">
	                  <?=$row["S_CANTIDAD"];?>
	                  </span> en Bodega. </a></li>
	              <?php
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
<!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
		  <!-- BEGIN SIDEBAR -->
		  <div id="sidebar" class="nav-collapse collapse">
		    <?
  	
	$sql3 = "SELECT PROVEEDOR,PRODUCTO,PERSONAL,OBRA,BODEGA,INFORMEYGRAFICO,ADMINISTRACION from permiso WHERE CODIGOPERMISO= $CODIGO";
	conectar();
	$rs=mysql_query($sql3,$conexion);	
	while ($row4=mysql_fetch_array($rs)){
	
	  
  ?>
		    <div class="sidebar-toggler hidden-phone"></div>
		    <ul>
		      <li class="star active "> <a href="../inicio.php"> <i class="icon-home"></i> <span class="title ">Inicio</span> <span class="arrow "></span></a></li>
		      <li class=""> <a href="Calendario/calendario.php"> <i class="icon-calendar"></i> <span class="title">Calendario</span> <span class="arrow "></span></a></li>
		      <?php if($row4["PROVEEDOR"]==1){
		?>
		      <li class="has-sub "> <a href="javascript:;"> <i class="icon-user "></i> <span class="title" >Proveedor</span> <span class="arrow "></span></a>
		        <ul class="sub">
		          <li ><a href="Proveedor/add_proveedor.php">Agregar Proveedor</a></li>
		          <li ><a href="Proveedor/mod_proveedor.php">Buscar</a></li>
	            </ul>
	          </li>
		      <?php }
	
		if($row4["PRODUCTO"]==1){
		?>
		      <li class="has-sub "> <a href="javascript:;"> <i class="icon-book"></i> <span class="title">Producto</span> <span class="arrow"></span></a>
		        <ul class="sub">
		          <li ><a href="Herramienta/mod_herramienta.php">Herramienta</a></li>
		          <li ><a href="Insumo/mod_insumo.php">Insumo</a></li>
		          <li ><a href="Ropa/mod_ropa.php">Ropa</a></li>
		          <li ><a href="Vehiculo/mod_vehiculo.php">Vehiculo</a></li>
	            </ul>
	          </li>
		      <?php }
	
		if($row4["PERSONAL"]==1){
		?>
		      <li class="has-sub"> <a href="javascript:;"> <i class="icon-group"></i> <span class="title">Personal</span> <span class="arrow "></span></a>
		        <ul class="sub">
		          <li ><a href="Trabajador/add_trabajador.php">Agregar Trabajadores</a></li>
		          <li ><a href="Cargo/add_cargo.php">Agregar cargo</a></li>
		          <li ><a href="Trabajador/mod_trabajador.php">Buscar Trabajador</a></li>
		          <li ><a href="Cargo/mod_cargo.php">Buscar Cargo</a></li>
		          <li ><a href="Trabajador/termino_contrato.php">Termino Contrato</a></li>
	            </ul>
	          </li>
		      <?php }
	
		 if($row4["OBRA"]==1){
		?>
		      <li class="has-sub "> <a href="javascript:;"> <i class="icon-map-marker"></i> <span class="title">Obra</span> <span class="arrow "></span></a>
		        <ul class="sub">
		          <li  ><a href="Obra/add_obra.php">Agregar obra</a></li>
		          <li  ><a href="Obra/mod_obra.php">Buscar</a></li>
		          <li ><a href="Obra/cerrar_obra.php">Cerrar Obra</a></li>
	            </ul>
	          </li>
		      <?php }
	
	      if($row4["BODEGA"]==1){
		?>
		      <li class="has-sub  "> <a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Bodega</span> <span class="arrow "></span></a>
		        <ul class="sub">
		          <li ><a href="Prestamo/prestamo.php">Prestamo</a></li>
		          <li ><a href="Devolucion/devolucion.php">Devolucion</a></li>
                  <li ><a href="Mantencion/mantencion.php">Mantencion</a></li>
                  <li ><a href="Ficha_Trabajador/prestamo.php">Ficha Trabajador</a></li>
		          <li ><a href="Bajo_stock/baja_stock.php">Bajo de Stock</a></li>
		          <li ><a href="Baja_producto/baja_producto.php">Dar de baja Producto</a></li>
		          <li ><a href="ingreso_producto/ingreso_producto.php">Ingreso de Producto</a></li>
	            </ul>
	          </li>
		      <?php }
	
	      if($row4["INFORMEYGRAFICO"]==1){
		?>
		      <li class="has-sub  "> <a href="javascript:;"> <i class="icon-search"></i> <span class="title">informes y Graficos</span> <span class="arrow "></span></a>
		        <ul class="sub">
		          <li ><a href="graficos/menu_graficos.php">Graficos</a></li>
		          <li ><a href="listados/menu_listados.php">Informes</a></li>
	            </ul>
	          </li>
		      <?php }
	
 if($row4["ADMINISTRACION"]==1){
		?>
		      <li class="has-sub  "> <a href="javascript:;"> <i class="icon-warning-sign"></i> <span class="title">Administracion</span> <span class="arrow "></span></a>
		        <ul class="sub">
		          <li ><a href="Usuario/add_usuario.php">Agregar Usuario</a></li>
		          <li ><a href="Usuario/mod_usuario.php">Buscar Usuario</a></li>
		          <li ><a href="Modificar_producto/mod_ingresoProducto.php">Modificar ingreso Produccto</a></li>
		          <li ><a href="#">Eliminar</a></li>
		          <li ><a href="RespaldoBD/GenerarBD.php">Respalda base de datos</a></li>
	            </ul>
	          </li>
		      <?php }
	}
		 ?>
		      <li class=""> <a href="logout.php"> <i class="icon-user"></i> <span class="title">Cerrar seccion</span></a></li>
	        </ul>
  </div>
		  <!-- END SIDEBAR -->
        <!-- BEGIN PAGE -->
<div id="body">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="widget-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button">×</button>
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER-->
						<!-- END STYLE CUSTOMIZER-->
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
<h3 class="page-title">
							Sistema Gestion Control Bodega.					  </h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="#">Inicio</a> 
								<i class="icon-angle-right"></i>							</li>
							<li><a href="#">Sistema control gestion bodega</a></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
				  </div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">
					<!-- BEGIN OVERVIEW STATISTIC BARS-->
				  <div class="row-fluid stats-overview-cont">
						<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
							<div class="stats-overview block clearfix">
							
								<div class="display stat good huge">
									
									<div class="percent"><?php $ropa2 = "SELECT sum(s_cantidad)as total FROM stock WHERE CODIGOPRODUCTO in (SELECT  CODIGOPRODUCTO FROM producto WHERE P_IDENTIFICADOR='R')";
									$ropa1 = "SELECT Count(CODIGOPRODUCTO)as totales  FROM detalle_prestamo WHERE CODIGOPRODUCTO in(SELECT  CODIGOPRODUCTO FROM producto WHERE P_IDENTIFICADOR='R')";
									
	
	$ropas1=mysql_query($ropa2,$conexion);	
	$ropas2=mysql_query($ropa1,$conexion);	
	while ($row1=mysql_fetch_array($ropas2)){ ?>+ <?php $numero1=$row1["totales"];
	echo $numero1;}?></div>
								</div>
								<div class="details">
									<div class="title">Prestamo Ropa</div>
									 
            
									<div class="numbers"><?php 
		
	while ($row2=mysql_fetch_array($ropas1)){ ?> <?php $ropaxx2=$row2["total"]; echo $ropaxx2;?> </div>
								</div>
								<div class="progress progress-info">
									<div class="bar" style="width:<?php echo ($numero1*100)/$ropaxx2; }?>% "></div>
								</div>
							</div>
						</div>
						<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
                          <div class="stats-overview block clearfix">
                            <div class="display stat good huge">
                              <div class="percent">
                                <?php $ins2 = "SELECT sum(s_cantidad)as total FROM stock WHERE CODIGOPRODUCTO in (SELECT  CODIGOPRODUCTO FROM producto WHERE P_IDENTIFICADOR='I')";
									$ins1 = "SELECT Count(CODIGOPRODUCTO)as totales  FROM detalle_prestamo WHERE CODIGOPRODUCTO in(SELECT  CODIGOPRODUCTO FROM producto WHERE P_IDENTIFICADOR='I')";
									
	
	$inss1=mysql_query($ins2,$conexion);	
	$inss2=mysql_query($ins1,$conexion);	
	while ($in1=mysql_fetch_array($inss2)){ ?>
                                +
                                <?php $insumo1=$in1["totales"];
	echo $insumo1;}?>
                              </div>
                            </div>
                            <div class="details">
                              <div class="title">Prestamo Insumo</div>
                              <div class="numbers">
                                <?php
		
	while ($in2=mysql_fetch_array($inss1)){ ?>
                                <?php $insumo2=$in2["total"]; echo $insumo2;?>
                              </div>
                            </div>
                            <div class="progress progress-warning">
                              <div class="bar" style="width:<?php echo ($insumo1*100)/$insumo2; }?>% "></div>
                            </div>
                          </div>
					  </div>
						<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
                          <div class="stats-overview block clearfix">
                            <div class="display stat good huge">
                              <div class="percent">
                                <?php $ropa2 = "SELECT sum(s_cantidad)as total FROM stock WHERE CODIGOPRODUCTO in (SELECT  CODIGOPRODUCTO FROM producto WHERE P_IDENTIFICADOR='H')";
									$ropa1 = "SELECT Count(CODIGOPRODUCTO)as totales  FROM detalle_prestamo WHERE CODIGOPRODUCTO in(SELECT  CODIGOPRODUCTO FROM producto WHERE P_IDENTIFICADOR='H')";
									
	
	$ropas1=mysql_query($ropa2,$conexion);	
	$ropas2=mysql_query($ropa1,$conexion);	
	while ($row1=mysql_fetch_array($ropas2)){ ?>
                                +
                                <?php $numero1=$row1["totales"];
	echo $numero1;}?>
                              </div>
                            </div>
                            <div class="details">
                              <div class="title">Prestamo Herramineta</div>
                              <div class="numbers">
                                <?php 
		
	while ($row2=mysql_fetch_array($ropas1)){ ?>
                                <?php $herramienta2=$row2["total"]; echo $herramienta2;?>
                              </div>
                            </div>
                            <div class="progress progress-info">
                              <div class="bar" style="width:<?php echo ($numero1*100)/$herramienta2; }?>% "></div>
                            </div>
                          </div>
					  </div>
					<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
                          <div class="stats-overview block clearfix">
                            <div class="display stat good huge">
                              <div class="percent">
                                <?php $ropa2 = "SELECT sum(s_cantidad)as total FROM stock WHERE CODIGOPRODUCTO in (SELECT  CODIGOPRODUCTO FROM producto WHERE P_IDENTIFICADOR='V')";
									$ropa1 = "SELECT Count(CODIGOPRODUCTO)as totales  FROM detalle_prestamo WHERE CODIGOPRODUCTO in(SELECT  CODIGOPRODUCTO FROM producto WHERE   P_IDENTIFICADOR='V')";
									
	
	$ropas1=mysql_query($ropa2,$conexion);	
	$ropas2=mysql_query($ropa1,$conexion);	
	while ($rowss1=mysql_fetch_array($ropas2)){ ?>
                                +
                                <?php $numero1=$rowss1["totales"];
	echo $numero1;}?>
                              </div>
                            </div>
                            <div class="details">
                              <div class="title">Prestamo Vehiculo</div>
                              <div class="numbers">
                                <?php 
		
	while ($rowss2=mysql_fetch_array($ropas1)){ ?>
                                <?php $vehiculo2=$rowss2["total"]; echo $vehiculo2;?>
                              </div>
                            </div>
                            <div class="progress progress-info">
                              <div class="bar" style="width:<?php echo ($numero1*100)/$vehiculo2; }?>% "></div>
                            </div>
                          </div>
				    </div>
				  </div>
					<!-- END OVERVIEW STATISTIC BARS-->
					<div class="row-fluid">
						<div class="span8">
							<!-- BEGIN SITE VISITS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-signal"></i>Bodega</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
									<a href="javascript:;" class="icon-refresh"></a>		
									<a href="javascript:;" class="icon-remove"></a>
									</span>							
								</div>
								<div class="widget-body">
								  <div id="chartContainer" style="width: 90%; height: 440px; " ></div>   
										
									
								</div>
							</div>
							<!-- END SITE VISITS PORTLET-->
						</div>
						<div class="span4">
							<!-- BEGIN NOTIFICATIONS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-bell"></i>Notificaciones</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-refresh"></a>
									</span>							
								</div>
								<div class="widget-body">
									<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
										 <?php
  
	$sql1 = "SELECT p.P_NOMBRE, s.S_CANTIDAD FROM producto p, stock s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA ";
	conectar();
	$rss=mysql_query($sql1,$conexion);		
	while ($row=mysql_fetch_array($rss)){
	
  ?>
										<li>
											<span class="label label-warning"><i class="icon-bell"></i></span>
                        
											<span>Bajo stock
                        <?=$row["P_NOMBRE"];?>
											 quedan 
                          <?=$row["S_CANTIDAD"];?>
                         en Bodega.</span>
						<?php } ?>
										</li>
								  </ul>
									<div class="space5"></div>
									<a href="#" class="pull-right">Todas las notifications</a>										
									<div class="clearfix no-top-space no-bottom-space"></div>
								</div>
							</div>
							<!-- END NOTIFICATIONS PORTLET-->
						</div>
					</div>
					<!-- BEGIN OVERVIEW STATISTIC BLOCKS-->
				  <div class="row-fluid"></div>
					<!-- END OVERVIEW STATISTIC BLOCKS-->
					<div class="row-fluid">
					  <div class="span6">
							<!-- BEGIN REGIONAL STATS PORTLET-->
							<!-- END REGIONAL STATS PORTLET-->
</div>
				  </div>
					<div class="row-fluid">
						<div class="span6">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<!-- END RECENT ORDERS PORTLET-->
</div>
						<div class="span6">
							<!-- BEGIN CHAT PORTLET-->
							<!-- END CHAT PORTLET-->
</div>
					</div>
					<div class="row-fluid">
						<div class="span8 responsive" data-tablet="span12 fix-margin" data-desktop="span8">
							<!-- BEGIN CALENDAR PORTLET-->
							<!-- END CALENDAR PORTLET-->
</div>
				  </div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->		
  </div>
		<!-- END PAGE -->
</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER --> <div id="footer">
      Bureau Veritas|Cesmec S.C.G.B desarrollado por Daniel jara,Rodrigo muñoz.
     
   </div>
	<!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
  <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>  
<script src="assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="assets/plugins/jquery.blockui.js" type="text/javascript"></script>  
   <script src="assets/plugins/jquery.cookie.js" type="text/javascript"></script>
   <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script> 
   <script type="text/javascript" src="js_mantenedores/jquery.fancybox.js"></script>
   <script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
      <script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
   <script type="text/javascript" src="assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
   <script type="text/javascript" src="assets/plugins/jquery.pulsate.min.js"></script>
   <script src="assets/scripts/form-validation.js"></script> 
   <script src="assets/scripts/app.js"></script>		
	<!-- END PAGE LEVEL SCRIPTS -->	
	
  <script src="notificaciones/toastr.js" type="text/javascript"></script>
<link href="notificaciones/toastr.css" rel="stylesheet" type="text/css" />

  
		<?php
include 'Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT p.P_NOMBRE, s.S_CANTIDAD FROM producto p, stock s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA");

while ($row = $cn->getRespuesta($res)){
    $array['title'] = $row['P_NOMBRE'];
    $array['text'] = $row['S_CANTIDAD'];
   
    array_push($return_arr, $array);
}

$cn->Desconectar();
json_encode($return_arr);
?>

<script>
 jQuery(document).ready(function() {	
 App.init();
 toastr.options.closeButton = true;
 toastr.options.newestOnTop = false;
 //toastr.options.hideDuration=1100;
//	toastr.options.timeOut=1500;
//toastr.options.showDuration=4000;
toastr.options.showMethod = 'slideDown'; 
toastr.options.hideMethod = 'slideUp'; 
if (jQuery().pulsate) {
            jQuery('#pulsate-regular').pulsate({
                color: "#bf1c56"
            });

            
        }
var dataSource=<?php  echo json_encode($return_arr);?>;
		
		for(var i=0;i<dataSource.length;i++)
		
    {
	var text=innerHTML=dataSource[i].text;
	var title=innerHTML=dataSource[i].title;

  
        (+dataSource[i]);
			
toastr.warning('Producto ' + title.toString() + ' bajo stock Quedan:' + text.toString() );

	}

});
</script> 
<script src="graficos/DevExpressChartJS-13.2.6/Demos/js/knockout-3.0.0.js"></script>
		<script src="graficos/DevExpressChartJS-13.2.6/Demos/js/globalize.min.js"></script>
		<script src="graficos/DevExpressChartJS-13.2.6/Demos/js/dx.chartjs.js"></script>
	<?php
$cns = new Conexion();
$cns->Conectar();
$return_arrs = array();
$ress = $cns->Consulta("SELECT SUM( S_CANTIDAD ) AS CANTIDAD, P_IDENTIFICADOR
FROM stock, producto
WHERE stock.CODIGOPRODUCTO = producto.CODIGOPRODUCTO
GROUP BY p_identificador
ORDER BY  cantidad desc
LIMIT 0 , 30");

while ($rowss = $cn->getRespuesta($ress)){
    $arrays['CANTIDAD'] = $rowss['CANTIDAD'];
	$arrays['P_IDENTIFICADOR'] = $rowss['P_IDENTIFICADOR'];
	
	
   array_push($return_arrs, $arrays);
  
}

$cns->Desconectar();
  json_encode($return_arrs);
?>
	
		<script>
			$(function ()  
				{
   var dataSources=[{tipo:"Insumo",cantida:<?php print ($insumo2);?>},{tipo:"Ropa",cantida:<?php print ($ropaxx2);?>},
  {tipo:"Herramienta",cantida:<?php print( $herramienta2);?>},
  {tipo:"Vehiculo",cantida:<?php print $vehiculo2; ?>}];


$("#chartContainer").dxPieChart({
tooltip: {
        enabled: true,
		color: "#aad700"
    },

    dataSource: dataSources,
	palette: "Pastel",
    title: "Materiales en bodega",
    legend: {
        horizontalAlignment: "right",
        verticalAlignment: "top",
        margin: 50
    },
    pointClick: function(point) {
        point.select();
    },
	commonSeriesSettings: {
           
      argumentField: "tipo",
	    valueField: "cantida",
	
		 
            type: "doughnut",
            
        },
		seriesTemplate: {
        nameField: "cantida",
		
		
    },
    
      
   
});
}
);
		</script>
        
      
</body>
		


</html>
