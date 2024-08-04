const anio = document.querySelector('#anio');
document.addEventListener('DOMContentLoaded', function(){
    reporteReserva();
})

function reporteReserva() {
  const url = base_url + "dashboard/reporteReserva/" + anio.value;
  //hacer una instancia del objeto XMLHttpRequest
  const http = new XMLHttpRequest();
  //Abrir una Conexion - POST - GET
  http.open("GET", url, true);
  //Enviar Datos
  http.send();
  //verificar estados
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      console.log(res);
      document.querySelector("#totalreserva").textContent =
        "$" + res.totalReservas;
      var ctx = document.getElementById("chart5").getContext("2d");

      var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke1.addColorStop(0, "#17ead9");
      gradientStroke1.addColorStop(1, "#6078ea");

      var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke2.addColorStop(0, "#f80759");
      gradientStroke2.addColorStop(1, "#bc4e9c");

      var myChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: [
            "Ene",
            "Feb",
            "Mar",
            "Abr",
            "May",
            "Jun",
            "Jul",
            "Ago",
            "Sep",
            "Oct",
            "Nov",
            "Dic",
          ],
          datasets: [
            {
              label: "Reservas",
              data: [
                res.reserva.ene,
                res.reserva.feb,
                res.reserva.mar,
                res.reserva.abr,
                res.reserva.may,
                res.reserva.jun,
                res.reserva.jul,
                res.reserva.ago,
                res.reserva.sep,
                res.reserva.oct,
                res.reserva.nov,
                res.reserva.dic,
              ],
              pointBorderWidth: 2,
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: gradientStroke2,
              backgroundColor: gradientStroke2,
              borderColor: gradientStroke2,
              borderWidth: 2,
            },
          ],
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false,
            labels: {
              boxWidth: 40,
            },
          },
          tooltips: {
            displayColors: false,
          },
        },
      });
    }
  };
}
