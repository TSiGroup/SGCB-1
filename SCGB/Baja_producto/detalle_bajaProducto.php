<? session_start();
include ("../include/conectar.php");
$CODIGO= $_SESSION["PERMISO"];		
?>
<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$cn->Conectar();
$cn2->Conectar();
$id= $_GET['id'];
$obtiene = array();
$guarda1 = array();
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO,pu.CODIGOUNITARIO FROM producto p,producto_unitario pu WHERE p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND pu.PU_ESTADO=1 AND pu.CODIGOPRODUCTO='$id'");
while($row = $cn->getRespuesta($res)){
	array_push($obtiene, $row['CODIGOPRODUCTO']);
	array_push($obtiene, $row['CODIGOUNITARIO']);
	}
	
$i = 0;
while ($i < count($obtiene)) {
    $consulta=$obtiene[$i];
	$i++;
    $consulta2=$obtiene[$i];
	
	
		 $res2 = $cn2->Consulta("
SELECT p.CODIGOPRODUCTO,pu.CODIGOUNITARIO,ep.EP_FECHA,ep.EP_ESTADOPRODUCTO,ep.EP_OBSERVACION FROM PRODUCTO p,PRODUCTO_UNITARIO pu,ESTADO_PRODUCTO ep WHERE p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=ep.CODIGOPRODUCTO AND pu.CODIGOUNITARIO=ep.CODIGOUNITARIO AND p.CODIGOPRODUCTO='$consulta' AND pu.CODIGOUNITARIO=$consulta2 AND ep.EP_FECHA=(select max(ep.EP_FECHA) FROM producto p,producto_unitario pu,estado_producto ep
 WHERE p.CODIGOPRODUCTO='$consulta' AND pu.CODIGOUNITARIO=$consulta2 AND p.CODIGOPRODUCTO=ep.CODIGOPRODUCTO AND pu.CODIGOUNITARIO=ep.CODIGOUNITARIO ) "); 
		 while($row2 = $cn2->getRespuesta($res2)){
			   array_push($guarda1, $row2['CODIGOPRODUCTO']);
			   array_push($guarda1, $row2['CODIGOUNITARIO']);
			   array_push($guarda1, $row2['EP_FECHA']);
			   array_push($guarda1, $row2['EP_ESTADOPRODUCTO']);
			   array_push($guarda1, $row2['EP_OBSERVACION']);
			   array_push($guarda1, $row2['CODIGOPRODUCTO']);
			   array_push($guarda1, $row2['CODIGOUNITARIO']);
			   
			 }  
	$i++; 
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
   <link rel="stylesheet" href="../assets/plugins/fancybox/source/jquery.fancybox.css"/>
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
     
         <div class="container-fluid">
            <div class="row-fluid">
               <div class="span12">
                  <h3 class="page-title">Dar de Baja Producto</h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="#">Incio</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="#">Bodega</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="baja_producto.php">Dar de Baja Producto</a></li>
                  </ul>

               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget box green">
                     <div class="widget-title">
                        <div class="widget-title">
                        <h4><i class="icon-globe"></i>Tabla Dar de Baja Producto </h4>
                        </div>
                     </div>
                     <div class="widget-body form">
                     <div class="clearfix margin-bottom-10">
                       </div>
                        <h3>Detalle de Producto</h3>
                    <table id="sample_editable_1" class="table table-striped table-bordered table-hover" >
                       <thead>
                           <tr >
                             <th>Codigo Producto</th>
                             <th>Codigo Unitario</th>
                             <th>Fecha</th>
                             <th>Estado Producto</th>
                             <th>Observacion</th>
                             <th>Seleccionar</th>
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
                       
                      <td align="center" style="width:10px;">
                          <a class="edit" href="javascript:;">Dar de Baja</a>
                       </td>
                       <td style="width:100px;">
                        <a><img src="../Imagenes/1407377313_cancel.png" style="vertica-align: middle;" /></a>
                       </td>
                      <!--<td style="width:100px;"><input name="CheckHerramienta" value="<?php echo $guarda1[$j]; $j++;?>***&&***<?php echo $guarda1[$j]; $j++; ?>" type="checkbox" /></td>-->
                       <?php } ?>
                     </tr>  
                  </tbody>
                 </table>
                 
          <!-- ----------------------------------------------------------------------------------------------   -->    
                    <a id='btnFancybox'style="display: none;" href='#editarFormulario'>Cargar Fancy</a> 
                        
                 <div style="display: none;" id='editarFormulario'>
                  
                           <h3>Datos del Termino de Contrato</h3>
                        <form action="" method="post" id="form2" name="form2"  class="form-horizontal">
                         
                          <div class="control-group">
                           <label class="control-label">Fecha <span class="required"></span></label>
                              <div class="controls">
                            <input  type="text" class="span6 " name="FECHA" id="FECHA" />
                              </div>
                          </div>
                           
                        <div class="control-group">
                              <label class="control-label">Comentario<span class="required"></span></label>
                              <div class="controls">
                                <textarea name="COMENTARIO" class="span6  m-wrap tooltips" id="COMENTARIO" data-trigger="hover" data-original-title="Ingrese telefono de proveedor."></textarea>
                              </div>
                          </div>
    
                          <div class="control-group">
                             <div class="controls chzn-controls"></div>
                          </div>
                           <div class="form-actions">
                             <input type="button" name="enviar" value="Guardar" class="btn btn-success" onClick="guardar_form()" ></button>
                             <button type="button" name="CANCELAR" class="btn" onClick="cancelar()">Cancelar</button>
                           </div>
                        </form>
           </div>
        <!-- ----------------------------------------------------------------------------------------------  ---------------------------------------- -->    
                        <div class="control-group">
                             <div class="controls chzn-controls"></div>
                       </div>
                           <div class="form-actions">
                             <input type="button" name="enviar" value="Guardar" class="btn btn-success" onClick="guardar()" ></button>
                              <button type="button" name="volver" class="btn" onclick = "location.href = 'baja_producto.php'">Volver</button>
                           </div>            
                         <!--<div id="tab1" class="table table-striped table-bordered table-hover"></div>--> <!--!!!!!!!!!tabla!!!!!-->             
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
   <script type="text/javascript" src="../assets/plugins/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
   <script src="../assets/scripts/app.js"></script>
   <script src="../assets/scripts/table-managed.js"></script>  
   <script src="../assets/scripts/form-validation.js"></script> 
   <script type="text/javascript" src="../assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
   <script type="text/javascript" src="../assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
   <script type="text/javascript" src="../js_mantenedores/alertify.js"></script>
   <script src="../js_mantenedores/edit_bajaProducto.js"></script> 
   
 <script>
 var CODIGOPRODUCTO=""; CODIGOUNITARIO="";array_posicion1=new Array();array_posicion2=new Array(); var i=0;
 array_fecha= new Array();array_comentario=new Array();array_producto=new Array();array_unitario=new Array();
 var cont=0; var bandera=0;
  $("#btnFancybox").fancybox(); 
    App.init();
	TableEditable.init();
	
	function guardar_form(){
		if(bandera==0){
		                 FECHA= $('#FECHA').val();
	                     COMENTARIO= $('#COMENTARIO').val();
	                     array_producto.push(CODIGOPRODUCTO);
		                 array_unitario.push(CODIGOUNITARIO);
		                 array_comentario.push(COMENTARIO);
		                 array_fecha.push(FECHA);
		                 editar(array_posicion1[i], array_posicion2[i]);
		                 $('#FECHA').val("");
		                 $('#COMENTARIO').val("");
		                 i++;
		                 bandera=1;
		              }
		         else{
		                FECHA= $('#FECHA').val();
	                    COMENTARIO= $('#COMENTARIO').val();
		                array_comentario[cont]=COMENTARIO;
		                array_fecha[cont]=FECHA;
		                editar(array_posicion1[cont], array_posicion2[cont]);
		                $('#FECHA').val("");
		                $('#COMENTARIO').val("");
			         }
		
		$.fancybox.close();
		
		/*for(j=0; j<array_unitario.length; j++){
				   alert(array_producto[j]+" "+array_unitario[j]+" "+array_fecha[j]+" "+array_comentario[j]);
				}*/
		
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
				
		    jqTds[5].innerHTML = '<a class="edit" href="">Editar</a>';
		    jqTds[6].innerHTML = '<a class="edit" href=""><img src="../Imagenes/1407377412_camera_test.png" style="vertica-align: middle;" /></a>';
            } // fin de la función editar
			
	 function ver(oTable, nRow){
		    for(j=0; j<array_posicion1.length; j++){
				   if(array_posicion1[j]==oTable && array_posicion2[j]==nRow ){cont=j;} 
				}
			$('#FECHA').val(array_fecha[cont]);
			$('#COMENTARIO').val(array_comentario[cont]);
			$("#btnFancybox").click();
		 } // fin de la función ver
		 
	function cancelar(){
		 $.fancybox.close();
		 $('#FECHA').val("");
		 $('#COMENTARIO').val("");
		} // fin de la función cancelar
		
	 function eliminar(oTable, nRow){ 
		var aData = oTable.fnGetData(nRow);
        var jqTds = $('>td', nRow);
		
		alertify.confirm("Desea cancelar la operación?", function (ex) {
					if (ex==false) {
						     return;  
					       }
					 else {
						    jqTds[5].innerHTML = '<a class="edit" href="javascript:;">Dar de Baja</a>';
		                    jqTds[6].innerHTML = '<a><img src="../Imagenes/1407377313_cancel.png" style="vertica-align: middle;" /></a>';
							    buscar(oTable, nRow)
								array_comentario.splice(cont,1); 
								array_fecha.splice(cont,1);
								array_producto.splice(cont,1);
		                        array_unitario.splice(cont,1);
								array_posicion1.splice(cont,1);
	                            array_posicion2.splice(cont,1);
								i--;
						  } 
				  });			
	        }// fin de la función eiminar
	  
	  function buscar(oTable, nRow){
		 for(j=0; j<array_posicion1.length; j++){
				   if(array_posicion1[j]==oTable && array_posicion2[j]==nRow ){cont=j;} 
				}
		  }// fin de la función buscar
		  
	   function guardar(){
		     for(j=0; j<array_unitario.length; j++){
				 CODIGO_FINAL=array_producto[j];
			     CODIGOUNITARIO_FINAL=array_unitario[j];
			     FECHA_FINAL=array_fecha[j];
			     COMENTARIO_FINAL=array_comentario[j];
				   
				$.ajax({
                type: 'POST',
                url: 'guardar_bajaProducto.php',
                data: { CODIGO_FINAL:CODIGO_FINAL,CODIGOUNITARIO_FINAL:CODIGOUNITARIO_FINAL, FECHA_FINAL:FECHA_FINAL, COMENTARIO_FINAL:COMENTARIO_FINAL}
		         });
				 
				alertify.alert("Datos guardados correctamente", function () {
					
					location.href = 'baja_producto.php';
				  });

			  }
		   
		   }
		
</script>     
        
</body>
</html>