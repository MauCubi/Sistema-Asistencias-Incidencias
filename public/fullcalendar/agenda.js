document.addEventListener("DOMContentLoaded", function() {
    let formulario = document.querySelector("form");

    var calendarEl = document.getElementById("agenda");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        locale: "es",
        editable: true,

        displayEventTime:false,
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth, listWeek"
        },

        aspectRatio: 2,

        events: "http://asistencias.test/event/mostrar",        

  

        dateClick: function(info) {
            formulario.reset();

            formulario.start.value = info.dateStr;
            formulario.end.value = info.dateStr;

            $("#event").modal("show");
        },

        eventClick: function(info) {
            var evento = info.event;
            console.log(evento);

            axios
                .post("/event/editar/" + info.event.id)
                .then(response => {
                    console.log(response);

                    formulario.id.value = response.data.id;

                    formulario.title.value = response.data.title;

                    formulario.description.value = response.data.description;

                    formulario.start.value = response.data.start;
                    formulario.end.value = response.data.end;
                    $("#event").modal("show");
                })
                .catch(error => {
                    console.log(error.response);
                });
        }
    });

    calendar.render();

    document.getElementById("btnGuardar").addEventListener("click", function() {
        enviarDatos("/event/store");

    });

    document
        .getElementById("btnEliminar")
        .addEventListener("click", function() {

            enviarDatos("/event/borrar/" + formulario.id.value);

        });


        document
        .getElementById("btnEditar")
        .addEventListener("click", function() {
        enviarDatos("/event/actualizar/" + formulario.id.value);
        });



        function enviarDatos(url){

            const datos = new FormData(formulario);

            

            axios
                .post(url, datos)
                .then(response => {
                    console.log(response);
                    calendar.refetchEvents();
                    $("#event").modal("hide");
                })
                .catch(error => {
                    console.log(error.response);
                });
        }



});
