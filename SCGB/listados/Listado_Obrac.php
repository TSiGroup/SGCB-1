    <? session_start();
include ("../include/conectar.php");

?> 
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from www.keenthemes.com/preview/conquer/sample_invoice.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 14 Oct 2013 16:47:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
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
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div id="div" class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container-fluid"> <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="arrow"></span> </a>
              <div class="top-nav">
                <? $sql = "SELECT COUNT( p.P_NOMBRE )as NUMERO FROM PRODUCTO p, STOCK s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA ";
	conectar();
	$rs2=mysql_query($sql,$conexion);	
	while ($ros=mysql_fetch_array($rs2)){
              ?>
                <ul class="nav pull-right" id="top_menu">
                  <li class="divider-vertical hidden-phone hidden-tablet"></li>
                  <li class="dropdown" id="header_notification_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-warning-sign"></i> <span class="label label-important">
                    <?=$ros["NUMERO"];?>
                    </span> </a>
                      <ul class="dropdown-menu extended notification">
                        <li>
                          <p>tienes
                            <?=$ros["NUMERO"]; }?>
                            nuevas  notificaciones</p>
                        </li>
                        <?
  
	$sql111 = "SELECT p.P_NOMBRE, s.S_CANTIDAD FROM PRODUCTO p, STOCK s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA ";
	conectar();
	$rsss=mysql_query($sql111,$conexion);		
	while ($rowss=mysql_fetch_array($rsss)){
	
  ?>
                        <li> <a href="#"> <span class="label label-important"><i class="icon-bolt"></i></span> Bajo stock
                          <?=$rowss["P_NOMBRE"];?>
                          quedan <span class="small italic">
                            <?=$rowss["S_CANTIDAD"];?>
                          </span> en Bodega. </a> </li>
                        <?
						}?>
                        <li> <a href="#">Ver todas las notificaciones</a> </li>
                      </ul>
                  </li>
                  <li class="divider-vertical hidden-phone hidden-tablet"></li>
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <b class="caret"></b> </a>
                      <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-ok"></i> Calendario</a></li>
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
      
      <!-- END TOP NAVIGATION BAR -->
</div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->   
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <!-- BEGIN SIDEBAR -->
      <div id="sidebar" class="nav-collapse collapse">
         <div class="sidebar-toggler hidden-phone"></div>
         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->         
         <ul>
              <li class="sub">
               <a href="../inicio.php">
               <i class="icon-home"></i>
			   <span class="title ">Inicio</span>
               <span class="arrow "></span></a>
            </li>
            <li class="has-sub">
               <a href="javascript:;">
               <i class="icon-user "></i> 
               <span class="title ">Proveedor</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
                  <li ><a href="../proveedor/add_proveedor.php">Agregar Proveedor</a></li>
                  <li ><a href="../proveedor/mod_proveedor.php">Buscar</a></li>
				  <li ><a href="../listados/Listado_proveedor.php">Listado de proveedor</a></li>
                  <li ><a href="../graficos/producto_proveedor.php">Grafico</a></li>
                 
               </ul>
            </li>
           <li class="has-sub ">
               <a href="javascript:;">
               <i class="icon-book"></i> 
               <span class="title">Producto</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub">
                  <li ><a href="../Producto/Productos.php">Productos</a></li>
                 <li ><a href="../Producto/Productosb.php">Informes</a></li>
                  
               </ul>
           </li>
			 <li class="has-sub ">
               <a href="javascript:;">
               <i class="icon-group"></i> 
               <span class="title">Personal</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
                  <li ><a href="../Trabajador/add_trabajador.php">Agregar Trabajadores</a></li>
				  <li ><a href="../Cargo/add_cargo.php">Agregar cargo</a></li>
                  <li ><a href="../Trabajador/mod_trabajador.php">Buscar Trabajador</a></li>
				  <li ><a href="../Cargo/mod_cargo.php">Buscar Cargo</a></li>
				  <li ><a href="../Trabajador/termino_contrato.php">Termino Contrato</a></li>
				<li ><a href="../graficos/menu_graficostrabajador.php">Grafico</a></li>
				  <li ><a href="../listados/menu_listadostrabajador.php">Informe</a></li>
               </ul>
            </li>
           
           
            <li class="has-sub start active">
               <a href="javascript:;">
               <i class="icon-map-marker"></i> 
               <span class="title">Obra</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
                 <li  ><a href="../Obra/add_obra.php">Agregar obra</a></li>
                 <li  ><a href="../Obra/mod_obra.php">Buscar</a></li>
				 <li  ><a href="../Obra/cerrar_obra.php">Cerrar Obra</a></li>
				 <li  ><a href="../graficos/herramineta_obra.php">Grafico</a></li>
                 <li class="active"><a href="../listados/menu_listadoobra.php">Informe</a></li>
               </ul>
            </li>
            <li class="has-sub  ">
               <a href="javascript:;">
               <i class="icon-bar-chart"></i> 
               <span class="title">Bodega</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
                 <li ><a href="../Prestamo/prestamo.php">Prestamo</a></li>
				  <li ><a href="#">Devolucion</a></li>
                 <li ><a href="#">Buscar producto</a></li>
				 <li ><a href="#">Bajo de Stock</a></li>
				 <li ><a href="#">Dar de baja Producto</a></li>
                 <li ><a href="../ingreso_producto/ingreso_producto.php">Ingreso de Producto</a></li>
				 <li ><a href="../graficos/menu_graficoBodega.php">Grafico</a></li>
                 <li ><a href="../listados/menu_listadobodega.php">Informe</a></li>
               </ul>
            </li>
            <li class="has-sub  ">
               <a href="javascript:;">
               <i class="icon-search"></i> 
               <span class="title">informes y Graficos</span>
               <span class="arrow "></span>
               </a>


               <ul class="sub">
			   
				 <li ><a href="../graficos/menu_graficos.php">Graficos</a></li>
                 <li ><a href="../listados/menu_listados.php">Informes</a></li>
               </ul>
            </li>
            <li class="has-sub  ">
               <a href="javascript:;">
               <i class="icon-warning-sign"></i> 
               <span class="title">Administracion</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
			    <li ><a href="../Usuario/add_usuario.php">Agregar Usuario</a></li>
				 <li ><a href="../Usuario/mod_usuario.php">Buscar Usuario</a></li>
				 <li ><a href="#">Modificar ingreso Produccto</a></li>
                 <li ><a href="#">Eliminar</a></li>
               </ul>
            </li>
            <li class="">
               <a href="../logout.php">
               <i class="icon-user"></i> 
               <span class="title">Cerrar seccion</span>
               </a>
            </li>
         </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
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
                     Informe Obra Cerrada</h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="#">Inicio</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="../listados/menu_listadoobra.php">Informe</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="#">Informe Obra Cerrada </a></li>
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
                          <h1>Listado Obras Cerradas </h1> 
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
  	
	$sql = "SELECT O_NOMBRE,O_FECHAINICIO,O_FECHATERMINO FROM obra WHERE O_ESTADO=2";
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
