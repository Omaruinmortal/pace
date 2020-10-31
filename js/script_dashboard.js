var pace = window.pace || {};

pace.dashboard = (function () {

    return {

        init_dashboard: function () {
            $(document).ready(function () {
                $("body").remove("enlarge-menu");
                $("#li_principal").addClass("mm-active");
                $("#ul_dashboard").addClass("mm-show");
                $("#li_dashboard").addClass("active");
                $("#a_dashboard").addClass("active");

                var tabla_cursos_solicitados = $('#datatable_cursos_solicitados').dataTable({
                    "ajax": {
                        url: base_url + '/Cursos_solicitados/trae_cursos_solicitados',
                        type: 'POST'
                    },
                    "order": [[0, "asc"]],
                    "pageLength": 10,
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "No hay ningun dato disponible",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    }
                }); // fin de datatable


            $(document).on("click", "#btn_aprobar_curso", function () {
                var data = $(this).data("id")
                $.ajax({
                    url: base_url + '/Cursos_solicitados/curso_aprobado',
                    type: 'POST',
                    dataType: 'html', //expect return data as html from server
                    data: { id: data },
                    dataType: 'json',
                    success: function (response, textStatus, jqXHR) {
                        if (response.error == false) {
                            Swal.fire({
                                icon: 'success',
                                title: response.mensaje,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            tabla_cursos_solicitados.api().ajax.reload();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('error');
                        console.log('error(s):' + textStatus, errorThrown);
                    }
                });
            });

            $(document).on("click", "#btn_denegar_curso", function () {
              var data = $(this).data("id")
              Swal.mixin({
                  input: 'text',
                  icon: 'warning',
                  confirmButtonText: 'Si, Denegar!',
                  showCancelButton: true,
                  progressSteps: ['1']
              }).queue([
                {
                  title: 'Denegar curso',
                  text: 'Escribir el motivo de Denegación del curso'
                }
              ]).then((result) => {
                  if (result.value) {
                    const answers = result.value
                      $.ajax({
                          url: base_url + '/Cursos_solicitados/denegar_curso',
                          type: 'POST',
                          dataType: 'html', //expect return data as html from server
                          data: { id: data , mensaje: answers},
                          dataType: 'json',
                          success: function (response, textStatus, jqXHR) {
                              if (response.error == false) {
                                  Swal.fire(
                                      'Se denego!',
                                      'El Curso a sido denegado satisfactoriamente.',
                                      'success'
                                  )
                                  tabla_cursos_solicitados.api().ajax.reload();
                              }
                          },
                          error: function (jqXHR, textStatus, errorThrown) {
                              console.log('error');
                              console.log('error(s):' + textStatus, errorThrown);
                          }
                      });

                  }
              })
            });

            $(document).on("click", "#btn_mensaje_rechazo", function () {
              var data = $(this).data("id")
              $.ajax({
                  url: base_url + '/Cursos_solicitados/trae_mensaje_rechazo',
                  type: 'POST',
                  dataType: 'html', //expect return data as html from server
                  data: { id: data },
                  dataType: 'json',
                  success: function (response, textStatus, jqXHR) {
                      if (response.error == false) {
                          Swal.fire({
                              icon: 'warning',
                              title: 'Motivo de rechazo',
                              text: response.mensaje
                          })
                      }
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                      console.log('error');
                      console.log('error(s):' + textStatus, errorThrown);
                  }
              });
            });

            $(document).on("click", "#btn_agrega_participantes", function () {
                var data = $(this).data("id")
                document.location.href = base_url + '/Dashboard/vista_agrega_participantes?id_curso=' + data
              });

            $(document).on("click", "#btn_mod_curso_solicitado", function () {
                var data = $(this).data("id")
                alert(data);
            });

          });


        },

        calendario_dashboard: function () {
          var e = document.getElementById("calendar")

          $.ajax({
              url: base_url + '/Cursos_solicitados/calendario_cursos',
              type: 'POST',
              dataType: 'json',
              success: function (response, textStatus, jqXHR) {
                var events = response;
                a = new FullCalendar.Calendar(e,{
                    plugins: ["dayGrid", "timeGrid"],
                    header: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay"
                    },
                    buttonText:{
                        today:    'Hoy',
                        month:    'Mes',
                        week:     'Semana',
                        day:      'Día',
                        list:     'Lista'
                    },
                    locale: 'es',
                    defaultDate: "2020-10-11",
                    navLinks: !0,
                    selectable: !0,
                    selectMirror: !0,
                    select: function(e) {
                        var t = prompt("Event Title:");
                        t && a.addEvent({
                            title: t,
                            start: e.start,
                            end: e.end,
                            allDay: e.allDay
                        }),
                        a.unselect()
                    },
                    editable: !0,
                    eventLimit: !0,
                    events: events,
                    eventClick: function(e) {
                        alert('Envio a otra pagina')
                    }
                });

                a.render()
              },
              error: function (jqXHR, textStatus, errorThrown) {
                  console.log('error');
                  console.log('error(s):' + textStatus, errorThrown);
              }
          });

        },


    }
})();
