<?php
require_once 'vendor/autoload.php';
// SDK de Mercado Pago

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class Reserva extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    //LISTAR RESERVAS
    public function listarReservas() {
        $data = $this->model->listarReservas($_SESSION['id_usuario']);
        $item = 1;
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['item'] = $item;
            $item++;
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function verify()
    {
        if (isset($_GET['f_llegada']) && isset($_GET['f_salida']) && isset($_GET['habitacion'])) {
            $f_llegada = strClean($_GET['f_llegada']);
            $f_salida = strClean($_GET['f_salida']);
            $habitacion = strClean($_GET['habitacion']);
            if (empty($f_llegada) || empty($f_salida) || empty($habitacion)) {
                header('Location: ' . RUTA_PRINCIPAL . '?respuesta=warning');
            } else {
                $reserva = $this->model->getDisponible($f_llegada, $f_salida, $habitacion);
                $data['title'] = 'Reservas';
                $data['subtitle'] = 'Verificar Disponiblilidad';
                $data['disponible'] = [
                    'f_llegada' => $f_llegada,
                    'f_salida' => $f_salida,
                    'habitacion' => $habitacion
                ];
                if (empty($reserva)) {
                    //CREAR SESION DE LA HABITACIÓN
                    $_SESSION['reserva'] = $data['disponible'];
                    $data['mensaje'] = 'DISPONIBLE';
                    $data['tipo'] = 'success';
                } else {
                    $data['mensaje'] = 'NO DISPONIBLE';
                    $data['tipo'] = 'danger';
                    unset($_SESSION['reserva']);
                }
                $data['empresa'] = $this->model->getEmpresa();
                $data['habitaciones'] = $this->model->getHabitaciones();
                $data['habitacion'] = $this->model->getHabitacion($habitacion);
                $this->views->getView('principal/reservas', $data);
            }
        }
    }

    public function listar($parametros)
    {
        $array = explode(',', $parametros);
        $f_llegada = (!empty($array[0])) ? $array[0] : null;
        $f_salida = (!empty($array[1])) ? $array[1] : null;
        $habitacion = (!empty($array[2])) ? $array[2] : null;
        $results = [];
        if ($f_llegada != null && $f_salida != null && $habitacion != null) {
            $reservas = $this->model->getReservasHabitacion($habitacion);
            for ($i = 0; $i < count($reservas); $i++) {
                $datos['id'] = $reservas[$i]['id'];
                $datos['title'] = 'OCUPADO';
                $datos['start'] = $reservas[$i]['fecha_ingreso'];
                $datos['end'] = $reservas[$i]['fecha_salida'];
                $datos['color'] = '#dc3545';
                array_push($results, $datos);
            }
            $data['id'] = $habitacion;
            $data['title'] = 'COMPROBANDO';
            $data['start'] = $f_llegada;
            $data['end'] = date("Y-m-d", strtotime($f_salida . " +1 day"));;
            $data['color'] = '#ffc107';
            array_push($results, $data);
            echo json_encode($results, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function pendiente()
    {
        if (empty($_SESSION['reserva'])) {
           redirect(RUTA_PRINCIPAL);
        }

        $data['title'] = 'Reserva pendiente';
        $data['habitacion'] = [];
        if (!empty($_SESSION['reserva'])) {
            $data['habitacion'] = $this->model->getHabitacion($_SESSION['reserva']['habitacion']);
        }
        //MERCADO PAGO
        MercadoPagoConfig::setAccessToken(ACCESS_TOKEN);
        $client = new PreferenceClient();

        $back_urls = array(
            "success" => RUTA_PRINCIPAL . 'reserva/success',
            "failure" => RUTA_PRINCIPAL . 'reserva/failure',
            "pending" => RUTA_PRINCIPAL . 'reserva/pending'
        );

        //CAPTURAR LA CANTIDAD
        $fecha1 = new DateTime($_SESSION['reserva']['f_llegada']);
        $fecha2 = new DateTime($_SESSION['reserva']['f_salida']);

        $cantidad = $fecha2->diff($fecha1);

        $precio = floatval($data['habitacion']['precio']);

        $preference = $client->create([
            "items" => [
                [
                    "title" => $data['habitacion']['estilo'],
                    "quantity" => $cantidad->d + 1,
                    'currency_id' => MONEDA_MP,
                    "unit_price" => $precio
                ]
            ],
            'back_urls' => $back_urls
        ]);
        $data['preference_id'] = $preference->id;
        $data['total'] = ($cantidad->d + 1) * $precio;
        $this->views->getView('principal/clientes/reservas/pendiente', $data);
    }

    public function agregarNotas()
    {
        $datos = file_get_contents('php://input');
        $array = json_decode($datos, true);
        $_SESSION['notas'] = $array['descripcion'];
        echo 'ok';
    }

    public function success()
    {
        if (empty($_SESSION['reserva'])) {
            echo 'NO SE PUEDO RECUPERAR LOS DATOS DE LA RESERVA';
            exit;
        }
        $fecha1 = new DateTime($_SESSION['reserva']['f_llegada']);
        $fecha2 = new DateTime($_SESSION['reserva']['f_salida']);
        $cantidad = $fecha2->diff($fecha1);
        $habitacion = $this->model->getHabitacion($_SESSION['reserva']['habitacion']);
        $descripcion = $_SESSION['notas'];
        $reserva = [
            'monto' => $habitacion['precio'] * ($cantidad->d + 1),
            'num_transaccion' => $_GET['payment_id'],
            'cod_reserva' => uniqid(),
            'fecha_ingreso' => $_SESSION['reserva']['f_llegada'],
            'fecha_salida' => $_SESSION['reserva']['f_salida'],
            'descripcion' => $descripcion,
            'metodo' => 'Mercado Pago',
            'id_habitacion' => $_SESSION['reserva']['habitacion'],
            'id_usuario' => $_SESSION['id_usuario']
        ];
        $data = $this->agregarReserva($reserva);
        if ($data > 0) {
            redirect(RUTA_PRINCIPAL . 'reserva/completado');
        }
    }

    public function failure()
    {
        echo 'failure';
    }

    public function pending()
    {
        echo 'pending';
    }

    public function registrarReserva()
    {
        $datos = file_get_contents('php://input');
        $array = json_decode($datos, true);
        $descripcion = $_SESSION['notas'];
        $reserva = [
            'monto' => $array['reserva']['purchase_units'][0]['amount']['value'],
            'num_transaccion' => $array['reserva']['id'],
            'cod_reserva' => uniqid(),
            'fecha_ingreso' => $_SESSION['reserva']['f_llegada'],
            'fecha_salida' => $_SESSION['reserva']['f_salida'],
            'descripcion' => $descripcion,
            'metodo' => 'Paypal',
            'id_habitacion' => $_SESSION['reserva']['habitacion'],
            'id_usuario' => $_SESSION['id_usuario']
        ];

        $data = $this->agregarReserva($reserva);
        if ($data > 0) {
            $res = ['tipo' => 'success', 'msg' => 'RESERVA REGISTRADO'];
        } else {
            $res = ['tipo' => 'error', 'msg' => 'ERROR AL REGISTRAR RESERVA'];
        }
        echo json_encode($res);
        die();
    }

    private function agregarReserva($reserva)
    {
        return $this->model->agregarReserva(
            $reserva['monto'],
            $reserva['num_transaccion'],
            $reserva['cod_reserva'],
            $reserva['fecha_ingreso'],
            $reserva['fecha_salida'],
            $reserva['descripcion'],
            $reserva['metodo'],
            $reserva['id_habitacion'],
            $reserva['id_usuario']
        );
    }

    public function completado()
    {
        unset($_SESSION['notas']);
        unset($_SESSION['reserva']);
        if (empty($_SESSION['reserva'])) {
            header('Location: ' . RUTA_PRINCIPAL . 'dashboard');
        }
    }
}
