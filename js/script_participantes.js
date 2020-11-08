var pace = window.pace || {};

pace.agrega_participantes = (function () {

    return {
        init: function () {
            $(document).ready(function () {
                var numero_participantes = $('#num_participantes').val()
                let params = new URLSearchParams(location.search);
                var curso = params.get('id_curso');

                var tabla_participantes = $('#datatable_participantes').dataTable({
                    "ajax": {
                        url: base_url + '/Participantes/trae_participantes_curso?curso=' + curso,
                        type: 'POST',
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

                $("#form_agrega_participante").submit(function (event) {
                    const correo = $('#correo').val();
                    const id_curso = $('#id_curso').val();
                    data = {
                        correo: correo,
                        id_curso: id_curso,
                    }
                    $.ajax({
                        url: base_url + '/Participantes/busca_participante_duplicado',
                        type: 'POST',
                        dataType: 'html', //expect return data as html from server
                        data: data,
                        success: function (response, textStatus, jqXHR) {
                            if (response === 'registrado') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Este correo ya se encuentra registrado',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                $.ajax({
                                    url: base_url + '/Participantes/agrega_participante',
                                    type: 'POST',
                                    dataType: 'html', //expect return data as html from server
                                    data: $("#form_agrega_participante").serialize(),
                                    dataType: 'json',
                                    success: function (response, textStatus, jqXHR) {
                                        if (response.error) {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Debe de llenar los campos faltantes',
                                                showConfirmButton: false,
                                                timer: 1100
                                            })
                                        }
                                        if (response.nombre_error != '') {
                                            $('#alert-nombre').html(response.nombre_error);
                                            document.getElementById("alert-nombre").style.color = '#ff5733';
                                        } else {
                                            $('#alert-nombre').html('');
                                        }
                                        if (response.primer_apellido_error != '') {
                                            $('#alert-primer_apellido').html(response.primer_apellido_error);
                                            document.getElementById("alert-primer_apellido").style.color = '#ff5733';
                                        } else {
                                            $('#alert-primer_apellido').html('');
                                        }
                                        if (response.correo_error != '') {
                                            $('#alert-correo').html(response.correo_error);
                                            document.getElementById("alert-correo").style.color = '#ff5733';
                                        } else {
                                            $('#alert-correo').html('');
                                        }
                                        if (response.telefono_error != '') {
                                            $('#alert-telefono').html(response.telefono_error);
                                            document.getElementById("alert-telefono").style.color = '#ff5733';
                                        } else {
                                            $('#alert-telefono').html('');
                                        }

                                        if (response.success == 'OK') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'El usuario se actualizó correctamente.',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                            $('#form_agrega_participante')[0].reset();
                                            tabla_participantes.api().ajax.reload();
                                        }

                                    },
                                    error: function (jqXHR, textStatus, errorThrown) {
                                        console.log('error');
                                        console.log('error(s):' + textStatus, errorThrown);
                                    }
                                });

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

                document.getElementById("nombre").onblur = function () {
                    $('#alert-nombre').html('');
                }
                document.getElementById("primer_apellido").onblur = function () {
                    $('#alert-primer_apellido').html('');
                }
                document.getElementById("correo").onblur = function () {
                    $('#alert-correo').html('');
                }
                document.getElementById("telefono").onblur = function () {
                    $('#alert-telefono').html('');
                }

                $('#correo').change(function (e) {
                    const correo = this.value;
                    const id_curso = $('#id_curso').val();
                    data = {
                        correo: correo,
                        id_curso: id_curso,
                    }
                    $.ajax({
                        url: base_url + '/Participantes/busca_participante_duplicado',
                        type: 'POST',
                        dataType: 'html', //expect return data as html from server
                        data: data,
                        success: function (response, textStatus, jqXHR) {
                            if (response === 'registrado') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Este correo ya se encuentra registrado',
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

                })

            });
        },





    }
})();