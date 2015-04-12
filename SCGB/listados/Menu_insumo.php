<? session_start();
$CODIGO= $_SESSION["PERMISO"];
include ("../include/conectar.php");	
?>
<?php
include '../Conexion.php';
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
   <link rel="stylesheet" href="../assets/plugins/data-tables/DT_bootstrap.css" />
   <link href="../assets/css/pages/invoice.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="../css_mantenedoressd/alertify.core.css" />
   <link rel="stylesheet" href="../css_mantenedoressd/alertify.default.css" />
  
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
      <li class="has-sub  star active"> <a href="javascript:;"> <i class="icon-search"></i> <span class="title">informes y Graficos</span> <span class="arrow "></span></a>
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
    <!-- BEGIN SAMPLE widget CONFIGURATION MODAL FORM-->
    <div id="widget-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>widget Settings</h3>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
    </div>
    <!-- END SAMPLE widget CONFIGURATION MODAL FORM--> 
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid"> 
      <!-- BEGIN PAGE HEADER-->
      <div class="row-fluid">
        <div class="span12">
          <h3 class="page-title">Ficha Trabajador</h3>
          <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="../inicio.php">Incio</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="menu_listados.php">Informes</a>
                        <i class="icon-angle-right"></i>
                     </li>
                    </ul>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget box blue" id="form_wizard_1">
            <div class="widget-body form">
              <form  action="Listado_insumob.php" class="form-horizontal" id="form1" name="form1" method="post">
                
                  <div class="navbar steps"></div>
                  <div class="tab-content">
                  
                      <h3>Reporte Por Fecha</h3>
                    <div class="control-group">
                      <label class="control-label">Fecha inicio</label>
                        <div class="controls" id="map_canvas">
                          <input type="date" name="FECHA" id="FECHA" required>
                          <label for="entera3"></label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Fecha termino</label>
                        <div class="controls">
                          <input type="date" name="FECHA2" id="FECHA2">
                          <label for="entera4"required></label>
                      </div>
                      </div>
                    <div class="control-group">
                      <div class="form-actions">
                          <input type="Submit" name="enviar" value="Generar" class="btn btn-success" ></input>
                             
                          
                    </div>
                    
                    <!-- div tab panel 2-->
                    
                      
                      
                      
                      
                    </div>
                </div>
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="footer">
  <p>Bureau Veritas|Cesmec S.C.G.B desarrollado por Daniel Jara,Rodrigo Muñoz.</p>
</div>

<script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>  
<script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="../assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script> 
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="../assets/plugins/jquery.blockui.js" type="text/javascript"></script> 
<script src="../assets/plugins/jquery.cookie.js" type="text/javascript"></script> 
<script src="../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script> 
<script type="text/javascript" src="../assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script> 
<script type="text/javascript" src="../assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script> 
<script src="../assets/scripts/app.js"></script> 
<script src="../js_mantenedores/wizardPrestamo.js"></script>  
<script type="text/javascript" src="../assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="../js_mantenedores/alertify.js"></script>
<script src="../notificaciones/toastr.js" type="text/javascript"></script>
<link href="../notificaciones/toastr.css" rel="stylesheet" type="text/css" />




<script>
      jQuery(document).ready(function() {       
         App.init();
      });
	  
   </script> 
 
</body>
</html>