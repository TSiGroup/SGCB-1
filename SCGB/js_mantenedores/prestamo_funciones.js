codigoProducto=new Array();comparaCodigo=new Array();cantidad=new Array();codigo=new Array();identificador=new Array(); check_array=new Array();var cuenta=0; 
	
	function mostrar() 
     { 
	 comparaNombre=new Array();comparaMarca=new Array();comparaModelo=new Array();
	 comparaDescripcion=new Array();comparaObservacion=new Array();
	 nombre=new Array();marca=new Array();modelo=new Array();descripcion=new Array();observacion=new Array(); var z=0;
	 
	 if(codigoProducto.length!=0){
		 codigoProducto.length=0;
		 comparaCodigo.length=0;
		 cantidad.length=0;
		 codigo.length=0;
		 identificador.length=0;
		 check_array.length=0;
		 cuenta=0;
	   }
	   
       oTable = $('#tablaHerramienta').dataTable(); //pasamos los datos de la tabla en ASCII
	   var sData = oTable.$('input').serialize();
	   contar_check(sData);
	   
	   oTable = $('#tablaInsumo').dataTable();
	   var sData = oTable.$('input').serialize();
	   contar_check(sData);
	   
	   oTable = $('#tablaRopa').dataTable();
	   var sData = oTable.$('input').serialize();
	   contar_check(sData);
	   
	   oTable = $('#tablaVehiculo').dataTable();
	   var sData = oTable.$('input').serialize();
	   contar_check(sData);
	   
	   if(cuenta!=0){
	   for(i=0;i<check_array.length;i++){ //pasamos de ASCII a Texto añadir aqui cualquier simbologia
		    var cadena = check_array[i];
			if(cadena.indexOf('+') != -1){
				cadena = cadena.replace(/[+]/gi," ");
				cadena = cadena.replace(/%3A/gi,":");
				cadena = cadena.replace(/%2F/gi,"/");
				cadena = cadena.replace(/%C3%B3/gi,"ó");
				cadena = cadena.replace(/%C3%B1/gi,"ñ");
				cadena = cadena.replace(/%2C/gi,",");
				}
			var elem = cadena.split('**%26**'); //se divid la cortando segun corresponda
			comparaCodigo.push(elem[0]);
			codigoProducto.push(elem[1]);
			comparaNombre.push(elem[2]);
			comparaMarca.push(elem[3]);
			comparaModelo.push(elem[4]);
			comparaObservacion.push(elem[5]);
			comparaDescripcion.push(elem[6]);
			identificador.push(elem[7]);
		   }
		}
	   
	 for(i=0;i<codigo.length+1;i++){ //asociamos por grupo
		   for(j=0;j<comparaCodigo.length;j++){
			    if(codigo.indexOf(comparaCodigo[j]) == -1){
					 codigo[z]=comparaCodigo[j];
					 nombre[z]=comparaNombre[j];
					 marca[z]=comparaMarca[j];
					 modelo[z]=comparaModelo[j];
					 observacion[z]=comparaObservacion[j];
					 descripcion[z]=comparaDescripcion[j];
				     z++;
					}
			    }
		 }//termino del for2
		 
	for(i=0;i<codigo.length;i++){//setiamos el array cantidad por defecto
			 cantidad[i]=0;
			}//termino del for3
		 
		for(i=0;i<codigo.length;i++){
             for(j=0;j<comparaCodigo.length;j++){
				  if(codigo[i]==comparaCodigo[j]){
					   cont=cantidad[i];
					   cont=cont+1;
					   cantidad[i]=cont;
					  }
				 }
			}//termino del for4 
			
		for(i=0;i<codigo.length;i++){
			 $('#tbDetalle').dataTable().fnAddData( [    //pasar los datos a la tabla por datatable
              codigo[i],nombre[i],marca[i],modelo[i],observacion[i],descripcion[i],cantidad[i] ]);
			}
		
		document.getElementById('tx_run').innerHTML =document.form1.select2_run.options[document.form1.select2_run.selectedIndex].text;
		document.getElementById('tx_nombre').innerHTML = $('#NOMBRE').val();
		document.getElementById('tx_apellido').innerHTML = $('#APELLIDO').val();
		document.getElementById('tx_cargo').innerHTML = $('#CARGO').val();
		document.getElementById('tx_obra').innerHTML = document.form1.select2_obra.options[document.form1.select2_obra.selectedIndex].text;
		document.getElementById('tx_fecha').innerHTML = $('#FECHA').val();
		document.getElementById('tx_comentario').innerHTML = $('#COMENTARIO').val();
		document.getElementById('tx_usuario').innerHTML=$('#USUARIO').val();
					
     }// fin de la funcion mostrar
	 	
     function guardar(){
			
			CODIGOPRESTAMO=$('#CODIGOPRESTAMO').val();
			OBRA=$('#OBRA').val();
			RUN=document.form1.RUN.options[document.form1.RUN.selectedIndex].text;
			FECHA=$('#FECHA').val();
			TOTALPRODUCTO=cuenta;
			COMENTARIO=$('#COMENTARIO').val();
			USUARIO=$('#USUARIO').val();
			var count=0;var ESTADO=1;
			for(i=0;i<identificador.length;i++){
				  if(identificador[i]=="H" || identificador[i]=="V"){count=count+1;}
				}
			
			if(count==0){ESTADO=0;}
			
			$.ajax({
                     type: 'POST',
                     url: 'guardar_prestamo.php',
                     data: {CODIGOPRESTAMO:CODIGOPRESTAMO, OBRA:OBRA, RUN:RUN, FECHA:FECHA, TOTALPRODUCTO:TOTALPRODUCTO, COMENTARIO:COMENTARIO, USUARIO:USUARIO,ESTADO:ESTADO},
					 success: function(data){
					           guardarDetalle();
						    }
                  });// guarda el prestamo
	     }//fin de la funcion guardar
		   
		   
		 function guardarDetalle(){ 
	       for(i=0;i<comparaCodigo.length;i++){
		          CODIGOPRODUCTO=comparaCodigo[i];
				  CODIGOUNITARIO=codigoProducto[i];
				  IDENT=identificador[i];
				  $.ajax({
                         type: 'POST',
                         url: '../Detalle_Prestamo/guardar_detallePrestamo.php',
                         data: {CODIGOPRESTAMO:CODIGOPRESTAMO, CODIGOPRODUCTO:CODIGOPRODUCTO, CODIGOUNITARIO:CODIGOUNITARIO,IDENT:IDENT}
                        });//guarda detalle prestamo 	 
			 }// termino del for
			 
		  for(j=0;j<codigo.length;j++){
			 CODIGOP=codigo[j];
			 DIFERENCIA=cantidad[j]; 
			 $.ajax({
                     type: 'POST',
                     url: '../Stock/eliminar_stock.php',
					 data: { CODIGO:CODIGOP,DIFERENCIA:DIFERENCIA}
                 }); ////actualiza stock
		   }//termino for2
		
          alertify.alert("Prestamo Guardado exitosamente", function () {
           		location.href = 'prestamo.php';
				});
		 }//fin de la funcion guardarDetalle
		 
	   
	   
   function contar_check(sData){  //recupara lo obtenido de la tabla medianta sData
       var i = 0; var counter = 0;
        while (i != -1)
        {
          var i = sData.indexOf("Check",i);
          if (i != -1)
            {
               i++;
               counter++;
            }
        }
         
		if(counter!=0){
		   var elem = sData.split('&');
		     for(j=0;j<counter;j++){
		          var elem2= elem[j].split('Check='); 
		          check_array[cuenta]=elem2[1];
				  cuenta=cuenta +1;
		  }
		  
		}
		
	}//fin de la funcion contar_check
	
	function tipo(){
		id=document.form1.select2_run.options[document.form1.select2_run.selectedIndex].text;
		if(id!==""){
		  $.getJSON("obtTrabajadorId.php", {id_trabajador: id}, function(data) {
		  $("#CARGO").val(data[0].CARGO);
		  $("#NOMBRE").val(data[0].NOMBRE);
		  $("#APELLIDO").val(data[0].APELLIDO);
		 }) 
	   }
	   else {
		     $("#CARGO").val("");
		     $("#NOMBRE").val("");
		     $("#APELLIDO").val("");
		   }
	 }//fin de la funcion tipo