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
   <link rel="stylesheet" href="../assets/plugins/fancybox/source/jquery.fancybox.css"/>
   <link rel="stylesheet" href="../assets/plugins/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" href="jquery.dataTables.css" />
   
</head> 
   
<body class="fixed-top">
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
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
            <li class="has-sub ">
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
			 <li class="has-sub start active">
               <a href="javascript:;">
               <i class="icon-group"></i> 
               <span class="title">Personal</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
                  <li ><a href="../Trabajador/add_trabajador.php">Agregar Trabajadores</a></li>
				  <li ><a href="../Cargo/add_cargo.php">Agregar cargo</a></li>
                  <li ><a href="../Trabajador/mod_trabajador.php">Buscar Trabajador</a></li>
				  <li class="active"><a href="../Cargo/mod_cargo.php">Buscar Cargo</a></li>
				  <li ><a href="../Trabajador/termino_contrato.php">Termino Contrato</a></li>
					 <li ><a href="../graficos/menu_graficostrabajador.php">Grafico</a></li>
				  <li ><a href="../listados/menu_listadostrabajador.php">Informe</a></li>
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
				 <li ><a href="../Obra/cerrar_obra.php">Cerrar Obra</a></li>
				 <li ><a href="../graficos/herramineta_obra.php">Grafico</a></li>
                 <li ><a href="../listados/menu_listadoobra.php">Informe</a></li>
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
				  <li ><a href="../Devolucion/devolucion.php">Devolucion</a></li>
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
				 <li ><a href="../Modificar_producto/mod_ingresoProducto.php">Modificar ingreso Produccto</a></li>
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
         <!-- ??????????????????????????????????????-->
         <!--<div id="widget-config" class="modal hide">
            <div class="modal-header">
               
               <h3>widget Settings</h3>
            </div>
            <div class="modal-body">
               <p>Here will be a configuration form</p>
            </div>
         </div>-->
         <!-- ?????????????????????????????-->
         <div class="container-fluid">
            <div class="row-fluid">
               <div class="span12">
                  <h3 class="page-title">Cargo</h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="../inicio.php">Inicio</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="#">Personal</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="mod_cargo.php">Buscar Cargo</a></li>
                  </ul>

               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget box green">
                     <div class="widget-title">
                        <div class="widget-title">
                        <h4><i class="icon-globe"></i>Tabla Cargo</h4>
                     </div>
                     </div>
                     <div class="widget-body form">
                                               <h3>Lista de Cargos</h3>
                           
                         <div>
                         <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Position</th>
                <th>Office</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Position</th>
                <th>Office</th>
            </tr>
        </tfoot>
 
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td><input type="text" id="row-1-age" name="row-1-age" value="61"></td>
                <td><input type="text" id="row-1-position" name="row-1-position" value="System Architect"></td>
                <td><select size="1" id="row-1-office" name="row-1-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td><input type="text" id="row-2-age" name="row-2-age" value="63"></td>
                <td><input type="text" id="row-2-position" name="row-2-position" value="Accountant"></td>
                <td><select size="1" id="row-2-office" name="row-2-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo" selected="selected">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td><input type="text" id="row-3-age" name="row-3-age" value="66"></td>
                <td><input type="text" id="row-3-position" name="row-3-position" value="Junior Technical Author"></td>
                <td><select size="1" id="row-3-office" name="row-3-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td><input type="text" id="row-4-age" name="row-4-age" value="22"></td>
                <td><input type="text" id="row-4-position" name="row-4-position" value="Senior Javascript Developer"></td>
                <td><select size="1" id="row-4-office" name="row-4-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td><input type="text" id="row-5-age" name="row-5-age" value="33"></td>
                <td><input type="text" id="row-5-position" name="row-5-position" value="Accountant"></td>
                <td><select size="1" id="row-5-office" name="row-5-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo" selected="selected">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td><input type="text" id="row-6-age" name="row-6-age" value="61"></td>
                <td><input type="text" id="row-6-position" name="row-6-position" value="Integration Specialist"></td>
                <td><select size="1" id="row-6-office" name="row-6-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td><input type="text" id="row-7-age" name="row-7-age" value="59"></td>
                <td><input type="text" id="row-7-position" name="row-7-position" value="Sales Assistant"></td>
                <td><select size="1" id="row-7-office" name="row-7-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td><input type="text" id="row-8-age" name="row-8-age" value="55"></td>
                <td><input type="text" id="row-8-position" name="row-8-position" value="Integration Specialist"></td>
                <td><select size="1" id="row-8-office" name="row-8-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo" selected="selected">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td><input type="text" id="row-9-age" name="row-9-age" value="39"></td>
                <td><input type="text" id="row-9-position" name="row-9-position" value="Javascript Developer"></td>
                <td><select size="1" id="row-9-office" name="row-9-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Sonya Frost</td>
                <td><input type="text" id="row-10-age" name="row-10-age" value="23"></td>
                <td><input type="text" id="row-10-position" name="row-10-position" value="Software Engineer"></td>
                <td><select size="1" id="row-10-office" name="row-10-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Jena Gaines</td>
                <td><input type="text" id="row-11-age" name="row-11-age" value="30"></td>
                <td><input type="text" id="row-11-position" name="row-11-position" value="Office Manager"></td>
                <td><select size="1" id="row-11-office" name="row-11-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Quinn Flynn</td>
                <td><input type="text" id="row-12-age" name="row-12-age" value="22"></td>
                <td><input type="text" id="row-12-position" name="row-12-position" value="Support Lead"></td>
                <td><select size="1" id="row-12-office" name="row-12-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Charde Marshall</td>
                <td><input type="text" id="row-13-age" name="row-13-age" value="36"></td>
                <td><input type="text" id="row-13-position" name="row-13-position" value="Regional Director"></td>
                <td><select size="1" id="row-13-office" name="row-13-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Haley Kennedy</td>
                <td><input type="text" id="row-14-age" name="row-14-age" value="43"></td>
                <td><input type="text" id="row-14-position" name="row-14-position" value="Senior Marketing Designer"></td>
                <td><select size="1" id="row-14-office" name="row-14-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Tatyana Fitzpatrick</td>
                <td><input type="text" id="row-15-age" name="row-15-age" value="19"></td>
                <td><input type="text" id="row-15-position" name="row-15-position" value="Regional Director"></td>
                <td><select size="1" id="row-15-office" name="row-15-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Michael Silva</td>
                <td><input type="text" id="row-16-age" name="row-16-age" value="66"></td>
                <td><input type="text" id="row-16-position" name="row-16-position" value="Marketing Designer"></td>
                <td><select size="1" id="row-16-office" name="row-16-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Paul Byrd</td>
                <td><input type="text" id="row-17-age" name="row-17-age" value="64"></td>
                <td><input type="text" id="row-17-position" name="row-17-position" value="Chief Financial Officer (CFO)"></td>
                <td><select size="1" id="row-17-office" name="row-17-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Gloria Little</td>
                <td><input type="text" id="row-18-age" name="row-18-age" value="59"></td>
                <td><input type="text" id="row-18-position" name="row-18-position" value="Systems Administrator"></td>
                <td><select size="1" id="row-18-office" name="row-18-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Bradley Greer</td>
                <td><input type="text" id="row-19-age" name="row-19-age" value="41"></td>
                <td><input type="text" id="row-19-position" name="row-19-position" value="Software Engineer"></td>
                <td><select size="1" id="row-19-office" name="row-19-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Dai Rios</td>
                <td><input type="text" id="row-20-age" name="row-20-age" value="35"></td>
                <td><input type="text" id="row-20-position" name="row-20-position" value="Personnel Lead"></td>
                <td><select size="1" id="row-20-office" name="row-20-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Jenette Caldwell</td>
                <td><input type="text" id="row-21-age" name="row-21-age" value="30"></td>
                <td><input type="text" id="row-21-position" name="row-21-position" value="Development Lead"></td>
                <td><select size="1" id="row-21-office" name="row-21-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Yuri Berry</td>
                <td><input type="text" id="row-22-age" name="row-22-age" value="40"></td>
                <td><input type="text" id="row-22-position" name="row-22-position" value="Chief Marketing Officer (CMO)"></td>
                <td><select size="1" id="row-22-office" name="row-22-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Caesar Vance</td>
                <td><input type="text" id="row-23-age" name="row-23-age" value="21"></td>
                <td><input type="text" id="row-23-position" name="row-23-position" value="Pre-Sales Support"></td>
                <td><select size="1" id="row-23-office" name="row-23-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Doris Wilder</td>
                <td><input type="text" id="row-24-age" name="row-24-age" value="23"></td>
                <td><input type="text" id="row-24-position" name="row-24-position" value="Sales Assistant"></td>
                <td><select size="1" id="row-24-office" name="row-24-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Angelica Ramos</td>
                <td><input type="text" id="row-25-age" name="row-25-age" value="47"></td>
                <td><input type="text" id="row-25-position" name="row-25-position" value="Chief Executive Officer (CEO)"></td>
                <td><select size="1" id="row-25-office" name="row-25-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Gavin Joyce</td>
                <td><input type="text" id="row-26-age" name="row-26-age" value="42"></td>
                <td><input type="text" id="row-26-position" name="row-26-position" value="Developer"></td>
                <td><select size="1" id="row-26-office" name="row-26-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Jennifer Chang</td>
                <td><input type="text" id="row-27-age" name="row-27-age" value="28"></td>
                <td><input type="text" id="row-27-position" name="row-27-position" value="Regional Director"></td>
                <td><select size="1" id="row-27-office" name="row-27-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Brenden Wagner</td>
                <td><input type="text" id="row-28-age" name="row-28-age" value="28"></td>
                <td><input type="text" id="row-28-position" name="row-28-position" value="Software Engineer"></td>
                <td><select size="1" id="row-28-office" name="row-28-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Fiona Green</td>
                <td><input type="text" id="row-29-age" name="row-29-age" value="48"></td>
                <td><input type="text" id="row-29-position" name="row-29-position" value="Chief Operating Officer (COO)"></td>
                <td><select size="1" id="row-29-office" name="row-29-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Shou Itou</td>
                <td><input type="text" id="row-30-age" name="row-30-age" value="20"></td>
                <td><input type="text" id="row-30-position" name="row-30-position" value="Regional Marketing"></td>
                <td><select size="1" id="row-30-office" name="row-30-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo" selected="selected">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Michelle House</td>
                <td><input type="text" id="row-31-age" name="row-31-age" value="37"></td>
                <td><input type="text" id="row-31-position" name="row-31-position" value="Integration Specialist"></td>
                <td><select size="1" id="row-31-office" name="row-31-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Suki Burks</td>
                <td><input type="text" id="row-32-age" name="row-32-age" value="53"></td>
                <td><input type="text" id="row-32-position" name="row-32-position" value="Developer"></td>
                <td><select size="1" id="row-32-office" name="row-32-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Prescott Bartlett</td>
                <td><input type="text" id="row-33-age" name="row-33-age" value="27"></td>
                <td><input type="text" id="row-33-position" name="row-33-position" value="Technical Author"></td>
                <td><select size="1" id="row-33-office" name="row-33-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Gavin Cortez</td>
                <td><input type="text" id="row-34-age" name="row-34-age" value="22"></td>
                <td><input type="text" id="row-34-position" name="row-34-position" value="Team Leader"></td>
                <td><select size="1" id="row-34-office" name="row-34-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Martena Mccray</td>
                <td><input type="text" id="row-35-age" name="row-35-age" value="46"></td>
                <td><input type="text" id="row-35-position" name="row-35-position" value="Post-Sales support"></td>
                <td><select size="1" id="row-35-office" name="row-35-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Unity Butler</td>
                <td><input type="text" id="row-36-age" name="row-36-age" value="47"></td>
                <td><input type="text" id="row-36-position" name="row-36-position" value="Marketing Designer"></td>
                <td><select size="1" id="row-36-office" name="row-36-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Howard Hatfield</td>
                <td><input type="text" id="row-37-age" name="row-37-age" value="51"></td>
                <td><input type="text" id="row-37-position" name="row-37-position" value="Office Manager"></td>
                <td><select size="1" id="row-37-office" name="row-37-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Hope Fuentes</td>
                <td><input type="text" id="row-38-age" name="row-38-age" value="41"></td>
                <td><input type="text" id="row-38-position" name="row-38-position" value="Secretary"></td>
                <td><select size="1" id="row-38-office" name="row-38-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Vivian Harrell</td>
                <td><input type="text" id="row-39-age" name="row-39-age" value="62"></td>
                <td><input type="text" id="row-39-position" name="row-39-position" value="Financial Controller"></td>
                <td><select size="1" id="row-39-office" name="row-39-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Timothy Mooney</td>
                <td><input type="text" id="row-40-age" name="row-40-age" value="37"></td>
                <td><input type="text" id="row-40-position" name="row-40-position" value="Office Manager"></td>
                <td><select size="1" id="row-40-office" name="row-40-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Jackson Bradshaw</td>
                <td><input type="text" id="row-41-age" name="row-41-age" value="65"></td>
                <td><input type="text" id="row-41-position" name="row-41-position" value="Director"></td>
                <td><select size="1" id="row-41-office" name="row-41-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Olivia Liang</td>
                <td><input type="text" id="row-42-age" name="row-42-age" value="64"></td>
                <td><input type="text" id="row-42-position" name="row-42-position" value="Support Engineer"></td>
                <td><select size="1" id="row-42-office" name="row-42-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Bruno Nash</td>
                <td><input type="text" id="row-43-age" name="row-43-age" value="38"></td>
                <td><input type="text" id="row-43-position" name="row-43-position" value="Software Engineer"></td>
                <td><select size="1" id="row-43-office" name="row-43-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Sakura Yamamoto</td>
                <td><input type="text" id="row-44-age" name="row-44-age" value="37"></td>
                <td><input type="text" id="row-44-position" name="row-44-position" value="Support Engineer"></td>
                <td><select size="1" id="row-44-office" name="row-44-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo" selected="selected">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Thor Walton</td>
                <td><input type="text" id="row-45-age" name="row-45-age" value="61"></td>
                <td><input type="text" id="row-45-position" name="row-45-position" value="Developer"></td>
                <td><select size="1" id="row-45-office" name="row-45-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Finn Camacho</td>
                <td><input type="text" id="row-46-age" name="row-46-age" value="47"></td>
                <td><input type="text" id="row-46-position" name="row-46-position" value="Support Engineer"></td>
                <td><select size="1" id="row-46-office" name="row-46-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Serge Baldwin</td>
                <td><input type="text" id="row-47-age" name="row-47-age" value="64"></td>
                <td><input type="text" id="row-47-position" name="row-47-position" value="Data Coordinator"></td>
                <td><select size="1" id="row-47-office" name="row-47-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Zenaida Frank</td>
                <td><input type="text" id="row-48-age" name="row-48-age" value="63"></td>
                <td><input type="text" id="row-48-position" name="row-48-position" value="Software Engineer"></td>
                <td><select size="1" id="row-48-office" name="row-48-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Zorita Serrano</td>
                <td><input type="text" id="row-49-age" name="row-49-age" value="56"></td>
                <td><input type="text" id="row-49-position" name="row-49-position" value="Software Engineer"></td>
                <td><select size="1" id="row-49-office" name="row-49-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Jennifer Acosta</td>
                <td><input type="text" id="row-50-age" name="row-50-age" value="43"></td>
                <td><input type="text" id="row-50-position" name="row-50-position" value="Junior Javascript Developer"></td>
                <td><select size="1" id="row-50-office" name="row-50-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td><input type="text" id="row-51-age" name="row-51-age" value="46"></td>
                <td><input type="text" id="row-51-position" name="row-51-position" value="Sales Assistant"></td>
                <td><select size="1" id="row-51-office" name="row-51-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td><input type="text" id="row-52-age" name="row-52-age" value="47"></td>
                <td><input type="text" id="row-52-position" name="row-52-position" value="Regional Director"></td>
                <td><select size="1" id="row-52-office" name="row-52-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td><input type="text" id="row-53-age" name="row-53-age" value="21"></td>
                <td><input type="text" id="row-53-position" name="row-53-position" value="Systems Administrator"></td>
                <td><select size="1" id="row-53-office" name="row-53-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td><input type="text" id="row-54-age" name="row-54-age" value="30"></td>
                <td><input type="text" id="row-54-position" name="row-54-position" value="Developer"></td>
                <td><select size="1" id="row-54-office" name="row-54-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td><input type="text" id="row-55-age" name="row-55-age" value="51"></td>
                <td><input type="text" id="row-55-position" name="row-55-position" value="Regional Director"></td>
                <td><select size="1" id="row-55-office" name="row-55-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td><input type="text" id="row-56-age" name="row-56-age" value="29"></td>
                <td><input type="text" id="row-56-position" name="row-56-position" value="Javascript Developer"></td>
                <td><select size="1" id="row-56-office" name="row-56-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td><input type="text" id="row-57-age" name="row-57-age" value="27"></td>
                <td><input type="text" id="row-57-position" name="row-57-position" value="Customer Support"></td>
                <td><select size="1" id="row-57-office" name="row-57-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
        </tbody>
    </table>
                </div>
                <div class="form-actions">
                              <input type="button" name="enviar" value="Guardar" onClick="contar()" class="btn btn-success" ></button>
                           </div>
         
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
<script type="text/javascript" src="jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
<script src="../assets/scripts/app.js"></script>
<script src="../assets/scripts/table-managed.js"></script>  <script src="../assets/scripts/form-validation.js"></script> 
<script type="text/javascript" src="../assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
 
   
 <script>
/* Create an array with the values of all the input boxes in a column */
$.fn.dataTable.ext.order['dom-text'] = function  ( settings, col )
{
    return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
        return $('input', td).val();
    } );
}
 
/* Create an array with the values of all the input boxes in a column, parsed as numbers */
$.fn.dataTable.ext.order['dom-text-numeric'] = function  ( settings, col )
{
    return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
        return $('input', td).val() * 1;
    } );
}
 
/* Create an array with the values of all the select options in a column */
$.fn.dataTable.ext.order['dom-select'] = function  ( settings, col )
{
    return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
        return $('select', td).val();
    } );
}
 
/* Create an array with the values of all the checkboxes in a column */
$.fn.dataTable.ext.order['dom-checkbox'] = function  ( settings, col )
{
    return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
        return $('input', td).prop('checked') ? '1' : '0';
    } );
}
 
/* Initialise the table with the required column ordering data types */
$(document).ready(function() {
    $('#example').dataTable( {
        "columns": [
            null,
            { "orderDataType": "dom-text-numeric" },
            { "orderDataType": "dom-text", type: 'string' },
            { "orderDataType": "dom-select" }
        ]
    } );
} );


function contar(){
	      
	
	}

 // App.init();	
</script>     
        
</body>
</html>