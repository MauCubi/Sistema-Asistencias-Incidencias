document.addEventListener("DOMContentLoaded", function() {
    let formulario = document.querySelector("form");

    var calendarEl = document.getElementById("agenda");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        locale: "es",

        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth, timeGridWeek, listWeek"
        },

        aspectRatio: 2,

        events: "http://asistencias.test/event/mostrar",

        

        dateClick: function(info) {
            formulario.reset();

            formulario.start.value=info.dateStr;
            formulario.end.value=info.dateStr;

            $("#event").modal("show");
        },

        eventClick: function(info){
            var evento = info.event;
            console.log(evento);


            axios
            .post("/event/editar/" + info.event.id)
            .then(response => {
                console.log(response);

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
        const datos = new FormData(formulario);
        console.log(formulario.name.value);

        axios
            .post("/event/store", datos)
            .then(response => {
                console.log(response);
                calendar.refetchEvents();
                $("#event").modal("hide");
            })
            .catch(error => {
                console.log(error.response);
            });
    });
});
