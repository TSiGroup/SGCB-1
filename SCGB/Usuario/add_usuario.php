<? session_start();
include ("../include/conectar.php");
$CODIGO= $_SESSION["PERMISO"];
?> 
 
<!DOCTYPE html>
<html lang="es"> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
<meta charset="utf-8" />
   <title>Berau veritas|Cesmec</title>
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
   <link rel="stylesheet" type="text/css" href="../css_mantenedoressd/jquery.msgbox.css" />
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
      <li class="has-sub  "> <a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Bodega</span> <span class="arrow "></span></a>
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
      <li class="has-sub  star active"> <a href="javascript:;"> <i class="icon-warning-sign"></i> <span class="title">Administracion</span> <span class="arrow "></span></a>
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
                  <h3 class="page-title">Usuario</h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="index.php">Incio</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="#">Administración</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="add_usuario.php">Agregar Usuario</a></li>
                  </ul>

               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget box green">
                     <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Agregar Usuario</h4>
                     </div>
                     <div class="widget-body form">
                       <h3>Datos del Usuario</h3>
                        <form action="" method="post" id="form2" name="form2"  class="form-horizontal">
                           <div class="control-group">
                              <label class="control-label">Login</label>
                              <div class="controls">
                                 <div class="input-icon left">
                                  <i class="icon-lock"></i>
                                 <input type="text"  name="LOGIN" id="LOGIN" class="span6" placeholder="Login" required/>
                              </div>
                             </div>
                           </div>
                           
                           <div class="control-group">
                           <label class="control-label">Password</label>
                              <div class="controls">
                             <div class="input-icon left">
                                  <i class="icon-key"></i>
                           <input  type="password" class="span6" name="PASSWORD" id="PASSWORD" placeholder="Password" required/>
                              </div>
                             </div>
                           </div>
                             
                           <div class="control-group">
                           <label class="control-label">Nombre</label>
                              <div class="controls">
                              <div class="input-icon left">
                                  <i class=" icon-user"></i>
                            <input  type="text" class="span6 " name="NOMBRE" id="NOMBRE" placeholder="Nombre" required />
                              </div>
                             </div>
                           </div>
                           
                            <div class="control-group">
                              <label class="control-label">Apellido</label>
                              <div class="controls">
                               <div class="input-icon left">
                                  <i class=" icon-user"></i>
                                 <input type="text" name="APELLIDO" id="APELLIDO" class="span6" placeholder="Apellido" required/>
                              </div>
                             </div>
                           </div>               
                           
                        <div class="control-group">
                              <label class="control-label">Teléfono</label>
                              <div class="controls">
                               <div class="input-icon left">
                                  <i class="icon-phone"></i>
                                  <input type="number" name="TELEFONO" id="TELEFONO"  class="span6" placeholder="Teléfono" required/>
                              </div>
                             </div>
                          </div>
                           
                           <div class="control-group">
                              <label class="control-label">Email</label>
                              <div class="controls">
                               <div class="input-icon left">
                                  <i class="icon-envelope"></i>
                                  <input type="email" name="EMAIL" id="EMAIL"  class="span6" placeholder="Email" required/>
                               </div>
                              </div>
                             </div>
                           
                           <div class="control-group">
                              <label class="control-label">Permisos</label>
                              <div class="controls">
                                 <label class="checkbox line">
                                 <input name="service" type="checkbox" id="PROVEEDOR" value="1"/>
                                 Proveedor
                                 </label>
                                 <label class="checkbox line">
                                 <input type="checkbox" value="1" name="service" id="PRODUCTO"/>
                                 Producto
                                 </label>
                                 <label class="checkbox line">
                                 <input type="checkbox" value="1" name="service" ID="PERSONAL"/>
                                 Personal
                                 </label>
                                <label class="checkbox line">
                                   <input name="INFORME" type="checkbox" ID="OBRA" value="1"/>
                                   Obra </label>
                                 <label class="checkbox line">
                                   <input name="INFORME2" type="checkbox" ID="BODEGA" value="1"/>
                                   Bodega </label>
                                 <label class="checkbox line">
                                   <input name="INFORME3" type="checkbox" ID="INFORME" value="1"/>
                                   Informes y Graficos</label>
                                 <label class="checkbox line">
                                   <input name="INFORME4" type="checkbox" ID="ADMINISTRACION" value="1"/>
                                   Administracion </label>
                                 <span class="help-block">(seleccionar al menos uno)</span>
                                <div id="form2"></div>
                              </div>
                           </div>
                           
                           <div class="control-group">
                             <div class="controls chzn-controls"></div>
                          </div>
                           <div class="form-actions">
                             <input type="Submit" name="enviar" value="Guardar" class="btn btn-success"></button>
                              <button type="button" name="reset" class="btn" onClick="limpiar()">Cancelar</button>
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
<script type="text/javascript" src="../assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
<script src="../assets/scripts/app.js"></script>
<script type="text/javascript" src="../js_mantenedores/jquery.msgbox.min.js"></script> 
    
   <script>
	  var contar=0;
      jQuery(document).ready(function() { 
	    App.init(); 
	   $("#form2").submit(function(e){
        if($("#PROVEEDOR").is(':checked')) {PROVEEDOR=1;contar=1;} else {PROVEEDOR=0;}
		if($("#PRODUCTO").is(':checked')) {PRODUCTO=1;contar=1;} else {PRODUCTO=0;}   
	    if($("#PERSONAL").is(':checked')) {PERSONAL=1;contar=1;} else {PERSONAL=0;}  
		if($("#OBRA").is(':checked')) {OBRA=1;contar=1;} else {OBRA=0;} 
		if($("#BODEGA").is(':checked')) {BODEGA=1;contar=1;} else {BODEGA=0;} 
		if($("#INFORME").is(':checked')) {INFORME=1;contar=1;} else {INFORME=0;} 
		if($("#ADMINISTRACION").is(':checked')) {ADMINISTRACION=1;contar=1;} else {ADMINISTRACION=0;}
		LOGIN= $('#LOGIN').val()
		PASSWORD= $('#PASSWORD').val()
		NOMBRE= $('#NOMBRE').val()
        APELLIDO= $('#APELLIDO').val() 
		TELEFONO= $('#TELEFONO').val()  
		EMAIL= $('#EMAIL').val()
		e.preventDefault();//Detenemos submit  
        if(contar==1){
			$.getJSON("buscar_usuario.php", {LOGIN: LOGIN}, function(data) { 
           if(data==1){guardarPermiso(PROVEEDOR,PRODUCTO,PERSONAL,OBRA,BODEGA,INFORME,ADMINISTRACION);}
		   else if(data==2){$.msgbox("El Usuario se Encuentra Activo, Por Favor verifique la lista de Usuarios",{buttons : [{type: "submit", value: "Aceptar"}]});}
		   else {editarUsuario(PROVEEDOR,PRODUCTO,PERSONAL,OBRA,BODEGA,INFORME,ADMINISTRACION);}
                })
		}else{$.msgbox("Por Favor Seleccione al menos un permiso",{buttons : [{type: "submit", value: "Aceptar"}]});contar=0;}  
        });
      }); 
	  
	  
	  function guardarPermiso(PROVEEDOR,PRODUCTO,PERSONAL,OBRA,BODEGA,INFORME,ADMINISTRACION){
		$.ajax({
          type: 'POST',
          url: 'guardar_permiso.php',
          data: {PROVEEDOR:PROVEEDOR, PRODUCTO:PRODUCTO, PERSONAL:PERSONAL, OBRA:OBRA,BODEGA:BODEGA,INFORME:INFORME,ADMINISTRACION:ADMINISTRACION},
                success: function(data){
					guardaUsuario(data);
                }
            });
		}
	  
	  function guardaUsuario(COD){
		 CODIGOPERMISO=COD;
		 LOGIN= $('#LOGIN').val()
		 PASSWORD= $('#PASSWORD').val()
		 NOMBRE= $('#NOMBRE').val()
         APELLIDO= $('#APELLIDO').val() 
		 TELEFONO= $('#TELEFONO').val()  
		 EMAIL= $('#EMAIL').val()
		 $.ajax({
           type: 'POST',
           url: 'guardar_usuario.php',
           data: { CODIGOPERMISO:CODIGOPERMISO, LOGIN:LOGIN, PASSWORD:PASSWORD, NOMBRE:NOMBRE, APELLIDO:APELLIDO, TELEFONO:TELEFONO, EMAIL:EMAIL},
		   success: function(data){
			   if(data==""){$.msgbox("Usuario Agregado Exitosamente",{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});limpiar();}
			   else{$.msgbox("Error 1053, a ocurrido un error al momento de ingresar los datos, por favor verifique los datos ó comuniquese con el administrador del sistema.", {type: "error",buttons : [{type: "submit", value: "Aceptar"}]});}
                }
			   });
		  }
		  
	     function editarUsuario(PROVEEDOR,PRODUCTO,PERSONAL,OBRA,BODEGA,INFORME,ADMINISTRACION){
			  LOGIN= $('#LOGIN').val()
		      PASSWORD= $('#PASSWORD').val()
		      NOMBRE= $('#NOMBRE').val()
              APELLIDO= $('#APELLIDO').val() 
		      TELEFONO= $('#TELEFONO').val()  
		      EMAIL= $('#EMAIL').val()
			  $.ajax({
                type: 'POST',
                url: 'actualizar_usuario2.php',
                data: {PROVEEDOR:PROVEEDOR, PRODUCTO:PRODUCTO, PERSONAL:PERSONAL, OBRA:OBRA,BODEGA:BODEGA,INFORME:INFORME,ADMINISTRACION:ADMINISTRACION, LOGIN:LOGIN, PASSWORD:PASSWORD, NOMBRE:NOMBRE, APELLIDO:APELLIDO, TELEFONO:TELEFONO, EMAIL:EMAIL},
                success: function(data){
				 $.msgbox("Usuario Agregado Exitosamente",{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});
				 limpiar();
                }
              });
			 }
		  
		  function limpiar(){
			  $('#LOGIN').val("");
			  $('#PASSWORD').val("");
			  $('#NOMBRE').val("");
			  $('#APELLIDO').val("");
			  $('#TELEFONO').val("");
			  $('#EMAIL').val("");
			  if(document.getElementById('PROVEEDOR').checked==true){document.getElementById('PROVEEDOR').click();}
			  if(document.getElementById('PRODUCTO').checked==true){document.getElementById('PRODUCTO').click();}
			  if(document.getElementById('PERSONAL').checked==true){document.getElementById('PERSONAL').click();}
			  if(document.getElementById('OBRA').checked==true){document.getElementById('OBRA').click();}
			  if(document.getElementById('BODEGA').checked==true){document.getElementById('BODEGA').click();}
			  if(document.getElementById('INFORME').checked==true){document.getElementById('INFORME').click();}
			  if(document.getElementById('ADMINISTRACION').checked==true){document.getElementById('ADMINISTRACION').click();}
			  }
	  
	  
   </script> 
        
</body>
</html>