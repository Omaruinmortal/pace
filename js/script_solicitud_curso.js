var pace = window.pace || {};

pace.solicitud_curso = (function () {

    return {

        init_solicitud_curso: function () {
            $( "#tipo_curso" ).change(function() {
                 if(this.value >= 1 && this.value<= 9){
                     document.getElementById("f_factura").style.display = '';
                 }else{
                    document.getElementById("f_factura").style.display = 'none';
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
            
            $("#generar").click(function(){
                document.getElementById("div_participantes").style.display = '';
            });
        },

        valida_formulario_solicitud_curso (){
            
        }
    }
})();