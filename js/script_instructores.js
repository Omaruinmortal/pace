var pace = window.pace || {};

pace.instructores = (function () {

    return {
        valida_formulario_add_intructores: function () {

            $("#form_usuario").submit(function (event) {
                $.ajax({
                    url: base_url + '/usuarios/guarda_usuario',
                    type: 'POST',
                    dataType: 'html', //expect return data as html from server
                    data: $("#form_usuario").serialize(),
                    dataType: 'json',
                    success: function (response, textStatus, jqXHR) {
                        if (response.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Debe de llenar los campos faltantes',
                                showConfirmButton: false,
                                timer: 1100
                            })
                            if (response.nombre_error != '') {
                                $('#alert-nombre').html(response.nombre_error);
                                document.getElementById("alert-nombre").style.color = '#ff5733';
                            } else {
                                $('#alert-nombre').html('');
                            }
                            if (response.primerApellido_error != '') {
                                $('#alert-primerApellido').html(response.primerApellido_error);
                                document.getElementById("alert-primerApellido").style.color = '#ff5733';
                            } else {
                                $('#alert-primerApellido').html('');
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
                            if (response.usuario_error != '') {
                                $('#alert-usuario').html(response.usuario_error);
                                document.getElementById("alert-usuario").style.color = '#ff5733';
                            } else {
                                $('#alert-usuario').html('');
                            }
                            if (response.contrasenia_error != '') {
                                $('#alert-contrasenia').html(response.contrasenia_error);
                                document.getElementById("alert-contrasenia").style.color = '#ff5733';
                            } else {
                                $('#alert-contrasenia').html('');
                            }
                            if (response.recontrasenia_error != '') {
                                $('#alert-recontrasenia').html(response.recontrasenia_error);
                                document.getElementById("alert-recontrasenia").style.color = '#ff5733';
                            } else {
                                $('#alert-recontrasenia').html('');
                            }
                            if (response.id_tipousuarios_error != '') {
                                $('#alert-tipousuarios').html(response.id_tipousuarios_error);
                                document.getElementById("alert-tipousuarios").style.color = '#ff5733';
                            } else {
                                $('#alert-tipousuarios').html('');
                            }
                        }
                        if (response.success == 'OK') {
                            Swal.fire({
                                icon: 'success',
                                title: 'El usuario se guardo correctamente.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#alert-nombre').html('');
                            $('#alert-primerApellido').html('');
                            $('#alert-correo').html('');
                            $('#alert-telefono').html('');
                            $('#alert-usuario').html('');
                            $('#alert-contrasenia').html('');
                            $('#alert-recontrasenia').html('');
                            $('#alert-tipousuarios').html('');
                            $('#form_usuario')[0].reset();
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

            $("#form_usuario_modif").submit(function (event) {
                $.ajax({
                    url: base_url + '/usuarios/modifica_usuario',
                    type: 'POST',
                    dataType: 'html', //expect return data as html from server
                    data: $("#form_usuario_modif").serialize(),
                    dataType: 'json',
                    success: function (response, textStatus, jqXHR) {
                        if (response.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Debe de llenar los campos faltantes',
                                showConfirmButton: false,
                                timer: 1100
                            })
                            if (response.nombre_error != '') {
                                $('#alert-nombre').html(response.nombre_error);
                                document.getElementById("alert-nombre").style.color = '#ff5733';
                            } else {
                                $('#alert-nombre').html('');
                            }
                            if (response.primerApellido_error != '') {
                                $('#alert-primerApellido').html(response.primerApellido_error);
                                document.getElementById("alert-primerApellido").style.color = '#ff5733';
                            } else {
                                $('#alert-primerApellido').html('');
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
                            if (response.usuario_error != '') {
                                $('#alert-usuario').html(response.usuario_error);
                                document.getElementById("alert-usuario").style.color = '#ff5733';
                            } else {
                                $('#alert-usuario').html('');
                            }
                            if (response.contrasenia_error != '') {
                                $('#alert-contrasenia').html(response.contrasenia_error);
                                document.getElementById("alert-contrasenia").style.color = '#ff5733';
                            } else {
                                $('#alert-contrasenia').html('');
                            }
                            if (response.recontrasenia_error != '') {
                                $('#alert-recontrasenia').html(response.recontrasenia_error);
                                document.getElementById("alert-recontrasenia").style.color = '#ff5733';
                            } else {
                                $('#alert-recontrasenia').html('');
                            }
                            if (response.id_tipousuarios_error != '') {
                                $('#alert-tipousuarios').html(response.id_tipousuarios_error);
                                document.getElementById("alert-tipousuarios").style.color = '#ff5733';
                            } else {
                                $('#alert-tipousuarios').html('');
                            }
                        }
                        
                        if (response.success == 'OK') {
                            Swal.fire({
                                icon: 'success',
                                title: 'El usuario se actualizó correctamente.',
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

            document.getElementById("titulo").onblur = function () {
                var titulo = document.getElementById("titulo").value;
                var patron = /[^\sA-Z]/
                if (titulo.match(patron) != null || titulo.length == 0) {
                    document.getElementById("alert-titulo").innerHTML = 'El titulo debe de ser alfanumérico y no debe de contener números.';
                    document.getElementById("alert-titulo").style.color = '#ff5733';
                } else {
                    document.getElementById("alert-titulo").innerHTML = '';
                }
            }

            document.getElementById("nombre").onblur = function () {
                var nombre = document.getElementById("nombre").value;
                var patron = /[^\sA-Z]/
                if (nombre.match(patron) != null || nombre.length == 0) {
                    document.getElementById("alert-nombre").innerHTML = 'El nombre debe de ser alfanumérico y no debe de contener números.';
                    document.getElementById("alert-nombre").style.color = '#ff5733';
                } else {
                    document.getElementById("alert-nombre").innerHTML = '';
                }
            }

            document.getElementById("primerApellido").onblur = function () {
                var primerApellido = document.getElementById("primerApellido").value;
                var patron = /[^\sA-Z]/
                if (primerApellido.match(patron) != null || primerApellido.length == 0) {
                    document.getElementById("alert-primerApellido").innerHTML = 'El Primer Apellido debe de ser alfanumérico y no debe de contener números.';
                    document.getElementById("alert-primerApellido").style.color = '#ff5733';
                } else {
                    document.getElementById("alert-primerApellido").innerHTML = '';
                }
            }

            document.getElementById("segundoApellido").onblur = function () {
                var segundoApellido = document.getElementById("segundoApellido").value;
                var patron = /[^A-Z]/
                if (segundoApellido.match(patron) != null) {
                    document.getElementById("alert-segundoApellido").innerHTML = 'El Segundo Apellido debe de ser alfanumérico y no debe de contener números.';
                    document.getElementById("alert-segundoApellido").style.color = '#ff5733';
                } else {
                    document.getElementById("alert-segundoApellido").innerHTML = '';
                }
            }

            document.getElementById("correo").onblur = function () {
                var correo = document.getElementById("correo").value;
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo) != 1 || correo.length == 0) {
                    document.getElementById("alert-correo").innerHTML = 'Tiene que proporcionar un email valido';
                    document.getElementById("alert-correo").style.color = '#ff5733';
                } else {
                    document.getElementById("alert-correo").innerHTML = '';
                }
            }

            document.getElementById("telefono").onblur = function () {
                var telefono = document.getElementById("telefono").value;
                if (/^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/.test(telefono) != 1 || telefono.length == 0) {
                    document.getElementById("alert-telefono").innerHTML = 'Debe colocar un telefono valido.';
                    document.getElementById("alert-telefono").style.color = '#ff5733';
                } else {
                    document.getElementById("alert-telefono").innerHTML = '';
                }
            }

            document.getElementById("id_institucion").onchange = function () {
                document.getElementById("alert-id_institucion").innerHTML = '';
            }

        },//cierra valida_formulario_add_usuario

        init_consulta_intructores: function () {
            $(document).ready(function () {

                $("#li_instructores").addClass("mm-active");
                $("#ul_agregar_instructores").addClass("mm-show");
                $("#li_consulta_instructores").addClass("active");
                $("#a_consulta_instructores").addClass("active");

                var tabla_instructores = $('#datatable_instructores').dataTable({
                    "ajax": {
                        url: base_url + '/instructores/trae_instructor',
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

                $(document).on("click","#btn_eliminar_usuario", function (){
               
                    var data = $(this).data("id")
     
                    Swal.fire({
                     title: 'Esta seguro de Eliminar este usuario?',
                     text: "Usted no será capaz de revertir esto!",
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'Si, Eliminar!'
                   }).then((result) => {
                     if (result.value) {
                         $.ajax({
                             url: base_url + '/usuarios/elimina_usuario',
                             type: 'POST',
                             dataType: 'html', //expect return data as html from server
                             data: {id:data},
                             dataType: 'json',
                             success: function (response, textStatus, jqXHR) {
                              if(response == true){
                                 Swal.fire(
                                     'Se elimino!',
                                     'El usuario a sido borrado satisfactoriamente.',
                                     'success'
                                 )
                                 
                                 tabla_usuarios.api().ajax.reload();
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

                $(document).on("click","#btn_modifica_usuario", function (){
                    var data = $(this).data("id")
                    window.location.href = base_url + '/dashboard/modifica_usuario/'+data;
                })
                
            });

           
        },

        
        
    }//llave cierra return   
})();