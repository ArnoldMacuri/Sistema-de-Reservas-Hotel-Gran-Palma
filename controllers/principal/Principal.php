<?php
require_once 'vendor/autoload.php';
use Carbon\Carbon;
class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Página principal';
        //TRAER SLIDERS
        $data['sliders'] = $this->model->getSliders();
        $data['empresa'] = $this->model->getEmpresa();
        //TRAER HABITACIONES
        $data['habitaciones'] = $this->model->getHabitaciones();
        for ($i = 0; $i < count($data['habitaciones']); $i++) {
            $calificacion = $this->model->getCalificaciones($data['habitaciones'][$i]['id']);
            $totalCalificacion = $this->model->getTotalCalificaciones($data['habitaciones'][$i]['id']);
            $total = ($totalCalificacion['total'] != null) ? $totalCalificacion['total'] : 5;
            $existe = (count($calificacion) > 0) ? count($calificacion) : 1;
            $data['habitaciones'][$i]['calificacion'] = $total / $existe;
        }
        //CALIFICACIONES GENERAL
        $data['testimonial'] = $this->model->getCalificacionesGeneral();
        for ($i=0; $i < count($data['testimonial']); $i++) { 
            $fechaCarbon = Carbon::parse($data['testimonial'][$i]['fecha']);
            $data['testimonial'][$i]['fecha'] = $fechaCarbon->diffForHumans();
        }
        $this->views->getView('index', $data);
    }
}
