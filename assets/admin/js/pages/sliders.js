const formulario = document.querySelector('#formulario');
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');

const id = document.querySelector('#id');
const titulo = document.querySelector('#titulo');
const subtitulo = document.querySelector('#subtitulo');
const foto = document.querySelector('#foto');
const foto_actual = document.querySelector('#foto_actual');
const containerPreview = document.querySelector('#containerPreview');

const errorTitulo = document.querySelector('#errorTitulo');
const errorSubTitulo = document.querySelector('#errorSubTitulo');
const errorFoto = document.querySelector('#errorFoto');

document.addEventListener('DOMContentLoaded', function () {
    foto.addEventListener('change', function (e) {
        foto_actual.value = '';
        if (e.target.files[0].type == 'image/png' ||
            e.target.files[0].type == 'image/jpg' ||
            e.target.files[0].type == 'image/jpeg') {
            const url = e.target.files[0];
            const tmpUrl = URL.createObjectURL(url);
            containerPreview.innerHTML = `<img class="img-thumbnail" src="${tmpUrl}" width="200">
            <button class="btn btn-danger" type="button" onclick="deleteImg()"><i class="fas fa-trash"></i></button>`;
        } else {
            foto.value = '';
            alertaPersonalizada('warning', 'SOLO SE PERMITEN IMG DE TIPO PNG-JPG-JPEG');
        }
    })
    //limpiar campos
    btnNuevo.addEventListener('click', function () {
        id.value = '';
        btnAccion.textContent = 'Registrar';
        formulario.reset();
        deleteImg();
        limpiarCampos();
    })
    //registrar sliders
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        limpiarCampos();
        console.log(subtitulo.value);
        if (titulo.value == '') {
            errorTitulo.textContent = 'EL ESTILO ES REQUERIDO';
        } else if (subtitulo.value == '') {
            errorSubTitulo.textContent = 'LA DESCRIPCIÓN ES REQUERIDO';
        } else {
            const url = base_url + 'sliders/registrar';
            insertarRegistros(url, this, id, null, btnAccion, false);
        }
    })
})

function deleteImg() {
    foto.value = '';
    containerPreview.innerHTML = '';
    foto_actual.value = '';
}

function eliminarSlider(idSlider) {
    const url = base_url + 'sliders/eliminar/' + idSlider;
    eliminarRegistros(url, null);
}

function restaurarSlider(idSlider) {
    const url = base_url + 'sliders/restaurar/' + idSlider;
    restaurarRegistro(url, null);
}

function editarSlider(idSlider) {
    limpiarCampos();
    const url = base_url + 'sliders/editar/' + idSlider;
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
            titulo.value = res.titulo;
            //editorDescripcion.setData(res.subtitulo);
            subtitulo.value = res.subtitulo;
            foto_actual.value = res.foto;
            containerPreview.innerHTML = `<img class="img-thumbnail" src="${ruta_principal + 'assets/img/sliders/' + res.foto}" width="200">
            <button class="btn btn-danger" type="button" onclick="deleteImg()"><i class="fas fa-trash"></i></button>`;
            btnAccion.textContent = 'Actualizar';
            firstTab.show()
        }
    }
}

function limpiarCampos() {
    errorTitulo.textContent = '';
    errorSubTitulo.textContent = '';
}