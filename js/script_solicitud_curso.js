var pace = window.pace || {};

pace.solicitud_curso = (function () {

    return {

        init_solicitud_curso: function () {
            $(document).ready( function (){
                $('input[type="file"]').change(function(e){
                    var fileName = e.target.files[0].name;
                    document.getElementById('nombre_archivo').innerHTML = fileName;  
                    document.getElementById('alert-factura').innerHTML = '';  
                });
            }),

            $( "#tipo_curso" ).change(function() {
                 if(this.value != 23){
                     document.getElementById("f_factura").style.display = '';
                     document.getElementById("n_manu_factura").style.display = '';
                 }else{
                    document.getElementById("f_factura").style.display = 'none';
                    document.getElementById("n_manu_factura").style.display = 'none';
                 }
            });

            $( "#fecha_solicitud_curso" ).change(function() {
                data = this.value;
                $.ajax({
                    url: base_url + '/solicitud_cursos/fecha_actual',
                    type: 'POST',
                    dataType: 'html', //expect return data as html from server
                    data: { fecha_curso: data },
                    dataType: 'json',
                    success: function (response, textStatus, jqXHR) {
                        if(response < 29){
                            Swal.fire({
                                icon: 'error',
                                title: 'La fecha no valida.',
                                text: 'La fecha debe de ser mayor a 30 días naturales!',
                                showConfirmButton: false,
                                timer: 1900
                            })
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('error');
                        console.log('error(s):' + textStatus, errorThrown);
                    }
                });
            });

            $(document).on("click", "#btn_ver_cartel", function () {
                var data = $(this).data("id")
                $("#modal").addClass("active");
                $("#modal").html('<object data="http://localhost/pace/assets/carteles/'+data+'" type="application/pdf" width="auto" height="445"></object>');
            });
            
        },

        valida_formulario_solicitud_curso: function(){

            $( "#curso" ).change(function() {
                var curso= document.getElementById('curso').value;
                if(curso == 2){
                    document.getElementById('input_nombre_institucion').style.display = '';  
                }
                if(curso == 1){
                    document.getElementById('input_nombre_institucion').style.display = 'none';  
                }

            });

            document.getElementById("manuales_seg_factura").onblur = function () {
                var manuales = document.getElementById("manuales_seg_factura").value;
                var n_participantes = document.getElementById("numero_participantes").value;        

                if(parseInt(manuales) < parseInt(n_participantes)){
                    Swal.fire({
                        icon: 'error',
                        title: 'Manuales.',
                        text: 'La cantidad de manuales debe ser "Igual o Mayor" a los participantes!',
                        showConfirmButton: false,
                        timer: 1300
                    })
                }

                var data_id_c = document.getElementById("tipo_curso").value; 
                
                $.ajax({
                    url: base_url + '/solicitud_cursos/trae_precio_curso',
                    type: 'POST',
                    dataType: 'html', //expect return data as html from server
                    data: { id_curso: data_id_c },
                    dataType: 'json',
                    
                    success: function (response, textStatus, jqXHR) {
                        var total = n_participantes * response;
                        //document.getElementById('precio_tentativo').value(total);
                        $('#precio_tentativo').val(total)
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('error');
                        console.log('error(s):' + textStatus, errorThrown);
                    }
                });

                
            }


        },

        submit_curso_solicitado: function(){
            
            $("#form_curso_solicitado").submit(function (event) {
                let dataForm = new FormData($('#form_curso_solicitado')[0]);
                $.ajax({
                    url: base_url + '/Cursos_solicitados/guarda_curso_solicitado',
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
                            if (response.curso != '') {
                                $('#alert-nombre_curso').html(response.curso);
                                document.getElementById("alert-nombre_curso").style.color = '#ff5733';
                            } else {
                                $('#alert-nombre_curso').html('');
                            }
                            if (response.nombre_institucion != '') {
                                $('#alert-nombre_institucion').html(response.nombre_institucion);
                                document.getElementById("alert-nombre_institucion").style.color = '#ff5733';
                            } else {
                                $('#alert-nombre_institucion').html('');
                            }
                            if (response.tipo_curso != '') {
                                $('#alert-tipo_curso').html(response.tipo_curso);
                                document.getElementById("alert-tipo_curso").style.color = '#ff5733';
                            } else {
                                $('#alert-tipo_curso').html('');
                            }
                            if (response.fecha_solicitud_curso != '') {
                                $('#alert-fecha_solicitud_curso').html(response.fecha_solicitud_curso);
                                document.getElementById("alert-fecha_solicitud_curso").style.color = '#ff5733';
                            } else {
                                $('#alert-fecha_solicitud_curso').html('');
                            }
                            if (response.sede != '') {
                                $('#alert-sede').html(response.sede);
                                document.getElementById("alert-sede").style.color = '#ff5733';
                            } else {
                                $('#alert-sede').html('');
                            }
                            if (response.id_estado != '') {
                                $('#alert-id_estado').html(response.id_estado);
                                document.getElementById("alert-id_estado").style.color = '#ff5733';
                            } else {
                                $('#alert-id_estado').html('');
                            }
                            if (response.id_municipio != '') {
                                $('#alert-id_municipio').html(response.id_municipio);
                                document.getElementById("alert-id_municipio").style.color = '#ff5733';
                            } else {
                                $('#alert-id_municipio').html('');
                            }
                            if (response.numero_participantes != '') {
                                $('#alert-numero_participantes').html(response.numero_participantes);
                                document.getElementById("alert-numero_participantes").style.color = '#ff5733';
                            } else {
                                $('#alert-numero_participantes').html('');
                            }
                            if (response.factura != '') {
                                $('#alert-factura').html(response.factura);
                                document.getElementById("alert-factura").style.color = '#ff5733';
                            } else {
                                $('#alert-factura').html('');
                            }
                            if (response.archivo_error != '') {
                                $('#alert-factura').html(response.archivo_error);
                                document.getElementById("alert-factura").style.color = '#ff5733';
                            } else {
                                $('#alert-factura').html('');
                            }
                            
                            if (response.manuales_seg_factura != '') {
                                $('#alert-manuales_seg_factura').html(response.manuales_seg_factura);
                                document.getElementById("alert-manuales_seg_factura").style.color = '#ff5733';
                            } else {
                                $('#alert-manuales_seg_factura').html('');
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
                            document.getElementById('nombre_archivo').innerHTML = 'Seleccionar Archivo (2MB)';
                            $('#form_curso_solicitado')[0].reset();
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