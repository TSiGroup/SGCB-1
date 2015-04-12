<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT pt.CODIGOPRESTAMO,o.O_NOMBRE,t.RUN,t.T_NOMBRE,t.T_APELLIDO,pt.PT_FECHA,pt.PT_TOTALPRODUCTO,pt.PT_COMENTARIO FROM PRESTAMO pt,TRABAJADOR t,OBRA o WHERE pt.RUN=t.RUN AND pt.CODIGOOBRA=o.CODIGOOBRA AND pt.PT_ESTADO='1'");
?>

 <!--FIn de la llamada PHP --> 
   
<script>
    $("#tablaIngreso").dataTable({
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

<table id='tablaIngreso' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>Codigo Prestamo</th>
            <th>Obra</th>
            <th>RUN</th>
            <th>Trabajador</th>
            <th>Fecha</th>
            <th>Total Producto</th>
            <th>Comentario</th>
            <th style="width:100px;">Devolver</th>
           
        </tr>
    </thead>
    <tbody>
          <?php while($row = $cn->getRespuesta($res)){ ?>
        <tr>
            <td><?php echo $row['CODIGOPRESTAMO']; ?></td>
            <td><?php echo $row['O_NOMBRE']; ?></td>
            <td><?php echo $row['RUN']; ?></td>
            <td><?php echo $row['T_NOMBRE']." ".$row['T_APELLIDO']; ?></td>
            <td><?php echo $row['PT_FECHA']; ?></td>
            <td><?php echo $row['PT_TOTALPRODUCTO']; ?></td>
            <td><?php echo $row['PT_COMENTARIO']; ?></td>
            
            <td align="center">
                <a href="devolver_producto.php?id=<?php echo $row['CODIGOPRESTAMO']; ?>"><img src="../Imagenes/1390287501_Todo_opt.png" style="vertica-align: middle;" /> </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>