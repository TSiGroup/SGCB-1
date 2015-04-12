var FormWizard = function () {


    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index) {
                    return false;
                },
                onNext: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    // set el titulo
                    $('.step-title', $('#form_wizard_1')).text('Paso ' + (index + 1) + ' de ' + total);
                    // set El siguente botones
                    jQuery('li', $('#form_wizard_1')).removeClass("done");
                    var li_list = navigation.find('li');
                    for (var i = 0; i < index; i++) {
                        jQuery(li_list[i]).addClass("done");
                    }

                    if (current == 1) {
                        $('#form_wizard_1').find('.button-previous').hide();
                    } else {
                        $('#form_wizard_1').find('.button-previous').show();
                    }
					if(current ==2){
						if(index==1) {
				// Make sure we entered the name
				if(!$('#select2_run').val()) {
					
					toastr.options.closeButton = true;
					toastr.options.positionClass= 'toast-bottom-right';
 					toastr.options.newestOnTop = false;
					toastr.options.hideDuration=1100;
					toastr.options.timeOut=1500;
					toastr.options.showDuration=1000;
					toastr.options.showMethod = 'slideDown'; 
					toastr.options.hideMethod = 'slideUp';
					toastr.error('Selecione Trabajador');
					
					$('#select2_run').focus();
					 $('#form_wizard_1').find('.button-previous').hide();
					return false;
				}
				else{
					$('#form_wizard_1').find('.button-previous').show();
					}
				if(!$('#select2_obra').val()) {
					
					toastr.options.closeButton = true;
					toastr.options.positionClass= 'toast-bottom-right';
 					toastr.options.newestOnTop = false;
					toastr.options.hideDuration=1100;
					toastr.options.timeOut=1500;
					toastr.options.showDuration=1000;
					toastr.options.showMethod = 'slideDown'; 
					toastr.options.hideMethod = 'slideUp';
					toastr.error('Selecione Obra');
					
					$('#select2_obra').focus();
					 $('#form_wizard_1').find('.button-previous').hide();
					return false;
				}
				else{
					$('#form_wizard_1').find('.button-previous').show();
					}
				if(!$('#FECHA').val()) {
					
					toastr.options.closeButton = true;
					toastr.options.positionClass= 'toast-bottom-right';
 					toastr.options.newestOnTop = false;
					toastr.options.hideDuration=1100;
					toastr.options.timeOut=1500;
					toastr.options.showDuration=1000;
					toastr.options.showMethod = 'slideDown'; 
					toastr.options.hideMethod = 'slideUp';
					toastr.error('Ingrese Fecha');
					
					$('#FECHA').focus();
					 $('#form_wizard_1').find('.button-previous').hide();
					return false;
				}
				else{
					$('#form_wizard_1').find('.button-previous').show();
					}
			}
			
						
					}
					if (current == 3) {  //pasar a la ventana 3
					      
					 mostrar();   if(cuenta!=0){
					 
						  }  else {
							   toastr.options.closeButton = true;
					toastr.options.positionClass= 'toast-bottom-right';
 					toastr.options.newestOnTop = false;
					toastr.options.hideDuration=1100;
					toastr.options.timeOut=1500;
					toastr.options.showDuration=1000;
					toastr.options.showMethod = 'slideDown'; 
					toastr.options.hideMethod = 'slideUp';
					toastr.error('Selecione al menos un producto');
					
							  	return false;}
                    }// Fin de pasar a la ventana 3
					
					

                    if (current >= total) {
                        $('#form_wizard_1').find('.button-next').hide();
                        $('#form_wizard_1').find('.button-submit').show();
                    } else {
                        $('#form_wizard_1').find('.button-next').show();
                        $('#form_wizard_1').find('.button-submit').hide();
                    }
                    App.scrollTo($('.page-title'));
                },
                onPrevious: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    // set wizard title
                    $('.step-title', $('#form_wizard_1')).text('Paso ' + (index + 1) + ' de ' + total);
                    // set done steps
                    jQuery('li', $('#form_wizard_1')).removeClass("done");
                    var li_list = navigation.find('li');
                    for (var i = 0; i < index; i++) {
                        jQuery(li_list[i]).addClass("done");
                    }

                    if (current == 1) {
                        $('#form_wizard_1').find('.button-previous').hide();
                    } else {
                        $('#form_wizard_1').find('.button-previous').show();
                    }
					 
					if (current == 2) {
                         var oTable = $('#tbDetalle').dataTable();
						 oTable.fnClearTable();
                    }
					
                    if (current >= total) {
                        $('#form_wizard_1').find('.button-next').hide();
                        $('#form_wizard_1').find('.button-submit').show();
                    } else {
                        $('#form_wizard_1').find('.button-next').show();
                        $('#form_wizard_1').find('.button-submit').hide();
                    }

                    App.scrollTo($('.page-title'));
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').click(function () {
				guardar();
            }).hide();
        }

    };

}();