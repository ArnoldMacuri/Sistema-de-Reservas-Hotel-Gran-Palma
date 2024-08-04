<?php include_once 'views/template/header-admin.php'; ?>

<div class="row">
    <div class="col-md-12">
        <h6 class="mb-0 text-uppercase">Habitaciones</h6>
        <hr />
        <span class="badge bg-success"><i class="fas fa-check-circle"></i> Disponible</span>
        <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Ocupado</span>
        <span class="badge bg-warning text-dark"><i class="fa-solid fa-calendar-xmark"></i> Reservado</span>
        <span class="badge bg-info text-dark"><i class="fa-solid fa-broom"></i> Limpieza</span>
        <hr />
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
            <?php foreach ($data['habitaciones'] as $habitacion) {
                if ($habitacion['disponible'] == 'disponible') { ?>
                    <a class="col" href="<?php echo RUTA_ADMIN . 'recepcion/recepcion/' . $habitacion['id']; ?>">
                        <div class="card border-primary border-top border-4 border-0 bg-success" style="cursor: pointer;">
                            <img src="<?php echo RUTA_BASE . $habitacion['foto']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><span class="badge bg-info border">N° <?php echo $habitacion['numero']; ?></span></h5>
                                <hr>
                                <p class="text-white"><i class="fa-solid fa-arrow-up-from-water-pump"></i> <?php echo $habitacion['estilo']; ?></p>
                                <p class="text-white"><i class="fa-solid fa-check-circle"></i> Disponible</p>
                                <hr>
                                <p class="text-white"><i class="fa-solid fa-calendar"></i> <?php echo fechaPerzo(date('Y-m-d')); ?></p>
                            </div>
                        </div>
                    </a>
                <?php } else if ($habitacion['disponible'] == 'ocupado') { ?>
                    <a class="col" href="<?php echo RUTA_ADMIN . 'recepcion/finalizar/' . $habitacion['id_recepcion']; ?>">
                        <div class="card border-primary border-top border-4 border-0 bg-danger" style="cursor: pointer;">
                            <img src="<?php echo RUTA_BASE . $habitacion['foto']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><span class="badge bg-info border">N° <?php echo $habitacion['numero']; ?></span></h5>
                                <hr>
                                <p class="text-white"><i class="fa-solid fa-arrow-up-from-water-pump"></i> <?php echo $habitacion['estilo']; ?></p>
                                <p class="text-white"><i class="fa-solid fa-calendar"></i> <?php echo fechaPerzo($habitacion['desde']); ?></p>
                                <hr>
                                <p class="text-white"><i class="fa-solid fa-calendar"></i> <?php echo fechaPerzo($habitacion['hasta']); ?></p>
                            </div>
                        </div>
                    </a>
                <?php } else if ($habitacion['disponible'] == 'reservado') { ?>
                    <a class="col" href="<?php echo RUTA_ADMIN . 'recepcion/proceso/' . $habitacion['id_reserva']; ?>">
                        <div class="card border-primary border-top border-4 border-0 bg-warning" style="cursor: pointer;">
                            <img src="<?php echo RUTA_BASE . $habitacion['foto']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><span class="badge bg-info border">N° <?php echo $habitacion['numero']; ?></span></h5>
                                <hr>
                                <p class="text-dark"><i class="fa-solid fa-arrow-up-from-water-pump"></i> <?php echo $habitacion['estilo']; ?></p>
                                <p class="text-dark"><i class="fa-solid fa-calendar"></i> <?php echo fechaPerzo($habitacion['desde']); ?></p>
                                <hr>
                                <p class="text-dark"><i class="fa-solid fa-calendar"></i> <?php echo fechaPerzo($habitacion['hasta']); ?></p>
                            </div>
                        </div>
                    </a>
                <?php } else if ($habitacion['disponible'] == 'limpieza') { ?>
                    <a class="col" href="<?php echo RUTA_ADMIN . 'recepcion/limpieza/' . $habitacion['id']; ?>">
                        <div class="card border-primary border-top border-4 border-0 bg-info" style="cursor: pointer;">
                            <img src="<?php echo RUTA_BASE . $habitacion['foto']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><span class="badge bg-info border">N° <?php echo $habitacion['numero']; ?></span></h5>
                                <hr>
                                <p class="text-white"><i class="fa-solid fa-arrow-up-from-water-pump"></i> <?php echo $habitacion['estilo']; ?></p>
                                <p class="text-white"><i class="fa-solid fa-broom"></i> Limpieza</p>
                                <hr>
                                <p class="text-white"><i class="fa-solid fa-calendar"></i> <?php echo fechaPerzo(date('Y-m-d')); ?></p>
                            </div>
                        </div>
                    </a>
            <?php }
            } ?>
        </div>
    </div>
</div>

<?php include_once 'views/template/footer-admin.php'; ?>