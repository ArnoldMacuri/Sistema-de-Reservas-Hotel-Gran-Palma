<?php

class Habitaciones extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    /**
     * vista principal del admin
     *
     * @return void
     */
    public function index()
    {
        $data['title'] = 'Habitaciones';
        $data['script'] = 'habitaciones.js';
        $this->views->getView('admin/habitaciones/index', $data);
    }

    /**
     * listar
     *
     * @return void
     */
    public function listar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = $this->model->getHabitaciones(0);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    /**
     * registrar habitaciones
     *
     * @return void
     */
    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (validarCampos(['estilo', 'numero', 'capacidad', 'precio', 'descripcion'])) {
                $id = strClean($_POST['id']);
                $estilo = strClean($_POST['estilo']);
                $numero = strClean($_POST['numero']);
                $capacidad = strClean($_POST['capacidad']);
                $slug = slugify($estilo);
                $descripcion = strClean($_POST['descripcion']);
                $precio = strClean($_POST['precio']);
                $fotoActual = strClean($_POST['foto_actual']);
                $foto = $_FILES['foto'];
                $name = $foto['name'];
                $imgNombre = null;
                ##### VERIFICAR SI CONTIENE IMG #####
                if (!empty($name)) {
                    $fecha = date('YmdHis');
                    $destino = 'assets/img/habitaciones/' . $fecha . '.jpg';
                    $imgNombre = $fecha . '.jpg';
                } else if (!empty($fotoActual) && empty($name)) {
                    $imgNombre = $fotoActual;
                }
                ##### FINAL DE VALIDACION DE IMG #####
                if ($id == '') {
                    $verificar = $this->model->getValidar('estilo', $estilo, 0);
                    if (empty($verificar)) {
                        $data = $this->model->registrar(
                            $estilo,
                            $numero,
                            $capacidad,
                            $slug,
                            $descripcion,
                            $precio,
                            $imgNombre
                        );
                        if ($data > 0) {
                            if (!empty($name)) {
                                move_uploaded_file($foto['tmp_name'], $destino);
                            }
                            $res = array('msg' => 'HABITACIÓN REGISTRADO', 'type' => 'success');
                        } else {
                            $res = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                        }
                    } else {
                        $res = array('msg' => 'ESTILO DEBE SER ÚNICO', 'type' => 'warning');
                    }
                } else {
                    $verificar = $this->model->getValidar('estilo', $estilo, $id);
                    if (empty($verificar)) {
                        $data = $this->model->actualizar(
                            $estilo,
                            $numero,
                            $capacidad,
                            $slug,
                            $descripcion,
                            $precio,
                            $imgNombre,
                            $id
                        );
                        if ($data == 1) {
                            if (!empty($name)) {
                                move_uploaded_file($foto['tmp_name'], $destino);
                            }
                            $res = array('msg' => 'HABITACIÓN MODIFICADO', 'type' => 'success');
                        } else {
                            $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
                        }
                    } else {
                        $res = array('msg' => 'LA ESTILO DEBE SER ÚNICO', 'type' => 'warning');
                    }
                }
            } else {
                $res = array('msg' => 'TODO LOS CAMPOS CON * SON REQUERIDOS', 'type' => 'warning');
            }
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * eliminar
     *
     * @param  mixed $idHabitacion
     * @return void
     */
    public function eliminar($idHabitacion)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && is_numeric($idHabitacion)) {
            $data = $this->model->eliminar(0, $idHabitacion);
            if ($data == 1) {
                $res = array('msg' => 'HABITACIÓN DADO DE BAJA', 'type' => 'success');
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
     * @param  mixed $idHabitacion
     * @return void
     */
    public function editar($idHabitacion)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && is_numeric($idHabitacion)) {
            $data = $this->model->getHabitacion($idHabitacion);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    ########## GALERIA DE IMAGENES #############
    public function galeriaImagenes()
    {
        $id = $_POST['idHabitacion'];
        $folder_name = 'assets/img/habitaciones/' . $id . '/';
        if (!empty($_FILES)) {
            if (!file_exists($folder_name)) {
                mkdir($folder_name);
            }
            $temp_name = $_FILES['file']['tmp_name'];
            $ruta = $folder_name . date('YmdHis') . $_FILES['file']['name'];
            move_uploaded_file($temp_name, $ruta);
        }
    }
    
    /**
     * verGaleria
     *
     * @param  mixed $id_producto
     * @return void
     */
    public function verGaleria($id_producto)
    {
        $result = array();
        $directorio = 'assets/img/habitaciones/' . $id_producto;
        if (file_exists($directorio)) {
            $imagenes = scandir($directorio);
            if (false !== $imagenes) {
                foreach ($imagenes as $file) {
                    if ('.' != $file && '..' != $file) {
                        array_push($result, $file);
                    }
                }
            }
        }
        echo json_encode($result);
        die();
    }
    
    /**
     * eliminarImg
     *
     * @return void
     */
    public function eliminarImg()
    {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $destino = 'assets/img/habitaciones/' . $json['url'];
        if (unlink($destino)) {
            $res = array('msg' => 'IMAGEN ELIMINADO', 'icono' => 'success');
        } else {
            $res = array('msg' => 'ERROR AL ELIMINAR', 'icono' => 'error');
        }
        echo json_encode($res);
        die();
    }
}
