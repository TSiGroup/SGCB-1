<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,v.V_PERMISO,v.V_YEAR,v.V_CONDICION,s.S_CANTIDAD,s.S_CANTIDADMINIMA FROM VEHICULO v,PRODUCTO p,STOCK s WHERE p.CODIGOPRODUCTO=v.CODIGOPRODUCTO AND p.CODIGOPRODUCTO=s.CODIGOPRODUCTO AND p.P_ESTADO=1");

?>
 <!--ACA VA EL ESTILO DE LA  TABLA<link rel="stylesheet" href="../Templates/css/layout.css" type="text/css" media="screen" /> --> 
   
<script>
    $("#tablaVehiculoParticular").dataTable({
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

<table id='tablaVehiculoParticular' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>Codigo</th>
            <th>Tipo de Vehiculo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Observación</th>
            <th>Condición</th>
            <th>Permiso de Circulación</th>
            <th>Año</th>
            <th>Cantidad</th>
            <th>Cantidad Minima</th>
            <th style="width:100px;">Editar</th>
            <th style="width:100px;">Eliminar</th>
           
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
            <td><?php echo $row['V_CONDICION']; ?></td>
            <td><?php echo $row['V_PERMISO']; ?></td>
            <td><?php echo $row['V_YEAR']; ?></td>
            <td><?php echo $row['S_CANTIDAD']; ?></td>
            <td><?php echo $row['S_CANTIDADMINIMA']; ?></td>
            
            <td align="center">
                <a href="javascript:editarVehiculo('<?php echo $row['CODIGOPRODUCTO']; ?>')"><img src="../Imagenes/Edit_Male_User_Icon_32.png" style="vertica-align: middle;" /> </a>
            </td>
            <td align="center">
                <a href="javascript:eliminarVehiculo('<?php echo $row['CODIGOPRODUCTO']; ?>')"><img src="../Imagenes/Remove_Male_User_Icon_32.png" style="vertica-align: middle;" /> </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>