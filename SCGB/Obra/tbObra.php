<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT CODIGOOBRA,O_NOMBRE,O_FECHAINICIO FROM  OBRA WHERE O_ESTADO='1'");

?>
 <!--ACA VA EL ESTILO DE LA  TABLA<link rel="stylesheet" href="../Templates/css/layout.css" type="text/css" media="screen" /> --> 
   
<script>
    $("#tablaObra").dataTable({
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

<table id='tablaObra' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>Nombre</th>
            <th>Fecha de Inicio</th>
            <th style="width:100px;">Modificar</th>
            <th style="width:100px;">Eliminar</th>
           
        </tr>
    </thead>
    <tbody>
          <?php while($row = $cn->getRespuesta($res)){ ?>
        <tr>
            <td><?php echo $row['O_NOMBRE']; ?></td>
            <td><?php echo $row['O_FECHAINICIO']; ?></td>
            
            <td align="center">
                <a href="javascript:editarObra('<?php echo $row['CODIGOOBRA']; ?>')"><img src="../Imagenes/editarObra.png" style="vertica-align: middle;" /> </a>
            </td>
            <td align="center">
                <a href="javascript:eliminarObra('<?php echo $row['CODIGOOBRA']; ?>')"><img src="../Imagenes/eliminarObra_opt.png" style="vertica-align: middle;" /> </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>