<?php include_once 'views/template/header-admin.php'; ?>

<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4>Listado de Reservas</h4>
        </div>
        <hr>
        <div id="highcharts-container" style="height: 400px"></div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle nowrap" id="tblReservas" style="width: 100%;">
                <thead>
                    <tr>
                        <th><i class="fa-solid fa-hashtag"></i> Id</th>
                        <th><i class="fa-solid fa-hotel"></i> Habitación</th>
                        <th><i class="fa-solid fa-hashtag"></i> N°</th>
                        <th><i class="fa-solid fa-calendar-days"></i> Fecha/Hora</th>
                        <th><i class="fa-solid fa-dollar-sign"></i> Monto</th>
                        <th><i class="fa-solid fa-code"></i> Cod. reserva</th>
                        <th><i class="fa-solid fa-calendar-days"></i> F. Ingreso</th>
                        <th><i class="fa-solid fa-calendar-days"></i> F. Salida</th>
                        <th><i class="fa-solid fa-users"></i> Cliente</th>
                        <th><i class="fa-regular fa-credit-card"></i> Metodo</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTicket" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Ticket
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe frameborder="0" id="content-ticket" style="width: 100%;" height="400px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<?php include_once 'Views/template/footer-admin.php'; ?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/js/pages/reservas.js'; ?>"></script>

</body>

</html>