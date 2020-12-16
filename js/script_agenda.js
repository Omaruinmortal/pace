var pace = window.pace || {};

pace.agenda = (function () {

    return {
        guardar_agenda:function(){
            $("#form_agenda").submit(function (event) {
                let url = new URLSearchParams(location.search);
                var curso = url.get('id_curso');


                $.ajax({
                    url: base_url + '/agenda/guardar_agenda?id='+curso,
                    type: 'post',
                    dataType: 'html',
                    data: $("#form_agenda").serialize(),

                    success: function (response, textStatus, jqXHR) { 
                        if (response=='exito'){                        

                            Swal.fire({
                                icon: 'success',
                                title: 'La agenda se ha guardado correctamente',
                                showConfirmButton: true,
                                confirmButtonText:'Aceptar',
                            }).then(() => {
                                window.location.replace(base_url + '/Dashboard/vista_agrega_participantes?id_curso='+curso);
                            });

                        }else{                      

                            Swal.fire({
                                icon: 'error',
                                title: 'Error al guardar la agenda',
                                showConfirmButton: true,
                                confirmButtonText:'Aceptar',
                            }).then(() => {
                                window.location.replace(base_url + '/Dashboard/vista_agrega_participantes?id_curso='+curso);
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
        },  


    }
})();