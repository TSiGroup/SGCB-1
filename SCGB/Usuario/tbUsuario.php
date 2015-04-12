<?php
include '../Conexion.php';
$cn = new Conexion();
$cn->Conectar();
$res = $cn->Consulta("SELECT u.U_LOGIN,u.U_NOMBRE,u.U_APELLIDO,u.U_TELEFONO,u.U_EMAIL,p.PROVEEDOR,p.PRODUCTO,p.PERSONAL,p.OBRA,P.BODEGA,P.INFORMEYGRAFICO,P.ADMINISTRACION FROM USUARIO u, PERMISO p WHERE u.CODIGOPERMISO=p.CODIGOPERMISO and u.u_ESTADO=1");

?>
 <!--ACA VA EL ESTILO DE LA  TABLA<link rel="stylesheet" href="../Templates/css/layout.css" type="text/css" media="screen" /> --> 
   
<script>
    $("#tablaUsuario").dataTable({
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

<table id='tablaUsuario' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>Login</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Proveedor</th>
            <th>Producto</th>
            <th>Personal</th>
            <th>Obra</th>
            <th>Bodega</th>
            <th>Informes y Graficos</th>
            <th>Administracion</th>
            <th style="width:100px;">Modificar</th>
            <th style="width:100px;">Eliminar</th>
           
        </tr>
    </thead>
    <tbody>
          <?php while($row = $cn->getRespuesta($res)){ ?>
        <tr>
            <td><?php echo $row['U_LOGIN']; ?></td>
            <td><?php echo $row['U_NOMBRE']; ?></td>
            <td><?php echo $row['U_APELLIDO']; ?></td>
            <td><?php echo $row['U_TELEFONO']; ?></td>
            <td><?php echo $row['U_EMAIL']; ?></td>
            <td><?php if($row['PROVEEDOR']==1){echo "SI";}else{echo "NO";}?></td>
            <td><?php if($row['PRODUCTO']==1){echo "SI";}else{echo "NO";}?></td>
            <td><?php if($row['PERSONAL']==1){echo "SI";}else{echo "NO";}?></td>
            <td><?php if($row['OBRA']==1){echo "SI";}else{echo "NO";}?></td>
            <td><?php if($row['BODEGA']==1){echo "SI";}else{echo "NO";}?></td>
            <td><?php if($row['INFORMEYGRAFICO']==1){echo "SI";}else{echo "NO";}?></td>
            <td><?php if($row['ADMINISTRACION']==1){echo "SI";}else{echo "NO";}?></td>
            
            
            <td align="center">
                <a href="javascript:editarUsuario('<?php echo $row['U_LOGIN']; ?>')"><img src="../Imagenes/editarUsuario.png" style="vertica-align: middle;" /> </a>
            </td>
            <td align="center">
                <a href="javascript:eliminarUsuario('<?php echo $row['U_LOGIN']; ?>','<?php echo $row['U_NOMBRE']." ".$row['U_APELLIDO']; ?>')"><img src="../Imagenes/eliminarUsuario.png" style="vertica-align: middle;" /> </a>
            </td>
   
        </tr>
        <?php } ?>
    </tbody>
</table>