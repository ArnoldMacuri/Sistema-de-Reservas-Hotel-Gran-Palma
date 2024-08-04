<?php include_once 'Views/template/header-admin.php'; ?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title text-center">Datos de de Empresa</h5>
        <hr>
        <form class="p-4" id="formulario" autocomplete="off">
            <input type="hidden" id="id" name="id" value="<?php echo $data['empresa']['id']; ?>">
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-2">
                    <label>N° Identidad <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" id="num_identidad" name="num_identidad" class="form-control" value="<?php echo $data['empresa']['num_identidad']; ?>" placeholder="N° Identidad">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-2">
                    <label>Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-list"></i></span>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['empresa']['nombre']; ?>" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-2">
                    <label>Teléfono <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo $data['empresa']['telefono']; ?>" placeholder="Teléfono">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-2">
                    <label>Correo <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" id="correo" name="correo" class="form-control" value="<?php echo $data['empresa']['correo']; ?>" placeholder="Correo Electrónico">
                    </div>
                </div>

                <div class="col-lg-8 col-sm-6 mb-2">
                    <label>Dirección <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                        <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $data['empresa']['direccion']; ?>" placeholder="Dirección">
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mb-2">
                    <label>Url Facebook</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                        <input type="url" id="facebook" name="facebook" class="form-control" value="<?php echo $data['empresa']['facebook']; ?>" placeholder="facebook">
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mb-2">
                    <label>Url Instagram</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                        <input type="url" id="instagram" name="instagram" class="form-control" value="<?php echo $data['empresa']['instagram']; ?>" placeholder="Instagram">
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mb-2">
                    <label>Url Twitter</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                        <input type="url" id="twitter" name="twitter" class="form-control" value="<?php echo $data['empresa']['twitter']; ?>" placeholder="Twitter">
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 mb-2">
                    <label>Url Whatsapp</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-whatsapp-square"></i></span>
                        <input type="url" id="whatsapp" name="whatsapp" class="form-control" value="<?php echo $data['empresa']['whatsapp']; ?>" placeholder="WhatsApp">
                    </div>
                </div>

                <div class="col-lg-8 col-sm-6 mb-2">
                    <div class="form-group">
                        <label for="mensaje">Mensaje (Opcional)</label>
                        <textarea id="mensaje" class="form-control" name="mensaje" rows="3" placeholder="Mensaje de Agradecimiento"><?php echo $data['empresa']['mensaje']; ?></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="foto">Logo (PNG)</label>
                        <input id="foto" class="form-control" type="file" name="foto">
                    </div>
                    <div id="containerPreview">
                        <img class="img-thumbnail" src="<?php echo RUTA_PRINCIPAL . 'assets/img/logo.png'; ?>" alt="LOGO_PNG" width="200">
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button class="btn btn-primary" type="submit" id="btnAccion">Actualizar</button>
            </div>
        </form>
    </div>
</div>

<?php include_once 'Views/template/footer-admin.php'; ?>

<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/js/pages/empresa.js'; ?>"></script>

</body>

</html>