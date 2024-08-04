const formulario = document.querySelector("#formulario");
const id = document.querySelector("#id");
const btnAccion = document.querySelector("#btnAccion");

document.addEventListener("DOMContentLoaded", function () {

  formulario.addEventListener("submit", function (e) {
    e.preventDefault();
    if (formulario.cantidad.value == "" || formulario.comentario.value == "") {
      alertaSW("TODO LOS CAMPOS CON * SON REQUERIDOS", "warning");
    } else {
      const url = base_url + "dashboard/agregarCalificacion";
      insertarRegistros(url, this, id, null, btnAccion, false);
    }
  });
});
