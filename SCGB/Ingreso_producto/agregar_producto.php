<? session_start();
include ("../include/conectar.php");	
?>
<?php
include '../Conexion.php';
$cn = new Conexion();
$id= $_GET['id'];
$cn->Conectar();
$res = $cn->Consulta("SELECT p.PD_NOMBRE,ip.NUMEROFACTURA,ip.IP_TOTALFACTURA,ip.IP_FECHA,ip.IP_USUARIO FROM INGRESO_PRODUCTO ip, PROVEEDOR p WHERE ip.RUT=p.RUT AND NUMEROFACTURA=$id");
while($row = $cn->getRespuesta($res)){
	$RUT=$row['PD_NOMBRE'];
	$NUMEROFACTURA=$row['NUMEROFACTURA'];
	$TOTAL=$row['IP_TOTALFACTURA'];
	$FECHA=$row['IP_FECHA'];
	$USUARIO=$row['IP_USUARIO'];
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
         <div class="container-fluid">
            <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="arrow"></span>
            </a>                     
            <div class="top-nav">           
               <ul class="nav pull-right" id="top_menu">
                  <li class="divider-vertical hidden-phone hidden-tablet"></li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="icon-wrench"></i>
                     <b class="caret"></b>
                     </a>
                     <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-cogs"></i> System Settings</a></li>
                        <li><a href="#"><i class="icon-pushpin"></i> Shortcuts</a></li>
                        <li><a href="#"><i class="icon-trash"></i> Trash</a></li>
                     </ul>
                  </li>
                  <li class="divider-vertical hidden-phone hidden-tablet"></li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="icon-user"></i>
                     <b class="caret"></b>
                     </a>
                     <ul class="dropdown-menu">
                     
                        <li><a href="#"><i class="icon-ok"></i> Calendario</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-user">  </i>
                         <?php
                          if(!isset($_SESSION["USUARIO"]))
                            header ("Location:../index.php");
                          else   
                           echo "<strong>" .$_SESSION["USUARIO"]." </strong>";
                         ?>  
                        </i>
                        <li><a href="../logout.php"><i class="icon-key"></i> cerrar secion</li></a>
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
              <li class="has-sub ">
               <a href="javascript:;">
               <i class="icon-home"></i>
			   <span class="title ">Inicio</span>
               <span class="arrow "></span></a>
            </li>
            <li class="has-sub   ">
               <a href="javascript:;">
               <i class="icon-user "></i> 
               <span class="title ">Proveedor</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
                  <li  ><a href="../Proveedor/add_proveedor.php">Agregar Proveedor</a></li>
                  <li ><a href="../Proveedor/mod_proveedor.php">Buscar</a></li>
				  <li ><a href="#">Listado de proveedor</a></li>
                  <li ><a href="#">Grafico</a></li>
                 
               </ul>
            </li>
           <li class="has-sub">
               <a href="javascript:;">
               <i class="icon-book"></i> 
               <span class="title">Producto</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub">
                  <li ><a href="../Producto/Productos.php">Productos</a></li>
                  <li ><a href="#">Busqueda</a></li>
                  <li ><a href="#">Informes</a></li>
                  
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
				  <li ><a href="#">Termino Contrato</a></li>
				  <li ><a href="#">Grafico</a></li>
				  <li ><a href="#">Informe</a></li>
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
				 <li ><a href="#">Grafico</a></li>
                 <li ><a href="#">Informe</a></li>
               </ul>
            </li>
            <li class="has-sub star active">
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
                 <li ><a href="ingreso_producto.php">Ingreso de Producto</a></li>
				 <li class="active"><a href="../Modificar_producto/mod_ingresoProducto.php">Modificar ingreso Produccto</a></li>
				 <li ><a href="#">Grafico</a></li>
                 <li ><a href="#">Informe</a></li>
               </ul>
            </li>
            <li class="has-sub  ">
               <a href="javascript:;">
               <i class="icon-search"></i> 
               <span class="title">Busquedas y Graficos</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
			    <li ><a href="#">Busquedas</a></li>
				 <li ><a href="#">Grafico</a></li>
                 <li ><a href="#">Informe</a></li>
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
          <h3 class="page-title"> Agregar Productos</h3>
          <ul class="breadcrumb">
            <li> <i class="icon-home"></i> <a href="#">Inicio</a> <span class="icon-angle-right"></span> </li>
            <li> <a href="#">Bodega</a> <span class="icon-angle-right"></span> </li>
            <li> <a href="#">Bodega</a> <span class="icon-angle-right"></span> </li>
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
              <h4> <i class="icon-reorder"></i> Ingreso Producto - <span class="step-title">Paso 1 de 3</span> </h4>
            </div>
            <div class="widget-body form">
              <form action="#" class="form-horizontal" id="form1" name="form1">
                <div class="form-wizard">
                  <div class="navbar steps">
                    <div class="navbar-inner">
                      <ul class="row-fluid">
                        <li class="span3"> <a href="#tab1" data-toggle="tab" class="step active"> <span class="number">1</span> <span class="desc"><i class="icon-ok"></i>Selección de Producto</span> </a> </li>
                        <li class="span3"> <a href="#tab2" data-toggle="tab" class="step"> <span class="number">2</span> <span class="desc"><i class="icon-ok"></i> Detalle de Ingreso Producto</span> </a> </li>
                        <li class="span3"> <a href="#tab3" data-toggle="tab" class="step"> <span class="number">3</span> <span class="desc"><i class="icon-ok"></i> Confirmación</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                  <div id="bar" class="progress progress-success progress-striped">
                    <div class="bar"></div>
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane" id="noTab">
                      <h3>Ingreso de Producto</h3>
                      <input type="hidden" name="NUMEROFACTURA" id="NUMEROFACTURA" value="<?php echo $NUMEROFACTURA; ?>">
                      <input type="hidden"   name="RUT" id="RUT" value="<?php echo $RUT; ?>">
                      <input type="hidden" name="TOTALFACTURA" id="TOTALFACTURA" value="<?php echo $TOTAL; ?>">
                      <input type="hidden" name="FECHAFACTURA" id="FECHAFACTURA" value="<?php echo $FECHA; ?>">
                      <input type="hidden" name="USUARIO" id="USUARIO" value="<?php echo $USUARIO; ?>">
                    </div>
                    <div class="tab-pane active" id="tab1">
                      <h4>Selección de Producto</h4>
                      <!-- La TAB-->
                      <div id="tab" class="table table-striped table-hover"></div>
                      <!-- fin de la TAB--> 
                    </div>
                    <!-- div tab panel 2-->
                    
                    <div class="tab-pane" id="tab2">
                      <h4>Detalle Producto</h4>
                      <!-- -->
                      <div id="tbIngresoProducto" class="table table-striped table-hover"></div>
                      <!-- --> 
                    </div>
                    <!-- div tab panel 3-->
                    <div class="tab-pane" id="tab3">
                      <h4>Confirmación de Ingreso de Producto</h4>
                      <div class="span6">
                        <ul class="unstyled amounts">
                          <li><strong>Proveedor: <?php echo $RUT; ?></strong></span> </li>
                          <li><strong>N° Factura: <?php echo $NUMEROFACTURA; ?></strong></li>
                          <li><strong>Fecha: <?php echo $FECHA; ?></strong></b></li>
                        </ul>
                        <br />
                      </div>
                        <div id="tbDetalleProducto" class="table table-striped table-hover"></div>
                      <div class="span6">
                        <ul class="unstyled amounts">
                          <li><strong>Total: <?php echo $TOTAL; ?></strong></span> </li>
                          <li><strong>Cantidad de Productos: </strong><b id='tx_cantidad'></b> </li>
                          <li><strong>Usuario: <?php echo $USUARIO; ?></strong></b></li>
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
<script src="../js_mantenedores/nuevoWizar.js"></script>  
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
function marcar() 
    { 
	   var precio='<input type="text" name="PRECIOTB" id="PRECIOTB" maxlength="8" onkeyup="Moneda(this);" onchange="Moneda(this);" class="span11"/>';//se crea el imput
	   var cantidad=' <input type="text" name="CANTIDADTB" id="CANTIDADTB" maxlength="3" onkeyup="Moneda(this);" class="span5" />';
	   //var total=' <input type="text" name="TOTALTB" id="TOTALTB" readonly="readonly" class="span11" value="0" />';
       checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
       for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
       {
       if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
           {
             if(checkboxes[i].checked == true){  //sabes si el estado del check
		        var cadena = checkboxes[i].value; //pasamos los datos del check
				var elem = cadena.split(',');  //los dividimos y guardamos segun corresponda
                 codigo = elem[0];
                 nombre = elem[1];
                 marca =  elem[2];
		         modelo = elem[3];
				 
				 //var ver='<a href="javascript:verProducto(codigo)"><img src="../Imagenes/Edit_Male_User_Icon_32.png" style="vertica-align: middle;" /> </a>';
					$('#tbProducto').dataTable().fnAddData( [    //pasar los datos a la tabla por datatable
                     codigo,nombre,marca,modelo,cantidad,precio ]);
	
			  } 
            }
        }	
     }// fin de la funcion marcar
	 
	 function verProducto(codigo){
		 alert(codigo);
	 }
	 
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
	 var j=0; var x=0; var z=0; var cont=0; var cont2=0; // Declaracion de variables
	 cantidad=new Array();precio=new Array();codigo=new Array();
	 nombre=new Array();marca=new Array();modelo=new Array();
	 almacena=new Array();
	 
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
                    if(cont < 4 ){               //uno de los datos no toma como vacio
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
					  else if(cont2==3){modelo[j]=almacena[i]; cont2=0;j++}
				}
				
				
           cantidadProducto=codigo.length;
		   document.getElementById('tx_cantidad').innerHTML = cantidadProducto;	
		   	   
		 	for(i=0;i<codigo.length;i++){
				    $('#tbDetalle').dataTable().fnAddData( [    //pasar los datos a la tabla por datatable
                      codigo[i],nombre[i],marca[i],modelo[i],cantidad[i],precio[i] ]);
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
					  else if(cont==4){cantidadA[j]=almacena[i]; cont++;}
					  else if(cont==5){precioA[j]=almacena[i]; cont=0;j++;}
					  else {cont++;}
				}
				
			RUT=$('#PROVEEDOR').val();
			NUMEROFACTURA=$('#NUMEROFACTURA').val();
			FECHA=$('#FECHAFACTURA').val();
			TOTALFACTURA=$('#TOTALFACTURA').val();
			USUARIO="ADMIN"
			 for(i=0;i<codigoA.length;i++){
				CODIGO=codigoA[i];
				CANTIDAD=cantidadA[i];
				PRECIO=precioA[i].replace(/\./g,'');
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
					 data: { CODIGO:CODIGO,CANTIDAD:CANTIDAD},
                        }); ////guardar stock
					 
			 }// termino del for

          alertify.alert("Ingreso de Producto Guardado exitosamente", function () {
					location.href = 'ingreso_producto.php';
				});
		 }//fin de la funcion guardar
		 
</script>
</body>
</html>