var Componente = function () {

    var Select2 = function () {

         $('#select2_run').select2({
            placeholder: "Seleccione un Trabajador",
            allowClear: true,
			formatNoMatches: function(term) { return " Trabajador no encontrado";}
			
        });	
		
		 $('#select2_obra').select2({
            placeholder: "Seleccione una Obra",
            allowClear: true,
			formatNoMatches: function(term) { return " Obra no encontrado";}
        });		
	}
	
	var Tab = function () {

        $("#tab").load("tab.php");
		$("#tbDetalleProducto").load("tbDetalleProducto.php");
	}

    return {
        init: function () {
            Select2();
			Tab();

        }

    };

}();