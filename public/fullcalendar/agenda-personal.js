document.addEventListener("DOMContentLoaded", function() {
    
    //Lo mismo que agenda.js pero para eventos personales, van a cambiar algunas cosas como "events:"
    //Que ahora usa la ruta/controlador para eventos personales
    var calendarEl = document.getElementById("agenda");

    // let formulario = document.getElementById("event-form");
    let labelin = document.getElementById("title");
    let labelin2 = document.getElementById("description");

    let labelin3 = document.getElementById("tipoevento");

    let labelin4 = document.getElementById("start");

    let labelin5 = document.getElementById("end");

    $('#start').html().substr(0.8);




    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        locale: "es",
        editable: true,
        //allDay : true,
        displayEventTime:false,
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth, listWeek"
        },

        //aspectRatio: 2,
        //nextDayThreshold: '09:00:00',
        events: "http://asistencias.test/event/personal",        

  

        // dateClick: function(info) {
        //     formulario.reset();
            

        //     // formulario.description.value = info.dateStr;
        //     formulario.start.value = info.dateStr;
        //     formulario.end.value = info.dateStr;

        //     $("#event").modal("show");
        // },

        eventClick: function(info) {
            var evento = info.event;
            console.log(evento);

            axios
                .post("/event/editar/" + info.event.id)
                .then(response => {
                    labelin.innerHTML = response.data.title;

                    labelin2.innerHTML = response.data.description; 
                    // labelin3.innerHTML = response.data.tipoevento_id;

                    response.data.start = response.data.start

                    var d1 = new Date(response.data.start);
                    var d2 = new Date(response.data.end);
                    //var str = d1.toString("YYYY MM DD");
                    // Date.parse(d1).toString("YYYY");
                    // var dateString = moment(d1).format('YYYY-MM-DD');
                    // d1.formatDate('YYYY-MM-DD');
                    labelin4.innerHTML = d1.getDate() + '-' + d1.getMonth() + '-' + d1.getFullYear();
                    labelin5.innerHTML = d2.getDate() + '-' + d2.getMonth() + '-' + d2.getFullYear();
                    $("#event").modal("show");
                })
                .catch(error => {
                    console.log(error.response);
                });
        }
    });

    calendar.render();

    // document.getElementById("btnGuardar").addEventListener("click", function() {
    //     enviarDatos("/event/store");

    // });

    // document
    //     .getElementById("btnEliminar")
    //     .addEventListener("click", function() {

    //         enviarDatos("/event/borrar/" + formulario.id.value);

    //     });


    //     document
    //     .getElementById("btnEditar")
    //     .addEventListener("click", function() {
    //     enviarDatos("/event/actualizar/" + formulario.id.value);
    //     });



        // function enviarDatos(url){

        //     const datos = new FormData(formulario);

            

        //     axios
        //         .post(url, datos)
        //         .then(response => {
        //             console.log(response);
        //             calendar.refetchEvents();
        //             $("#event").modal("hide");
        //         })
        //         .catch(error => {
        //             console.log(error.response);
        //         });
        // }



});
