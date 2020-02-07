var pace = window.pace || {};

pace.avaladores = (function () {

    return{
        init_consulta_usuarios: function () {
            $(document).ready(function () {
                $("#li_avaluadores").addClass("mm-active");
                $("#ul_agregar_avaluadores").addClass("mm-show");
                $("#li_agrega_avaluadores").addClass("active");
                $("#a_agregar_avaluadores").addClass("active");
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
                        if (response.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Debe de llenar los campos faltantes',
                                showConfirmButton: false,
                                timer: 1100
                            })
                            if (response.nombre_error != '') {
                                $('#alert-nombre_avalador').html(response.nombre_error);
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

            document.getElementById("nombre_avalador").onblur = function () {
                var nombre = document.getElementById("nombre_avalador").value;
                var patron = /[^\sA-Z0-9]/
                if (nombre.match(patron) != null || nombre.length == 0) {
                    document.getElementById("alert-nombre_avalador").innerHTML = 'El nombre debe de ser alfanumérico';
                    document.getElementById("alert-nombre_avalador").style.color = '#ff5733';
                } else {
                    document.getElementById("alert-nombre_avalador").innerHTML = '';
                }
            }
        }

    }
})();