let tblUsuarios;
const formulario = document.querySelector('#formulario');
const nombres = document.querySelector('#nombres');
const apellidos = document.querySelector('#apellidos');
const correo = document.querySelector('#correo');
const usuario = document.querySelector('#usuario');
const clave = document.querySelector('#clave');
const rol = document.querySelector('#rol');
const id = document.querySelector('#id');

const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');

document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datatables
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + 'usuarios/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'item' },
            { data: 'nombres' },
            { data: 'correo' },
            { data: 'rol' },
            { data: 'acciones' }
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-ES.json',
        },
        responsive: true,
        order: [[0, 'desc']],
    });
    //Limpiar Campos
    btnNuevo.addEventListener('click', function () {
        id.value = '';
        btnAccion.textContent = 'Registrar';
        clave.removeAttribute('readonly');
        formulario.reset();
        nombres.focus();
    })
    //registrar usuarios
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        if (usuario.value == '' || nombres.value == '' || apellidos.value == '' || correo.value == ''
        || clave.value == '' || rol.value == '') {
            alertaSW('TODO LOS CAMPOS CON * SON REQUERIDOS', 'warning');
        } else {
            const url = base_url + 'usuarios/registrar';
            insertarRegistros(url, this, id, tblUsuarios, btnAccion, true);
        }
    })

})
//function para elimnar usuario
function eliminarUsuario(idUsuario) {
    const url = base_url + 'usuarios/eliminar/' + idUsuario;
    eliminarRegistros(url, tblUsuarios);
}
// function para recuperar los datos
function editarUsuario(idUsuario) {
    const url = base_url + 'usuarios/editar/' + idUsuario;
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
            nombres.value = res.nombre;
            apellidos.value = res.apellido;
            correo.value = res.correo;
            usuario.value = res.usuario;
            direccion.value = res.direccion;
            rol.value = res.rol;
            clave.value = '0000000';
            clave.setAttribute('readonly', 'readonly');
            btnAccion.textContent = 'Actualizar';
            firstTab.show()
        }
    }
}