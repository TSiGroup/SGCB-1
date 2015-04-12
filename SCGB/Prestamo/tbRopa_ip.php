<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO,pu.CODIGOUNITARIO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,p.P_IDENTIFICADOR,r.R_TALLA,r.R_COLOR,r.R_MATERIAL FROM PRODUCTO p,PRODUCTO_UNITARIO pu,ROPA r WHERE p.CODIGOPRODUCTO=pu.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=r.CODIGOPRODUCTO AND P_IDENTIFICADOR='R' AND p.P_ESTADO=1 AND pu.PU_ESTADO=1");
?>
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
            <th>Codigo Producto Unitario</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Observación</th>
            <th>Talla</th>
            <th>Color</th>
            <th>Material</th>
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
            <td><?php echo $row['R_TALLA']; ?></td>
            <td><?php echo $row['R_COLOR']; ?></td>
            <td><?php echo $row['R_MATERIAL']; ?></td>
            <td style="width:100px;"><input name="Check" value="<?php echo $row['CODIGOPRODUCTO']; ?>**&**<?php echo $row['CODIGOUNITARIO']; ?>**&**<?php echo $row['P_NOMBRE']; ?>**&**<?php echo $row['P_MARCA']; ?>**&**<?php echo $row['P_MODELO']; ?>**&**<?php echo $row['P_OBSERVACION']; ?>**&**<?php echo "Talla:".$row['R_TALLA']." Color:".$row['R_COLOR']." Material:".$row['R_MATERIAL'];?>**&**<?php echo $row['P_IDENTIFICADOR']; ?>" type="checkbox" /></td>
        </tr>
        <?php } ?>
    </tbody>
</table>