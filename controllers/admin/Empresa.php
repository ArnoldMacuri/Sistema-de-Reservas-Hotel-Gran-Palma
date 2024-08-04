<?php
class Empresa extends Controller
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
        $data['title'] = 'Empresa';
        $data['empresa'] = $this->model->getEmpresa();
        $this->views->getView('admin/empresa/index', $data);
    }
    public function modificar()
    {
        if (isset($_POST['nombre']) && isset($_POST['num_identidad'])) {
            $id = strClean($_POST['id']);
            $num_identidad = strClean($_POST['num_identidad']);
            $nombre = strClean($_POST['nombre']);
            $telefono = strClean($_POST['telefono']);
            $correo = strClean($_POST['correo']);
            $direccion = strClean($_POST['direccion']);
            $mensaje = strClean($_POST['mensaje']);
            $facebook = strClean($_POST['facebook']);
            $instagram = strClean($_POST['instagram']);
            $twitter = strClean($_POST['twitter']);
            $whatsapp = strClean($_POST['whatsapp']);
            if (empty($correo) || empty($num_identidad) || 
            empty($nombre) || empty($telefono) ||
             empty($direccion)) {
                $res = array('msg' => 'TODO LOS CAMPO SON REQUERIDOS', 'type' => 'warning');
            }else {
                $data = $this->model->actualizar(
                    $num_identidad,
                    $nombre,
                    $telefono,
                    $correo,
                    $direccion,
                    $facebook,
                    $instagram,
                    $twitter,
                    $whatsapp,
                    $mensaje,
                    $id
                );
                if ($data > 0) {
                    if (!empty($_FILES['foto']['name'])) {
                        move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/logo.png');
                    }
                    $res = array('msg' => 'EMPRESA MODIFICADO', 'type' => 'success');
                } else {
                    $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
                }
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res);
        die();
    }
}
