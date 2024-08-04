<?php include_once 'views/template/header-admin.php'; ?>

<a class="btn btn-primary mb-2" href="<?php echo RUTA_ADMIN . 'reservas'; ?>">Atras</a>

<form id="frmReserva" autocomplete="off">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center"><i class="fas fa-tags"></i> Nueva Reserva</h5>
            <hr>
            <div class="row">
                <div class="form-group col-md-3 mb-2">
                    <label for="fecha_ingreso">Fecha Ingreso</label>
                    <input id="fecha_ingreso" class="form-control" type="date" name="fecha_ingreso">
                    <span class="text-danger fw-bold mb-2" id="errorFecha_ingreso"></span>
                </div>
                <div class="form-group col-md-3 mb-2">
                    <label for="fecha_salida">Fecha Salida</label>
                    <input id="fecha_salida" class="form-control" type="date" name="fecha_salida">
                    <span class="text-danger fw-bold mb-2" id="errorFecha_salida"></span>
                </div>
                <div class="form-group col-md-6 mb-2">
                    <label for="habitacion">Habitación</label>
                    <select id="habitacion" class="form-control" name="habitacion">
                        <option value="">Seleccionar</option>
                        <?php foreach ($data['habitaciones'] as $habitacion) { ?>
                            <option value="<?php echo $habitacion['id']; ?>"><?php echo $habitacion['estilo'] . ' - ' . $habitacion['precio'] . ' Capacidad = ' . $habitacion['capacidad']; ?></option>
                        <?php } ?>
                    </select>
                    <span class="text-danger fw-bold mb-2" id="errorHabitacion"></span>
                </div>
                <div class="col-md-6 mb-2">
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
                <div class="col-md-6 mb-2">
                    <label>Telefono <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input class="form-control" type="text" id="telefonoCliente" placeholder="Telefono" disabled>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Dirección <span class="text-danger">*</span></label>
                    <ul class="list-group">
                        <li class="list-group-item" id="direccionCliente"><i class="fas fa-home"></i></li>
                    </ul>
                </div>
                <div class="form-group col-md-6 mb-2">
                    <label for="total">Total</label>
                    <input id="total" class="form-control" type="text" name="total" disabled>
                </div>
                <div class="col-md-12 form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion" class="form-control" name="descripcion" rows="3" placeholder="Observaciones"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button class="btn btn-primary" type="submit">Procesar</button>
        </div>
    </div>
</form>

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