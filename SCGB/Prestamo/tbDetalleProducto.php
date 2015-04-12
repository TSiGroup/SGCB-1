<script>
  $("#tbDetalle").dataTable({
	     "iDisplayLength": 1000,
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
         "bAutoWidth": true,
		 "fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
            var iTotalMarket = 0;
            for ( var i=0 ; i<aaData.length ; i++ )
            {
                iTotalMarket += aaData[i][6]*1;
            }
            var nCells = nRow.getElementsByTagName('th');
            nCells[1].innerHTML = parseInt(iTotalMarket);
        }
		  
		  
		  });
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
      </tr>
  </thead>
    <tbody>
    </tbody>
    <tfoot>
		<tr>
			<th style="text-align:right" colspan="6">Total:</th>
			<th></th>
		</tr>
	</tfoot>
</table>