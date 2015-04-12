<? session_start();
include ("../include/conectar.php");	
$CODIGO= $_SESSION["PERMISO"];
?>
<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT RUT,PD_NOMBRE FROM PROVEEDOR WHERE PD_ESTADO=1");
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
      <li class="has-sub  star active"> <a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Bodega</span> <span class="arrow "></span></a>
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
          <h3 class="page-title"> Ingreso de Productos</h3>
          <ul class="breadcrumb">
            <li> <i class="icon-home"></i> <a href="#">Inicio</a> <span class="icon-angle-right"></span> </li>
            <li> <a href="#">Bodega</a> <span class="icon-angle-right"></span> </li>
            <li><a href="ingreso_producto.php">Ingreso de Producto</a></li>
          </ul>
        </div>
      </div>
      <!-- END PAGE HEADER--> 
      <!-- BEGIN PAGE CONTENT-->
      <div class="row-fluid">
        <div class="span12">
          <div class="widget box blue" id="form_wizard_1">
            <div class="widget-title">
              <h4> <i class="icon-reorder"></i> Ingreso Producto - <span class="step-title">Paso 1 de 4</span> </h4>
            </div>
            <div class="widget-body form">
              <form action="#" class="form-horizontal" id="form1" name="form1" onsubmit="return formulario(this)">
                <div class="form-wizard">
                  <div class="navbar steps">
                    <div class="navbar-inner">
                      <ul class="row-fluid">
                        <li class="span3"> <a href="#tab1" data-toggle="tab" class="step active"> <span class="number">1</span> <span class="desc"><i class="icon-ok"></i>Ingreso Proveedor</span> </a> </li>
                        <li class="span3"> <a href="#tab2" data-toggle="tab" class="step"> <span class="number">2</span> <span class="desc"><i class="icon-ok"></i> Selección de Producto</span> </a> </li>
                        <li class="span3"> <a href="#tab3" data-toggle="tab" class="step"> <span class="number">3</span> <span class="desc"><i class="icon-ok"></i> Detalle de Ingreso Producto</span> </a> </li>
                        <li class="span3"> <a href="#tab4" data-toggle="tab" class="step"> <span class="number">4</span> <span class="desc"><i class="icon-ok"></i> Confirmación</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                  <div id="bar" class="progress progress-success progress-striped">
                    <div class="bar"></div>
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                      <h3>Ingreso de Producto</h3>
                      <input type="hidden" name="USUARIO" id="USUARIO" value="<?php echo $_SESSION["USUARIO"];?>"/>
                      <input type="hidden" name="TOTAL" id="TOTAL" value=""/>
                      <div class="control-group">
                        <label class="control-label">Provedor<span class="required">*</span></label>
                        <div class="controls">
                          <select   name="PROVEEDOR" id="PROVEEDOR" class="span6  m-wrap tooltips" >
                            <?php while($row = $cn->getRespuesta($res)){ ?>
                            <option value="<? echo $row['RUT']; ?>" ><?php echo $id=$row['PD_NOMBRE']; ?></option>
                            <? } ?>
                          </select>
                          <a href="../Proveedor/add_proveedor.php"><img src="../Imagenes/anadir-mas-verde-icono-5682-32.png" style="vertica-align: middle;" /> </a> </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Numero de Factura</label>
                        <div class="controls">
                          <input name="NUMEROFACTURA" type="number" class="span6" id="NUMEROFACTURA" min="0" required/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Fecha</label>
                        <div class="controls">
                          <input type="date" class="span6" id="FECHAFACTURA" name="FECHAFACTURA" required/>
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
                      <h4>Detalle Producto</h4>
                      <!-- -->
                      <div id="tbIngresoProducto" class="table table-striped table-hover"></div>
                      <!-- --> 
                    </div>
                    <!-- div tab panel 3-->
                    <div class="tab-pane" id="tab4">
                      <h4>Confirmación de Ingreso de Producto</h4>
                      <div class="span6">
                        <ul class="unstyled amounts">
                          <li><strong>Proveedor: </strong><b id='tx_proveedor'></b></span> </li>
                          <li><strong>N° Factura: </strong><b id='tx_numeroFactura'></b> </li>
                          <li><strong>Fecha: </strong><b id='tx_fecha'></b></li>
                        </ul>
                        <br />
                      </div>
                        <div id="tbDetalleProducto" class="table table-striped table-hover"></div>
                      <div class="span6">
                        <ul class="unstyled amounts">
                          <li><strong>Total: </strong><b id='tx_totalFactura'></b></span> </li>
                          <li><strong>Cantidad de Productos: </strong><b id='tx_cantidad'></b> </li>
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
      <!-- END PAGE CONTENT--> 
    </div>
    <!-- END PAGE CONTAINER--> 
  </div>
  <!-- END PAGE --> 
</div>
<!-- END CONTAINER --> 
<!-- BEGIN FOOTER -->
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
<script src="../assets/scripts/form-wizard.js"></script>  
<script type="text/javascript" src="../assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="../js_mantenedores/alertify.js"></script>
 
<script>

 jQuery(document).ready(function() {       
		 $("#tab").load("tab.php");
		 $("#tbIngresoProducto").load("tbIngresoProducto.php");
		 $("#tbDetalleProducto").load("tbDetalleProducto.php");
         App.init();
         FormWizard.init();
		 });
   </script> 
<script language="javascript">
var contare=0;
var cuenta=0;
var j=0; var x=0; var z=0; var cont=0; var cont2=0;  var total=0;
var ayudaCuenta=0;
function marcar() 
    { 
		
	   var precio='<input type="text" name="PRECIOTB" id="PRECIOTB" maxlength="8" onkeyup="Moneda(this);" onchange="Moneda(this);" class="span11"/>';//se crea el imput
	   var cantidad=' <input type="text" name="CANTIDADTB" id="CANTIDADTB" maxlength="3" onkeyup="Moneda(this);" class="span5" />';
	   //var total=' <input type="text" name="TOTALTB" id="TOTALTB" readonly="readonly" class="span11" value="0" />';
       checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
       //_________________________
	   for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
       {
       if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
           {
             if(checkboxes[i].checked == true){  //sabes si el estado del check
		        var cadena = checkboxes[i].value; //pasamos los datos del check
				var elem = cadena.split('***&&***');  //los dividimos y guardamos segun corresponda
                 codigo = elem[0];
                 nombre = elem[1];
                 marca =  elem[2];
		         modelo = elem[3];
				 observacion = elem[4];
				 descripcion = elem[5];
				 contare= contare+1;
				 
					$('#tbProducto').dataTable().fnAddData( [    //pasar los datos a la tabla por datatable
                     codigo,nombre,marca,modelo,observacion,descripcion,cantidad,precio ]);
	
			  } 
			  
            }
        }	
		
     }// fin de la funcion marcar
	 
	function Moneda(input){
         var num = input.value.replace(/\./g,"");
         if(!isNaN(num)){
               num = num.toString().split("").reverse().join("").replace(/(?=\d*\.?)(\d{3})/g,"$1.");
               num = num.split("").reverse().join("").replace(/^[\.]/,"");
               input.value = num;
               }else{
                     input.value = input.value.replace(/[^\d\.]*/g,"");
                    }
      }//fin de la funcion de validar moneda
	  
	  
   function mostrar(){
	  // Declaracion de variables
	 cantidad=new Array();precio=new Array();codigo=new Array();
	 nombre=new Array();marca=new Array();modelo=new Array();
	 almacena=new Array();observacion=new Array();descripcion=new Array();
	 totalUnitario=new Array();var total=0;
	 
	 oTable = $('#tbProducto').dataTable(); 
	 var sData = oTable.$('input').serialize(); //Obtener los input de la tabla
	 var elem = sData.split('&'); // Dividimos los elementos
	 for(i=0;i<elem.length;i++){
		 if(i%2==0 || i==0){  // preguntamos si es par o cero
			      var cant1 = elem[i].split('CANTIDADTB=');  // sacamos los que tiene el input
				  cantidad[j]=cant1[1];
				  j++;
				  
			 }
		 else {
			     var pre1 = elem[i].split('PRECIOTB=');// sacamos los que tiene el input
				 precio[x]=pre1[1];
				 x++;
			 }
		 }
	 
	 $("#tbProducto td").each(function(index){   //funcion para recorre los textos de la tabla
                    if(cont < 6 ){               //uno de los datos lo toma como vacio
						almacena[z]=$(this).text();
						z++;
						cont++;
						}
						else if(!$(this).text()=="") {
							 cont++;
							}
							else {cont=0;}
                });
			
			j=0;
			for(i=0;i<almacena.length;i++){
				      if(cont2==0){codigo[j]=almacena[i];cont2++;}
					  else if(cont2==1){nombre[j]=almacena[i]; cont2++;}
					  else if(cont2==2){marca[j]=almacena[i]; cont2++;}
					  else if(cont2==3){modelo[j]=almacena[i]; cont2++;}
					  else if(cont2==4){observacion[j]=almacena[i]; cont2++;}
					  else if(cont2==5){descripcion[j]=almacena[i]; cont2=0;j++}
				}
				
			for(i=0;i<cantidad.length;i++){
				  ayudaCuenta=cantidad[i];
			      cuenta=parseInt(cuenta) + parseInt(ayudaCuenta);
				}
				
			ayudaCuenta=0;
			ayudaPrecio=0;
			for(i=0;i<precio.length;i++){
				  
				  ayudaCuenta=cantidad[i];
				  ayudaPrecio=precio[i].replace(/\./g,'');
			      totalUnitario[i]=parseInt(ayudaCuenta) * parseInt(ayudaPrecio);
				}
			ayudaCuenta=0;
			for(i=0;i<totalUnitario.length;i++){
				  ayudaCuenta=totalUnitario[i];
			      total=parseInt(total) + parseInt(ayudaCuenta);
				}	
				
		   document.getElementById('tx_proveedor').innerHTML =document.form1.PROVEEDOR.options[document.form1.PROVEEDOR.selectedIndex].text;
		   document.getElementById('tx_numeroFactura').innerHTML = $('#NUMEROFACTURA').val();
		   document.getElementById('tx_fecha').innerHTML = $('#FECHAFACTURA').val();
		   document.getElementById('tx_totalFactura').innerHTML =total;
		   document.getElementById('tx_cantidad').innerHTML = cuenta;
		   document.getElementById('tx_usuario').innerHTML = $('#USUARIO').val();
		   $('#TOTAL').val(total);
		   
		 	for(i=0;i<codigo.length;i++){
				    $('#tbDetalle').dataTable().fnAddData( [    //pasar los datos a la tabla por datatable
                      codigo[i],nombre[i],marca[i],modelo[i],observacion[i],descripcion[i],cantidad[i],precio[i],totalUnitario[i] ]);
				}
				
		  }// termina la funcion mostrar
	 
	 
     function guardar(){
		 var cont=0; var j=0;
		 almacena=new Array();codigoA=new Array();
		 cantidadA=new Array();precioA=new Array();
		 
		   $("#tbDetalle td").each(function(index){
			       almacena[j]=$(this).text();
				   j++;
		       });
			   
		    j=0;
			for(i=0;i<almacena.length;i++){
				      if(cont==0){codigoA[j]=almacena[i];cont++;}
					  else if(cont==6){cantidadA[j]=almacena[i];cont++}
					  else if(cont==7){precioA[j]=almacena[i];cont++}
					  else if(cont==8){precioA[j]=almacena[i];cont=0,j++}
					  else {cont++;}
				}
					
			RUT=$('#PROVEEDOR').val();
			NUMEROFACTURA=$('#NUMEROFACTURA').val();
			FECHA=$('#FECHAFACTURA').val();
			TOTALFACTURA=$('#TOTAL').val();
			USUARIO=$('#USUARIO').val();
			
			
			 for(i=0;i<codigoA.length;i++){
				CODIGO=codigoA[i];
				CANTIDAD=cantidadA[i];
				PRECIO=precio[i].replace(/\./g,'');
				
				$.ajax({
                     type: 'POST',
                     url: 'guardar_ingresoProducto.php',
                     data: { CODIGO:CODIGO, RUT:RUT, NUMEROFACTURA:NUMEROFACTURA, CANTIDAD:CANTIDAD, PRECIO:PRECIO, TOTALFACTURA:TOTALFACTURA, FECHA:FECHA, USUARIO:USUARIO}
                       });// guarda la factura
				  
				$.ajax({
                      type: 'POST',
                      url: '../Producto_Unitario/guardar_productoUnitario.php',
                      data: { CODIGO:CODIGO, CANTIDAD:CANTIDAD, NUMEROFACTURA:NUMEROFACTURA}
                         });//guarda producto unitario 
              
				$.ajax({
                    type: 'POST',
                    url: '../Stock/ingreso_stock.php',
					data: { CODIGO:CODIGO,CANTIDAD:CANTIDAD}
                       }); ////guardar stock
			    }// termino del for
			
		alertify.alert("Ingreso de Producto Guardado exitosamente", function () {
					location.href = 'ingreso_producto.php';
				});
		 }//fin de la funcion guardar
		 
</script>

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
 toastr.options.hideDuration=700;
toastr.options.timeOut=1000;
toastr.options.showDuration=700;
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

</body>
</html>