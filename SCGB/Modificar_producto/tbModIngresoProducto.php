<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("select ip.NUMEROFACTURA, ip.IP_TOTALFACTURA, ip.IP_FECHA, SUM(ip.IP_CANTIDAD)as CANTIDAD, pd.PD_NOMBRE, pd.RUT from INGRESO_PRODUCTO ip,PROVEEDOR pd where ip.RUT=pd.RUT  group by ip.NUMEROFACTURA");
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
            <th>Numero Factura</th>
            <th>Proveedor</th>
            <th>Cantidad de Productos</th>
            <th>Precio Total</th>
            <th>Fecha</th>
            <th style="width:100px;">Modificar</th>
            <th style="width:100px;">Eliminar</th>
           
        </tr>
    </thead>
    <tbody>
          <?php while($row = $cn->getRespuesta($res)){ ?>
        <tr>
            <td><?php echo $row['NUMEROFACTURA']; ?></td>
            <td><?php echo $row['PD_NOMBRE']; ?></td>
            <td><?php echo $row['CANTIDAD']; ?></td>
            <td><?php echo $row['IP_TOTALFACTURA']; ?></td>
            <td><?php echo $row['IP_FECHA']; ?></td>
            
            <td align="center">
                <a href="edit_ingresoProducto.php?id=<?php echo $row['NUMEROFACTURA']; ?>&fecha=<?php echo $row['IP_FECHA']; ?>&total=<?php echo $row['IP_TOTALFACTURA']; ?>&rut=<?php echo $row['RUT']; ?>"><img src="../Imagenes/1387773367_tests.png" style="vertica-align: middle;" /> </a>
            </td>
            
            <td align="center">
                <a href="javascript:eliminarStock('<?php echo $row['NUMEROFACTURA']; ?>')"><img src="../Imagenes/1387773683_document_delete.png" style="vertica-align: middle;" /> </a>
    
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>