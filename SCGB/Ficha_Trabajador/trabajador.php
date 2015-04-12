<? session_start();
include ("../include/conectar.php");
 $Xy = $_POST['RUN'];
 $nom=$_POST['NOMBRE'];
 $ape=$_POST['APELLIDO'];
 $CODIGO= $_SESSION["PERMISO"];		
?>
<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$cn3 = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT RUN FROM TRABAJADOR where T_ESTADO=1");

$cn2->Conectar();
$res2 = $cn2->Consulta("SELECT CODIGOOBRA,O_NOMBRE FROM OBRA where O_ESTADO=1");

$cn3->Conectar();
$res3 = $cn3->Consulta("Select count(CODIGOPRESTAMO)+1 AS ID from PRESTAMO");
while($row3 = $cn3->getRespuesta($res3)){ 
 $CODIGOPRESTAMO=$row3['ID']; 
}

?>
<? $sql = "SELECT  t.t_nombre,t.t_apellido,t.t_sexo,t_direccion,t.t_telefono,c.c_nombre,c.c_descripcion,ht.ht_fechainicio,ht.ht_observacion from trabajador t, cargo c,historico_trabajador ht where c.CODIGOCARGO=t.CODIGOCARGO and ht.RUN=t.RUN and t.run='$Xy' ";
	conectar();
	$rs=mysql_query($sql,$conexion);	
	while ($row=mysql_fetch_array($rs)){
             							$t_nombre=$row["t_nombre"];
                                        $t_apellido=$row["t_apellido"];
                                        $t_sexo=$row["t_sexo"];
                                        $t_direccion=$row["t_direccion"];
                                        $t_telefono=$row["t_telefono"];
                                        $c_nombre=$row["c_nombre"];
                                        $c_descrpcion=$row["c_descripcion"];
                                        $ht_fechainicio=$row["ht_fechainicio"];
                                        $ht_observacion=$row["ht_observacion"];
										 }?> 
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
      <li class="has-sub  star active "> <a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Bodega</span> <span class="arrow "></span></a>
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
         <!-- BEGIN SAMPLE widget CONFIGURATION MODAL FORM-->
         <div id="widget-config" class="modal hide">
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
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN STYLE CUSTOMIZER-->
                  <div id="styler" class="hidden-phone">
                     <i class="icon-cog"></i>
                     <span class="settings">
                     <span class="text">Style:</span>
                     <span class="colors">
                     <span class="color-default" data-style="default">
                     </span>
                     <span class="color-grey" data-style="grey">
                     </span>
                     <span class="color-navygrey" data-style="navygrey">
                     </span>                                
                     <span class="color-red" data-style="red">
                     </span>  
                     </span>
                     <span class="layout">
                     <label class="hidden-phone">
                     <input type="checkbox" class="header" checked value="" />Sticky Header
                     </label><br />
                     <label><input type="checkbox" class="metro" value="" />Metro Style</label>
                     </span>
                     </span>
                  </div>
                  <!-- END STYLE CUSTOMIZER-->        
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->        
                  <h3 class="page-title">
                    
                  </h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="index.html">Home</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="#">Sample Pages</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="#">User Profile</a></li>
                  </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div id="page">
               <div class="row-fluid profile">
                  <div class="span12">
                     <!--BEGIN TABS-->
                     <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-tasks"></i>Hoja de Vida</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
                           <a href="javascript:;" class="icon-refresh"></a>      
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>
                        </div>
                        <div class="widget-body">
                           <div class="tabbable tabbable-custom">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#tab_1_1" data-toggle="tab">Overview</a></li>
                                 <li><a href="#tab_1_2" data-toggle="tab">Informacion Trabajador</a></li>
                                
                                 <li><a href="#tab_1_4" data-toggle="tab">Obra</a></li>
                                 <li><a href="#tab_1_6" data-toggle="tab">Help</a></li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane row-fluid active" id="tab_1_1">
                                    
                                    <div class="span9">
                                       <div class="row-fluid">
                                          <div class="span12 profile-info">
                                             <h1><? echo $nom." ".$ape;?></h1>
                                             <p> <? print $c_nombre." ".$c_descrpcion." Ingreso con fecha de contrato el ".$ht_fechainicio;   ?>.</p>
                                             
                                             <ul class="unstyled inline">
                                               
                                                <li><i class="icon-calendar"></i> <? print $ht_fechainicio;?></li>
                                                <li><i class="icon-briefcase"></i> <? print $c_nombre;?></li>
                                                
                                             </ul>
                                          </div>
                                          <!--end span8-->
                                          <!--end span4-->
                                       </div>
                                       <!--end row-fluid-->
                                       <div class="tabbable tabbable-custom tabbable-custom-profile">
                                          <ul class="nav nav-tabs">
                                             <li class="active"><a href="#tab_1_11" data-toggle="tab">Prestamo Activos</a></li>
                                             <li class=""><a href="#tab_1_22" data-toggle="tab">Prestamo Devueltos</a></li>
                                          </ul>
                                          <div class="tab-content">
                                             <div class="tab-pane active" id="tab_1_11">
                                                <div class="portlet-body" style="display: block;">
                                                   <table class="table table-striped table-bordered table-advance table-hover">
                                                      <thead>
                                                         <tr>
                                                            <th><i class="icon-briefcase"></i>Obra</th>
                                                            <th class="hidden-phone"><i class="icon-question-sign"></i> Producto</th><th class="hidden-phone"><i class="icon-question-sign"></i> Codigo Producto Unitario</th>
                                                            <th>Fecha Prestamo</th>
                                                         </tr>
                                                      </thead>
                                                      <? $sql = "SELECT distinct(pu.CODIGOUNITARIO),p.P_NOMBRE,o.o_nombre,dp.CODIGOPRODUCTO as cantidad ,pt.pt_fecha  from producto p, obra o,prestamo pt,detalle_prestamo dp, producto_unitario pu where pt.CODIGOPRESTAMO=dp.CODIGOPRESTAMO and o.CODIGOOBRA=pt.CODIGOOBRA and  p.CODIGOPRODUCTO=dp.CODIGOPRODUCTO and dp.CODIGOUNITARIO=pu.CODIGOUNITARIO and pt.run='$Xy' and pt.pt_estado=1 GROUP BY pu.CODIGOUNITARIO ";
	conectar();
	$rs=mysql_query($sql,$conexion);	
	while ($tabla=mysql_fetch_array($rs)){?>
                                                      <tbody>
                                                         <tr>
                                                            <td><?=$tabla["o_nombre"];?></td>
                                                            <td ><?=$tabla["P_NOMBRE"];?></td>
                                                            <td ><?=$tabla["cantidad"];?>-<?=$tabla["CODIGOUNITARIO"];?></td>
                                                            <td> <?=$tabla["pt_fecha"];?></td>
                                                         </tr>
                                                         <tr>
                                                         <? } ?>
                                                            
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                             <!--tab-pane-->
                                             <div class="tab-pane" id="tab_1_22">
                                                <div class="tab-pane active" id="tab_1_1_1">
                                                   
                                                      <div class="tab-pane active" id="tab_1_11">
                                                <div class="portlet-body" style="display: block;">
                                                   <table class="table table-striped table-bordered table-advance table-hover">
                                                      <thead>
                                                         <tr>
                                                            <th><i class="icon-briefcase"></i>Obra</th>
                                                            <th class="hidden-phone"><i class="icon-question-sign"></i> Producto</th><th class="hidden-phone"><i class="icon-question-sign"></i> Codigo Producto Unitario</th>
                                                            <th>Fecha Prestamo</th>
                                                         </tr>
                                                      </thead>
                                                      <? $sql = "SELECT distinct(pu.CODIGOUNITARIO),p.P_NOMBRE,o.o_nombre,dp.CODIGOPRODUCTO as cantidad ,pt.pt_fecha  from producto p, obra o,prestamo pt,detalle_prestamo dp, producto_unitario pu where pt.CODIGOPRESTAMO=dp.CODIGOPRESTAMO and o.CODIGOOBRA=pt.CODIGOOBRA and  p.CODIGOPRODUCTO=dp.CODIGOPRODUCTO and dp.CODIGOUNITARIO=pu.CODIGOUNITARIO and pt.run='$Xy' and pt.pt_estado=0 GROUP BY pu.CODIGOUNITARIO ";
	conectar();
	$rs=mysql_query($sql,$conexion);	
	while ($tabla=mysql_fetch_array($rs)){?>
                                                      <tbody>
                                                         <tr>
                                                            <td><?=$tabla["o_nombre"];?></td>
                                                            <td ><?=$tabla["P_NOMBRE"];?></td>
                                                            <td ><?=$tabla["cantidad"];?>-<?=$tabla["CODIGOUNITARIO"];?></td>
                                                            <td> <?=$tabla["pt_fecha"];?></td>
                                                         </tr>
                                                         <tr>
                                                         <? } ?>
                                                            
                                                      </tbody>
                                                   </table>
                                                </div>
                                            
                                                   </div>
                                                </div>
                                             </div>
                                             <!--tab-pane-->
                                          </div>
                                       </div>
                                    </div>
                                    <!--end span9-->
                                 </div>
                                 <!--end tab-pane-->
                                 <div class="tab-pane profile-classic row-fluid" id="tab_1_2">
                                    <div class="span2"><img src="../Imagenes/application-community.png" alt="" /> </div>
                                    <ul class="unstyled span10">
                                    
                                      
                                       <li><span>Nombre:</span><? print $t_nombre;?>. </li>
                                       <li><span>Apellido:</span><? print $t_apellido;?>.</li>
                                       <li><span>Sexo:</span><? print $t_sexo;?>.</li>
                                       <li><span>Direccion:</span><? print $t_direccion;?>.</li>
                                       <li><span>Telefono:</span><? print $t_telefono;?>.</li>
                                       <li><span>Cargo:</span><? print $c_nombre;?>.</li>
                                       <li><span>Descripcion:</span><? print $c_descrpcion;?>.</li>
                                       <li><span>Fecha contrato:</span><? print $ht_fechainicio;?>.</li>
                                       <li><span>Observacion</span> <? print $ht_observacion;?>.</li>
                                    </ul>
                                 </div>
                                 <!--tab_1_2-->
                                 <div class="tab-pane row-fluid profile-account" id="tab_1_3">
                                    <div class="row-fluid">
                                       <div class="span12">
                                          <div class="span3">
                                             <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li class="active">
                                                   <a data-toggle="tab" href="#tab_1-1">
                                                   <i class="icon-cog"></i> 
                                                   Personal info
                                                   </a> 
                                                   <span class="after"></span>                                    
                                                </li>
                                                <li class=""><a data-toggle="tab" href="#tab_2-2"><i class="icon-picture"></i> Change Avatar</a></li>
                                                <li class=""><a data-toggle="tab" href="#tab_3-3"><i class="icon-lock"></i> Change Password</a></li>
                                                <li class=""><a data-toggle="tab" href="#tab_4-4"><i class="icon-eye-open"></i> Privacity Settings</a></li>
                                             </ul>
                                          </div>
                                          <div class="span9">
                                             <div class="tab-content">
                                                <div id="tab_1-1" class="tab-pane active">
                                                   <div style="height: auto;" id="accordion1-1" class="accordion collapse">
                                                      <form action="#">
                                                         <label class="control-label">First Name</label>
                                                         <input type="text" placeholder="John" class="m-wrap span8" />
                                                         <label class="control-label">Last Name</label>
                                                         <input type="text" placeholder="Doe" class="m-wrap span8" />
                                                         <label class="control-label">Mobile Number</label>
                                                         <input type="text" placeholder="+1 646 580 DEMO (6284)" class="m-wrap span8" />
                                                         <label class="control-label">Interests</label>
                                                         <input type="text" placeholder="Design, Web etc." class="m-wrap span8" />
                                                         <label class="control-label">Occupation</label>
                                                         <input type="text" placeholder="Web Developer" class="m-wrap span8" />
                                                         <label class="control-label">Counrty</label>
                                                         <div class="controls">
                                                            <input type="text" class="span8 m-wrap" style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;US&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]" />
                                                            <p class="help-block"><span class="muted">Start typing to auto complete!. E.g: US</span></p>
                                                         </div>
                                                         <label class="control-label">About</label>
                                                         <textarea class="span8 m-wrap" rows="3"></textarea>
                                                         <label class="control-label">Website Url</label>
                                                         <input type="text" placeholder="http://www.mywebsite.com" class="m-wrap span8" />
                                                         <div class="submit-btn">
                                                            <a href="#" class="btn green">Save Changes</a>
                                                            <a href="#" class="btn">Cancel</a>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                                <div id="tab_2-2" class="tab-pane">
                                                   <div style="height: auto;" id="accordion2-2" class="accordion collapse">
                                                      <form action="#">
                                                         <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                                                         <br />
                                                         <div class="controls">
                                                            <div class="thumbnail" style="width: 291px; height: 170px;">
                                                               <img src="http://www.placehold.it/291x170/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                            </div>
                                                         </div>
                                                         <div class="space10"></div>
                                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="input-append">
                                                               <div class="uneditable-input">
                                                                  <i class="icon-file fileupload-exists"></i> 
                                                                  <span class="fileupload-preview"></span>
                                                               </div>
                                                               <span class="btn btn-file">
                                                               <span class="fileupload-new">Select file</span>
                                                               <span class="fileupload-exists">Change</span>
                                                               <input type="file" class="default" />
                                                               </span>
                                                               <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                            </div>
                                                         </div>
                                                         <div class="clearfix"></div>
                                                         <div class="controls">
                                                            <span class="label label-important">NOTE!</span>
                                                            <span>You can write some information here..</span>
                                                         </div>
                                                         <div class="space10"></div>
                                                         <div class="submit-btn">
                                                            <a href="#" class="btn green">Submit</a>
                                                            <a href="#" class="btn">Cancel</a>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                                <div id="tab_3-3" class="tab-pane">
                                                   <div style="height: auto;" id="accordion3-3" class="accordion collapse">
                                                      <form action="#">
                                                         <label class="control-label">Current Password</label>
                                                         <input type="password" class="m-wrap span8" />
                                                         <label class="control-label">New Password</label>
                                                         <input type="password" class="m-wrap span8" />
                                                         <label class="control-label">Re-type New Password</label>
                                                         <input type="password" class="m-wrap span8" />
                                                         <div class="submit-btn">
                                                            <a href="#" class="btn green">Change Password</a>
                                                            <a href="#" class="btn">Cancel</a>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                                <div id="tab_4-4" class="tab-pane">
                                                   <div style="height: auto;" id="accordion4-4" class="accordion collapse">
                                                      <form action="#">
                                                         <div class="profile-settings row-fluid">
                                                            <div class="span9">
                                                               <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..</p>
                                                            </div>
                                                            <div class="control-group span3">
                                                               <div class="controls">
                                                                  <label class="radio">
                                                                  <input type="radio" name="optionsRadios1" value="option1" />
                                                                  Yes
                                                                  </label>
                                                                  <label class="radio">
                                                                  <input type="radio" name="optionsRadios1" value="option2" checked />
                                                                  No
                                                                  </label>  
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <!--end profile-settings-->
                                                         <div class="profile-settings row-fluid">
                                                            <div class="span9">
                                                               <p>Enim eiusmod high life accusamus terry richardson ad squid wolf moon</p>
                                                            </div>
                                                            <div class="control-group span3">
                                                               <div class="controls">
                                                                  <label class="checkbox">
                                                                  <input type="checkbox" value="" /> All
                                                                  </label>
                                                                  <label class="checkbox">
                                                                  <input type="checkbox" value="" /> Friends
                                                                  </label>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <!--end profile-settings-->
                                                         <div class="profile-settings row-fluid">
                                                            <div class="span9">
                                                               <p>Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson</p>
                                                            </div>
                                                            <div class="control-group span3">
                                                               <div class="controls">
                                                                  <label class="checkbox">
                                                                  <input type="checkbox" value="" /> Yes
                                                                  </label>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <!--end profile-settings-->
                                                         <div class="profile-settings row-fluid">
                                                            <div class="span9">
                                                               <p>Cliche reprehenderit enim eiusmod high life accusamus terry</p>
                                                            </div>
                                                            <div class="control-group span3">
                                                               <div class="controls">
                                                                  <label class="checkbox">
                                                                  <input type="checkbox" value="" /> Yes
                                                                  </label>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <!--end profile-settings-->
                                                         <div class="profile-settings row-fluid">
                                                            <div class="span9">
                                                               <p>Oiusmod high life accusamus terry richardson ad squid wolf fwopo</p>
                                                            </div>
                                                            <div class="control-group span3">
                                                               <div class="controls">
                                                                  <label class="checkbox">
                                                                  <input type="checkbox" value="" /> Yes
                                                                  </label>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <!--end profile-settings-->
                                                         <div class="space5"></div>
                                                         <div class="submit-btn">
                                                            <a href="#" class="btn green">Save Changes</a>
                                                            <a href="#" class="btn">Cancel</a>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!--end span9-->                                   
                                       </div>
                                    </div>
                                 </div>
                                 <!--end tab-pane-->
                                 <div class="tab-pane" id="tab_1_4">
                                    <div class="row-fluid add-portfolio">
                                       <div class="pull-left">
                                          <span>502 Items sold this week</span>
                                       </div>
                                       <div class="pull-right">
                                          <a href="#" class="btn icn-only green">Add a new Project <i class="m-icon-swapright m-icon-white"></i></a>                          
                                       </div>
                                    </div>
                                    <!--end add-portfolio-->
                                    <div class="row-fluid portfolio-block">
                                       <div class="span5 portfolio-text">
                                          <img src="assets/img/profile/portfolio/logo_metronic.jpg" alt="" />
                                          <div class="portfolio-text-info">
                                             <h4>Metronic - Responsive Template</h4>
                                             <p>Lorem ipsum dolor sit consectetuer adipiscing elit.</p>
                                          </div>
                                       </div>
                                       <div class="span5" style="overflow:hidden;">
                                          <div class="portfolio-info">
                                             Today Sold
                                             <span>187</span>
                                          </div>
                                          <div class="portfolio-info">
                                             Total Sold
                                             <span>1789</span>
                                          </div>
                                          <div class="portfolio-info">
                                             Earns
                                             <span>$37.240</span>
                                          </div>
                                       </div>
                                       <div class="span2 portfolio-btn">
                                          <a href="#" class="btn bigicn-only"><span>Manage</span></a>                      
                                       </div>
                                    </div>
                                    <!--end row-fluid-->
                                    <div class="row-fluid portfolio-block">
                                       <div class="span5 portfolio-text">
                                          <img src="assets/img/profile/portfolio/logo_azteca.jpg" alt="" />
                                          <div class="portfolio-text-info">
                                             <h4>Metronic - Responsive Template</h4>
                                             <p>Lorem ipsum dolor sit consectetuer adipiscing elit.</p>
                                          </div>
                                       </div>
                                       <div class="span5">
                                          <div class="portfolio-info">
                                             Today Sold
                                             <span>24</span>
                                          </div>
                                          <div class="portfolio-info">
                                             Total Sold
                                             <span>660</span>
                                          </div>
                                          <div class="portfolio-info">
                                             Earns
                                             <span>$7.060</span>
                                          </div>
                                       </div>
                                       <div class="span2 portfolio-btn">
                                          <a href="#" class="btn bigicn-only"><span>Manage</span></a>                      
                                       </div>
                                    </div>
                                    <!--end row-fluid-->
                                    <div class="row-fluid portfolio-block">
                                       <div class="span5 portfolio-text">
                                          <img src="assets/img/profile/portfolio/logo_conquer.jpg" alt="" />
                                          <div class="portfolio-text-info">
                                             <h4>Metronic - Responsive Template</h4>
                                             <p>Lorem ipsum dolor sit consectetuer adipiscing elit.</p>
                                          </div>
                                       </div>
                                       <div class="span5" style="overflow:hidden;">
                                          <div class="portfolio-info">
                                             Today Sold
                                             <span>24</span>
                                          </div>
                                          <div class="portfolio-info">
                                             Total Sold
                                             <span>975</span>
                                          </div>
                                          <div class="portfolio-info">
                                             Earns
                                             <span>$21.700</span>
                                          </div>
                                       </div>
                                       <div class="span2 portfolio-btn">
                                          <a href="#" class="btn bigicn-only"><span>Manage</span></a>                      
                                       </div>
                                    </div>
                                    <!--end row-fluid-->
                                 </div>
                                 <!--end tab-pane-->
                                 <div class="tab-pane row-fluid" id="tab_1_6">
                                    <div class="row-fluid">
                                       <div class="span12">
                                          <div class="span3">
                                             <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li class="active">
                                                   <a data-toggle="tab" href="#tab_1">
                                                   <i class="icon-briefcase"></i> 
                                                   General Questions
                                                   </a> 
                                                   <span class="after"></span>                                    
                                                </li>
                                                <li><a data-toggle="tab" href="#tab_2"><i class="icon-group"></i> Membership</a></li>
                                                <li><a data-toggle="tab" href="#tab_3"><i class="icon-leaf"></i> Terms Of Service</a></li>
                                                <li><a data-toggle="tab" href="#tab_1"><i class="icon-info-sign"></i> License Terms</a></li>
                                                <li><a data-toggle="tab" href="#tab_2"><i class="icon-tint"></i> Payment Rules</a></li>
                                                <li><a data-toggle="tab" href="#tab_3"><i class="icon-plus"></i> Other Questions</a></li>
                                             </ul>
                                          </div>
                                          <div class="span9">
                                             <div class="tab-content">
                                                <div id="tab_1" class="tab-pane active">
                                                   <div style="height: auto;" id="accordion1" class="accordion collapse">
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_1" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse in" id="collapse_1">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_2" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Pariatur cliche reprehenderit enim eiusmod highr brunch ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_2">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_3" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Food truck quinoa nesciunt laborum eiusmod nim eiusmod high life accusamus  ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_3">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_4" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            High life accusamus terry richardson ad ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_4">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_5" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_5">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_6" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Wolf moon officia aute non cupidatat skateboard dolor brunch ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_6">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div id="tab_2" class="tab-pane">
                                                   <div style="height: auto;" id="accordion2" class="accordion collapse">
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_2_1" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Cliche reprehenderit, enim eiusmod high life accusamus enim eiusmod ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse in" id="collapse_2_1">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_2_2" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Pariatur cliche reprehenderit enim eiusmod high life non cupidatat skateboard dolor brunch ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_2_2">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_2_3" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Food truck quinoa nesciunt laborum eiusmod ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_2_3">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_2_4" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            High life accusamus terry richardson ad squid enim eiusmod high ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_2_4">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_2_5" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_2_5">
                                                            <div class="accordion-inner">
                                                               <p>
                                                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                               </p>
                                                               <p> 
                                                                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_2_6" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Wolf moon officia aute non cupidatat skateboard dolor brunch ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_2_6">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_2_7" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_2_7">
                                                            <div class="accordion-inner">
                                                               <p>
                                                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                               </p>
                                                               <p> 
                                                                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div id="tab_3" class="tab-pane">
                                                   <div style="height: auto;" id="accordion3" class="accordion collapse">
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_3_1" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Cliche reprehenderit, enim eiusmod ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse in" id="collapse_3_1">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_3_2" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Pariatur skateboard dolor brunch ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_3_2">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_3_3" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Food truck quinoa nesciunt laborum eiusmod ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_3_3">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_3_4" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            High life accusamus terry richardson ad squid enim eiusmod high ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_3_4">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_3_5" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Reprehenderit enim eiusmod high  eiusmod ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_3_5">
                                                            <div class="accordion-inner">
                                                               <p>
                                                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                               </p>
                                                               <p> 
                                                                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_3_6" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_3_6">
                                                            <div class="accordion-inner">
                                                               Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_3_7" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Reprehenderit enim eiusmod high life accusamus aborum eiusmod ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_3_7">
                                                            <div class="accordion-inner">
                                                               <p>
                                                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                               </p>
                                                               <p> 
                                                                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="accordion-group">
                                                         <div class="accordion-heading">
                                                            <a href="#collapse_3_8" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed">
                                                            Reprehenderit enim eiusmod high life accusamus terry quinoa nesciunt laborum eiusmod ?
                                                            </a>
                                                         </div>
                                                         <div class="accordion-body collapse" id="collapse_3_8">
                                                            <div class="accordion-inner">
                                                               <p>
                                                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                               </p>
                                                               <p> 
                                                                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmodBrunch 3 wolf moon tempor
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!--end span9-->                                   
                                       </div>
                                    </div>
                                 </div>
                                 <!--end tab-pane-->
                              </div>
                           </div>
                           <!--END TABS-->
                        </div>
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
      2013 &copy; Conquer. Admin Dashboard Template.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-arrow-up"></i></span>
      </div>
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

<?php
$cn5 = new Conexion();
$cn5->Conectar();
$return_arrss = array();
$res = $cn->Consulta("SELECT p.P_NOMBRE, s.S_CANTIDAD FROM PRODUCTO p, STOCK s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA");

while ($rowss = $cn->getRespuesta($res)){
    $array['title'] = $rowss['P_NOMBRE'];
    $array['text'] = $rowss['S_CANTIDAD'];
   
    array_push($return_arrss, $array);
}

$cn->Desconectar();
json_encode($return_arrss);
?>


<script>
      jQuery(document).ready(function() {       
		
		 
         App.init();
         FormWizard.init();
		 		

      });
	  
   </script>
</body>
<!-- END BODY -->

<!-- Mirrored from www.keenthemes.com/preview/conquer/sample_profile.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 14 Oct 2013 16:47:02 GMT -->
</html>