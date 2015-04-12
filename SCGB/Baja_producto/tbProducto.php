<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$cn3 = new Conexion();
$cn->Conectar();
$cn2->Conectar();
$cn3->Conectar();
$obtiene = array();
$guarda1 = array();
$COMPARA="";
$res = $cn->Consulta("SELECT pu.CODIGOPRODUCTO FROM PRODUCTO p,PRODUCTO_UNITARIO pu WHERE pu.PU_ESTADO=1 AND p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND p.P_ESTADO=1");
while($row = $cn->getRespuesta($res)){
	
	array_push($obtiene, $row['CODIGOPRODUCTO']);
	}
$i = 0;
while ($i < count($obtiene)) {
    $consulta=$obtiene[$i];
	
	$res2 = $cn2->Consulta("SELECT P_IDENTIFICADOR FROM PRODUCTO WHERE CODIGOPRODUCTO='$consulta'");
	while($row2 = $cn2->getRespuesta($res2)){
    $IDENTIFICADOR=$row2['P_IDENTIFICADOR'];
	
	if($COMPARA!==$consulta){
    $COMPARA=$consulta;
	if($IDENTIFICADOR=="H"){
		 $res3 = $cn3->Consulta("
SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,h.H_TIPOHERRAMIENTA,h.H_FRECUENCIA,h.H_POTENCIAMAXIMA FROM PRODUCTO p,HERRAMIENTA h WHERE p.CODIGOPRODUCTO=h.CODIGOPRODUCTO AND p.CODIGOPRODUCTO='$consulta'"); 
		 while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Tipo:".$row3['H_TIPOHERRAMIENTA']." Frecuencia:".$row3['H_FRECUENCIA']." PotenciaMax:".$row3['H_POTENCIAMAXIMA']);
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			 } 
		}
	   else{
		     $res3 = $cn3->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,p.P_IDENTIFICADOR,v.V_PERMISO,v.V_YEAR,v.V_CONDICION,v.V_PATENTE FROM VEHICULO v,PRODUCTO p WHERE p.CODIGOPRODUCTO=v.CODIGOPRODUCTO  AND p.CODIGOPRODUCTO='$consulta'"); 
		      while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Condición:".$row3['V_CONDICION']." FechaPermisoCirculación:".$row3['V_PERMISO']." Año:".$row3['V_YEAR']);
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			 }
			
	       }
		}
	
	
	}
	$i++; 
}
?>

<script>
    $("#tablaDetallePrestamo").dataTable({
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



<table id='tablaDetallePrestamo' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>Codigo Producto</th>
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
            <td style="width:100px;">
                <a href="detalle_bajaProducto.php?id=<?php echo $guarda1[$j]; $j++;?>"><img src="../Imagenes/1401242874_Trash_empty.png" style="vertica-align: middle;" /> </a>
            </td>
            <?php } ?>
        </tr>
       
    </tbody>
</table>
