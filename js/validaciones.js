function valida_formulario_add_usuario() {


    $("#form_usuari").submit(function(event){ 

        $.ajax({
            url: base_url + '/usuarios/guarda_usuario',
            type: 'POST',
            dataType: 'html', //expect return data as html from server
            data: $("#form_usuario").serialize(),
            success: function (response, textStatus, jqXHR) {
               console.log(response)
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