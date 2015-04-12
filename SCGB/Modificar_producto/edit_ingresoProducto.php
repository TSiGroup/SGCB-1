<? session_start();
include ("../include/conectar.php");	
?>
<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$id= $_GET['id'];
$fecha= $_GET['fecha'];
$total= $_GET['total'];
$rut= $_GET['rut'];
$cn->Conectar();
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO, p.P_NOMBRE,p.P_MARCA, p.P_MODELO, ip.IP_CANTIDAD, ip.IP_PRECIOUNITARIO from PRODUCTO p, INGRESO_PRODUCTO ip where ip.CODIGOPRODUCTO = p.CODIGOPRODUCTO and ip.NUMEROFACTURA=$id");

$cn2->Conectar();
$res2 = $cn2->Consulta("SELECT RUT,PD_NOMBRE FROM PROVEEDOR WHERE PD_ESTADO=1");
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
            <li class="has-sub  start active">
               <a href="javascript:;">
               <i class="icon-warning-sign"></i> 
               <span class="title">Administracion</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
			    <li ><a href="../Usuario/add_usuario.php">Agregar Usuario</a></li>
				 <li ><a href="../Usuario/mod_usuario.php">Buscar Usuario</a></li>
				 <li class="active"><a href="../Modificar_producto/mod_ingresoProducto.php">Modificar ingreso Produccto</a></li>
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
         <!-- ???????????????????????????????????????????????????-->
        <!-- <div id="widget-config" class="modal hide">
            <div class="modal-header">
               
               <h3>widget Settings</h3>
            </div>
            <div class="modal-body">
               <p>Here will be a configuration form</p>
            </div>
         </div>-->
         <!--???????????????????????????????????????????????????-->
         <div class="container-fluid">
            <div class="row-fluid">
               <div class="span12">
                  <h3 class="page-title">Detalle Ingreso Producto</h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="index.php">Incio</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="#">Bodega</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="mod_ingresoProducto.php">Modificar Ingreso Producto</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="edit_ingresoProducto.php">Detalle Ingreso Producto</a></li>
                  </ul>

               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget box green">
                     <div class="widget-title">
                        <div class="widget-title">
                        <h4><i class="icon-globe"></i>Tabla Detalle Ingreso Producto</h4>
                        </div>
                     </div>
                     <div class="widget-body form">
                     <h3>Datos del Ingreso de Productos</h3>
                     <form action="" method="post" id="form2" name="form2"  class="form-horizontal"> 
                         <input type="hidden" name="NOMBRE" id="NOMBRE" value="<?php echo $rut ?>" />
                         <div class="control-group">
                        <label class="control-label">N° Factura: </label>
                        <div class="controls">
                          <input name="NUMEROFACTURA" type="text" class="span4" id="NUMEROFACTURA" value="<?php echo $id ?>" readonly/>
                         </div>
                        </div>
                         <div class="control-group">
                        <label class="control-label">Poveedor: </label>
                        <div class="controls">
                          <select   name="PROVEEDOR" id="PROVEEDOR" class="span4  m-wrap tooltips" >
                            <?php while($row2 = $cn2->getRespuesta($res2)){ ?>
                            <option value="<? echo $row2['RUT']; ?>" ><?php echo $row2['PD_NOMBRE']; ?></option>
                            <? } ?>
                          </select>
                         </div>
                        </div>
                         <div class="control-group">
                        <label class="control-label">Total Factura: </label>
                        <div class="controls">
                          <input name="TOTAL" type="text" class="span4" id="TOTAL" value="<?php echo $total ?>" />
                         </div>
                        </div>
                         <div class="control-group">
                        <label class="control-label">Fecha: </label>
                        <div class="controls">
                          <input name="FECHA" type="text" class="span4" id="FECHA" value="<?php echo $fecha ?>" />
                         </div>
                        </div>
                   </form>
                     <div class="clearfix margin-bottom-10">
                     <div class="btn-group pull-right">
                              <button id="sample_editable_1_new" class="btn btn-success" onclick = "location.href = '../Ingreso_Producto/agregar_producto.php?id=<?php echo $id ?>'">
                              Agregar Producto <i class="icon-plus"></i>
                              </button>
                           </div>
                       </div>
                     <!-- BEGIN FORM-->
                        <h3>Detalle de Producto</h3>
                         <table id="sample_editable_1" class="table table-striped table-bordered table-hover" >
                           <thead>
                              <tr >
                                <th>Codigo Producto</th>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                              </tr>
                          </thead>
                             <tbody>
                                <?php while($row = $cn->getRespuesta($res)){ ?>
                                 <tr>
                                   <td><?php echo $row['CODIGOPRODUCTO']; ?></td>
                                   <td><?php echo $row['P_NOMBRE']; ?></td>
                                   <td><?php echo $row['P_MARCA']; ?></td>
                                   <td><?php echo $row['P_MODELO']; ?></td>
                                   <td><?php echo $row['IP_CANTIDAD']; ?></td>
                                   <td><?php echo $row['IP_PRECIOUNITARIO']; ?></td>
                                   <td align="center">
                                     <a class="edit" href="javascript:;">Editar</a>
                                    </td>
                                   <td align="center">
                                     <a class="delete" href="javascript:;">Eliminar</a>
                                    </td>
                               </tr>
                            <?php } ?>
                           </tbody>
                        </table>
                        <div class="control-group">
                             <div class="controls chzn-controls"></div>
                          </div>
                           <div class="form-actions">
                             <input type="Submit" name="enviar" value="Guardar" class="btn btn-success" ></button>
                              <button type="button" name="volver" class="btn" onclick = "location.href = 'mod_ingresoProducto.php'">Volver</button>
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
   <script type="text/javascript" src="../assets/plugins/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
   <script src="../assets/scripts/app.js"></script>
   <script src="../assets/scripts/table-managed.js"></script>  
   <script src="../assets/scripts/form-validation.js"></script> 
   <script type="text/javascript" src="../assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
   <script type="text/javascript" src="../assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
   <script src="../assets/scripts/table-editable.js"></script>  
   <script type="text/javascript" src="../js_mantenedores/alertify.js"></script>
   
 <script>
 
   $(document).ready(function() {
	   TableEditable.init();
	   App.init();
   })
   
   	 RUT=$('#PROVEEDOR').val();
	 NUMEROFACTURA=$('#NUMEROFACTURA').val();
	 FECHA=$('#FECHA').val();
	 TOTALFACTURA=$('#TOTAL').val();
	 USUARIO="ADMIN";
   
   function editarIngreso(CODIGO,CANTIDAD,PRECIO){ 
	 $.ajax({
     type: 'POST',
     url: 'actulizar_ingresoProducto.php',
     data: { CODIGO:CODIGO, RUT:RUT, NUMEROFACTURA:NUMEROFACTURA, CANTIDAD:CANTIDAD, PRECIO:PRECIO, TOTALFACTURA:TOTALFACTURA, FECHA:FECHA, USUARIO:USUARIO},
	       success: function(data){
			   guardarPrducto(CODIGO,data);
			   guardarStock(CODIGO,data);
			   }
          });// actualiza la factura
		  
	 }
	
   function guardarPrducto(CODIGO,CANTIDADSIGNO){
	 var elem = CANTIDADSIGNO.split(',');
	 DIFERENCIA=elem[0];
	 SIGNO=elem[1];
	 if(SIGNO=="+"){
		  $.ajax({
	      type: 'POST',
          url: '../Producto_Unitario/agregar_productoUnitario.php',
          data: { CODIGO:CODIGO, DIFERENCIA:DIFERENCIA, NUMEROFACTURA:NUMEROFACTURA}
              });//agrega producto unitario 
		 }
	  else if (SIGNO=="-"){
		    $.ajax({
	        type: 'POST',
            url: '../Producto_Unitario/eliminar_productoUnitario.php',
            data: { CODIGO:CODIGO, DIFERENCIA:DIFERENCIA, NUMEROFACTURA:NUMEROFACTURA}
              });
		  }  			        
		}
	
	function guardarStock(CODIGO,CANTIDADSIGNO){
		var elem = CANTIDADSIGNO.split(',');
	    DIFERENCIA=elem[0];
	    SIGNO=elem[1];
     if(SIGNO=="+"){
		  $.ajax({
	      type: 'POST',
          url: '../Stock/agregar_stock.php',
          data: { CODIGO:CODIGO, DIFERENCIA:DIFERENCIA}
              });//agrega producto unitario 
		 }
	  else if (SIGNO=="-"){
		    $.ajax({
	        type: 'POST',
            url: '../Stock/eliminar_stock.php',
            data: { CODIGO:CODIGO, DIFERENCIA:DIFERENCIA}
              });
		  }  
		
		}//fin de la funcin guardarStock
		
	function eliminarProducto(CODIGO,DIFERENCIA){
		$.ajax({
        type: 'POST',
        url: '../Producto_Unitario/eliminar_productoUnitario.php',
        data: {  CODIGO:CODIGO, DIFERENCIA:DIFERENCIA, NUMEROFACTURA:NUMEROFACTURA},
	       success: function(data){
			   eliminaStock(CODIGO,DIFERENCIA);
			   elimiaIngreso(CODIGO);
			   //alert(data);
			   }
          });// elimina Producto
	 }
	 
	 function eliminaStock(CODIGO,DIFERENCIA){
		    $.ajax({
	        type: 'POST',
            url: '../Stock/eliminar_stock.php',
            data: { CODIGO:CODIGO, DIFERENCIA:DIFERENCIA}
              });
		 }//ELIMINA STOCK
		 
	  function elimiaIngreso(CODIGO){
		  $.ajax({
          type: 'POST',
          url: 'eliminar_ingresoProducto.php',
          data: { CODIGO:CODIGO, RUT:RUT, NUMEROFACTURA:NUMEROFACTURA}
		    });
		  } //ELIMINA INGRESO
	 
					 
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
	  
</script>     
        
</body>
</html>