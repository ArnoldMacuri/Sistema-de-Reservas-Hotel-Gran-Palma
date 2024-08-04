<?php
class Reservas extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['id_usuario'])) {
            header('Location: ' . RUTA_PRINCIPAL);
            exit;
        }
    }
    public function index()
    {
        $data['title'] = 'Reservas';
        $this->views->getView('admin/reservas/index', $data);
    }
    public function listar()
    {
        $data = $this->model->getReservas();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($idCliente)
    {
        if (isset($_GET) && is_numeric($idCliente)) {
            $data = $this->model->eliminar(0, $idCliente);
            if ($data > 0) {
                $res = array('msg' => 'CLIENTE DADO DE BAJA', 'type' => 'success');
            } else {
                $res = array('msg' => 'ERROR AL ELIMINAR', 'type' => 'error');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($idCliente)
    {
        $data = $this->model->getCliente($idCliente);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
