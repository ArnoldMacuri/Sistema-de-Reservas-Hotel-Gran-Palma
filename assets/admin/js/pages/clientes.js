let tblClientes, editorDireccion;

const formulario = document.querySelector('#formulario');
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');

const identidad = document.querySelector('#identidad');
const num_identidad = document.querySelector('#num_identidad');
const nombre = document.querySelector('#nombre');
const apellido = document.querySelector('#apellido');
const telefono = document.querySelector('#telefono');
const correo = document.querySelector('#correo');
const direccion = document.querySelector('#direccion');
const id = document.querySelector('#id');

document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datatables
    tblClientes = $('#tblClientes').DataTable({
        ajax: {
            url: base_url + 'clientes/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'identidad' },
            { data: 'num_identidad' },
            { data: 'nombre' },
            { data: 'telefono' },
            { data: 'correo' },
            { data: 'direccion' },
            { data: 'acciones' },
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-ES.json',
        },
        responsive: true,
        order: [[0, 'desc']],
    });
    //limpiar campos
    btnNuevo.addEventListener('click', function () {
        id.value = '';
        btnAccion.textContent = 'Registrar';
        formulario.reset();
    })
    //registrar clientes
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        if (identidad.value == '' || num_identidad.value == '' || nombre.value == ''
         || apellido.value == '' || correo.value == '' || telefono.value == '' || direccion.value == '') {
            alertaSW('TODO LOS CAMPOS CON * SON REQUERIDOS', 'warning');
        } else {
            const url = base_url + 'clientes/registrar';
            insertarRegistros(url, this, id, tblClientes, btnAccion, false);
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
            identidad.value = res.identidad;
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