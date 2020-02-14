var pace = window.pace || {};

pace.cursos = (function () {

    return {

        valida_formulario_add_cursos (){
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