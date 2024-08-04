<?php include_once 'views/template/header-admin.php'; ?>

<input type="hidden" id="anio" value="<?php echo date('Y'); ?>">

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
    <div class="col">
        <div class="card radius-10 bg-gradient-cosmic">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <p class="mb-0 text-white fw-bold">Total Reservas</p>
                        <h4 class="my-1 text-white"><?php echo $data['totales']['reservas']['total']; ?></h4>
                        <a class="mb-0 font-13 text-white" href="<?php echo RUTA_ADMIN . 'reservas'; ?>">VER DETALLE</a>
                    </div>
                    <div id="chart1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-gradient-ibiza">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <p class="mb-0 text-white fw-bold">Total Habitaciones</p>
                        <h4 class="my-1 text-white"><?php echo $data['totales']['habitaciones']['total']; ?></h4>
                        <a class="mb-0 font-13 text-white" href="<?php echo RUTA_ADMIN . 'habitaciones'; ?>">VER DETALLE</a>
                    </div>
                    <div id="chart2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-gradient-ohhappiness">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <p class="mb-0 text-white fw-bold">Total de Categorias</p>
                        <h4 class="my-1 text-white"><?php echo $data['totales']['categorias']['total']; ?></h4>
                        <a class="mb-0 font-13 text-white" href="<?php echo RUTA_ADMIN . 'categorias'; ?>">VER DETALLE</a>
                    </div>
                    <div id="chart3"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-gradient-kyoto">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <p class="mb-0 text-white fw-bold">Total Clientes</p>
                        <h4 class="my-1 text-white"><?php echo $data['totales']['clientes']['total']; ?></h4>
                        <a class="mb-0 font-13 text-white" href="<?php echo RUTA_ADMIN . 'clientes'; ?>">VER DETALLE</a>
                    </div>
                    <div id="chart4"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Reservas por Mes</h6>
                        <hr>
                    </div>
                </div>
                <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
                    <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-danger"></i>Reservas</span>
                </div>
                <div class="chart-container-1">
                    <canvas id="chart5"></canvas>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-1 g-0 row-group text-center border-top">
                <div class="col">
                    <div class="p-3">
                        <h4 class="mb-0" id="totalreserva">$0</h4>
                        <small class="mb-0">Total de Reservas</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h6 class="mb-0">Órdenes Recientes</h6>
                <hr>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                <tr>
                        <th><i class="fa-solid fa-camera"></i> Foto</th>
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
                    <?php foreach ($data['reservasNuevas'] as $reserva) { ?>
                    <tr>
                    <td><img src="<?php echo RUTA_PRINCIPAL . 'assets/img/habitaciones/' . $reserva['foto']; ?>" class="product-img-2" alt="product img"></td>
                        <td><?php echo $reserva['estilo']; ?></td>
                        <td><?php echo $reserva['numero']; ?></td>
                        <td><?php echo $reserva['fecha_reserva']; ?></td>
                        <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100"><?php echo $reserva['monto']; ?></span>
                        </td>
                        <td><?php echo $reserva['cod_reserva']; ?></td>
                        <td><?php echo $reserva['fecha_ingreso']; ?></td>
                        <td><?php echo $reserva['fecha_salida']; ?></td>
                        <td><?php echo $reserva['cliente']; ?></td>
                        <td><?php echo $reserva['metodo']; ?></td>
                      
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once 'views/template/footer-admin.php'; ?>

<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>plugins/chartjs/js/Chart.min.js"></script>
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>plugins/chartjs/js/Chart.extension.js"></script>
<script src="<?php echo RUTA_PRINCIPAL . 'assets/admin/'; ?>js/pages/dashboard.js"></script>

</body>

</html>