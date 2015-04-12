var TableEditable = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

           function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
				var uno=jqTds[0].innerHTML;
				var dos=jqTds[1].innerHTML;
				recuperaDatos(uno,dos,oTable,nRow);
				$("#btnFancybox").click();
            }

            var oTable = $('#sample_editable_1').dataTable({
             "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 15,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per pagina",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [4]
                    }
                ]
            });

            $('#sample_editable_1 a.edit').live('click', function (e) {
                e.preventDefault();
                var nRow = $(this).parents('tr')[0];
				
                if ( this.innerHTML == "Dar de Baja") {
                    editRow(oTable, nRow);
					
                } else if (this.innerHTML == "Editar") {
					ver(oTable, nRow);
                } else {
					eliminar(oTable, nRow);
                }
            });
        }

    };

}();