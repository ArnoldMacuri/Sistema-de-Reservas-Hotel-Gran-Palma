<?php include_once 'views/template/header-admin.php';

$total = 0; ?>

<form id="frmRecepcion" autocomplete="off">
    <input type="hidden" name="idRecepcion" value="<?php echo $data['recepcion']['id']; ?>">
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
                                <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $data['recepcion']['id_usuario']; ?>">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input class="form-control" type="text" id="buscarCliente" placeholder="Nombre del cliente" value="<?php echo $data['recepcion']['nombre'] . ' ' . $data['recepcion']['apellido']; ?>" disabled>
                            </div>
                            <span class="text-danger fw-bold mb-2" id="errorCliente"></span>
                            <span class="text-danger fw-bold mb-2" id="errorIdCliente"></span>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Telefono <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input class="form-control" type="text" id="telefonoCliente" placeholder="Telefono" value="<?php echo $data['recepcion']['telefono']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Dirección <span class="text-danger">*</span></label>
                            <ul class="list-group">
                                <?php echo $data['recepcion']['direccion']; ?>
                            </ul>
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="tipodoc">Tipo Documento <span class="text-danger">*</span></label>
                            <select id="tipodoc" class="form-control" name="tipodoc">
                                <option value="">Seleccionar</option>
                                <option value="DNI" <?php echo ($data['recepcion']['tipodoc'] == 'DNI') ? 'selected' : ''; ?>>DNI</option>
                                <option value="PASAPORTE" <?php echo ($data['recepcion']['tipodoc'] == 'PASAPORTE') ? 'selected' : ''; ?>>PASAPORTE</option>
                            </select>
                            <span class="text-danger fw-bold mb-2" id="errorTipodoc"></span>
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="pasajeros">Pasajeros <span class="text-danger">*</span></label>
                            <input id="pasajeros" class="form-control" type="number" name="pasajeros" max="<?php echo $data['habitacion']['capacidad']; ?>" value="1" placeholder="Pasajeros">
                            <span class="text-danger fw-bold mb-2" id="errorPasajeros"></span>
                        </div>
                        <div class="col-md-12 form-group mb-2">
                            <label for="obscliente">Observaciones</label>
                            <textarea id="obscliente" class="form-control" name="obscliente" rows="3" placeholder="Observaciones"><?php echo $data['recepcion']['obscliente']; ?></textarea>
                        </div>
                        <?php if (!empty($data['ventas'])) { ?>
                            <div class="col-md-12">
                                <h4 class="text-center">Adicional</h4>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>SubTotal</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['ventas'] as $producto) {
                                                $productos = json_decode($producto['productos'], true);
                                                foreach ($productos as $row) {
                                                    $total += ($row['cantidad'] * $row['precio']);
                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['cantidad'] . ' x ' . $row['nombre']; ?></td>
                                                        <td><?php echo number_format($row['precio'], 2); ?></td>
                                                        <td><?php echo number_format($row['cantidad'] * $row['precio'], 2); ?></td>
                                                        <td><?php echo $producto['fecha']; ?></td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                            <tr>
                                                <td class="text-right" colspan="3">Total</td>
                                                <td class="text-right"><?php echo number_format($total, 2); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>
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
                        <div class="col-md-12 mb-2">
                            <label>Fecha Ingreso<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <input class="form-control" type="text" name="fecha_ingreso" id="fecha_ingreso" value="<?php echo fechaPerzo($data['recepcion']['fecha_ingreso']); ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Fecha Salida <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <input class="form-control" type="text" name="fecha_salida" id="fecha_salida" value="<?php echo fechaPerzo($data['recepcion']['fecha_salida']); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-12 mb-2">
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" class="form-control" name="descripcion" rows="3" placeholder="Descripción"><?php echo $data['recepcion']['descripcion']; ?></textarea>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text">Total</span>
                                <input class="form-control bg-white" type="text" value="<?php echo number_format($data['recepcion']['precio'], 2); ?>" readonly>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text">Adelanto</span>
                                <input class="form-control bg-white" type="text" value="<?php echo number_format($data['recepcion']['adelanto'], 2); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text">Ventas</span>
                                <input class="form-control bg-white" type="text" value="<?php echo number_format($total, 2); ?>" readonly>
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text">Pendiente</span>
                                <input class="form-control bg-white" type="text" value="<?php echo number_format(($data['recepcion']['precio'] + $total) - $data['recepcion']['adelanto'], 2); ?>" readonly>
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
<?php include_once 'views/template/footer-admin.php'; ?>