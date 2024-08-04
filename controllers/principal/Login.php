<?php
class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['empresa'] = $this->model->getEmpresa();
        $data['title'] = 'Login';
        $data['subtitle'] = 'Inicio de sesion';
        $this->views->getView('principal/login', $data);
    }

    public function verify()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (validarCampos(['usuario', 'clave'])) {
                $usuario = strClean($_POST['usuario']);
                $clave = strClean($_POST['clave']);
                //VERIFICAR ACCESO
                $verficar = $this->model->validarAcceso($usuario);
                if (empty($verficar)) {
                    $res = ['tipo' => 'warning', 'msg' => 'EL USUARIO NO EXISTE'];
                } else {
                    if (password_verify($clave, $verficar['clave'])) {
                        //CREAR SESIONES
                        crearSession([
                            'id_usuario' => $verficar['id'],
                            'usuario' => $verficar['usuario'],
                            'correo' => $verficar['correo'],
                            'nombre' => $verficar['nombre'] . ' ' . $verficar['apellido'],
                            'rol' => $verficar['rol']
                        ]);
                        $res = ['tipo' => 'success', 'msg' => 'BIENVENIDO'];
                    } else {
                        $res = ['tipo' => 'warning', 'msg' => 'CONTRASEÑA INCORRECTA'];
                    }
                    
                }
                
            } else {
                $res = ['tipo' => 'warning', 'msg' => 'TODOS LOS CAMPOS CON * SON REQUERIDOS ****'];
            }
            echo json_encode($res, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
}
