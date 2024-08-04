<?php
require 'vendor/autoload.php'; // Carga el autoloader de Composer

use Dompdf\Dompdf;

class Dashboard extends Controller
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
        $data['title'] = 'Perfil cliente';
        $data['totales'] = [
            'habitaciones' => $this->model->getTotales('habitaciones', 1),
            'clientes' => $this->model->totalClientes(1),
            'categorias' => $this->model->getTotales('categorias', 1),
            'reservas' => $this->model->totalReservas()
        ];
        $this->views->getView('principal/clientes/index', $data);
    }

    public function ticket($id)
    {
        // Recibe el ID de reserva por GET
        $data['reserva'] = $this->model->getReserva(strClean($id));
        ob_start();
        $this->views->getView('principal/clientes/reservas/ticket', $data);
        $html = ob_get_clean();
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set('isJavascriptEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf->setOptions($options);
        $dompdf->loadHtml($html);

        $dompdf->setPaper(array(0, 0, 220, 841), 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Enviar el PDF generado al navegador
        $dompdf->stream('ticket_reserva_' . $id . '.pdf', array('Attachment' => false));
    }

    public function calificacion($id)
    {
        $data['title'] = 'Calificar Habitación';
        $data['reserva'] = $this->model->getReserva($id);
        if (!empty($data['reserva']) && $data['reserva']['id_usuario'] == $_SESSION['id_usuario']) {
            $data['totalReserva'] = $this->model->totalReservaHabitacion($data['reserva']['id_habitacion']);
            //RECUPERAR GALERIAS
            $rutas = 'assets/img/habitaciones/' . $data['reserva']['id_habitacion'] . '/';
            $imagenes = [];
            if (is_dir($rutas)) {
                // Obtener lista de archivos y directorios en la carpeta
                $archivos = scandir($rutas);

                // Filtrar solo los archivos de imagen
                $imagenes = array_filter($archivos, function ($archivo) {
                    // Verificar si el archivo es una imagen (extensión jpg, jpeg, png, gif)
                    $extensiones_permitidas = array('jpg', 'jpeg', 'png', 'gif');
                    $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                    return in_array(strtolower($extension), $extensiones_permitidas);
                });
            }
            $data['imagenes'] = $imagenes;
            //RECUPERAR LAS CALIFICACIONES
            $data['calificaciones'] = $this->model->getCalificaciones($data['reserva']['id_habitacion']);
            $totalCalificacion = $this->model->getTotalCalificaciones($data['reserva']['id_habitacion']);
            $total = ($totalCalificacion['total'] != null) ? $totalCalificacion['total'] : 5;
            $existe = (count($data['calificaciones']) > 0) ? count($data['calificaciones']) : 1;
            $data['total'] = $total / $existe;
            $this->views->getView('principal/clientes/calificar', $data);
        } else {
            header('Location: ' . RUTA_PRINCIPAL);
        }
    }

    public function agregarCalificacion()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (validarCampos(['cantidad', 'id'])) {
                $id = strClean($_POST['id']);
                $cantidad = strClean($_POST['cantidad']);
                $comentario = strClean($_POST['comentario']);
                //COMPROBAR SI YA EXISTE
                $consulta = $this->model->getCalificacion($id, $_SESSION['id_usuario']);
                if (empty($consulta)) {
                    $data = $this->model->agregarCalificacion($cantidad, $comentario, $id, $_SESSION['id_usuario']);
                    if ($data > 0) {
                        $res = array('msg' => 'CALIFICACIÓN REGISTRADO', 'type' => 'success');
                    } else {
                        $res = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                    }
                } else {
                    $data = $this->model->modificarCalificacion($cantidad, $comentario, $consulta['id']);
                    if ($data > 0) {
                        $res = array('msg' => 'CALIFICACION MODIFICADO', 'type' => 'success');
                    } else {
                        $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
                    }
                }
            } else {
                $res = array('msg' => 'EL CANTIDAD ES REQUERIDO', 'type' => 'warning');
            }
        }else{
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');

        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
