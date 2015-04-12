<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$cn3 = new Conexion();
$cn->Conectar();
$cn2->Conectar();
$cn3->Conectar();
$obtiene = array();
$obtiene2 = array();
$guarda1 = array();
$guarda2 = array();
$res = $cn->Consulta("SELECT pu.CODIGOPRODUCTO,pu.CODIGOUNITARIO,m.M_FECHAINICIO,DATEDIFF(NOW(),m.M_FECHAINICIO) as DIAS,m.M_DESCRIPCION,m.M_RESPONSABLE,m.M_USUARIOENVIO FROM PRODUCTO_UNITARIO pu,MANTENCION m WHERE pu.PU_ESTADO=4 AND pu.CODIGOPRODUCTO=m.CODIGOPRODUCTO AND pu.CODIGOUNITARIO=m.CODIGOUNITARIO");
while($row = $cn->getRespuesta($res)){
	array_push($obtiene, $row['CODIGOPRODUCTO']);
	array_push($obtiene2, $row['CODIGOUNITARIO']);
	array_push($guarda2, $row['M_FECHAINICIO']);
	array_push($guarda2, $row['DIAS']);
	array_push($guarda2, $row['M_DESCRIPCION']);
	array_push($guarda2, $row['M_RESPONSABLE']);
	array_push($guarda2, $row['M_USUARIOENVIO']);
	}
$i = 0;
$x = 0;
while ($i < count($obtiene)) {
    $consulta=$obtiene[$i];
	$res2 = $cn2->Consulta("SELECT P_IDENTIFICADOR FROM PRODUCTO WHERE CODIGOPRODUCTO='$consulta'");
	while($row2 = $cn2->getRespuesta($res2)){
    $IDENTIFICADOR=$row2['P_IDENTIFICADOR'];

	if($IDENTIFICADOR=="H"){
		 $res3 = $cn3->Consulta("
SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,h.H_TIPOHERRAMIENTA,h.H_FRECUENCIA,h.H_POTENCIAMAXIMA FROM PRODUCTO p,HERRAMIENTA h WHERE p.CODIGOPRODUCTO=h.CODIGOPRODUCTO AND p.CODIGOPRODUCTO='$consulta'"); 
		 while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $obtiene2[$i]);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Tipo:".$row3['H_TIPOHERRAMIENTA']." Frecuencia:".$row3['H_FRECUENCIA']." PotenciaMax:".$row3['H_POTENCIAMAXIMA']);
			   array_push($guarda1, $guarda2[$x]);
			   $x++;
			   array_push($guarda1, $guarda2[$x]);
			   $x++;
			   array_push($guarda1, $guarda2[$x]);
			   $x++;
			   array_push($guarda1, $guarda2[$x]);
			   $x++;
			   array_push($guarda1, $guarda2[$x]);
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			 } 
		}
	   else if($IDENTIFICADOR=="V"){
		     $res3 = $cn3->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,p.P_IDENTIFICADOR,v.V_PERMISO,v.V_YEAR,v.V_CONDICION,v.V_PATENTE FROM VEHICULO v,PRODUCTO p WHERE p.CODIGOPRODUCTO=v.CODIGOPRODUCTO  AND p.CODIGOPRODUCTO='$consulta'"); 
		      while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $obtiene2[$i]);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Condición:".$row3['V_CONDICION']." FechaPermisoCirculación:".$row3['V_PERMISO']." Año:".$row3['V_YEAR']);
			   array_push($guarda1, $guarda2[$x]);
			   $x++;
			   array_push($guarda1, $guarda2[$x]);
			   $x++;
			   array_push($guarda1, $guarda2[$x]);
			   $x++;
			   array_push($guarda1, $guarda2[$x]);
			   $x++;
			   array_push($guarda1, $guarda2[$x]);
			   $x++;
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			 }
	       }
		
		}
	$i++;
	$x++; 
}
?>

 <!--ACA VA EL ESTILO DE LA  TABLA<link rel="stylesheet" href="../Templates/css/layout.css" type="text/css" media="screen" /> --> 
   
<script>
    $("#tablaRopa").dataTable({
            "oLanguage": {
                
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    }
				}
        });
</script>

<table id='tablaRopa' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>Codigo Producto</th>
            <th>Codigo Unitario</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Observación</th>
            <th>Descripción</th>
            <th>Fecha Envio</th>
            <th>Dias en Mantención</th>
            <th>Motivo</th>
            <th>Responsable</th>
            <th>Enviado Por</th>
            <th>Retirar de Mantención</th>
     
        </tr>
    </thead>
    <tbody>
          <?php $j=0;$z=0; while($j < count($guarda1)){ ?>
        <tr>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
           
            
            <td align="center">
                <a href="javascript:eliminarMantencion('<?php echo $guarda1[$j]."**&**".$obtiene2[$z]; $j++;$z++; ?>')"><img src="../Imagenes/Edit_Male_User_Icon_32.png" style="vertica-align: middle;" /> </a>
            </td>
            
   
        </tr>
        <?php } ?>
    </tbody>
</table>