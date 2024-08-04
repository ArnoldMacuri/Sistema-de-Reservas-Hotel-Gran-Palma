<?php include_once 'views/template/header-cliente.php'; ?>

<div class="card">
    <div class="row g-0">
        <div class="col-md-4 border-end">
            <img src="<?php echo RUTA_PRINCIPAL . 'assets/img/habitaciones/' . $data['reserva']['foto']; ?>" class="img-fluid" alt="...">
            <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                <?php foreach ($data['imagenes'] as $imagen) { ?>
                    <div class="col"><img src="<?php echo RUTA_PRINCIPAL . 'assets/img/habitaciones/' . $data['reserva']['id_habitacion'] . '/' . $imagen; ?>" width="70" class="border rounded cursor-pointer" alt="..."></div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h4 class="card-title"><?php echo $data['reserva']['estilo']; ?></h4>
                <div class="d-flex gap-3 py-3">
                    <div class="cursor-pointer">
                        <i class='bx bxs-star <?= ($data['total'] >= 1) ? 'text-warning' : 'text-secondary'; ?>'></i>
                        <i class='bx bxs-star <?= ($data['total'] >= 1.5) ? 'text-warning' : 'text-secondary'; ?>'></i>
                        <i class='bx bxs-star <?= ($data['total'] >= 2.5) ? 'text-warning' : 'text-secondary'; ?>'></i>
                        <i class='bx bxs-star <?= ($data['total'] >= 3.5) ? 'text-warning' : 'text-secondary'; ?>'></i>
                        <i class='bx bxs-star <?= ($data['total'] >= 4.5) ? 'text-warning' : 'text-secondary'; ?>'></i>
                    </div>
                    <div><?php echo count($data['calificaciones']); ?> Opiniones</div>
                    <div class="text-success"><i class='bx bxs-hotel align-middle'></i> <?= $data['totalReserva']['total']; ?> Reservas</div>
                </div>
                <div class="mb-3">
                    <span class="price h4"><?php echo $data['reserva']['precio']; ?></span>
                    <span class="text-muted">/Noche</span>
                </div>
                <p class="card-text fs-6"><?php echo $data['reserva']['descripcion']; ?></p>
                <dl class="row">
                    <dt class="col-sm-3">N° Habitación</dt>
                    <dd class="col-sm-9"><?php echo $data['reserva']['numero']; ?></dd>

                    <dt class="col-sm-3">Capacidad</dt>
                    <dd class="col-sm-9"><?php echo $data['reserva']['capacidad']; ?></dd>
                </dl>
            </div>
        </div>
    </div>
    <hr />
    <div class="card-body">
        <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                        </div>
                        <div class="tab-title"> Calificaciones </div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-star font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Reviews</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="tab-content pt-3">
            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                <h6 class="text-uppercase mb-0">Calificaciones</h6>
                <hr />
                <div class="row row-cols-1 row-cols-lg-3">
                    <?php if (count($data['calificaciones']) > 0) {
                        foreach ($data['calificaciones'] as $calificacion) { ?>

                            <div class="col">
                                <div class="card">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?php echo RUTA_PRINCIPAL . 'assets/img/user.png'; ?>" class="img-fluid" alt="..." />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h6 class="card-title"><?php echo $calificacion['usuario']; ?></h6>
                                                <div class="cursor-pointer my-2">
                                                    <i class="bx bxs-star <?= ($calificacion['cantidad'] >= 1) ? 'text-warning' : 'text-secondary'; ?>"></i>
                                                    <i class="bx bxs-star <?= ($calificacion['cantidad'] >= 2) ? 'text-warning' : 'text-secondary'; ?>"></i>
                                                    <i class="bx bxs-star <?= ($calificacion['cantidad'] >= 3) ? 'text-warning' : 'text-secondary'; ?>"></i>
                                                    <i class="bx bxs-star <?= ($calificacion['cantidad'] >= 4) ? 'text-warning' : 'text-secondary'; ?>"></i>
                                                    <i class="bx bxs-star <?= ($calificacion['cantidad'] == 5) ? 'text-warning' : 'text-secondary'; ?>"></i>
                                                </div>
                                                <div class="clearfix">
                                                    <p class="mb-0 float-start fw-bold">
                                                        <?php echo $calificacion['comentario']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="col-12">
                            <div class="alert alert-warning" role="alert">
                                <strong>Info</strong> No hay calificaciones
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                <form id="formulario" autocomplete="off" method="post">
                    <input type="hidden" id="id" name="id" value="<?php echo $data['reserva']['id_habitacion']; ?>">

                    <div class="rating">
                        <input type="radio" id="star5" name="cantidad" value="5" />
                        <label class="star" for="star5" title="Awesome" aria-hidden="true"><i class="fas fa-star fa-2x"></i></label>
                        <input type="radio" id="star4" name="cantidad" value="4" />
                        <label class="star" for="star4" title="Great" aria-hidden="true"><i class="fas fa-star fa-2x"></i></label>
                        <input type="radio" id="star3" name="cantidad" value="3" />
                        <label class="star" for="star3" title="Very good" aria-hidden="true"><i class="fas fa-star fa-2x"></i></label>
                        <input type="radio" id="star2" name="cantidad" value="2" />
                        <label class="star" for="star2" title="Good" aria-hidden="true"><i class="fas fa-star fa-2x"></i></label>
                        <input type="radio" id="star1" name="cantidad" value="1" />
                        <label class="star" for="star1" title="Bad" aria-hidden="true"><i class="fas fa-star fa-2x"></i></label>
                    </div>

                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentario</label>
                        <textarea class="form-control" name="comentario" id="comentario" rows="3" placeholder="Comentario"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" id="btnAccion" class="btn btn-primary">
                            Calificar
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

<?php include_once 'views/template/footer-cliente.php'; ?>

<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/js/pages/clientes/calificar.js'; ?>"></script>

</body>

</html>