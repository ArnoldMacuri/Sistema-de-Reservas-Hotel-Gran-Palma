<?php include_once 'views/template/header-principal.php';
include_once 'views/template/portada.php'; ?>

<section class="our-rooms-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span>Habitaciones</span>
            <h2>Facinantes habitaciones & suites</h2>
        </div>
        <div class="row">
            <?php foreach ($data['habitaciones'] as $habitacion) { ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="single-rooms-three-wrap">
                        <div class="single-rooms-three">
                            <img src="<?php echo RUTA_PRINCIPAL . 'assets/img/habitaciones/' . $habitacion['foto']; ?>" alt="Image">
                            <div class="single-rooms-three-content">
                                <h3><?= $habitacion['estilo']; ?></h3>
                                <ul class="rating">
                                    <li>
                                        <i class="bx bxs-star <?= ($habitacion['calificacion'] >= 1) ? 'text-warning' : 'text-secondary'; ?>"></i>
                                    </li>
                                    <li>
                                        <i class="bx bxs-star <?= ($habitacion['calificacion'] >= 2) ? 'text-warning' : 'text-secondary'; ?>"></i>
                                    </li>
                                    <li>
                                        <i class="bx bxs-star <?= ($habitacion['calificacion'] >= 3) ? 'text-warning' : 'text-secondary'; ?>"></i>
                                    </li>
                                    <li>
                                        <i class="bx bxs-star <?= ($habitacion['calificacion'] >= 4) ? 'text-warning' : 'text-secondary'; ?>"></i>
                                    </li>
                                    <li>
                                        <i class="bx bxs-star <?= ($habitacion['calificacion'] >= 5) ? 'text-warning' : 'text-secondary'; ?>"></i>
                                    </li>
                                </ul>
                                <span class="price"><?= $habitacion['precio'] . '/Noche'; ?></span>
                                <!-- <a href="<?php echo RUTA_PRINCIPAL . 'habitacion/detalle/' . $habitacion['slug']; ?>" class="default-btn">
                                    DETALLE
                                    <i class="flaticon-right"></i>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- <div class="col-lg-12">
                <div class="page-navigation-area">
                    <nav aria-label="Page navigation example text-center">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link page-links" href="#">
                                    <i class='bx bx-chevrons-left'></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class='bx bx-chevrons-right'></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> -->
        </div>
    </div>
</section>

<?php include_once 'views/template/footer-principal.php'; ?>

</body>

</html>