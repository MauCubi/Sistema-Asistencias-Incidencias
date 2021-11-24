document.addEventListener("DOMContentLoaded", function() {
    

    //Define la variable de calendario, el ID de getelementbyid es un div en el index.blade de eventos.
    //Ese div es donde va a estar el calendario
    var calendarEl = document.getElementById("agenda");
    

    //Varibale que toma los campos del formulario "event-form" en index.blade de eventos.
    let formulario = document.getElementById("event-form");

    let labelin = document.getElementById("title");
    let labelin2 = document.getElementById("description");

    let labelin3 = document.getElementById("tipoevento");

    let labelin4 = document.getElementById("start");

    let labelin5 = document.getElementById("end");

    $('#start').html().substr(0.8);


    //opciones de calendario, formato, idioma, si es editable, etc
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

        //tamaño
        // aspectRatio: 2,

        //events es una funcion propia de fullcalendar, toma que eventos va a mostrar, en este caso
        //se le indica el link que esta en la ruta que dirige al controlador que trae todos los eventos
        events: "http://asistencias.test/event/mostrar",        

  
        //funcion propia del fullcalendar, que hace cuando se le da un click a una fecha
        // dateClick: function(info) {
        //     formulario.reset();           

        //     formulario.start.value = info.dateStr;
        //     formulario.end.value = info.dateStr;

        //     $("#event").modal("show");
        // },

        //funcion propia del fullcalendar, que hace cuando se le da click a un evento
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

    //renderiza el calendari en donde se especifico arriba de todo
    calendar.render();


    //Opciones de que hace cada boton del modal
    // document.getElementById("btnGuardar").addEventListener("click", function() {
    //     enviarDatos("/event/store");

    // });

    // document
    //     .getElementById("btnEliminar")
    //     .addEventListener("click", function() {

    //         enviarDatos("/event/borrar/" + formulario.id.value);

    //     });


        // document
        // .getElementById("btnEditar")
        // .addEventListener("click", function() {
        // enviarDatos("/event/actualizar/" + formulario.id.value);
        // });


        //funcion de enviar los datos por axios, DOLOR DE BOLAS
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
