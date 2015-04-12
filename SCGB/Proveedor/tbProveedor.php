<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT RUT,PD_NOMBRE,PD_DIRECCION,PD_TELEFONO,PD_EMAIL FROM  proveedor WHERE PD_ESTADO=1");

?>
 <!--ACA VA EL ESTILO DE LA  TABLA<link rel="stylesheet" href="../Templates/css/layout.css" type="text/css" media="screen" /> --> 
   
<script>
    $("#tablaProveedor").dataTable({
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

<table id='tablaProveedor' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>RUT</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Email</th>
            <th style="width:100px;">Accion</th>
            <th style="width:100px;">Accion</th>
           
        </tr>
    </thead>
    <tbody>
          <?php while($row = $cn->getRespuesta($res)){ ?>
        <tr>
            <td><?php echo $row['RUT']; ?></td>
            <td><?php echo $row['PD_NOMBRE']; ?></td>
            <td><?php echo $row['PD_DIRECCION']; ?></td>
            <td><?php echo $row['PD_TELEFONO']; ?></td>
            <td><?php echo $row['PD_EMAIL']; ?></td>
            
            <td align="center">
                <a href="javascript:editarProveedor('<?php echo $row['RUT']; ?>')"><img src="../Imagenes/Edit_Male_User_Icon_32.png" style="vertica-align: middle;" /> </a>
            </td>
            <td align="center">
                <a href="javascript:eliminarProveedor('<?php echo $row['RUT']; ?>','<?php echo $row['PD_NOMBRE']; ?>')"><img src="../Imagenes/Remove_Male_User_Icon_32.png" style="vertica-align: middle;" /> </a>
            </td>
   
        </tr>
        <?php } ?>
    </tbody>
</table>