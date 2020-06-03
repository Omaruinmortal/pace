var pace = window.pace || {};

pace.avaladores = (function () {

    return {
        init_consulta_avaladores: function () {
            $(document).ready(function () {
                $("#li_avaluadores").addClass("mm-active");
                $("#ul_agregar_avaluadores").addClass("mm-show");
                $("#li_agrega_avaluadores").addClass("active");
                $("#a_agregar_avaluadores").addClass("active");

                var tabla_avaladores = $('#datatable_avaladores').dataTable({
                    "ajax": {
                        url: base_url + '/avaladores/trae_avalador',
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

                $(document).on("click", "#btn_eliminar_avalador", function () {

                    var data = $(this).data("id")

                    Swal.fire({
                        title: 'Esta seguro de Eliminar este Avalador?',
                        text: "Usted no será capaz de revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Eliminar!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: base_url + '/avaladores/elimina_avalador',
                                type: 'POST',
                                dataType: 'html', //expect return data as html from server
                                data: { id: data },
                                dataType: 'json',
                                success: function (response, textStatus, jqXHR) {
                                    if (response == true) {
                                        Swal.fire(
                                            'Se elimino!',
                                            'El curso a sido borrado satisfactoriamente.',
                                            'success'
                                        )

                                        tabla_avaladores.api().ajax.reload();
                                    }
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.log('error');
                                    console.log('error(s):' + textStatus, errorThrown);
                                }
                            });

                        }
                    })
                })

                $(document).on("click", "#btn_modifica_avalador", function () {
                    var data = $(this).data("id")
                    window.location.href = base_url + '/dashboard/modifica_avalador/' + data;
                })
            });
        },

        valida_formulario_add_avaladores: function () {

            $("#form_avalador").submit(function (event) {
                $.ajax({
                    url: base_url + '/avaladores/guarda_avalador',
                    type: 'POST',
                    dataType: 'html', //expect return data as html from server
                    data: $("#form_avalador").serialize(),
                    dataType: 'json',
                    success: function (response, textStatus, jqXHR) {
                        if (response.falta_datos) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Debe de llenar los campos faltantes',
                                showConfirmButton: false,
                                timer: 1100
                            })
                            if (response.nombre_completo_error != '') {
                                $('#alert-nombre_completo').html(response.nombre_completo_error);
                                document.getElementById("alert-nombre_completo").style.color = '#ff5733';
                            } else {
                                $('#alert-nombre_completo').html('');
                            }
                            if (response.nombre_avalador_error != '') {
                                $('#alert-nombre_avalador').html(response.nombre_avalador_error);
                                document.getElementById("alert-nombre_avalador").style.color = '#ff5733';
                            } else {
                                $('#alert-nombre_avalador').html('');
                            }
                        }
                        if (response.success == 'OK') {
                            Swal.fire({
                                icon: 'success',
                                title: 'El avaluador se guardo correctamente.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#alert-nombre_completo').html('');
                            $('#alert-nombre_avalador').html('');
                            $('#form_avalador')[0].reset();
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

            $("#form_avalador_modif").submit(function (event) {
                $.ajax({
                    url: base_url + '/avaladores/modifica_avalador',
                    type: 'POST',
                    dataType: 'html', //expect return data as html from server
                    data: $("#form_avalador_modif").serialize(),
                    dataType: 'json',
                    success: function (response, textStatus, jqXHR) {
                        if (response.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Debe de llenar los campos faltantes',
                                showConfirmButton: false,
                                timer: 1100
                            })
                            if (response.nombre_completo_error != '') {
                                $('#alert-nombre_completo').html(response.nombre_completo_error);
                                document.getElementById("alert-nombre_completo").style.color = '#ff5733';
                            } else {
                                $('#alert-nombre_completo').html('');
                            }

                            if (response.nombre_avalador_error != '') {
                                $('#alert-nombre_avalador').html(response.nombre_avalador_error);
                                document.getElementById("alert-nombre_avalador").style.color = '#ff5733';
                            } else {
                                $('#alert-nombre_avalador').html('');
                            }
                            
                        }
                        if (response.success == 'OK') {
                            Swal.fire({
                                icon: 'success',
                                title: 'El avaluador se modifico correctamente.',
                                showConfirmButton: false,
                                timer: 1500
                            })
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
            

            document.getElementById("nombre_completo").onblur = function () {
                var nombre = document.getElementById("nombre_completo").value;
                var patron = /[^\sA-Z0-9]/
                if (nombre.match(patron) != null || nombre.length == 0) {
                    document.getElementById("alert-nombre_completo").innerHTML = 'El nombre debe de ser alfanumérico';
                    document.getElementById("alert-nombre_completo").style.color = '#ff5733';
                } else {
                    document.getElementById("alert-nombre_completo").innerHTML = '';
                }
            }

            document.getElementById("nombre_avalador").onclick = function () {
                document.getElementById("alert-nombre_avalador").innerHTML = '';
            }
        }

    }
})();