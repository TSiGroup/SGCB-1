<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT MAX(ht.CODIGOHISTORICOTRABAJADOR) AS CODIGO,t.RUN,c.C_NOMBRE,t.T_NOMBRE,t.T_APELLIDO,t.T_SEXO,t.T_DIRECCION,t.T_TELEFONO,
MAX(ht.HT_FECHAINICIO) AS FECHA FROM CARGO c, TRABAJADOR t,HISTORICO_TRABAJADOR ht WHERE c.CODIGOCARGO=t.CODIGOCARGO AND t.RUN=ht.RUN AND t.T_ESTADO=1 GROUP BY t.RUN");
?>

<script>
    $("#tablaTrabajador").dataTable({
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

<table id='tablaTrabajador' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>RUN</th>
            <th>Cargo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Sexo</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Fecha Contrato</th>
            <th style="width:100px;">Terminar Contrato</th>
           
        </tr>
    </thead>
    <tbody>
          <?php while($row = $cn->getRespuesta($res)){ ?>
        <tr>
            <td><?php echo $row['RUN']; ?></td>
            <td><?php echo $row['C_NOMBRE']; ?></td>
            <td><?php echo $row['T_NOMBRE']; ?></td>
            <td><?php echo $row['T_APELLIDO']; ?></td>
            <td><?php echo $row['T_SEXO']; ?></td>
            <td><?php echo $row['T_DIRECCION']; ?></td>
            <td><?php echo $row['T_TELEFONO']; ?></td>
            <td><?php echo $row['FECHA']; ?></td>
            
            <td align="center">
                <a href="javascript:terminarContrato('<?php echo $row['RUN']; ?>')"><img src="../Imagenes/1390230355_Register_opt.png" style="vertica-align: middle;" /> </a>
            </td>
   
        </tr>
        <?php } ?>
    </tbody>
</table>