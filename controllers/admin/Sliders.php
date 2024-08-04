<?php

class Sliders extends Controller
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
        $data['title'] = 'Sliders';
        $data['script'] = 'sliders.js';
        $data['sliders'] = $this->model->getSliders();
        $this->views->getView('admin/sliders/index', $data);
    }

    public function registrar()
    {
        if (isset($_POST['titulo']) && isset($_POST['subtitulo'])) {
            $id = strClean($_POST['id']);
            $titulo = strClean($_POST['titulo']);
            $subtitulo = strClean($_POST['subtitulo']);
            $fotoActual = strClean($_POST['foto_actual']);
            $foto = $_FILES['foto'];
            $nombreImg = null;
            if (!empty($foto['name'])) {
                $fecha = date('YmdHis');
                $destino = 'assets/img/sliders/' . $fecha . '.jpg';
                $nombreImg =  $fecha . '.jpg';
            } else if (!empty($fotoActual) && empty($foto['name'])) {
                $nombreImg = $fotoActual;
            }
            if (empty($subtitulo)) {
                $res = array('msg' => 'LA DESCRIPCIÓN ES REQUERIDO', 'type' => 'warning');
            } else {
                if ($id == '') {
                    $verificar = $this->model->getValidar('titulo', $titulo, 'registrar', 0);
                    if (empty($verificar)) {
                        $data = $this->model->registrar(
                            $nombreImg,
                            $titulo,
                            $subtitulo
                        );
                        if ($data > 0) {
                            if (!empty($foto['name'])) {
                                move_uploaded_file($foto['tmp_name'], $destino);
                            }
                            $res = array('msg' => 'SLIDER REGISTRADO', 'type' => 'success');
                        } else {
                            $res = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                        }
                    } else {
                        $res = array('msg' => 'EL SLIDER DEBE SER ÚNICO', 'type' => 'warning');
                    }
                } else {
                    $verificar = $this->model->getValidar('titulo', $titulo, 'actualizar', $id);
                    if (empty($verificar)) {
                        $data = $this->model->actualizar(
                            $nombreImg,
                            $titulo,
                            $subtitulo,
                            $id
                        );
                        if ($data > 0) {
                            if (!empty($foto['name'])) {
                                move_uploaded_file($foto['tmp_name'], $destino);
                            }
                            $res = array('msg' => 'SLIDER MODIFICADO', 'type' => 'success');
                        } else {
                            $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
                        }
                    } else {
                        $res = array('msg' => 'EL SLIDER DEBE SER ÚNICO', 'type' => 'warning');
                    }
                }
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res);
        die();
    }

    public function eliminar($idSlider)
    {
        if (isset($_GET) && is_numeric($idSlider)) {
            $data = $this->model->eliminar(0, $idSlider);
            if ($data == 1) {
                $res = array('msg' => 'SLIDER DADO DE BAJA', 'type' => 'success');
            } else {
                $res = array('msg' => 'ERROR AL ELIMINAR', 'type' => 'error');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res);
        die();
    }

    public function editar($idSlider)
    {
        $data = $this->model->editar($idSlider);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function restaurar($idSlider)
    {
        if (isset($_GET) && is_numeric($idSlider)) {
            $data = $this->model->eliminar(1, $idSlider);
            if ($data == 1) {
                $res = array('msg' => 'SLIDER RESTAURADO', 'type' => 'success');
            } else {
                $res = array('msg' => 'ERROR AL RESTAURAR', 'type' => 'error');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res);
        die();
    }
}
