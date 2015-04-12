<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$cn->Conectar();
$cn2->Conectar();
$id= $_GET['id'];
$obtiene = array();
$guarda1 = array();
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO,pu.CODIGOUNITARIO FROM PRODUCTO p,PRODUCTO_UNITARIO pu WHERE p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND pu.PU_ESTADO=1 AND pu.CODIGOPRODUCTO='$id'");
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
SELECT p.CODIGOPRODUCTO,pu.CODIGOUNITARIO,ep.CODIGOESTADO,ep.EP_ESTADOPRODUCTO,ep.EP_OBSERVACION FROM PRODUCTO p,PRODUCTO_UNITARIO pu,ESTADO_PRODUCTO ep WHERE p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=ep.CODIGOPRODUCTO AND pu.CODIGOUNITARIO=ep.CODIGOUNITARIO AND p.CODIGOPRODUCTO='$consulta' AND pu.CODIGOUNITARIO=$consulta2 AND ep.EP_FECHA=(select max(ep.EP_FECHA) FROM PRODUCTO p,PRODUCTO_UNITARIO pu,ESTADO_PRODUCTO ep WHERE p.CODIGOPRODUCTO='$consulta' AND pu.CODIGOUNITARIO=$consulta2 AND p.CODIGOPRODUCTO=ep.CODIGOPRODUCTO AND pu.CODIGOUNITARIO=ep.CODIGOUNITARIO ) "); 
        
		 while($row2 = $cn2->getRespuesta($res2)){
			   array_push($guarda1, $row2['CODIGOPRODUCTO']);
			   array_push($guarda1, $row2['CODIGOUNITARIO']);
			   array_push($guarda1, $row2['CODIGOESTADO']);
			   array_push($guarda1, $row2['EP_ESTADOPRODUCTO']);
			   array_push($guarda1, $row2['EP_OBSERVACION']);
			   array_push($guarda1, $row2['CODIGOPRODUCTO']);
			   array_push($guarda1, $row2['CODIGOUNITARIO']);
			   
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
            <th>Codigo Producto Unitario</th>
            <th>Codigo Estado</th>
            <th>Estado Producto</th>
            <th>Observacion</th>
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
             
            <td style="width:100px;"><input name="CheckHerramienta" value="<?php echo $guarda1[$j]; $j++;?>***&&***<?php echo $guarda1[$j]; $j++; ?>" type="checkbox" /></td>
            <?php } ?>
        </tr>
       
    </tbody>
</table>
