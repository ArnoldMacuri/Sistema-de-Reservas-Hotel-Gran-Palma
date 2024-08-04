<?php include_once 'views/template/header-admin.php'; ?>

<div class="card">
    <div class="card-body">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-banner-tab" data-bs-toggle="tab" data-bs-target="#nav-banner" type="button" role="tab" aria-controls="nav-banner" aria-selected="true">Banner</button>
                <button class="nav-link" id="nav-nuevo-tab" data-bs-toggle="tab" data-bs-target="#nav-nuevo" type="button" role="tab" aria-controls="nav-nuevo" aria-selected="false">Nuevo</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mt-2" id="nav-banner" role="tabpanel" aria-labelledby="nav-banner-tab" tabindex="0">
                <h5 class="card-title text-center"><i class="fas fa-list"></i> Listado de Sliders</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover nowrap" id="tblSliders" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Título</th>
                                <th>SubTítulo</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data['sliders'] as $slider) { ?>
                                <tr>
                                    <td><img src="<?php echo RUTA_PRINCIPAL . 'assets/img/sliders/' . $slider['foto']; ?>" alt="FOTO" width="100"></td>
                                    <td><?php echo $slider['titulo']; ?></td>
                                    <td><?php echo $slider['subtitulo']; ?></td>
                                    <td>
                                        <?php if ($slider['estado'] == 1) {
                                            echo '<div>
                                                <button class="btn btn-danger btn-sm" type="button" onclick="eliminarSlider(' . $slider['id'] . ')"><i class="fas fa-trash"></i></button>
                                                <button class="btn btn-info btn-sm" type="button" onclick="editarSlider(' . $slider['id'] . ')"><i class="fas fa-edit"></i></button>
                                            </div>';
                                            } else {
                                               echo '<div>
                                                <button class="btn btn-warning btn-sm" type="button" onclick="restaurarSlider(' . $slider['id'] . ')"><i class="fas fa-check-circle"></i></button>
                                            </div>';
                                        } ?>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade p-3" id="nav-nuevo" role="tabpanel" aria-labelledby="nav-nuevo-tab" tabindex="0">
                <form id="formulario" autocomplete="off">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="foto_actual" name="foto_actual">
                    <div class="row mb-3">
                        <div class="col-md-5 mb-3">
                            <label for="titulo">Título <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-border-top-left"></i></span>
                                <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Nombre">
                            </div>
                            <span id="errorTitulo" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="subtitulo">SubTítulo <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="subtitulo" id="subtitulo" placeholder="Descrpcion">
                            </div>
                            <span id="errorSubTitulo" class="text-danger"></span>
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

<?php include_once 'views/template/footer-admin.php'; ?>

<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/js/pages/sliders.js'; ?>"></script>

</body>

</html>