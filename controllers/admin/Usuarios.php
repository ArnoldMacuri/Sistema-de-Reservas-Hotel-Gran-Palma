<?php
class Usuarios extends Controller
{
    private $id_usuario;
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['nombre_usuario'])) {
            header('Location: ' . RUTA_ADMIN);
            exit;
        }
        $this->id_usuario = $_SESSION['id_usuario'];
    }
    public function index()
    {
        $data['title'] = 'Usuarios';
        $data['script'] = 'usuarios.js';
        $this->views->getView('admin/usuarios/index', $data);
    }

    public function listar()
    {
        $data = $this->model->getUsuarios(1);
        $item = 1;
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['item'] = $item;
            if ($data[$i]['rol'] == 1) {
                $data[$i]['rol'] = '<span class="badge bg-success">ADMINISTRADOR</span>';
            } else {
                $data[$i]['rol'] = '<span class="badge bg-info">RECEPCIONISTA</span>';
            }
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-danger btn-sm" type="button" onclick="eliminarUsuario(' . $data[$i]['id'] . ')"><i class="fas fa-times-circle"></i></button>
            <button class="btn btn-info btn-sm" type="button" onclick="editarUsuario(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
            </div>';
            $item++;
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    //metodo para registrar y modificar
    public function registrar()
    {
        if (isset($_POST)) {
            if (validarCampos(['nombres', 'apellidos', 'correo', 'usuario', 'clave', 'rol'])) {
                $nombres = strClean($_POST['nombres']);
                $apellidos = strClean($_POST['apellidos']);
                $correo = strClean($_POST['correo']);
                $usuario = strClean($_POST['usuario']);
                $direccion = strClean($_POST['direccion']);
                $clave = strClean($_POST['clave']);
                $rol = strClean($_POST['rol']);
                $id = strClean($_POST['id']);

                if ($id == '') {
                    $hash = password_hash($clave, PASSWORD_DEFAULT);
                    //verificar si existe los datos
                    $verificarCorreo = $this->model->getValidar('correo', $correo, 'registrar', 0);
                    if (empty($verificarCorreo)) {
                        $verificarUsuario = $this->model->getValidar('usuario', $usuario, 'registrar', 0);
                        if (empty($verificarUsuario)) {
                            $data = $this->model->registrar(
                                $nombres,
                                $apellidos,
                                $correo,
                                $usuario,
                                $direccion,
                                $hash,
                                $rol
                            );
                            if ($data > 0) {
                                $res = array('msg' => 'USUARIO REGISTRADO', 'type' => 'success');
                            } else {
                                $res = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                            }
                        } else {
                            $res = array('msg' => 'EL TELÉFONO DEBE SER ÚNICO', 'type' => 'warning');
                        }
                    } else {
                        $res = array('msg' => 'EL CORREO DEBE SER ÚNICO', 'type' => 'warning');
                    }
                } else {
                    //verificar si existe los datos
                    $verificarCorreo = $this->model->getValidar('correo', $correo, 'modificar', $id);
                    if (empty($verificarCorreo)) {
                        $verificarUsuario = $this->model->getValidar('usuario', $usuario, 'modificar', $id);
                        if (empty($verificarUsuario)) {
                            $data = $this->model->actualizar(
                                $nombres,
                                $apellidos,
                                $correo,
                                $usuario,
                                $direccion,
                                $rol,
                                $id
                            );
                            if ($data > 0) {
                                $res = array('msg' => 'USUARIO ACTUALIZADO', 'type' => 'success');
                            } else {
                                $res = array('msg' => 'ERROR AL ACTUALIZAR', 'type' => 'error');
                            }
                        } else {
                            $res = array('msg' => 'EL TELÉFONO DEBE SER ÚNICO', 'type' => 'warning');
                        }
                    } else {
                        $res = array('msg' => 'EL CORREO DEBE SER ÚNICO', 'type' => 'warning');
                    }
                }
            } else {
                $res = array('msg' => 'TODO LOS CAMPOS SON REQUERIDOS', 'type' => 'warning');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
    //metodo para eliminar registro
    public function eliminar($id)
    {
        if (isset($_GET)) {
            if (is_numeric($id)) {
                $data = $this->model->eliminar(0, $id);
                if ($data == 1) {
                    $res = array('msg' => 'USUARIO DADO DE BAJA', 'type' => 'success');
                } else {
                    $res = array('msg' => 'ERROR AL ELIMINAR', 'type' => 'error');
                }
            } else {
                $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar($id)
    {
        $data = $this->model->editar($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //perfil
    public function profile()
    {
        $data['title'] = 'Datos del usuario';
        $data['script'] = 'profile.js';
        $data['usuario'] = $this->model->editar($this->id_usuario);
        $this->views->getView('admin/usuarios', 'perfil', $data);
    }

    public function modificarDatos()
    {
        $nombre = strClean($_POST['nombrePerfil']);
        $apellidos = strClean($_POST['apellidoPerfil']);
        $correo = strClean($_POST['correoPerfil']);
        $usuario = strClean($_POST['usuarioPerfil']);
        $direccion = strClean($_POST['direccionPerfil']);
        $claveNueva = strClean($_POST['claveNueva']);
        $claveActual = strClean($_POST['claveActual']);

        $foto = $_FILES['fotoPerfil'];
        $name = $foto['name'];
        $tmp = $foto['tmp_name'];

        $verificarPerfil = $this->model->editar($this->id_usuario);
        $destino = $verificarPerfil['perfil'];

        if (!empty($name)) {
            if (file_exists($destino)) {
                unlink($destino);
            }
            $perfil = date('YmdHis') . $correo . '.jpg';
            $destino = 'assets/images/perfil/' . $perfil;
        }

        if (empty($nombre)) {
            $res = array('msg' => 'EL NOMBRE ES REQUERIDO', 'type' => 'warning');
        } else {
            $verificarClave = $this->model->editar($this->id_usuario);
            if (empty($claveNueva)) {
                $hash =  $verificarClave['clave'];
                $verificarCorreo = $this->model->getValidar('correo', $correo, 'actualizar', $this->id_usuario);
                if (empty($verificarCorreo)) {
                    $verificarUsuario = $this->model->getValidar('usuario', $usuario, 'actualizar', $this->id_usuario);
                    if (empty($verificarUsuario)) {
                        $data = $this->model->modificarDatos($nombre, $apellidos, $correo, $direccion, $hash, $destino, $this->id_usuario);
                        if ($data == 1) {
                            if (!empty($name)) {
                                move_uploaded_file($tmp, $destino);
                            }
                            $res = array('msg' => 'DATOS MODIFICADO', 'type' => 'success', 'clave' => false);
                        } else {
                            $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
                        }
                    } else {
                        $res = array('msg' => 'EL TELEFONO DEBE SER UNICO', 'type' => 'warning');
                    }
                } else {
                    $res = array('msg' => 'EL CORREO DEBE SER UNICO', 'type' => 'warning');
                }
            } else {
                if (password_verify($claveActual, $verificarClave['clave'])) {
                    $verificarCorreo = $this->model->getValidar('correo', $correo, 'actualizar', $this->id_usuario);
                    if (empty($verificarCorreo)) {
                        $verificarUsuario = $this->model->getValidar('usuario', $usuario, 'actualizar', $this->id_usuario);
                        if (empty($verificarUsuario)) {
                            $hash = password_hash($claveNueva, PASSWORD_DEFAULT);
                            $data = $this->model->modificarDatos($nombre, $apellidos, $correo, $usuario, $direccion, $hash, $destino, $this->id_usuario);
                            if ($data == 1) {
                                if (!empty($name)) {
                                    move_uploaded_file($tmp, $destino);
                                }
                                $res = array('msg' => 'DATOS MODIFICADO', 'type' => 'success', 'clave' => true);
                            } else {
                                $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
                            }
                        } else {
                            $res = array('msg' => 'EL TELEFONO DEBE SER UNICO', 'type' => 'warning');
                        }
                    } else {
                        $res = array('msg' => 'EL CORREO DEBE SER UNICO', 'type' => 'warning');
                    }
                } else {
                    $res = array('msg' => 'CONTRASEÑA ACTUAL INCORRECTA', 'type' => 'warning');
                }
            }
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header('Location: ' . RUTA_PRINCIPAL);
    }
}
