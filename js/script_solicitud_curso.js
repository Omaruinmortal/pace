var pace = window.pace || {};

pace.solicitud_curso = (function () {

    return {

        init_solicitud_curso: function () {
            $( "#tipo_curso" ).change(function() {
                 if(this.value != 23){
                     document.getElementById("f_factura").style.display = '';
                     document.getElementById("n_manu_factura").style.display = '';
                 }else{
                    document.getElementById("f_factura").style.display = 'none';
                    document.getElementById("n_manu_factura").style.display = 'none';
                 }
            });

            $( "#f_solicitud" ).change(function() {
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

        valida_formulario_solicitud_curso (){

            $( "#curso" ).change(function() {
                var curso= document.getElementById('curso').value;
                if(curso == 2){
                    document.getElementById('input_nombre_institucion').style.display = '';  
                }
                if(curso == 1){
                    document.getElementById('input_nombre_institucion').style.display = 'none';  
                }

            });

            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                document.getElementById('nombre_archivo').innerHTML = fileName;  
                document.getElementById('alert-archivo_cartel').innerHTML = '';  
                document.getElementById('alert-nombre_cartel').style.display = '';  
            });

            document.getElementById("cantidad_manuales_fact").onblur = function () {
                var manuales = document.getElementById("cantidad_manuales_fact").value;
                var n_participantes = document.getElementById("n_participantes").value;        

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
                        document.getElementById('precio_curso').innerHTML = '<b>$'+total+'</b>';  
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('error');
                        console.log('error(s):' + textStatus, errorThrown);
                    }
                });

                
            }


        }
    }
})();