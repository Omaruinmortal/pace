var pace = window.pace || {};

pace.cursos = (function () {

    return {

        init_consulta_cursos: function () {
            $(document).ready(function () {
                $("#li_cursos").addClass("mm-active");
                $("#ul_agregar_cursos").addClass("mm-show");
                $("#li_agrega_cursos").addClass("active");
                $("#a_agregar_cursos").addClass("active");

                var tabla_cursos = $('#datatable_cursos').dataTable({
                    "ajax": {
                        url: base_url + '/cursos/trae_cursos',
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

                $(document).on("click", "#btn_eliminar_curso", function () {

                    var data = $(this).data("id")

                    Swal.fire({
                        title: 'Esta seguro de Eliminar este curso?',
                        text: "Usted no será capaz de revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Eliminar!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: base_url + '/cursos/elimina_curso',
                                type: 'POST',
                                dataType: 'html', //expect return data as html from server
                                data: { id: data },
                                dataType: 'json',
                                success: function (response, textStatus, jqXHR) {
                                    if (response == true) {
                                        Swal.fire(
                                            'Se elimino!',
                                            'El Curso a sido borrado satisfactoriamente.',
                                            'success'
                                        )

                                        tabla_cursos.api().ajax.reload();
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
        valida_formulario_add_cursos (){

            $("#form_curso").submit(function (event) {
                $.ajax({
                    url: base_url + '/cursos/guarda_curso',
                    type: 'POST',
                    dataType: 'html', //expect return data as html from server
                    data: $("#form_curso").serialize(),
                    dataType: 'json',
                    success: function (response, textStatus, jqXHR) {
                        if (response.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Debe de llenar los campos faltantes',
                                showConfirmButton: false,
                                timer: 1100
                            })
                            if (response.nombre_curso_error != '') {
                                $('#alert-nombre_curso').html(response.nombre_curso_error);
                                document.getElementById("alert-nombre_curso").style.color = '#ff5733';
                            } else {
                                $('#alert-nombre_curso').html('');
                            }
                            if (response.precio_error != '') {
                                $('#alert-precio').html(response.precio_error);
                                document.getElementById("alert-precio").style.color = '#ff5733';
                            } else {
                                $('#alert-precio').html('');
                            }
                            if (response.id_institucion_error != '') {
                                $('#alert-id_institucion').html(response.id_institucion_error);
                                document.getElementById("alert-id_institucion").style.color = '#ff5733';
                            } else {
                                $('#alert-id_institucion').html('');
                            }
                        }
                        if (response.success == 'OK') {
                            Swal.fire({
                                icon: 'success',
                                title: 'El avaluador se guardo correctamente.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#alert-nombre_curso').html('');
                            $('#alert-precio').html('');
                            $('#form_curso')[0].reset();
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

            document.getElementById("nombre_curso").onblur = function () {
                var nombre = document.getElementById("nombre_curso").value;
                var patron = /[^\sA-Z0-9]/
                if (nombre.match(patron) != null || nombre.length == 0) {
                    document.getElementById("alert-nombre_curso").innerHTML = 'El nombre del curso debe de ser alfanumérico';
                    document.getElementById("alert-nombre_curso").style.color = '#ff5733';
                } else {
                    document.getElementById("alert-nombre_curso").innerHTML = '';
                }
            }

            document.getElementById("precio").onblur = function () {
                var nombre = document.getElementById("precio").value;
                var patron = /[^\sA-Z0-9]/
                if (nombre.match(patron) != null || nombre.length == 0) {
                    document.getElementById("alert-precio").innerHTML = 'Debe de insertar un precio.';
                    document.getElementById("alert-precio").style.color = '#ff5733';
                } else {
                    document.getElementById("alert-precio").innerHTML = '';
                }
            }

            document.getElementById("id_institucion").onchange = function () {
                document.getElementById("alert-institucion").innerHTML = '';
            }
        }
    }
})();