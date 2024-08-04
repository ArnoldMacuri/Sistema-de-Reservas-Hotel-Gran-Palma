<?php
class Categorias extends Controller
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
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data['title'] = 'Categorias';
        $data['script'] = 'categorias.js';
        $this->views->getView('admin/categorias/index', $data);
    }
    
    /**
     * listar
     *
     * @return void
     */

    public function listar()
    {
        $data = $this->model->getCategorias(1);

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    /**
     * registrar
     *
     * @return void
     */
    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (validarCampos(['nombre'])) {
                $categoria = strClean($_POST['nombre']);
                $id = strClean($_POST['id']);
                if ($id == '') {
                    $verificar = $this->model->getValidar('categoria', $categoria, 0);
                    if (empty($verificar)) {
                        $data = $this->model->registrar($categoria);
                        if ($data > 0) {
                            $res = array('msg' => 'CATEGORIA REGISTRADO', 'type' => 'success');
                        } else {
                            $res = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                        }
                    } else {
                        $res = array('msg' => 'LA CATEGORIA YA EXISTE', 'type' => 'warning');
                    }
                } else {
                    $verificar = $this->model->getValidar('categoria', $categoria, $id);
                    if (empty($verificar)) {
                        $data = $this->model->actualizar($categoria, $id);
                        if ($data > 0) {
                            $res = array('msg' => 'CATEGORIA MODIFICADO', 'type' => 'success');
                        } else {
                            $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
                        }
                    } else {
                        $res = array('msg' => 'LA CATEGORIA YA EXISTE', 'type' => 'warning');
                    }
                }
            } else {
                $res = array('msg' => 'EL NOMBRE ES REQUERIDO', 'type' => 'warning');
            }
        }
        echo json_encode($res);
        die();
    }
    
    /**
     * eliminar
     *
     * @param  mixed $idCategoria
     * @return void
     */
    public function eliminar($idCategoria)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && is_numeric($idCategoria)) {
            $data = $this->model->eliminar(0, $idCategoria);
            if ($data == 1) {
                $res = array('msg' => 'CATEGORIA DADO DE BAJA', 'type' => 'success');
            } else {
                $res = array('msg' => 'ERROR AL ELIMINAR', 'type' => 'error');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    /**
     * editar
     *
     * @param  mixed $idCategoria
     * @return void
     */
    public function editar($idCategoria)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && is_numeric($idCategoria)) {
            $data = $this->model->getCategoria($idCategoria);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
}
