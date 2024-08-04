<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
class Contacto extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Contactos';
        $data['subtitle'] = 'Contactenos';
        $data['empresa'] = $this->model->getEmpresa();
        $this->views->getView('principal/contactos/index', $data);
    }

    public function enviarMensaje()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (validarCampos(['name', 'email', 'phone_number', 'msg_subject', 'message'])) {
                $mail = new PHPMailer(true);
                $correo = strClean($_POST['email']);
                $nombre = strClean($_POST['name']);
                $telefono = strClean($_POST['phone_number']);
                $asunto = strClean($_POST['msg_subject']);
                $mensaje = strClean($_POST['message']);
                $empresa = $this->model->getEmpresa();
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = HOST_SMTP;                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = USER_SMTP;                     //SMTP username
                    $mail->Password   = CLAVE_SMTP;                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = PUERTO_SMTP;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom($correo, $nombre);
                    $mail->addAddress($empresa['correo'], $empresa['nombre']);     //Add a recipient
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $asunto;
                    $mail->Body    = $mensaje;
                    $mail->AltBody = $telefono;

                    $mail->send();
                    echo 'El mensaje ha sido enviado';
                } catch (Exception $e) {
                    echo "No se pudo enviar el mensaje. Error de envío: {$mail->ErrorInfo}";
                }
            }
        }
    }
}
