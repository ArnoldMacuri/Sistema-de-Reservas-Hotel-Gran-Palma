</div>
</div>
<!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
    <p class="mb-0">Copyright © <?php echo date('Y'); ?>. All right reserved.</p>
</footer>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>js/jquery.min.js"></script>
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>plugins/metismenu/js/metisMenu.min.js"></script>

<!-- <script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>plugins/chartjs/js/Chart.min.js"></script>
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>plugins/chartjs/js/Chart.extension.js"></script>
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>js/index.js"></script> -->
<!--app JS-->
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>js/app.js"></script>
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>DataTables/datatables.min.js"></script>
<script>
    const base_url = '<?php echo RUTA_PRINCIPAL; ?>';
    function alertaSW(mensaje, tipo) {
        Swal.fire({
            position: "top-end",
            icon: tipo,
            title: mensaje,
            showConfirmButton: false,
            timer: 2500,
            toast: true
        });
    }
</script>
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>js/custom.js"></script>