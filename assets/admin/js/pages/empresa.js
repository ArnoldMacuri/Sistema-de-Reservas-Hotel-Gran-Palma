const formulario = document.querySelector('#formulario');
const btnAccion = document.querySelector('#btnAccion');

const num_identidad = document.querySelector('#num_identidad');
const nombre = document.querySelector('#nombre');
const telefono = document.querySelector('#telefono');
const correo = document.querySelector('#correo');
const direccion = document.querySelector('#direccion');
const id = document.querySelector('#id');

document.addEventListener('DOMContentLoaded', function () {
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        if (num_identidad.value == '' || nombre.value == ''
         || id.value == '' || correo.value == '' || telefono.value == '' || direccion.value == '') {
            alertaSW('TODO LOS CAMPOS CON * SON REQUERIDOS', 'warning');
        } else {
            const url = base_url + 'empresa/modificar';
            insertarRegistros(url, this, id, null, btnAccion, false);
        }

    })
})


function eliminarCliente(idCliente) {
    const url = base_url + 'clientes/eliminar/' + idCliente;
    eliminarRegistros(url, tblClientes);
}

function editarCliente(idCliente) {
    const url = base_url + 'clientes/editar/' + idCliente;
    //hacer una instancia del objeto XMLHttpRequest 
    const http = new XMLHttpRequest();
    //Abrir una Conexion - POST - GET
    http.open('GET', url, true);
    //Enviar Datos
    http.send();
    //verificar estados
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            id.value = res.id;
            mensaje.value = res.mensaje;
            num_identidad.value = res.num_identidad;
            nombre.value = res.nombre;
            apellido.value = res.apellido;
            telefono.value = res.telefono;
            correo.value = res.correo;
            direccion.value = res.direccion;
            btnAccion.textContent = 'Actualizar';
            firstTab.show()
        }
    }
}