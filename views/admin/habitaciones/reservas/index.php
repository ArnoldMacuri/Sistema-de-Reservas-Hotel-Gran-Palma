<?php include_once 'views/template/header-admin.php'; ?>

<a class="btn btn-primary mb-2" href="<?php echo RUTA_ADMIN . 'reservas/nuevo'; ?>">Nueva</a>

<div class="card">
    <div class="card-body">
        <h5 class="card-title text-center"><i class="fas fa-tags"></i> Listado de Reservas</h5>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover nowrap" id="tblReservas" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Habitación</th>
                        <th>Código</th>
                        <th>Fecha-Ingreso</th>
                        <th>Fecha-Salida</th>
                        <th>Fecha-Registro</th>
                        <th>Pago</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once 'views/template/footer-admin.php'; ?>