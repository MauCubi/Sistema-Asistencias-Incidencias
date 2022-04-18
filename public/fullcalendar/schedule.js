document.addEventListener("DOMContentLoaded", function() {
    let formulario = document.querySelector("form");

    var calendarEl = document.getElementById("agenda");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        locale: "es",
        //allDay : true,
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth, timeGridWeek, listWeek"
        },
        //nextDayThreshold: '09:00:00',
        events: "http://asistencias.test/event/mostrar",

        aspectRatio: 2,

        dateClick: function() {
            
            $("#event").modal("show");
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
                $("#event").modal("hide");
            })
            .catch(error => {
                console.log(error.response);
            });
    });
});
