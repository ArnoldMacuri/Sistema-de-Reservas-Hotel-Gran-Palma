<?php include_once 'views/template/header-principal.php';
include_once 'views/template/portada.php'; ?>

<!-- Start Contact Area -->
<section class="main-contact-area contact-info-area contact-info-three pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>Contactos</span>
            <h2>Si tienes dudas envianos un mensaje via correo</h2>
            <p>Y te atenderemos lo mas pronto posible.</p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-wrap contact-pages">
                    <div class="contact-form contact-form-mb">
                        <?php if (!empty($_GET['msg'])) {
                            if ($_GET['msg'] == 1) {
                                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>Aviso!</strong> Correo Enviado.
                                </div>';
                            }else{
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Aviso!</strong> Error al enviar correo: '.$_GET['msg'].'
                            </div>';
                            }
                        ?>

                        <?php } ?>

                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required data-error="por favor, escriba su nombre" placeholder="Su nombre">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required data-error="Por favor introduzca su correo electrónico" placeholder="Tu correo electrónico">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" id="phone_number" required data-error="Por favor ingresa tu número" class="form-control" placeholder="Su teléfono">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Por favor ingresa tu asunto" placeholder="Tu asunto">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control textarea-hight" id="message" cols="30" rows="4" required data-error="Escribe tu mensaje" placeholder="Tu mensaje"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn btn-two">
                                        Enviar Mensaje
                                        <i class="flaticon-right"></i>
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="single-contact-info">
                            <i class="bx bx-envelope"></i>
                            <h3>Correo Electrónico:</h3>
                            <a href="mailto:<?php echo $data['empresa']['correo']; ?>"><?php echo $data['empresa']['correo']; ?></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="single-contact-info">
                            <i class="bx bx-phone-call"></i>
                            <h3>Teléfono:</h3>
                            <a href="tel:+(123)1800-567-8990">Tel. + <?php echo $data['empresa']['telefono']; ?></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="single-contact-info">
                            <i class="bx bx-location-plus"></i>
                            <h3>Dirección</h3>
                            <a href="#"><?php echo $data['empresa']['direccion']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Area -->

<!-- Start Map Area -->
<div class="map-area">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d993.3635259152442!2d-80.61891435660291!3d-5.191074128495674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904a1064514f822f%3A0xfe74acc38526eb3e!2sHotel%20Gran%20Palma%20Piura!5e0!3m2!1ses-419!2spe!4v1719993134408!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- End Map Area -->

<?php include_once 'views/template/footer-principal.php'; ?>

</body>

</html>