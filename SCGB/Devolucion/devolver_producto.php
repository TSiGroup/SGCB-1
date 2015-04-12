<? session_start();
include ("../include/conectar.php");	
?>
<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$cn3 = new Conexion();
$cn4 = new Conexion();
$id= $_GET['id'];
$cn->Conectar();
$cn2->Conectar();
$cn3->Conectar();
$cn4->Conectar();
$obtiene = array();
$guarda1 = array();
$cont=0;
$res = $cn->Consulta("SELECT dp.CODIGOPRODUCTO,dp.CODIGOUNITARIO,dp.CODIGOPRESTAMO FROM DETALLE_PRESTAMO dp,PRODUCTO_UNITARIO pu WHERE dp.CODIGOUNITARIO=pu.CODIGOUNITARIO AND CODIGOPRESTAMO='$id' AND pu.PU_ESTADO=2 AND dp.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND dp.DP_ESTADO=1");
while($row = $cn->getRespuesta($res)){
	
	array_push($obtiene, $row['CODIGOPRODUCTO']);
	array_push($obtiene, $row['CODIGOUNITARIO']);
	array_push($obtiene, $row['CODIGOPRESTAMO']);
	$cont++;
	}
$i = 0;
while ($i < count($obtiene)) {
    $consulta=$obtiene[$i];
	$i++;
    $consulta2=$obtiene[$i];
	$i++;
    $consulta3=$obtiene[$i];
	$res2 = $cn2->Consulta("SELECT P_IDENTIFICADOR FROM PRODUCTO WHERE CODIGOPRODUCTO='$consulta'");
	while($row2 = $cn2->getRespuesta($res2)){
    $IDENTIFICADOR=$row2['P_IDENTIFICADOR'];
	
	if($IDENTIFICADOR=="H"){
		 $res3 = $cn3->Consulta("
SELECT p.CODIGOPRODUCTO,pu.CODIGOUNITARIO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,h.H_TIPOHERRAMIENTA,h.H_FRECUENCIA,h.H_POTENCIAMAXIMA FROM PRODUCTO p,PRODUCTO_UNITARIO pu,HERRAMIENTA h WHERE p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=h.CODIGOPRODUCTO AND p.CODIGOPRODUCTO='$consulta' AND pu.CODIGOUNITARIO='$consulta2'"); 
		 while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['CODIGOUNITARIO']);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Tipo:".$row3['H_TIPOHERRAMIENTA']." Frecuencia:".$row3['H_FRECUENCIA']." PotenciaMAx:".$row3['H_POTENCIAMAXIMA']);
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['CODIGOUNITARIO']);
			   array_push($guarda1, $consulta3);
			   
			 } 
		}
	   else{
		     $res3 = $cn3->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,p.P_IDENTIFICADOR,v.V_PERMISO,v.V_YEAR,v.V_CONDICION,v.V_PATENTE,pu.CODIGOUNITARIO FROM VEHICULO v,PRODUCTO p,PRODUCTO_UNITARIO pu WHERE p.CODIGOPRODUCTO=v.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND p.CODIGOPRODUCTO='$consulta' AND pu.CODIGOUNITARIO='$consulta2'"); 
		      while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['V_PATENTE']);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Condición:".$row3['V_CONDICION']." FechaPermisoCirculación:".$row3['V_PERMISO']." Año:".$row3['V_YEAR']);
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['CODIGOUNITARIO']);
			   array_push($guarda1, $consulta3);
			 } 
		}
	
	
	}
	$i++; 
}

//$res4 = $cn4->Consulta("SELECT pt.CODIGOPRESTAMO,o.O_NOMBRE,t.RUN,t.T_NOMBRE,t.T_APELLIDO,pt.PT_FECHA,pt.PT_TOTALPRODUCTO,pt.PT_COMENTARIO FROM PRESTAMO pt,TRABAJADOR t,OBRA o WHERE pt.RUN=t.RUN AND pt.CODIGOOBRA=o.CODIGOOBRA AND pt.CODIGOPRESTAMO='$id'");
//while($row4 = $cn4->getRespuesta($res4)){
//	 $CODIGOPRESTAMO=$row4['CODIGOPRESTAMO'];
//	 $OBRA=$row4['O_NOMBRE'];
//	 $RUN=$row4['RUN'];
//	 $NOMBRE=$row4['T_NOMBRE']." ".$row4['T_APELLIDO'];
//	 $FECHA=$row4['PT_FECHA'];
//	 $TOTALPRODUCTO=$row4['PT_TOTALPRODUCTO'];
//	 $COMENTARIO=$row4['PT_COMENTARIO'];
//	}
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
            <li class="has-sub  start active">
               <a href="javascript:;">
               <i class="icon-bar-chart"></i> 
               <span class="title">Bodega</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub">
                 <li ><a href="../Prestamo/prestamo.php">Prestamo</a></li>
				  <li class="active"><a href="../Devolucion/devolucion.php">Devolucion</a></li>
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
                  <h3 class="page-title">Devolución de Producto</h3>
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
                        <a href="devolucion.php">Devolución</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="#">Devolución de Producto</a></li>
                  </ul>

               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget box green">
                     <div class="widget-title">
                        <div class="widget-title">
                        <h4><i class="icon-globe"></i>Tabla Devolución de Producto</h4>
                        </div>
                     </div>
                     <div class="widget-body form">
                       <input type="hidden" name="CODIGO" id="CODIGO" value="<? echo $id; ?>" />
                       <h3>Detalle de Prestamo</h3>
                        <table id='tablaDetallePrestamo' class="table table-striped table-bordered table-hover" >
                          <thead>
                            <tr >
                              <th>Codigo Producto</th>
                              <th>Codigo Producto Unitario</th>
                              <th>Nombre</th>
                              <th>Marca</th>
                              <th>Modelo</th>
                              <th>Observación</th>
                              <th>Descripción</th>
                              <th>Seleccionar</th>
                           </tr>
                         </thead>
                      <tbody>
                         <?php $j=0; while($j < count($guarda1)){ ?>
                         <tr>
                            <td><?php echo $guarda1[$j]; $j++; ?></td>
                            <td><?php echo $guarda1[$j]; $j++; ?></td>
                            <td><?php echo $guarda1[$j]; $j++; ?></td>
                            <td><?php echo $guarda1[$j]; $j++; ?></td>
                            <td><?php echo $guarda1[$j]; $j++; ?></td>
                            <td><?php echo $guarda1[$j]; $j++; ?></td>
                            <td><?php echo $guarda1[$j]; $j++; ?></td>
             
                            <td style="width:100px;"><input name="CheckHerramienta" value="<?php echo $guarda1[$j]; $j++;?>***&&***<?php echo $guarda1[$j]; $j++; ?>***&&***<?php echo $guarda1[$j]; $j++; ?>" type="checkbox" /></td>
                       <?php } ?>
                       </tr>
                     </tbody>
                 </table> 
                        
                         
                        <div class="control-group">
                             <div class="controls chzn-controls"></div>
                          </div>
                           <div class="form-actions">
                             <input type="Submit" name="enviar" value="Guardar" class="btn btn-success" onClick="guardar();"></button>
                              <button type="button" name="volver" class="btn" onclick = "location.href = 'devolucion.php'">Volver</button>
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
   <script src="../assets/scripts/table-managed.js"></script>  <script src="../assets/scripts/form-validation.js"></script> 
   <script type="text/javascript" src="../assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
   <script type="text/javascript" src="../assets/plugins/jquery-validation/dist/additional-methods.min.js"></script> 
   <script type="text/javascript" src="../js_mantenedores/alertify.js"></script>
   
 <script>
 
   $(document).ready(function() {
	   App.init();
   })
   
   function guardar(){
	  codigoProducto=new Array();codigoUnitario=new Array();codigoPrestamo=new Array();var x=0;
	  checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
	  pasar=$('#CODIGO').val();
	  
      for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
       {
       if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
           {
             if(checkboxes[i].checked == true){  //sabes si el estado del check
		        var cadena = checkboxes[i].value; //pasamos los datos del check
				var elem = cadena.split('***&&***');  //los dividimos y guardamos segun corresponda
                 codigoProducto[x] = elem[0];
				 codigoUnitario[x] = elem[1];
				 codigoPrestamo[x] = elem[2];
				 x++; 
			}
		 }
     }//termino del for1
    
	for(i=0;i<codigoProducto.length;i++){
			  PRODUCTO=codigoProducto[i];
			  UNITARIO=codigoUnitario[i];
			  PRESTAMO=codigoPrestamo[i];
			  guardar_devolucion(PRODUCTO,UNITARIO,PRESTAMO);
			  }//fin del for
			  if(codigoProducto.length!=0){
			   alertify.alert("Devolución de Producto Guardado exitosamente", function () {
				//location.href = 'devolver_producto.php?id='+pasar;
				 location.href='devolucion.php'
				});
			  }
	        }//TERMINO DE LA FUNCION GUARDAR
   
   function guardar_devolucion(PRODUCTO,UNITARIO,PRESTAMO){ 
	 $.ajax({
     type: 'POST',
     url: 'guardar_devolucion.php',
     data: { PRODUCTO:PRODUCTO, UNITARIO:UNITARIO, PRESTAMO:PRESTAMO}
          });// actualiza la factura
	   }
	   
</script>     
        
</body>
</html>