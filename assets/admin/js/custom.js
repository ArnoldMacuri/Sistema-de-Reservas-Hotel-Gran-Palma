const firstTabEl = document.querySelector("#nav-tab button:last-child");
const firstTab = new bootstrap.Tab(firstTabEl);

const primerTabEl = document.querySelector("#nav-tab button:first-child");
const primerTab = new bootstrap.Tab(primerTabEl);

function insertarRegistros(url, idFormulario, idHidden, tbl, idButton, accion) {
  //crear formData
  const data = new FormData(idFormulario);
  //hacer una instancia del objeto XMLHttpRequest
  const http = new XMLHttpRequest();
  //Abrir una Conexion - POST - GET
  http.open("POST", url, true);
  //Enviar Datos
  http.send(data);
  //verificar estados
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      alertaSW(res.msg, res.type);
      if (res.type == "success") {
        if (accion) {
          clave.removeAttribute("readonly");
        }
        if (tbl != null) {
          idHidden.value = "";
          idButton.textContent = "Registrar";
          idFormulario.reset();
          tbl.ajax.reload();
          primerTab.show();
        } else {
          location.reload();
        }
      }
    }
  };
}

function eliminarRegistros(url, tbl) {
  Swal.fire({
    title: "Esta seguro de eliminar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
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
          alertaSW(res.msg, res.type);
          setTimeout(() => {
            if (tbl != null) {
              if (res.type == "success") {
                tbl.ajax.reload();
              }
            } else {
              location.reload();
            }
          }, 1000);
        }
      };
    }
  });
}

function restaurarRegistro(url, tbl) {
  Swal.fire({
    title: "Esta seguro de restaurar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Restaurar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
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
          alertaSW(res.msg, res.type);
          setTimeout(() => {
            if (tbl != null) {
              if (res.type == "success") {
                tbl.ajax.reload();
              }
            } else {
              location.reload();
            }
          }, 1000);
        }
      };
    }
  });
}

function cerrarSesion(ruta) {
  Swal.fire({
    title: "Cerrar Sesión?",
    text: "Esta seguro de cerrar tu cuenta!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, salir!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      let accion = (ruta == 1) ? 'admin/' : '';
      window.location = base_url + accion + "usuarios/salir";
    }
  });
}
