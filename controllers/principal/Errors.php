<?php
class Errors extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $data['title'] = 'Pagina no encontrada';
        $data['subtitle'] = 'Pagina no encontrada';
        $data['empresa'] = $this->model->getEmpresa();
        $this->views->getView('error', $data);
    }
}
?>