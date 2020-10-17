var pace = window.pace || {};

pace.agrega_papeleria = (function () {

    return {
        init: function () {
            $(document).ready(function () {
                $(document).on("click", "#btn_papeleria_usuario", function () {
                    var data = $(this).data("id");
                    document.location.href = base_url + '/Dashboard/vista_papeleria_participante?pte=' + data;
                }); 
            });
        },





    }
})();