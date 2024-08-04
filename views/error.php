<?php include_once 'views/template/header-principal.php';
include_once 'views/template/portada.php'; ?>
<!-- Start Preloader Area -->
<div class="preloader">
    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>
</div>
<!-- End Preloader Area -->

<!-- Start 404 Error -->
<div class="error-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="error-content-wrap">
                <h1>4 <span>0</span> 4</h1>
                <h3>Ups! Página no encontrada</h3>
                <p>Comunicate con el administrador.</p>
                <a href="<?php echo RUTA_PRINCIPAL; ?>" class="default-btn btn-two">
                    Regresar
                    <i class="flaticon-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End 404 Error -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class="bx bx-chevrons-up"></i>
    <i class="bx bx-chevrons-up bx-fade-up"></i>
</div>
<!-- End Go Top Area -->

<?php include_once 'views/template/footer-principal.php'; ?>

</body>

</html>