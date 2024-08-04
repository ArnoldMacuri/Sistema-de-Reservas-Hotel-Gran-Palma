<?php include_once 'views/template/header-admin.php'; ?>

<div class="card">
    <div class="card-body">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-habitaciones-tab" data-bs-toggle="tab" data-bs-target="#nav-habitaciones" type="button" role="tab" aria-controls="nav-habitaciones" aria-selected="true">Habitaciones</button>
                <button class="nav-link" id="nav-nuevo-tab" data-bs-toggle="tab" data-bs-target="#nav-nuevo" type="button" role="tab" aria-controls="nav-nuevo" aria-selected="false">Nuevo</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mt-2" id="nav-habitaciones" role="tabpanel" aria-labelledby="nav-habitaciones-tab" tabindex="0">
                <h5 class="card-title text-center"><i class="fas fa-list"></i> Listado de Habitaciones</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover nowrap" id="tblHabitaciones" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Estilo</th>
                                <th>N° habitacion</th>
                                <th>Capacidad</th>
                                <th>Foto</th>
                                <th>Precio</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade p-3" id="nav-nuevo" role="tabpanel" aria-labelledby="nav-nuevo-tab" tabindex="0">
                <form id="formulario" autocomplete="off">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="foto_actual" name="foto_actual">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="estilo">Estilo <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-border-top-left"></i></span>
                                <input class="form-control" type="text" name="estilo" id="estilo" placeholder="Estilo">
                            </div>
                            <span id="errorEstilo" class="text-danger"></span>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="numero">N° de habitación <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                                <input class="form-control" type="text" name="numero" id="numero" placeholder="N° de habitación">
                            </div>
                            <span id="errorNumero" class="text-danger"></span>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="capacidad">Capacidad <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-person-booth"></i></span>
                                <input class="form-control" type="text" name="capacidad" id="capacidad" placeholder="Capacidad">
                            </div>
                            <span id="errorCapacidad" class="text-danger"></span>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="precio">Precio/Noche <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                <input class="form-control" type="number" step="0.01" min="0.01" name="precio" id="precio" placeholder="Precio">
                            </div>
                            <span id="errorPrecio" class="text-danger"></span>
                        </div>

                        <div class="col-md-9 mb-3">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <textarea id="descripcion" class="form-control" name="descripcion" rows="3" placeholder="Descripcion"></textarea>
                            </div>
                            <span id="errorDescripcion" class="text-danger"></span>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="foto">Foto <span class="text-danger">*</span></label>
                                <input id="foto" class="form-control" type="file" name="foto">
                            </div>
                            <span id="errorFoto" class="text-danger"></span>
                            <div id="containerPreview">
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-danger" type="button" id="btnNuevo">Nuevo</button>
                        <button class="btn btn-primary" type="submit" id="btnAccion">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modalGaleria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Imagenes de la Habitación</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo RUTA_ADMIN . 'habitaciones/galeriaImagenes'; ?>" class="dropzone">
                    <input type="hidden" id="idHabitacion" name="idHabitacion">
                </form>
                <div class="text-end mt-3">
                    <button class="btn btn-primary" type="button" id="btnProcesar">Subir Imagenes</button>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row justify-content-between" id="containerGaleria">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'views/template/footer-admin.php'; ?>

<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>

<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/js/pages/habitaciones.js'; ?>"></script>

</body>

</html>