<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO,pu.CODIGOUNITARIO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,p.P_IDENTIFICADOR,i.I_MEDIDA,i.I_TIPOMEDIDA,i.I_TIPOUNIDAD,i.I_CANTIDAD FROM PRODUCTO p,PRODUCTO_UNITARIO pu,INSUMO i WHERE p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=i.CODIGOPRODUCTO AND P_IDENTIFICADOR='I' AND p.P_ESTADO=1 AND pu.PU_ESTADO=1");
?>
   
<script>
    $("#tablaInsumo").dataTable({
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

<table id='tablaInsumo' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>Codigo Producto</th>
            <th>Codigo Producto Unitario</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Observación</th>
            <th>Medida</th>
            <th>Tipo Medida</th>
            <th>Tipo de Unidad</th>
            <th>Cantidad</th>
            <th>Seleccionar</th>
        </tr>
    </thead>
    <tbody>
          <?php while($row = $cn->getRespuesta($res)){ ?>
        <tr>
            <td><?php echo $row['CODIGOPRODUCTO']; ?></td>
            <td><?php echo $row['CODIGOUNITARIO']; ?></td>
            <td><?php echo $row['P_NOMBRE']; ?></td>
            <td><?php echo $row['P_MARCA']; ?></td>
            <td><?php echo $row['P_MODELO']; ?></td>
            <td><?php echo $row['P_OBSERVACION']; ?></td>
            <td><?php echo $row['I_MEDIDA']; ?></td>
            <td><?php echo $row['I_TIPOMEDIDA']; ?></td>
            <td><?php echo $row['I_TIPOUNIDAD']; ?></td>
            <td><?php echo $row['I_CANTIDAD']; ?></td>
            <td style="width:100px;"><input name="Check" value="<?php echo $row['CODIGOPRODUCTO']; ?>**&**<?php echo $row['CODIGOUNITARIO']; ?>**&**<?php echo $row['P_NOMBRE']; ?>**&**<?php echo $row['P_MARCA']; ?>**&**<?php echo $row['P_MODELO']; ?>**&**<?php echo $row['P_OBSERVACION']; ?>**&**<?php echo "Medida:".$row['I_MEDIDA']." TipoMedida:".$row['I_TIPOMEDIDA']." TipoUnidad:".$row['I_TIPOUNIDAD']." Cantidad:".$row['I_CANTIDAD'];?>**&**<?php echo $row['P_IDENTIFICADOR']; ?>" type="checkbox" /></td>
        </tr>
        <?php } ?>
    </tbody>
</table>