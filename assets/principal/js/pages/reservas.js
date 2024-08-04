const f_llegada = document.querySelector('#f_llegada');
const f_salida = document.querySelector('#f_salida');
const habitacion = document.querySelector('#habitacion');
document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
      },
      locale: 'es',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      selectable: true,
      events: base_url + 'reserva/listar/' + f_llegada.value + '/' + f_salida.value + '/' + habitacion.value
    });

    calendar.render();
  });