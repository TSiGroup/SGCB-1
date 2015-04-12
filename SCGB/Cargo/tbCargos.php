<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT CODIGOCARGO,C_NOMBRE,C_DESCRIPCION FROM  CARGO WHERE C_ESTADO=1");

?>
 <!--ACA VA EL ESTILO DE LA  TABLA<link rel="stylesheet" href="../Templates/css/layout.css" type="text/css" media="screen" /> --> 
   
<script>
    $("#tablaCargo").dataTable({
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

<table id='tablaCargo' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>Nombre</th>
            <th>Descripcion</th>
            <th style="width:100px;">Modificar</th>
            <th style="width:100px;">Eliminar</th>
           
        </tr>
    </thead>
    <tbody>
          <?php while($row = $cn->getRespuesta($res)){ ?>
        <tr>
            <td><?php echo $row['C_NOMBRE']; ?></td>
            <td><?php echo $row['C_DESCRIPCION']; ?></td>
            
            <td align="center">
                <a href="javascript:editarCargo('<?php echo $row['CODIGOCARGO']; ?>')"><img src="../Imagenes/Edit_Male_User_Icon_32.png" style="vertica-align: middle;" /> </a>
    
            </td>
            
            <td align="center">
                <a href="javascript:eliminarCargo('<?php echo $row['CODIGOCARGO']; ?>','<?php echo $row['C_NOMBRE']; ?>')"><img src="../Imagenes/Remove_Male_User_Icon_32.png" style="vertica-align: middle;" /> </a>
    
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>