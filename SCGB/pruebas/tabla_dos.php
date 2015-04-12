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
    <table id='tabla' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>Codigo Producto</th>
            <th>Codigo Producto Unitario</th>
            <th><input name="Custodians" type="checkbox" value="All" class="checkall"></th>
           
        </tr>
    </thead>
    <tbody>
          
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="1" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="2" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="3" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="4" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox"  value="5" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox"  value="6" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="7" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="8" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="9" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="10" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="11" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="12" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="13" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="14" /></td>
        </tr>
        
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="15" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="16" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input  name="CheckHerramienta" type="checkbox" value="17" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta" type="checkbox" value="18" /></td>
        </tr>
        
        <tr>
            <td>uno</td>
            <td>dos</td>
            <td style="width:100px;"><input name="CheckHerramienta"  type="checkbox" value="19" /></td>
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
<script type="text/javascript" src="../assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="dataTables.fnGetFilteredNodes.js"></script>
<script type="text/javascript" src="dataTables.fnGetHiddenNodes.js"></script>
<script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
<script src="../assets/scripts/app.js"></script>
<script src="../assets/scripts/table-managed.js"></script>  <script src="../assets/scripts/form-validation.js"></script> 
<script type="text/javascript" src="../assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
 
   
 <script>
 $(document).ready(function() {
      $("#tabla").dataTable({
		   "sScrollX": "100%",
           "sScrollXInner": "100%",
           "bScrollCollapse": true
		  });
	  //oTable = $('#tabla').dataTable();
   });
   
  // $('.checkall').click( function() { //this is the function that will mark all your checkboxes when the input with the .checkall class is clicked
  //  $('input', oTable.fnGetFilteredNodes()).attr('checked',this.checked); //note it's calling fnGetFilteredNodes() - this is so it will mark all nodes whether they are filtered or not
//} );

function contar(){
	   array=new Array();
	   oTable = $('#tabla').dataTable();
	   var sData = oTable.$('input').serialize();
       alert( "The following data would have been submitted to the server: \n\n"+sData ); 
	   

       var i = 0;
       var counter = 0;
       while (i != -1)
       {
       var i = sData.indexOf("CheckHerramienta",i);
       if (i != -1)
       {
       i++;
       counter++;
       }
     }
       alert(counter);
	  
		var elem = sData.split('&');
		for(j=0;j<counter;j++){
		var elem2= elem[j].split('CheckHerramienta='); 
		alert(elem2[1]);  
		}
	}
	
	
 // App.init();	
</script>     
        
</body>
</html>