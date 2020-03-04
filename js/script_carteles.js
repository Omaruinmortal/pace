var pace = window.pace || {};

pace.carteles = (function () {

    return {

        init_consulta_carteles: function () {
            $(document).ready(function () {
                $("#li_carteles").addClass("mm-active");
                $("#ul_agregar_carteles").addClass("mm-show");
                $("#li_agrega_carteles").addClass("active");
                $("#a_agregar_carteles").addClass("active");

                var tabla_carteles = $('#datatable_carteles').dataTable({
                    "ajax": {
                        url: base_url + '/carteles/trae_carteles',
                        type: 'POST'
                    },
                    "order": [[0, "asc"]],
                    "pageLength": 10,
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "No hay ningun dato disponible",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    }
                }); // fin de datatable

                $(document).on("click", "#btn_eliminar_cartel", function () {

                    var data = $(this).data("id")

                    Swal.fire({
                        title: 'Esta seguro de Eliminar este cartel?',
                        text: "Usted no será capaz de revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Eliminar!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: base_url + '/carteles/elimina_cartel',
                                type: 'POST',
                                dataType: 'html', //expect return data as html from server
                                data: { id: data },
                                dataType: 'json',
                                success: function (response, textStatus, jqXHR) {
                                    if (response == true) {
                                        Swal.fire(
                                            'Se elimino!',
                                            'El Cartel a sido borrado satisfactoriamente.',
                                            'success'
                                        )

                                        tabla_carteles.api().ajax.reload();
                                    }
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.log('error');
                                    console.log('error(s):' + textStatus, errorThrown);
                                }
                            });

                        }
                    })
                });

                $(document).on("click", "#btn_ver_cartel", function () {
                    var data = $(this).data("id")
                    $("#modal").addClass("active");
                    $("#modal").html('<object data="http://localhost/pace/assets/carteles/'+data+'" type="application/pdf" width="auto" height="445"></object>');
                });
             
            });
        },

        valida_formulario_add_carteles: function () {
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                document.getElementById('nombre_archivo').innerHTML = fileName;  
                document.getElementById('alert-archivo_cartel').innerHTML = '';  
                document.getElementById('alert-nombre_cartel').style.display = '';  
            });

            $("#form_cartel").submit(function (event) {
                let dataForm = new FormData($('#form_cartel')[0]);
                                
                $.ajax({
                    url: base_url + '/carteles/guarda_cartel',
                    dataType : 'json',
                    type : 'POST',
                    data : dataForm,
                    contentType: false,
                    processData: false,
                    success: function (response, textStatus, jqXHR) {
                        if (response.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Debe de llenar los campos faltantes',
                                showConfirmButton: false,
                                timer: 1100
                            })
                            if (response.nombre_cartel_error != '') {
                                $('#alert-nombre_cartel').html(response.nombre_cartel_error);
                                document.getElementById("alert-nombre_cartel").style.color = '#ff5733';
                            } else {
                                $('#alert-nombre_cartel').html('');
                            }
                            if (response.archivo_error != '') {
                                $('#alert-archivo_cartel').html(response.archivo_error);
                                document.getElementById("alert-archivo_cartel").style.color = '#ff5733';
                            } else {
                                $('#alert-archivo_cartel').html('');
                            }
                        }
                        if (response.success == 'OK') {
                            Swal.fire({
                                icon: 'success',
                                title: 'El avaluador se guardo correctamente.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#alert-nombre_cartel').html('');
                            $('#alert-archivo_cartel').html('');
                            document.getElementById('nombre_archivo').innerHTML = 'Seleccionar Archivo (2MB)';
                            $('#form_cartel')[0].reset();
                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('error');
                        console.log('error(s):' + textStatus, errorThrown);
                    }
                });

                event.preventDefault();
                event.stopImmediatePropagation();
            });
        }
    }
})();