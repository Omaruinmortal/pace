function valida_formulario_add_usuario() {


    $("#form_usuario").submit(function(event){ 
        
        $.ajax({
            url: base_url + '/usuarios/guarda_usuario',
            type: 'POST',
            dataType: 'html', //expect return data as html from server
            data: $("#form_usuario").serialize(),
            dataType: 'json',
            success: function (response, textStatus, jqXHR) {
                if (response.error) {                    
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
                if (response.success) {
                    alert('Se guardo con exíto')
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

    document.getElementById("nombre").onblur = function () {
        var nombre = document.getElementById("nombre").value;
        var patron = /[^\sA-Z]/
        console.log(nombre.match(patron))
        if(nombre.match(patron) != null || nombre.length == 0)
        {
            document.getElementById("alert-nombre").innerHTML = 'El nombre debe de ser alfanumérico y no debe de contener números.';
            document.getElementById("alert-nombre").style.color = '#ff5733';
        }else{
            document.getElementById("alert-nombre").innerHTML = '';
        }        
    }

    document.getElementById("primerApellido").onblur = function () {
        var primerApellido = document.getElementById("primerApellido").value;
        var patron = /[^\sA-Z]/
        if(primerApellido.match(patron) != null || primerApellido.length == 0)
        {
            document.getElementById("alert-primerApellido").innerHTML = 'El Primer Apellido debe de ser alfanumérico y no debe de contener números.';
            document.getElementById("alert-primerApellido").style.color = '#ff5733';
        }else{
            document.getElementById("alert-primerApellido").innerHTML = '';
        }        
    }

    document.getElementById("segundoApellido").onblur = function () {
        var segundoApellido = document.getElementById("segundoApellido").value;
        var patron = /[^A-Z]/
        if(segundoApellido.match(patron) != null)
        {
            document.getElementById("alert-segundoApellido").innerHTML = 'El Segundo Apellido debe de ser alfanumérico y no debe de contener números.';
            document.getElementById("alert-segundoApellido").style.color = '#ff5733';
        }else{
            document.getElementById("alert-segundoApellido").innerHTML = '';
        }        
    }

    document.getElementById("correo").onblur = function () {
        var correo = document.getElementById("correo").value;
        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo) != 1 || correo.length == 0)
        {
            document.getElementById("alert-correo").innerHTML = 'Tiene que proporcionar un email valido';
            document.getElementById("alert-correo").style.color = '#ff5733';
        }else{
            document.getElementById("alert-correo").innerHTML = '';
        }        
    }

    document.getElementById("telefono").onblur = function () {
        var telefono = document.getElementById("telefono").value;
        if(/^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/.test(telefono) != 1 || telefono.length == 0)
        {
            document.getElementById("alert-telefono").innerHTML = 'Debe colocar un telefono valido.';
            document.getElementById("alert-telefono").style.color = '#ff5733';
        }else{
            document.getElementById("alert-telefono").innerHTML = '';
        }        
    }

    document.getElementById("usuario").onblur = function () {
        var usuario = document.getElementById("usuario").value;
        $.ajax({
            // cargamos url a nuestro contralador y m�todo indicado
            url: base_url + "/usuarios/valida_usuario_existente",
            type: "post", 
            data: {usuario: usuario},
            success: function (data) {
                if (data == 1) {
                    
                    document.getElementById("alert-usuario").innerHTML = 'El usuario ya existe.';
                    document.getElementById("alert-usuario").style.color = '#ff5733';
                }else{
                    document.getElementById("alert-usuario").innerHTML = '';
                }  
            },
            error: function() {
                alert('Something is wrong');
             },
        })
    }

    document.getElementById("contrasenia").onblur = function () {
        var contrasenia = document.getElementById("contrasenia").value;
        if (contrasenia.length == 0) {
            document.getElementById("alert-contrasenia").innerHTML = 'Debe colocar una contraseña.';
            document.getElementById("alert-contrasenia").style.color = '#ff5733';
        } else {
            if(contrasenia != recontrasenia){
                document.getElementById("alert-contrasenia").innerHTML = 'Las contraseña no coinciden.';
                document.getElementById("alert-contrasenia").style.color = '#ff5733';
            }else{
                document.getElementById("alert-contrasenia").innerHTML = '';
                document.getElementById("alert-recontrasenia").innerHTML = '';
            }      
        }
    }

    document.getElementById("recontrasenia").onblur = function () {
        var contrasenia = document.getElementById("contrasenia").value;
        var recontrasenia = document.getElementById("recontrasenia").value;
        if (recontrasenia.length == 0) {
            document.getElementById("alert-recontrasenia").innerHTML = 'Debe colocar una contraseña.';
            document.getElementById("alert-recontrasenia").style.color = '#ff5733';
        }else{
            if(contrasenia != recontrasenia){
                document.getElementById("alert-recontrasenia").innerHTML = 'Las contraseña no coinciden.';
                document.getElementById("alert-recontrasenia").style.color = '#ff5733';
            }else{
                document.getElementById("alert-recontrasenia").innerHTML = '';
                document.getElementById("alert-contrasenia").innerHTML = '';
            }            
        }    
    }

    document.getElementById("id_tipousuarios").onchange = function () {
        document.getElementById("alert-tipousuarios").innerHTML = '';
    }

}