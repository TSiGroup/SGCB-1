<? session_start();
include ("../include/conectar.php");
$CODIGO= $_SESSION["PERMISO"];
?> 
<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT CODIGOCARGO,C_NOMBRE FROM  CARGO where C_ESTADO=1");

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
   <link rel="stylesheet" href="../css_mantenedoressd/alertify.core.css" />
   <link rel="stylesheet" href="../css_mantenedoressd/alertify.default.css" />
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
         <li class="has-sub star active"> <a href="javascript:;"> <i class="icon-group"></i> <span class="title">Personal</span> <span class="arrow "></span></a>
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
                  <h3 class="page-title">Trabajador</h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="index.php">Incio</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="#">Personal</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="add_trabajador.php">Agregar Trabajador</a></li>
                  </ul>

               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget box green">
                     <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Agregar Trabajador</h4>
                     </div>
                     <div class="widget-body form">
                       <h3>Datos del Trabajador</h3>
                        <form action="" method="post" id="form2" name="form2"  class="form-horizontal">
                        <input  type="hidden" name="CODIGOHISTORICO" id="CODIGOHISTORICO"/>
                           <div class="control-group">
                              <label class="control-label">Run</label>
                              <div class="controls">
                                 <input type="text"  name="RUT" id="RUT" class="span6" maxlength="12" placeholder="Ingrese RUN" required/> <button type="button" class="btn btn-info" onClick="validar_trabajador()">Verificar</button>
                              </div>
                           </div>
                           
                           <div class="control-group">
                              <label class="control-label">Cargo</label>
                              <div class="controls">
                                 
		                          <p>
		                            <select name="CODIGO" id="CODIGO" class="span6" disabled="disabled" >
		                              <?php while($row = $cn->getRespuesta($res)){ ?>
		                              <option value="<? echo $row['CODIGOCARGO']; ?>" ><?php echo $row['C_NOMBRE']; ?></option>
		                              <?
                                    }
 
                                   ?>                         
		                              
	                                </select>  <a href="../Cargo/add_cargo.php"><img src="../Imagenes/anadir-mas-verde-icono-5682-32.png" style="vertica-align: middle;" /> </a>
                              </div>
                           </div>
                          
                           <div class="control-group">
                           <label class="control-label">Nombre</label>
                              <div class="controls">
                              <div class="input-icon left">
                              <i class=" icon-user"></i>
                            <input  type="text" class="span6 " name="NOMBRE" id="NOMBRE" placeholder="Nombre" disabled="disabled" required/>
                              </div>
                            </div>
                           </div>
                            <div class="control-group">
                              <label class="control-label">Apellidos</label>
                              <div class="controls">
                              <div class="input-icon left">
                              <i class=" icon-user"></i>
                                 <input type="text" name="APELLIDO" id="APELLIDO" class="span6" placeholder="Apellidos" disabled="disabled" required/>
                              </div>
                             </div>
                           </div>               
                           <div class="control-group">
                              <label class="control-label">Sexo</label>
                              <div class="controls"> <select class="span6 " name="SEXO"id ="SEXO" disabled="disabled">
                                    <option value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
  
                                 </select>
                              </div>
                           </div>            
                          <div class="control-group">
                              <label class="control-label">Dirección</label>
                              <div class="controls">
                               <div class="input-icon left">
                                <i class=" icon-home"></i>
                                 <input type="text" name="DIRECCION" id="DIRECCION" class="span6" placeholder="Dirección" disabled="disabled" required/>
                              </div>
                             </div>
                           </div>
                        <div class="control-group">
                              <label class="control-label">Teléfono</label>
                              <div class="controls">
                              <div class="input-icon left">
                              <i class=" icon-phone"></i>
                                  <input type="number" name="TELEFONO" id="TELEFONO"  class="span6" min="0" maxlength="10" placeholder="Teléfono" disabled="disabled" required />
                             </div>
                           </div>
                          </div>
                           <div class="control-group">
                              <label class="control-label">Fecha Inicio Contrato</label>
                              <div class="controls">
                                  <input type="date"  name="FECHA" id="FECHA"  class="span6" disabled="disabled" required />
                              </div>
                           </div>
                           <div class="control-group">
                             <div class="controls chzn-controls"></div>
                          </div>
                           <div class="form-actions">
                             <input type="Submit" name="enviar" value="Guardar" class="btn btn-success"></button>
                              <button type="button" name="reset" class="btn" onClick="setear_form(2,2)">Cancelar</button>
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
<script type="text/javascript" src="../js_mantenedores/validarut.js"></script>
<script type="text/javascript" src="../js_mantenedores/alertify.js"></script> 
<script type="text/javascript" src="../js_mantenedores/jquery.msgbox.min.js"></script>
    
   <script>
   var saber=0;
   var saberHistorico=0;
      jQuery(document).ready(function() { 
	     App.init();
		 fechaHoy() 
	   $("#form2").submit(function(e){ 
           RUT= $('#RUT').val()
		   CODIGO= $('#CODIGO').val()
		   NOMBRE= $('#NOMBRE').val()
           APELLIDO= $('#APELLIDO').val()
		   SEXO= $('#SEXO').val()
		   DIRECCION= $('#DIRECCION').val() 
		   TELEFONO= $('#TELEFONO').val()       
            e.preventDefault();//Detenemos submit
			if(saber==1){
            $.ajax({
                type: 'POST',
                url: 'guardar_trabajador.php',
                data: { RUT:RUT, CODIGO:CODIGO, NOMBRE: NOMBRE, APELLIDO:APELLIDO, SEXO:SEXO, DIRECCION:DIRECCION, TELEFONO:TELEFONO},
               success: function(data){
			   guardaHistorico();
			   if(data==""){
			        $.msgbox("Trabajador Agregado Exitosamente",{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});
			        setear_form(2,2);
			       }
			        else {$.msgbox("Error 1053, a ocurrido un error al momento de ingresar los datos, por favor verifique los datos ó comuniquese con el administrador del sistema.", {type: "error",buttons : [{type: "submit", value: "Aceptar"}]});}
                }
            });
		   }
		   else if(saber==2){
			    $.ajax({
                type: 'POST',
                url: 'actualizar_trabajador.php',
                data: { RUT:RUT, CODIGO:CODIGO, NOMBRE: NOMBRE, APELLIDO:APELLIDO, SEXO:SEXO, DIRECCION:DIRECCION, TELEFONO:TELEFONO},
               success: function(data){
			   if(saberHistorico==1){guardaHistorico();}else{editarHistorico();}
			   if(data==""){
			        $.msgbox("Trabajador Agregado Exitosamente",{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});
			        setear_form(2,2);
			       }
			        else {$.msgbox("Error 1053, a ocurrido un error al momento de ingresar los datos, por favor verifique los datos ó comuniquese con el administrador del sistema.", {type: "error",buttons : [{type: "submit", value: "Aceptar"}]});}
                }
            });
			   }
        });
      });
	  
	  function guardaHistorico(){
		   RUN= $('#RUT').val()
		   FECHA= $('#FECHA').val()
		   CARGO= document.form2.CODIGO.options[document.form2.CODIGO.selectedIndex].text;
		   $.ajax({
                type: 'POST',
                url: '../Historico_Trabajador/guardar_historico.php',
                data: { RUN:RUN, FECHA:FECHA, CARGO:CARGO}
		         });
		     }
			 
	   function editarHistorico(){
	          FECHA= $('#FECHA').val()
			  CODIGOHISTORICO= $("#CODIGOHISTORICO").val()
              $.ajax({
                type: 'POST',
                url: '../Historico_Trabajador/actualizar_historico.php',
                data: {CODIGOHISTORICO:CODIGOHISTORICO,FECHA:FECHA}
               });
	         }
		  
		function validar_trabajador(){
			rut=$('#RUT').val();
			if(Rut(rut)==true){
				 rut=$('#RUT').val();
				 buscarTrabajador(rut);
				}
			 else {
				    $.msgbox("El valor ingresado no corresponde a un R.U.N valido, Por favor vefique el R.U.N. ingresado",{buttons : [{type: "submit", value: "Aceptar"}]});
				   setear_form(2,1);
				 }
			 }
			 
			
		function buscarTrabajador(rut) {
                   $.getJSON("buscar_trabajador.php", {rut: rut}, function(data) { 
                    if(data==1){
					    setear_form(1,1);
						saber=1;
						}
					else if(data==2){
						   $.msgbox("El Trabajador se Encuentra Activo, Por Favor verifique la lista de Trabajadores",{buttons : [{type: "submit", value: "Aceptar"}]});
						   setear_form(2,1);
						   saber=0;
						}
					 else {recuperarTrabajador(rut,data);}
                })
               }
			   
		function recuperarTrabajador(id,numero) {
                   $.getJSON("obtTrabajador.php", {id_trabajador: id}, function(data) {
                    $("#RUT").val(data[0].RUT)
					cargo_recupera(data[0].CARGO);
                    $("#NOMBRE").val(data[0].NOMBRE)
					$("#APELLIDO").val(data[0].APELLIDO)
					$("#SEXO").val(data[0].SEXO)
                    $("#DIRECCION").val(data[0].DIRECCION)
					$("#TELEFONO").val(data[0].TELEFONO)
					$("#CODIGOHISTORICO").val(data[0].CODIGO)
					setear_form(1,0);
					saber=2;
                    if(numero==3){saberHistorico=1;}else{saberHistorico=2;}
                })
               }
			
			function cargo_recupera(cargo){
				  for(i=0;i<document.form2.CODIGO.length;i++){
					   if(document.form2.CODIGO.options[i].text==cargo){
						   x=document.form2.CODIGO.options[i].value;
						   document.form2.CODIGO.value=x;
						   }
					  }
				  }
			function setear_form(numero,limpiar){
				 
				 if(numero==1){
					document.getElementById('RUT').disabled = true;
					document.getElementById('CODIGO').disabled = false;
					document.getElementById('NOMBRE').disabled = false;
					document.getElementById('APELLIDO').disabled = false;
					document.getElementById('SEXO').disabled = false;
					document.getElementById('DIRECCION').disabled = false;
					document.getElementById('TELEFONO').disabled = false;
					document.getElementById('FECHA').disabled = false;
					 }
				   else if(numero==2){
					     document.getElementById('RUT').disabled = false;
					     document.getElementById('CODIGO').disabled = true;
				         document.getElementById('NOMBRE').disabled = true;
			   	         document.getElementById('APELLIDO').disabled = true;
				         document.getElementById('SEXO').disabled = true;
				         document.getElementById('DIRECCION').disabled = true;
				         document.getElementById('TELEFONO').disabled = true;
				         document.getElementById('FECHA').disabled = true;
					   }
				  if(limpiar==1){
					    $('#NOMBRE').val("");
				        $('#APELLIDO').val("");
				        $('#DIRECCION').val("");
				        $('#TELEFONO').val("");
				        $('#FECHA').val("");
				        $('#SEXO').val("Hombre");
				        x=document.form2.CODIGO.options[0].value;
				        document.form2.CODIGO.value=x;
					  } else if(limpiar==2){
						  $('#RUT').val("");
						  $('#NOMBRE').val("");
						  $('#APELLIDO').val("");
				          $('#DIRECCION').val("");
				          $('#TELEFONO').val("");
						  $('#FECHA').val("");
						  $('#SEXO').val("Hombre");
						  x=document.form2.CODIGO.options[0].value;
				          document.form2.CODIGO.value=x;
						  }
				
				}
		function fechaHoy(){
			 fecha=new Date();
			 hoy= fecha.getFullYear()+"-"+(fecha.getMonth()+1)+"-"+fecha.getDate();
			 document.getElementById('FECHA').max=hoy;
			}
		
	  
   </script> 
        
</body>
</html>