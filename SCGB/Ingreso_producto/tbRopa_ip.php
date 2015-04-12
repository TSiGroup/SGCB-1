<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,i.R_TALLA,i.R_COLOR,i.R_MATERIAL FROM ROPA i,PRODUCTO p  WHERE p.CODIGOPRODUCTO=i.CODIGOPRODUCTO and p.P_ESTADO=1");
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
            <td><?php echo $row['P_NOMBRE']; ?></td>
            <td><?php echo $row['P_MARCA']; ?></td>
            <td><?php echo $row['P_MODELO']; ?></td>
            <td><?php echo $row['P_OBSERVACION']; ?></td>
            <td><?php echo $row['R_TALLA']; ?></td>
            <td><?php echo $row['R_COLOR']; ?></td>
            <td><?php echo $row['R_MATERIAL']; ?></td>
            <td style="width:100px;"><input name="CheckHerramienta" value="<?php echo $row['CODIGOPRODUCTO']; ?>***&&***<?php echo $row['P_NOMBRE']; ?>***&&***<?php echo $row['P_MARCA']; ?>***&&***<?php echo $row['P_MODELO']; ?>***&&***<?php echo $row['P_OBSERVACION']; ?>***&&***<?php echo "Talla:".$row['R_TALLA']." Color:".$row['R_COLOR']." Material:".$row['R_MATERIAL'];?>" type="checkbox" /></td>
        </tr>
        <?php } ?>
    </tbody>
</table>