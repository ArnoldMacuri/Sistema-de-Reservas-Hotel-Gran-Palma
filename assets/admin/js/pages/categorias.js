let tblCategorias;
const formulario = document.querySelector('#formulario');
const id = document.querySelector('#id');
const nombre = document.querySelector('#nombre');
const errorNombre = document.querySelector('#errorNombre');
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');

var columnMapping = {
    'id': 0,
    'categoria': 1,
    'fecha': 2
    // Agrega más columnas según tus necesidades
};

document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datatables
    tblCategorias = new DataTable('#tblCategorias', {
        processing: true,
        ajax: {
            url: base_url + 'categorias/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'categoria' },
            {
                data: null,
                render: function (data, type) {
                    if (type === 'display') {
                        return `<div class="btn-group" role="group" aria-label="Button group">
                            <button class="btn btn-danger btn-sm" type="button" onclick="eliminarCategoria(${data.id})"><i class="fas fa-trash"></i></button>
                            <button class="btn btn-info btn-sm" type="button" onclick="editarCategoria(${data.id})"><i class="fas fa-edit"></i></button>
                        </div>`;
                    }
                    return data;
                },
            }
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-ES.json',
        },
        responsive: true,
        order: [[0, 'desc']],
    });

    btnNuevo.addEventListener('click', function () {
        id.value = '';
        errorNombre.textContent = '';
        btnAccion.textContent = 'Registrar';
        formulario.reset();
    })
    //registrar categorias
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        if(nombre.value == ''){
            alertaSW('TODO LOS CAMPOS CON * SON REQUERIDOS', 'warning');
        }else{
            const url = base_url + 'categorias/registrar';
            insertarRegistros(url, this, id, tblCategorias, btnAccion, false);
        }
    });
})

function eliminarCategoria(idCategoria) {
    const url = base_url + 'categorias/eliminar/' + idCategoria;
    eliminarRegistros(url, tblCategorias);
}

function editarCategoria(idCategoria) {
    errorNombre.textContent = '';
    const url = base_url + 'categorias/editar/' + idCategoria;
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
            nombre.value = res.categoria;
            btnAccion.textContent = 'Actualizar';
            firstTab.show()
        }
    }
}