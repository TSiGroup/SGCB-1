    <? session_start();
include ("../include/conectar.php");
$CODIGO= $_SESSION["PERMISO"];
?> 
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<!-- BEGIN HEAD -->


<head>
   <meta charset="utf-8" />
  <title>Berau veritas|Cesmec</title>
  <link rel="shortcut icon" href="../favicon.ico">
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <!--IMPORTANT!: add media="screen" to bootstrap-responsive css for print mode-->
   <link href="../assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>
   <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="../assets/css/style.css" rel="stylesheet" />
   <link href="../assets/css/style-responsive.css" rel="stylesheet" />
   <link href="../assets/css/themes/default.css" rel="stylesheet" id="style_color" />
   <link href="../assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
   <link href="#" rel="stylesheet" id="style_metro" />
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BEGIN PAGE LEVEL STYLES -->
   <link href="../assets/css/pages/invoice.css" rel="stylesheet" type="text/css" />
   <link href="../assets/css/print.css" rel="stylesheet" type="text/css" media="print"/>
   <!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
         	<!-- BEGIN LOGO -->
				<a class="brand" href="../inicio.php">
				<img src="../assets/img/logo.png" alt="Conquer" />
				</a>
				<!-- END LOGO -->
         
         <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
           <span class="icon-bar"></span> 
           <span class="icon-bar"></span> 
           <span class="arrow"></span> </a>
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
                  </span> </a>
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
                        </span> en Bodega. </a> </li>
                      <?
						}?>
                      <li> <a href="#">Ver todas las notificaciones</a> </li>
                    </ul>
                </li>
                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <b class="caret"></b> </a>
                    <ul class="dropdown-menu">
                      <li><a href="../calendario/calendario.php"><i class="icon-calendar"></i> Calendario</a></li>
                      <li class="divider"></li>
                      <li>        
                      <a href="#"><i class="icon-user"> </i>
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
      <!-- BEGIN SIDEBAR -->
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
      <li class=""> <a href="Calendario/calendario.php"> <i class="icon-calendar"></i> <span class="title">Calendario</span> <span class="arrow "></span></a></li>
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
      <li class="has-sub  "> <a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Bodega</span> <span class="arrow "></span></a>
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
      <li class="has-sub star active"> <a href="javascript:;"> <i class="icon-search"></i> <span class="title">informes y Graficos</span> <span class="arrow "></span></a>
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
      <!-- BEGIN PAGE -->
<div id="body">
         <!-- BEGIN SAMPLE widget CONFIGURATION MODAL FORM-->
         <div id="widget-config" class="modal hide hidden-print">
            <div class="modal-header">
               <button data-dismiss="modal" class="close" type="button">×</button>
               <h3>Widget Settings</h3>
            </div>
            <div class="modal-body">
               <p>Here will be a configuration form</p>
            </div>
         </div>
         <!-- END SAMPLE widget CONFIGURATION MODAL FORM-->
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->      
            <div class="row-fluid hidden-print">
               <div class="span12">
                  <!-- BEGIN STYLE CUSTOMIZER-->
                  
                  <!-- END STYLE CUSTOMIZER-->        
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->        
                  <h3 class="page-title">
                     Informe Obra Abiertas </h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="#">Inicio</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="../listados/menu_listados.php">Informe</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="#">Informe Obra </a></li>
                  </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div id="page">
               <div class="invoice">
                     <div class="row-fluid invoice-logo">
                        <div class="span2 invoice-logo-space"><img src="../assets/img/logo.png"alt="" width="373" height="109" /> </div>
                         <div class="span10">
                           <p>
                          <script languaje="JavaScript">
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)



year+=1900



var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var dayarray=new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado")
var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")
document.write("<span class='class8' id=fecha>"+dayarray[day]+" "+daym+" de "+montharray[month]+" de "+year+"</span>")
</script>
                          <span class="span2 muted">
                          <h1>Listado Obra </h1> 
                          </span></p>
                        </div>
                     </div>
                    
					 
                     <div class="row-fluid">
                        <table class="table table-advance tabs-stacked">
                           <thead>
                              <tr class="table-condensed">
                                <th>Descripcion </th>
           						<th>Fecha inicio </th>
            					<th>Fecha termino </th>
            					
                                
                              </tr>
                           </thead>
                           <tbody>
						   <?
  	
	$sql = "SELECT O_NOMBRE,O_FECHAINICIO,O_FECHATERMINO FROM obra WHERE O_ESTADO=1";
	conectar();
	$rs=mysql_query($sql,$conexion);	
	while ($row=mysql_fetch_array($rs)){
	
	  
  ?>
                              <tr>
                                <td><?php echo $row['O_NOMBRE']; ?></td>
            <td><?php echo $row['O_FECHAINICIO']; ?></td>
            <td><?php echo $row['O_FECHATERMINO']; ?></td>
            
                                  
                              </tr>
                              <? } ?>
                           </tbody>
                        </table>
                     </div>
                     <div class="row-fluid">
                       <div class="span4"></div>
                        <div class="span8 invoice-block">
                          
                           <br />
                           <a class="btn btn-success btn-large hidden-print" onClick="javascript:window.print();">Imprimir <i class="icon-print icon-big"></i></a>
                           
                        </div>
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
   <!-- BEGIN FOOTER -->
    <div id="footer">
      Berau Veritas|Cesmec S.C.G.B desarrollado por Daniel jara,Rodrigo muñoz.
     
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN CORE PLUGINS -->
   <script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>   
   <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->  
   <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
   <script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <!--[if lt IE 9]>
   <script src="assets/plugins/excanvas.js"></script>
   <script src="assets/plugins/respond.js"></script>  
   <![endif]-->   
   <script src="../assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>  
   <!-- IMPORTANT! jquery.slimscroll.min.js depends on jquery-ui-1.10.1.custom.min.js --> 
   <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="../assets/plugins/jquery.blockui.js" type="text/javascript"></script>  
   <script src="../assets/plugins/jquery.cookie.js" type="text/javascript"></script>
   <script src="../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script> 
   <!-- END CORE PLUGINS -->
   <!-- BEGIN PAGE LEVEL PLUGINS -->
   <script type="text/javascript" src="../assets/plugins/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="../assets/scripts/app.js"></script> 
   <script>
      jQuery(document).ready(function() {       
         App.init();
      });
   </script>
  
</body>
</html>
