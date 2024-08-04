<?php

include_once 'views/template/header-principal.php'; ?>

<!-- Start Ecorik Slider Area -->
<section class="eorik-slider-area">
    <div class="eorik-slider owl-carousel owl-theme">
        <?php foreach ($data['sliders'] as $slider) { ?>
            <div class="eorik-slider-item" style="background-image: url(<?php echo RUTA_PRINCIPAL . 'assets/img/sliders/' . $slider['foto'] ?>);">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="eorik-slider-text overflow-hidden one eorik-slider-text-one">
                                <h1><?php echo $slider['titulo']; ?></h1>
                                <span><?php echo $slider['subtitulo']; ?></span>
                                <div class="slider-btn">
                                    <a class="default-btn" href="<?php echo $slider['url']; ?>">
                                        Más Información
                                        <i class="flaticon-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="white-shape">
        <img src="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/img/white-shape.png" alt="Image">
    </div>
</section>
<!-- End Ecorik Slider Area -->

<!-- Start Check Area -->
<div class="check-area mb-minus-70">
    <div class="container">
        <form class="check-form" id="formulario" action="<?php echo RUTA_PRINCIPAL . 'reserva/verify'; ?>">
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="check-content">
                        <p>Fecha Llegada</p>
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker-1">
                                <i class="flaticon-calendar"></i>
                                <input type="text" class="form-control" id="f_llegada" name="f_llegada" value="<?php echo date('Y-m-d'); ?>">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-th"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="check-content">
                        <p>Fecha Salida</p>
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker-2">
                                <i class="flaticon-calendar"></i>
                                <input type="text" class="form-control" id="f_salida" name="f_salida" value="<?php echo date('Y-m-d'); ?>">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-th"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="check-content">
                        <div class="form-group">
                            <label for="habitacion" class="form-label">Habitaciones</label>
                            <select name="habitacion" class="select-auto" id="habitacion" style="width: 100%;">
                                <option value="">Seleccionar</option>
                                <?php foreach ($data['habitaciones'] as $habitacion) { ?>
                                    <option value="<?php echo $habitacion['id']; ?>"><?php echo $habitacion['estilo']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="check-btn check-content mb-0">
                        <button class="default-btn" type="submit">
                            Comprobar
                            <i class="flaticon-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Check Section -->

<!-- Start Explore Area -->
<section class="explore-area pt-170 pb-100">
    <div class="container">
        <div class="section-title">
            <span>Explorar</span>
            <h2>Te damos la bienvenida</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="explore-img">
                    <img src="<?php echo RUTA_PRINCIPAL . 'assets'; ?>/img/principal.jpg" alt="Image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="explore-content ml-30">
                    <h2>¡Bienvenido al <?= TITLE; ?> Su Refugio de Lujo y Hospitalidad!</h2>
                    <p>¡Bienvenido al <?= TITLE; ?> Es un placer darle la bienvenida a nuestro oasis de comodidad y hospitalidad. En este espacio diseñado para su confort, nos esforzamos por crear una experiencia inolvidable para usted. Desde el momento en que cruza nuestras puertas, nos comprometemos a brindarle un servicio excepcional y atención personalizada en cada detalle de su estancia. Permítanos ser su hogar lejos del hogar mientras disfruta de todas las maravillas que nuestro hotel y sus alrededores tienen para ofrecer. ¡Bienvenido a una experiencia única llena de momentos especiales y recuerdos inolvidables!</p>

                    <a href="#" class="default-btn">
                        explora más
                        <i class="flaticon-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Explore Area -->

<!-- End Facilities Area -->
<section class="facilities-area pb-60">
    <div class="container">
        <div class="section-title">
            <span>INSTALACIONES</span>
            <h2>Dando completamente asombrosa</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-facilities-wrap">
                    <div class="single-facilities">
                        <i class="facilities-icon flaticon-pickup"></i>
                        <h3>Recoger y dejar​</h3>
                        <p>"Servicio de transporte cómodo y confiable para su conveniencia."</p>
                        <a href="service-details.html" class="icon-btn">
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-facilities-wrap">
                    <div class="single-facilities">
                        <i class="facilities-icon flaticon-coffee-cup"></i>
                        <h3>Bebida de bienvenida​​​​</h3>
                        <p>"¡Saludos! Disfrute de nuestra bebida de bienvenida mientras se relaja."</p>
                        <a href="service-details.html" class="icon-btn">
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-facilities-wrap">
                    <div class="single-facilities">
                        <i class="facilities-icon flaticon-garage"></i>
                        <h3>Plaza de aparcamiento</h3>
                        <p>"Estacionamiento seguro y conveniente para su vehículo."</p>
                        <a href="service-details.html" class="icon-btn">
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-facilities-wrap">
                    <div class="single-facilities">
                        <i class="facilities-icon flaticon-water"></i>
                        <h3>Frío Caliente y Agua​</h3>
                        <p>"Refresque su sed con agua fría o caliente disponible en todo momento."</p>
                        <a href="service-details.html" class="icon-btn">
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Facilities Area -->

<!-- End Incredible Area -->
<section class="incredible-area ptb-140 jarallax">
    <div class="container">
        <div class="incredible-content">
            
            <div>
                <h2><span>¡Increíble!</span> Vas a venir hoy</h2>
                <p>"¡Qué emocionante! Estamos ansiosos por verte hoy. ¡Prepárate para una experiencia increíble juntos!"</p>
                <a href="#" class="default-btn">
                    Únete a nosotros hoy
                    <i class="flaticon-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="white-shape">
        <img src="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/img/white-shape-top.png" alt="Image">
        <img src="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/img/white-shape-bottom.png" alt="Image">
    </div>
</section>
<!-- End Incredible Area -->

<!-- Start Our Rooms Area -->
<section class="our-rooms-area pt-60 pb-100">
    <div class="container">
        <div class="section-title">
            <span>NUESTRAS HABITACIONES</span>
            <h2>Habitaciones y suites fascinantes</h2>
        </div>
        <div class="tab industries-list-tab">
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
            </div>
        </div>
    </div>
</section>
<!-- End Our Rooms Area -->

<!-- Start Restaurants Area -->
<section class="restaurants-area pb-100">
    <div class="container-fluid p-0">
        <div class="section-title">
            <span>Restaurantes</span>
            <h2>"¡Bienvenido al sabor incomparable!"</h2>
        </div>

        <div class="restaurants-wrap owl-carousel owl-theme">
            <div class="single-restaurants bg-1">
                <i class="restaurants-icon flaticon-coffee-cup"></i>
                <span>Restaurantes</span>
                <p>Saborea la excelencia en cada bocado! Bienvenido a nuestro restaurante, donde cada plato es una obra maestra de sabor y dedicación.</p>
                <a href="#" class="default-btn">
                    Explora más
                    <i class="flaticon-right"></i>
                </a>
            </div>
            <div class="single-restaurants bg-2">
                <i class="restaurants-icon flaticon-swimming"></i>
                <span>Piscina</span>
                <p>Un oasis de frescura y tranquilidad, listo para ser explorado y disfrutado, ofreciendo momentos de relax y diversión sin fin.</p>
                <a href="#" class="default-btn">
                    Explora más
                    <i class="flaticon-right"></i>
                </a>
            </div>
            <div class="single-restaurants bg-3">
                <i class="restaurants-icon flaticon-speaker"></i>
                <span>Sala de conferencias</span>
                <p>Donde los sueños se convierten en realidad, uno se habla de negocios y se forjan alianzas duraderas en un entorno inspirador.</p>
                <a href="#" class="default-btn">
                    Explora más
                    <i class="flaticon-right"></i>
                </a>
            </div>
            <div class="single-restaurants bg-4">
                <i class="restaurants-icon flaticon-podium"></i>
                <span>Mejor tarifa</span>
                <p>Tu destino para la máxima calidad al mejor precio, donde la excelencia y el ahorro se fusionan para una experiencia incomparable.</p>
                <a href="#" class="default-btn">
                    Explora más
                    <i class="flaticon-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End Restaurants Area -->

<!-- start Testimonials Area -->
<section class="testimonials-area pb-100">
    <div class="container">
        <div class="section-title">
            <span>Comentarios</span>
            <h2>Experciencia del Cliente</h2>
        </div>
        <div class="testimonials-wrap owl-carousel owl-theme">
            <?php foreach ($data['testimonial'] as $testimonial) { ?>
                <div class="single-testimonials">
                    <ul>
                        <li>
                            <i class="bx bxs-star <?= ($testimonial['cantidad'] >= 1) ? 'text-warning' : 'text-secondary'; ?>"></i>
                        </li>
                        <li>
                            <i class="bx bxs-star <?= ($testimonial['cantidad'] >= 2) ? 'text-warning' : 'text-secondary'; ?>"></i>
                        </li>
                        <li>
                            <i class="bx bxs-star <?= ($testimonial['cantidad'] >= 3) ? 'text-warning' : 'text-secondary'; ?>"></i>
                        </li>
                        <li>
                            <i class="bx bxs-star <?= ($testimonial['cantidad'] >= 4) ? 'text-warning' : 'text-secondary'; ?>"></i>
                        </li>
                        <li>
                            <i class="bx bxs-star <?= ($testimonial['cantidad'] >= 5) ? 'text-warning' : 'text-secondary'; ?>"></i>
                        </li>
                    </ul>
                    <h3><?php echo $testimonial['usuario']; ?></h3>
                    <p>“<?php echo $testimonial['comentario']; ?>”</p>
                    <div class="testimonials-content">
                        <img src="<?php echo RUTA_PRINCIPAL . 'assets/'; ?>/img/user.png" alt="Image">
                        <h4><?php echo $testimonial['fecha']; ?></h4>
                        <span><?php echo $testimonial['correo']; ?></span>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Testimonials Area -->

<?php include_once 'views/template/footer-principal.php';

if (!empty($_GET['respuesta']) && $_GET['respuesta'] == 'warning') { ?>

    <script>
        alertaSW('TODO LOS CAMPOS SON REQUERIDOS', 'warning');
    </script>

<?php } ?>

<script src="<?php echo RUTA_PRINCIPAL . 'assets/principal/js/pages/disponibilidad.js'; ?>"></script>
<script src="<?php echo RUTA_PRINCIPAL . 'assets/principal/js/pages/index.js'; ?>"></script>

</body>

</html>