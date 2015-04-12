var Componente = function () {

    var Cargar = function () {

         cal.fullCalendar('addEventSource', jsonObra);
		 cal.fullCalendar('addEventSource', jsonArriendo);
		 cal.fullCalendar('addEventSource', jsonTrabajadorIngreso);
		 cal.fullCalendar('addEventSource', jsonTrabajadorDesvinculacion);
		 cal.fullCalendar('addEventSource', jsonCalendarioGeneral);
		 cal.fullCalendar('addEventSource', jsonCalendarioImportante);		
	}
           cal = $('#calendar').fullCalendar({
			firstDay: 1,
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles',
             'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            buttonText:
              {
                  today:    'Hoy',
                  month:    'Mes',
                  week:     'Semana',
                  day:      'Día'
              },
             header: {
                 left: 'prev,next today',
                 center: 'title',
                 right: 'month,basicWeek,basicDay'
             },
			 eventRender: function(event, element) {
				element.bind('dblclick', function() {
					if(event.id=="OBRA"){$.msgbox(event.description,{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});}
					else if(event.id=="ARRIENDO"){$.msgbox(event.description,{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});}
					else if(event.id=="TRABAJADOR"){$.msgbox(event.description,{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});}
					else {$.msgbox(event.description,{type: "confirm",buttons : [{type: "submit", value: "Aceptar"},{type: "submit", value: "Modificar"},{type: "submit", value: "Eliminar"}]}, function(result) {
				    if(result=="Eliminar"){
						cal.fullCalendar('removeEvents',event.id);
						$.ajax({
                         type: 'POST',
                         url: 'elimina_calendario.php',
                         data: { id:event.id},
                         success: function(data){
			              if(data==""){
			               $.msgbox("Evento Eliminado Exitosamente",{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});}
				          else {$.msgbox("Error 1053, a ocurrido un error al momento de ingresar los datos, por favor verifique los datos ó comuniquese con el administrador del sistema.", {type: "error",buttons : [{type: "submit", value: "Aceptar"}]});}
			     }
			 });	
					 }
					 else if(result=="Modificar"){
	                        buscarEvento(event.id)
						 }		
					 });}
				});
			},
            editable: false
		});

    return {
        init: function () {
			jsonObra = "json-obra.php";
            jsonArriendo = "json-arriendo.php";
            jsonTrabajadorIngreso = "json-trabajador_ingreso.php";
            jsonTrabajadorDesvinculacion = "json-trabajador_desvinculacion.php";
			jsonCalendarioGeneral = "json-calendario_general.php";
			jsonCalendarioImportante = "json-calendario_importante.php"; 
			cal;
			Cargar();
			
        }

    };

}();


