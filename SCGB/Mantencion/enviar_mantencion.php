<? session_start();
include ("../include/conectar.php");
$CODIGO= $_SESSION["PERMISO"];	
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
   <link rel="stylesheet" href="../assets/plugins/fancybox/source/jquery.fancybox.css"/>
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
      <li class="has-sub star active "> <a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Bodega</span> <span class="arrow "></span></a>
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
            <li><a href="Mantencion.php">Mantención</a><span class="icon-angle-right"></span></li>
            <li><a href="enviar_mantencion.php">Enviar a mantención</a></li>
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
                        <li class="span3"> <a href="#tab1" data-toggle="tab" class="step active"> <span class="number">1</span> <span class="desc"><i class="icon-ok"></i>Selección de Productos</span> </a> </li>
                        <li class="span3"> <a href="#tab2" data-toggle="tab" class="step"> <span class="number">2</span> <span class="desc"><i class="icon-ok"></i> Motivos de Mantención</span> </a> </li>
                        <li class="span3"> <a href="#tab3" data-toggle="tab" class="step"> <span class="number">3</span> <span class="desc"><i class="icon-ok"></i> Confirmación de Mantención</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                  <div id="bar" class="progress progress-success progress-striped">
                    <div class="bar"></div>
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                      <h3>Selección de Productos</h3>
                      <input type="hidden" name="USUARIO"  id="USUARIO" value=" <?php echo $_SESSION["USUARIO"];?> " />
                      <!-- La TAB-->
                      <div id="tab" class="table table-striped table-hover"></div>
                      <!-- fin de la TAB--> 
                    </div>
                    <div class="tab-pane" id="tab2">
                      <h4>Motivos de Mantención</h4>
                          <table id="sample_editable_1" class="table table-striped table-bordered table-hover" >
                       <thead>
                           <tr >
                             <th>Codigo Producto</th>
                             <th>Codigo Unitario</th>
                             <th>Nombre</th>
                             <th>Marca</th>
                             <th>Modelo</th>
                             <th>Observación</th>
                             <th>Descripción</th>
                             <th>Seleccionar</th>
                             <th>Seleccionar</th>
                             
                         </tr>
                      </thead>
                    <tbody>  
                  </tbody>
                 </table>
                  <!-- ----------------------------------------------------------------------------------------------   -->    
                    <a id='btnFancybox'style="display: none;" href='#editarFormulario'>Cargar Fancy</a> 
                        
                 <div style="display: none;" id='editarFormulario'>
                  
                           <h3>Datos del Envio a Mantención</h3>
                         
                          <div class="control-group">
                           <label class="control-label">Fecha de Envio <span class="required"></span></label>
                              <div class="controls">
                            <input  type="text" class="span6 " name="FECHAENVIO" id="FECHAENVIO" />
                              </div>
                           </div>
                           
                           <div class="control-group">
                              <label class="control-label">Persona o Empresa Responsable<span class="required"></span></label>
                              <div class="controls">
                               <input  type="text" class="span6 " name="RESPONSABLE" id="RESPONSABLE" />
                              </div>
                           </div>
                           
                        <div class="control-group">
                              <label class="control-label">Motivo<span class="required"></span></label>
                              <div class="controls">
                                <textarea name="MOTIVO" class="span6  m-wrap tooltips" id="MOTIVO" ></textarea>
                              </div>
                           </div>
    
                          <div class="control-group">
                             <div class="controls chzn-controls"></div>
                          </div>
                           <div class="form-actions">
                             <input type="button" name="enviar" value="Guardar" class="btn btn-success" onClick="guardar_form()" ></button>
                             <button type="button" name="CANCELAR" class="btn" onClick="cancelar()">Cancelar</button>
                           </div>
                        
           </div>
        <!-- ----------------------------------------------------------------------------------------------  ---------------------------------------- -->
                    </div>
                    <!-- div tab panel 2-->
                    <div class="tab-pane" id="tab3">
                      <h4>Confirmación de Mantención</h4>   
                       <div id="tbDetalleMantencion" class="table table-striped table-hover"></div>
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
<script src="../js_mantenedores/wizardMantencion.js"></script>  
<script type="text/javascript" src="../assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="../js_mantenedores/alertify.js"></script>
<script src="../notificaciones/toastr.js" type="text/javascript"></script>
<script type="text/javascript" src="../js_mantenedores/jquery.fancybox.js"></script>
<script src="../js_mantenedores/edit_mantencion.js"></script>

<script>
      jQuery(document).ready(function() {      
         App.init();
         FormWizard.init();
		 TableEditable.init();
		 $("#btnFancybox").fancybox();	
		 $("#tab").load("tab.php");
		 $("#tbDetalleMantencion").load("tbDetalleMantencion.php");
      });
	  
</script>
<script>
   codigoProducto=new Array();cantidad=new Array();codigo=new Array();identificador=new Array(); check_array=new Array();array_posicion1=new Array();array_posicion2=new Array(); array_fechaenvio= new Array();array_motivo=new Array();array_producto=new Array();array_unitario=new Array();array_responsable=new Array();array_usuario=new Array();array_detalle=new Array();codigoStock=new Array();
var cont=0; var bandera=0; var cont2=0; var cont3=0;var cuenta=0; var CODIGOPRODUCTO=""; var CODIGOUNITARIO="";
	
	function mostrar() 
     { 
	 nombre=new Array();marca=new Array();modelo=new Array();descripcion=new Array();observacion=new Array(); var z=0; var detalle="";
	 
	 if(codigoProducto.length!=0){
		 codigoProducto.length=0; 
		 cantidad.length=0;
		 codigo.length=0;
		 identificador.length=0;
		 check_array.length=0;
		 array_detalle.length=0;
		 cuenta=0;
		 detalle="";
	   }
	   
       oTable = $('#tablaHerramienta').dataTable(); //pasamos los datos de la tabla en ASCII
	   var sData = oTable.$('input').serialize();
	   contar_check(sData);
	   
	   oTable = $('#tablaVehiculo').dataTable();
	   var sData = oTable.$('input').serialize();
	   contar_check(sData);
	   
	   if(cuenta!=0){
	   for(i=0;i<check_array.length;i++){ //pasamos de ASCII a Texto añadir aqui cualquier simbologia
		    var cadena = check_array[i];
			if(cadena.indexOf('+') != -1){
				cadena = cadena.replace(/[+]/gi," ");
				cadena = cadena.replace(/%3A/gi,":");
				cadena = cadena.replace(/%2F/gi,"/");
				cadena = cadena.replace(/%C3%B3/gi,"ó");
				cadena = cadena.replace(/%C3%B1/gi,"ñ");
				cadena = cadena.replace(/%2C/gi,",");
				}
			var elem = cadena.split('**%26**'); //se divid la cortando segun corresponda
			codigo.push(elem[0]);
			codigoProducto.push(elem[1]);
			nombre.push(elem[2]);
			marca.push(elem[3]);
			modelo.push(elem[4]);
			observacion.push(elem[5]);
			descripcion.push(elem[6]);
			identificador.push(elem[7]);
		   }
		}
		
		for(i=0;i<codigo.length;i++){
			 detalle="Nombre: "+nombre[i];
			 detalle=detalle+" Marca: "+marca[i];
			 detalle=detalle+" Modelo: "+modelo[i];
			 detalle=detalle+" "+descripcion[i];
			 array_detalle[i]=detalle; 
			}
			
		for(i=0;i<codigo.length;i++){
			 $('#sample_editable_1').dataTable().fnAddData( [    //pasar los datos a la tabla por datatable
              codigo[i],codigoProducto[i],nombre[i],marca[i],modelo[i],observacion[i],descripcion[i],'<a class="edit" href="javascript:;">Datos Mantención</a>','<a><img src="../Imagenes/1407377313_cancel.png" style="vertica-align: middle;" /></a>' ]);
			}
		
					
     }// fin de la funcion mostrar
	 

   function contar_check(sData){  //recupara lo obtenido de la tabla medianta sData
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
		          check_array[cuenta]=elem2[1];
				  cuenta=cuenta +1;
		  }
		  
		}
		
	}//fin de la funcion contar_check
	
function guardar_form(){
		if(bandera==0){
		                 FECHA= $('#FECHAENVIO').val();
	                     MOTIVO= $('#MOTIVO').val();
						 RESPONSABLE=$('#RESPONSABLE').val();
	                     array_producto.push(CODIGOPRODUCTO);
		                 array_unitario.push(CODIGOUNITARIO);
		                 array_motivo.push(MOTIVO);
		                 array_fechaenvio.push(FECHA);
						 array_responsable.push(RESPONSABLE);
						 cont2=array_posicion1.length-1;
		                 editar(array_posicion1[cont2], array_posicion2[cont2]);
		                 $('#FECHAENVIO').val("");
		                 $('#MOTIVO').val("");
						 $('#RESPONSABLE').val("");
		                 bandera=1;
		              }
		         else{
		                FECHA= $('#FECHAENVIO').val();
	                    MOTIVO= $('#MOTIVO').val();
						RESPONSABLE=$('#RESPONSABLE').val();
		                array_motivo[cont]=MOTIVO;
		                array_fechaenvio[cont]=FECHA;
						array_responsable[cont]=RESPONSABLE;
		                editar(array_posicion1[cont], array_posicion2[cont]);
		                $('#FECHAENVIO').val("");
		                $('#MOTIVO').val("");
						$('#RESPONSABLE').val("");
			         }
		
		$.fancybox.close();
		
		}// fin de la función guardar_form
	
	function recuperaDatos(x,y,oTable,nRow){
		    CODIGOPRODUCTO=String(x);
	        CODIGOUNITARIO=String(y);
	        array_posicion1.push(oTable);
	        array_posicion2.push(nRow);
		    bandera=0;
		} // fin de la función recuperaDatos
		
	 function editar(oTable, nRow) {
           var aData = oTable.fnGetData(nRow);
           var jqTds = $('>td', nRow);
				
		    jqTds[7].innerHTML = '<a class="edit" href="">Editar</a>';
		    jqTds[8].innerHTML = '<a class="edit" href=""><img src="../Imagenes/1407377412_camera_test.png" style="vertica-align: middle;" /></a>';
            } // fin de la función editar
			
	 function ver(oTable, nRow){
		    for(j=0; j<array_posicion1.length; j++){
				   if(array_posicion1[j]==oTable && array_posicion2[j]==nRow ){cont=j;} 
				}
			$('#FECHAENVIO').val(array_fechaenvio[cont]);
			$('#MOTIVO').val(array_motivo[cont]);
			$('#RESPONSABLE').val(array_responsable[cont]);
			bandera=1;
			$("#btnFancybox").click();
		 } // fin de la función ver
		 
	function cancelar(){
		 $.fancybox.close();
		 $('#FECHAENVIO').val("");
		 $('#MOTIVO').val("");
		 $('#RESPONSABLE').val("");
		 if(bandera==0){
		   array_posicion1.pop();
	       array_posicion2.pop();
		  }
		} // fin de la función cancelar
		
	 function eliminar(oTable, nRow){ 
		var aData = oTable.fnGetData(nRow);
        var jqTds = $('>td', nRow);
		
		alertify.confirm("Desea cancelar la operación?", function (ex) {
					if (ex==false) {
						     return;  
					       }
					 else {
						    jqTds[7].innerHTML = '<a class="edit" href="javascript:;">Datos Mantención</a>';
		                    jqTds[8].innerHTML = '<a><img src="../Imagenes/1407377313_cancel.png" style="vertica-align: middle;" /></a>';
							    buscar(oTable, nRow)
								array_motivo.splice(cont,1); 
								array_fechaenvio.splice(cont,1);
								array_producto.splice(cont,1);
								array_responsable.splice(cont,1);
		                        array_unitario.splice(cont,1);
								array_posicion1.splice(cont,1);
	                            array_posicion2.splice(cont,1);
						  } 
				  });			
	        }// fin de la función eiminar
	  
	  function buscar(oTable, nRow){
		 for(j=0; j<array_posicion1.length; j++){
				   if(array_posicion1[j]==oTable && array_posicion2[j]==nRow ){cont=j;} 
				}
		  }// fin de la función buscar
		  
	function contar(){ //cuenta para el stock
		var z=0;
		alert("pase");
		for(i=0;i<codigoStock.length+1;i++){ //asociamos por grupo
		   for(j=0;j<array_producto.length;j++){
			    if(codigo.indexOf(array_producto[j]) == -1){
					 codigoStock[z]=array_producto[j];
					 alert("pase");
				     z++;
					}
			    }
		 }//termino del for2
		 
		for(i=0;i<codigoStock.length;i++){//setiamos el array cantidad por defecto
			 cantidad[i]=0;
			}// fin del for 1
			 
			for(i=0;i<codigoStock.length;i++){
               for(j=0;j<array_producto.length;j++){
				  if(codigo[i]==array_producto[j]){
					   cont3=cantidad[i];
					   cont3=cont3+1;
					   cantidad[i]=cont3;
					  }
				 }
			   }//termino del for 2
		  }// fin de la función contar
		  
     function restablecer(){
		   CODIGOPRODUCTO=""; 
		   CODIGOUNITARIO="";
		   array_posicion1.length=0;
		   array_posicion2.length=0;
		   array_fechaenvio.length=0;
		   array_motivo.length=0;
		   array_producto.length=0;
		   array_unitario.length=0;
		   array_responsable.length=0;
		   cont=0; 
		   bandera=0; 
		   cont2=0;
		  }// fin de la función buscar
		  
     function detalle_mantencion(){ //pasamos los datos a la tabla detalle mantencion
		 for(i=0;i<codigo.length;i++){
			   for(j=0; j<array_producto.length; j++){
				     if(codigo[i]==array_producto[j] & codigoProducto[i]==array_unitario[j]){
							$('#tbDetalle').dataTable().fnAddData( [    //pasar los datos a la tabla por datatable
              codigo[i],codigoProducto[i],array_detalle[i],array_fechaenvio[j],array_motivo[j],array_responsable[j]]);
			
				    }
				 }
			 }
		   
		 }// fin de la funcion detalle_mantención
		 
   function guardar(){
			
		USUARIO=$('#USUARIO').val();
		for(i=0;i<array_producto.length;i++){
		CODIGOPRODUCTO=array_producto[i];
		CODIGOUNITARIO=array_unitario[i];
		FECHA=array_fechaenvio[i];
		DESCRIPCION=array_motivo[i];
		RESPONSABLE=array_responsable[i];
		
		$.ajax({
        type: 'POST',
        url: 'guardar_mantencion.php',
        data: {CODIGOPRODUCTO:CODIGOPRODUCTO, CODIGOUNITARIO:CODIGOUNITARIO, FECHA:FECHA, DESCRIPCION:DESCRIPCION, RESPONSABLE:RESPONSABLE, USUARIO:USUARIO}
             });// guarda el mantencion	
		   }// FIN DEL FOR
			//actualizarStock();
	     }//fin de la funcion guardar
		   
	function actualizarStock(){ //actualizar el stock de bodega
	    contar();
		for(i=0;i<codigoStock.length;i++){
			 CODIGOP=codigoStock[i];
			 DIFERENCIA=cantidad[i]; 
			 alert(CODIGOP);
			 $.ajax({
                     type: 'POST',
                     url: '../Stock/eliminar_stock.php',
					 data: { CODIGO:CODIGOP,DIFERENCIA:DIFERENCIA}
                 }); ////actualiza stock
		   }//termino for 
		
          alertify.alert("Prestamo Guardado exitosamente", function () {
           		location.href = 'mantencion.php';
				});
		 }//fin de la funcion guardarDetalle
	
	
	
	
</script>   
</body>
</html>