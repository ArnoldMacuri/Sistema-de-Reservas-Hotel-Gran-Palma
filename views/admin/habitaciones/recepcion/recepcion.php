<?php include_once 'views/template/header-admin.php'; ?>

<form id="frmRecepcion" autocomplete="off">
    <input type="hidden" name="idHabitacion" value="<?php echo $data['habitacion']['id']; ?>">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['habitacion']['estilo']; ?></h5>
                    <hr>
                    <p class="card-text">N° <?php echo $data['habitacion']['numero']; ?> / <span class="badge bg-success">Disponible</span></p>
                    <p class="card-text">Precio/Noche <span class="badge bg-info"><?php echo $data['habitacion']['precio']; ?></span></p>
                    <p class="card-text">Capacidad <span class="badge bg-primary"><?php echo $data['habitacion']['capacidad']; ?></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php echo RUTA_BASE . $data['habitacion']['foto']; ?>" alt="<?php echo $data['habitacion']['estilo']; ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Descripción</h5>
                            <hr>
                            <p class="card-text"><?php echo $data['habitacion']['descripcion']; ?></p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datos del cliente</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label>Buscar Cliente <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="hidden" id="idCliente" name="idCliente" value="">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input class="form-control" type="text" id="buscarCliente" placeholder="Buscar Cliente">
                                <button class="btn btn-primary" type="button" id="btnCliente"><i class="fas fa-plus"></i></button>
                            </div>
                            <span class="text-danger fw-bold mb-2" id="errorCliente"></span>
                            <span class="text-danger fw-bold mb-2" id="errorIdCliente"></span>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Telefono <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input class="form-control" type="text" id="telefonoCliente" placeholder="Telefono" disabled>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Dirección <span class="text-danger">*</span></label>
                            <ul class="list-group">
                                <li class="list-group-item" id="direccionCliente"><i class="fas fa-home"></i></li>
                            </ul>
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="tipodoc">Tipo Documento <span class="text-danger">*</span></label>
                            <select id="tipodoc" class="form-control" name="tipodoc">
                                <option value="">Seleccionar</option>
                                <option value="DNI">DNI</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                            </select>
                            <span class="text-danger fw-bold mb-2" id="errorTipodoc"></span>
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="pasajeros">Pasajeros <span class="text-danger">*</span></label>
                            <input id="pasajeros" class="form-control" type="number" name="pasajeros" max="<?php echo $data['habitacion']['capacidad']; ?>" value="1" placeholder="Pasajeros">
                            <span class="text-danger fw-bold mb-2" id="errorPasajeros"></span>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="obscliente">Observaciones</label>
                            <textarea id="obscliente" class="form-control" name="obscliente" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mas informácion</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label>Precio <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                <input class="form-control" type="text" name="precio" id="precio" value="<?php echo $data['habitacion']['precio']; ?>" placeholder="0.00">
                            </div>
                            <span class="text-danger fw-bold mb-2" id="errorPrecio"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Adelanto</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                <input class="form-control" type="text" name="adelanto" id="adelanto" placeholder="0.00">
                            </div>
                        </div>
                        <div class="col-md-8 mb-2">
                            <label>Fecha <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <input class="form-control" type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <span class="text-danger fw-bold mb-2" id="errorFecha"></span>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label>Cant. Noches <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <input class="form-control" type="number" name="noches" id="noches" value="1" placeholder="Noches">
                                <span class="text-danger fw-bold mb-2" id="errorNoches"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 mb-2">
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" class="form-control" name="descripcion" rows="3" placeholder="Descripción"></textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="alert alert-info text-center" role="alert">
                                <h4 class="alert-heading">Total a pagar</h4>
                                <span id="totalPagar"><?php echo $data['habitacion']['precio']; ?></span>
                            </div>
                            <div class="alert alert-warning text-center" role="alert">
                                <h4 class="alert-heading">Restante</h4>
                                <span id="totalRestante"><?php echo $data['habitacion']['precio']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit" id="btnProcesar">Procesar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalCliente" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Nuevo Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCliente" autocomplete="off">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="identidad">Identidad <span class="text-danger">*</span></label>
                                <select id="identidad" class="form-control" name="identidad">
                                    <option value="">Seleccionar</option>
                                    <option value="DNI">DNI</option>
                                    <option value="RUC">RUC</option>
                                </select>
                                <span id="errorIdentidad" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="num_identidad">N° Identidad <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-list"></i></span>
                                <input class="form-control" type="number" name="num_identidad" id="num_identidad" placeholder="N° Identidad">
                            </div>
                            <span id="errorNum_identidad" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nombre">Nombre <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-list"></i></span>
                                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre">
                            </div>
                            <span id="errorNombre" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido">Apellido <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-list"></i></span>
                                <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Apellido">
                            </div>
                            <span id="errorApellido" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono">Teléfono <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input class="form-control" type="number" name="telefono" id="telefono" placeholder="Telefono">
                            </div>
                            <span id="errorTelefono" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="correo">Correo</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input class="form-control" type="text" name="correo" id="correo" placeholder="Correo Electrónico">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="direccion">Dirreción <span class="text-danger">*</span></label>
                                <textarea id="direccion" class="form-control" name="direccion" rows="3" placeholder="Dirección"></textarea>
                            </div>
                            <span id="errorDireccion" class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btnAccion">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once 'views/template/footer-admin.php'; ?>