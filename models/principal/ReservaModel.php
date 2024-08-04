<?php
class ReservaModel extends Query{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getEmpresa() {
        return $this->select("SELECT * FROM empresa");
    }

    public function getDisponible($f_llegada, $f_salida, $habitacion) {
        return $this->selectAll("SELECT * FROM reservas 
        WHERE fecha_ingreso <= '$f_salida'
        AND fecha_salida >= '$f_llegada' AND id_habitacion = $habitacion");
    }

    public function getReservasHabitacion($habitacion) {
        return $this->selectAll("SELECT * FROM reservas 
        WHERE id_habitacion = $habitacion");
    }
    //RECUPERAR LAS HABITACIONES
    public function getHabitaciones() {
        return $this->selectAll("SELECT * FROM habitaciones WHERE estado = 1");
    }
    //RECUPERAR LAS HABITACION
    public function getHabitacion($id_habitacion) {
        return $this->select("SELECT * FROM habitaciones WHERE id = $id_habitacion");
    }

    //AGREGAR RESERVA
    public function agregarReserva($monto, $num_transaccion, $cod_reserva,
    $fecha_ingreso, $fecha_salida, $descripcion,
    $metodo, $id_habitacion, $id_usuario) {
        $sql = "INSERT INTO reservas (monto, num_transaccion, cod_reserva,
        fecha_ingreso, fecha_salida, descripcion,
        metodo, id_habitacion, id_usuario) VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->insert($sql, [$monto, $num_transaccion, $cod_reserva,
        $fecha_ingreso, $fecha_salida, $descripcion,
        $metodo, $id_habitacion, $id_usuario]);
    }

    public function listarReservas($id_usuario) {
        return $this->selectAll("SELECT r.*, h.estilo FROM reservas r INNER JOIN habitaciones h ON r.id_habitacion = h.id WHERE r.id_usuario = $id_usuario");
    }
}
?>