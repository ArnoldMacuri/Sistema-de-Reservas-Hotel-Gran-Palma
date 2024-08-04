<?php
class Dashboard extends Controller{
    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Panel Gráfico';
        $data['reservasNuevas'] = $this->model->getReservasNuevas();
        $data['totales'] = [
            'habitaciones' => $this->model->getTotales('habitaciones', 1),
            'clientes' => $this->model->totalClientes(1),
            'categorias' => $this->model->getTotales('categorias', 1),
            'reservas' => $this->model->totalReservas()
        ];
        $this->views->getView('admin/dashboard', $data);
    }

    public function reporteReserva($anio) {
        $desde = $anio . '-01-01 00:00:00';
        $hasta = $anio . '-12-31 23:59:59';

        $data['reserva'] = $this->model->calcularReservas('reservas', 'fecha_reserva', 'monto', $desde, $hasta, 0);

        $totalReservas = $this->model->montoReservas('reservas', 'fecha_reserva', 'monto', $desde, $hasta, 0);

        $data['totalReservas'] = ($totalReservas['total'] == null) ? 0 : $totalReservas['total'];
        
        echo json_encode($data);
        die();
    }
}
?>