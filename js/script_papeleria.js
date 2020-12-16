var pace = window.pace || {};

pace.agrega_papeleria = (function () {

    return {
        init: function () {
            $(document).on("click", "#btn_papeleria_usuario", function () {
                    var data = $(this).data("id");
                    document.location.href = base_url + '/Dashboard/vista_papeleria_participante?pte=' + data;
                }); 

            $(document).ready(function () {
                var lim = document.getElementsByClassName("card_papeleria").length;               

                for (var i = 0; i<lim; i++) {
                    var random_color_seleccionado=pace.agrega_papeleria.random_colors();
                    $("#papeleria"+i).css("background", random_color_seleccionado);
                }    
            });
        },

        random_colors: function(){
            //"#7fffd475", "#ffe0eea3", "#f4c39391", "#28a7451f"
            const colores = ["aliceblue", "antiquewhite", ];
            const random = Math.floor(Math.random() * colores.length);
            return colores[random];
        }





    }
})();