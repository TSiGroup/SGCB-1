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
					else{
					alert('double click!');
					alert(event.id);
					alert(event.description)
					alert(event.className)
					}
				});
			},
            editable: false
		});
		