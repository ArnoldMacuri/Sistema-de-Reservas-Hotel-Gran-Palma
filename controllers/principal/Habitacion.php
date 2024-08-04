<?php
class Habitacion extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $data['title'] = 'Habitaciones';
        $data['subtitle'] = 'Habitaciones con estilo';
        $data['empresa'] = $this->model->getEmpresa();
        $data['habitaciones'] = $this->model->getHabitaciones();
        for ($i = 0; $i < count($data['habitaciones']); $i++) {
            $calificacion = $this->model->getCalificaciones($data['habitaciones'][$i]['id']);
            $totalCalificacion = $this->model->getTotalCalificaciones($data['habitaciones'][$i]['id']);
            $total = ($totalCalificacion['total'] != null) ? $totalCalificacion['total'] : 5;
            $existe = (count($calificacion) > 0) ? count($calificacion) : 1;
            $data['habitaciones'][$i]['calificacion'] = $total / $existe;
        }
        $this->views->getView('principal/habitacion/index', $data);
    }

}
?>