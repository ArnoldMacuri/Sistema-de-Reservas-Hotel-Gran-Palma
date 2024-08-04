const myModal = new bootstrap.Modal(document.getElementById("modalTicket"));
const contentTicket = document.querySelector("#content-ticket");
var tablaReservas;
document.addEventListener("DOMContentLoaded", function () {
  tablaReservas = new DataTable("#tblReservas", {
    responsive: true,
    select: true,
    ajax: {
      url: base_url + "reserva/listarReservas",
      dataSrc: "",
    },
    columns: [
      { data: "item" },
      { data: "fecha_ingreso" },
      { data: "fecha_salida" },
      { data: "monto" },
      { data: "estilo" },
      { data: "metodo" },
      {
        data: null,
        render: function (data, type, row) {
          return (
            '<button class="btn btn-danger btn-generar-ticket btn-sm" data-id="' +
            row.id +
            '">Ticket</button>'
          );
        },
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json",
    },
    initComplete: function() {

      var table = this.api();

      table.on('dblclick', 'tr', function() {
          var data = table.row(this).data();
          var id = data.id;
          window.location = base_url + 'dashboard/calificacion/' + id;
      });
  }
  });

  // Agregar evento al botón para generar reporte por fila
  document
    .getElementById("tblReservas")
    .addEventListener("click", function (event) {
      var target = event.target;
      if (target.classList.contains("btn-generar-ticket")) {
        var id = target.getAttribute("data-id");
        generarReporte(id);
      }
    });
});

function generarReporte(id) {
  contentTicket.src = base_url + "dashboard/ticket/" + id;
  myModal.show();
}
