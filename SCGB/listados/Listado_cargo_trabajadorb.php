    <? 
	ob_start();
include ("../include/conectar.php");
$CODIGO= $_SESSION["PERMISO"];

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
  <title>Berau veritas|Cesmec</title>
  <link rel="shortcut icon" href="../favicon.ico">
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   
   <!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
     <div class="navbar-inner">
       <div class="container-fluid"> 
           
       </div>
     </div>
   </div>
   
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      
<!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
<div id="body">
         <!-- BEGIN SAMPLE widget CONFIGURATION MODAL FORM-->
        
         <!-- END SAMPLE widget CONFIGURATION MODAL FORM-->
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->      
            <div class="row-fluid hidden-print">
               
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div id="page">
               <div class="invoice">
                     <div class="row-fluid invoice-logo">
                        <div class="span2 invoice-logo-space"><img src="../assets/img/logo.png"alt="" width="373" height="109" /> </div>
                         <div class="span10">
                           <p>
                          <script languaje="JavaScript">
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)



year+=1900



var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var dayarray=new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado")
var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")
document.write("<span class='class8' id=fecha>"+dayarray[day]+" "+daym+" de "+montharray[month]+" de "+year+"</span>")
</script>
                          <span class="span2 muted">
                          <h1>Listado trabajadores por cargo </h1> 
                          </span></p>
                        </div>
                     </div>
					 
                              
                                
              <?
  	
	$sql1 = "SELECT distinct (c.C_NOMBRE),c.C_DESCRIPCION,c.CODIGOCARGO FROM cargo c INNER JOIN trabajador t
ON  t.CODIGOCARGO=c.CODIGOCARGO and c.C_ESTADO=1";
	conectar();
	$rss=mysql_query($sql1,$conexion);	
	while ($row1=mysql_fetch_array($rss)){
	
	  
  ?>                 
             <div class="row-fluid">
			 
                        <div class="span12">
                           <h4>Cargo:<?=$row1["C_NOMBRE"];?>  </h4>
                           <ul class="unstyled">
                              <li>Descripcion:<?=$row1["C_DESCRIPCION"];?></li>
                              <li></li>
                           </ul>
                        </div>
					 
                     <div class="row-fluid">
                        <table class="table table-advance tabs-stacked">
                           <thead>
                              <tr class="table-condensed">
                                 <th class="span4">Rut</th>
                                 <th class="span4">Nombre</th>
                                 <th class="span4">Telefono</th>
                                 <th class="span4">Direccion</th>
                                 <th class="span4">Sexo</th>
                                
                              </tr>
                           </thead>
                           <tbody>
						   <?
  	$codigo=$row1["CODIGOCARGO"];
	$sql = "SELECT t.RUN , CONCAT( t.T_NOMBRE,' ' , t.T_APELLIDO ) AS nombre,  t.T_SEXO,T_DIRECCION,t.T_TELEFONO
FROM trabajador t , cargo c
where t.CODIGOCARGO=c.CODIGOCARGO and T_ESTADO=1 and c.CODIGOCARGO=$codigo
";
	conectar();
	$rs=mysql_query($sql,$conexion);	
	while ($row=mysql_fetch_array($rs)){
	
	  
  ?>
                              <tr>
                                 <td><?=$row["RUN"];?></td>
                                 <td><?=$row["nombre"];?> </td>
                                 <td ><?=$row["T_TELEFONO"];?></td>
								 
                                 <td ><?=$row["T_DIRECCION"];?></td>
                                 <td ><?=$row["T_SEXO"];?></td>
                                 
                              </tr>
                              <? } ?>
                           </tbody>
                        </table>
						
                     </div>
					 <? } ?>
                     <div class="row-fluid">
                       <div class="span4"></div>
                        <div class="span8 invoice-block">
                          
                           <br />
                           
                           
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
   <!-- BEGIN FOOTER --><!-- END FOOTER -->
   <!-- BEGIN CORE PLUGINS -->
   <script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>   
   <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->  
   <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
   <script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <!--[if lt IE 9]>
   <script src="assets/plugins/excanvas.js"></script>
   <script src="assets/plugins/respond.js"></script>  
   <![endif]-->   
   <script src="../assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>  
   <!-- IMPORTANT! jquery.slimscroll.min.js depends on jquery-ui-1.10.1.custom.min.js --> 
   <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="../assets/plugins/jquery.blockui.js" type="text/javascript"></script>  
   <script src="../assets/plugins/jquery.cookie.js" type="text/javascript"></script>
   <script src="../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script> 
   <!-- END CORE PLUGINS -->
   <!-- BEGIN PAGE LEVEL PLUGINS -->
   <script type="text/javascript" src="../assets/plugins/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="../assets/scripts/app.js"></script> 
   <script>
      jQuery(document).ready(function() {       
         App.init();
      });
   </script>
 <?
require_once("dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "ejemplo".time().'.pdf';
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
 ?>
</body>
</html>
