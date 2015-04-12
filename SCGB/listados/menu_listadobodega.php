<? session_start();
include ("../include/conectar.php");	
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
   
</head> 
   
<body class="fixed-top">
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
  <div id="div" class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid"> <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="arrow"></span> </a>
          <div class="top-nav">
            <? $sql = "SELECT COUNT( p.P_NOMBRE )as NUMERO FROM PRODUCTO p, STOCK s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA ";
	conectar();
	$rs=mysql_query($sql,$conexion);	
	while ($row=mysql_fetch_array($rs)){
              ?>
            <ul class="nav pull-right" id="top_menu">
              <li class="divider-vertical hidden-phone hidden-tablet"></li>
              <li class="dropdown" id="header_notification_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-warning-sign"></i> <span class="label label-important">
                <?=$row["NUMERO"];?>
                </span> </a>
                  <ul class="dropdown-menu extended notification">
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
                    <li><a href="#"><i class="icon-ok"></i> Calendario</a></li>
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
</div>
   <div id="container" class="row-fluid">
      <div id="sidebar" class="nav-collapse collapse">
         <div class="sidebar-toggler hidden-phone"></div>       
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
				  <li ><a href="#">Termino Contrato</a></li>
				<li ><a href="../graficos/menu_graficostrabajador.php">Grafico</a></li>
				  <li class="active" ><a href="../listados/menu_listadostrabajador.php">Informe</a></li>
               </ul>
            </li>
           
           
            <li class="has-sub ">
               <a href="javascript:;">
               <i class="icon-map-marker"></i> 
               <span class="title">Obra</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
                 <li  ><a href="../Obra/add_obra.php">Agregar obra</a></li>
                 <li  ><a href="../Obra/mod_obra.php">Buscar</a></li>
				 <li ><a href="#">Cerrar Obra</a></li>
				 <li ><a href="../graficos/herramineta_obra.php">Grafico</a></li>
                 <li ><a href="../listados/menu_listadoobra.php">Informe</a></li>
               </ul>
            </li>
            <li class="has-sub start active ">
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
                 <li  ><a href="../ingreso_producto/ingreso_producto.php">Ingreso de Producto</a></li>
				 <li ><a href="../graficos/menu_graficoBodega.php">Grafico</a></li>
                 <li class="active"><a href="../listados/menu_listadobodega.php">Informe</a></li>
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
      </div>
      
      <div id="body">
         <!-- ???????????????????????????????????????-->
       <!--  <div id="widget-config" class="modal hide">
            <div class="modal-header">
               
               <h3>widget Settings</h3>
            </div>
            <div class="modal-body">
               <p>Here will be a configuration form</p>
            </div>
         </div>-->
         <!-- ????????????????????????????????????????????-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER--><!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN VALIDATION STATES--><!-- END VALIDATION STATES-->
                  <h3 class="page-title">Producto</h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="../inicio.php">Incio</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="#">Producto</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="Productos.php">Productos</a></li>
                  </ul>

               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN VALIDATION STATES-->
                  <div class="widget box green">
                     <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Informe  Productos</h4>
                     </div>
                     <div class="widget-body form">
                        <!-- Iniio de Botones-->
                           <div class="row-fluid">
                              <a href="../listados/Listado_herramienta.php" class="icon-btn span3">
                                 <i class="icon-cogs"></i>
                                 <div>Herramienta </div>
                                 <!--<span class="badge badge-important">2</span>-->
                              </a>
                              <a href="../listados/Listado_insumo.php" class="icon-btn span3">
                                 <i class="icon-heart"></i>
                                 <div>Insumo</div>
                              </a>
                              <a href="../listados/Listado_ropa.php" class="icon-btn span3">
                                 <i class="icon-group"></i>
                                 <div>Ropa</div>
                              </a>
                           </div>
                           <div class="row-fluid">
                              <a href="../Vehiculo_Particular/mod_vehiculoParticular.php" class="icon-btn span3">
                                 <i class="icon-truck"></i>
                                 <div>Vehiculo Particular</div>
                              </a>
                              <a href="../Vehiculo_Arriendo/mod_vehiculoArriendo.php" class="icon-btn span3">
                                 <i class="icon-dashboard"></i>
                                 <div>Vehiculo Arriendo</div>
                              </a>
                              
                           </div>
                    </div>
                 </div>
                        <!-- Fin de los Botones-->
              </div>
           </div>
                  <!-- END VALIDATION STATES-->
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
      Bureau Veritas|Cesmec S.C.G.B desarrollado por Daniel Jara,Rodrigo Muñoz.
     
   </div>
  
   <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
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
   <script type="text/javascript" src="../assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
   <script type="text/javascript" src="../assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
   <script type="text/javascript" src="../assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL STYLES -->
   <script src="../assets/scripts/app.js"></script>
   <script src="../assets/scripts/form-validation.js"></script> 
   
     <script>
      jQuery(document).ready(function() { 
	     App.init();
         FormValidation.init();		 
	   $("#form2").submit(function(e){ 
           CODIGO= $('#CODIGO').val()
		   NOMBRE= $('#NOMBRE').val()
		   MARCA= $('#MARCA').val()
		   MODELO= $('#MODELO').val()
		   IDENTIFICADOR= "I"   
            e.preventDefault();//Detenemos submit
            $.ajax({
                type: 'POST',
                url: '../Producto/guardar_producto.php',
                data: { CODIGO:CODIGO, NOMBRE: NOMBRE, MARCA: MARCA, MODELO:MODELO, IDENTIFICADOR:IDENTIFICADOR},
               success: function(data){
			   guardaInsumo();
			   guardarStock();
               form2.CODIGO.value = "";
               form2.NOMBRE.value = "";
               form2.MARCA.value = "";
			   form2.MODELO.value = "";
			   form2.TALLA.value = "";
			   form2.UNIDAD.value = "Unitario";
			   form2.CANTIDADMINIMA.value = "0";
     
                }
            });
            
        });
      });
	  
	  function guardaInsumo(){
		   CODIGO= $('#CODIGO').val()
		   TALLA= $('#TALLA').val()
		   UNIDAD= $('#UNIDAD').val()
		   $.ajax({
                type: 'POST',
                url: 'guardar_insumo.php',
                data: { CODIGO:CODIGO, TALLA:TALLA, UNIDAD:UNIDAD}
		         });
		  }
		  
		  function guardarStock(){
		   CODIGO= $('#CODIGO').val();
		   CANTIDADMINIMA= $('#CANTIDADMINIMA').val();
		   CANTIDAD=0;
		   $.ajax({
                type: 'POST',
                url: '../Stock/guardar_stock.php',
                data: { CODIGO:CODIGO, CANTIDADMINIMA:CANTIDADMINIMA, CANTIDAD:CANTIDAD}
		         });
		  }
		  
		  
   </script>  
</body>
</html>