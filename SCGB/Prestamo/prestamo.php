<? session_start();
include ("../include/conectar.php");
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
   <link href="../notificaciones/toastr.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" type="text/css" href="../assets/plugins/select2/select2.css" />
    <link rel="stylesheet" href="../css_mantenedoressd/style_prestamo.css" media="screen" type="text/css" />
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
      <li class="has-sub star active"> <a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Bodega</span> <span class="arrow "></span></a>
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
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>widget Settings</h3>
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
          <h3 class="page-title"> Prestamo</h3>
          <ul class="breadcrumb">
            <li> <i class="icon-home"></i> <a href="#">Inicio</a> <span class="icon-angle-right"></span> </li>
            <li> <a href="#">Bodega</a> <span class="icon-angle-right"></span> </li>
            <li><a href="prestamo.php">Prestamo</a></li>
          </ul>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget box blue" id="form_wizard_1">
            <div class="widget-title">
              <h4> <i class="icon-reorder"></i> Prestamo - <span class="step-title">Paso 1 de 3</span> </h4>
            </div>
            <div class="widget-body form">
              <form action="#" class="form-horizontal" id="form1" name="form1">
                <div class="form-wizard">
                  <div class="navbar steps">
                    <div class="navbar-inner">
                      <ul class="row-fluid">
                        <li class="span3"> <a href="#tab1" data-toggle="tab" class="step active"> <span class="number">1</span> <span class="desc"><i class="icon-ok"></i>Ingreso de Datos del Prestamo</span> </a> </li>
                        <li class="span3"> <a href="#tab2" data-toggle="tab" class="step"> <span class="number">2</span> <span class="desc"><i class="icon-ok"></i> Selección de Producto</span> </a> </li>
                        <li class="span3"> <a href="#tab3" data-toggle="tab" class="step"> <span class="number">3</span> <span class="desc"><i class="icon-ok"></i> Confirmación de Prestamo</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                  <div id="bar" class="progress progress-success progress-striped">
                    <div class="bar"></div>
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                      <h3>Ingreso de Datos del Prestamo</h3>
                      <input type="hidden" name="USUARIO"  id="USUARIO" value=" <?php echo $_SESSION["USUARIO"];?> " />
                      <input type="hidden" name="CODIGOPRESTAMO"  id="CODIGOPRESTAMO" value=" <? echo $CODIGOPRESTAMO; ?> " />
                      <div class="control-group">
                        <label class="control-label">Trabajador<span class="required">*</span></label>
                        <div class="controls">
                          <select id="select2_run" class="span6 select2" onclick="tipo();">
                             <option value=""></option>
                             <?php while($row = $cn->getRespuesta($res)){ ?>
                              <option value="<? echo $row['RUN']; ?>" ><? echo $row['RUN']; ?></option>
                             <? }?> 
                            </select>
                          <a href="../Trabajador/add_trabajador.php"><img src="../Imagenes/anadir-mas-verde-icono-5682-32.png" style="vertica-align: middle;" /> </a> 
                      </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Obra<span class="required">*</span></label>
                        <div class="controls">
                          <select id="select2_obra" class="span6 select2">
                             <option value=""></option>
                             <?php while($row2 = $cn2->getRespuesta($res2)){ ?>
                              <option value="<? echo $row2['CODIGOOBRA']; ?>" ><? echo $row2['O_NOMBRE']; ?></option>
                             <? }?> 
                            </select>
                          <a href="../Obra/add_obra.php"><img src="../Imagenes/anadir-mas-verde-icono-5682-32.png" style="vertica-align: middle;" /> </a> 
                      </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                          <input name="NOMBRE" type="text" class="span6" id="NOMBRE" readonly />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Apellidos</label>
                        <div class="controls">
                          <input name="APELLIDO" type="text" class="span6" id="APELLIDO" readonly />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Cargo</label>
                        <div class="controls">
                          <input name="CARGO" type="text" class="span6" id="CARGO" readonly />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Fecha</label>
                        <div class="controls">
                          <input name="FECHA" id="FECHA" type="date" class="span6"  required/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Comentario</label>
                        <div class="controls">
                          <textarea name="COMENTARIO" id="COMENTARIO" class="span6" ></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                      <h4>Selección de Producto</h4>
                      <!-- La TAB-->
                      <div id="tab" class="table table-striped table-hover"></div>
                      <!-- fin de la TAB--> 
                    </div>
                    <!-- div tab panel 2-->
                    <div class="tab-pane" id="tab3">
                      <h4>Confirmación de Prestamo</h4>
                      <div>                   
                         <ul class="lista-wid cf">
	                       <li><strong>Codigo Prestamo: <? echo $CODIGOPRESTAMO; ?></strong></li>
	                       <li><strong>RUN: </strong><b id='tx_run'></b></li>
	                       <li><strong>Cargo: </strong><b id='tx_cargo'></b></li>
                           <li><strong>Nombre: </strong><b id='tx_nombre'></b></span> </li>
                           <li><strong>Apellido: </strong><b id='tx_apellido'></b> </li>
                           <li><strong>Obra: </strong><b id='tx_obra'></b></li>
                           <li><strong>Fecha: </strong><b id='tx_fecha'></b></li>
                           <li><strong>Usuario: </strong><b id='tx_usuario'></b></li>
                         </ul>
                      </div>
                      <div>
                          <ul class="lista2-wid cf">
                          <strong>Comnetario: </strong><b id='tx_comentario'></b>
                          </ul>
                      </div>    
                       <div id="tbDetalleProducto" class="table table-striped table-hover"></div>
                    </div>
                  </div>
                  <div class="form-actions clearfix"> <a href="javascript:;" class="btn button-previous"> <i class="icon-angle-left"></i> Volver </a> <a href="javascript:;" class="btn btn-primary blue button-next"> Continuar <i class="icon-angle-right"></i> </a> <a href="javascript:;" class="btn btn-success button-submit"> Guardar <i class="icon-ok"></i> </a> </div>
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
<script type="text/javascript" src="../assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="jsPrestamo.js"></script>
<script type="text/javascript" src="prestamo_funciones.js"></script>


<?php
$cn5 = new Conexion();
$cn5->Conectar();
$return_arrss = array();
$res = $cn5->Consulta("SELECT p.P_NOMBRE, s.S_CANTIDAD FROM PRODUCTO p, STOCK s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA");

while ($rowss = $cn5->getRespuesta($res)){
    $array['title'] = $rowss['P_NOMBRE'];
    $array['text'] = $rowss['S_CANTIDAD'];
   
    array_push($return_arrss, $array);
}

$cn5->Desconectar();
json_encode($return_arrss);
?>

<script>
 jQuery(document).ready(function() {	
 toastr.options.closeButton = true;
 toastr.options.newestOnTop = false;
 toastr.options.hideDuration=1100;
toastr.options.timeOut=1500;
toastr.options.showDuration=1000;
toastr.options.showMethod = 'slideDown'; 
toastr.options.hideMethod = 'slideUp'; 

var dataSource=<?php  echo json_encode($return_arrss);?>;
		for(var i=0;i<dataSource.length;i++)
    {
	var text=innerHTML=dataSource[i].text;
	var title=innerHTML=dataSource[i].title;

  
        (+dataSource[i]);
	
toastr.warning('Producto ' + title.toString() + ' bajo stock Quedan:' + text.toString() );
	}

});
</script>
<script>
      jQuery(document).ready(function() {      
         App.init();
         FormWizard.init();	
         Componente.init();
      });
	  
</script>    
</body>
</html>