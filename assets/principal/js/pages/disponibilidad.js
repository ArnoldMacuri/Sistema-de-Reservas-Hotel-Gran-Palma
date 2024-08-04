const frm = document.querySelector("#formulario");
document.addEventListener("DOMContentLoaded", function () {
  //VALIDAR CAMPOS
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    if (
      frm.f_llegada.value == "" ||
      frm.f_salida.value == "" ||
      frm.habitacion.value == ""
    ) {
        alertaSW('TODO LOS CAMPOS SON REQUERIDOS', 'warning');
    } else {
      this.submit();
    }
  });
});