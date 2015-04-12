<? session_start();
include ("../include/conectar.php");	
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
           <li class="has-sub start ">
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
			 <li class="has-sub">
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
            <li class="has-sub  active">
               <a href="javascript:;">
               <i class="icon-bar-chart"></i> 
               <span class="title">Bodega</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
                 <li class="active"><a href="../Prestamo/prestamo.php">Prestamo</a></li>
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
              <h4> <i class="icon-reorder"></i> Prestamo - <span class="step-title">Paso 1 de 4</span> </h4>
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
                          <select   name="RUN" id="RUN"  onclick="tipo();" class="span6  m-wrap tooltips" >
                          <?php while($row = $cn->getRespuesta($res)){ ?>
                            <option value="<? echo $row['RUN']; ?>" ><? echo $row['RUN']; ?></option>
                            <? }?>   
                          </select>
                          <a href="../Trabajador/add_trabajador.php"><img src="../Imagenes/anadir-mas-verde-icono-5682-32.png" style="vertica-align: middle;" /> </a> </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Obra<span class="required">*</span></label>
                        <div class="controls">
                          <select   name="OBRA" id="OBRA" class="span6  m-wrap tooltips" >
                            <?php while($row2 = $cn2->getRespuesta($res2)){ ?>
                            <option value="<? echo $row2['CODIGOOBRA']; ?>" ><? echo $row2['O_NOMBRE']; ?></option>
                            <? }?>
                          </select>
                          <a href="../Obra/add_obra.php"><img src="../Imagenes/anadir-mas-verde-icono-5682-32.png" style="vertica-align: middle;" /> </a> </div>
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
                          <input name="FECHA" id="FECHA" type="text" class="span6" />
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
                       <div class="span6">
                        <ul class="unstyled amounts">
                          <li><strong>Codigo Prestamo: <? echo $CODIGOPRESTAMO; ?></strong></li>
                          <li><strong>RUN: </strong><b id='tx_run'></b></li>
                          <li><strong>Cargo: </strong><b id='tx_cargo'></b></li>
                          <li><strong>Nombre: </strong><b id='tx_nombre'></b></span> </li>
                          <li><strong>Apellido: </strong><b id='tx_apellido'></b> </li>
                          <li><strong>Obra: </strong><b id='tx_obra'></b></li>
                          <li><strong>Fecha: </strong><b id='tx_fecha'></b></li>
                          <li><strong>Comnetario: </strong><b id='tx_comentario'></b></li>
                        </ul>
                        <br />
                      </div>
                      
                       <div id="tbDetalleProducto" class="table table-striped table-hover"></div>
                      
                      <div class="span6">
                        <ul class="unstyled amounts">
                          <li><strong>Total Productos: </strong><b id='tx_totalProducto'></b></span> </li>
                          <li><strong>Usuario: </strong><b id='tx_usuario'></b></li>
                        </ul>
                        <br />
                      </div>
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
		 $("#tab").load("tab.php");
		 $("#tbDetalleProducto").load("tbDetalleProducto.php");
		 tipo();
         App.init();
         FormWizard.init();
		 		

      });
	  
   </script> 
<script language="javascript">
    codigoProducto=new Array();codigoUnitario=new Array();cantidad=new Array();codigo=new Array();identificador=new Array(); check_array=new Array();var cuenta=0; var nombre1="";
	
	function mostrar() 
     { 
	 comparaNombre=new Array();comparaMarca=new Array();comparaModelo=new Array();
	 comparaDescripcion=new Array();comparaObservacion=new Array();
	 nombre=new Array();marca=new Array();modelo=new Array();descripcion=new Array();observacion=new Array();
	 
	 if(codigoProducto.length!=0){
		 codigoProducto.length=0;
		 codigoUnitario.length=0;
		 //cantidad.length=0;
		 //codigo.length=0;
		 //identificador.length=0;
		 cuenta=0;
	   }
	   
       oTable = $('#tablaHerramienta').dataTable();
	   var sData = oTable.$('input').serialize();
	   contar_check(sData);
	   
	   oTable = $('#tablaInsumo').dataTable();
	   var sData = oTable.$('input').serialize();
	   contar_check(sData);
	   
	   oTable = $('#tablaRopa').dataTable();
	   var sData = oTable.$('input').serialize();
	   contar_check(sData);
	   
	   oTable = $('#tablaVehiculo').dataTable();
	   var sData = oTable.$('input').serialize();
	   contar_check(sData);
		
	checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
      for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
       {
       if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
           {
             if(checkboxes[i].checked == true){  //sabes si el estado del check
		        var cadena = checkboxes[i].value; //pasamos los datos del check
				var elem = cadena.split('**&**');  //los dividimos y guardamos segun corresponda
                 comparaCodigo[x] = elem[0];
				 codigoProducto[x] = elem[1];
				 comparaNombre[x] = elem[2];
                 comparaMarca[x] =  elem[3];
		         comparaModelo[x] = elem[4];
				 comparaObservacion[x]=elem[5];
				 comparaDescripcion[x] = elem[6];
				 identificador[x] = elem[7];
				 x++;
			}
		 }
     }//termino del for1			
			
     }// fin de la funcion mostrar
	 	
     function guardar(){
			
			CODIGOPRESTAMO=$('#CODIGOPRESTAMO').val();
			OBRA=$('#OBRA').val();
			RUN=document.form1.RUN.options[document.form1.RUN.selectedIndex].text;
			FECHA=$('#FECHA').val();
			TOTALPRODUCTO=cuenta;
			COMENTARIO=$('#COMENTARIO').val();
			USUARIO=$('#USUARIO').val();
			var count=0;var ESTADO=1;
			for(i=0;i<identificador.length;i++){
				  if(identificador[i]=="H" || identificador[i]=="V"){count=count+1;}
				}
			
			if(count==0){ESTADO=0;}
			
			$.ajax({
                     type: 'POST',
                     url: 'guardar_prestamo.php',
                     data: {CODIGOPRESTAMO:CODIGOPRESTAMO, OBRA:OBRA, RUN:RUN, FECHA:FECHA, TOTALPRODUCTO:TOTALPRODUCTO, COMENTARIO:COMENTARIO, USUARIO:USUARIO,ESTADO:ESTADO},
					 success: function(data){
					           guardarDetalle();
						    }
                  });// guarda el prestamo
	     }//fin de la funcion guardar
		   
		   
		 function guardarDetalle(){ 
	       for(i=0;i<comparaCodigo.length;i++){
		          CODIGOPRODUCTO=comparaCodigo[i];
				  CODIGOUNITARIO=codigoProducto[i];
				  IDENT=identificador[i];
				  $.ajax({
                         type: 'POST',
                         url: '../Detalle_Prestamo/guardar_detallePrestamo.php',
                         data: {CODIGOPRESTAMO:CODIGOPRESTAMO, CODIGOPRODUCTO:CODIGOPRODUCTO, CODIGOUNITARIO:CODIGOUNITARIO,IDENT:IDENT}
                        });//guarda detalle prestamo 	 
			 }// termino del for
			 
		  for(j=0;j<codigo.length;j++){
			 CODIGOP=codigo[j];
			 DIFERENCIA=cantidad[j]; 
			 $.ajax({
                     type: 'POST',
                     url: '../Stock/eliminar_stock.php',
					 data: { CODIGO:CODIGOP,DIFERENCIA:DIFERENCIA}
                 }); ////actualiza stock
		   }//termino for2
		
          alertify.alert("Prestamo Guardado exitosamente", function () {
           		location.href = 'prestamo.php';
				});
		 }//fin de la funcion guardarDetalle
		 
	  function tipo(){
		  id=document.form1.RUN.options[document.form1.RUN.selectedIndex].text;
		  $.getJSON("obtTrabajadorId.php", {id_trabajador: id}, function(data) {
		  $("#CARGO").val(data[0].CARGO);
		  $("#NOMBRE").val(data[0].NOMBRE);
		  $("#APELLIDO").val(data[0].APELLIDO);
		})  
	   }//fin de la funcion tipo
	   
	   
	 function contar_check(sData){ 
	   //alert(sData);  
        var i = 0; var counter = 0;
        while (i != -1)
        {
          var i = sData.indexOf("Check",i);
          if (i != -1)
            {
               i++;
               counter++;
            }
        }
         
		if(counter!=0){
		   var elem = sData.split('&');
		     for(j=0;j<counter;j++){
		        var elem2= elem[j].split('Check=');
				 if(elem2[1].indexOf('+') != -1){
					  var elem3= elem2[1].split('+');
					  codigoProducto.push(elem3[0]);
					  codigoUnitario.push(elem3[1]);
					  cuenta=cuenta +1;
                  }   
		    }
		    
		 }
		
	}//fin de la funcion contar_check
	
	
	function consultaProducto() {
        if(cuenta!=0){
		   
	   for(i=0;i<codigoProducto.length;i++){
		    var codigoPro = codigoProducto[i];
			var codigoUni = codigoUnitario[i];
			
			$.getJSON("consulta.php", {codigoPro:codigoPro, codigoUni:codigoUni}, function(data) {
                    nombre1=data[0].NOMBRE;
					alert(nombre1);
                })
		    //consultaProducto(codigoPro,codigoUni);
			//alert(nombre1);
	       }
		}
      }
	  
	  function ayuda(){
		   $('#tbDetalle').dataTable().fnAddData( [    //pasar los datos a la tabla por datatable
              "prueba",nombre1,"prueba","prueba","prueba","prueba","prueba" ]);
		  }
		 
</script>
 <script>
	$(function() {

		$( "#TRABAJADOR" ).autocomplete({
			source: "buscarTrabajador.php",
			minLength: 1,
			select: function( event, ui ) {
			$('#TRABAJADOR').on('keyup',function(Tecla){
			if(Tecla.keyCode==13){
				  $('#NOMBRE').val(ui.item.value);
				  $('#APELLIDO').val(ui.item.apellido);
				  $('#CARGO').val(ui.item.cargo);
				}
			
			})
			}
		});
		
		$( "#OBRA" ).autocomplete({
			source: "buscarObra.php",
			minLength: 1
		});
	});
	</script>
   
</body>
</html>