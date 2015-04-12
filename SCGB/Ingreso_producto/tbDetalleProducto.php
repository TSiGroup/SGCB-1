<script>
  $('#tbDetalle').dataTable( {
	           "iDisplayLength": 100,
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
				},
                "bPaginate": false,
		        "bLengthChange": false,
		        "bFilter": false,
		        "bSort": false,
		        "bInfo": false,
		        "bAutoWidth": false } );
</script>

<table id='tbDetalle' class="table table-striped table-hover">
 <thead>
      <tr >
           <th>Codigo Producto</th>
           <th>Nombre</th>
           <th>Marca</th>
           <th>Modelo</th>
           <th>Observación</th>
           <th>Descripción</th>
           <th>Cantidad</th>
           <th>Precio Unitario</th>
           <th>Precio Total</th>
      </tr>
  </thead>
    <tbody>
    </tbody>
</table>