<?php
class Clientes extends Controller
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
        $data['title'] = 'Clientes';
        $this->views->getView('admin/clientes/index', $data);
    }
    public function listar()
    {
        $data = $this->model->getClientes(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-danger btn-sm" type="button" onclick="eliminarCliente(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
            <button class="btn btn-info btn-sm" type="button" onclick="editarCliente(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        if (isset($_POST['identidad']) && isset($_POST['num_identidad'])) {
            $id = strClean($_POST['id']);
            $identidad = strClean($_POST['identidad']);
            $num_identidad = strClean($_POST['num_identidad']);
            $nombre = strClean($_POST['nombre']);
            $apellido = strClean($_POST['apellido']);
            $telefono = strClean($_POST['telefono']);
            $correo = (empty($_POST['correo'])) ? null : strClean($_POST['correo']);
            $direccion = strClean($_POST['direccion']);
            if (empty($identidad) || empty($num_identidad) || empty($nombre) || empty($apellido) || empty($telefono) || empty($direccion)) {
                $res = array('msg' => 'TODO LOS CAMPO SON REQUERIDOS', 'type' => 'warning');
            }else {
                if ($id == '') {
                    $verificarIdentidad = $this->model->getValidar('num_identidad', $num_identidad, 0);
                    if (empty($verificarIdentidad)) {
                        $verificarTelefono = $this->model->getValidar('telefono', $telefono, 0);
                        if (empty($verificarTelefono)) {
                            if ($correo != null) {
                                $verificarCorreo = $this->model->getValidar('correo', $correo, 0);
                                if (!empty($verificarCorreo)) {
                                    $res = array('msg' => 'EL CORREO DEBE SER UNICO', 'type' => 'warning');
                                    echo json_encode($res);
                                    die();
                                }
                            }
                            $data = $this->model->registrar(
                                $identidad,
                                $num_identidad,
                                $nombre,
                                $apellido,
                                $telefono,
                                $correo,
                                $direccion,
                                3
                            );                            
                            if ($data > 0) {
                                $datos = $this->model->getCliente($data);
                                $res = array('msg' => 'CLIENTE REGISTRADO', 'type' => 'success', 'datos' => $datos);
                            } else {
                                $res = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                            }
                        } else {
                            $res = array('msg' => 'EL TELEFONO DEBE SER UNICO', 'type' => 'warning');
                        }
                    } else {
                        $res = array('msg' => 'LA IDENTIDAD DEBE SER UNICO', 'type' => 'warning');
                    }
                } else {
                    $verificarIdentidad = $this->model->getValidar('num_identidad', $num_identidad, $id);
                    if (empty($verificarIdentidad)) {
                        $verificarTelefono = $this->model->getValidar('telefono', $telefono, $id);
                        if (empty($verificarTelefono)) {
                            if ($correo != null) {
                                $verificarCorreo = $this->model->getValidar('correo', $correo, $id);
                                if (!empty($verificarCorreo)) {
                                    $res = array('msg' => 'EL CORREO DEBE SER UNICO', 'type' => 'warning');
                                    echo json_encode($res);
                                    die();
                                }
                            }
                            $data = $this->model->actualizar(
                                $identidad,
                                $num_identidad,
                                $nombre,
                                $apellido,
                                $telefono,
                                $correo,
                                $direccion,
                                $id
                            );
                            if ($data > 0) {
                                $res = array('msg' => 'CLIENTE MODIFICADO', 'type' => 'success');
                            } else {
                                $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
                            }
                        } else {
                            $res = array('msg' => 'EL TELEFONO DEBE SER UNICO', 'type' => 'warning');
                        }
                    } else {
                        $res = array('msg' => 'LA IDENTIDAD DEBE SER UNICO', 'type' => 'warning');
                    }
                }
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res);
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

    //buscar clientes para la venta
    public function buscar()
    {
        $array = array();
        $valor = strClean($_GET['term']);
        $data = $this->model->buscarPorNombre($valor);
        foreach ($data as $row) {
            $result['id'] = $row['id'];
            $result['label'] = $row['nombre'];
            $result['telefono'] = $row['telefono'];
            $result['direccion'] = $row['direccion'];
            array_push($array, $result);
        }
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die();
    }
}
